<!DOCTYPE html>
<html lang="en">

<?php
$title="Sign Up/Login - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$fold="../../"; 
$ogurl="https://www.extravelmoney.com/myaccount";
$ogtype="article";

$title="Profile";
$myAccountProfilePage = true;

    include $fold . 'includesv2/head.php';
?>

<style>
    .success-popup {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #4CAF50;
    color: white;
    padding: 15px 25px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.success-popup.fade-out {
    animation: fadeOut 0.3s ease-out forwards;
}

@keyframes fadeOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

.checkmark {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: inline-block;
    stroke-width: 2;
    stroke: #fff;
    stroke-miterlimit: 10;
}
</style>


<body>
    <div class="flex flex-col items-center justify-center relative bg-white">


        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php 

                include $fold . 'includesv2/header.php';

            ?>
            
            <div class="px-5 sm:px-12 md:px-24 py-5 mt-8 flex flex-col justify-center items-start">
                <section>
            <div class="ProfileArrow  mt-5 flex items-center gap-3 cursor-pointer">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.812 7.99964C17.812 8.14883 17.7527 8.2919 17.6473 8.39739C17.5418 8.50288 17.3987 8.56214 17.2495 8.56214H2.10794L7.897 14.3521C7.95227 14.4036 7.9966 14.4657 8.02734 14.5347C8.05808 14.6037 8.07462 14.6782 8.07595 14.7537C8.07728 14.8293 8.06339 14.9043 8.0351 14.9743C8.00681 15.0444 7.9647 15.108 7.91128 15.1614C7.85787 15.2148 7.79424 15.2569 7.7242 15.2852C7.65416 15.3135 7.57914 15.3274 7.50361 15.3261C7.42809 15.3248 7.3536 15.3082 7.2846 15.2775C7.2156 15.2467 7.1535 15.2024 7.102 15.1471L0.352005 8.39714C0.246667 8.29167 0.1875 8.1487 0.1875 7.99964C0.1875 7.85058 0.246667 7.70761 0.352005 7.60214L7.102 0.852141C7.20864 0.752781 7.34967 0.698688 7.4954 0.70126C7.64112 0.703831 7.78016 0.762864 7.88322 0.865924C7.98628 0.968984 8.04531 1.10802 8.04789 1.25375C8.05046 1.39947 7.99636 1.54051 7.897 1.64714L2.10794 7.43714H17.2495C17.3987 7.43714 17.5418 7.4964 17.6473 7.60189C17.7527 7.70738 17.812 7.85046 17.812 7.99964Z" fill="black"/>
                </svg>
                <p class="text-lg font-semibold">Profile</p>
            </div>
        </section>


        <section class="mt-5 max-w-3xl">
    <!-- Personal Details Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between border-b pb-3">
            <div class="flex items-center gap-2">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.8109 33.2815C33.3406 29.0128 29.4625 26.0175 24.9562 24.7472C27.1471 23.6335 28.899 21.8144 29.9295 19.5832C30.9601 17.3521 31.2091 14.8388 30.6365 12.4488C30.0639 10.0588 28.7031 7.93126 26.7734 6.40928C24.8437 4.88729 22.4577 4.05957 20 4.05957C17.5423 4.05957 15.1563 4.88729 13.2266 6.40928C11.2969 7.93126 9.93608 10.0588 9.36348 12.4488C8.79089 14.8388 9.03993 17.3521 10.0704 19.5832C11.101 21.8144 12.8529 23.6335 15.0437 24.7472C10.5375 26.0159 6.65937 29.0112 4.18905 33.2815C4.12122 33.3883 4.07568 33.5076 4.05515 33.6323C4.03463 33.7571 4.03956 33.8847 4.06964 34.0075C4.09972 34.1303 4.15434 34.2458 4.2302 34.347C4.30605 34.4481 4.40159 34.5329 4.51106 34.5962C4.62053 34.6594 4.74166 34.6999 4.86718 34.7152C4.9927 34.7304 5.12 34.7201 5.24143 34.6849C5.36286 34.6496 5.47592 34.5902 5.57379 34.5102C5.67166 34.4301 5.75232 34.3311 5.81093 34.219C8.81249 29.0331 14.1156 25.9378 20 25.9378C25.8844 25.9378 31.1875 29.0331 34.1891 34.219C34.2477 34.3311 34.3283 34.4301 34.4262 34.5102C34.5241 34.5902 34.6371 34.6496 34.7586 34.6849C34.88 34.7201 35.0073 34.7304 35.1328 34.7152C35.2583 34.6999 35.3795 34.6594 35.4889 34.5962C35.5984 34.5329 35.6939 34.4481 35.7698 34.347C35.8456 34.2458 35.9003 34.1303 35.9303 34.0075C35.9604 33.8847 35.9653 33.7571 35.9448 33.6323C35.9243 33.5076 35.8788 33.3883 35.8109 33.2815ZM10.9375 15.0003C10.9375 13.2079 11.469 11.4558 12.4648 9.96544C13.4606 8.47512 14.876 7.31356 16.5319 6.62764C18.1879 5.94172 20.01 5.76225 21.768 6.11193C23.5259 6.46161 25.1407 7.32473 26.4081 8.59214C27.6756 9.85956 28.5387 11.4743 28.8884 13.2323C29.238 14.9902 29.0586 16.8124 28.3727 18.4684C27.6867 20.1243 26.5252 21.5397 25.0348 22.5355C23.5445 23.5313 21.7924 24.0628 20 24.0628C17.5974 24.0599 15.294 23.1042 13.595 21.4053C11.8961 19.7063 10.9404 17.4029 10.9375 15.0003Z" fill="url(#paint0_linear_2348_27416)"/>
                    <defs>
                    <linearGradient id="paint0_linear_2348_27416" x1="47.4066" y1="49.2866" x2="7.07904" y2="-19.6608" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0E51A0"/>
                    <stop offset="1" stop-color="#E31D1C"/>
                    </linearGradient>
                    </defs>
                </svg>
                <h2 class="text-lg font-semibold">Personal Details</h2>
            </div>
        </div>
        <p class="text-sm text-gray-500 mt-1">Your personal details are given below</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div id="firstNameContainer">
                <label class="text-gray-600">First Name</label>
                <input type="text" id="firstName" class="mt-1 w-full border border-gray-300 p-2 rounded-lg  outline-none" value="">
            </div>
            <div id="lastNameContainer">
                <label class="text-gray-600">Last Name</label>
                <input type="text" id="lastName" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
            <div class="md:col-span-2 border-b-2 border-dashed border-gray-200 pb-10">
                <label class="text-gray-600">Category</label>
                <div class="mt-1 w-[21.8rem]" id="purposeSelector">
                    <select id="category" class="w-full h-full border border-gray-300 p-2 rounded-lg">
                         <option value="Resident Indian">Resident Indian</option>
                        <option value="Indian">Indian</option>
                        <option value="Foreigner">Foreigner</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Details Section -->
    <div class="mb-8 border-dashed border-gray-200">
        <div class="flex items-center justify-between border-b pb-3">
            <div class="flex items-center gap-2">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.75 15.9371H7.8125V26.5621H5C4.75136 26.5621 4.5129 26.6608 4.33709 26.8367C4.16127 27.0125 4.0625 27.2509 4.0625 27.4996C4.0625 27.7482 4.16127 27.9867 4.33709 28.1625C4.5129 28.3383 4.75136 28.4371 5 28.4371H35C35.2486 28.4371 35.4871 28.3383 35.6629 28.1625C35.8387 27.9867 35.9375 27.7482 35.9375 27.4996C35.9375 27.2509 35.8387 27.0125 35.6629 26.8367C35.4871 26.6608 35.2486 26.5621 35 26.5621H32.1875V15.9371H36.25C36.4541 15.9369 36.6525 15.8702 36.8152 15.747C36.9779 15.6238 37.096 15.4509 37.1515 15.2545C37.207 15.0582 37.1969 14.849 37.1227 14.6589C37.0486 14.4688 36.9144 14.3081 36.7406 14.2011L20.4906 4.20113C20.343 4.11048 20.1732 4.0625 20 4.0625C19.8268 4.0625 19.657 4.11048 19.5094 4.20113L3.25938 14.2011C3.08558 14.3081 2.95142 14.4688 2.87728 14.6589C2.80313 14.849 2.79304 15.0582 2.84854 15.2545C2.90404 15.4509 3.0221 15.6238 3.1848 15.747C3.34749 15.8702 3.54593 15.9369 3.75 15.9371ZM9.6875 15.9371H15.3125V26.5621H9.6875V15.9371ZM22.8125 15.9371V26.5621H17.1875V15.9371H22.8125ZM30.3125 26.5621H24.6875V15.9371H30.3125V26.5621ZM20 6.09332L32.9375 14.0621H7.0625L20 6.09332ZM38.4375 32.4996C38.4375 32.7482 38.3387 32.9867 38.1629 33.1625C37.9871 33.3383 37.7486 33.4371 37.5 33.4371H2.5C2.25136 33.4371 2.0129 33.3383 1.83709 33.1625C1.66127 32.9867 1.5625 32.7482 1.5625 32.4996C1.5625 32.2509 1.66127 32.0125 1.83709 31.8367C2.0129 31.6608 2.25136 31.5621 2.5 31.5621H37.5C37.7486 31.5621 37.9871 31.6608 38.1629 31.8367C38.3387 32.0125 38.4375 32.2509 38.4375 32.4996Z" fill="url(#paint0_linear_2348_27446)"/>
                            <defs>
                            <linearGradient id="paint0_linear_2348_27446" x1="51.6664" y1="47.39" x2="16.8612" y2="-24.3794" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0E51A0"/>
                            <stop offset="1" stop-color="#E31D1C"/>
                            </linearGradient>
                            </defs>
                            </svg>
                <h2 class="text-lg font-semibold text-gray-700">Bank Details</h2>
            </div>
        </div>
        <p class="text-sm text-gray-500 mt-1">Your bank details are given below</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label class="text-gray-600">Bank Name</label>
                <input type="text" id="bankName" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
            <div>
                <label class="text-gray-600">Account Number</label>
                <input type="text" id="accountNumber" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
            <div>
                <label class="text-gray-600">IFSC Code</label>
                <input type="text" id="ifscCode" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
            <div>
                <label class="text-gray-600">PAN Number</label>
                <input type="text" id="panNumber" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
        </div>
    </div>

    <!-- Contact Details Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between border-b pb-3">
            <div class="flex items-center gap-2">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.8609 22.2078C25.8461 21.4531 26.5699 20.4087 26.9308 19.2213C27.2918 18.034 27.2716 16.7634 26.8731 15.5881C26.4747 14.4128 25.718 13.3919 24.7094 12.6689C23.7008 11.9459 22.491 11.557 21.25 11.557C20.009 11.557 18.7992 11.9459 17.7906 12.6689C16.782 13.3919 16.0253 14.4128 15.6269 15.5881C15.2284 16.7634 15.2082 18.034 15.5692 19.2213C15.9301 20.4087 16.6539 21.4531 17.6391 22.2078C15.7906 22.8981 14.1801 24.1062 13 25.6875C12.8508 25.8864 12.7868 26.1364 12.8219 26.3826C12.8571 26.6287 12.9886 26.8508 13.1875 27C13.3864 27.1492 13.6364 27.2132 13.8826 27.1781C14.1287 27.1429 14.3508 27.0114 14.5 26.8125C15.2859 25.7646 16.305 24.9141 17.4766 24.3283C18.6482 23.7425 19.9401 23.4375 21.25 23.4375C22.5599 23.4375 23.8518 23.7425 25.0234 24.3283C26.195 24.9141 27.2141 25.7646 28 26.8125C28.1492 27.0114 28.3713 27.1429 28.6174 27.1781C28.8636 27.2132 29.1136 27.1492 29.3125 27C29.5114 26.8508 29.6429 26.6287 29.6781 26.3826C29.7132 26.1364 29.6492 25.8864 29.5 25.6875C28.3199 24.1062 26.7094 22.8981 24.8609 22.2078ZM17.1875 17.5C17.1875 16.6965 17.4258 15.9111 17.8722 15.243C18.3185 14.5749 18.953 14.0542 19.6953 13.7467C20.4377 13.4393 21.2545 13.3588 22.0426 13.5156C22.8306 13.6723 23.5545 14.0592 24.1226 14.6274C24.6908 15.1955 25.0777 15.9194 25.2344 16.7074C25.3912 17.4955 25.3107 18.3123 25.0033 19.0547C24.6958 19.797 24.1751 20.4315 23.507 20.8778C22.8389 21.3242 22.0535 21.5625 21.25 21.5625C20.1726 21.5625 19.1392 21.1345 18.3774 20.3726C17.6155 19.6108 17.1875 18.5774 17.1875 17.5ZM32.5 4.0625H10C9.41984 4.0625 8.86344 4.29297 8.4532 4.7032C8.04297 5.11344 7.8125 5.66984 7.8125 6.25V10.3125H5C4.75136 10.3125 4.5129 10.4113 4.33709 10.5871C4.16127 10.7629 4.0625 11.0014 4.0625 11.25C4.0625 11.4986 4.16127 11.7371 4.33709 11.9129C4.5129 12.0887 4.75136 12.1875 5 12.1875H7.8125V19.0625H5C4.75136 19.0625 4.5129 19.1613 4.33709 19.3371C4.16127 19.5129 4.0625 19.7514 4.0625 20C4.0625 20.2486 4.16127 20.4871 4.33709 20.6629C4.5129 20.8387 4.75136 20.9375 5 20.9375H7.8125V27.8125H5C4.75136 27.8125 4.5129 27.9113 4.33709 28.0871C4.16127 28.2629 4.0625 28.5014 4.0625 28.75C4.0625 28.9986 4.16127 29.2371 4.33709 29.4129C4.5129 29.5887 4.75136 29.6875 5 29.6875H7.8125V33.75C7.8125 34.3302 8.04297 34.8866 8.4532 35.2968C8.86344 35.707 9.41984 35.9375 10 35.9375H32.5C33.0802 35.9375 33.6366 35.707 34.0468 35.2968C34.457 34.8866 34.6875 34.3302 34.6875 33.75V6.25C34.6875 5.66984 34.457 5.11344 34.0468 4.7032C33.6366 4.29297 33.0802 4.0625 32.5 4.0625ZM32.8125 33.75C32.8125 33.8329 32.7796 33.9124 32.721 33.971C32.6624 34.0296 32.5829 34.0625 32.5 34.0625H10C9.91712 34.0625 9.83763 34.0296 9.77903 33.971C9.72042 33.9124 9.6875 33.8329 9.6875 33.75V6.25C9.6875 6.16712 9.72042 6.08763 9.77903 6.02903C9.83763 5.97042 9.91712 5.9375 10 5.9375H32.5C32.5829 5.9375 32.6624 5.97042 32.721 6.02903C32.7796 6.08763 32.8125 6.16712 32.8125 6.25V33.75Z" fill="url(#paint0_linear_2348_27480)"/>
                    <defs>
                    <linearGradient id="paint0_linear_2348_27480" x1="45.6742" y1="51.0781" x2="2.18328" y2="-17.559" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0E51A0"/>
                    <stop offset="1" stop-color="#E31D1C"/>
                    </linearGradient>
                    </defs>
                </svg>
                <h2 class="text-lg font-semibold text-gray-700">Contact Details</h2>
            </div>
        </div>
        <p class="text-sm text-gray-500 mt-1">Your contact details are given below</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <label class="text-gray-600">Mobile Number</label>
                <input type="text" id="mobileNumber" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="" disabled>
                <p class="text-xs text-dark mt-1">Please contact care@extravelmoney.com to change mobile number.</p>
            </div>
            <div id="emailContainer">
                <label class="text-gray-600">Email ID</label>
                <input type="email" id="emailId" class="mt-1 w-full border border-gray-300 p-2 rounded-lg outline-none" value="">
            </div>
            <div class="md:col-span-2">
                <label class="text-gray-600">Notifications Via</label>
                <div class="mt-1 w-[21.8rem]" id="purposeSelector">
                    <select id="notificationsVia" class="w-full h-full border border-gray-300 p-2 rounded-lg">
                        <option value="WhatsApp & Email">WhatsApp & Email</option>
                        <option value="Sms & Email">Sms & Email</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
        
        <div id="saveProfile" class=" h-12 px-2 py-3 cursor-pointer bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-4 md:mb-4 z-10 px-6 text-white">Save Profile</div>
            </div>
            
                

        </div>

    </div>
    
    <div class="loadingAnimationContainer flex items-center justify-center h-screen fixed top-0 left-0 w-full bg-white z-50">
            <div class="loading">
                <svg viewBox="0 0 187.3 93.7" height="200px" width="300px" class="svgbox">
                 <defs>
                   <linearGradient y2="0%" x2="100%" y1="0%" x1="0%" id="gradient">
                     <stop stop-color="#2C5AA2" offset="0%"></stop>
                        <stop stop-color="#E3373A" offset="100%"></stop>
                   </linearGradient>
                 </defs>
                 <path stroke="url(#gradient)" d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z"></path>
               </svg>
            </div>
        </div>
        
        
    <?php 
    include $fold . 'includesv2/footer.php';
    ?>
    
    
    
    
    
    <?php 
    include $fold . 'includesv2/footerScripts.php';
    ?>

    


</body>

</html>