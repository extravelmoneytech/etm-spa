import { AppState, CONSTANTS } from '../orderv3/common.js';

async function initializeApp() {
  try {
    const orderType = AppState.mainState.orderType;
    
    
    if (orderType === CONSTANTS.ORDER_TYPES.moneyTransfer) {
      const { MoneyTransferUIManager } = await import('./moneyTransfer.js');
      await MoneyTransferUIManager.init();
    } else if (orderType === CONSTANTS.ORDER_TYPES.forexTransfer) {
      const { ForexUIManager } = await import('../orderv3/forex.js');
      console.log(ForexUIManager)
      await ForexUIManager.init();
    }
  } catch (error) {
    console.error('Init failed:', error);
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initializeApp);
} else {
  initializeApp();
}