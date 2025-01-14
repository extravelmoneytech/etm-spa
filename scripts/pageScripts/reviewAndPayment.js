let nextPageUrl='/orderv2/Complete-KYC'

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

function formatAmount(amount) {
    return `₹ ${parseFloat(amount).toLocaleString('en-IN', { maximumFractionDigits: 0 })}`;
}

let token = sessionStorage.getItem('token')
console.log(token)
document.addEventListener('DOMContentLoaded', async () => {
    loadinggg(true)

    try {
        
        const params = new URLSearchParams({
            action: 'summary',
            token: token
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

        if (resp) {
            console.log(resp);
            if(!resp.bank_charges){
                // window.location.href='/error.html'
            }

            if(sessionStorage.getItem('productPage')==='fx'){
                if (resp.delivery_opted === '0') {
                    document.querySelector('#doorDeliveryData').style.display = "none"
                    document.querySelector('#paymentInfoText').innerHTML=`Visit store before <b>${resp.delivery_on}</b> . Full/partial payment required before store visit. Payment instructions will be shared on your registered email after KYC verification.`
                }else{
                    document.querySelector('#deliveryFee').innerHTML = '₹' + resp.door_fee;
                    document.querySelector('#paymentInfoText').textContent='Full payment required before delivery. Payment instructions will be shared on your registered email after KYC verification.'
                }
                document.querySelector('#totalAmnt').innerHTML =formatAmount(resp.total) ;
    
                document.querySelector('#gst').innerHTML = '₹' + resp.gst;
                // Handle the response
    
                const productListContainer = document.getElementById('productList');
                // Clear the existing product list (if any)
                productListContainer.innerHTML = '';
    
                let productList=resp.order_details
                // Loop through the productList array and generate HTML for each product
                productList.forEach(product => {
                    const productHTML = generateProductHTML(product);
                    productListContainer.appendChild(productHTML);
                });
            }

            if(sessionStorage.getItem('productPage')==='mt'){
                document.querySelector('#currencyMt').textContent=`${resp.order_details[0].currency} @ ${resp.order_details[0].rate}`;
                document.querySelector('#currencyMtAmnt').textContent=resp.order_details[0].amount;
                document.querySelector('#currencyMtAmntinr').textContent=`₹  ${formatIndianCurrency(resp.order_details[0].amount*resp.order_details[0].rate)}`
                resp.zero_bb_charge?document.querySelector('#intermediatoryNote').style.display='none':''
                document.querySelector('#gstMt').innerHTML = '₹ ' + resp.gst;
                document.querySelector('#bankCharges').innerHTML = '₹ ' + resp.bank_charges;
                document.querySelector('#totalAmnt').innerHTML = '₹ ' +formatIndianCurrency(resp.total);
            }

            

            loadinggg(false)
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        // location.href='/error.html'

    }
});


// Function to generate the HTML for each product
function generateProductHTML(product) {
    const { currency, amount, product: productName, rate } = product; // Destructure productName correctly

    // Create the product container
    const productDiv = document.createElement('div');
    productDiv.classList.add('justify-between', 'items-start', 'inline-flex');

    // Create the rate paragraph
    const rateParagraph = document.createElement('p');
    rateParagraph.classList.add('text-[#677489]', 'text-sm', 'font-medium', 'tracking-tight');
    rateParagraph.textContent = `${amount} ${currency} (${productName ? (productName === 'Forex Card' ? 'Card' : 'Note') : 'note'}) @ ${rate}`;

    // Create the amount paragraph
    const amountParagraph = document.createElement('p');
    amountParagraph.classList.add('text-[#111729]', 'text-sm', 'font-medium', 'tracking-tight');
    amountParagraph.textContent = formatAmount(amount * rate);

    // Append the rate and amount paragraphs to the product container
    productDiv.appendChild(rateParagraph);
    productDiv.appendChild(amountParagraph);

    return productDiv;
}



document.getElementById('radio1').addEventListener('click', function () {
    toggleRadio(this, 'radio2');
});

document.getElementById('radio2').addEventListener('click', function () {
    toggleRadio(this, 'radio1');
});

function toggleRadio(selected, other) {
    selected.classList.add('selectedRadio');
    selected.classList.remove('radio');
    document.getElementById(other).classList.add('radio');
    document.getElementById(other).classList.remove('selectedRadio');


}


document.querySelector('#summaryConfirm').addEventListener('click', () => {
    loadinggg(true)
    placeOrder();
})

const getUserIP = async () => {
    try {
      const response = await fetch('https://api.ipify.org?format=json');
      const data = await response.json();
      return data.ip;
    } catch (error) {
      console.error('Error fetching user IP:', error);
      return null;
    }
  };
  
  const placeOrder = async () => {
      console.log('hey');
  
      try {
          // Fetch the user IP before proceeding
          const userIP = await getUserIP();
          if (!userIP) {
              throw new Error("Could not retrieve user IP address.");
          }
  
          
          
          const params = new URLSearchParams({
              action: 'create_order',
              token: token,
              userip: userIP // Add the user IP to the params
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
          
          if (resp.status) {
              console.log(resp);
              sessionStorage.setItem('orderId', resp.orderID);
              location.href = nextPageUrl;
              setTimeout(() => {
                  loadinggg(false);
              }, 2000);
          }
      } catch (error) {
          console.error('Error fetching data:', error);
          location.href = '/error.html';
      }
  };