if(!userCheck()){
    window.location.href='/login'
}
console.log(userInfoCheck,'heyyy');
let mobNum = userInfoCheck.mobNum;
let countryCode = userInfoCheck.countryCode;
let userId = userInfoCheck.userId;
console.log(userId, countryCode, mobNum);
let singleOrderPageFlag=false;
let paramsData = {
    action: 'user_profile_data',
    mobile: mobNum,
    uid: userId,
    country_code: countryCode
};
const params = new URLSearchParams(paramsData);

// Making the POST request
loadinggg(true);
fetch('https://mvc.extravelmoney.com/api-etm/', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: params.toString(),
})
    .then(response => response.json())
    .then(data => {
        console.log(data)
        document.querySelector("#userName").textContent=data.customer_name
        document.querySelector("#avatar").querySelector('span').textContent = data.customer_name.charAt(0);
        document.querySelector("#earningCount").textContent=formatAmount(data.earnings)
        document.querySelector("#referalCount").textContent=data.ref_orders
        if (data.order_list && data.order_list.length > 0) {
            document.querySelector('#orderListTable').style.display='table'
            document.querySelector('#order_count').textContent=data.order_count
            document.querySelector('.listContainer').innerHTML = "";
            data.order_list.forEach(item => {
                createList(item);
            });
            initiateSearch()
            initiateTransactionChange()
            addViewButtonListeners();
            
        } else {
            const tbody = document.querySelector('.listContainer');
            tbody.innerHTML = '<tr><td colspan="8">No orders found</td></tr>';
        }
        loadinggg(false)
    })
    .catch(error => {
        console.error('Error:', error);
        const tbody = document.querySelector('.listContainer');
        tbody.innerHTML = '<tr><td colspan="8">Failed to load orders. Please try again later.</td></tr>';
    });

function createList(item) {
    const tbody = document.querySelector('.listContainer');
    const row = document.createElement('tr');

    // Determine transaction type
    const transactionType = item.txn==="oe"?"mt":item.txn.toLowerCase() || 'mt'; // Default to 'mt'

    // Add a `value` attribute to the row for filtering
    row.setAttribute('value', transactionType);

    row.innerHTML = `
        <td>${item.type || 'Transfer'}</td>
        <td>${item.order_no || 'N/A'}</td>
        <td>${item.product || 'N/A'}</td>
        <td>${item.currency || 'N/A'}</td>
        <td>${item.amount || 'N/A'}</td>
        <td><span>${item.date || 'N/A'}</span></td>
        <td>
            <div class="orderStatus ${item.status.toLowerCase() || 'cancelled'}">
                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                    <circle cx="4.33325" cy="4" r="3" />
                </svg>
                ${item.status || 'cancelled'}
            </div>
        </td>
        <td>
            <div class="viewBtn h-9 px-2 py-2 bg-[#0e51a0]/5 rounded-lg justify-center items-center gap-1 inline-flex cursor-pointer">
                <img src='../public/images/logo/eye.svg' alt="Eye Icon">
                <div class="px-1 justify-center items-center flex">
                    <div class="text-[#0e51a0] text-sm font-semibold leading-tight">View</div>
                </div>
            </div>
        </td>
    `;

    tbody.appendChild(row);
}



function displayAffectedRows(rows, filterCallback, highlightCallback = null, orderCountElement = null) {
    let visibleCount = 0; // Count visible rows for dynamic updates
    let noOrderFoundAlert=document.querySelector('#noOrderFoundAlert')
    rows.forEach(row => {
        console.log(row)
        if (filterCallback(row)) {
            row.style.display = ''; // Show the row if it passes the filter
            visibleCount++;

            // Apply highlighting if a callback is provided
            if (highlightCallback) {
                highlightCallback(row);
            }
        } else {
            row.style.display = 'none'; // Hide the row if it doesn't pass the filter
        }
    });
    
    if (visibleCount === 0) {
        noOrderFoundAlert.style.display='block'
    }else{
        noOrderFoundAlert.style.display='none'
    }
    // Update the order count if an element is provided
    if (orderCountElement) {
        orderCountElement.textContent = visibleCount;
    }

    // Return the count of visible rows
    return visibleCount;
}




function initiateSearch() {
    const searchBar = document.querySelector('#orderSearchBar');
    const orderCountElement = document.querySelector('#order_count'); // Reference to the order count element
    const transactionTypeDropdown = document.querySelector('#transactionType'); // Reference to transaction filter

    searchBar.addEventListener('input', () => {
        const searchValue = searchBar.value.trim();
        const selectedType = transactionTypeDropdown.value.toLowerCase(); // Get selected transaction type
        const rows = document.querySelectorAll('.listContainer tr'); // Get all rows

        // Filter rows by both transaction type (if not "all") and search value
        displayAffectedRows(
            rows,
            row => {
                const rowType = row.getAttribute('value');
                const orderNoCell = row.querySelector('td:nth-child(2)');
                if (!orderNoCell) return false;

                const orderNoText = orderNoCell.textContent.trim();

                // If "all" is selected, only filter by the search value
                return (
                    (selectedType === 'all' || rowType === selectedType) &&
                    (searchValue === "" || orderNoText.includes(searchValue))
                );
            },
            row => {
                // Apply highlighting based on the current search value
                const orderNoCell = row.querySelector('td:nth-child(2)');
                if (orderNoCell) {
                    const orderNoText = orderNoCell.textContent.trim();
                    if (searchValue) {
                        const highlightedText = orderNoText.replace(
                            new RegExp(searchValue, 'gi'),
                            match => `<span class="highlight">${match}</span>`
                        );
                        orderNoCell.innerHTML = highlightedText;
                    } else {
                        // Remove highlights if no search value is provided
                        orderNoCell.innerHTML = orderNoText;
                    }
                }
            },
            orderCountElement // Update the order count dynamically
        );
    });
}





function initiateTransactionChange() {
    const transactionTypeDropdown = document.querySelector('#transactionType');
    const orderCountElement = document.querySelector('#order_count'); // Reference to the order count element
    const searchBar = document.querySelector('#orderSearchBar'); // Reference to the search bar

    transactionTypeDropdown.addEventListener('change', () => {
        const selectedType = transactionTypeDropdown.value.toLowerCase(); // Get selected transaction type
        const rows = document.querySelectorAll('.listContainer tr'); // Get all rows
        const searchValue = searchBar.value.trim(); // Consider the current search value

        // Display rows matching the selected transaction type and current search value
        displayAffectedRows(
            rows,
            row => {
                const rowType = row.getAttribute('value');
                const orderNoCell = row.querySelector('td:nth-child(2)');
                if (!orderNoCell) return false;

                const orderNoText = orderNoCell.textContent.trim();

                // If "all" is selected, skip type filtering
                return (
                    (selectedType === 'all' || rowType === selectedType) &&
                    (searchValue === "" || orderNoText.includes(searchValue))
                );
            },
            row => {
                // Apply highlighting based on the current search value
                const orderNoCell = row.querySelector('td:nth-child(2)');
                if (orderNoCell) {
                    const orderNoText = orderNoCell.textContent.trim();
                    if (searchValue) {
                        const highlightedText = orderNoText.replace(
                            new RegExp(searchValue, 'gi'),
                            match => `<span class="highlight">${match}</span>`
                        );
                        orderNoCell.innerHTML = highlightedText;
                    } else {
                        // Remove highlights if no search value is provided
                        orderNoCell.innerHTML = orderNoText;
                    }
                }
            },
            orderCountElement // Update the order count dynamically
        );
    });
}




let uid;

function addViewButtonListeners() {
    const viewButtons = document.querySelectorAll('.viewBtn'); // Select all buttons with class "viewBtn"
    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr'); // Find the closest parent row for the clicked button
            
            // Extract required values from the row
            uid = userInfoCheck.userId; // Assuming `uid` is globally available
            const orderNo = row.querySelector('td:nth-child(2)')?.textContent.trim(); // Order number
            const txn = row.getAttribute('value'); // Transaction type stored in the "value" attribute
            
            if (uid && orderNo && txn) {
                // Make the API call with these values
                window.location.href=`order/?inid=${orderNo}&type=${txn}`
                
            } else {
                console.error('Missing required values for API call:', { uid, orderNo, txn });
            }
        });
    });
}


function formatAmount(amount) {
    return `₹ ${parseFloat(amount).toLocaleString('en-IN', { maximumFractionDigits: 0 })}`;
}