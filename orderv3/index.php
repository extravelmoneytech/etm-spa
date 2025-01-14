<!-- orderV3/index.php  -->
<!DOCTYPE html>
<html lang="en">

<?php


$fold = "../";
$title = "Get Rates";
$orderV3Page = true;
include $fold . 'includesv2/head.php';

?>


<body>
    <div class="flex flex-col items-center justify-center">
        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php

            include $fold . 'includesv2/header.php';
            ?>

            <div class="progressBar mb-0 md:mb-8">
                <div class="w-full justify-start items-center progressBar hidden md:inline-flex mt-8">
                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">1</span>
                        </div>
                        <span
                            class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Get
                            Rates</span>
                    </div>

                    <div class="forexContainer grow shrink basis-0 h-0.5 bg-[#eaeef4]"></div>
                    <div class="forexContainer flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">2</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Choose
                            Provider</span>
                    </div>

                    <div class="moneyT grow shrink basis-0 h-0.5 bg-[#20bc73]"></div>
                    <div class="moneyT flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">2</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Choose
                            Provider</span>
                    </div>


                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">3</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Contact
                            Details</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">4</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Review
                            & Payment</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">5</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Complete
                            KYC</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                </div>


            </div>

            <div class="progressContainer px-5 sm:px-12 md:px-16">
                <div
                    class="hidden w-full p-2.5 bg-primary-blue/10 rounded-lg justify-center items-center gap-2.5 inline-flex md:hidden">
                    <div class="text-primary-blue text-base font-bold" id="productNameIdentifier">Currency Exchange
                    </div>
                </div>

                <div class="w-full progressBar justify-start items-center gap-2 inline-flex mt-6 md:hidden">
                    <div
                        class=" w-10 aspect-square bg-white rounded-3xl border-2 border-primary-blue flex-col justify-center items-center gap-2.5 inline-flex">
                        <div>
                            <span class="text-primary-blue text-lg font-bold ">1</span>
                            <span class="text-black/40 text-base font-medium ">/5</span>
                        </div>
                    </div>
                    <div class="text-black text-base font-bold leading-none">Get Rates</div>
                    <div class="flex flex-1 shrink gap-2.5 self-stretch my-auto h-0.5 bg-primary-blue basis-4 w-[198px]"
                        role="progressbar"></div>
                </div>
            </div>



            <section class="md:mt-12" id="templateContainer">


            </section>

        </div>

    </div>

    <div class="fixed top-0 left-0 w-full h-[100vh] bg-black/20 z-20 bottomSheetMain">

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
    </style>




    <script>
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
                currentCity: 'Ernakulam',
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
                        if (exchangeRateElement) exchangeRateElement.textContent = value || '';
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
                        if (exchangeRateEditElement) exchangeRateEditElement.textContent = value || '';
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
                    templateContainer: document.querySelector('#templateContainer'),
                };
            },
            cacheForexElements() {
                this.elements = {
                    addCurrencyBtn: document.querySelector('#addCurrencyCardBtn'),
                    addForexBtn: document.querySelector('#addForexCardBtn'),
                    bottomSheetMain: document.querySelector('.bottomSheetMain'),
                    nextBtn: document.querySelector('#proceedBtn')
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

                calculations.processCardData(rates);
                AppState.nextBtnState.active = true;
            },
            async loadMoneyTransferData() {
                const data = await APIService.getRatesMt(AppState.getState('currentCity', 'mainState'));

                UIManager.renderCardsMt(data.store_list)

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
                }
                this.currentBottomSheetMode = mode;
                this.currentBottomSheetType = type;
                this.currentBottomSheetRowId = rowId
                const templateName = mode === 'editProduct' ? 'bottomSheetEdit' : 'bottomSheet';
                if (!this.cachedTemplate || this.currentTemplate !== templateName) {
                    this.cachedTemplate = await TemplateCache.get(templateName);
                    this.currentTemplate = templateName;
                }
                this.elements.bottomSheetMain.innerHTML = this.cachedTemplate;
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
                this.elements.bottomSheetMain.classList.add('bottomSheetMainVisible');
                setTimeout(() => {
                    document.querySelector('.bottomSheet')?.classList.add('popBottomSheet');
                }, 100);
            },



            closeBottomSheet() {
                const bottomSheet = document.querySelector('.bottomSheet');
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
                            exchangeRate: item.totalINR
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
                            selectButton.addEventListener('click', () => {
                                // Handle selection - you can add your selection logic here
                                console.log(`Selected bank: ${item.vendor_name}`);
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
            async handleEditProduct(product) {
                this.openBottomSheet(product.productType, 'editProduct', product.rowID);
            },
            async handleDeleteProduct(product) {
                const data = await APIService.addProduct('remove', product.rowID);
                calculations.processCardData(data)
            },
            updateProceedButtonState() {

                const proceedBtn = this.elements.nextBtn;
                console.log(proceedBtn)
                if (AppState.isProcessing()) {
                    proceedBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    proceedBtn.disabled = true;
                    AppState.nextBtnState.active = false;
                    return;
                }

                if (AppState.cardDataState.length > 0) {
                    proceedBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    proceedBtn.disabled = false;
                    AppState.nextBtnState.active = true;
                    return;
                }

                proceedBtn.classList.add('opacity-50', 'cursor-not-allowed');
                proceedBtn.disabled = true;
                AppState.nextBtnState.active = false;
            },

            assignNextButton(element) {
                if (element) {
                    UIManager.elements.nextBtn = element
                    element.addEventListener('click', () => this.handleNextBtn());

                } else {
                    console.warn("No element provided for next button");
                }
            },
            async handleNextBtn() {


                if (!userCheck()) {
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

                        // Update app state
                        AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.DELIVERY_DETAILS;

                        // Initialize any required components for delivery details
                        await this.initializeDeliveryDetailsComponents();
                        return
                    }
                    if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.DELIVERY_DETAILS) {



                        let ddLandMark = document.querySelector('#ddLandMark').value;
                        let ddAddress = document.querySelector('#ddAddress').value;

                        let branch = AppState.deliveryState.branch;

                        AppState.setState('ddAddress', ddAddress, 'deliveryState');
                        AppState.setState('ddLandMark', ddLandMark, 'deliveryState');


                        if (!branch) {
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

                            // Hide current content
                            const deliveryDetailsContainer = document.querySelector('#deliveryDetailsSection');
                            if (deliveryDetailsContainer) deliveryDetailsContainer.style.display = 'none';

                            // Load and append delivery details template
                            const template = await TemplateCache.get('contactDetails');
                            const contactSection = document.createElement('div');
                            contactSection.id = 'contactDetailsSection';
                            contactSection.innerHTML = template;

                            const sectionContainer = document.getElementById('sectionContainer');
                            const cartContainer = document.getElementById('cartSection')
                            cartContainer.style.display = 'none'
                            sectionContainer.classList.remove('md:w-2/3');
                            sectionContainer.appendChild(contactSection);

                            AppState.nextBtnState.status = CONSTANTS.ORDER_STATES.CONTACT_DETAILS;
                            await this.initializeContactDetailsComponents()
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
                        }

                        return
                    }
                    if (AppState.nextBtnState.status === CONSTANTS.ORDER_STATES.REVIEW_PAYMENT) {
                        let data= await APIService.placeOrder();
                        console.log(data)
                        if (data.status) {
                            sessionStorage.setItem('orderId', data.orderID);
                            sessionStorage.setItem('customerName',AppState.contactData.name);
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

                    const districtName = document.getElementById('districtName');
                    if (districtName) {
                        districtName.textContent = data.district || '';
                    }

                    const cities = data.areas;
                    const dropdownList = document.querySelector('#cityDropDown').querySelector('.dropdownList');
                    const templateItem = document.querySelector('#cityDropDown').querySelector('.dropdownItem');


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

                    const script = document.createElement('script');
                    script.src = 'orderv3/components/modules/datepicker.js';
                    script.async = true;

                    await new Promise((resolve, reject) => {
                        script.onload = resolve;
                        script.onerror = reject;
                        document.head.appendChild(script);
                    });


                    // Initialize with callback
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
                    kyc.textContent = `${index+1}. ${item}`
                    documentContainer.appendChild(kyc)
                })
            },
            async initializeSummaryComponents() {

                const placeOrderBtn = document.querySelector('#summaryConfirm');
                this.assignNextButton(placeOrderBtn);

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
                totalAmount.innerHTML = this.formatAmount(summaryData.total);
                gst.innerHTML = '₹' + summaryData.gst;

                // Render product list
                this.renderProductList(productList, summaryData.order_details);

            },

            renderProductList(container, products) {
                container.innerHTML = '';
                products.forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.classList.add('justify-between', 'items-start', 'inline-flex');

                    const rateParagraph = document.createElement('p');
                    rateParagraph.classList.add('text-[#677489]', 'text-sm', 'font-medium', 'tracking-tight');
                    rateParagraph.textContent = `${product.amount} ${product.currency} (${product.product === 'Forex Card' ? 'Card' : 'Note'}) @ ${product.rate}`;

                    const amountParagraph = document.createElement('p');
                    amountParagraph.classList.add('text-[#111729]', 'text-sm', 'font-medium', 'tracking-tight');
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
            processCardData(data) {

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
                            item.productNumber = `${camelCasedProductType}${productTypeCounters[productTypeKey]}`;
                        } else {
                            item.productNumber = camelCasedProductType;
                        }
                        item.allowDelete = data.length > 1;
                    });
                    AppState.cardDataState = data;
                    UIManager.renderCards(AppState.cardDataState);
                } catch (error) {
                    console.log(error)
                } finally {
                    AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.RATE_CALCULATION, false);
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

                this.setupOTPInputs();
                this.setupCountryCodeDropdown();
                this.setupLoginListeners();

            },
            async openOtpWidget() {
                this.loginWidgetContainer.style.display = 'flex'
                this.otpWidget.style.display = 'flex'
                document.querySelector('body').classList.add('snipContainer');
                this.mobNumberInput.focus()
            },
            async closeOtpWidget() {

                if (this.loginWidgetContainer) {
                    // Reset widget state properly
                    this.loginWidgetContainer.style.display = 'none';
                    this.otpWidget.style.display = 'none';

                    // Remove the body class properly
                    document.querySelector('body').classList.remove('snipContainer');



                }
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
                    currentInput.style.backgroundColor = 'rgba(14, 81, 160, 0.1)';

                    if (currentInput.value === '' && index > 0) {
                        this.otpInputs[index - 1].focus();
                    }
                }
            },

            handleOTPInput(event, index) {
                const currentInput = event.target;
                currentInput.value = currentInput.value.replace(/\D/g, '').slice(0, 1);

                if (currentInput.value) {
                    currentInput.style.backgroundColor = 'rgba(14, 81, 160, 1)';

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
                        input.style.backgroundColor = 'rgba(14, 81, 160, 0.1)';
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


                    loginManager.closeOtpWidget()
                    UIManager.handleNextBtn()
                } else {
                    insertAlertBelowElement(this.otpContainer, 'Incorrect OTP');
                    return
                }
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
    </script>

</body>

</html>