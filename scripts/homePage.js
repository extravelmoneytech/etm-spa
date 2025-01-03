let nextPageUrl='/orderv2/Get-Rates'
// Then on the previous page, use this to detect when the page is revisited
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        // Force reload if the page is cached
        window.location.reload();
    }
});
console.log(apiUrl,'apiUrl')




function openChooseCityWidget() {
    
    if (productType === 'mt') {
    document.querySelector('.chooseCityWidget').querySelector('h2').textContent = "Enter Sender's Location in India";
}
if (productType === 'fx') {
    document.querySelector('.chooseCityWidget').querySelector('h2').textContent = "Enter your Location";
}

    // Scroll to the top of the page
    window.scrollTo(0, 0);

    // Hide the main hero section and show the city selection widget
    document.querySelector('.heroMain').classList.add('heroSectionHide');

    document.querySelector('.chooseCityWidget').style.display = 'flex';
    document.querySelector('.chooseCityOverlay').style.display = 'block';
    document.querySelector('body').classList.add('snipContainer');
}

function closeChooseCityWidget() {
    // Restore the main hero section and hide the city selection widget
    document.querySelector('.heroMain').classList.remove('heroSectionHide');

    document.querySelector('.chooseCityWidget').style.display = 'none';
    document.querySelector('.chooseCityOverlay').style.display = 'none';
    document.querySelector('body').classList.remove('snipContainer');
}







let chooseCityOverlay = document.querySelector('.chooseCityOverlay')
let chooseCityWidget = document.querySelector('.chooseCityWidget')
chooseCityOverlay.addEventListener('click', (event) => {
    if (!chooseCityWidget.contains(event.target)) {
        closeChooseCityWidget(); // Only close if the click was outside the otpWidget
    }
})


// money transfer dropdown updation

const countryListContainer = document.getElementById('mtCountryList');
const defaultCountry= countryListContainer.getAttribute('defaultCountry')
// Clear any existing list items in the container
countryListContainer.innerHTML = '';

// Function to create a country list item
function createCountryListItem(country) {
    const listItem = document.createElement('li');
    listItem.setAttribute('value', country.country.toLowerCase()); // Assuming 'currency' or 'country' can be used for the value attribute

    listItem.setAttribute('currency', country.currency.toLowerCase())
    // If the country has an alternative name, store it in an attribute for search purposes
    if (country.alternativeName) {
        listItem.setAttribute('alternativeName', country.alternativeName);
    }

    // Create a span element for the flag icon using the flagCode
    const flagIcon = document.createElement('span');
    flagIcon.className = `flag-icon icon-dropdown-flag flag-icon-${country.flagCode}`; // Use flagCode for dynamic flag class

    const countryName = document.createElement('span');
    countryName.textContent = country.country;

    listItem.appendChild(flagIcon); // Append the flag icon
    listItem.appendChild(countryName); // Append the country name

    return listItem;
}

// Loop through the country data and create list items
countryData.forEach(country => {
    const countryListItem = createCountryListItem(country);
    countryListContainer.appendChild(countryListItem);
    if(country.flagCode===defaultCountry){
        console.log('countryFound',country)
        forceSelectDropdownItem('mtCountryDropDown',country.country.toLowerCase())
    }
    
});





let widgetData = null;



let maximumCurrencyValue;
let maximumForexCardValue;
let maximumMtValue
let minimumMtValue;
let minimumCurrencyValue=8000;
let approxValueFx;
let approxValueMt;
let mtCurrency;
let userInfo;


userInfo = localStorage.getItem('userInfo');

if (userInfo) {
 // Parse the JSON string into an object
 userInfo = JSON.parse(userInfo);

// Now it's an object, and you can use it properly
    console.log(userInfo, 'ytfygug');
} else {
     console.log('No userInfo found in localStorage');
 }



// Function to fetch widget data and update the global variable
async function fetchAndStoreWidgetData() {
    try {

        
        const params = new URLSearchParams({ action: 'widget_data' });

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);


        widgetData = await response.json();
        // Store data in sessionStorage
        console.log(JSON.stringify(widgetData.ibr),'widgetData.ibr')
        sessionStorage.setItem('ibrData', JSON.stringify(widgetData.ibr));



            

        
        maximumCurrencyValue = (3000 * widgetData.ibr.USD.currency).toFixed(0)
        maximumForexCardValue = (250000 * widgetData.ibr.USD.forexCard).toFixed(0)
        maximumMtValue = (250000 * widgetData.ibr.USD.MT.AD2).toFixed(0)
        minimumMtValue=(250 * widgetData.ibr.USD.MT.AD2).toFixed(0)
        

        updateApproxValue(widgetData.ibr); // Update the UI with the fetched data
        updateApproxValueMt(widgetData.ibr)
        updateCurrencySymbol('mtCountryDropDown', 'mt')
        updateCurrencySymbol('widgetCurrency', 'fx')



        


    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='error.html'
    }
}




// Function to update the approximate value using the stored widget data
function updateApproxValue(data) {
    if (!data) return;
    
    const currencyDropdown = document.querySelector('#widgetCurrency');
    const newCurrencyCode = currencyDropdown.getAttribute('dataval').toUpperCase();
    const newCurrencySymbol = currencySymbols[newCurrencyCode] || '';

    // Update the currency symbol in the #widgetAmount input field
    const amountField = document.querySelector('#widgetAmount');
    const currentAmount = amountField.value.replace(/^\D+/, ''); // Remove the existing currency symbol

    // Set the new value with the updated currency symbol
    amountField.value = `${newCurrencySymbol} ${currentAmount.trim()}`;

    // Update the displayed currency name
    document.querySelector('#currencyName').textContent = newCurrencyCode;
    
    
    

    // Get product and currency values
    const product = document.querySelector('#WidgetProduct').getAttribute('dataval');
    const currency = document.querySelector('#widgetCurrency').getAttribute('dataval')?.toUpperCase(); // Ensure currency code is uppercase

    if (!product || !currency || !data[currency] || !data[currency][product]) {
        // Exit if product, currency, or data lookup is invalid
        console.error("Invalid product or currency data");
        return;
    }
    let amountText = amountField.value.trim();

    // If amount is empty, default to 0
    if (amountText === "") {
        amountText = "0";
    }

    // Remove any extra text and keep only the numerical part
    const amount = parseFloat(amountText.replace(/[^\d.]/g, '')); // Remove non-numeric characters

    // Handle invalid parsing case
    const approxVal = document.querySelector('.approxVal');
    const approxAmnt = data[currency][product] * amount;
    if (isNaN(amount)) {
        console.error("Invalid amount entered");
        approxVal.textContent = '0';
        return;
    }

    approxValueFx = approxAmnt.toFixed(0)
    

    let productType = document.querySelector('#WidgetProduct').getAttribute('dataval') === 'forexCard' ? 'Forex Card' : 'Currency'

    let container = document.querySelector('#widgetFxInputContainer')



        if (Number(approxValueFx)<Number(minimumCurrencyValue)) {
            
                removeAlertBelowElement(container)
                insertAlertBelowElement(container, 'Please enter a minimum amount of USD 100 or its equivalent')
                activeGetRatesBtn(false,'fx')
                return
        }else {
                activeGetRatesBtn(true,'fx')
        }
    // Check if the product type is 'Currency' and the value exceeds the maximum currency note limit
    console.log(Number(maximumCurrencyValue),Number(approxValueFx),'maximumCurrencyValue','approxValueFx')
    if (productType === 'Currency' && Number(approxValueFx) > Number(maximumCurrencyValue)) {
        console.log(approxValueFx, maximumCurrencyValue,'bcbcbc');
        removeAlertBelowElement(container);
        insertAlertBelowElement(container, 'A Resident Indian can carry up to USD 3000 (or equivalent) in currency notes per trip. For more, consider using a Forex Card or ensure another traveler accompanies you.');
    } else {
        // Only remove the currency warning if no such alert is needed
        removeAlertBelowElement(container);
    }

    // Check if the value exceeds the maximum Forex Card limit (this applies regardless of product type)
    if (Number(approxValueFx) > Number(maximumForexCardValue)) {
        removeAlertBelowElement(container);
        insertAlertBelowElement(container, 'High-roller alert! Your total Forex value is greater than $250,000, which is the maximum amount a single person is allowed to carry/remit by the RBI.');
        activeGetRatesBtn(false,'fx'); // Disable the button if the Forex limit is exceeded
    } else {
        activeGetRatesBtn(true,'fx'); // Enable the button if within the Forex limit
    }
    console.log(minimumCurrencyValue,'bbvvccx')
    








    // Format and update the approximate value
    approxVal.textContent = formatIndianCurrency(approxAmnt.toFixed(0)) + ' INR';
}


function activeGetRatesBtn(val,type) {
    let btn;
    if(type==='fx'){
        btn = document.querySelector('#getRatesButton');
    }
    if(type==='mt'){
        btn = document.querySelector('#getRatesButtonMt');
    }
    
    
    if (val) {
        btn.style.opacity = '1';
        btn.style.pointerEvents = 'auto'; // Re-enable click events
        
    } else {
        btn.style.opacity = '0.2';
        btn.style.pointerEvents = 'none'; // Disable click events
        
    }
}

updateCurrencyList()


// Fetch widget data immediately when the page loads
fetchAndStoreWidgetData();

// Set an interval to update the widget data every 10 minutes
setInterval(fetchAndStoreWidgetData, 10 * 60 * 1000);

// Listen for a change on any dropdown and update the value
document.querySelector('#WidgetProduct').addEventListener('dropdownChange', () => {
    console.log('nnbbvv')
    updateCurrencyList()
    updateApproxValue(widgetData.ibr);
});

function updateCurrencyList() {
    let product = document.querySelector('#WidgetProduct').getAttribute('dataval');
    
    
    if (product === 'forexCard') {
        // Array of currency codes without Forex card
        const noForexCardCurrencies = ["MYR", "SAR"];
        
        // Loop through each <li> element in the dropdown and hide if it matches an item in the array
        
        
        document.querySelector('#currencyDropdown').querySelectorAll('li').forEach(li => {
            const currencyName = li.getAttribute('value');
            
            if (noForexCardCurrencies.includes(currencyName)) {
                console.log(li);
                li.style.display = 'none';
            }
        });
        
        
        let dropDownMain=document.querySelector('#widgetCurrency')
        updateFromSession(dropDownMain)
        
    } else if (product === 'currency') {
        document.querySelector('#currencyDropdown').querySelectorAll('li').forEach(li => {
            li.style.display = 'flex';
        }); // Added missing closing parenthesis here
    }
}



// Add event listeners to other dropdowns as needed
// Define currency symbols mapping
const currencySymbols = {
    'USD': '$',      // United States Dollar
    'GBP': '£',      // British Pound
    'EUR': '€',      // Euro
    'AUD': 'A$',     // Australian Dollar
    'CAD': 'C$',     // Canadian Dollar
    'THB': '฿',      // Thai Baht
    'SGD': 'S$',     // Singapore Dollar
    'JPY': '¥',      // Japanese Yen
    'MYR': 'RM',     // Malaysian Ringgit
    'NZD': 'NZ$',    // New Zealand Dollar
    'AED': 'AED'     // UAE Dirham (using "AED" as the symbol)
};



// Event listener for currency dropdown change
document.querySelector('#widgetCurrency').addEventListener('dropdownChange', () => {
    

    // Update the approximate value with the new currency
    updateApproxValue(widgetData.ibr);
});
let cleanedNumericPart = 1000;
document.querySelector('#widgetAmount').addEventListener('input', () => {
    const amountField = document.querySelector('#widgetAmount');
    let amountText = amountField.value.trim();

    // Extract the numeric part of the input after the currency symbol
    const spaceIndex = amountText.indexOf(' ');
    const numericPart = spaceIndex !== -1 ? amountText.substring(spaceIndex + 1).trim() : amountText;

    // Remove any non-numeric characters (keeping decimal point if present)
    cleanedNumericPart = numericPart.replace(/[^0-9.]/g, '');

    // Update the input field with the cleaned value, adding back the currency symbol
    const currencySymbol = amountText.slice(0, spaceIndex + 1); // Preserve the currency symbol
    amountField.value = `${currencySymbol}${cleanedNumericPart}`;

    // Proceed with updating the approximate value
    updateCurrencySymbol('widgetCurrency', 'fx')
    updateApproxValue(widgetData.ibr);
});

let cityBtns = document.querySelectorAll('.cityBtn')
let cityInput = document.querySelector('#citySelector')

cityBtns.forEach((item) => {
    item.addEventListener('click', () => {
        
        cityInput.value = item.getAttribute('value')
        item.setAttribute("selectStatus", "true");
        document.querySelector('.selectedCity').classList.remove('selectedCity')
        item.classList.add('selectedCity')
    })
})


let token;
let productType;
// Common function to get the token
async function getToken(paramsData) {
    try {
        const params = new URLSearchParams(paramsData);
        
        // Using await instead of .then chains
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        });
        
        const data = await response.json();
        
        sessionStorage.setItem('userValid', data.user_valid);
        console.log('Success:', data);
        sessionStorage.setItem('token', data.token);
        document.querySelector('#citySelect').style.opacity = '1';
        document.querySelector('#citySelect').removeAttribute('disabled');
        
        return true;  // This will now properly return to the calling function
        
    } catch (error) {
        console.error('Error:', error);
        return false;  // This will now properly return to the calling function
        // location.href='error.html'
    }
}

// Event listener for FX product


document.querySelector('#getRatesButton').addEventListener('click', async (e) => {
    
    


    productType = 'fx';
    sessionStorage.setItem('productPage', 'fx');

    let product = document.querySelector('#WidgetProduct').getAttribute('dataval') === 'forexCard' ? 'Forex Card' : 'Currency'
    let amountField = document.querySelector('#widgetAmount');

    let amountText = amountField.value.trim();


    // Find the index of the first space
    const spaceIndex = amountText.indexOf(' ');
    let amount = spaceIndex !== -1 ? amountText.substring(spaceIndex + 1).trim() : amountText;
    let currency = document.querySelector('#widgetCurrency').getAttribute('dataval')

    let container = document.querySelector('#widgetFxInputContainer')
    if (!/\d/.test(amount) || amount == 0) {

        insertAlertBelowElement(container, 'Enter a valid amount')
        return
    } else {
        removeAlertBelowElement(container)
    }

    









    

    let paramsData
    if(userInfo){



        // Data for FX product
    paramsData = {
        action: 'initial_data',
        transaction: 'buy',
        product: product,
        currency: currency,
        amount: amount,
        mobile: userInfo.mobNum,
        country_code: userInfo.countryCode,
        userip: '',
        device: '',
        country: '',
        purpose: '',
        uid:userInfo.userId
    };
    }
    else{
        // Data for FX product
        paramsData = {
        action: 'initial_data',
        transaction: 'buy',
        product: product,
        currency: currency,
        amount: amount,
        mobile: '0',
        country_code: '0',
        userip: '',
        device: '',
        country: '',
        purpose: ''
    };
    }
console.log(paramsData)


    // Call common function to get token
    const tokenVal=await getToken(paramsData);
    console.log(tokenVal,'hungry') 
    if(tokenVal){
         
        let cityName=e.target.getAttribute('city');
        if(cityName){
            document.querySelector('#citySelector').value=cityName;
           await handleBuyCityWidgetTransmission();
        }else{
            openChooseCityWidget()
        }
    }
    

});


const widgetAmount = document.querySelector('#widgetAmount');
const getRatesButton = document.querySelector('#getRatesButton');

if (widgetAmount && getRatesButton) {
    widgetAmount.addEventListener('keyup', (event) => {
        if (event.key === 'Enter') {  // Check if the "Enter" key was pressed
            getRatesButton.click();  // Trigger button click
        }
    });
}



// Event listener for MT product
document.querySelector('#getRatesButtonMt').addEventListener('click', () => {
    productType = 'mt';
    sessionStorage.setItem('productPage', 'mt');
    let purpose = document.querySelector('#purposeList').getAttribute('dataval')

    let country = document.querySelector('#mtCountryDropDown').getAttribute('dataval')


    let amountField = document.querySelector('#widgetAmountMt');

    let amountText = amountField.value.trim();


    // Find the index of the first space
    const spaceIndex = amountText.indexOf(' ');
    let amount = spaceIndex !== -1 ? amountText.substring(spaceIndex + 1).trim() : amountText;

    let container = document.querySelector('#widgetMtInputContainer')
    if (!/\d/.test(amount) || amount == 0) {

        insertAlertBelowElement(container, 'Enter a valid amount')
        return
    } else {
        removeAlertBelowElement(container)
    }
    
    


    

// Data for MT product

    let paramsData;
    if(userInfo){
        paramsData = {
            action: 'initial_data',
            transaction: 'mt',
            product: 'Telegraphic Transfer(TT)',
            mobile: userInfo.mobNum,
            country_code: userInfo.countryCode,
            userip: '',
            device: '',
            country: country,
            purpose: purpose,
            amount: amount,
            currency: mtCurrency
        };
    }
    else{
       paramsData = {
            action: 'initial_data',
            transaction: 'mt',
            product: 'Telegraphic Transfer(TT)',
            mobile: '0',
            country_code: '0',
            userip: '',
            device: '',
            country: country,
            purpose: purpose,
            amount: amount,
            currency: mtCurrency
        };
    }
    
    

    console.log(paramsData);

    // Call common function to get token
    getToken(paramsData);


    // Open the widget
    openChooseCityWidget();
});



document.querySelector('#citySelect').addEventListener('click', () => {

    let selectedCityName = null;
    let resultsContainer = document.querySelector('#results');

    // Ensure you're using the correct variable name
    resultsContainer.querySelectorAll('.cityBtn').forEach((btn) => {
        // Check if selectStatus exists and is truthy
        if (btn.getAttribute('selectStatus')==="true") {
            selectedCityName = btn.getAttribute('value');
        }
    });


    let citySelector = document.querySelector('#citySelector')
    let citySelectorContainer = document.querySelector('#citySelectorContainer')
    if (selectedCityName==null) {
        insertAlertBelowElement(citySelectorContainer, 'Please select a city')
        return;
    } else {
        console.log('nooo')
        removeAlertBelowElement(citySelectorContainer);
    }

    if (productType === 'fx') {
        handleBuyCityWidgetTransmission()
    } else if (productType === 'mt') {

        // Store the object in sessionStorage as a JSON string
        sessionStorage.setItem('mtCity', cityInput.value);

        window.location.href = nextPageUrl;

    }


})
async function handleBuyCityWidgetTransmission(){
    
        // Retrieve the data values from the DOM elements
        const widgetProductDataVal = document.querySelector('#WidgetProduct').getAttribute('dataval');
        const widgetCurrencyDataVal = document.querySelector('#widgetCurrency').getAttribute('dataval');
        const widgetAmount = document.querySelector('#widgetAmount').value;





        // Format the widgetProduct value
        const formattedWidgetProduct = capitalizeFirstLetter(widgetProductDataVal);



        // Create an object to store these values

        const dataObject = [{
            widgetProduct: formattedWidgetProduct,
            widgetCurrency: widgetCurrencyDataVal,
            widgetAmount: widgetAmount,
            city: cityInput.value,
            recommendationText: finalText
        }];

        console.log(dataObject)

        // Store the object in sessionStorage as a JSON string
        sessionStorage.setItem('storedData', JSON.stringify(dataObject));
        window.location.href = nextPageUrl;


    
}
function toggleWidget(val) {
    const spaces = ['mt', 'forex'];
    spaces.forEach(space => {
        const spaceElement = document.querySelector(`.${space}Space`);
        const toggleElement = document.querySelector(`#${space}Toggle`);

        const sellCurrencyContainer = document.querySelector('#sellCurrencyContainer')
        if (space === val) {
            spaceElement.classList.add('activeSpace');
            spaceElement.classList.remove('hiddenSpace');
            toggleElement.classList.add('activeToggle');
            sellCurrencyContainer.style.display = 'flex'
        } else {
            spaceElement.classList.remove('activeSpace');
            spaceElement.classList.add('hiddenSpace');
            toggleElement.classList.remove('activeToggle');

            sellCurrencyContainer.style.display = 'none'
        }
    });
}



document.querySelector('#mtToggle').addEventListener('click', () => {
    toggleWidget('mt')
})

document.querySelector('#forexToggle').addEventListener('click', () => {
    toggleWidget('forex')
})




















//   testimonial functionality

document.addEventListener('DOMContentLoaded', () => {
    const testimonialContainer = document.querySelector('.testimonialContainer');
    const prevBtn = document.getElementById('testiPrevBtn');
    const nextBtn = document.getElementById('testiNextBtn');

    // Initialize current position index
    let currentPosition = 0;

    // Get all testimonial cards
    const testimonialCards = document.querySelectorAll('.testimonialCard');
    const testimonialCardGaps = document.querySelectorAll('.testiGap');
    const cardCount = testimonialCards.length;

    // Number of visible cards at a time
    const visibleCards = 3;

    let cardWidth;
    let maxScrollPosition;

    // Function to update the card width and max scroll position
    const updateDimensions = () => {
        if (testimonialCards.length > 0 && testimonialCardGaps.length > 0) {
            cardWidth = testimonialCards[0].offsetWidth + testimonialCardGaps[0].offsetWidth; // Adjust for margin/gap
            maxScrollPosition = cardCount - visibleCards;
        }
    };

    // Function to update button states
    const updateButtonStates = () => {
        prevBtn.disabled = currentPosition === 0;
        nextBtn.disabled = currentPosition === maxScrollPosition;
    };

    // Function to move the carousel
    const moveCarousel = () => {
        testimonialContainer.style.transform = `translateX(-${cardWidth * currentPosition}px)`;
        updateButtonStates();
    };

    // Initial dimensions and button state update
    updateDimensions();
    updateButtonStates();

    // Click event for next button
    nextBtn.addEventListener('click', () => {
        if (currentPosition < maxScrollPosition) {
            currentPosition++;
        } else {
            // Reset to the initial position if we're at the end
            currentPosition = 0;
        }
        moveCarousel();
    });

    // Click event for previous button
    prevBtn.addEventListener('click', () => {
        if (currentPosition > 0) {
            currentPosition--;
        } else {
            return;
        }
        moveCarousel();
    });

    // Window resize event listener to recalculate dimensions
    window.addEventListener('resize', () => {
        // Update dimensions on resize
        updateDimensions();

        // Adjust the carousel position to reflect the new dimensions
        moveCarousel();
    });
});






// Function to handle button click
function handleButtonClick(event) {
    // Get the container element
    const container = document.querySelector('#servicesCardContainer');

    // Get all elements with the class 'serviceBtn'
    const buttons = document.querySelectorAll('.serviceBtn');

    // Loop through the buttons to remove the 'servicesActiveBtn' class
    buttons.forEach(button => {
        button.classList.remove('servicesActiveBtn');
    });

    // Add the 'servicesActiveBtn' class to the clicked button
    const clickedButton = event.currentTarget;
    clickedButton.classList.add('servicesActiveBtn');

    // Check the data-val attribute and adjust the container's transform property
    if (clickedButton.getAttribute('data-val') === 'mt') {
        container.style.transform = 'translateX(calc(-100%))'; // Adjust as needed
    } else {
        container.style.transform = 'translateX(0)';
    }
}

// Attach event listeners to all buttons with the class 'serviceBtn'
document.querySelectorAll('.serviceBtn').forEach(button => {
    button.addEventListener('click', handleButtonClick);
});








document.querySelectorAll('.faqHeader').forEach(header => {
    header.addEventListener('click', () => {
        const content = header.nextElementSibling; // Get the faqContent div
        const isOpen = content.classList.contains('open');

        // Close all open FAQ contents
        document.querySelectorAll('.faqContent').forEach(c => {
            c.classList.remove('open');
        });
        document.querySelectorAll('.faqHeader').forEach(h => {
            h.classList.remove('open');
        });

        // If this was not already open, open it
        if (!isOpen) {
            content.classList.add('open');
            header.classList.add('open');
        }
    });
});













document.querySelector('#mtCountryDropDown').addEventListener('dropdownChange', () => {
    console.log('hey')
    updateCurrencySymbol('mtCountryDropDown', 'mt')
    updateApproxValueMt(widgetData.ibr)
})
// document.querySelector('#mtCountryDropDown').addEventListener('dropdownFirstItemSelected', function(event) {
//     updateApproxValueMt(widgetData.ibr)
// });


function updateApproxValueMt(data) {
    if (!data) return;

    // Get the selected item from the dropdown
    const selectedItemElement = getSelectedDropdownItemElement('mtCountryDropDown');
    if (selectedItemElement) {
        // Get the currency attribute from the selected item
        const currency = selectedItemElement.getAttribute('currency')?.toUpperCase(); // Ensure currency code is uppercase

        // Ensure the currency exists in the data
        if (!currency || !data[currency] || !data[currency]['MT'] || !data[currency]['MT']['AD2']) {
            console.error("Invalid currency or data format");
            return;
        }

        let amountField = document.querySelector('#widgetAmountMt');
        let amountText = amountField.value.trim();

        // If the input is empty, default to 0
        if (amountText === "") {
            amountText = "0";
        }

        // Remove any non-numeric characters and parse the amount
        const amount = parseFloat(amountText.replace(/[^\d.]/g, ''));

        const approxVal = document.querySelector('.approxValMt');
        const approxAmnt = data[currency]['MT']['AD2'] * amount;
        // Handle invalid parsing case
        if (isNaN(amount)) {
            console.error("Invalid amount entered");
            approxVal.textContent = '0';
            return;
        }



        // Limit the calculated value to 2 decimal places
        const limitedAmount = approxAmnt.toFixed(0);

        // Display the formatted approximate value
        approxValueMt = limitedAmount



        let container = document.querySelector('#widgetMtInputContainer')
        if (Number(approxValueMt) > Number(maximumMtValue)) {
        console.log(Number(approxValueMt), Number(maximumMtValue))
        insertAlertBelowElement(container, 'High-roller alert! Your total Forex value is greater than $250,000, which is the maximum amount a single person is allowed to carry/remit by the RBI.');
        activeGetRatesBtn(false,'mt')
        return
        } else {
        activeGetRatesBtn(true,'mt')
        removeAlertBelowElement(container)
        }
        
        if (Number(approxValueMt)<Number(minimumMtValue)) {

        insertAlertBelowElement(container, 'Please enter a minimum amount of USD 250 or its equivalent')
        activeGetRatesBtn(false,'mt')
        return
        }else {
            activeGetRatesBtn(true,'mt')
        removeAlertBelowElement(container)
        }


        
        approxVal.textContent = formatIndianCurrency(limitedAmount) + ' INR';
    }
}


document.querySelector('#widgetAmountMt').addEventListener('input', () => {

    const amountField = document.querySelector('#widgetAmountMt');
    let amountText = amountField.value.trim();

    // Assume the currency symbol is the first part, followed by a space
    const spaceIndex = amountText.indexOf(' ');


    // Extract the numeric part after the currency symbol
    const numericPart = amountText.substring(spaceIndex + 1).trim();

    // Remove any non-numeric characters from the numeric part (keeping the decimal point if present)
    const cleanedNumericPart = numericPart.replace(/[^0-9.]/g, '');

    // Update the input field with the cleaned value, adding back the currency symbol
    const currencySymbol = amountText.slice(0, spaceIndex + 1); // Preserve the currency symbol
    amountField.value = `${currencySymbol}${cleanedNumericPart || ''}`; // Ensure the currency symbol is preserved even if numeric part is cleared


    // Call the function to update the approximate value based on the cleaned input
    updateApproxValueMt(widgetData.ibr);
});




function updateCurrencySymbol(dropdownId, type) {
    const selectedItemElement = getSelectedDropdownItemElement(dropdownId);

    if (selectedItemElement) {
        let newCurrencyCode;
        if (type === 'mt') {
            newCurrencyCode = selectedItemElement.getAttribute('currency').toUpperCase();
            let countryName = selectedItemElement.getAttribute('value');

            if (newCurrencyCode === 'USD' && countryName !== 'united states') {
                document.querySelector('#mtCountryAlert').style.display = 'flex'
                document.querySelector('#mtCountryAlertText').textContent = `All transfers to ${capitalizeFirstLetter(countryName)} are processed in US Dollars. Please enter the equivalent amount in USD.`
            } else {
                document.querySelector('#mtCountryAlert').style.display = 'none'

            }
            mtCurrency = newCurrencyCode
        } else if (type === 'fx') {
            newCurrencyCode = selectedItemElement.getAttribute('value').toUpperCase();
        }

        const newCurrencySymbol = currencySymbols[newCurrencyCode] || '';

        // Determine the appropriate suffix based on the type ('mt' or 'fx')
        const suffix = type === 'mt' ? 'Mt' : '';

        // Update the currency symbol in the input field
        const amountField = document.querySelector(`#widgetAmount${suffix}`);
        const currentAmount = amountField.value.replace(/^\D+/, ''); // Remove the existing currency symbol

        // Set the new value with the updated currency symbol
        amountField.value = `${newCurrencySymbol} ${currentAmount.trim()}`;

        // Update the displayed currency name
        document.querySelector(`#currencyName${suffix}`).textContent = newCurrencyCode;
    } else {
        console.error(`No selected item found in dropdown ${dropdownId}`);
    }
}