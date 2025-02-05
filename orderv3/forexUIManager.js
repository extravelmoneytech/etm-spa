import { APIService, calculations, AppState } from '../orderv3/forexProcess.js';
import { DropdownCache, ProgressManager, TemplateCache, CONSTANTS,currencyNames,formatAmount, loginManager } from '../orderv3/common.js';




export const ForexUIManager = {
    elements: {},
    dropdownInstances: {},
    async init() {
        this.cacheStaticElements();
        let forexContainer = await TemplateCache.get(CONSTANTS.TEMPLATE_NAMES.FOREX_CONTAINER);
        this.elements.templateContainer.innerHTML = forexContainer;

        this.cacheForexElements();
        await this.loadForexData();
        this.setupForexListeners();
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
    cacheForexElements() {
        this.elements = {
            ...this.elements,
            addCurrencyBtn: document.querySelector('#addCurrencyCardBtn'),
            addForexBtn: document.querySelector('#addForexCardBtn'),
            bottomSheetMain: document.querySelector('.bottomSheetMain'),
            bottomSheet: document.querySelector('.bottomSheet'),
            nextBtn: document.querySelector('#proceedBtn'),
            cartTotal: document.querySelector('#cartTotal')
        }
        
    },
    cacheMoneyTransferElements() {
        this.elements = {

        }
    },
    setupForexListeners() {
        this.elements.addCurrencyBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.currency, 'addProduct'));
        this.elements.addForexBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.forexCard, 'addProduct'));

       

        this.assignNextButton(this.elements.nextBtn);
    },
    setupMoneyTransferListeners() {

    },
    handleProductAddBtnVisibility(val) {
        
        if (!val) {
            this.elements.addCurrencyBtn.style.display = 'none';
            this.elements.addForexBtn.style.display = 'none';
        } else {
            this.elements.addCurrencyBtn.style.display = 'inline-flex';
            this.elements.addForexBtn.style.display = 'inline-flex';
        }
    },
    manageSetProcessingState(key, value){
       let state= AppState.setProcessingState(key, value)
     
       if(state){
        this.updateProceedButtonState();
       }
    },
    setupAddBottomSheetListeners(type) {
        const closeButton = document.querySelector('#closeBottomSheet');
        const addProductBtn = document.querySelector('#addProductBtn');
        if (closeButton) {
            closeButton.addEventListener('click', () => this.closeBottomSheet());
        } else {
            console.warn('Close button not found in the bottom sheet');
        }
        const currencyQuantityInput = document.querySelector('#currencyQuantity');
        currencyQuantityInput.addEventListener('input', (e) => {
            AppState.setState('currencyQuantity', e.target.value, 'addProductState')
        })
        addProductBtn.addEventListener('click', async () => {
            const data = await APIService.addProduct('add');
        
            this.manageProcessingData(data);
            this.closeBottomSheet()
        })
        this.initializeAddCurrencyDropdown(type)


    },
    setupEditBottomSheetListeners(rowID) {
        const closeButton = document.querySelector('#closeBottomSheet');
        const editProductBtn = document.querySelector('#editProductBtn');
        const editCurrencyQuantityInput = document.querySelector('#editCurrencyQuantity');
        if (closeButton) {
            closeButton.addEventListener('click', () => this.closeBottomSheet());
        }
        if (editCurrencyQuantityInput) {
            editCurrencyQuantityInput.addEventListener('input', (e) => {
                AppState.setState('currencyQuantityEdit', e.target.value, 'editProductState');
            });
        }
        if (editProductBtn) {
            editProductBtn.addEventListener('click', async () => {
                const response = await APIService.editProduct(rowID, AppState.getState('currencyQuantityEdit', 'editProductState'));

                if (response.status) {
                    const clickedCard = AppState.cardDataState.find((item) => item.rowID === rowID);
                    if (clickedCard) {
                        clickedCard.amount = AppState.getState('currencyQuantityEdit', 'editProductState');
                        clickedCard.totalINR = AppState.getState('exchangeRateEdit', 'editProductState');
                    }

                    
                    this.manageProcessingData(AppState.cardDataState);
                    this.closeBottomSheet();

                } else {
                    console.error('Failed to update the product.');
                }
            });
        }
    },


    async loadForexData() {

        const rates = await APIService.getRates(AppState.getState('currentCity', 'mainState'));
        await TemplateCache.get('getRatesCard');
        this.manageProcessingData(rates)
        AppState.nextBtnState.active = true;
    },
    async loadMoneyTransferData() {
        const data = await APIService.getRatesMt(AppState.getState('currentCity', 'mainState'));

        ForexUIManager.renderCardsMt(data.store_list)
        document.querySelector('#mtSavings').textContent = data.savings + ' INR';

    },
    initializeAddCurrencyDropdown(type) {
        const cachedItems = DropdownCache.getCache(type);
        const dropdownList = document.querySelector('#currencyDropDownList');
        if (!dropdownList) return;
        const previousInstance = this.dropdownInstances[type];
        const previousSelectedValue = previousInstance?.state.selectedValue || null;
        dropdownList.innerHTML = '';
        cachedItems.forEach(item => {
            dropdownList.appendChild(item.cloneNode(true));
        });
        this.dropdownInstances[type] = Dropdown.init('cardCurrency', {
            searchable: true,
            customSelected: (item) => {
                const value = item.getAttribute('value');
                return ` <div class="custom-selected-item"> <span class="custom-value">${value}</span> </div> `;
            },
            onSelect: (value) => {
                AppState.setState('selectedCurrency', value, 'addProductState');
            }
        });
    },
    async manageProcessingData(data){
       let processedData= await calculations.processCardData(data);
       ForexUIManager.renderCards(processedData);

          if (data.length == 3) {
              ForexUIManager.handleProductAddBtnVisibility(false)
          } else {
              ForexUIManager.handleProductAddBtnVisibility(true)
          }
          let cartTotal = await calculations.calculateTotalAmount(processedData);
          await ForexUIManager.updateCart(cartTotal)
    },

    async openBottomSheet(type, mode, rowId = null) {
        this.elements.bottomSheetMain.classList.add('bottomSheetMainVisible');

        const viewportHeight = window.visualViewport ? window.visualViewport.height : window.innerHeight;
        this.elements.bottomSheetMain.style.height = `${viewportHeight}px`;

        // document.body.classList.add('no-scroll'); // Disable background scrolling



        if (!type) {
            this.closeBottomSheet();
            return;
        }


        this.currentBottomSheetMode = this.currentBottomSheetMode || null;
        this.currentBottomSheetType = this.currentBottomSheetType || null;
        this.currentBottomSheetRowId = this.currentBottomSheetRowId || null;

        if (mode === this.currentBottomSheetMode && type === this.currentBottomSheetType && rowId === this.currentBottomSheetRowId) {
            this.elements.bottomSheetMain.classList.add('bottomSheetMainVisible');
            setTimeout(() => {
                document.querySelector('.bottomSheet')?.classList.add('popBottomSheet');

            }, 100);
            return;
        } else {
            this.elements.bottomSheet.innerHTML = ''
        }
        this.currentBottomSheetMode = mode;
        this.currentBottomSheetType = type;
        this.currentBottomSheetRowId = rowId;

        if (mode === 'editProduct') {

            // Check if the device is mobile (viewport width less than 768px as a common breakpoint)
            if (window.innerWidth <= 768) { // You can adjust the width threshold based on your requirement
                this.elements.bottomSheet.style = 'height:22rem;';
            } else {
                // Keep the height as it is or remove specific height changes
                this.elements.bottomSheet.style = '';
            }

            this.elements.bottomSheet.innerHTML = `

        <div class="w-full h-8 px-4 animate-pulse">
            <div class="h-4 bg-gray-200 rounded w-1/2"></div>
        </div>
        <div class="w-full px-4 mt-6 space-y-4 animate-pulse">
            <div class="h-10 bg-gray-200 rounded"></div>
            <div class="h-10 bg-gray-200 rounded"></div>
            <div class="h-10 bg-gray-200 rounded"></div>
            <div class="h-10 bg-gray-200 rounded"></div>
        </div>
    `;

        } else if (mode === 'addProduct') {
            // Check if the device is mobile (viewport width less than 768px as a common breakpoint)
            if (window.innerWidth <= 768) { // You can adjust the width threshold based on your requirement
                this.elements.bottomSheet.style = 'height:30rem;';
            } else {
                // Keep the height as it is or remove specific height changes
                this.elements.bottomSheet.style = '';
            }

            this.elements.bottomSheet.innerHTML = `
<div class="w-full h-8 px-4 animate-pulse">
    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
</div>
<div class="w-full px-4 mt-6 space-y-4 animate-pulse">
    <div class="h-10 bg-gray-200 rounded"></div>
    <div class="h-10 bg-gray-200 rounded"></div>
    <div class="h-10 bg-gray-200 rounded"></div>
    <div class="h-10 bg-gray-200 rounded"></div>
    <div class="h-10 bg-gray-200 rounded"></div>
    <div class="h-10 bg-gray-200 rounded"></div>
</div>
`;
        }



        this.elements.bottomSheetMain.classList.add('bottomSheetMainVisible');
        setTimeout(() => {
            document.querySelector('.bottomSheet')?.classList.add('popBottomSheet');

        }, 100);


        const templateName = mode === 'editProduct' ? 'bottomSheetEdit' : 'bottomSheet';
        if (!this.cachedTemplate || this.currentTemplate !== templateName) {
            this.cachedTemplate = await TemplateCache.get(templateName);
            this.currentTemplate = templateName;
        }

        this.elements.bottomSheet.innerHTML = this.cachedTemplate;

        if (mode === 'editProduct') {
            const clickedCard = AppState.cardDataState.find((item) => item.rowID === rowId);
            let quantity;
            if (clickedCard) {
                AppState.setState('selectedCurrencyEdit', clickedCard.currency, 'editProductState');
                AppState.setState('currencyQuantityEdit', clickedCard.amount, 'editProductState');
                AppState.setState('exchangeRateEdit', clickedCard.totalINR, 'editProductState');
                AppState.setState('currencyRateEdit', clickedCard.rate, 'editProductState');
            }
            this.setupEditBottomSheetListeners(rowId);
        } else {
            this.setupAddBottomSheetListeners(type);
            const defaultCurrency = document.querySelector('#currencyDropDownList li[selected]')?.getAttribute('value') || 'USD';
            const defaultQuantity = 1000;
            AppState.setState('productType', type, 'addProductState');
            AppState.setState('selectedCurrency', defaultCurrency, 'addProductState');
            AppState.setState('currencyQuantity', defaultQuantity, 'addProductState');
        }

    },




    closeBottomSheet() {
        const bottomSheet = document.querySelector('.bottomSheet');
        document.body.classList.remove('no-scroll'); // Disable background scrolling
        if (bottomSheet) {
            bottomSheet.classList.remove('popBottomSheet');
            setTimeout(() => {
                this.elements.bottomSheetMain.classList.remove('bottomSheetMainVisible');
            }, 300);
        }
    },
    async renderCards(data) {

        const container = document.getElementById('cardContainer');
        if (!container || !data?.length) return;
        try {
            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
            const template = await TemplateCache.get('getRatesCard');
            const fragment = document.createDocumentFragment();
            data.forEach((item, index) => {
                const div = document.createElement('div');
                div.className = 'mb-4';

                const cardData = {
                    productCount: item.productNumber,
                    currencyNameExpanded: currencyNames[item.currency],
                    currencyNameShort: item.currency,
                    cityName: AppState.getState('currentCity', 'mainState'),
                    currencyRate: item.rate.toFixed(2),
                    currencyQuantity: item.amount,
                    exchangeRate: formatAmount(item.totalINR)
                };

                let cardHTML = template.replace(/\{\{(\w+)\}\}/g, (match, key) => cardData[key] || '');
                div.innerHTML = cardHTML;

                if (!item.allowDelete) {
                    const deleteButton = div.querySelector('.deleteProduct');

                    if (deleteButton) {
                        deleteButton.parentElement.removeChild(deleteButton); // Remove delete button
                    }
                }
                const editButton = div.querySelector('.editProduct');
                if (editButton) {
                    editButton.addEventListener('click', async () => await ForexUIManager.handleEditProduct(item));
                }
                const deleteButton = div.querySelector('.deleteProduct');
                if (deleteButton) {
                    deleteButton.addEventListener('click', async () => await ForexUIManager.handleDeleteProduct(item));
                }
                fragment.appendChild(div.firstChild);
            });
            container.innerHTML = '';
            container.appendChild(fragment);
        } catch (error) {
            console.error('Card render error:', error);
        } finally {
            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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
                        
                        let result = await APIService.selectMtStore(item.storeID);
                        if (result) {
                            ForexUIManager.handleNextBtn
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
    async updateCart(val) {

        if (this.elements.cartTotal) {
            this.elements.cartTotal.textContent = formatAmount(val)
        } else {
            console.log('no cart elemnt')
        }

    },
    async handleEditProduct(product) {
        this.openBottomSheet(product.productType, 'editProduct', product.rowID);
    },
    async handleDeleteProduct(product) {
        const data = await APIService.addProduct('remove', product.rowID);
        this.manageProcessingData(data)
    },
    updateProceedButtonState() {
        const proceedBtn = this.elements.nextBtn;
        const backBtn = this.elements.backBtn;
        
        const addProductBtn = document.querySelector('#addProductBtn');
        const editProductBtn = document.querySelector('#editProductBtn');

        const updateButtonState = (button, isDisabled) => {

            if (!button) return;
            if (isDisabled) {
                button.classList.add('opacity-50', 'cursor-not-allowed');
                button.disabled = true;
            } else {
                button.classList.remove('opacity-50', 'cursor-not-allowed');
                button.disabled = false;
            }
        };

        // If processing, disable all buttons
        if (AppState.isProcessing()) {
            
            updateButtonState(proceedBtn, true);
            updateButtonState(backBtn, true);
            updateButtonState(addProductBtn, true);
            updateButtonState(editProductBtn, true);
            AppState.nextBtnState.active = false;
            return;
        }

        // Only check card data length on GET_RATES page
        if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.GET_RATES) {
            if (AppState.cardDataState.length > 0) {
                updateButtonState(proceedBtn, false);
                AppState.nextBtnState.active = true;
            } else {
                updateButtonState(proceedBtn, true);
                AppState.nextBtnState.active = false;
            }
        } else {
            // For all other pages, next button should be enabled
            updateButtonState(proceedBtn, false);
            AppState.nextBtnState.active = true;
        }

        // Enable all other buttons when not processing
        updateButtonState(backBtn, false);
        updateButtonState(addProductBtn, false);
        updateButtonState(editProductBtn, false);
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
            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

            return
        }
        if (AppState.isProcessing()) {
            console.log('Processing in progress, please wait...');
            return;
        }

        if (!AppState.nextBtnState.active) {
            console.log('Please add at least one currency to proceed');
            return;
        }

        try {
            if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.GET_RATES) {

                console.log('calledddd')
                ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);


                // Hide current content
                const getRatesContainer = document.querySelector('#getRatesContainer');
                if (getRatesContainer) getRatesContainer.style.display = 'none';

                // Load and append delivery details template
                const template = await TemplateCache.get('deliveryDetails');
                const deliverySection = document.createElement('div');
                deliverySection.id = 'deliveryDetailsSection';
                deliverySection.innerHTML = template;

                const sectionContainer = document.getElementById('sectionContainer');
                sectionContainer.appendChild(deliverySection);

                const cartContainer = document.getElementById('cartSection')
                cartContainer.classList.add('hideCartSection')

                ProgressManager.updateProgress('CHOOSE_PROVIDER');

                // Update app state
                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.DELIVERY_DETAILS;

                // Initialize any required components for delivery details
                await ForexUIManager.initializeDeliveryDetailsComponents();
                ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                return
            }
            if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.DELIVERY_DETAILS) {
                

                let ddLandMark = document.querySelector('#ddLandMark').value;
                let ddAddress = document.querySelector('#ddAddress').value;

                let branch = AppState.deliveryState.branch;

                AppState.setState('ddAddress', ddAddress, 'deliveryState');
                AppState.setState('ddLandMark', ddLandMark, 'deliveryState');


                if (!branch || branch === 'Select') {
                    insertAlertBelowElement(document.querySelector('#cityDropDown'), 'Select a branch')
                    return
                } else {
                    removeAlertBelowElement(document.querySelector('#cityDropDown'))
                }
                // Simple validation


                if (AppState.deliveryState.doorDelivery) {
                    if (!ddAddress || ddAddress.trim() === "") {
                        insertAlertBelowElement(document.querySelector('#ddAddress'), 'Enter a valid address')
                        return
                    } else {
                        removeAlertBelowElement(document.querySelector('#ddAddress'))
                    }

                    if (!ddLandMark || ddLandMark.trim() === "") {
                        insertAlertBelowElement(document.querySelector('#ddLandMark'), 'Enter a valid landmark')
                        return
                    } else {
                        removeAlertBelowElement(document.querySelector('#ddLandMark'))
                    }
                }
                ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
                

                let status = await APIService.updateDeliveryDetails();

                if (status) {
                    
                    ProgressManager.updateProgress('CONTACT_DETAILS');
                    // Hide current content
                    const deliveryDetailsContainer = document.querySelector('#deliveryDetailsSection');
                    if (deliveryDetailsContainer) deliveryDetailsContainer.style.display = 'none';

                    // Load and append delivery details template
                    const template = await TemplateCache.get('contactDetails');
                    const contactSection = document.createElement('div');
                    contactSection.id = 'contactDetailsSection';
                    contactSection.innerHTML = template;

                    const sectionContainer = document.getElementById('sectionContainer');

                    document.querySelector('#forexContainerMain').classList.add('contactMainContainer')

                    sectionContainer.appendChild(contactSection);

                    AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.CONTACT_DETAILS;

                    await this.initializeContactDetailsComponents()

                    ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
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

                ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
                

                let response = await APIService.updateContactDetails()


                if (response.status) {
                    
                    ProgressManager.updateProgress('REVIEW_PAYMENT');
                    // Hide current content
                    const contactDetailsSection = document.querySelector('#contactDetailsSection');
                    if (contactDetailsSection) contactDetailsSection.style.display = 'none';

                    // Load and append delivery details template
                    const template = await TemplateCache.get('summary');
                    const summarySection = document.createElement('div');
                    summarySection.id = 'summarySection';
                    summarySection.innerHTML = template;

                    sectionContainer.appendChild(summarySection);

                    AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.REVIEW_PAYMENT;
                    await this.initializeSummaryComponents()
                    ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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
            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

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
                ForexUIManager.toggleRadio(this, 'radio2');

                // document.querySelector('#cartContent').style.display = 'block'
                // document.querySelector('#cartContentStorePickup').style.display = 'none'
            });

            document.getElementById('radio2').addEventListener('click', function () {
                AppState.deliveryState.doorDelivery = 0;
                ForexUIManager.toggleRadio(this, 'radio1');
                // document.querySelector('#cartContent').style.display = 'none'
                // document.querySelector('#cartContentStorePickup').style.display = 'block'
            });

            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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
        ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

        let data = await APIService.getContactDetails()

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

            window.initializeDatePicker({
                onSelect: (date) => {
                    AppState.contactData.travelDate = window.getFormatedDate(date);
                }
            });




            Dropdown.init('purposeSelector', {
                searchable: false,
                onSelect: (value) => {
                    this.updateKycList(value)
                    AppState.contactData.travelPurpose = value;
                }
            });

            if (data.travel_date != "") {
 
                // AppState.contactData.travelDate = data.travel_date;
                // window.setPickerDate(new Date(data.travel_date));
                AppState.contactData.travelDate = window.getFormatedDate(window.getSelectedDate())
            } else {
      
                AppState.contactData.travelDate = window.getFormatedDate(window.getSelectedDate())
            }

            if (data.travel_purpose != "") {
                AppState.contactData.travelPurpose = data.travel_purpose;
                Dropdown.setValue('purposeSelector', data.travel_purpose)
            } else {
                AppState.contactData.travelPurpose = Dropdown.getValue('purposeSelector').getAttribute('value')
            }

            this.updateKycList(Dropdown.getValue('purposeSelector').getAttribute('value'));

            ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

        }
    },
    updateKycList(value) {
        const documentContainer = document.querySelector('#document-list');
        documentContainer.innerHTML = ''
        let docs = AppState.kycData[value]

        docs.forEach((item, index) => {
            let kyc = document.createElement('p');
            kyc.className = 'text-black text-sm font-normal'
            kyc.textContent = `${index + 1}. ${item}`
            documentContainer.appendChild(kyc)
        })
    },
    async initializeSummaryComponents() {

        const placeOrderBtn = document.querySelector('#summaryConfirm');
        this.assignNextButton(placeOrderBtn);
        ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

        const summaryData = await APIService.getSummaryDetails();
        if (!summaryData) return;
        // Get required elements when they're needed
        const doorDeliveryElement = document.querySelector('#doorDeliveryData');
        const paymentInfoText = document.querySelector('#paymentInfoText');
        const deliveryFee = document.querySelector('#deliveryFee');
        const totalAmount = document.querySelector('#totalAmnt');
        const gst = document.querySelector('#gst');
        const productList = document.getElementById('productList');


        // Update UI based on delivery option
        if (summaryData.delivery_opted === '0') {
            doorDeliveryElement.style.display = "none";
            paymentInfoText.innerHTML = `Visit store before <b>${summaryData.delivery_on}</b>. Full/partial payment required before store visit. Payment instructions will be shared on your registered email after KYC verification.`;
        } else {
            deliveryFee.innerHTML = '₹' + summaryData.door_fee;
            paymentInfoText.textContent = 'Full payment required before delivery. Payment instructions will be shared on your registered email after KYC verification.';
        }

        // Update totals
        totalAmount.innerHTML = formatAmount(summaryData.total);
        gst.innerHTML = '₹' + summaryData.gst;

        // Render product list
        this.renderProductList(productList, summaryData.order_details);
        ForexUIManager.manageSetProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

    },

    renderProductList(container, products) {
        container.innerHTML = '';
        products.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.classList.add('justify-between', 'items-start', 'inline-flex');

            const rateParagraph = document.createElement('p');
            rateParagraph.classList.add('text-[#555555]', 'text-[14px]', 'font-medium', 'tracking-tight');
            rateParagraph.textContent = `${product.amount} ${product.currency} (${product.product === 'Forex Card' ? 'Card' : 'Note'}) @ ${product.rate}`;

            const amountParagraph = document.createElement('p');
            amountParagraph.classList.add('text-[#111729]', 'text-[14px]', 'font-medium', 'tracking-tight');
            amountParagraph.textContent = formatAmount(product.amount * product.rate);

            productDiv.appendChild(rateParagraph);
            productDiv.appendChild(amountParagraph);
            container.appendChild(productDiv);
        });
    },
    async initializeLoginWidget() {
        loginManager.init(this.elements.templateMainContainer,this.handleNextBtn,AppState.mainState.token);

        loginManager.openOtpWidget()
    },
    handleBackBtn() {
        const currentStatus = AppState.nextBtnState.status;

        switch (currentStatus) {
            case CONSTANTS.ORDER_STATES.DELIVERY_DETAILS:
                // Going back to GET_RATES
                const deliveryDetailsSection = document.querySelector('#deliveryDetailsSection');
                if (deliveryDetailsSection) {
                    deliveryDetailsSection.remove();
                }

                // Show cart section again
                const cartSection = document.getElementById('cartSection');
                if (cartSection) {
                    cartSection.classList.remove('hideCartSection')
                }

                // Show the rates container again
                const getRatesContainer = document.querySelector('#getRatesContainer');
                if (getRatesContainer) {
                    getRatesContainer.style.display = 'block';
                }
                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.GET_RATES;
                ProgressManager.updateProgress('GET_RATES');
                break;

            case CONSTANTS.ORDER_STATES.CONTACT_DETAILS:
                // Going back to DELIVERY_DETAILS
                const contactDetailsSection = document.querySelector('#contactDetailsSection');
                if (contactDetailsSection) {
                    contactDetailsSection.remove();
                }
                document.querySelector('#forexContainerMain').classList.remove('contactMainContainer')

                // Show delivery details section
                const deliverySection = document.querySelector('#deliveryDetailsSection');
                if (deliverySection) {
                    deliverySection.style.display = 'block';
                }
                
                // Update the state BEFORE reassigning the button
                AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.DELIVERY_DETAILS;
                ProgressManager.updateProgress('CHOOSE_PROVIDER');
                
                // Reassign the button after state update
                const nextBtn = document.querySelector('#proceedBtn');
                if (nextBtn) {
                    this.assignNextButton(nextBtn);
                }
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
                ProgressManager.updateProgress('CONTACT_DETAILS');
                break;

            default:
                window.location = '/'
        }

        

        // Re-assign the appropriate next button after state change
        if (currentStatus === CONSTANTS.ORDER_STATES.DELIVERY_DETAILS) {
            this.assignNextButton(document.querySelector('#proceedBtn'));
        } else if (currentStatus === CONSTANTS.ORDER_STATES.CONTACT_DETAILS) {
            this.assignNextButton(document.querySelector('#contactUpdateBtn'));
        } else if (currentStatus === CONSTANTS.ORDER_STATES.REVIEW_PAYMENT) {
            this.assignNextButton(document.querySelector('#summaryConfirm'));
        }

        // Explicitly set next button to active since we have valid data
        AppState.nextBtnState.active = true;
        this.updateProceedButtonState();
    }

};