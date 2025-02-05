export const CONSTANTS = {
    ORDER_TYPES: {
        moneyTransfer: 'mt',
        forexTransfer: 'fx'
    },
    PRODUCT_TYPES: {
        currency: 'currency',
        forexCard: 'forexCard'
    },
    PROCESSING_STATES: {
        INITIAL_LOAD: 'initialDataLoading',
        ADDING_PRODUCT: 'addingProduct',
        EDITING_PRODUCT: 'editingProduct',
        DELETING_PRODUCT: 'deletingProduct',
        RATE_CALCULATION: 'exchangeRateCalculation',

    },
    ORDER_STATES: {
        GET_RATES: 'getRates',
        DELIVERY_DETAILS: 'deliveryDetails',
        CONTACT_DETAILS: 'contact_details',
        REVIEW_PAYMENT: 'reviewAndPayment'
    },
    TEMPLATE_NAMES: {
        FOREX_CONTAINER: 'forexContainerMain',
        MONEYTRANSFER_CONTAINER: 'mtContainerMain'
    }
};

export const currencyNames = {
    USD: "US Dollar",
    GBP: "British Pound",
    AUD: "Australian Dollar",
    CAD: "Canadian Dollar",
    EUR: "Euro",
    JPY: "Japanese Yen",
    MYR: "Malaysian Ringgit",
    NZD: "New Zealand Dollar",
    SGD: "Singapore Dollar",
    THB: "Thai Baht",
    AED: "UAE Dirham"
};


export const TemplateCache = {
    cache: {},
    async get(templateName) {
        if (this.cache[templateName]) return this.cache[templateName];
        try {
            const response = await fetch(`/orderv3/components/${templateName}.html`);
            if (!response.ok) throw new Error(`Template load failed: ${templateName}`);
            const html = await response.text();
            this.cache[templateName] = html;
            return html;
        } catch (error) {
            console.error('Template fetch error:', error);
            throw error;
        }
    }
};

export const DropdownCache = {
    currencyItems: null,
    forexCardItems: null,
    initializeCache() {
        if (this.currencyItems && this.forexCardItems) return;
        const allItems = document.querySelectorAll('#currencyDropDownList li');
        this.currencyItems = [...allItems];
        this.forexCardItems = [...allItems].filter(item => item.dataset.forex === 'true');
    },
    getCache(type) {
        this.initializeCache();
        return type === CONSTANTS.PRODUCT_TYPES.forexCard ? this.forexCardItems : this.currencyItems;
    }
};

export const ProgressManager = {
    stages: {
        GET_RATES: {
            step: 1,
            name: "Get Rates"
        },
        CHOOSE_PROVIDER: {
            step: 2,
            name: "Choose Provider"
        },
        CONTACT_DETAILS: {
            step: 3,
            name: "Contact Details"
        },
        REVIEW_PAYMENT: {
            step: 4,
            name: "Review & Payment"
        },
        COMPLETE_KYC: {
            step: 5,
            name: "Complete KYC"
        }
    },

    updateProgress(stage) {
        const stageInfo = this.stages[stage];
        if (!stageInfo) return;

        // Update mobile progress
        this.updateMobileProgress(stageInfo);
        this.updateDesktopProgress(stageInfo);
    },

    updateMobileProgress(stageInfo) {
        const progressBar = document.querySelector('#progressBarMain');
        if (!progressBar) return;

        const numberElement = progressBar.querySelector('#numberElement');
        const stageNameElement = progressBar.querySelector('#stageNameElement');
        const progressTrack = progressBar.querySelector('[role="progressbar"]');

        // Animate number
        let currentNumber = parseInt(numberElement.textContent);
        this.animateNumber(currentNumber, stageInfo.step, numberElement);

        // Update stage name with fade effect
        stageNameElement.style.opacity = '0';
        setTimeout(() => {
            stageNameElement.textContent = stageInfo.name;
            stageNameElement.style.opacity = '1';
        }, 200);

        // Animate progress bar width
        const percentage = ((stageInfo.step - 1) / 4) * 100;
        progressTrack.style.transition = 'width 100ms ease-in-out';
        progressTrack.style.width = `${percentage}%`;
    },
    updateDesktopProgress(stageInfo) {
        const currentStep = stageInfo.step;

        // Update progress segments (lines)
        const progressSegments = document.querySelectorAll('.progress-line');
        progressSegments.forEach((segment, index) => {
            segment.className = 'grow shrink basis-0 h-0.5 progress-line';

            if (index <= currentStep - 1) {
                segment.classList.add('bg-[#20bc73]');
            } else {
                segment.classList.add('bg-[#eaeef4]', 'border', 'border-[#eaeef4]');
            }
        });

        // Update step circles and labels
        const stepCircles = document.querySelectorAll('.step-circle');
        const stepLabels = document.querySelectorAll('.step-label');

        stepCircles.forEach((circle, index) => {
            circle.classList.remove('border-[#20bc73]', 'border-[#eaeef4]');
            stepLabels[index].classList.remove('text-black', 'text-opacity-60', 'font-bold', 'font-normal');

            if (index < currentStep - 1) {
                circle.classList.add('border-[#20bc73]');
                stepLabels[index].classList.add('text-black', 'font-bold');
            } else if (index === currentStep - 1) {
                circle.classList.add('border-[#20bc73]');
                stepLabels[index].classList.add('text-black', 'font-bold');
            } else {
                circle.classList.add('border-[#eaeef4]');
                stepLabels[index].classList.add('text-black', 'text-opacity-60', 'font-normal');
            }
        });
    },

    animateNumber(start, end, element) {
        if (start === end) return;

        const step = start < end ? 1 : -1;
        let current = start;

        const animate = () => {
            current += step;
            element.textContent = current;

            if ((step > 0 && current < end) || (step < 0 && current > end)) {
                setTimeout(animate, 200);
            }
        };

        animate();
    }
};

export const loginManager = {
    otpInputs: null,
    countryCodeDropDown: null,
    countryCodeMain: null,
    optSendDiv: null,
    handleNextBtn:null,
    templateMainContainer:null,
    token:null,

    init(templateMainContainer,handleNextBtn,token) {
        console.log(templateMainContainer,handleNextBtn,token)
        this.templateMainContainer=templateMainContainer;
        this.handleNextBtn=handleNextBtn;
        this.token=token
        this.loginWidgetContainer = document.querySelector('#loginWidgetContainer')
        this.otpWidget = document.querySelector('.otpWidget')
        this.otpInputs = document.querySelectorAll('.otpInputBlock input');
        this.otpContainer = document.querySelector('.otpInputBlock')
        this.countryCodeDropDown = document.getElementById('countryCodeDropDown');
        this.countryCodeMain = document.querySelector('#contryCodeMain');
        this.optSendDiv = document.querySelector('#optSend');
        this.whatsappOtpSendDiv = document.querySelector('#whatsappOtpSend');
        this.mobNumberInput = document.querySelector('#mobNumber')
        this.otpInputContainer = document.querySelector('#otpMobileContainer');
        this.sendOtpContainer = document.querySelector('#sendOtpMain');
        this.verifyOtpContainer = document.querySelector('#verifyOtpMain');
        this.otpVerify = document.querySelector('#otpVerify');
        this.changeNumberBtn = document.querySelector('#changeNumberBtn');
        this.otpTimer = document.querySelector('.otpTimer');
        this.resendBtn = document.querySelector('.otpResendBtn');
        this.backBtnLogin = document.querySelector('#backBtnLogin')

        this.setupOTPInputs();
        this.setupCountryCodeDropdown();
        this.setupLoginListeners();

    },
    async openOtpWidget() {

        this.loginWidgetContainer.style.display = 'flex'
        this.otpWidget.style.display = 'flex'
        document.querySelector('body').classList.add('snipContainer');
        this.mobNumberInput.focus()

        this.templateMainContainer.style.display = 'none'
    },
    async closeOtpWidget() {

        if (this.loginWidgetContainer) {
            this.templateMainContainer.style.display = 'flex'
            // Reset widget state properly
            this.loginWidgetContainer.style.display = 'none';
            this.otpWidget.style.display = 'none';

            // Remove the body class properly
            document.querySelector('body').classList.remove('snipContainer');



        }
    },
    handleBackBtnLogin() {
        loginManager.closeOtpWidget();
        this.resetLoginWidget()
    },

    // OTP Related Functions
    setupOTPInputs() {
        this.otpInputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => this.handleOTPKeyDown(e, index));
            input.addEventListener('input', (e) => this.handleOTPInput(e, index));
            input.addEventListener('focus', (e) => e.target.select());
        });
    },

    handleOTPKeyDown(event, index) {
        if (!/[0-9]/.test(event.key) &&
            !['Backspace', 'ArrowLeft', 'ArrowRight', 'Tab'].includes(event.key)) {
            event.preventDefault();
            return;
        }

        if (event.key === 'Backspace') {

            const currentInput = event.target;

            currentInput.style.backgroundColor = 'rgba(14, 81, 160, 0.10)';

            if (currentInput.value === '' && index > 0) {
                this.otpInputs[index - 1].focus();
            }
        }
    },

    handleOTPInput(event, index) {
        const currentInput = event.target;
        currentInput.value = currentInput.value.replace(/\D/g, '').slice(0, 1);

        if (currentInput.value) {
            currentInput.style.backgroundColor = '#0E51A0';

            if (index < this.otpInputs.length - 1) {
                this.otpInputs[index + 1].focus();
            } else if (this.areAllInputsFilled()) {
                console.log('Final OTP:', this.getOtpValue());
            }
        }
    },

    getOtpValue() {
        return Array.from(this.otpInputs)
            .map(input => input.value)
            .join('');
    },

    areAllInputsFilled() {
        return Array.from(this.otpInputs)
            .every(input => input.value !== '');
    },

    // Country Code Related Functions
    setupCountryCodeDropdown() {
        const countryData = this.getCountryData();
        this.populateCountryDropdown(countryData);
        this.initializeDropdown();
    },

    getCountryData() {
        const countryData = intlTelInputGlobals.getCountryData();
        return countryData.sort((a, b) => {
            if (a.name === 'India') return -1;
            if (b.name === 'India') return 1;
            return 0;
        });
    },
    getMobileData() {
        let countryCode = Dropdown.getValue('contryCodeMain').getAttribute('mob-code')
        let mobNumber = this.mobNumberInput.value
        let mobileData = {
            countryCode: countryCode,
            mobNumber: mobNumber
        }
        return mobileData
    },

    populateCountryDropdown(countryData) {
        countryData.forEach(country => {

            const li = document.createElement('li');
            const dialCode = `+${country.dialCode}`;
            const isIndia = country.iso2 === 'in';

            li.className = 'text-sm';
            li.setAttribute('value', country.iso2.toUpperCase());
            li.setAttribute('alternativeName', country.name);
            li.setAttribute('mob-code', dialCode);

            // Add selected attribute for India
            if (isIndia) {
                li.setAttribute('selected', 'true');
            }

            li.innerHTML = `<span>${dialCode}</span> <span>${country.name}</span>`;

            this.countryCodeDropDown.appendChild(li);
        });
    },

    toggleOptSendVisibility(show) {
        this.optSendDiv.style.display = show ? 'inline-flex' : 'none';
        this.optSendDiv.style.pointerEvents = show ? 'auto' : 'none';
    },

    initializeDropdown() {
        Dropdown.init('contryCodeMain', {
            searchable: true,
            customSelected: (item) => {
                const value = item.getAttribute('value');
                const mobCode = item.getAttribute('mob-code')
                return ` <div class="custom-selected-item gap-2 flex"><span>${mobCode}</span> <span class="custom-value">${value}</span> </div> `;
            },
            onSelect: (item) => {
                const selectedCountry = item;
                this.toggleOptSendVisibility(selectedCountry === 'IN');
            }
        });
    },
    setupLoginListeners() {
        this.optSendDiv.addEventListener('click', () => {
            this.handleSendOtp('sms')

        })
        this.whatsappOtpSendDiv.addEventListener('click', () => {
            this.handleSendOtp('wa')
        })
        this.mobNumberInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                loginManager.handleSendOtp('wa')
            }
        });
        this.otpVerify.addEventListener('click', () => {
            this.handleVerifyOtp();
        })

        this.otpInputs[3].addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission or other default actions

                loginManager.handleVerifyOtp();
            }
        })
        this.changeNumberBtn.addEventListener('click', () => {

            this.otpInputs.forEach((input) => {
                input.value = '' // Clears each OTP input field
                input.style.backgroundColor = 'rgba(14, 81, 160, 0.10)';
            });

            this.sendOtpContainer.style.display = 'flex';
            this.verifyOtpContainer.style.display = 'none';
        })
        this.resendBtn.addEventListener('click', function() {

            if (loginManager.isResendEnabled) { // Check if resend is enabled


                // Revert the changes
                loginManager.otpTimer.style.display = 'block'; // Make the timer visible again
                loginManager.resendBtn.style.opacity = '0.5'; // Reduce opacity to indicate it's disabled
                loginManager.resendBtn.style.pointerEvents = 'none'; // Disable the resend button by blocking pointer events
                loginManager.isResendEnabled = false; // Disable further resends

                // Call the function to send OTP
                loginManager.sendOtp();

                // Restart the countdown
                loginManager.activeResendOtp();
            } else {
                console.log('Resend is disabled. Please wait for the timer.');
            }
        });
        this.loginWidgetContainer.addEventListener('click', (event) => {

            if (!this.otpWidget.contains(event.target)) {
                loginManager.closeOtpWidget(); // Only close if the click was outside the otpWidget
            }
        });
        if (this.backBtnLogin) {
            this.backBtnLogin.addEventListener('click', () => {
                this.handleBackBtnLogin()
            })
        }


    },
    async handleSendOtp(otpMode) {

        let mobileData = this.getMobileData();
        let countryCode = mobileData.countryCode;
        let mobNumber = mobileData.mobNumber;

        if (countryCode === "91" && mobNumber !== 10) {
            insertAlertBelowElement(this.otpInputContainer, 'Invalid mobile number');
            return;
        } else if (mobNumber === "" || !/^\d+$/.test(mobNumber)) {
            insertAlertBelowElement(this.otpInputContainer, 'Invalid mobile number');
            return;
        } else {
            removeAlertBelowElement(this.otpInputContainer);
        }

        let btn;
        if (otpMode === 'wa') {
            btn = loginManager.whatsappOtpSendDiv;
        } else if (otpMode === 'sms') {
            btn = loginManager.optSendDiv;
        }

        try {
            this.toggleButtonLoader(btn, true)
            let response = await loginManager.sendOtp(otpMode, countryCode, mobNumber)

            if (response) {

                this.sendOtpContainer.style.display = 'none';
                this.verifyOtpContainer.style.display = 'flex';
                document.querySelector('#mobNum').textContent = countryCode + " " + mobNumber
                this.otpInputs[0].focus();
                this.activeResendOtp()
            } else {
                console.log('some error occurred')
            }
        } catch (error) {
            console.error('Error sending OTP:', error);
        } finally {
            // Hide loader and restore button
            this.toggleButtonLoader(btn, false);
        }



    },
    async sendOtp(otpMode, countryCode, mobNumber) {

        try {
  
            const params = new URLSearchParams({
                action: 'send_otp',
                token: this.token,
                country_code: countryCode,
                mobile: mobNumber,
                mode: otpMode
            });
  
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params.toString(),
            });
  
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
  
            const resp = await response.json(); // Use await to handle the promise returned by response.json()
            return resp.status;
        } catch (error) {
            console.error('Error fetching data:', error);
            // location.href='error.html'
        }
  
    },
    toggleButtonLoader(button, isLoading) {
        if (!button) return;

        const contentElement = button.querySelector('.button-content');
        const loaderElement = button.querySelector('.button-loader');

        if (!contentElement || !loaderElement) return;

        if (isLoading) {
            // Show loader, hide content
            contentElement.classList.add('hidden');
            loaderElement.classList.remove('hidden');
            button.disabled = true;
            button.style.opacity = '0.7';
            button.style.cursor = 'not-allowed';
        } else {
            // Hide loader, show content
            contentElement.classList.remove('hidden');
            loaderElement.classList.add('hidden');
            button.disabled = false;
            button.style.opacity = '1';
            button.style.cursor = 'pointer';
        }
    },
    async handleVerifyOtp() {
        let fetchOtp = this.getOtpValue()

        var aff_token = getCookie('etmref');

        removeAlertBelowElement(this.otpContainer);

        if (fetchOtp.length < 4) {
            insertAlertBelowElement(this.otpContainer, 'Enter a valid otp');
            return
        } else {
            removeAlertBelowElement(this.otpContainer)
        }

        let btn = this.otpVerify

        try {

            this.toggleButtonLoader(btn, true)
            let response = await loginManager.verifyOtp(fetchOtp, aff_token);

            if (response.verified) {


                sessionStorage.setItem('userId', response.uid)



                // Store the object as a JSON string
                const userInfo = {
                    userId: response.uid,
                    countryCode: response.customer_country_code,
                    mobNum: response.customer_mobile
                };
                localStorage.setItem('userInfo', JSON.stringify(userInfo));



                window.userCheckMain()
                this.handleNextBtn()
                loginManager.closeOtpWidget();
                this.resetLoginWidget()
            } else {
                insertAlertBelowElement(this.otpContainer, 'Incorrect OTP');
                return
            }
        } catch (error) {
            console.error(error)
        } finally {
            this.toggleButtonLoader(btn, false)
        }


    },
    async verifyOtp(fetchOtp, aff_token) {
        try {
            const params = new URLSearchParams({
                action: 'check_otp',
                token: this.token,
                otp: fetchOtp,
                aff_token: aff_token
            });
  
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: params.toString(),
            });
  
            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
  
            const resp = await response.json(); // Use await to handle the promise returned by response.json()
  
            return resp;
        } catch (error) {
            console.error('Error fetching data:', error);
            // location.href='error.html'
        }
    },
    resetLoginWidget() {
        // Reset OTP inputs
        this.otpInputs.forEach(input => {
            input.value = '';
            input.style.backgroundColor = 'rgba(14, 81, 160, 0.10)';
        });

        // Reset mobile number input
        if (this.mobNumberInput) {
            this.mobNumberInput.value = '';
        }

        // Show send OTP container, hide verify container
        if (this.sendOtpContainer) {
            this.sendOtpContainer.style.display = 'flex';
        }
        if (this.verifyOtpContainer) {
            this.verifyOtpContainer.style.display = 'none';
        }



        // Reset timer if it's running
        if (this.countdown) {
            clearInterval(this.countdown);
        }
        if (this.otpTimer) {
            this.otpTimer.textContent = '';
        }
        if (this.resendBtn) {
            this.resendBtn.style.opacity = '0.5';
            this.resendBtn.style.pointerEvents = 'none';
        }

        // Set isResendEnabled to false
        this.isResendEnabled = false;
    },
    isResendEnabled: false,
    countdown: null,
    async activeResendOtp() {

        let timeLeft = 30; // Start the countdown from 30 seconds

        // Clear any previous timer if it's running
        if (this.countdown) {
            clearInterval(this.countdown);
        }

        // Initialize the countdown timer
        this.countdown = setInterval(() => {
            this.otpTimer.textContent = `In ${timeLeft}s`; // Update the displayed time

            timeLeft--; // Decrease the time

            if (timeLeft < 0) {
                clearInterval(this.countdown); // Stop the countdown when it reaches 0
                this.otpTimer.style.display = 'none'; // Hide the timer
                this.resendBtn.style.opacity = '1'; // Make the resend button fully visible
                this.resendBtn.style.pointerEvents = 'auto'; // Enable clicking on the resend button
                this.isResendEnabled = true; // Enable resend when countdown ends
            }
        }, 1000); // Run this function every 1 second (1000ms)
    }

};

export const formatAmount = (amount) => {
    return `₹ ${parseFloat(amount).toLocaleString('en-IN', { maximumFractionDigits: 0 })}`;
};
