function getQueryParams(url = window.location.href) {
    let params = {};
    let urlObj = new URL(url); // Create a URL object
    let searchParams = new URLSearchParams(urlObj.search);

    for (let [key, value] of searchParams.entries()) {
        params[key] = value;
    }
    return params;
}

// Example usage
let queryParams = getQueryParams();
console.log(queryParams);
if(Object.keys(queryParams).length === 0 || !queryParams){
   window.location.href = '/myaccount';
}
if(!userCheck()){
    window.location.href='/login'
}

let uid = userInfoCheck.userId;
let orderId=queryParams.inid
let txn=queryParams.type

makeApiCall(uid,orderId,txn);


// Function to make the API call
function makeApiCall(uid, orderNo, txn) {
    loadinggg(true)
    
    const apiUrl = 'https://mvc.extravelmoney.com/api-etm/'; // Replace with your actual API endpoint

    const paramsData = {
        action: 'user_profile_order_data',
        uid: uid,
        order_no: orderNo,
        txn: txn
    };

    const params = new URLSearchParams(paramsData);

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: params.toString(),
    })
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);
            
            createOrderData(data)
            createKycUploaders(data.kyc_list)
            loadinggg(false)
        })
        .catch(error => {
            console.error('Error during API call:', error);
        });
}





// Function to create KYC Uploaders dynamically based on provided documents object
function createKycUploaders(documentObject) {
    // Get the template element
    const template = document.getElementById('kyc-uploader-template');
    const kycListContainer = document.querySelector('.kycList');

    // Clear existing content
    kycListContainer.innerHTML = '';

    // Loop through the documentObject and create KYC uploader elements
    Object.entries(documentObject).forEach(([key, doc]) => {
        const clone = template.content.cloneNode(true);

        // Populate the cloned template with the document data
        clone.querySelector('.doc-name').textContent = doc.kyc_name;
        clone.querySelector('.file_upload').setAttribute('tag', doc.tag);

        const deleteButton = clone.querySelector('.deleteIcon'); // Assume delete button in the template

        // Handle preview if file_exists is true
        if (doc.file_exists) {
            const uploader = clone.querySelector('.kycUploader');
            const kycExtender = uploader.querySelector('.kycExtender');
            const progressBar = kycExtender.querySelector('.progressBar');
            const progressContainer = kycExtender.querySelector('.uploadProgress');
            const fileNameSpan = kycExtender.querySelector('span');
            const previewLink = clone.querySelector('.preview_link');

            // Set the preview link
            previewLink.setAttribute('href', doc.preview);
            previewLink.style.display = 'flex'; // Show the preview link

            // Set the file name and style to appear uploaded
            fileNameSpan.textContent = "File uploaded";
            progressBar.style.display = 'none'; // Hide the progress bar
            uploader.classList.add('kycUploaderActive'); // Add class to indicate active state
            kycExtender.style.display = 'flex'; // Show the extender as if file is uploaded
            progressContainer.style.display = 'none'; // Hide the upload progress
            uploader.querySelector('input[type="file"]').style.display = 'none'; // Hide file input

            // Show the delete button
            deleteButton.style.display = 'inline-block';

            // Add delete functionality
            deleteButton.addEventListener('click', () => {
                // API call to delete the uploaded file
                fileNameSpan.textContent = 'Deleting...';
                
                // Call the delete API
                let data = {
                    tag: doc.tag,
                    personal: doc.personal,
                    order_no: orderId,
                    uid: uid
                };
                deleteFileFromApi(data)
                    .then((response) => {
                       
                        if (response.result) {
                            // Clear the uploader state (resetting to initial empty state)
                            fileNameSpan.textContent = '';
                            progressBar.style.display = 'none';
                            previewLink.style.display = 'none';
                            deleteButton.style.display = 'none'; // Hide delete button after file is deleted
                            uploader.querySelector('input[type="file"]').style.display = 'block'; // Show file input for new upload
                            kycExtender.style.display = 'none'; // Hide the extender when no file is uploaded
                            uploader.classList.remove('kycUploaderActive'); // Remove active state
                            uploader.querySelector('input[type="file"]').value = ''; // Clear the file input content
                            checkIfAllKycUploaded(); // Check again after deleting a file
                        } else {
                            alert('Failed to delete the file. Please try again.');
                        }
                    })
                    .catch((error) => {
                        console.error('API error:', error);
                        alert('An error occurred while deleting the file.');
                    });
            });
        } else {
            const previewLink = clone.querySelector('.preview_link');
            previewLink.style.display = 'none'; // Hide the preview link if the file doesn't exist
            deleteButton.style.display = 'none'; // Hide the delete button when no file exists
        }

        // Append the populated clone to the container
        kycListContainer.appendChild(clone);
    });

    // After rendering the uploaders, initialize the file upload listeners
    initFileUploadListeners();

    // Call checkIfAllKycUploaded() after all KYC uploaders are created
    checkIfAllKycUploaded();
}

async function deleteFileFromApi(data) {
    const apiUrl = 'https://mvc.extravelmoney.com/api-etm/';
    // Construct the parameters for the API call
    const params = new URLSearchParams({
        action: 'kyc_delete',
        uid: data.uid,
        order_no: data.order_no,
        personal: data.personal,
        upload_tag: data.tag
    });

    try {
        // Make the API call using fetch


        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: params.toString(),
        });

        if (!response.ok) {
            // Detailed error message
            throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
        }

        const resp = await response.json();
        return resp
    } catch (error) {
        console.error('Error fetching data:', error);
        // Optionally, redirect to an error page
        // location.href = 'error.html';
    }

}


// Function to initialize file upload listeners after the DOM is updated
function initFileUploadListeners() {
    // Select all elements with the class 'kycUploader'
    let kycUploaders = document.querySelectorAll('.kycUploader');

    kycUploaders.forEach((uploader) => {
        // Get the file input, kycExtender elements inside each uploader
        let fileInput = uploader.querySelector('input[type="file"]');
        let kycExtender = uploader.querySelector('.kycExtender');
        let fileNameSpan = kycExtender.querySelector('span');
        let progressBar = kycExtender.querySelector('.progressBar');
        let progressContainer = kycExtender.querySelector('.uploadProgress');
        let progressText = kycExtender.querySelector('.uploadProgress span'); // The percentage text
        let deleteButton = uploader.querySelector('.deleteIcon'); // The delete button
        let previewLink = uploader.querySelector('.preview_link');

        // Add an event listener to the file input
        fileInput.addEventListener('change', async function (event) {
            // Get the uploaded file
            let file = event.target.files[0];

            if (file) {
                // Check if a previous file exists and delete it before uploading a new one
                let existingTag = fileInput.getAttribute('tag');
                if (uploader.classList.contains('kycUploaderActive')) {
                    // If there's an active file, delete it
                    await deleteFileFromApi(existingTag).then((response) => {
                        if (!response.success) {
                            alert('Error deleting the previous file. Please try again.');
                            return; // Prevent the new upload if the delete fails
                        }
                    });
                }

                // Display the file name inside the kycExtender span
                fileNameSpan.textContent = file.name;
                progressContainer.style.display = 'flex';

                // Reset the progress bar
                progressBar.style.width = '0%';
                progressText.textContent = '0%';

                // Add the 'kycUploaderDelay' class to indicate uploading is in progress
                uploader.classList.add('kycUploaderDelay');

                // Show the progress bar and kycExtender
                kycExtender.style.display = 'flex';
                progressBar.style.display = 'flex';

                let progress = 0;
                let isApiResponseReceived = false;

                // Start API call simulation
                let tag = fileInput.getAttribute('tag');
                let personal = tag === 'passport_image' || tag === 'pan_image' || tag === 'passport2_image' ? '1' : '0';
                let data = {
                    file: file,
                    file_type: tag,
                    personal: personal,
                };

                const apiResponsePromise = uploadFileToApi(data).then((response) => {
                    
                    isApiResponseReceived = true;
                    if (response.result) {
                        // Once the API responds, fast-complete the progress bar
                        let isUploadComplete = false; // Flag to track if the upload is completed

                        let completionSpeed = setInterval(() => {
                            if (progress < 100) {
                                progress += 10;
                                if (progress >= 100) {
                                    progress = 100;
                                    clearInterval(completionSpeed);

                                    // Finalize the upload process
                                    uploader.classList.remove('kycUploaderDelay');
                                    progressBar.style.display = 'none';
                                    kycExtender.querySelector('.deleteIcon').style.display = 'block';
                                    uploader.classList.add('kycUploaderActive');
                                    progressContainer.style.display = 'none';

                                    // Set the preview link
                                    previewLink.setAttribute('href', response.file);
                                    previewLink.style.display = 'flex'; // Show the preview link
                                    deleteButton.style.display = 'inline-block'; // Show delete button after successful upload

                                    // Ensure checkIfAllKycUploaded() is called only once
                                    if (!isUploadComplete) {
                                        checkIfAllKycUploaded(); // Call only once when the upload is complete
                                        isUploadComplete = true; // Mark the upload as complete
                                    }

                                    // Add delete functionality for the new file
                                    deleteButton.addEventListener('click', () => {
                                        fileNameSpan.textContent = 'Deleting...';
                                        let deleteData = {
                                            tag: tag,
                                            personal: personal,
                                            order_no: orderId,
                                            uid: uid
                                        };
                                        deleteFileFromApi(deleteData)
                                            .then((response) => {
                                                if (response.result) {
                                                    fileNameSpan.textContent = '';
                                                    previewLink.style.display = 'none';
                                                    deleteButton.style.display = 'none';
                                                    progressBar.style.display = 'none';
                                                    uploader.querySelector('input[type="file"]').style.display = 'block';
                                                    uploader.classList.remove('kycUploaderActive');
                                                    uploader.querySelector('input[type="file"]').value = ''; // Clear the file input content

                                                    checkIfAllKycUploaded(); // Check again after deletion
                                                }
                                            });
                                    });
                                }
                                // Update progress bar and text
                                progressBar.style.width = `${progress}%`;
                                progressText.textContent = `${Math.floor(progress)}%`;
                            }
                        }, 50); // Speed up to complete fast after response

                    }
                });

                // Simulate progress bar animation while waiting for the API response
                let progressInterval = setInterval(() => {
                    if (!isApiResponseReceived) {
                        progress += 1; // Increment slowly while waiting for response
                        if (progress >= 90) {
                            progress = 90; // Cap the progress at 90% until response
                        }
                        // Update progress bar width and text
                        progressBar.style.width = `${progress}%`;
                        progressText.textContent = `${Math.floor(progress)}%`;
                    }

                    if (isApiResponseReceived) {
                        // Stop the interval once the response is received
                        clearInterval(progressInterval);
                    }
                }, 100); // Slower updates while waiting for the response
            }
        });
    });
}

let token = sessionStorage.getItem('token');
let action = 'kyc_upload'
async function uploadFileToApi(data) {
    
    const formData = new FormData();
    formData.append('file', data.file);
    formData.append("file_type", data.file_type);
    formData.append("action", action)
    formData.append("uid", uid)
    formData.append("personal", data.personal)
    formData.append("token", token)
    formData.append('order_no', orderId)

    const response = await fetch('https://mvc.extravelmoney.com/api-etm/', {
        method: 'POST',
        body: formData,
    });

    return await response.json(); // Return response in JSON format
}


// Function to check if all KYCs are uploaded
function checkIfAllKycUploaded() {
    const kycUploaders = document.querySelectorAll('.kycUploader');
    let allUploaded = true;

    kycUploaders.forEach(uploader => {
        
        const isActive = uploader.classList.contains('kycUploaderActive');

        if (!isActive) {
            allUploaded = false;
        }
    });

    // if (allUploaded) {
    //     document.querySelector('#completeKycText').style.fontWeight = 'bold';

    // } else {
    //     document.querySelector('#completeKycText').style.fontWeight = 'normal';
    //     console.log(false); // Not all KYCs are uploaded
    // }
}





function createOrderData(data){
    console.log(data)
    document.querySelector('#estimateNo').textContent=data.order_no
    document.querySelector('#orderType').textContent=data.type
    document.querySelector("#orderStatusContainer").classList.add(data.order_status.toString().toLowerCase())
    document.querySelector("#orderStatus").textContent = `${data.order_status} ${data.sub_status != "" ? (data.sub_status) : ""}`;
    if(data.door_delivery.status){
        
    document.querySelectorAll('.deliveryStatusContainer').forEach(item=>{
        item.style.display="flex"
    })
    document.querySelector('#customerName').textContent=data.customer_name
    document.querySelector('#customerEmail').textContent=data.customer_email
    document.querySelector('#customerAddress').textContent=`${data.door_delivery.address}, ${data.door_delivery.city}, near ${data.door_delivery.landmark}`
    document.querySelector('#deliveryFee').textContent=formatAmount(data.door_delivery.fee)
    
    }
    
    else{
        console.log('entered')
    document.querySelectorAll('.deliveryStatusContainer').forEach(item=>{
        item.style.display="none"
    })
    }
        
        
    if(data.type==="Buy"){
        const productListContainer = document.getElementById('productList');
                // Clear the existing product list (if any)
                productListContainer.innerHTML = '';
    
                let productList=data.order_detail
                // Loop through the productList array and generate HTML for each product
                productList.forEach(product => {
                    const productHTML = generateProductHTML(product);
                    productListContainer.appendChild(productHTML);
                });
    }
    else if(data.type==="Transfer"){
        document.querySelector('#mtOrderProduct').style.display="flex"
        document.querySelector('#currencyMt').textContent=`${data.order_detail[0].currency}@${data.order_detail[0].rate}`
        document.querySelector('#currencyMtAmnt').textContent=data.order_detail[0].amount
        document.querySelector('#currencyMtAmntinr').textContent=formatAmount(data.order_detail[0].inrtotal)
    }
    
    document.querySelector('#gstRate').textContent=formatAmount(data.gst)
    document.querySelector('#bankCharges').textContent=formatAmount(data.bank_charges)
    document.querySelector('#totalAmnt').textContent=formatAmount(data.grand_total)
    
    
  
  let orderBackBtn=document.querySelector("#backBtn")
  orderBackBtn.addEventListener('click',()=>{
        window.history.back()
        
  })
    
    
}





// Function to generate the HTML for each product
function generateProductHTML(product) {
    const { currency, amount, product: productName, rate } = product; // Destructure productName correctly

    // Create the product container
    const productDiv = document.createElement('div');
    productDiv.classList.add('justify-between', 'items-start', 'inline-flex');

    // Create the rate paragraph
    const rateParagraph = document.createElement('p');
    rateParagraph.classList.add('text-[#677489]', 'text-sm', 'font-medium', 'tracking-tight');
    rateParagraph.textContent = `${currency} (${productName ? (productName === 'Forex Card' ? 'Card' : 'Note') : 'note'}) @ ${rate}`;

    // Create the amount paragraph
    const amountParagraph = document.createElement('p');
    amountParagraph.classList.add('text-[#111729]', 'text-sm', 'font-medium', 'tracking-tight');
    amountParagraph.textContent = formatAmount(amount * rate);

    // Append the rate and amount paragraphs to the product container
    productDiv.appendChild(rateParagraph);
    productDiv.appendChild(amountParagraph);

    return productDiv;
}

function formatAmount(amount) {
    return `₹ ${parseFloat(amount).toLocaleString('en-IN', { maximumFractionDigits: 0 })}`;
}

let copyBtn = document.querySelector('#copyBtn')

copyBtn.addEventListener('click', () => {

    const textElement = document.getElementById('estimateNo');

    // Create a temporary input element
    const tempInput = document.createElement('input');

    // Set its value to the textContent of the target element
    tempInput.value = textElement.textContent;

    // Append the input to the body
    document.body.appendChild(tempInput);

    // Select the text in the input
    tempInput.select();

    // Copy the text to the clipboard
    document.execCommand('copy');

    // Remove the temporary input element from the body
    document.body.removeChild(tempInput);


})