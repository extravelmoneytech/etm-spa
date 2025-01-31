




let userInfoCheck = localStorage.getItem('userInfo');
console.log(userInfoCheck);

window.userCheckMain = function () {
    console.log('calledddddbcc')
    const userInfoCheck = localStorage.getItem('userInfo');
    const myAccountBtns = document.querySelectorAll('.myAccount');
    const myAccountLink = document.querySelector('#myAccountLink');
    const loginBtns = document.querySelectorAll('.loginBtn');
    if (userInfoCheck) {
        // Parse the JSON string into an object
        const userInfo = JSON.parse(userInfoCheck);

        // Select all elements with the class '.loginBtn'


        // Iterate over each button and update it
        loginBtns.forEach(element => {
            // Create a button element to replace the anchor tag
            element.style.display = 'none'
            // Hide my account buttons
            myAccountBtns.forEach(btn => {
                btn.style.display = 'block';
            });


            let logoutBtnMain = document.querySelector('#logoutBtnMain')

            if (logoutBtnMain) {
                // Add click event for logout
                logoutBtnMain.addEventListener('click', () => {
                    // Clear localStorage
                    localStorage.removeItem('userInfo');
                    window.location.href = '/login';
                });
            }


        });

        console.log(userInfo, 'userInfo');
        return true;

    } else {
        console.log('No userInfo found in localStorage');

        myAccountBtns.forEach(element => {
            element.style.display = 'none';
        });

        loginBtns.forEach(element => {
            element.style.display = 'block'
        })

        return false;
    }
};

userCheckMain()

function userCheck() {

    let userValid = localStorage.getItem('userInfo');

    if (userValid) {
        return true
    } else {
        return false
    }

}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

