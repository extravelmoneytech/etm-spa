// otp functionality

// OTP functionality
const otpInputAll = document.querySelectorAll('.otpInputBlock input');
// Function to retrieve the OTP value from all input fields
function getOtpValue() {
    let otp = '';
    otpInputAll.forEach(input => {
        otp += input.value; // Concatenate each input's value
    });
    return otp;
}

document.addEventListener('DOMContentLoaded', function () {
    let inputs = otpInputAll;

    inputs.forEach((input, index) => {
        // Prevent non-numeric inputs on keydown
        input.addEventListener('keydown', (event) => {
            // Allow only numbers and control keys (like backspace)
            if (!/[0-9]/.test(event.key) && 
                event.key !== 'Backspace' && 
                event.key !== 'ArrowLeft' && 
                event.key !== 'ArrowRight' &&
                event.key !== 'Tab') {
                event.preventDefault();
            }
        });

        // Handle input event to limit to only one number
        input.addEventListener('input', (event) => {
            const currentInput = event.target;
            const inputValue = currentInput.value;

            // Remove any non-numeric characters
            currentInput.value = inputValue.replace(/\D/g, '');

            // Ensure only one character per input
            if (currentInput.value.length > 1) {
                currentInput.value = currentInput.value.slice(0, 1);
            }

            currentInput.style.backgroundColor = 'rgba(14, 81, 160, 1)'; // Set background opacity to 1

            // Move to the next input if any
            if (currentInput.value !== '' && index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else if (index === inputs.length - 1) {
                // Only log OTP if all inputs are filled
                if (areAllInputsFilled()) {
                    const otp = getOtpValue();
                    console.log('Final OTP:', otp); // Log the final OTP
                }
            }
        });

        input.addEventListener('keydown', (event) => {
            if (event.key === 'Backspace') {
                const currentInput = event.target;
                currentInput.style.backgroundColor = 'rgba(14, 81, 160, 0.1)'; // Reset background opacity

                if (currentInput.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            }
        });

        input.addEventListener('focus', (event) => {
            event.target.select(); // Select the input content when focused
        });
    });

    // Function to retrieve the OTP value from all input fields
    function getOtpValue() {
        let otp = '';
        inputs.forEach(input => {
            otp += input.value; // Concatenate each input's value
        });
        return otp;
    }

    // Function to check if all OTP input fields are filled
    function areAllInputsFilled() {
        return Array.from(inputs).every(input => input.value !== '');
    }
});






// Access the country data from intl-tel-input
const countryData = intlTelInputGlobals.getCountryData();

// Get the <ul> element where country codes will be appended
const countryCodeDropDown = document.getElementById("countryCodeDropDown");

// Sort the country data so that India appears first
countryData.sort((a, b) => {
  if (a.name === 'India') return -1;
  if (b.name === 'India') return 1;
  return 0;
});

// Iterate through the country data and generate the dropdown
countryData.forEach(country => {
    console.log(country)
  const dialCode = `+${country.dialCode}`;
  const countryName = country.name;  // Country name
  const countryISO = country.iso2.toUpperCase();  // ISO2 code

  
  // If the country is USA or India, log them for verification
  if (countryName.toLowerCase() === 'united states' || countryName.toLowerCase() === 'india') {
    console.log(`Found: ${countryName}`);
  }

  // Create <li> for each country
  const li = document.createElement("li");
  li.className = "text-sm";
  li.setAttribute('value', countryISO);
  li.setAttribute('alternativeName', countryName);
  li.setAttribute('mob-code', dialCode);
  // Set the innerHTML for each <li> with country name and dial code
  li.innerHTML = `<span>${dialCode}</span> <span> ${countryName}</span>`;

  // Append <li> to the dropdown
  countryCodeDropDown.appendChild(li);
});
forceSelectDropdownItem('contryCodeMain','IN')


document.querySelector('#contryCodeMain').addEventListener('dropdownChange', () => {
    let val = document.querySelector('#contryCodeMain').getAttribute('dataval');
    let optSendDiv = document.querySelector('#optSend');

    if (val != 'IN') {
        optSendDiv.style.display = 'none';            // Hide the div
        optSendDiv.style.pointerEvents = 'none';      // Disable pointer events
    } else {
        optSendDiv.style.display = 'inline-flex';     // Show the div
        optSendDiv.style.pointerEvents = 'auto';      // Enable pointer events
    }
});





