
// Function to format currency in the Indian style
function formatIndianCurrency(value) {
    let [integer, decimal] = value.toString().split('.');
    integer = integer.replace(/\B(?=(\d{3})+(?!\d))/g, ",").replace(/(\d+),(\d{2})$/, "$1,$2");

    // Remove trailing zeros in the decimal part
    if (decimal) decimal = decimal.replace(/0+$/, '');

    return decimal ? `${integer}.${decimal}` : integer;
}

function renderCartItems(products) {
    // Convert the products array to a JSON string and store it in sessionStorage
    sessionStorage.setItem('cartData', JSON.stringify(products));

    console.log(products, 'render cart');

    const cartItemsContainer = document.getElementById('cartItems');
    const cartItemTemplate = document.getElementById('cartItemTemplate').content;

    // Clear existing items in the cart container
    cartItemsContainer.innerHTML = '';

    // Loop through each product and clone the template for each
    products.forEach(product => {
        // Clone the template
        const itemClone = document.importNode(cartItemTemplate, true);

        // Determine the icon path based on product type
        const iconPath = getIconPath(product.productType);

        // Update the cloned template with actual product data
        itemClone.querySelector('.product-icon').src = iconPath; // Set icon based on product type
        itemClone.querySelector('.product-name').textContent = `${product.currency}`;
        itemClone.querySelector('.currency-value').textContent = `${product.rate}`;
        itemClone.querySelector('.product-quantity').textContent = `${product.amount}`;
        itemClone.querySelector('.total-inr').textContent = `₹ ${parseFloat(product.totalINR).toLocaleString()}`; // Make sure it's formatted correctly

        // Append the updated clone to the cart container
        cartItemsContainer.appendChild(itemClone);
    });
}

// Helper function to determine the icon path based on the product type
function getIconPath(productType) {
    if (productType === 'Forex Card') {
        return '../../public/images/icons/card.svg'; // Replace with actual path to Forex Card icon
    } else if (productType === 'Currency') {
        return '../../public/images/icons/currency.svg'; // Replace with actual path to Currency icon
    }
    return 'path/to/default_icon.png'; // Default icon if product type is unknown
}


