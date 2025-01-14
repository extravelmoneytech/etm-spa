
let nextPageUrl='/orderv2/Review&Payment'
// Then on the previous page, use this to detect when the page is revisited
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        // Force reload if the page is cached
        window.location.reload();
    }
});
if(!userCheck()){
    window.location.href='/'
}

// Retrieve token from sessionStorage
let token = sessionStorage.getItem('token');
let productType = sessionStorage.getItem('productPage')
let universityContainerActive=true;
console.log(localStorage.getItem('userInfo'), 'vvcc')
document.addEventListener('DOMContentLoaded', async () => {

    loadinggg(true)
    try {
       
        const params = new URLSearchParams({
            action: 'get_contact_details',  // Removed extra whitespace
            token: token
        });

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
            
        }

        const resp = await response.json();

        if (resp) {
            console.log(resp,'respp');  // Handle the response


            console.log(productType)
            if (productType === 'mt') {
                if(resp.mt_purpose==='mcr'||resp.mt_purpose==='gr'){
                   document.querySelector('#universityNameContainer').style.display="none"
                   universityContainerActive=false;
                }
                
                if (resp.areas.length == 0) {
                    document.querySelector('#branchDropDownContainer').style.display = 'none'
                } else {
                    const areas = resp.areas;
                    const dropdownList = document.querySelector('#branchDropDown');
                    const templateItem = document.querySelector('#branchDropdownItem');


                    // Ensure the template item is hidden
                    templateItem.style.display = 'none';

                    templateItem.classList.remove('template')

                    // Remove all existing items except the template
                    dropdownList.querySelectorAll('.dropdownItem:not([value="template"])').forEach(item => item.remove());

                    // Add an initial "Select" option with a null value
                    const selectItem = templateItem.cloneNode(true);
                    selectItem.style.display = 'flex';  // Make the cloned item visible
                    selectItem.setAttribute('value', 'none');  // Set value to an empty string (null equivalent)
                    selectItem.querySelector('span').textContent = 'Select Branch';  // Set the text to 'Select'
                    dropdownList.appendChild(selectItem);  // Append the "Select" item to the dropdown

                    // Populate the dropdown list with cities
                    areas.forEach(area => {
                        // Clone the template item
                        const newItem = templateItem.cloneNode(true);
                        newItem.style.display = 'flex';  // Make the cloned item visible
                        newItem.setAttribute('value', area);  // Set the value attribute
                        newItem.querySelector('span').textContent = `${area}`;  // Update city name

                        // Append the new item to the dropdown list
                        dropdownList.appendChild(newItem);
                    });


                    // Call the function after the list is fully updated
                    const dropdownMain = document.querySelector('#branchDropDownMain');
                    selectFirstDropdownItem(dropdownMain);
                }

                console.log(resp.kyc_list)
                finalUpdateDocuments(resp.kyc_list)
            }

            document.querySelector('#customerMobile').querySelector('span').textContent = resp.mobile
            document.querySelector('#customerName').value = resp.customer_name
            document.querySelector('#customerEmail').value = resp.customer_email
            sessionStorage.setItem('customerName', resp.customer_name)


            loadinggg(false)

        }
    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='error.html'

    }
});















const documentsData = {
    education: [
        "Passport",
        "Pan Card",
        "Confirmed Air Ticket",
        "Valid Visa",
        "University Admission Letter"
    ],
    immigration: [
        "Passport",
        "Pan Card",
        "Confirmed Air Ticket",
        "Valid Visa",
        "Immigration Letter"
    ],
    employment: [
        "Passport",
        "Pan Card",
        "Confirmed Air Ticket",
        "Valid Visa",
        "Work Contract Letter"
    ],
    holidayLeisure: [
        "Passport",
        "Pan Card",
        "Onward Air Ticket",
        "Valid Visa",
        "Return Air Ticket"
    ]
};

const purposeSelect = document.getElementById('purposeSelector');
const documentListContainer = document.getElementById('document-list');

function updateDocumentList(purpose) {
    console.log(purpose, 'prpsx')
    // Clear existing documents
    documentListContainer.innerHTML = '';

    // Get documents for the selected purpose
    const selectedDocuments = documentsData[purpose] || [];

    finalUpdateDocuments(selectedDocuments)


}

function finalUpdateDocuments(selectedDocuments) {
    console.log(selectedDocuments, 'ffffccc')

    // Update the DOM with new documents (only names)
    selectedDocuments.forEach((doc, index) => {
        const docElement = document.createElement('p');
        docElement.className = 'text-black text-sm font-normal';  // Tailwind CSS classes
        docElement.textContent = `${index + 1}. ${doc}`;

        // Append document to the documentListContainer
        documentListContainer.appendChild(docElement);
    });
}


// Event listener to update the document list when the user selects a different purpose
if (productType === 'fx') {
    if (purposeSelect) {

        // Create a MutationObserver to watch for changes to the 'dataVal' attribute
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'dataval') {
                    // When 'dataVal' changes, trigger your callback function
                    const newValue = purposeSelect.getAttribute('dataVal');
                    updateDocumentList(newValue)
                    // Call the callback or any custom logic here

                }
            });
        });

        // Start observing changes to attributes on purposeSelector
        observer.observe(purposeSelect, {
            attributes: true, // Watch for attribute changes
        });
    }
}





purposeSelect.addEventListener('dropdownChange', (event) => {

    const selectedPurpose = purposeSelect.getAttribute('dataval');
    console.log(selectedPurpose)
    if (selectedPurpose !== 'default') {
        updateDocumentList(selectedPurpose);
    } else {
        documentListContainer.innerHTML = '';
    }
});






document.querySelector('#contactUpdateBtn').addEventListener('click', async () => {

    // Gather input values from the form
    const fullName = document.querySelector('#customerName').value;
    const email = document.querySelector('#customerEmail').value;
    const token = sessionStorage.getItem('token');

    let travelDate = '';
    let purpose = '';
    let branch = '';
    let universityName = '';
    let formattedDate = '';
    // Check the product type and gather additional required inputs
    if (productType === 'fx') {
        travelDate = sessionStorage.getItem('selectedDate');


        // Step 2: Check if travelDate is valid
        if (travelDate) {
            // Step 3: Create a Date object from the string
            const dateObj = new Date(travelDate);  // Even with full string, Date constructor works

            // Step 4: Extract day, month, and year from the Date object
            const day = String(dateObj.getDate()).padStart(2, '0');  // Two digits for day
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');  // Two digits for month, add 1 because months are 0-indexed
            const year = dateObj.getFullYear();  // Full year (e.g., 2024)

            // Step 5: Format as dd-mm-yyyy
            formattedDate = `${day}-${month}-${year}`;

            // Log or use the formatted date
            console.log(formattedDate);  // Output will be in dd-mm-yyyy format
        } else {
            console.log("No valid travel date found in sessionStorage");
        }


        purpose = document.querySelector('#purposeSelector').getAttribute('dataval');
        sessionStorage.setItem('fxPurpose', purpose)
    } else if (productType === 'mt') {
        branch = document.querySelector('#branchDropDownMain').getAttribute('dataval');
        console.log(branch)
        
        if(universityContainerActive){
            universityName = document.querySelector('#universityName').value;
        let elem = document.querySelector('#universityName');

        // if (!universityName || universityName === "") {
        //     insertAlertBelowElement(elem, 'Please Enter a valid university name');
        //     return;
        // } else {
        //     removeAlertBelowElement(elem);
        // }
        
        }
        


        if(branch==="none"){
            insertAlertBelowElement(document.querySelector('#branchDropDownMain'),'Select a Branch')
            return
        }
        else{
            removeAlertBelowElement(document.querySelector('#branchDropDownMain'))
        }
        
    }

    // Basic validation to ensure all fields are filled
    let elem = document.querySelector('#customerName');
    // Regular expression for validating name
    const namePattern = /^[A-Za-z.\s]+$/;

    if (!fullName || !namePattern.test(fullName)) {
    insertAlertBelowElement(elem, 'Please enter a valid name');
    return;
    } else {
    removeAlertBelowElement(elem);
    }


    let elem2 = document.querySelector('#customerEmail');
    // Regular expression for basic email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email || !emailPattern.test(email)) {
    insertAlertBelowElement(elem2, 'Please enter a valid email');
    return;
    } else {
    removeAlertBelowElement(elem2);
    }




    loadinggg(true)

    console.log({
        action: 'save_contact_details', // API action for saving contact details
        token: token,
        full_name: fullName,
        email: email,
        travel_date: formattedDate,
        purpose: purpose,
    })

    
    try {
       
        let params;

        if (productType === 'fx') {
            params = new URLSearchParams({
                action: 'save_contact_details', // API action for saving contact details
                token: token,
                full_name: fullName,
                email: email,
                travel_date: formattedDate,
                purpose: purpose,
            });
        } else if (productType === 'mt') {
            params = new URLSearchParams({
                action: 'save_contact_details', // API action for saving contact details
                token: token,
                full_name: fullName,
                email: email,
                selected_area: branch,
                univ_name: universityName
            });
        }

        console.log(params.toString())

        // Make the POST request to save contact details
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const resp = await response.json();

        if (resp.status) {
            console.log(resp)
            sessionStorage.setItem('customerName', resp.customer_name)
            // Redirect to the next page if the request is successful
            location.href = nextPageUrl
            setTimeout(() => {
                loadinggg(false)
            }, 2000);
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='error.html'
    }
});



