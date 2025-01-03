<!DOCTYPE html>
<html lang="en">

<?php
$title="My Account"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$fold="../"; 
$ogurl="https://www.extravelmoney.com/myaccount";
$ogtype="article";
$title="My Account";

$myAccountPage = true;

    include $fold . 'includesv2/head.php';
?>



<style>
    .tableBody::-webkit-scrollbar{
        display: none;
    }
    @media (max-width: 1055px) {
        .tableBody::-webkit-scrollbar {
            display: block;
        }
    }

    .tableBody table thead{
        background-color: #f8f9fb;
    }
    .tableBody table thead th{
        text-align: start;
        padding: 1rem 1rem;
        padding-left: 1rem;
        font-weight: 500;
        white-space: nowrap;
    }
    .tableBody table tbody td{
        text-align: start;
        padding: 1.5rem 1rem;
        padding-left: 1rem;
        white-space: nowrap;
    }
    .orderStatus{
        border-radius: 6px;
        border: 1px solid var(--Gray-300, #D0D5DD);
        background: var(--Backgrounds-Primary, #FFF);
        box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
        display: flex;
        padding: 2px 6px;
        align-items: center;
        gap: 4px;
        width: fit-content;
    }
    .confirmed svg{
        fill:#17B26A;
    }
    .cancelled svg{
        fill:#E3373A;
    }
    .pending svg{
        fill:#F4BC5F;
    }
    .processed svg{
        fill:#4885ED;
    }
    .postponed svg{
        fill:#7C51FF;
    }
    #orderListTable{
        display:none;
    }
    .highlight {
    background-color: yellow;
    color: black; 
    font-weight: bold; 
    transition: background-color 0.3s ease, color 0.3s ease;
    }
    #noOrderFoundAlert{
        display:none;
        padding: 1rem;
    }
    #singleOrderContainer{
        display:none;
    }
    #avatar span{
    background: rgb(14 81 160 / 0.2);
    width: 4rem;
    height: 4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 100%;
    font-size: 3rem;
    font-weight: 800;
    }
</style>

<body>
    <div class="flex flex-col items-center justify-center relative bg-white">


        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php 

                include $fold . 'includesv2/header.php';

            ?>
            
            <div class="px-5 sm:px-12 md:px-24 py-5 mt-8" id="totalOrdersContainer">
            <div class="grid grid-cols-2  customLg:grid-cols-5   gap-5">
                
                <div class="flex gap-2 col-span-2 customLg:col-span-1">
                    <div id="avatar">
                        <span></span>
                        
                    </div>
                    <div class="flex flex-col">
                        <span style="background: var(--Linear, linear-gradient(329deg, #0E51A0 -43.1%, #E31D1C 144.49%));background-clip: text;-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="text-[#0e51a0] text-base font-medium  leading-normal">Hi,</span>
                        <span class="text-[#0f1728] text-xl font-bold leading-[30px]" id="userName"></span>
                        <a href="profile/">
                            <span class="text-[#0e51a0] text-sm font-medium  leading-[21px]">View Profile</span>
                        </a>
                    </div>
                </div>             

                

                <div class="col-span-1    bg-white rounded-2xl flex justify-between p-3" style="filter: drop-shadow(2px 2px 24px rgba(14, 81, 160, 0.10));">
                    
                    <div class="flex flex-col gap-3">
                        <span class=" opacity-70 text-[#202224] text-base font-semibold">Total Referrals</span>
                        <span class=" text-[#202224] text-[28px] font-bold  tracking-wide" id="referalCount"></span>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="56" viewBox="0 0 60 56" fill="none">
                        <path opacity="0.21" fill-rule="evenodd" clip-rule="evenodd" d="M0 27.8891V43.6669C0 50.2943 5.37258 55.6669 12 55.6669H30H48C54.6274 55.6669 60 50.2943 60 43.6669V27.8891V12.1113C60 5.48391 54.6274 0.111328 48 0.111328H30H12C5.37258 0.111328 0 5.48392 0 12.1113V27.8891Z" fill="#8280FF"/>
                        <path opacity="0.587821" fill-rule="evenodd" clip-rule="evenodd" d="M20.6665 21.7166C20.6665 24.4439 23.0543 26.6549 25.9998 26.6549C28.9454 26.6549 31.3332 24.4439 31.3332 21.7166C31.3332 18.9893 28.9454 16.7783 25.9998 16.7783C23.0543 16.7783 20.6665 18.9893 20.6665 21.7166ZM34 26.6552C34 28.7007 35.7909 30.3589 38 30.3589C40.2091 30.3589 42 28.7007 42 26.6552C42 24.6097 40.2091 22.9515 38 22.9515C35.7909 22.9515 34 24.6097 34 26.6552Z" fill="#8280FF"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.9778 29.123C19.6826 29.123 14.5177 32.1187 14.0009 38.011C13.9727 38.3319 14.6356 38.9996 14.97 38.9996H36.9956C37.9972 38.9996 38.0128 38.2533 37.9972 38.0119C37.6065 31.9541 32.3616 29.123 25.9778 29.123ZM45.2744 38.9997H40.1335C40.1334 36.2208 39.1417 33.6563 37.4681 31.5931C42.0101 31.6391 45.7187 33.7654 45.9978 38.259C46.0091 38.44 45.9978 38.9997 45.2744 38.9997Z" fill="#8280FF"/>
                    </svg>

                </div>
                
                
                <div class="col-span-1  bg-white rounded-2xl flex justify-between p-3" style="filter: drop-shadow(2px 2px 24px rgba(14, 81, 160, 0.10));">
                    
                    <div class="flex flex-col gap-3">
                        <span class=" opacity-70 text-[#202224] text-base font-semibold">Total Earnings</span>
                        <span class=" text-[#202224] text-[28px] font-bold  tracking-wide" id="earningCount"></span>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="59" viewBox="0 0 60 59" fill="none">
                        <path opacity="0.21" fill-rule="evenodd" clip-rule="evenodd" d="M0 19.7698V46.2314C0 52.8588 5.37258 58.2314 12 58.2314H48C54.6274 58.2314 60 52.8588 60 46.2314V12.5391C60 5.91165 54.6274 0.539062 48 0.539062H20H12C5.37258 0.539062 0 5.91166 0 12.5391V19.7698Z" fill="#FEC53D"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 23.6823L27.7599 31.3211C27.9081 31.4033 28.0635 31.4627 28.2216 31.5004V46.3154L14.9814 38.7812C14.3731 38.4351 14 37.8059 14 37.1263V23.6823ZM45.9999 23.4795V37.1265C45.9999 37.8062 45.6268 38.4353 45.0186 38.7814L31.7783 46.3157V31.3709C31.8106 31.3554 31.8426 31.3389 31.8742 31.3213L45.9999 23.4795Z" fill="#FEC53D"/>
                        <path opacity="0.499209" fill-rule="evenodd" clip-rule="evenodd" d="M14.4336 19.9757C14.6017 19.7716 14.8138 19.5991 15.0611 19.4725L29.0605 12.3029C29.6482 12.0019 30.3531 12.0019 30.9408 12.3029L44.9402 19.4725C45.1309 19.5701 45.3006 19.695 45.4454 19.8406L30.0966 28.3614C29.9956 28.4174 29.9026 28.4815 29.8178 28.5524C29.733 28.4815 29.6399 28.4174 29.539 28.3614L14.4336 19.9757Z" fill="#FEC53D"/>
                    </svg>

                </div>

                <!--<div class="col-span-2  gap-4  grid place-items-center ">-->

                <!--    <div class="grid grid-cols-4 md:grid-cols-7 overflow-hidden place-content-center rounded-2xl border border-black/10 w-full"  style="background: linear-gradient(329deg, rgba(14, 81, 160, 0.10) -43.1%, rgba(227, 29, 28, 0.10) 144.49%); ">-->
                <!--        <div class="  md:col-span-2 relative hidden md:flex" style="background: url('<?php echo $fold . 'public/images/g-8.svg'; ?>') no-repeat left bottom; background-size: contain;">-->
                            
                <!--        </div>-->
                        
                <!--        <img class="col-span-1 flex md:hidden" src="<?php echo $fold . 'public/images/g-9.svg'; ?>" alt="">-->

                <!--        <div class="flex col-span-3 py-3">-->
                <!--            <div class="text-black text-xs font-normal  leading-[18px] flex flex-col gap-1 pr-2 ">-->
                <!--                <p class="text-black text-base font-semibold  leading-[18px]">Refer & Earn Rs 500</p>-->
                <!--                <p>You earn <b>Rs 500</b>, your friends gets up to <b>1000</b> OFF on their 1st money transfer transaction.</p>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="col-span-4 md:col-span-2 py-3 pr-3 pl-3 md:pl-0 justify-between items-center gap-2 flex md:flex-col">-->
                <!--            <div class="flex gap-2">-->
                <!--                <div class="w-8 h-8 bg-[#20bc73] rounded-md shadow justify-center items-center gap-[6.67px] inline-flex">-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">-->
                <!--                        <path d="M15.8852 12.5525L13.2185 11.2192C13.1398 11.18 13.0521 11.1623 12.9643 11.1679C12.8765 11.1734 12.7917 11.202 12.7185 11.2508L11.4119 12.1217C10.7504 11.783 10.2122 11.2448 9.87353 10.5833L10.7452 9.2775C10.794 9.20431 10.8226 9.11954 10.8282 9.03175C10.8337 8.94396 10.816 8.85626 10.7769 8.7775L9.44353 6.11083C9.40207 6.0274 9.33813 5.95722 9.25891 5.90818C9.1797 5.85915 9.08836 5.83323 8.99519 5.83333C8.15534 5.83333 7.34989 6.16696 6.75602 6.76083C6.16216 7.35469 5.82853 8.16015 5.82853 9C5.83073 10.9 6.5865 12.7216 7.93003 14.0652C9.27356 15.4087 11.0952 16.1645 12.9952 16.1667C13.835 16.1667 14.6405 15.833 15.2344 15.2392C15.8282 14.6453 16.1619 13.8399 16.1619 13C16.1619 12.9071 16.136 12.816 16.0871 12.7369C16.0383 12.6579 15.9683 12.594 15.8852 12.5525ZM12.9952 15.1667C11.3603 15.1647 9.79294 14.5143 8.63689 13.3583C7.48085 12.2023 6.83051 10.6349 6.82853 9C6.82857 8.47708 7.01774 7.97182 7.36112 7.57744C7.7045 7.18306 8.17892 6.92617 8.69686 6.85417L9.75186 8.96417L8.88603 10.2625C8.84053 10.331 8.81263 10.4096 8.80478 10.4914C8.79693 10.5733 8.80938 10.6558 8.84103 10.7317C9.3008 11.8248 10.1704 12.6944 11.2635 13.1542C11.3394 13.1858 11.4219 13.1983 11.5037 13.1904C11.5856 13.1826 11.6642 13.1547 11.7327 13.1092L13.031 12.2433L15.141 13.2983C15.069 13.8163 14.8121 14.2907 14.4178 14.6341C14.0234 14.9775 13.5181 15.1666 12.9952 15.1667ZM10.9952 2.5C9.52168 2.49969 8.0734 2.88244 6.79243 3.6107C5.51147 4.33895 4.44182 5.3877 3.68843 6.65405C2.93504 7.9204 2.52379 9.36085 2.49503 10.8341C2.46626 12.3073 2.82097 13.7627 3.52436 15.0575L2.55603 17.9633C2.48747 18.1689 2.47752 18.3895 2.5273 18.6004C2.57707 18.8113 2.68459 19.0042 2.83781 19.1574C2.99104 19.3106 3.18391 19.4181 3.39481 19.4679C3.60571 19.5177 3.8263 19.5077 4.03186 19.4392L6.93769 18.4708C8.07518 19.0881 9.3386 19.4375 10.6316 19.4924C11.9246 19.5472 13.2131 19.3061 14.3988 18.7874C15.5845 18.2686 16.6361 17.486 17.4733 16.4992C18.3106 15.5123 18.9115 14.3473 19.2302 13.093C19.5489 11.8387 19.5769 10.5281 19.3122 9.2613C19.0474 7.99448 18.4969 6.80483 17.7026 5.78308C16.9083 4.76133 15.8912 3.93444 14.7288 3.36548C13.5664 2.79652 12.2894 2.5005 10.9952 2.5ZM10.9952 18.5C9.6768 18.5003 8.38163 18.1531 7.24019 17.4933C7.1641 17.4496 7.07796 17.4263 6.99019 17.4258C6.93639 17.4261 6.88297 17.4349 6.83186 17.4517L3.71603 18.49C3.68666 18.4998 3.65515 18.5012 3.62502 18.4941C3.59489 18.487 3.56734 18.4716 3.54545 18.4497C3.52356 18.4279 3.5082 18.4003 3.50109 18.3702C3.49398 18.34 3.4954 18.3085 3.50519 18.2792L4.54353 15.1667C4.56599 15.0994 4.5739 15.0281 4.56671 14.9576C4.55953 14.8871 4.53742 14.8188 4.50186 14.7575C3.67457 13.3284 3.34204 11.6662 3.55585 10.0289C3.76966 8.39151 4.51787 6.87047 5.68438 5.70173C6.8509 4.533 8.37052 3.78191 10.0075 3.56499C11.6444 3.34808 13.3072 3.67745 14.7379 4.50203C16.1685 5.3266 17.2871 6.60027 17.92 8.12544C18.5529 9.65061 18.6647 11.342 18.2382 12.9373C17.8117 14.5325 16.8706 15.9424 15.561 16.9482C14.2514 17.954 12.6465 18.4995 10.9952 18.5Z" fill="white"/>-->
                <!--                    </svg>-->
                <!--                </div>-->

                <!--                <div class="w-8 h-8 bg-[#0e51a0] rounded-md shadow justify-center items-center gap-[6.67px] inline-flex">-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">-->
                <!--                      <path d="M19.0012 4.5H3.00122C2.86861 4.5 2.74144 4.55268 2.64767 4.64645C2.5539 4.74021 2.50122 4.86739 2.50122 5V16.3333C2.50122 16.6428 2.62414 16.9395 2.84293 17.1583C3.06172 17.3771 3.35847 17.5 3.66789 17.5H18.3346C18.644 17.5 18.9407 17.3771 19.1595 17.1583C19.3783 16.9395 19.5012 16.6428 19.5012 16.3333V5C19.5012 4.86739 19.4485 4.74021 19.3548 4.64645C19.261 4.55268 19.1338 4.5 19.0012 4.5ZM17.7162 5.5L11.0012 11.655L4.28622 5.5H17.7162ZM18.3346 16.5H3.66789C3.62368 16.5 3.58129 16.4824 3.55004 16.4512C3.51878 16.4199 3.50122 16.3775 3.50122 16.3333V6.13667L10.6679 12.7017C10.7601 12.786 10.8805 12.8328 11.0054 12.8328C11.1303 12.8328 11.2507 12.786 11.3429 12.7017L18.5012 6.13667V16.3333C18.5012 16.3775 18.4837 16.4199 18.4524 16.4512C18.4211 16.4824 18.3788 16.5 18.3346 16.5Z" fill="white"/>-->
                <!--                    </svg>-->
                <!--                </div>-->

                <!--                <div class="w-8 h-8 customGradient rounded-md shadow justify-center items-center gap-[6.67px] inline-flex">-->
                <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                <!--                        <path d="M12 7.5C11.11 7.5 10.24 7.76392 9.49993 8.25839C8.75991 8.75285 8.18314 9.45566 7.84254 10.2779C7.50195 11.1002 7.41283 12.005 7.58647 12.8779C7.7601 13.7508 8.18868 14.5526 8.81802 15.182C9.44736 15.8113 10.2492 16.2399 11.1221 16.4135C11.995 16.5872 12.8998 16.4981 13.7221 16.1575C14.5443 15.8169 15.2471 15.2401 15.7416 14.5001C16.2361 13.76 16.5 12.89 16.5 12C16.4988 10.8069 16.0243 9.66303 15.1806 8.81939C14.337 7.97575 13.1931 7.50124 12 7.5ZM12 15C11.4067 15 10.8266 14.8241 10.3333 14.4944C9.83994 14.1648 9.45542 13.6962 9.22836 13.1481C9.0013 12.5999 8.94189 11.9967 9.05764 11.4147C9.1734 10.8328 9.45912 10.2982 9.87868 9.87868C10.2982 9.45912 10.8328 9.1734 11.4147 9.05764C11.9967 8.94189 12.5999 9.0013 13.1481 9.22836C13.6962 9.45542 14.1648 9.83994 14.4944 10.3333C14.8241 10.8266 15 11.4067 15 12C15 12.7956 14.6839 13.5587 14.1213 14.1213C13.5587 14.6839 12.7956 15 12 15ZM16.5 2.25H7.5C6.10807 2.25149 4.77358 2.80509 3.78933 3.78933C2.80509 4.77358 2.25149 6.10807 2.25 7.5V16.5C2.25149 17.8919 2.80509 19.2264 3.78933 20.2107C4.77358 21.1949 6.10807 21.7485 7.5 21.75H16.5C17.8919 21.7485 19.2264 21.1949 20.2107 20.2107C21.1949 19.2264 21.7485 17.8919 21.75 16.5V7.5C21.7485 6.10807 21.1949 4.77358 20.2107 3.78933C19.2264 2.80509 17.8919 2.25149 16.5 2.25ZM20.25 16.5C20.25 17.4946 19.8549 18.4484 19.1516 19.1516C18.4484 19.8549 17.4946 20.25 16.5 20.25H7.5C6.50544 20.25 5.55161 19.8549 4.84835 19.1516C4.14509 18.4484 3.75 17.4946 3.75 16.5V7.5C3.75 6.50544 4.14509 5.55161 4.84835 4.84835C5.55161 4.14509 6.50544 3.75 7.5 3.75H16.5C17.4946 3.75 18.4484 4.14509 19.1516 4.84835C19.8549 5.55161 20.25 6.50544 20.25 7.5V16.5ZM18 7.125C18 7.3475 17.934 7.56501 17.8104 7.75002C17.6868 7.93502 17.5111 8.07922 17.3055 8.16436C17.1 8.24951 16.8738 8.27179 16.6555 8.22838C16.4373 8.18498 16.2368 8.07783 16.0795 7.9205C15.9222 7.76316 15.815 7.56271 15.7716 7.34448C15.7282 7.12625 15.7505 6.90005 15.8356 6.69448C15.9208 6.48891 16.065 6.31321 16.25 6.1896C16.435 6.06598 16.6525 6 16.875 6C17.1734 6 17.4595 6.11853 17.6705 6.3295C17.8815 6.54048 18 6.82663 18 7.125Z" fill="white"/>-->
                <!--                    </svg>-->
                <!--                </div>-->

                <!--            </div>-->
                <!--            <div class="w-full flex justify-center items-center">-->
                <!--                <div class="h-8 bg-white rounded-lg justify-center items-center gap-1 inline-flex w-full md:w-4/5 px-2">-->
                <!--                    <span class="text-[#18325b] text-[13px] font-medium  leading-tight ">Copy Link</span>-->
                <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
                <!--                            <path d="M16.875 2.5H6.875C6.70924 2.5 6.55027 2.56585 6.43306 2.68306C6.31585 2.80027 6.25 2.95924 6.25 3.125V6.25H3.125C2.95924 6.25 2.80027 6.31585 2.68306 6.43306C2.56585 6.55027 2.5 6.70924 2.5 6.875V16.875C2.5 17.0408 2.56585 17.1997 2.68306 17.3169C2.80027 17.4342 2.95924 17.5 3.125 17.5H13.125C13.2908 17.5 13.4497 17.4342 13.5669 17.3169C13.6842 17.1997 13.75 17.0408 13.75 16.875V13.75H16.875C17.0408 13.75 17.1997 13.6842 17.3169 13.5669C17.4342 13.4497 17.5 13.2908 17.5 13.125V3.125C17.5 2.95924 17.4342 2.80027 17.3169 2.68306C17.1997 2.56585 17.0408 2.5 16.875 2.5ZM12.5 16.25H3.75V7.5H12.5V16.25ZM16.25 12.5H13.75V6.875C13.75 6.70924 13.6842 6.55027 13.5669 6.43306C13.4497 6.31585 13.2908 6.25 13.125 6.25H7.5V3.75H16.25V12.5Z" fill="#18325B"/>-->
                <!--                        </svg>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                    
                <!--</div>-->


            </div>

            <div class="flex w-full bg-primary-blue rounded-xl py-2 px-4 gap-4 mt-10">
                <span class=" p-2 text-white rounded-md">Transaction History</span>
                
            </div>

            <div class="tableContainer flex flex-col mt-8 border border-[#e4e6eb] rounded-lg ">
                <div class="myActableHeader grid grid-cols-1 md:grid-cols-3 gap-y-6 py-6 px-4 gap-x-4">

                <div class="col-span-1">
                    <div class="flex gap-2">
                        <span class="text-[#0f1728] text-base font-semibold  leading-7">Total Transactions</span>
                        <span class="text-[#0e51a0] text-base font-bold leading-7 px-2 py-1 bg-[#2c5aa2]/10 rounded-full" id="order_count">0</span>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="flex md:justify-center items-center gap-2">
                        <span class="text-[#0f1728] text-sm font-semibold  leading-7 hidden customLg:block">Transaction Type </span>

                        <select name="" id="transactionType" class="rounded-lg border border-black/10 py-2 w-full customLg:w-fit outline-none">
                            <option value="all">All Transactions</option>
                            <option value="buy">Buy</option>
                            <option value="sell">Sell</option>
                            <option value="mt">Money Transfer</option>
                        </select>
                    </div>

                </div>

                <div class="col-span-1 text-end" >
                    <div class="flex items-center md:justify-end gap-2" id="orderSearchBarContainer">
                        <span class="text-[#0f1728] text-sm font-semibold  leading-7 hidden customLg:block">Search</span>
                        <input type="text" id="orderSearchBar" placeholder="Enter Estimate No" class="rounded-lg border border-black/10 py-2 indent-4  w-full customLg:w-60 outline-none">
                    </div>
                </div>

                </div>
                <div class="tableBody w-full overflow-scroll">
                    <table class="w-full" id="orderListTable">
                        <thead >
                            <tr>
                              <th>Type</th>
                              <th>Estimate No</th>
                              <th>Product</th>
                              <th>Currency</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th >Status</th>
                              <th>Actions</th>                              
                            </tr>
                        </thead>
                        <tbody class="listContainer">
                        <tr>
                              <td>Buy</td>
                              <td>122362</td>
                              <td>Forex Card</td>
                              <td>USD</td>
                              <td>1000</td>
                              <td>
                                <span>Jan 3, 2024 <br>10:30 AM</span>
                                
                              </td>
                              <td >
                                <div class="orderStatus confirmed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="8" viewBox="0 0 9 8" fill="none">
                                        <circle cx="4.33325" cy="4" r="3" />
                                    </svg>
                                    Confirmed
                                </div>
                             </td>
                              <td>
                                <div class="h-9 px-2 py-2 bg-[#0e51a0]/5 rounded-lg justify-center items-center gap-1 inline-flex">
                                    <img src="<?php echo $fold . 'public/images/logo/eye.svg'; ?>" alt="">
                                    <div class="px-0.5 justify-center items-center flex">
                                        <div class="text-[#0e51a0] text-sm font-semibold leading-tight">View</div>
                                    </div>
                                </div>
                              </td>
                        </tr>
                        
                        </tbody>
                        
                </table>
                <div id="noOrderFoundAlert">No order found</div>
                </div>
            </div>
            </div>
        
            <div class="flex flex-col md:flex-row md:gap-16  px-5 sm:px-12 md:px-24 py-5 mt-8" id="singleOrderContainer">
                        <div class="w-full md:w-1/2 mt-4">

                        <div class="h-7 justify-start items-center gap-2 inline-flex" >
                            <div class="cursor-pointer" id="backBtn">
                                <svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M20.812 11.9996C20.812 12.1488 20.7527 12.2919 20.6473 12.3974C20.5418 12.5029 20.3987 12.5621 20.2495 12.5621H5.10794L10.897 18.3521C10.9523 18.4036 10.9966 18.4657 11.0273 18.5347C11.0581 18.6037 11.0746 18.6782 11.0759 18.7537C11.0773 18.8293 11.0634 18.9043 11.0351 18.9743C11.0068 19.0444 10.9647 19.108 10.9113 19.1614C10.8579 19.2148 10.7942 19.2569 10.7242 19.2852C10.6542 19.3135 10.5791 19.3274 10.5036 19.3261C10.4281 19.3248 10.3536 19.3082 10.2846 19.2775C10.2156 19.2467 10.1535 19.2024 10.102 19.1471L3.352 12.3971C3.24667 12.2917 3.1875 12.1487 3.1875 11.9996C3.1875 11.8506 3.24667 11.7076 3.352 11.6021L10.102 4.85214C10.2086 4.75278 10.3497 4.69869 10.4954 4.70126C10.6411 4.70383 10.7802 4.76286 10.8832 4.86592C10.9863 4.96898 11.0453 5.10802 11.0479 5.25375C11.0505 5.39947 10.9964 5.54051 10.897 5.64714L5.10794 11.4371H20.2495C20.3987 11.4371 20.5418 11.4964 20.6473 11.6019C20.7527 11.7074 20.812 11.8505 20.812 11.9996Z" fill="black"/>
                                </svg>
                            </div>
                            
                            <span class="text-[#0f1728] text-xl font-semibold  leading-7">Order Details</span>
                        </div>


                        <div class="flex justify-between mt-8 border-b border-black/10 pb-8">

                                    <div class="h-[61px] flex-col justify-start items-start gap-[3px] inline-flex">
                                        <p class="text-black/40 text-base font-medium leading-normal tracking-tight">Estimate No</p>
                                            <div class="justify-center items-center gap-1 inline-flex">
                                                <span class="opacity-90 text-black text-base font-semibold leading-normal tracking-tight" id="estimateNo">122362</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M13.5 2H5.5C5.36739 2 5.24021 2.05268 5.14645 2.14645C5.05268 2.24021 5 2.36739 5 2.5V5H2.5C2.36739 5 2.24021 5.05268 2.14645 5.14645C2.05268 5.24021 2 5.36739 2 5.5V13.5C2 13.6326 2.05268 13.7598 2.14645 13.8536C2.24021 13.9473 2.36739 14 2.5 14H10.5C10.6326 14 10.7598 13.9473 10.8536 13.8536C10.9473 13.7598 11 13.6326 11 13.5V11H13.5C13.6326 11 13.7598 10.9473 13.8536 10.8536C13.9473 10.7598 14 10.6326 14 10.5V2.5C14 2.36739 13.9473 2.24021 13.8536 2.14645C13.7598 2.05268 13.6326 2 13.5 2ZM10 13H3V6H10V13ZM13 10H11V5.5C11 5.36739 10.9473 5.24021 10.8536 5.14645C10.7598 5.05268 10.6326 5 10.5 5H6V3H13V10Z" fill="black" fill-opacity="0.4"/>
                                                </svg>
                                            </div>
                                    </div>
                                    
                                    <div class="h-[61px] flex-col justify-start items-start gap-[3px] inline-flex">
                                        <p class="text-black/40 text-base font-medium leading-normal tracking-tight">Type</p>
                                            <div class="justify-center items-center gap-1 inline-flex">
                                                <span class="opacity-90 text-black text-base font-semibold leading-normal tracking-tight" id="orderType"></span>
                                                
                                            </div>
                                    </div>


                                    <div class="h-[61px] flex-col justify-start items-start gap-[3px] inline-flex">
                                        <span class="text-black/40 text-base font-medium  leading-normal tracking-tight">Status</span>
                                            <div class="h-[34px] pl-2 pr-3 py-2 bg-[#ffa928]/10 rounded-[20px] border justify-start items-center gap-1 inline-flex">
                                                
                                                    <div class="w-1.5 h-1.5 left-[1px] top-[1px] bg-[#ffa928] rounded-full"></div>
                                                
                                                <span class="text-center text-[#ffa928] text-sm font-medium ">Pending (Add Additional KYC Documents ) </span>
                                            
                                        </div>
                                    </div>

                        </div>

                        
                        <div class="flex justify-between mt-8 border-b border-black/10 pb-8 deliveryStatusContainer" >
                            <div class="flex-col justify-center items-start gap-1.5 inline-flex">
                                <span class="text-black text-base font-bold leading-normal">Delivery Address</span>
                                <div class="flex-col justify-start items-start flex">
                                    <span class="text-black text-sm font-normal leading-7" id="customerName">John Jacobs</span>
                                    <span class="text-black text-sm font-normal leading-7" id="customerEmail">johnjacobs@gmail.com</span>
                                    <span class="text-black text-sm font-normal leading-7" id="customerAddress">711-2880 Nulla St.Mankato Mississippi 96522</span>
                                </div>
                            </div>
                        </div>
                        

                        
                        <div class=" border-b border-black/20">
                        
                            <div class="flex flex-col mt-6 gap-4">
                                <div class="flex flex-col  gap-4 " id="productList">
                                    
                                </div>
                                
                                <div  class="deliveryStatusContainer justify-between items-start inline-flex w-full">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight">Delivery Fee</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="deliveryFee">₹ 000</p>
                                </div>
                                

                                <div class="hidden  gap-4 mb-4 justify-between" id="mtOrderProduct">
                                    <div class="flex flex-col gap-2">
                                        <span class=" text-[#0e51a0] text-sm font-medium  leading-relaxed tracking-tight">Currency</span>
                                        <span class=" text-[#111729] text-sm font-medium  leading-relaxed tracking-tight" id="currencyMt">USD@ 84.17</span>
                                    </div>
                                    <div class="flex flex-col gap-2 items-end">
                                        <span class=" text-[#0e51a0] text-sm font-medium  leading-relaxed tracking-tight">Fx Amount</span>
                                        <span class=" text-[#111729] text-sm font-medium  leading-relaxed tracking-tight" id="currencyMtAmnt">5000</span>
                                    </div>
                                    <div class="flex flex-col gap-2 items-end">
                                        <span class=" text-[#0e51a0] text-sm font-medium  leading-relaxed tracking-tight">Amount in INR</span>
                                        <span class=" text-[#111729] text-sm font-medium  leading-relaxed tracking-tight" id="currencyMtAmntinr">₹ 4,84,000</span>
                                    </div>
                                </div>
                                
                                
                                <div class=" justify-between items-start inline-flex w-full">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight">GST</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="gstRate">₹ 000</p>
                                </div>
                                <div class="justify-between items-start inline-flex w-full ">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight">Bank Charges</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="bankCharges">0</p>
                                </div>

                                <div class="justify-between items-start inline-flex w-full py-4 mt-4">
                                <p class="text-black text-base font-bold  leading-relaxed tracking-tight">Total</p>
                                <p class="text-[#111729] text-base font-bold  leading-relaxed" id="totalAmnt">₹ 000</p>
                            </div>
                                  
                            </div>
                            
                        </div>
    
                            
                            
    
                            
                        </div>
    
                        <div class="w-full md:max-w-[34rem] md:border border-primary-red rounded-xl md:p-4">
                            <p class="text-black text-lg font-bold leading-[27px] hidden md:block">No Need to Remember Documents; Go Paperless.</p>
                            <p class="text-[#677489] mt-4 text-sm font-medium leading-[21px] tracking-tight">Please Upload the following  documents listed below</p>
    
    

                            <template id="kyc-uploader-template">
                                <div class="kycUploader">
                                  <div class="kycUploaderContainer h-12 pl-4 pr-1 py-1 rounded-lg border border-black/10 justify-between items-center inline-flex w-full">
                                    <div class="justify-start items-center gap-2 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                            <path d="M26.53 11.0342L19.53 4.03421C19.3895 3.89352 19.1988 3.81438 19 3.81421H7C6.53587 3.81421 6.09075 3.99858 5.76256 4.32677C5.43437 4.65496 5.25 5.10008 5.25 5.56421V27.5642C5.25 28.0283 5.43437 28.4735 5.76256 28.8016C6.09075 29.1298 6.53587 29.3142 7 29.3142H25C25.4641 29.3142 25.9092 29.1298 26.2374 28.8016C26.5656 28.4735 26.75 28.0283 26.75 27.5642V11.5642C26.7498 11.3654 26.6707 11.1747 26.53 11.0342ZM19.75 6.37421L24.19 10.8142H19.75V6.37421ZM25 27.8142H7C6.9337 27.8142 6.87011 27.7879 6.82322 27.741C6.77634 27.6941 6.75 27.6305 6.75 27.5642V5.56421C6.75 5.4979 6.77634 5.43432 6.82322 5.38743C6.87011 5.34055 6.9337 5.31421 7 5.31421H18.25V11.5642C18.25 11.7631 18.329 11.9539 18.4697 12.0945C18.6103 12.2352 18.8011 12.3142 19 12.3142H25.25V27.5642C25.25 27.6305 25.2237 27.6941 25.1768 27.741C25.1299 27.7879 25.0663 27.8142 25 27.8142ZM19.53 18.0342C19.6037 18.1029 19.6628 18.1857 19.7038 18.2777C19.7448 18.3697 19.7668 18.469 19.7686 18.5697C19.7704 18.6704 19.7518 18.7704 19.7141 18.8638C19.6764 18.9572 19.6203 19.042 19.549 19.1132C19.4778 19.1845 19.393 19.2406 19.2996 19.2783C19.2062 19.3161 19.1062 19.3346 19.0055 19.3328C18.9048 19.331 18.8055 19.309 18.7135 19.268C18.6215 19.227 18.5387 19.1679 18.47 19.0942L16.75 17.3755V23.5642C16.75 23.7631 16.671 23.9539 16.5303 24.0945C16.3897 24.2352 16.1989 24.3142 16 24.3142C15.8011 24.3142 15.6103 24.2352 15.4697 24.0945C15.329 23.9539 15.25 23.7631 15.25 23.5642V17.3755L13.53 19.0942C13.3878 19.2267 13.1998 19.2988 13.0055 19.2954C12.8112 19.292 12.6258 19.2132 12.4884 19.0758C12.351 18.9384 12.2723 18.753 12.2688 18.5587C12.2654 18.3644 12.3375 18.1764 12.47 18.0342L15.47 15.0342C15.6106 14.8938 15.8012 14.8149 16 14.8149C16.1988 14.8149 16.3894 14.8938 16.53 15.0342L19.53 18.0342Z" fill="black"/>
                                          </svg>
                              
                                      <span class="text-black text-sm font-medium leading-[21px] doc-name">Document Title</span>
                                      
                                    </div>
                              
                                    <div class="uploadBtn self-stretch pl-3 pr-2 py-1 bg-[#0e51a0]/5 rounded justify-center items-center gap-2.5 flex relative cursor-pointer">
                                      <span class="text-[#0e51a0] text-xs font-semibold leading-[18px]">Upload</span>
                                      <input type="file" tag="" class="file_upload absolute border-none outline-none bg-transparent opacity-0 w-full h-full left-0 top-0">
                                    </div>
                              
                                    <span class="text-[#ffa928] text-xs font-semibold leading-normal uploadingText mr-4">Uploading</span>
                              
                                    <div class="uploadedContent h-14 px-2 py-1 rounded justify-center items-center gap-1 inline-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                            <path d="M17.8313 5.95628L7.83128 15.9563C7.74339 16.0441 7.62425 16.0934 7.50003 16.0934C7.37581 16.0934 7.25667 16.0441 7.16878 15.9563L2.79378 11.5813C2.71098 11.4924 2.6659 11.3749 2.66804 11.2535C2.67018 11.132 2.71938 11.0161 2.80526 10.9303C2.89115 10.8444 3.00701 10.7952 3.12845 10.793C3.24989 10.7909 3.36742 10.836 3.45628 10.9188L7.50003 14.9617L17.1688 5.29378C17.2576 5.21098 17.3752 5.1659 17.4966 5.16804C17.618 5.17018 17.7339 5.21938 17.8198 5.30526C17.9057 5.39115 17.9549 5.50701 17.957 5.62845C17.9592 5.74989 17.9141 5.86742 17.8313 5.95628Z" fill="#20BC73"/>
                                          </svg>
                                      <span class="text-[#20bc73] text-xs font-semibold leading-normal">Uploaded</span>
                                    </div>
                                  </div>
                              
                                  <div class="flex gap-4 items-center px-2 mt-1 kycExtender">
                                    <span class="text-[#606060] text-xs font-normal leading-[21px]">Sample_Document.PDF</span>
                                    <a href="" target="_blank" class="preview_link border border-primary-blue rounded-lg  px-[3px] gap-1 flex items-center justify-center">
                                        <svg fill="#0E51A0" height="17" width="17" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 488.85 488.85" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M244.425,98.725c-93.4,0-178.1,51.1-240.6,134.1c-5.1,6.8-5.1,16.3,0,23.1c62.5,83.1,147.2,134.2,240.6,134.2 s178.1-51.1,240.6-134.1c5.1-6.8,5.1-16.3,0-23.1C422.525,149.825,337.825,98.725,244.425,98.725z M251.125,347.025 c-62,3.9-113.2-47.2-109.3-109.3c3.2-51.2,44.7-92.7,95.9-95.9c62-3.9,113.2,47.2,109.3,109.3 C343.725,302.225,302.225,343.725,251.125,347.025z M248.025,299.625c-33.4,2.1-61-25.4-58.8-58.8c1.7-27.6,24.1-49.9,51.7-51.7 c33.4-2.1,61,25.4,58.8,58.8C297.925,275.625,275.525,297.925,248.025,299.625z"></path> </g> </g></svg>
                                        <span class="text-[12px] text-primary-blue">View</span>
                                    </a>
                                    <svg class="deleteIcon cursor-pointer ml-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <path d="M20.25 4.6875H16.3125V3.75C16.3125 3.20299 16.0952 2.67839 15.7084 2.29159C15.3216 1.9048 14.797 1.6875 14.25 1.6875H9.75C9.20299 1.6875 8.67839 1.9048 8.29159 2.29159C7.9048 2.67839 7.6875 3.20299 7.6875 3.75V4.6875H3.75C3.60082 4.6875 3.45774 4.74676 3.35225 4.85225C3.24676 4.95774 3.1875 5.10082 3.1875 5.25C3.1875 5.39918 3.24676 5.54226 3.35225 5.64775C3.45774 5.75324 3.60082 5.8125 3.75 5.8125H4.6875V19.5C4.6875 19.8481 4.82578 20.1819 5.07192 20.4281C5.31806 20.6742 5.6519 20.8125 6 20.8125H18C18.3481 20.8125 18.6819 20.6742 18.9281 20.4281C19.1742 20.1819 19.3125 19.8481 19.3125 19.5V5.8125H20.25C20.3992 5.8125 20.5423 5.75324 20.6477 5.64775C20.7532 5.54226 20.8125 5.39918 20.8125 5.25C20.8125 5.10082 20.7532 4.95774 20.6477 4.85225C20.5423 4.74676 20.3992 4.6875 20.25 4.6875ZM8.8125 3.75C8.8125 3.50136 8.91127 3.2629 9.08709 3.08709C9.2629 2.91127 9.50136 2.8125 9.75 2.8125H14.25C14.4986 2.8125 14.7371 2.91127 14.9129 3.08709C15.0887 3.2629 15.1875 3.50136 15.1875 3.75V4.6875H8.8125V3.75ZM18.1875 19.5C18.1875 19.5497 18.1677 19.5974 18.1326 19.6326C18.0974 19.6677 18.0497 19.6875 18 19.6875H6C5.95027 19.6875 5.90258 19.6677 5.86742 19.6326C5.83225 19.5974 5.8125 19.5497 5.8125 19.5V5.8125H18.1875V19.5ZM10.3125 9.75V15.75C10.3125 15.8992 10.2532 16.0423 10.1477 16.1477C10.0423 16.2532 9.89918 16.3125 9.75 16.3125C9.60082 16.3125 9.45774 16.2532 9.35225 16.1477C9.24676 16.0423 9.1875 15.8992 9.1875 15.75V9.75C9.1875 9.60082 9.24676 9.45774 9.35225 9.35225C9.45774 9.24676 9.60082 9.1875 9.75 9.1875C9.89918 9.1875 10.0423 9.24676 10.1477 9.35225C10.2532 9.45774 10.3125 9.60082 10.3125 9.75ZM14.8125 9.75V15.75C14.8125 15.8992 14.7532 16.0423 14.6477 16.1477C14.5423 16.2532 14.3992 16.3125 14.25 16.3125C14.1008 16.3125 13.9577 16.2532 13.8523 16.1477C13.7468 16.0423 13.6875 15.8992 13.6875 15.75V9.75C13.6875 9.60082 13.7468 9.45774 13.8523 9.35225C13.9577 9.24676 14.1008 9.1875 14.25 9.1875C14.3992 9.1875 14.5423 9.24676 14.6477 9.35225C14.7532 9.45774 14.8125 9.60082 14.8125 9.75Z" fill="black"/>
                                    </svg>
                                    
                                    <div class="uploadProgress flex justify-between items-center gap-2 w-56">
                                      <div class="h-1 w-40 bg-[#eb8f00] rounded-lg progressBar"></div>
                                      <span class="progressText text-[#2c5aa2] text-xs font-semibold leading-[18px]"></span>
                                    </div>
                                  </div>
                                </div>
                              </template>
                              
                        <div class="kycList mt-6 flex flex-col gap-4">
                            
                            

                            
                            
                            

                            

                            

                            

                            
                        </div>

                        
    
                        
                        </div>
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