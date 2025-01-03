let productPage = sessionStorage.getItem('productPage');
console.log(productPage, 'productPage');


if(productPage==='fx'){
    if(document.querySelector('#productNameIdentifier')){
        document.querySelector('#productNameIdentifier').textContent='Currency Exchange'
    }
    
}
else if(productPage==='mt'){
    if(document.querySelector('#productNameIdentifier')){
        document.querySelector('#productNameIdentifier').textContent='Money Transfer'
    }
    
}
// Get all elements with the class '.moneyT'
let moneyTContainers = document.querySelectorAll('.moneyT');
// Get all elements with the class '.forexContainer'
let forexContainers = document.querySelectorAll('.forexContainer');

// Check if forexContainers exist and handle accordingly
if (forexContainers.length > 0) {
    forexContainers.forEach(container => {
        if (productPage == 'fx') {
            container.style.display = 'flex';
        } else {
            container.style.display = 'none';
        }
    });
} else {
    console.log("No elements with class 'forexContainer' are present in the DOM.");
}

// Check if moneyTContainers exist and handle accordingly
if (moneyTContainers.length > 0) {
    moneyTContainers.forEach(container => {
        if (productPage == 'mt') {
            container.style.display = 'block';
        } else {
            container.style.display = 'none';
        }
    });
} else {
    console.log("No elements with class 'moneyT' are present in the DOM.");
}
