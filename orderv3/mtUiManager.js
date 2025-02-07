import { APIService, AppState } from '../orderv3/mtProcess.js';
import { DropdownCache, ProgressManager, TemplateCache, CONSTANTS, currencyNames, formatAmount, loginManager, ProgressGenerator, ButtonLoader } from '../orderv3/common.js';




export const mtUIManager = {
    elements: {},
    dropdownInstances: {},
    async init() {
        this.cacheStaticElements();

        let mtContainer = await TemplateCache.get(CONSTANTS.TEMPLATE_NAMES.MONEYTRANSFER_CONTAINER);
        this.elements.templateContainer.innerHTML = mtContainer;

        // Generate and insert progress container
        ProgressGenerator.generateProgressContainer(AppState.progressStates);

        this.cacheMoneyTransferElements();
        await this.loadMoneyTransferData();
        this.setupMoneyTransferListeners();
    },
    cacheStaticElements() {
        this.elements = {
            templateMainContainer: document.querySelector('#containerWholeMain'),
            templateContainer: document.querySelector('#templateContainer'),
            backBtn: document.querySelector('#backBtn'),
        }
        if (this.elements.backBtn) {
            this.elements.backBtn.addEventListener('click', () => this.handleBackBtn());
        }
    },
    cacheMoneyTransferElements() {

    },

    setupMoneyTransferListeners() {

    },

    manageSetProcessingState(key, value) {
        let state = AppState.setProcessingState(key, value)

        if (state) {
            this.updateProceedButtonState();
        }
    },


    async loadMoneyTransferData() {
        const data = await APIService.getRatesMt(AppState.getState('currentCity', 'mainState'));
        if (data) {
            mtUIManager.renderCardsMt(data.store_list)
            document.querySelector('#mtSavings').textContent = data.savings + ' INR';
            AppState.nextBtnState.active = true;
        }



    },

    async renderCardsMt(data) {
        const container = document.getElementById('mtcardContainer');
        if (!container || !data?.length) return;



        try {
            // Get the template
            const template = await TemplateCache.get('getRatesCardMt');
            const fragment = document.createDocumentFragment();


            
            data.forEach((item) => {
                const div = document.createElement('div');
                div.className = 'mb-4';

                // Create a temporary container with the template HTML
                let cardHTML = template;

                // Create the card element
                div.innerHTML = cardHTML;
                const card = div.firstElementChild;

                // Update card elements directly
                const bankLogo = card.querySelector('.bank-logo');
                if (bankLogo) {
                    bankLogo.src = `/assets/images/banklogos/${item.logo}.png`;
                    bankLogo.alt = `${item.vendor_name} Logo`;
                }

                const bankName = card.querySelector('.bank-name');
                if (bankName) {
                    bankName.textContent = item.vendor_name;
                }

                const supportedServices = card.querySelector('.supported-services');
                if (supportedServices) {
                    let services = [];
                    if (item.online_kyc === "1") services.push("Online KYC");
                    if (item.pg === "1") services.push("Online Payment");
                    if (item.zero_benf_bank_charge) services.push("Zero Beneficiary Bank Charges");
                    supportedServices.textContent = services.join(" • ");
                }

                const bankCharges = card.querySelector('.bank-charges');
                if (bankCharges) {
                    bankCharges.textContent = item.bank_charges === "0" ?
                        "Free" :
                        `₹ ${parseInt(item.bank_charges).toLocaleString('en-IN')}`;
                }

                const totalAmount = card.querySelector('.total-amount');
                if (totalAmount) {
                    totalAmount.textContent = `₹ ${parseInt(item.inr_total).toLocaleString('en-IN')}`;
                }

                // Add click handler for select button
                const selectButton = card.querySelector('.select-button');
                if (selectButton) {
                    selectButton.addEventListener('click', async () => {
                        ButtonLoader.toggleButtonLoader(selectButton, true);
                        let result = await APIService.selectMtStore(item.storeID);
                        console.log(result)
                        if (result) {

                            mtUIManager.handleNextBtn()
                            ButtonLoader.toggleButtonLoader(selectButton, false);
                        }
                    });
                }

                // Add branches information if available
                if (item.branch_locations && item.branch_locations.length > 0) {
                    const supportedServices = card.querySelector('.supported-services');
                    if (supportedServices) {
                        supportedServices.textContent += ` • ${item.branch_locations.length} Branches Available`;
                    }
                }

                fragment.appendChild(card);
            });

            // Clear container and append new cards
            container.innerHTML = '';
            container.appendChild(fragment);

        } catch (error) {
            console.error('Card render error:', error);
        }
    },


    updateProceedButtonState() {
        const proceedBtn = this.elements.nextBtn;
        const backBtn = this.elements.backBtn;



        // If processing, disable all buttons
        if (AppState.isProcessing()) {

            ButtonLoader.toggleButtonLoader(proceedBtn, true);
            ButtonLoader.toggleButtonLoader(backBtn, true);
            AppState.nextBtnState.active = false;
            return;
        }

        ButtonLoader.toggleButtonLoader(proceedBtn, false);
        AppState.nextBtnState.active = true;

        // Enable all other buttons when not processing
        ButtonLoader.toggleButtonLoader(backBtn, false);
    },

    assignNextButton(element) {
        // Clear state of previous next button if it exists
        if (this.elements.nextBtn) {
            this.elements.nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            this.elements.nextBtn.disabled = false;
        }

        // Assign new next button
        if (element) {
            this.elements.nextBtn = element;
            element.addEventListener('click', () => this.handleNextBtn());

            // Update the state of the new button based on current app state
            this.updateProceedButtonState();
        } else {
            console.warn("No element provided for next button");
        }
    },
    async handleNextBtn() {

        if (!userCheck()) {
            mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
            if (loginManager.loginWidgetContainer) {
                loginManager.openOtpWidget()
            } else {
                let body = document.body;
                const template = await TemplateCache.get('loginWidget');
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = template;
                body.appendChild(tempDiv.firstElementChild);
                await this.initializeLoginWidget();

            }
            mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

            return
        }
        if (AppState.isProcessing()) {
            console.log('Processing in progress, please wait...');
            return;
        }

        if (!AppState.nextBtnState.active) {
            console.log('nextBtn not active')
            return;
        }

        try {
            if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.GET_RATES) {

                console.log('calledddd')
                mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);


                // Hide current content
                const getRatesContainer = document.querySelector('#getRatesContainerMt');
                if (getRatesContainer) getRatesContainer.style.display = 'none';

                // Load and append delivery details template
                // Load and append delivery details template
                const template = await TemplateCache.get('contactDetailsMt');
                const contactSection = document.createElement('div');
                contactSection.id = 'contactDetailsSection';
                contactSection.innerHTML = template;

                const sectionContainer = document.getElementById('sectionContainer');

                document.querySelector('#moneyTContainer').classList.add('contactMainContainer')

                sectionContainer.appendChild(contactSection);
                ProgressManager.updateProgress('CONTACT_DETAILS', AppState.progressStates);

                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.CONTACT_DETAILS;

                await mtUIManager.initializeContactDetailsComponents()

                mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                return

            }

            if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.CONTACT_DETAILS) {


                if (!AppState.contactData.name || AppState.contactData.name.trim() === "") {
                    insertAlertBelowElement(document.querySelector('#customerName'), 'Enter a valid name')
                    return
                } else {
                    removeAlertBelowElement(document.querySelector('#customerName'))
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!AppState.contactData.email || AppState.contactData.email.trim() === "" || !emailRegex.test(AppState.contactData.email)) {
                    insertAlertBelowElement(document.querySelector('#customerEmail'), 'Enter a valid email')
                    return
                } else {
                    removeAlertBelowElement(document.querySelector('#customerEmail'))
                }

                if (AppState.contactData.branch != null) {
                    console.log(AppState.contactData.branch, 'AppState.contactData.branch')
                    if (!AppState.contactData.branch || AppState.contactData.branch === 'none') {
                        insertAlertBelowElement(document.querySelector('#branchDropDownMain'), 'Select a branch')
                        return
                    } else {
                        removeAlertBelowElement(document.querySelector('#branchDropDownMain'))
                    }
                }

                mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);


                let response = await APIService.updateContactDetails()


                if (response.status) {

                    ProgressManager.updateProgress('REVIEW_PAYMENT', AppState.progressStates);
                    // Hide current content
                    const contactDetailsSection = document.querySelector('#contactDetailsSection');
                    if (contactDetailsSection) contactDetailsSection.style.display = 'none';

                    // Load and append delivery details template
                    const template = await TemplateCache.get('summaryMt');
                    const summarySection = document.createElement('div');
                    summarySection.id = 'summarySection';
                    summarySection.innerHTML = template;

                    sectionContainer.appendChild(summarySection);

                    AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.REVIEW_PAYMENT;
                    await this.initializeSummaryComponents()
                    mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }

                return
            }
            if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.REVIEW_PAYMENT) {
                let data = await APIService.placeOrder();

                if (data.status) {
                    sessionStorage.setItem('orderId', data.orderID);
                    sessionStorage.setItem('customerName', AppState.contactData.name);
                    window.location.href = '/orderv2/Complete-KYC';
                }

                return
            }



        } catch (error) {
            console.error('Error switching templates:', error);
            // Handle error appropriately
        }
    },

    async initializeDeliveryDetailsComponents() {

        let data = await APIService.getDeliveryDetails()

        if (data) {
            mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

            const districtName = document.getElementById('districtName');
            if (districtName) {

                districtName.textContent = data.selected_district || '';
            }


            const cities = data.areas;
            const dropdownList = document.querySelector('#cityDropDown').querySelector('.dropdownList');
            const templateItem = document.querySelector('#cityDropDown').querySelector('.dropdownItem');

            if (data.order_within_hours || data.order_within_mins) {
                document.querySelector('#cartContentText').textContent = `${data.delivery_on} if you Order within ${data.order_within_hours} hrs ${data.order_within_mins} mins.`
            } else {
                document.querySelector('#cartContentText').textContent = 'by ' + data.delivery_on
            }


            // Ensure the template item is hidden
            templateItem.style.display = 'none';

            templateItem.classList.remove('template')

            // Remove all existing items except the template
            dropdownList.querySelectorAll('.dropdownItem:not([value="template"])').forEach(item => item.remove());

            // Add an initial "Select" option with a null value
            const selectItem = templateItem.cloneNode(true);
            selectItem.style.display = 'flex'; // Make the cloned item visible
            selectItem.setAttribute('value', 'Select'); // Set value to an empty string (null equivalent)
            selectItem.querySelector('span').textContent = 'Select'; // Set the text to 'Select'
            selectItem.querySelector('svg').style.display = 'none'
            selectItem.setAttribute('selected', '')
            dropdownList.appendChild(selectItem); // Append the "Select" item to the dropdown

            // Populate the dropdown list with cities
            cities.forEach(city => {
                // Clone the template item
                const newItem = templateItem.cloneNode(true);
                newItem.style.display = 'flex'; // Make the cloned item visible
                newItem.setAttribute('value', city); // Set the value attribute
                newItem.querySelector('span').textContent = `${city}`; // Update city name

                // Append the new item to the dropdown list
                dropdownList.appendChild(newItem);
            });

            Dropdown.init('cityDropDown', {
                searchable: true,


                customSelected: (item) => {
                    const value = item.getAttribute('value');
                    return ` <div class="custom-selected-item"> <span class="custom-value">${value}</span> </div> `;
                },
                onSelect: (value) => {
                    AppState.deliveryState.branch = value;
                    document.querySelector('#selectedBranchStorePickup').textContent = value
                }
            });


            document.getElementById('radio1').addEventListener('click', function () {
                AppState.deliveryState.doorDelivery = 1;
                mtUIManager.toggleRadio(this, 'radio2');

                // document.querySelector('#cartContent').style.display = 'block'
                // document.querySelector('#cartContentStorePickup').style.display = 'none'
            });

            document.getElementById('radio2').addEventListener('click', function () {
                AppState.deliveryState.doorDelivery = 0;
                mtUIManager.toggleRadio(this, 'radio1');
                // document.querySelector('#cartContent').style.display = 'none'
                // document.querySelector('#cartContentStorePickup').style.display = 'block'
            });

            mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
        }



    },
    toggleRadio(selected, other) {
        selected.classList.add('selectedRadio');
        selected.classList.remove('radio');
        document.getElementById(other).classList.add('radio');
        document.getElementById(other).classList.remove('selectedRadio');

        // Show or hide the doorDeliveryDetails div with a smooth height transition
        const doorDeliveryDetails = document.getElementById('doorDeliveryDetails');
        if (selected.id === 'radio1') {
            doorDeliveryDetails.classList.add('show');
        } else {
            doorDeliveryDetails.classList.remove('show');
        }
    },
    async initializeContactDetailsComponents() {

        let nextBtn = document.querySelector('#contactUpdateBtn');
        this.assignNextButton(nextBtn);
        mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

        let data = await APIService.getContactDetails()
        console.log(data)

        if (data) {
            this.nameInput = document.querySelector('#customerName');
            this.emailInput = document.querySelector('#customerEmail');
            this.mobileField = document.querySelector('#customerMobile');

            AppState.contactData.countryCode = data.country_code;
            AppState.contactData.email = data.customer_email;
            AppState.contactData.name = data.customer_name;
            AppState.contactData.mobile = data.mobile;

            AppState.contactData.uid = data.uid;

            this.nameInput.value = AppState.contactData.name;
            this.emailInput.value = AppState.contactData.email;
            this.mobileField.textContent = AppState.contactData.mobile;

            this.nameInput.addEventListener('input', (e) => {
                AppState.contactData.name = e.target.value;
            })

            this.emailInput.addEventListener('input', (e) => {
                AppState.contactData.email = e.target.value;
            })



            if (data.areas && data.areas.length > 0) {
                const branchDropDownContainer = document.querySelector('#branchDropDownContainer');
                branchDropDownContainer.style.display = 'flex'
                const areas = data.areas;
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
                selectItem.setAttribute('selected', '')
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

                AppState.contactData.branch = 'none'

                Dropdown.init('branchDropDownMain', {
                    searchable: false,
                    onSelect: (value) => {
                        AppState.contactData.branch = value;
                    }
                });


            } else {

                branchDropDownContainer.style.display = 'none'
            }





            data.kyc_list ? this.updateKycList(data.kyc_list) : '';


            mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

        }
    },
    updateKycList(data) {
        const documentContainer = document.querySelector('#document-list');
        documentContainer.innerHTML = ''


        data.forEach((item, index) => {
            let kyc = document.createElement('p');
            kyc.className = 'text-black text-sm font-normal'
            kyc.textContent = `${index + 1}. ${item}`
            documentContainer.appendChild(kyc)
        })
    },
    async initializeSummaryComponents() {

        const placeOrderBtn = document.querySelector('#summaryConfirm');
        this.assignNextButton(placeOrderBtn);
        mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

        const summaryData = await APIService.getSummaryDetails();
        console.log(summaryData, 'summaryData')
        if (!summaryData) return;
        // Get required elements when they're needed


        document.querySelector('#currencyMt').textContent = `${summaryData.order_details[0].currency} @ ${summaryData.order_details[0].rate}`;
        document.querySelector('#currencyMtAmnt').textContent = summaryData.order_details[0].amount;
        document.querySelector('#currencyMtAmntinr').textContent = ` ${formatAmount(summaryData.order_details[0].amount * summaryData.order_details[0].rate)}`
        !summaryData.zero_bb_charge ? document.querySelector('#intermediatoryNote').style.display = 'block' : ''
        document.querySelector('#gstMt').innerHTML = formatAmount(summaryData.gst);
        document.querySelector('#bankCharges').innerHTML = formatAmount(summaryData.bank_charges);
        document.querySelector('#totalAmnt').innerHTML = formatAmount(summaryData.total);

        if (summaryData.discount !=="") {
            mtUIManager.intiateDiscountSection(summaryData.coupon_applied, summaryData.discount);
        } else {
            mtUIManager.intiateDiscountSection()
        }

        document.getElementById('radio1').addEventListener('click', function () {
            mtUIManager.toggleRadio(this, 'radio2');
            AppState.paymentState.paymentType = 'neft'
        });

        document.getElementById('radio2').addEventListener('click', function () {
            mtUIManager.toggleRadio(this, 'radio1');
            AppState.paymentState.paymentType = 'pg'
        });


        mtUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

    },
    intiateDiscountSection(coupon = null, discount = null) {

        let trigger = document.querySelector('#discountCodeTrigger')
        let discountInputContainer = document.querySelector('#discountInputContainer')
        let discountInput = document.querySelector('#discountInput')
        let discountApplyBtn = document.querySelector('#applyCoupon')
        let discountRemoveContainer = document.querySelector('#discountCouponRemoveContainer');
        let couponCode = document.querySelectorAll('.couponCode');
        let discountRate = document.querySelector('#discountRate')
        let discountRemoveBtn = document.querySelector('#removeCoupon')
    
        if (coupon && discount) {
            trigger.style.display = 'none'
            discountInputContainer.style.display = 'none'
            discountRemoveContainer.style.display = 'flex'
            couponCode.forEach(item => {
                item.textContent = coupon;
            })
            discountRate.textContent = ' ₹' + discount
            discountRemoveBtn.addEventListener('click', () => {
                mtUIManager.removeCoupon()
            })
    
        }
        else {
            discountRemoveContainer.style.display = 'none';
            trigger.style.display = 'flex'
            // Store initial state and create event handler once
            let isApplyBtnHandlerAttached = false;
            
            trigger.addEventListener('click', () => {
                const isHidden = discountInputContainer.style.display === 'none';
                
                discountInputContainer.style.display = isHidden ? 'flex' : 'none';
                
                if (isHidden) {
                    discountInput.focus();
                    
                    // Only attach event handler once
                    if (!isApplyBtnHandlerAttached) {
                        discountApplyBtn.addEventListener('click', () => 
                            mtUIManager.handleApplyCoupon(discountInput.value)
                        );
                        isApplyBtnHandlerAttached = true;
                    }
                } else {
                    removeAlertBelowElement(discountInputContainer);
                }
            });
        }
    
    },
    async handleApplyCoupon(val) {
        if (!val || val.trim() === "") {
            insertAlertBelowElement(discountInputContainer, 'Enter a valid coupon code!');
            return;
        } else {
            removeAlertBelowElement(discountInputContainer);

            try {
                const resp = await APIService.applyCoupon(val);
                console.log(resp);

                if (resp.status) {
                    mtUIManager.initializeSummaryComponents();
                }
                if (resp.status == 2) {
                    insertAlertBelowElement(discountInputContainer, 'Coupon only valid for order of minimum ₹' + resp.min_order);
                    return;
                }
                if (resp.status == 0) {
                    insertAlertBelowElement(discountInputContainer, 'Enter a valid coupon code!');
                    return;
                }
            } catch (error) {
                console.log(error);
            }
        }
    },
    async removeCoupon() {
        try {
            const resp = await APIService.removeCoupon();
            if (resp) {
                mtUIManager.initializeSummaryComponents();
            }
        } catch (error) {
            console.log(error);
        }
    },
    async toggleRadio(selected, other) {
        selected.classList.add('selectedRadioSummary');
        selected.classList.remove('radio');
        document.getElementById(other).classList.add('radio');
        document.getElementById(other).classList.remove('selectedRadioSummary');

    },
    async initializeLoginWidget() {
        console.log(this.elements.templateMainContainer)
        loginManager.init(this.elements.templateMainContainer, this.handleNextBtn, AppState.mainState.token);

        loginManager.openOtpWidget()
    },
    handleBackBtn() {
        const currentStatus = AppState.nextBtnState.status;

        switch (currentStatus) {
            case CONSTANTS.ORDER_STATES.CONTACT_DETAILS:
                // Going back to GET_RATES
                const contactDetailsSection = document.querySelector('#contactDetailsSection');
                if (contactDetailsSection) {
                    contactDetailsSection.remove();
                }
                document.querySelector('#moneyTContainer').classList.remove('contactMainContainer')

                // Show the rates container again
                const getRatesContainer = document.querySelector('#getRatesContainerMt');
                if (getRatesContainer) {
                    getRatesContainer.style.display = 'block';
                }
                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.GET_RATES;
                ProgressManager.updateProgress('GET_RATES', AppState.progressStates);
                break;

            case CONSTANTS.ORDER_STATES.REVIEW_PAYMENT:
                // Going back to CONTACT_DETAILS
                const summarySection = document.querySelector('#summarySection');
                if (summarySection) {
                    summarySection.remove();
                }
                // Show contact details section
                const contactSection = document.querySelector('#contactDetailsSection');
                if (contactSection) {
                    contactSection.style.display = 'block';
                }
                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.CONTACT_DETAILS;
                ProgressManager.updateProgress('CONTACT_DETAILS', AppState.progressStates);
                break;

            default:
                window.location = '/'
        }


        // Re-assign the appropriate next button after state change
        if (currentStatus === CONSTANTS.ORDER_STATES.CONTACT_DETAILS) {
            this.assignNextButton(document.querySelector('#proceedBtn'));
        } else if (currentStatus === CONSTANTS.ORDER_STATES.REVIEW_PAYMENT) {
            this.assignNextButton(document.querySelector('#contactUpdateBtn'));
        }

        // Explicitly set next button to active since we have valid data
        AppState.nextBtnState.active = true;
        this.updateProceedButtonState();
    }

};