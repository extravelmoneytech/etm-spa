if(!userCheck()){
    window.location.href='/login'
}
console.log(userInfoCheck,"userInfoCheck");
// Function to make the API call
function makeApiCall(uid, orderNo, txn) {
    loadinggg(true)
    
    const apiUrl = 'https://mvc.extravelmoney.com/api-etm/'; 

    const paramsData = {
        action: 'get_user_personal_data',
        mobile: userInfoCheck.mobNum,
        country_code: userInfoCheck.countryCode,
        uid: userInfoCheck.userId
    };

    const params = new URLSearchParams(paramsData);

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: params.toString(),
    })
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);
            populateFormFields(data)
            loadinggg(false)
        })
        .catch(error => {
            console.error('Error during API call:', error);
        });
}
makeApiCall()

function populateFormFields(apiResponse) {
    // Personal Details
    document.getElementById('firstName').value = apiResponse.first_name;
    document.getElementById('lastName').value = apiResponse.last_name;
    
    // Category dropdown - Compare after removing whitespace and converting to lowercase
    const categorySelect = document.getElementById('category');
    const normalizedCategory = apiResponse.category.toLowerCase().replace(/\s+/g, '');
    Array.from(categorySelect.options).forEach(option => {
        if (option.text.toLowerCase().replace(/\s+/g, '') === normalizedCategory) {
            option.selected = true;
        }
    });
    
    // Bank Details
    document.getElementById('bankName').value = apiResponse.bank_name;
    document.getElementById('accountNumber').value = apiResponse.bank_acno;
    document.getElementById('ifscCode').value = apiResponse.bank_ifsc;
    document.getElementById('panNumber').value = apiResponse.pan;
    
    // Contact Details
    document.getElementById('mobileNumber').value=userInfoCheck.mobNum
    document.getElementById('emailId').value = apiResponse.customer_email;
    
    // Notifications Via dropdown
    const notificationsSelect = document.getElementById('notificationsVia');
    if (apiResponse.whatsapp === "0") {
        notificationsSelect.value = "WhatsApp & Email";
    } else {
        notificationsSelect.value = "Sms & Email";
    }
}

// Save profile function
function saveUserProfile() {
    // Basic validation for first name, last name and email
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('emailId').value.trim();


    let firstNameContainer = document.querySelector('#firstName')
let lastNameContainer = document.querySelector('#lastName') 
let emailContainer = document.querySelector('#emailId')

// Check for empty fields
    if (!firstName) {
        insertAlertBelowElement(firstNameContainer, 'First name cannot be empty')
        firstNameContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('First name cannot be empty');
        return;
    } else {
        removeAlertBelowElement(firstNameContainer)
    }

    if (!lastName) {
        insertAlertBelowElement(lastNameContainer, 'Last name cannot be empty')
        lastNameContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('Last name cannot be empty');
        return;
    } else {
        removeAlertBelowElement(lastNameContainer)
    }

    if (!email) {
        insertAlertBelowElement(emailContainer, 'Email cannot be empty')
        emailContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('Email cannot be empty');
        return;
    } else {
        removeAlertBelowElement(emailContainer)
    }

    // Name validation - only letters and spaces allowed 
    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(firstName)) {
        insertAlertBelowElement(firstNameContainer, 'Invalid first name: Only letters and spaces allowed')
        firstNameContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('Invalid first name: Only letters and spaces allowed');
        return;
    } else {
        removeAlertBelowElement(firstNameContainer)
    }

    if (!nameRegex.test(lastName)) {
        insertAlertBelowElement(lastNameContainer, 'Invalid last name: Only letters and spaces allowed')
        lastNameContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('Invalid last name: Only letters and spaces allowed');
        return;
    } else {
        removeAlertBelowElement(lastNameContainer)
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        insertAlertBelowElement(emailContainer, 'Invalid email format')
        emailContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
        console.log('Invalid email format');
        return;
    } else {
        removeAlertBelowElement(emailContainer)
    }

    loadinggg(true)
    const payload = {
        action: 'save_user_personal_data',
        mobile: document.getElementById('mobileNumber').value,
        country_code: userInfoCheck.countryCode,
        uid: userInfoCheck.userId, 
        fname: document.getElementById('firstName').value,
        lname: document.getElementById('lastName').value,
        email: document.getElementById('emailId').value,
        user_acno: document.getElementById('accountNumber').value,
        user_ifsc: document.getElementById('ifscCode').value,
        user_bank: document.getElementById('bankName').value,
        user_pan: document.getElementById('panNumber').value,
        user_class: document.getElementById('category').value,
        whatsapp: document.getElementById('notificationsVia').value === 'WhatsApp & Email' ? '1' : '0'
    };
    const params = new URLSearchParams(payload);
    console.log(payload)
    const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: params.toString(),
    })
    .then(response => response.json())
        .then(data => {
            console.log('API Response22:', data);
            
            loadinggg(false)
            if(data.status){
                
                showSuccessPopup()
            }
        })
    
    .catch(error => {
        console.error('Error:', error);
    });
}

document.getElementById('saveProfile').addEventListener('click', saveUserProfile);

let backBtn=document.querySelector(".ProfileArrow")
  backBtn.addEventListener('click',()=>{
        window.history.back()
        
  })
  
  
  function showSuccessPopup(message = 'Profile saved successfully!') {
    // Create popup container
    const popup = document.createElement('div');
    popup.className = 'success-popup';
    
    // Add checkmark SVG
    popup.innerHTML = `
        <svg class="checkmark" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        <span>${message}</span>
    `;
    
    // Add to document
    document.body.appendChild(popup);
    
    // Remove after delay
    setTimeout(() => {
        popup.classList.add('fade-out');
        setTimeout(() => {
            document.body.removeChild(popup);
        }, 300); // Wait for fade out animation
    }, 2000); // Show for 2 seconds
}
