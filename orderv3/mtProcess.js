import { CONSTANTS, formatAmount } from '../orderv3/common.js';


const AppState = {
    nextBtnState: {
        active: false,
        status: CONSTANTS.ORDER_STATES.GET_RATES
    },
    processingStates: {
        initialDataLoading: false
    },
    mainState: {
        currentCity: sessionStorage.getItem('mtCity'),
        token: sessionStorage.getItem('token'),
        orderType: sessionStorage.getItem('productPage')
    },
    contactData: {
        countryCode: null,
        email: null,
        name: null,
        mobile: null,
        uid: null,
        branch: null
    },
    paymentState: {
        paymentType: 'neft'
    },
    progressStates: {
        GET_RATES: {
            step: 1,
            name: "Get Rates"
        },
        CONTACT_DETAILS: {
            step: 2,
            name: "Contact Details"
        },
        REVIEW_PAYMENT: {
            step: 3,
            name: "Review & Payment"
        },
        COMPLETE_KYC: {
            step: 4,
            name: "Complete KYC"
        }
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
                if (exchangeRateElement) exchangeRateElement.textContent = formatAmount(value) || '';
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
                if (exchangeRateEditElement) exchangeRateEditElement.textContent = formatAmount(value) || '';
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
        return true;
    }
};




const APIService = {




    async getRatesMt(city) {

        try {
            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, true)

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
            AppState.setProcessingState(CONSTANTS.PROCESSING_STATES.INITIAL_LOAD, false);
        }
    },
    async selectMtStore(store) {
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
    },
    async applyCoupon(couponCode) {
        try {
            const params = new URLSearchParams({
                action: 'validate_coupon',
                token: AppState.getState('token', 'mainState'),
                coupon: couponCode
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

            return await response.json();
        } catch (error) {
            console.error('Error applying coupon:', error);
            return null;
        }
    },

    async removeCoupon() {
        try {
            const params = new URLSearchParams({
                action: 'remove_coupon',
                token: AppState.getState('token', 'mainState'),
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

            return await response.json();
        } catch (error) {
            console.error('Error removing coupon:', error);
            return null;
        }
    }
};


export { APIService, AppState };