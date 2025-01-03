

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

document.querySelector('#changeNumberBtn').addEventListener('click', revertScreen)

document.querySelector('#otpVerify').addEventListener('click', verifyOtp)
let token = sessionStorage.getItem('token')

let otpInputs = document.querySelectorAll('.otpInputBlock input');
document.querySelector('#mobNumber').focus()
function sendOtp() {
    console.log('ccc')
    document.querySelector('#sendOtpMain').style.display = 'none'

    document.querySelector('#verifyOtpMain').style.display = 'flex'
}

function revertScreen() {
    document.querySelector('#sendOtpMain').style.display = 'flex'

    document.querySelector('#verifyOtpMain').style.display = 'none'
}


let mobNumber;
let countryCode;
function sendOtp() {
    console.log('bbbb')

    mobNumber = document.querySelector('#mobNumber');
    let otpInputContainer = document.querySelector('#otpInputContainer');
    countryCode = getSelectedDropdownItemElement('contryCodeMain').getAttribute('mob-code');

// Remove the '+' if it exists at the start of the string
countryCode = countryCode.replace(/^\+/, ''); 

    

    console.log(mobNumber.value)
    
    // Check if the mobile number value exists and is a valid number
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
                action: 'user_login_otp',
                mode:otpMode,
                country_code: countryCode,
                mobile: mobNumber.value
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

function verifyOtp() {

    let fetchOtp = getOtpValue()

    console.log(fetchOtp.length)
    console.log(fetchOtp)
    console.log(token);
    
    var aff_token = getCookie('etmref');

    let otpContainer = document.querySelector('.otpInputBlock')
    if (fetchOtp.length < 4) {
        insertAlertBelowElement(otpContainer, 'Enter a valid OTP');
        return
    } else {
        removeAlertBelowElement(otpContainer)
    }

    (async () => {
        loadinggg(true)
        try {
            const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
            const params = new URLSearchParams({
                action: 'user_login_validate',
                otp: fetchOtp,
                mobile:mobNumber.value,
                country_code:countryCode,
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


            console.log({
                action: 'user_login_validate',
                otp: fetchOtp,
                mobile:mobNumber.value,
                country_code:countryCode
            })
            
            const resp = await response.json();  // Use await to handle the promise returned by response.json()
            console.log(resp, 'resp.verified')

            if (resp.status) {

                console.log(resp,'bbvv')
                
                const userInfo = {
                    userId: resp.uid,
                    countryCode: resp.country_code,
                    mobNum: resp.mobile
                };

                // Store the object as a JSON string
                localStorage.setItem('userInfo', JSON.stringify(userInfo));

                
                window.location.href = document.referrer;
            }
            else{
                loadinggg(false)
                insertAlertBelowElement(otpContainer, 'Incorrect OTP');
                return
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            location.href = '/error.html'
        }
    })();
}



// Add event listener for Enter key press
document.querySelector('#mobNumber').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();  // Prevent form submission or other default actions
        sendOtp();  // Call the same sendOtp function on Enter key press
    }
});


otpInputs[3].addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        event.preventDefault();  // Prevent form submission or other default actions

        verifyOtp()
    }
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



