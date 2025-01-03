




let userInfoCheck = localStorage.getItem('userInfo');
console.log(userInfoCheck);

if (userInfoCheck) {
    // Parse the JSON string into an object
    userInfoCheck = JSON.parse(userInfoCheck);

    // Select all elements with the class '.loginBtn'
    const loginBtns = document.querySelectorAll('.loginBtn');
    
    
    // Iterate over each button and update it
    loginBtns.forEach(element => {
        element.textContent = "Logout";  // Change text to Logout
        
        // Remove the href attribute
        element.removeAttribute('href');
        
        // Add a click event to log out the user (clear localStorage)
        element.addEventListener('click', () => {
            // Clear localStorage
            localStorage.removeItem('userInfo');

            // Optionally redirect the user to another page after logout
            // window.location.href = 'login.html';

            // Reload the page to reflect the changes
            location.reload();
        });
    });
    
    

    // Log the userInfo object to the console
    console.log(userInfoCheck, 'hbbbbfffc');
} else {
    console.log('No userInfo found in localStorage');
    
    const myAccountBtns=document.querySelectorAll('.myAccount');
    
    myAccountBtns.forEach(element => {
        element.style.display='none'
    });
    document.querySelector('#myAccountLink').href = '/login';

    
}


function userCheck() {

    let userValid = localStorage.getItem('userInfo');

    if(userValid){
        return true
    }else{
        return false
    }
    
}


function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }

