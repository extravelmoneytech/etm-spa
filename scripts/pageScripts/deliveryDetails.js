let nextPageUrl='/orderv2/Contact-Details'
// Then on the previous page, use this to detect when the page is revisited
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        // Force reload if the page is cached
        window.location.reload();
    }
});
if(!userCheck()){
    window.location.href='/'
}

let doorDelivery = 1;
document.getElementById('radio1').addEventListener('click', function () {
    doorDelivery = 1;
    toggleRadio(this, 'radio2');
    // document.querySelector('#cartContent').style.display = 'block'
    // document.querySelector('#cartContentStorePickup').style.display = 'none'
});

document.getElementById('radio2').addEventListener('click', function () {
    doorDelivery = 0;
    toggleRadio(this, 'radio1');
    // document.querySelector('#cartContent').style.display = 'none'
    // document.querySelector('#cartContentStorePickup').style.display = 'block'
});


let token = sessionStorage.getItem('token')
function toggleRadio(selected, other) {
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
let cartData = JSON.parse(sessionStorage.getItem('cartData'))
if(!cartData){
    window.location.href='/error.html'
}
renderCartItems(cartData)



document.addEventListener('DOMContentLoaded', async () => {
    loadinggg(true)
    console.log('tokenb', token)
    try {
        const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
        const params = new URLSearchParams({
            action: 'get_delivery_details',
            token: token // Ensure token is defined in your scope
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

        if (resp) {
            console.log(resp, 'jjj')



            if (resp.order_within_hours || resp.order_within_mins) {
                document.querySelector('#cartContentText').textContent = ` if you Order within ${resp.order_within_hours} hrs ${resp.order_within_mins} mins.`
            } else {
                document.querySelector('#cartContentText').textContent ='by '+resp.delivery_on
            }

            const district = resp.selected_district;
            const cities = resp.areas;
            const dropdownList = document.querySelector('.dropdownList');
            const templateItem = document.querySelector('.dropdownItem');


            document.querySelector('#districtName').textContent = district
            // Ensure the template item is hidden
            templateItem.style.display = 'none';

            templateItem.classList.remove('template')

            // Remove all existing items except the template
            dropdownList.querySelectorAll('.dropdownItem:not([value="template"])').forEach(item => item.remove());

            // Add an initial "Select" option with a null value
            const selectItem = templateItem.cloneNode(true);
            selectItem.style.display = 'flex';  // Make the cloned item visible
            selectItem.setAttribute('value', 'none');  // Set value to an empty string (null equivalent)
            selectItem.querySelector('span').textContent = 'Select';  // Set the text to 'Select'
            selectItem.querySelector('svg').style.display='none'
            dropdownList.appendChild(selectItem);  // Append the "Select" item to the dropdown

            // Populate the dropdown list with cities
            cities.forEach(city => {
                // Clone the template item
                const newItem = templateItem.cloneNode(true);
                newItem.style.display = 'flex';  // Make the cloned item visible
                newItem.setAttribute('value', city);  // Set the value attribute
                newItem.querySelector('span').textContent = `${city}`;  // Update city name

                // Append the new item to the dropdown list
                dropdownList.appendChild(newItem);
            });

            




            // Call the function after the list is fully updated
            const dropdownMain = document.querySelector('.dropdownMain');
            selectFirstDropdownItem(dropdownMain);


            let branchDropDown=document.querySelector('#cityDropDown')
            if(branchDropDown.getAttribute('dataval')==='none'){
                branchDropDown.querySelector('.selectedItem').querySelector('svg').style.display='none'
            }

            branchDropDown.addEventListener('dropdownChange',()=>{
                console.log('mnsv')
                if(branchDropDown.getAttribute('dataval')==='none'){
                    console.log('mmmm')
                    branchDropDown.querySelector('.selectedItem').querySelector('svg').style.display='none'
                }
                else{
                    branchDropDown.querySelector('.selectedItem').querySelector('svg').style.display='block'
                }
            })


            loadinggg(false)
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='error.html'
    }
});



let deliveryUpdateBtn = document.querySelector('#deliveryUpdateBtn');

deliveryUpdateBtn.addEventListener('click', async () => {




    console.log('clicked')
    

    let ddLandMark = document.querySelector('#ddLandMark').value;
    let ddAddress = document.querySelector('#ddAddress').value;
    let branch = document.querySelector('#cityDropDown').getAttribute('dataval')

    if(branch==='none'){
        insertAlertBelowElement(document.querySelector('#cityDropDown'),'Select a branch')
        return
    }
    else{
        removeAlertBelowElement(document.querySelector('#cityDropDown'))
    }
    // Simple validation

    console.log(doorDelivery)
    if (doorDelivery) {
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
    loadinggg(true)




    try {
        const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
        const params = new URLSearchParams({
            action: 'update_delivery_details',
            token: token,  // Ensure `token` is defined
            dd_status: doorDelivery,  // Ensure `doorDelivery` is defined
            landmark: ddLandMark,
            address: ddAddress,
            selected_area: branch
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
        console.log(resp, 'hgfhgj')  // Use await to handle the promise returned by response.json()
        if (resp.status) {
            
            location.href = nextPageUrl
            setTimeout(() => {
                loadinggg(false)
            }, 2000);
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='error.html'
    }
});



