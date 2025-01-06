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



            <section class="md:mt-12">
                <div class="pb-32 md:pb-8 px-5 sm:px-12 md:px-16 py-5 md:flex gap-5 md:gap-10 forexContainer flex-col md:flex-row "
                    style="padding-bottom:25rem;">

                    <div class="w-full md:w-2/3" id="sectionContainer">
                        <div class="" id="getRatesContainer">


                            <div id="cardContainer" class="flex flex-col gap-4">

                            </div>




                            <div class="mt-6" id="addBtnContainer">
                                <div class="flex  md:gap-8 items-center flex-col md:flex-row">
                                    <div id="addForexCardBtn"
                                        class="w-full h-10 mt-3 px-3 py-2 rounded-2xl border bg-[#0e51a0]/10 justify-center items-center gap-1 inline-flex cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                            fill="none">
                                            <path
                                                d="M14 8.15039C14 8.283 13.9473 8.41018 13.8536 8.50394C13.7598 8.59771 13.6326 8.65039 13.5 8.65039H8.5V13.6504C8.5 13.783 8.44732 13.9102 8.35355 14.0039C8.25979 14.0977 8.13261 14.1504 8 14.1504C7.86739 14.1504 7.74021 14.0977 7.64645 14.0039C7.55268 13.9102 7.5 13.783 7.5 13.6504V8.65039H2.5C2.36739 8.65039 2.24021 8.59771 2.14645 8.50394C2.05268 8.41018 2 8.283 2 8.15039C2 8.01778 2.05268 7.89061 2.14645 7.79684C2.24021 7.70307 2.36739 7.65039 2.5 7.65039H7.5V2.65039C7.5 2.51778 7.55268 2.39061 7.64645 2.29684C7.74021 2.20307 7.86739 2.15039 8 2.15039C8.13261 2.15039 8.25979 2.20307 8.35355 2.29684C8.44732 2.39061 8.5 2.51778 8.5 2.65039V7.65039H13.5C13.6326 7.65039 13.7598 7.70307 13.8536 7.79684C13.9473 7.89061 14 8.01778 14 8.15039Z"
                                                fill="#0E51A0" />
                                        </svg>
                                        <p class="text-primary-blue text-xs font-semibold ">Add Another Forex Card</p>
                                    </div>

                                    <div id="addCurrencyCardBtn"
                                        class="w-full h-10 mt-2 px-3 py-2 rounded-2xl border bg-[#0e51a0]/10 justify-center items-center gap-1 inline-flex cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                            fill="none">
                                            <path
                                                d="M14 8.15039C14 8.283 13.9473 8.41018 13.8536 8.50394C13.7598 8.59771 13.6326 8.65039 13.5 8.65039H8.5V13.6504C8.5 13.783 8.44732 13.9102 8.35355 14.0039C8.25979 14.0977 8.13261 14.1504 8 14.1504C7.86739 14.1504 7.74021 14.0977 7.64645 14.0039C7.55268 13.9102 7.5 13.783 7.5 13.6504V8.65039H2.5C2.36739 8.65039 2.24021 8.59771 2.14645 8.50394C2.05268 8.41018 2 8.283 2 8.15039C2 8.01778 2.05268 7.89061 2.14645 7.79684C2.24021 7.70307 2.36739 7.65039 2.5 7.65039H7.5V2.65039C7.5 2.51778 7.55268 2.39061 7.64645 2.29684C7.74021 2.20307 7.86739 2.15039 8 2.15039C8.13261 2.15039 8.25979 2.20307 8.35355 2.29684C8.44732 2.39061 8.5 2.51778 8.5 2.65039V7.65039H13.5C13.6326 7.65039 13.7598 7.70307 13.8536 7.79684C13.9473 7.89061 14 8.01778 14 8.15039Z"
                                                fill="#0E51A0" />
                                        </svg>
                                        <p class="text-primary-blue text-xs font-semibold ">Add Another Currency</p>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>



                    <div class="md:static fixed  left-1/2  transform -translate-x-1/2   md:translate-x-0 md:translate-y-0 bottom-0 w-full md:w-1/3 mt-2  md:mt-0 bg-white md:h-full px-5 sm:px-12 md:px-0 pb-4 md:pb-0">
                        <div class="  rounded-2xl border border-black/10 w-full">
                            <div
                                class="w-full h-10 customGradient3  rounded-tl-2xl z-20 rounded-tr-xl justify-center items-center inline-flex">
                                <div
                                    class="grow shrink basis-0 self-stretch px-3 py-1 justify-start items-center gap-1.5 inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                        fill="none">
                                        <path
                                            d="M17.5769 6.47083C17.3387 6.35406 17.0686 6.31905 16.8085 6.37121C16.5483 6.42338 16.3126 6.55981 16.1378 6.75941L13.5741 9.52261L10.8482 3.40916C10.8481 3.40662 10.8481 3.40408 10.8482 3.40154C10.7508 3.19013 10.5947 3.01107 10.3987 2.88557C10.2026 2.76006 9.97468 2.69336 9.74188 2.69336C9.50908 2.69336 9.28115 2.76006 9.08508 2.88557C8.88901 3.01107 8.73301 3.19013 8.63554 3.40154C8.63566 3.40408 8.63566 3.40662 8.63554 3.40916L5.90965 9.52261L3.34594 6.75941C3.17003 6.55977 2.93359 6.42322 2.67276 6.37061C2.41193 6.31801 2.14105 6.35224 1.9015 6.46809C1.66196 6.58393 1.46693 6.77501 1.34621 7.01214C1.2255 7.24926 1.18573 7.51939 1.233 7.78124C1.233 7.78961 1.233 7.79723 1.23833 7.8056L2.96523 15.7145C3.01839 15.993 3.16702 16.2442 3.38551 16.4249C3.604 16.6056 3.87866 16.7044 4.16219 16.7043H15.3223C15.6057 16.7042 15.8802 16.6053 16.0985 16.4247C16.3169 16.244 16.4654 15.9929 16.5185 15.7145L18.2454 7.8056C18.2454 7.79723 18.2454 7.78961 18.2508 7.78124C18.2989 7.51906 18.2589 7.24831 18.137 7.01126C18.0151 6.7742 17.8182 6.58417 17.5769 6.47083ZM15.3269 15.4617L15.3223 15.4861H4.16142L4.15686 15.4617L2.43224 7.56728L2.4429 7.57946L5.64087 11.0241C5.70934 11.0981 5.79512 11.154 5.8905 11.1867C5.98587 11.2193 6.08787 11.2278 6.18734 11.2114C6.28681 11.1949 6.38064 11.154 6.46041 11.0924C6.54019 11.0307 6.60341 10.9502 6.64442 10.8581L9.74188 3.91246L12.8401 10.8604C12.8811 10.9525 12.9443 11.033 13.0241 11.0947C13.1039 11.1563 13.1977 11.1972 13.2972 11.2137C13.3967 11.2301 13.4987 11.2216 13.594 11.1889C13.6894 11.1563 13.7752 11.1004 13.8437 11.0264L17.0416 7.58175L17.0515 7.56728L15.3269 15.4617Z"
                                            fill="white" />
                                    </svg>
                                    <p class="text-white text-xs font-bold ">We Promise the Best Rates in the Forex market.
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 mt-6 flex justify-between flex-col h-full">

                                <div class="w-full py-[12px] rounded-md justify-between items-center inline-flex">
                                    <div class="w-[102px] text-black text-base font-semibold ">Total Amount</div>
                                    <div class="text-black text-xl font-bold leading-tight">₹ 1,84,472</div>
                                </div>

                                <div class="bg-white py-4 rounded-t-3xl   w-full flex items-center justify-center flex-col">
                                    <div class=" h-12 px-2 py-3 cursor-pointer bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-4 mb-0 md:mb-4   z-10 w-full"
                                        id="proceedBtn">
                                        <div class="text-white text-sm font-bold">Proceed to Next</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>





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
            PRODUCT_TYPES: {
                currency: 'currency',
                forexCard: 'forexCard'
            },
            PROCESSING_STATES: {
                INITIAL_LOAD: 'initialDataLoading',
                ADDING_PRODUCT: 'addingProduct',
                EDITING_PRODUCT: 'editingProduct',
                DELETING_PRODUCT: 'deletingProduct',
                RATE_CALCULATION: 'exchangeRateCalculation'
            },
            ORDER_STATES: {
                GET_RATES: 'getRates',
                DELIVERY_DETAILS: 'deliveryDetails',
                CONTACT_DETAILS: 'contact_details',
                REVIEW_PAYMENT: 'reviewAndPayment'
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
                token: sessionStorage.getItem('token')
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
                ddAddress:null,
                ddLandMark:null
            },
            cardDataState: [],
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
                    console.log(data)
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
                console.log(rowId, quantity)

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
            async getDeliveryDetails() {
                try {
                    console.log('calling')
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

                return
                try {
                    const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
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
                }
            }


        };
        const UIManager = {
            elements: {},
            dropdownInstances: {},
            async init() {
                this.cacheStaticElements();
                await this.loadInitialData();
                this.setupStaticListeners();
            },
            cacheStaticElements() {
                this.elements = {
                    addCurrencyBtn: document.querySelector('#addCurrencyCardBtn'),
                    addForexBtn: document.querySelector('#addForexCardBtn'),
                    bottomSheetMain: document.querySelector('.bottomSheetMain'),
                    nextBtn: document.querySelector('#proceedBtn')
                };
            },
            setupStaticListeners() {
                this.elements.addCurrencyBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.currency, 'addProduct'));
                this.elements.addForexBtn?.addEventListener('click', () => this.openBottomSheet(CONSTANTS.PRODUCT_TYPES.forexCard, 'addProduct'));
                this.elements.nextBtn.addEventListener('click', () => this.handleNextBtn())
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
                        console.log(response, 'bvcc')
                        if (response.status) {
                            const clickedCard = AppState.cardDataState.find((item) => item.rowID === rowID);
                            if (clickedCard) {
                                clickedCard.amount = AppState.getState('currencyQuantityEdit', 'editProductState');
                                clickedCard.totalINR = AppState.getState('exchangeRateEdit', 'editProductState');
                            }
                            console.log(AppState.cardDataState, 'app2')
                            calculations.processCardData(AppState.cardDataState);
                            this.closeBottomSheet();

                        } else {
                            console.error('Failed to update the product.');
                        }
                    });
                }
            },


            async loadInitialData() {
                const rates = await APIService.getRates(AppState.getState('currentCity', 'mainState'));
                calculations.processCardData(rates);
                AppState.nextBtnState.active = true;
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
            async handleEditProduct(product) {
                this.openBottomSheet(product.productType, 'editProduct', product.rowID);
            },
            async handleDeleteProduct(product) {
                const data = await APIService.addProduct('remove', product.rowID);
                calculations.processCardData(data)
            },
            updateProceedButtonState() {
                const proceedBtn = this.elements.nextBtn;

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
            async handleNextBtn() {
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
                        console.log(ddLandMark,'ddLandMark')
                        let branch = AppState.deliveryState.branch;

                        AppState.setState('ddAddress',ddAddress,'deliveryState');
                        AppState.setState('ddLandMark',ddLandMark,'deliveryState');
                        console.log(AppState.getState('ddAddress','deliveryState'))
                        console.log(AppState.getState('ddLandMark','deliveryState'));

                        if (!branch) {
                            insertAlertBelowElement(document.querySelector('#cityDropDown'), 'Select a branch')
                            return
                        } else {
                            removeAlertBelowElement(document.querySelector('#cityDropDown'))
                        }
                        // Simple validation


                        if (AppState.deliveryState.doorDelivery) {
                            if (ddAddress === "") {
                                insertAlertBelowElement(document.querySelector('#ddAddress'), 'Enter a valid address')
                                return
                            } else {
                                removeAlertBelowElement(document.querySelector('#ddAddress'))
                            }
                            if (ddLandMark === "") {
                                insertAlertBelowElement(document.querySelector('#ddLandMark'), 'Enter a valid landmark')
                                return
                            } else {
                                removeAlertBelowElement(document.querySelector('#ddLandMark'))
                            }
                        }

                        console.log(APIService.updateDeliveryDetails());
                        


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
                    console.log(data)
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
            }

        };
        const calculations = {
            ibrData: (() => {
                const storedIbrData = sessionStorage.getItem('ibrData');
                console.log(storedIbrData, 'bvc')
                return storedIbrData ? JSON.parse(storedIbrData) : null;
            })(),
            getExchangeRateAddProduct(currency, quantity, productType) {
                console.log(calculations.ibrData, 'knb')
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
        async function initializeApp() {
            try {
                await UIManager.init();
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