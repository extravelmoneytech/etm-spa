<!-- orderV3/index.php  -->
<!DOCTYPE html>
<html lang="en">

<?php


$fold = "../";
$title = "Get Rates";
$orderV3Page = true;
include $fold . 'includesv2/head.php';

?>
<style>
    .bottomSheetMain {
        display: none;
    }

    .bottomSheetMainVisible {
        display: flex;

    }


    .bottomSheet {
        transform: translateX(100%);
        transition: 0.3s;
    }

    .popBottomSheet {
        transform: translateX(0%);
    }

    @media (max-width:950px) {
        .bottomSheet {
            transform: translateY(100%);
            transition: 0.3s;
        }

        .popBottomSheet {
            transform: translateY(0%);
        }
    }

    /* Progress bar animations */
    [role="progressbar"] {
        transition: width 300ms ease-in-out;
    }

    .text-black.text-base.font-bold {
        transition: opacity 200ms ease-in-out;
    }

    .fade-out {
        opacity: 0;
    }

    /* Optional: Add animation for the number transition */
    .text-lg.font-bold {
        transition: transform 200ms ease-in-out;
    }

    .text-lg.font-bold.animate {
        transform: scale(1.1);
    }

    /* Add to your CSS */
    .grow.shrink.basis-0.h-0\\.5 {
        transition: all 400ms ease-in-out;
    }

    .rounded-\[30px\] {
        transition: all 400ms ease-in-out;
    }

    span.text-lg {
        transition: all 400ms ease-in-out;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .animate-pulse {
        animation: pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .no-scroll {
        overflow: hidden;
    }

    @media (max-width:950px) {
        .hideCartSection {
            display: none;
        }
    }

    .contactMainContainer .hideCartSection {
        display: none;
    }

    .contactMainContainer #sectionContainer {
        max-width: none;
    }

    #getRatesContainerMt::-webkit-scrollbar{
        display: none;
    }
    @media screen and (max-width:950px) {
        .deliveryMainContainer .borderSectionCart{
            border: none;
        }
        .deliveryMainContainer .headSectionCart{
            display: none;
        }
        .deliveryMainContainer .amountSectionCart{
            display: none;
        }
        .deliveryMainContainer #cartSection{
            padding-bottom: 0;
        }
        .deliveryMainContainer .btncontainerCart{
            padding: 0;
        }
        
    }

</style>

<body class="flex justify-center">
    <div class="w-full flex flex-col items-center justify-center" id="containerWholeMain">
        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php

            include $fold . 'includesv2/header.php';
            ?>

            <div class="px-5  mt-2">
                <svg id="backBtn" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M27.9998 15.9999C27.9998 16.2652 27.8945 16.5195 27.7069 16.7071C27.5194 16.8946 27.265 16.9999 26.9998 16.9999H7.41356L14.7073 24.2924C14.8002 24.3854 14.8739 24.4957 14.9242 24.6171C14.9745 24.7384 15.0004 24.8686 15.0004 24.9999C15.0004 25.1313 14.9745 25.2614 14.9242 25.3828C14.8739 25.5042 14.8002 25.6145 14.7073 25.7074C14.6144 25.8004 14.5041 25.8741 14.3827 25.9243C14.2613 25.9746 14.1312 26.0005 13.9998 26.0005C13.8684 26.0005 13.7383 25.9746 13.6169 25.9243C13.4955 25.8741 13.3852 25.8004 13.2923 25.7074L4.29231 16.7074C4.19933 16.6146 4.12557 16.5043 4.07525 16.3829C4.02493 16.2615 3.99902 16.1314 3.99902 15.9999C3.99902 15.8685 4.02493 15.7384 4.07525 15.617C4.12557 15.4956 4.19933 15.3853 4.29231 15.2924L13.2923 6.29245C13.4799 6.1048 13.7344 5.99939 13.9998 5.99939C14.2652 5.99939 14.5197 6.1048 14.7073 6.29245C14.895 6.48009 15.0004 6.73458 15.0004 6.99995C15.0004 7.26531 14.895 7.5198 14.7073 7.70745L7.41356 14.9999H26.9998C27.265 14.9999 27.5194 15.1053 27.7069 15.2928C27.8945 15.4804 27.9998 15.7347 27.9998 15.9999Z" fill="black" />
                </svg>
            </div>



            <section class="mt-4 flex items-center justify-center md:mt-20" id="templateContainer">


            </section>

        </div>

    </div>

    <div class="fixed top-0 left-0 w-full h-[100vh] bg-black/20 z-20 bottomSheetMain">
        <div class="absolute bottom-0 left-0 w-full z-50 md:w-[30%] md:right-0 md:left-auto md:top-0">
            <div class="bg-white rounded-tl-[32px] rounded-tr-[32px] rounded-bl-lg rounded-br-lg md:rounded-none md:h-full w-full flex flex-col items-center py-6 pb-12 md:pt-12 bottomSheet h-full">

            </div>
        </div>
    </div>
    <footer>




        <div
            class="loadingAnimationContainer hidden items-center justify-center h-screen fixed top-0 left-0 w-full bg-white z-50">
            <div class="loading">
                <svg viewBox="0 0 187.3 93.7" height="200px" width="300px" class="svgbox">
                    <defs>
                        <linearGradient y2="0%" x2="100%" y1="0%" x1="0%" id="gradient">
                            <stop stop-color="#2C5AA2" offset="0%"></stop>
                            <stop stop-color="#E3373A" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <path stroke="url(#gradient)"
                        d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z">
                    </path>
                </svg>
            </div>
        </div>




        <?php
        include $fold . 'includesv2/footerScripts.php';
        ?>



    </footer>






    <!-- <script>
        const CONSTANTS = {
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
        const currencyNames = {
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
        const TemplateCache = {
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
        const DropdownCache = {
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
        const AppState = {
            nextBtnState: {
                active: false,
                status: CONSTANTS.ORDER_STATES.GET_RATES
            },
            processingStates: {
                initialDataLoading: false,
                addingProduct: false,
                editingProduct: false,
                deletingProduct: false,
                exchangeRateCalculation: false
            },
            mainState: {
                currentCity: JSON.parse(sessionStorage.getItem('storedData'))[0].city,
                token: sessionStorage.getItem('token'),
                orderType: sessionStorage.getItem('productPage')
            },
            addProductState: {
                selectedCurrency: null,
                exchangeRate: null,
                currencyQuantity: null,
                productType: null,
            },
            editProductState: {
                selectedCurrencyEdit: null,
                currencyQuantityEdit: null,
                exchangeRateEdit: null,
                currencyRateEdit: null
            },
            deliveryState: {
                doorDelivery: 1,
                branch: null,
                ddAddress: null,
                ddLandMark: null
            },
            cardDataState: [],
            contactData: {
                countryCode: null,
                email: null,
                name: null,
                mobile: null,
                uid: null,
                travelDate: null,
                travelPurpose: null
            },
            kycData: {
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
            },
            setState(key, value, state) {
                this[state][key] = value;
                this.updateDOM(key, value);
            },
            getState(key, state) {
                return this[state][key];
            },
            updateDOM(key, value) {
                switch (key) {
                    case 'selectedCurrency':
                        const selectedCurrencyElement = document.querySelector('[data-bind="selectedCurrency"]');
                        if (selectedCurrencyElement) selectedCurrencyElement.textContent = value || '';
                        calculations.getExchangeRateAddProduct(this.addProductState.selectedCurrency, this.addProductState.currencyQuantity, this.addProductState.productType);
                        break;
                    case 'exchangeRate':
                        const exchangeRateElement = document.querySelector('[data-bind="exchangeRate"]');
                        if (exchangeRateElement) exchangeRateElement.textContent = UIManager.formatAmount(value) || '';
                        break;
                    case 'currencyQuantity':
                        calculations.getExchangeRateAddProduct(this.addProductState.selectedCurrency, this.addProductState.currencyQuantity, this.addProductState.productType);
                        break;
                    case 'productType':
                        const productTypeElement = document.querySelector('[data-bind="bottomSheetProduct"]');
                        if (productTypeElement) {
                            productTypeElement.textContent = value === CONSTANTS.PRODUCT_TYPES.currency ? 'Currency' : 'Forex Card';
                        }
                        break;
                    case 'selectedCurrencyEdit':
                        const selectedCurrencyEditElement = document.querySelector('[data-bind="selectedCurrencyEdit"]')
                        if (selectedCurrencyEditElement) selectedCurrencyEditElement.textContent = value || '';
                        break;
                    case 'exchangeRateEdit':
                        const exchangeRateEditElement = document.querySelector('[data-bind="exchangeRateEdit"]');
                        if (exchangeRateEditElement) exchangeRateEditElement.textContent = UIManager.formatAmount(value) || '';
                        break;
                    case 'currencyQuantityEdit':
                        calculations.getExchangeRateEditProduct(this.editProductState.currencyQuantityEdit, this.editProductState.currencyRateEdit);
                        const currencyQuantityEditElement = document.querySelector('#editCurrencyQuantity');
                        if (currencyQuantityEditElement) currencyQuantityEditElement.value = value || '';
                        break;
                    default:
                        console.warn(`No DOM updates defined for state key: ${key}`);
                }
            },
            isProcessing() {
                return Object.values(this.processingStates).some(state => state === true);
            },

            setProcessingState(state, value) {
                this.processingStates[state] = value;
                UIManager.updateProceedButtonState();
            }
        };
        const APIService = {
            async getRates(city) {

                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)

                    const params = new URLSearchParams({
                        action: 'get_city_rate',
                        token: AppState.getState('token', 'mainState'),
                        city: city
                    });
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });
                    if (!response.ok) throw new Error('Rate fetch failed');
                    const data = await response.json();

                    return data.products;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },

            async addProduct(type, rowId) {

                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.ADDING_PRODUCT, true);

                    let params;
                    if (type === 'add') {
                        params = new URLSearchParams({
                            action: 'add_remove_product',
                            token: AppState.getState('token', 'mainState'),
                            transaction: 'buy',
                            currency: AppState.getState('selectedCurrency', 'addProductState'),
                            product: AppState.getState('productType', 'addProductState'),
                            amount: AppState.getState('currencyQuantity', 'addProductState'),
                            function: 'add'
                        });
                    }
                    if (type === 'remove') {
                        params = new URLSearchParams({
                            action: 'add_remove_product',
                            token: AppState.getState('token', 'mainState'),
                            transaction: 'buy',
                            function: 'remove',
                            rowID: rowId
                        });
                    }
                    if (type === 'edit') {
                        params = new URLSearchParams({
                            action: 'save_amount',
                            token: AppState.getState('token', 'mainState'),
                            rowID: rowId,
                            amount: currentAmount
                        });
                    }
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
                    const data = await response.json();
                    return data.products;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.ADDING_PRODUCT, false);
                }
            },
            async editProduct(rowId, quantity) {


                try {

                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.EDITING_PRODUCT, true);

                    const params = new URLSearchParams({
                        action: 'save_amount',
                        token: AppState.getState('token', 'mainState'),
                        rowID: rowId,
                        amount: quantity
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
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.EDITING_PRODUCT, false);
                }
            },
            async getRatesMt(city) {

                try {
                    // AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)

                    const params = new URLSearchParams({
                        action: 'get_city_rate_mt',
                        token: AppState.getState('token', 'mainState'),
                        city: city
                    });
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });
                    if (!response.ok) throw new Error('Rate fetch failed');
                    const data = await response.json();

                    return data;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    // AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },
            async selectMtStore(store){
                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)
                    const params = new URLSearchParams({
                        action: 'select_store_mt',
                        token: AppState.getState('token', 'mainState'),
                        storeID: store
                    });
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });
                    if (!response.ok) throw new Error('Rate fetch failed');
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },
            async getDeliveryDetails() {
                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)
                    const params = new URLSearchParams({
                        action: 'get_delivery_details',
                        token: AppState.getState('token', 'mainState'),
                    });
                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });
                    if (!response.ok) throw new Error('Rate fetch failed');
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('API Error:', error);
                    return [];
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },

            async updateDeliveryDetails() {

                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)
                    const params = new URLSearchParams({
                        action: 'update_delivery_details',
                        token: AppState.mainState.token, // Ensure `token` is defined
                        dd_status: AppState.deliveryState.doorDelivery, // Ensure `doorDelivery` is defined
                        landmark: AppState.deliveryState.ddLandMark,
                        address: AppState.deliveryState.ddAddress,
                        selected_area: AppState.deliveryState.branch
                    });

                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: params.toString(),
                    });

                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                    const resp = await response.json();


                    return resp;
                } catch (error) {
                    console.error('Error fetching data:', error);
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false)
                }
            },
            async getContactDetails() {
                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)
                    const params = new URLSearchParams({
                        action: 'get_contact_details',
                        token: AppState.mainState.token
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

                    return resp

                } catch (error) {
                    console.error('Error fetching data:', error);
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },
            async updateContactDetails() {
                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

                    const params = new URLSearchParams({
                        action: 'save_contact_details',
                        token: AppState.mainState.token,
                        full_name: AppState.contactData.name,
                        email: AppState.contactData.email,
                        travel_date: AppState.contactData.travelDate,
                        purpose: AppState.contactData.travelPurpose,
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

                    return resp

                } catch (error) {
                    console.log(error)
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false)
                }
            },
            async sendOtp(otpMode, countryCode, mobNumber) {

                try {

                    const params = new URLSearchParams({
                        action: 'send_otp',
                        token: AppState.mainState.token,
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
            async verifyOtp(fetchOtp, aff_token) {
                try {
                    const params = new URLSearchParams({
                        action: 'check_otp',
                        token: AppState.mainState.token,
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
            async getSummaryDetails() {
                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
                    const params = new URLSearchParams({
                        action: 'summary',
                        token: AppState.getState('token', 'mainState')
                    });

                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });

                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    const data = await response.json();
                    return data;

                } catch (error) {
                    console.error('Error fetching summary:', error);
                    window.location.href = '/error.html';
                    return null;
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            },
            async getUserIP() {
                try {
                    const response = await fetch('https://api.ipify.org?format=json');
                    const data = await response.json();
                    return data.ip;
                } catch (error) {
                    console.error('Error fetching user IP:', error);
                    return null;
                }
            },
            async placeOrder() {
                console.log('placing order');

                try {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
                    const userIP = await this.getUserIP();
                    if (!userIP) throw new Error("Could not retrieve user IP address.");

                    const params = new URLSearchParams({
                        action: 'create_order',
                        token: AppState.getState('token', 'mainState'),
                        userip: userIP
                    });


                    const response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: params.toString()
                    });

                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    const data = await response.json();

                    return data;

                } catch (error) {
                    console.error('Error placing order:', error);
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                }
            }


        };
        const UIManager = {
            elements: {},
            dropdownInstances: {},
            async init(orderType) {
                this.cacheStaticElements();
                if (orderType === CONSTANTS.ORDER_TYPES.moneyTransfer) {

                    let moneyTransferTemplate = await TemplateCache.get(CONSTANTS.TEMPLATE_NAMES.MONEYTRANSFER_CONTAINER);
                    console.log(this.elements.templateContainer)
                    this.elements.templateContainer.innerHTML = moneyTransferTemplate;
                    this.cacheMoneyTransferElements();
                    await this.loadMoneyTransferData();
                    this.setupMoneyTransferListeners();

                } else if (orderType === CONSTANTS.ORDER_TYPES.forexTransfer) {


                    let forexContainer = await TemplateCache.get(CONSTANTS.TEMPLATE_NAMES.FOREX_CONTAINER);
                    this.elements.templateContainer.innerHTML = forexContainer;
                    this.cacheForexElements();
                    await this.loadForexData();
                    this.setupForexListeners();
                }
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
                console.log("Next button cached:", this.elements.nextBtn); // Add this line
            },
            cacheMoneyTransferElements() {
                this.elements = {

                }
            },
            setupForexListeners() {
                this.elements.addCurrencyBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.currency, 'addProduct'));
                this.elements.addForexBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.forexCard, 'addProduct'));

                // Log before attaching event
                console.log("Setting up next button listener, button:", this.elements.nextBtn);

                this.assignNextButton(this.elements.nextBtn);
            },
            setupMoneyTransferListeners() {

            },
            handleProductAddBtnVisibility(val) {
                if (!val) {
                    this.elements.addCurrencyBtn.style.display = 'none'
                    this.elements.addForexBtn.style.display = 'none'
                } else {
                    this.elements.addCurrencyBtn.style.display = 'inline-flex'
                    this.elements.addForexBtn.style.display = 'inline-flex'
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
                    console.log(data, 'data')
                    calculations.processCardData(data);
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

                            calculations.processCardData(AppState.cardDataState);
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
                calculations.processCardData(rates);
                AppState.nextBtnState.active = true;
            },
            async loadMoneyTransferData() {
                const data = await APIService.getRatesMt(AppState.getState('currentCity', 'mainState'));

                UIManager.renderCardsMt(data.store_list)
                document.querySelector('#mtSavings').textContent = data.savings+ ' INR';

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
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                            exchangeRate: this.formatAmount(item.totalINR)
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
                            editButton.addEventListener('click', async () => await UIManager.handleEditProduct(item));
                        }
                        const deleteButton = div.querySelector('.deleteProduct');
                        if (deleteButton) {
                            deleteButton.addEventListener('click', async () => await UIManager.handleDeleteProduct(item));
                        }
                        fragment.appendChild(div.firstChild);
                    });
                    container.innerHTML = '';
                    container.appendChild(fragment);
                } catch (error) {
                    console.error('Card render error:', error);
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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
                            selectButton.addEventListener('click', async() => {
                                // Handle selection - you can add your selection logic here
                                console.log(`Selected bank: ${item.storeID}`);
                                let result=await APIService.selectMtStore(item.storeID);
                                if(result){
                                    UIManager.handleNextBtn
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
                    this.elements.cartTotal.textContent = this.formatAmount(val)
                } else {
                    console.log('no cart elemnt')
                }

            },
            async handleEditProduct(product) {
                this.openBottomSheet(product.productType, 'editProduct', product.rowID);
            },
            async handleDeleteProduct(product) {
                const data = await APIService.addProduct('remove', product.rowID);
                calculations.processCardData(data)
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

                console.log('called againnbb')


                if (!userCheck()) {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

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

                        AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                        await this.initializeDeliveryDetailsComponents();
                        AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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

                        let status = await APIService.updateDeliveryDetails();

                        if (status) {
                            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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

                            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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


                        let response = await APIService.updateContactDetails()


                        if (response.status) {
                            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
                        }

                        return
                    }
                    if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.REVIEW_PAYMENT) {
                        let data = await APIService.placeOrder();
                        console.log(data)
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

                let nextBtn = document.querySelector('#deliveryUpdateBtn');
                this.assignNextButton(nextBtn);

                let data = await APIService.getDeliveryDetails()

                if (data) {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);

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


                    document.getElementById('radio1').addEventListener('click', function() {
                        AppState.deliveryState.doorDelivery = 1;
                        UIManager.toggleRadio(this, 'radio2');

                        // document.querySelector('#cartContent').style.display = 'block'
                        // document.querySelector('#cartContentStorePickup').style.display = 'none'
                    });

                    document.getElementById('radio2').addEventListener('click', function() {
                        AppState.deliveryState.doorDelivery = 0;
                        UIManager.toggleRadio(this, 'radio1');
                        // document.querySelector('#cartContent').style.display = 'none'
                        // document.querySelector('#cartContentStorePickup').style.display = 'block'
                    });

                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
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

                let data = await APIService.getContactDetails()

                if (data) {
                    console.log(data, 'datatvv')
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                        console.log('previous date available')
                        console.log(data.travel_date)
                        // AppState.contactData.travelDate = data.travel_date;
                        // window.setPickerDate(new Date(data.travel_date));
                        AppState.contactData.travelDate = window.getFormatedDate(window.getSelectedDate())
                    } else {
                        console.log(' no previous date available')
                        AppState.contactData.travelDate = window.getFormatedDate(window.getSelectedDate())
                    }

                    if (data.travel_purpose != "") {
                        AppState.contactData.travelPurpose = data.travel_purpose;
                        Dropdown.setValue('purposeSelector', data.travel_purpose)
                    } else {
                        AppState.contactData.travelPurpose = Dropdown.getValue('purposeSelector').getAttribute('value')
                    }

                    this.updateKycList(Dropdown.getValue('purposeSelector').getAttribute('value'));

                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

                }
            },
            updateKycList(value) {
                const documentContainer = document.querySelector('#document-list');
                documentContainer.innerHTML = ''
                let docs = AppState.kycData[value]
                console.log(docs)
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

                const summaryData = await APIService.getSummaryDetails();
                if (!summaryData) return;

                AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true);
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
                totalAmount.innerHTML = this.formatAmount(summaryData.total);
                gst.innerHTML = '₹' + summaryData.gst;

                // Render product list
                this.renderProductList(productList, summaryData.order_details);
                AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);

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
                    amountParagraph.textContent = this.formatAmount(product.amount * product.rate);

                    productDiv.appendChild(rateParagraph);
                    productDiv.appendChild(amountParagraph);
                    container.appendChild(productDiv);
                });
            },
            formatAmount(amount) {
                return `₹ ${parseFloat(amount).toLocaleString('en-IN', { maximumFractionDigits: 0 })}`;
            },
            async initializeLoginWidget() {
                loginManager.init();

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
                        AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.DELIVERY_DETAILS;
                        ProgressManager.updateProgress('CHOOSE_PROVIDER');
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
            }

        };
        const calculations = {
            ibrData: (() => {
                const storedIbrData = sessionStorage.getItem('ibrData');

                return storedIbrData ? JSON.parse(storedIbrData) : null;
            })(),
            getExchangeRateAddProduct(currency, quantity, productType) {

                AppState.setState('exchangeRate', calculations.ibrData[currency][productType] * quantity, 'addProductState')
            },
            getExchangeRateEditProduct(rate, quantity) {
                AppState.setState('exchangeRateEdit', quantity * rate, 'editProductState');
            },
            async processCardData(data) {

                try {

                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.RATE_CALCULATION, true);

                    const productCounts = {};
                    data.forEach((item) => {
                        const productTypeKey = item.productType.toLowerCase();
                        productCounts[productTypeKey] = (productCounts[productTypeKey] || 0) + 1;
                    });
                    const productTypeCounters = {};
                    data.forEach((item) => {
                        const productTypeKey = item.productType.toLowerCase();
                        if (!productTypeCounters[productTypeKey]) {
                            productTypeCounters[productTypeKey] = 0;
                        }
                        productTypeCounters[productTypeKey]++;
                        const camelCasedProductType = item.productType.toLowerCase().replace(/(?:^\w|[A-Z]|\b\w)/g, (word, index) => index === 0 ? word.toUpperCase() : word.toUpperCase()).replace(/\s+/g, '');
                        if (productCounts[productTypeKey] > 1) {
                            item.productNumber = `${camelCasedProductType} ${productTypeCounters[productTypeKey]}`;
                        } else {
                            item.productNumber = camelCasedProductType;
                        }
                        item.allowDelete = data.length > 1;
                    });
                    AppState.cardDataState = data;

                    UIManager.renderCards(AppState.cardDataState);

                    if (data.length == 3) {
                        UIManager.handleProductAddBtnVisibility(false)
                    } else {
                        UIManager.handleProductAddBtnVisibility(true)
                    }
                    let cartTotal = this.calculateTotalAmount(AppState.cardDataState);
                    await UIManager.updateCart(cartTotal)
                } catch (error) {
                    console.log(error)
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.RATE_CALCULATION, false);
                }

            },
            calculateTotalAmount(data) {
                try {
                    if (!data || data === 0) {
                        return 0;
                    }

                    const total = data.reduce((sum, item) => {
                        // Ensure totalINR is treated as a number and is valid
                        const amount = Number(item.totalINR) || 0;
                        return sum + amount;
                    }, 0);

                    return total;
                } catch (error) {
                    console.error('Error calculating total amount:', error);
                    return 0;
                }
            }




        };
        const loginManager = {
            otpInputs: null,
            countryCodeDropDown: null,
            countryCodeMain: null,
            optSendDiv: null,

            init() {
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

                UIManager.elements.templateMainContainer.style.display = 'none'
            },
            async closeOtpWidget() {

                if (this.loginWidgetContainer) {
                    UIManager.elements.templateMainContainer.style.display = 'flex'
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
                        console.log(item)
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
                        APIService.sendOtp();

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
                    let response = await APIService.sendOtp(otpMode, countryCode, mobNumber)

                    if (response) {
                        console.log(response);
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
                    let response = await APIService.verifyOtp(fetchOtp, aff_token);

                    if (response.verified) {
                        console.log(response)


                        sessionStorage.setItem('userId', response.uid)



                        // Store the object as a JSON string
                        const userInfo = {
                            userId: response.uid,
                            countryCode: response.customer_country_code,
                            mobNum: response.customer_mobile
                        };
                        localStorage.setItem('userInfo', JSON.stringify(userInfo));



                        window.userCheckMain()
                        UIManager.handleNextBtn()
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

        }
        const ProgressManager = {
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








        async function initializeApp() {
            try {
                let orderType = AppState.mainState.orderType

                await UIManager.init(orderType);
            } catch (error) {
                console.error('Init failed:', error);
            }
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeApp);
        } else {
            initializeApp();
        }
    </script> -->



    <script type="module" src="../orderv3/main.js"></script>
</body>

</html>