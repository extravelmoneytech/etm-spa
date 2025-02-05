import {CONSTANTS,formatAmount} from '../orderv3/common.js';

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
          return data;

          
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
  }


};


export { calculations, APIService, AppState };