let nextPageUrl='/orderv2/Delivery-Details'
let nextPageUrlMt='/orderv2/Contact-Details/'
// Then on the previous page, use this to detect when the page is revisited
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        // Force reload if the page is cached
        window.location.reload();
    }
});



const token = sessionStorage.getItem('token');

console.log(token,'tokken')

if (sessionStorage.getItem('productPage') === 'fx') {



    // Retrieve the stored data from sessionStorage
    const storedDataJSON = sessionStorage.getItem('storedData');

    let productData = [];
    // Mapping of currency codes to their formal names
    const currencyNames = {
        USD: "United States Dollar",
        GBP: "British Pound",
        AUD: "Australian Dollar",
        CAD: "Canadian Dollar",
        EUR: "Euro",
        JPY: "Japanese Yen",
        MYR: "Malaysian Ringgit",
        NZD: "New Zealand Dollar",
        SGD: "Singapore Dollar",
        THB: "Thai Baht",
        AED: "United Arab Emirates Dirham"
    };

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
    let rowId;
    let grandTotal;
    let buyCity;
    // Check if the stored data and token exist
    if (storedDataJSON && token) {
        loadinggg(true)
        // Parse the JSON string back into a JavaScript object
        const storedData = JSON.parse(storedDataJSON);

        console.log(storedData, 'jhj')

        // Access the data from the object
        const widgetProduct = storedData[0].widgetProduct;
        const widgetAmount = storedData[0].widgetAmount;
        buyCity = storedData[0].city;
        console.log(buyCity, 'buycity')
        const currencyCode = storedData[0].widgetCurrency;
        const recommendationText = storedData[0].recommendationText;



        // Format the widgetCurrency value
        const formattedWidgetCurrency = currencyNames[currencyCode]
            ? `${currencyNames[currencyCode]} (${currencyCode})`
            : currencyCode; // Default to code if not found

        // Update static content
        document.querySelector('.buyProduct').textContent = widgetProduct;
        document.querySelector('.buyCurrency').textContent = formattedWidgetCurrency;
        document.querySelector('.buyAmount').value = widgetAmount;

        // Handle recommendation text visibility
        if (!recommendationText || recommendationText.trim() === '') {
            document.querySelector('#recommendationTextContainer').style.display = 'none';
        } else {
            document.querySelector('#recommendationText').textContent = recommendationText;
            document.querySelector('#recommendationTextContainer').style.display = 'flex';
        }



        const params = new URLSearchParams({
            action: 'get_city_rate',
            token: token,
            city: buyCity
        });

        fetch('https://mvc.extravelmoney.com/api-etm/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        })
            .then(response => response.json())
            .then(data => {
                console.log(data, 'mbcx')
                if (data.products) {
                    grandTotal=data.grand_total
                    addCard(data.products)
                    
                }


                loadinggg(false)

            })
            .catch((error) => {
                console.error('Error:', error);
                // location.href='error.html'
            });


    } else {
        console.log('No data found in sessionStorage.');
    }


    let nextBtn = document.querySelector('#bestRatesFetchBtn');

    nextBtn.addEventListener('click', () => {
        
        if(grandTotal<8000){
            insertAlertBelowElement(nextBtn,'Please enter a minimum amount of USD 100 or its equivalent')
            return
        }
        
        if(grandTotal>maximumForexCardValue){
            insertAlertBelowElement(nextBtn,'High-roller alert! Your total Forex value is greater than $250,000, which is the maximum amount a single person is allowed to carry/remit by the RBI.')
            return
        }else{
            removeAlertBelowElement(nextBtn)
        }
        
        

        if (userCheck()) {


            location.href = nextPageUrl

        } else {
            console.log('not a user, verification required')
            openOtpWidget()
        }

    });






    let addCurrencyCardBtn = document.querySelector('#addCurrencyCardBtn');
    let addForexCardBtn = document.querySelector('#addForexCardBtn');
    let maxCards = 3;
    let maximumForexCardValue;
    let productAdder = document.querySelector('#productAdder');

    // Check if the item exists in sessionStorage before parsing
    const storedIbrData = sessionStorage.getItem('ibrData');
    console.log(storedIbrData,'nnbbvv')
    let parsedData;

    if (storedIbrData) {
        console.log('trueH')
        // Parse and use the data if it exists
        parsedData = JSON.parse(storedIbrData);
        maximumForexCardValue=250000*parsedData.USD.currency;
        console.log(parsedData, 'parsedData')
    }

    addCurrencyCardBtn.addEventListener('click', () => {
        productAdder.style.display = 'flex'
        forceSelectDropdownItem('cardProduct', 'currency')
        updateProdAddCard()

    });

    addForexCardBtn.addEventListener('click', () => {
        productAdder.style.display = 'flex'
        forceSelectDropdownItem('cardProduct', 'forexCard')
        updateProdAddCard()
    });

    let productAdderCloseBtn = document.querySelector('#productAdderCloseBtn');

    productAdderCloseBtn.addEventListener('click', () => {
        productAdder.style.display = 'none'
    })

    document.querySelector('#prodCardAddBtn').addEventListener('click', async () => {
        loadinggg(true)

        let product = document.querySelector('#cardProduct').getAttribute('dataval');
        let currency = document.querySelector('#cardCurrency').getAttribute('dataval');
        let prodAddAmntValue=document.querySelector('#prodAddAmnt').value;

        if (product === 'forexCard') {
            product = 'Forex Card'
        }
        else if (product === 'currency') {
            product = 'Currency'
        }
        console.log(product, 'pp products')



        try {
            const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';

            const params = new URLSearchParams({
                action: 'add_remove_product',
                token: token,  // Make sure token is defined
                transaction: 'buy',
                currency: currency,
                product: product,
                amount: prodAddAmntValue,
                function: 'add'
            });

            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params.toString(),
            });

            if (!response.ok) {
                // Throw detailed error if response is not OK
                throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
            }

            const resp = await response.json();
            console.log(resp, 'newresp');
            if (resp.products) {
                grandTotal=resp.grand_total
                addCard(resp.products)
            }

            productAdder.style.display = 'none'
            loadinggg(false)
        } catch (error) {
            console.error('Error fetching data:', error);
            // Optionally redirect to an error page
            // location.href = 'error.html';
        }
    });




    function addCard(data) {
        productData = data
        console.log(data, 'adding cards');
        renderCartItems(data);

        let templateCard = document.getElementById('prodCardTemplate');
        console.log(templateCard);

        let container = document.querySelector('.prodCardContainer'); // Get the container
        container.innerHTML = ''; // Clear container before appending new cards

        // Loop through each item in the data array
        data.forEach((item) => {
            console.log(item); // Log each data item

            let newCard = templateCard.cloneNode(true); // Clone the template card
            newCard.setAttribute('rowId', item.rowID); // Set rowID
            newCard.style.display = 'block'; // Make the cloned card visible

            newCard.querySelector('.buyProduct').textContent = item.productType


            // Set the card note with market rate and city info
            newCard.querySelector('#cardNote').innerHTML = `The current market rate of <span class="currencyCode">${item.currency}</span> per 1 unit is <b>${item.rate}</b> Indian rupees in <b>${buyCity}</b>`;

            newCard.querySelector('#cardCurrencyName').textContent=item.currency;
            
            // Format the currency value
            const formattedWidgetCurrency = currencyNames[item.currency]
                ? `${currencyNames[item.currency]} (${item.currency})`
                : item.currency; // Use currency code if name not found
            newCard.querySelector('.buyCurrency').textContent = formattedWidgetCurrency;

            // Set INR rate and input event listener
            let inrRate = newCard.querySelector('#inrRate');
            let input = newCard.querySelector('#currencyInput');

            input.value = currencySymbols[item.currency] + " " + item.amount
            inrRate.textContent = '₹' + formatIndianCurrency(item.totalINR);

            input.addEventListener('input', () => {
                const currentAmount = input.value.replace(/^\D+/, ''); // Remove currency symbol
                let finalAmount = currentAmount * item.rate;
                inrRate.textContent = '₹' + formatIndianCurrency(finalAmount.toFixed(0));

                console.log(productData, 'pdData')

                // Update the productData array by modifying the object with the matching rowID
                productData = productData.map(product => {
                    if (product.rowID === item.rowID) {
                        // Update only the amount field for the matching product
                        return { 
                            ...product, 
                            amount: currentAmount, 
                            totalINR: finalAmount 
                        };
                    }
                    return product; // Return the other products unchanged
                });

                console.log(productData, 'updatedProductData'); // Log the updated productData array
                renderCartItems(productData);


                // Declare and immediately invoke the async function
                (async () => {
                    try {
                        const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
                        const params = new URLSearchParams({
                            action: 'save_amount',
                            token: token,  // Ensure token is defined
                            rowID: item.rowID,
                            amount: currentAmount
                        });

                        const response = await fetch(apiUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: params.toString(),
                        });

                        if (!response.ok) {
                            // Detailed error message
                            throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
                        }

                        const resp = await response.json();
                        if (resp.status) {
                            
                            grandTotal=resp.grand_total



                            console.log(resp);  // Log the API response if successful
                        }
                    } catch (error) {
                        console.error('Error fetching data:', error);
                        // Optionally, redirect to an error page
                        // location.href = 'error.html';
                    }
                })();  // Immediately invoke the async function
            });


            console.log(data.length, 'mnbv')
            if (data.length == 1) {
                newCard.querySelector('#deleteCard').style.display = 'none'
            } else {
                newCard.querySelector('#deleteCard').style.display = 'block'
                // Async event listener for delete button
                newCard.querySelector('#deleteCard').addEventListener('click', async () => {
                    loadinggg(true)

                    try {
                        const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';

                        const params = new URLSearchParams({
                            action: 'add_remove_product',
                            token: token,  // Ensure token is defined
                            transaction: 'buy',
                            function: 'remove',
                            rowID: newCard.getAttribute('rowId')
                        });

                        const response = await fetch(apiUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: params.toString(),
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
                        }

                        const resp = await response.json();
                        console.log('API response:', resp);

                        // Refresh the cards with the updated product list
                        addCard(resp.products);
                        loadinggg(false)

                    } catch (error) {
                        console.error('Error fetching data:', error);
                        // Optionally, redirect or show an error message
                    }

                });
            }


            // Append the new card to the container
            container.append(newCard);

            if (data.length >= maxCards) {
                document.querySelector('#addBtnContainer').style.display = 'none'
            } else {
                document.querySelector('#addBtnContainer').style.display = 'block'
            }
        });

        console.log('All cards added');
    }




    document.querySelector('#cardProduct').addEventListener('dropdownChange', () => {
        updateProdAddCard()

    })
    document.querySelector('#cardCurrency').addEventListener('dropdownChange', () => {
        updateProdAddCard()

    })


    function updateProdAddCard() {
        
        
        const noForexCardCurrencies = ["MYR", "NZD"];
        
        
        
        

        let product = document.querySelector('#cardProduct').getAttribute('dataval');
        
        
        updateCurrencyList(product)
        
        
        
        
        let currency = document.querySelector('#cardCurrency').getAttribute('dataval');
        let currencyValue=document.querySelector("#prodAddAmnt").value;
        
        

        document.querySelector('#ProdAddcurrencyCode').textContent = currency;
        document.querySelector('#currencyCode').textContent = currency;
        let inrValue = parsedData[currency][product] * currencyValue
        
        
        document.querySelector('#prodAddAmnt').addEventListener('input',()=>{
            
            let currencyValue=document.querySelector("#prodAddAmnt").value;
            
            document.querySelector("#prodAddQuantity").textContent=currencyValue
            
            let inrValue = parsedData[currency][product] * currencyValue
            
            updateAmount(inrValue);
        })
        
        updateAmount(inrValue)
    }
    
    function updateAmount(inrValue){
        console.log(inrValue)
        document.querySelector('#prodAddInrValue').textContent = formatIndianCurrency(inrValue.toFixed(0)) + ' INR'
    }
    
    function updateCurrencyList(product) {
    
    let dropdownList=document.querySelector('#cardCurrency').querySelector('.dropdownList')
    
    if (product === 'forexCard') {
        // Array of currency codes without Forex card
        const noForexCardCurrencies = ["MYR", "NZD"];
        
        // Loop through each <li> element in the dropdown and hide if it matches an item in the array
        
        
        dropdownList.querySelectorAll('li').forEach(li => {
            const currencyName = li.getAttribute('value');
            
            if (noForexCardCurrencies.includes(currencyName)) {
                console.log(li);
                li.style.display = 'none';
            }
        });
        
        
        let dropDownMain=document.querySelector('#cardCurrency')
        updateFromSession(dropDownMain)
        
    } else if (product === 'currency') {
        dropdownList.querySelectorAll('li').forEach(li => {
            li.style.display = 'flex';
        }); // Added missing closing parenthesis here
    }
}




}




if (sessionStorage.getItem('productPage') === 'mt') {
    loadinggg(true)

    let mtCity = sessionStorage.getItem('mtCity')
    let purpose;
    const params = new URLSearchParams({
        action: 'get_city_rate_mt',
        token: token,
        city: mtCity
    });

    fetch('https://mvc.extravelmoney.com/api-etm/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: params.toString(),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data,'respp')
            purpose=data.purpose;
            generateCards(data.store_list);
            document.querySelector('#mtSavings').textContent = data.savings
            loadinggg(false)
        })
        .catch((error) => {
            console.error('Error:', error);
            // location.href='error.html'
        });



    // Function to generate and insert cards based on API data
    function generateCards(data) {
        
        // Get the template and container
        const template = document.getElementById('mtcardTemplate');
        const container = document.getElementById('mtcardContainer');

        // Loop through each item in the API response
        data.forEach(item => {
            console.log(item)
            // Clone the template card
            const clone = template.cloneNode(true);
            clone.style.display = 'block'; // Make it visible

            // Set the storeID as a data-val attribute
            clone.setAttribute('data-val', item.storeID);

            // Populate the card with the API data
            clone.querySelector('.bank-logo').src = `../../public/images/logo/${item.logo}.svg?ver=1.4`; // Assuming logo images are stored by vendor name
            clone.querySelector('.bank-name').textContent = item.vendor_name;
            // if(item.logo==="ets"){
                
            //     clone.querySelector('.payment-method1').textContent = 'Online Payment';
                
                
            // }else{
            //      clone.querySelector('.payment-method1').style.display="none"
                 
            // }
            // clone.querySelector('.payment-method2').textContent = 'NEFT/RTGS';
            
            if(item.logo==="ets"){
                if(purpose==="oe"){
                    clone.querySelector('.supported-services').textContent = 'Supports Flywire, Convera, PayMyTuition';
                }
            }else{
                 clone.querySelector('.supported-services').style.display="none"
            }
            clone.querySelector('.bank-charges').textContent = `₹ ${item.bank_charges} ${item.zero_benf_bank_charge?'(Covers Intermediary Bank Charges)':'(Intermediary Bank Charges Not Covered)'}`;

            const formattedTotalAmount = formatIndianCurrency(item.inr_total.toFixed(2));
            clone.querySelector('.total-amount').textContent = `₹ ${formattedTotalAmount}`;

            // Add event listener to the "Select" button
            const selectButton = clone.querySelector('.select-button');

            selectButton.addEventListener('click', () => {


                const params = new URLSearchParams({
                    action: 'select_store_mt',
                    token: token,
                    storeID: item.storeID
                });

                fetch('https://mvc.extravelmoney.com/api-etm/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: params.toString(),
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        // location.href='error.html'
                    });

                if (userCheck()) {
                    location.href = nextPageUrlMt
                }
                else {

                    userCheck()
                    openOtpWidget()

                }

            });

            // Add the clone to the container
            container.appendChild(clone);
        });
    }
}

if (!token){
    console.log('hihih')
    // window.location.href='/error.html'
}














let chooseCityOverlay = document.querySelector('.chooseCityOverlay');
let otpWidget = document.querySelector('.otpWidget'); // Assuming this is the OTP widget element

chooseCityOverlay.addEventListener('click', (event) => {
    // Check if the click is outside the otpWidget
    if (!otpWidget.contains(event.target)) {
        closeOtpWidget(); // Only close if the click was outside the otpWidget
    }
});




function openOtpWidget() {
    window.scroll(0, 0)
    document.querySelector('.chooseCityOverlay').style.display = 'block';
    document.querySelector('body').classList.add('snipContainer');
    console.log(document.querySelector('body').classList)
    document.querySelector('.otpWidget').style.display = 'flex';
    document.querySelector('#mobNumber').focus()


}
function closeOtpWidget() {
    document.querySelector('.chooseCityOverlay').style.display = 'none';
    document.querySelector('body').classList.remove('snipContainer');
    document.querySelector('.otpWidget').style.display = 'none';




}
let otpInputs = document.querySelectorAll('.otpInputBlock input');
// Wrap the logic inside a function
function sendOtp() {


    let mobNumber = document.querySelector('#mobNumber');
    let otpInputContainer = document.querySelector('#otpMobileContainer');
    let countryCode = getSelectedDropdownItemElement('contryCodeMain').getAttribute('mob-code');
    countryCode = countryCode.substring(1);
    console.log('countryCode', countryCode);

    

    
if (countryCode === "91" && mobNumber.value.length !== 10) {
    insertAlertBelowElement(otpInputContainer, 'Invalid mobile number');
    return;
} else if (mobNumber.value === "" || !/^\d+$/.test(mobNumber.value)) {
    insertAlertBelowElement(otpInputContainer, 'Invalid mobile number');
    return;
} else {
    removeAlertBelowElement(otpInputContainer);
}



    // Async function for sending OTP
    (async () => {
        loadinggg(true)
        try {
            const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
            const params = new URLSearchParams({
                action: 'send_otp',
                token: token,  // Assuming `token` is defined elsewhere in your code
                country_code: countryCode,
                mobile: mobNumber.value,
                mode:otpMode
            });

            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params.toString(),
            });

            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

            const resp = await response.json();  // Use await to handle the promise returned by response.json()
            if (resp.status) {
                console.log(resp);
                document.querySelector('#sendOtpMain').style.display = 'none';
                document.querySelector('#verifyOtpMain').style.display = 'flex';
                document.querySelector('#mobNum').textContent = countryCode + " " + mobNumber.value
                otpInputs[0].focus();
                activeResendOtp()
                loadinggg(false)
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            // location.href='error.html'
        }
    })();
}


let otpMode;
// Add event listener for otp sms click
document.querySelector('#optSend').addEventListener('click',()=>{
    otpMode='sms'
    sendOtp()
} );

// Add event listener for otp whatsapp click
document.querySelector('#whatsappOtpSend').addEventListener('click',()=>{
    otpMode='wa'
    sendOtp()
} );

// Add event listener for Enter key press
document.querySelector('#mobNumber').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();  // Prevent form submission or other default actions
        otpMode='wa'
        sendOtp();  // Call the same sendOtp function on Enter key press
    }
});


otpInputs[3].addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        event.preventDefault();  // Prevent form submission or other default actions

        verifyOtp()
    }
})


document.querySelector('#otpVerify').addEventListener('click', () => {
    verifyOtp()

})


function verifyOtp() {

    
    let fetchOtp = getOtpValue()

    console.log(fetchOtp.length)
    console.log(fetchOtp)
    console.log(token);


    var aff_token = getCookie('etmref');
    
    let otpContainer = document.querySelector('.otpInputBlock')
    removeAlertBelowElement(otpContainer)
    if (fetchOtp.length < 4) {
        insertAlertBelowElement(otpContainer, 'Enter a valid otp');
        return
    } else {
        removeAlertBelowElement(otpContainer)
    }
    
    
            
            

    (async () => {
        loadinggg(true)
        try {
            const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
            const params = new URLSearchParams({
                action: 'check_otp',
                token: token,
                otp: fetchOtp,
                aff_token:aff_token
            });

            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params.toString(),
            });

            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

            const resp = await response.json();  // Use await to handle the promise returned by response.json()
            console.log(resp, 'resp.verified')

            
            if (resp.verified) {

                console.log(resp,'bbvv')
                
                sessionStorage.setItem('userId', resp.uid)
                const userInfo = {
                    userId: resp.uid,
                    countryCode: resp.customer_country_code,
                    mobNum: resp.customer_mobile
                };

                // Store the object as a JSON string
                localStorage.setItem('userInfo', JSON.stringify(userInfo));


                closeOtpWidget()
                if (sessionStorage.getItem('productPage') === 'fx') {
                    location.href = nextPageUrl
                }
                else if (sessionStorage.getItem('productPage') === 'mt') {

                    location.href = nextPageUrlMt
                }
            }
            
            else{
                loadinggg(false)
                insertAlertBelowElement(otpContainer, 'Incorrect OTP');
                return
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            // location.href='error.html'
        }
    })();
}




document.querySelector('#changeNumberBtn').addEventListener('click', () => {

    otpInputs.forEach((input) => {
        input.value = ''// Clears each OTP input field
        input.style.backgroundColor = 'rgba(14, 81, 160, 0.1)';
    });
    document.querySelector('#sendOtpMain').style.display = 'flex'
    document.querySelector('#verifyOtpMain').style.display = 'none'
})


let isResendEnabled = true; // Flag to track if resend is enabled or disabled

let countdown; // Variable to store the countdown timer ID

function activeResendOtp() {
    let otpTimer = document.querySelector('.otpTimer');
    let resendBtn = document.querySelector('.otpResendBtn');
    let timeLeft = 30; // Start the countdown from 30 seconds
    let isResendEnabled = false; // Disable resend initially when timer starts

    // Clear any previous timer if it's running
    if (countdown) {
        clearInterval(countdown);
    }

    // Initialize the countdown timer
    countdown = setInterval(() => {
        otpTimer.textContent = `In ${timeLeft}s`; // Update the displayed time

        timeLeft--; // Decrease the time

        if (timeLeft < 0) {
            clearInterval(countdown); // Stop the countdown when it reaches 0
            otpTimer.style.display = 'none'; // Hide the timer
            resendBtn.style.opacity = '1';   // Make the resend button fully visible
            resendBtn.style.pointerEvents = 'auto'; // Enable clicking on the resend button
            isResendEnabled = true; // Enable resend when countdown ends
        }
    }, 1000); // Run this function every 1 second (1000ms)
}


// Adding click event listener to the resend span element
document.querySelector('.otpResendBtn').addEventListener('click', function () {
    if (isResendEnabled) { // Check if resend is enabled
        let otpTimer = document.querySelector('.otpTimer');
        let resendBtn = document.querySelector('.otpResendBtn');

        // Revert the changes
        otpTimer.style.display = 'block';       // Make the timer visible again
        resendBtn.style.opacity = '0.5';        // Reduce opacity to indicate it's disabled
        resendBtn.style.pointerEvents = 'none'; // Disable the resend button by blocking pointer events
        isResendEnabled = false;                // Disable further resends

        // Call the function to send OTP
        sendOtp();

        // Restart the countdown
        activeResendOtp();
    } else {
        console.log('Resend is disabled. Please wait for the timer.');
    }
});


