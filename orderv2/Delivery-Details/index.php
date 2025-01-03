<!DOCTYPE html>
<html lang="en">

<?php

    
    $fold = "../../";  
    $deliveryDetailsPage = true;
    $title="Delivery Details";
    include $fold . 'includesv2/head.php';
?>

<body class="min-h-[110vh]">
    <div class="flex flex-col items-center justify-center">
        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

        <?php 

            include $fold . 'includesv2/header.php';
        ?>    

            <div class="progressBar mb-8">
                <div class="w-full justify-start items-center progressBar hidden md:inline-flex mt-8">
                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">1</span>
                        </div>
                        <a href="" class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Get Rates</a>
                        
                    </div>

                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">2</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Choose Provider</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">3</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Contact
                            Details</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">4</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Review
                            & Payment</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">5</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Complete
                            KYC</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5 bg-[#20bc73] border border-[#eaeef4]"></div>
                </div>

            </div>
            <section class="pb-32 md:pb-8 px-5 sm:px-12 md:px-16 py-5 md:flex  gap-6 md:mt-16">
                <div class="w-full md:w-3/5 border-[#0e51a0]/10 rounded-2xl md:border md:px-8 md:pb-4">
                    <div
                        class=" w-full p-2.5 bg-primary-blue/10 rounded-lg justify-center items-center gap-2.5 inline-flex md:hidden">
                        <div class="text-primary-blue text-base font-bold" id="productNameIdentifier">Currency Exchange</div>
                    </div>

                    <div class="w-full progressBar justify-start items-center gap-2 inline-flex mt-6 md:hidden">
                        <div
                            class=" w-10 aspect-square bg-white rounded-3xl border-2 border-primary-blue flex-col justify-center items-center gap-2.5 inline-flex">
                            <div><span class="text-primary-blue text-lg font-bold ">2</span><span
                                    class="text-black/40 text-base font-medium ">/5</span></div>
                        </div>
                        <div class="text-black text-base font-bold leading-none">Choose Provider</div>
                        <div class="flex flex-1 shrink gap-2.5 self-stretch my-auto h-0.5 bg-primary-blue basis-4 w-[198px]"
                            role="progressbar"></div>
                    </div>




                    <div class="mt-4 border md:border-0 border-[#0e51a0]/10 rounded-2xl">

                        

                        <div class="flex flex-col mt-4 pb-6">

                            <div class="px-2 ">
                                <div class="h-7 justify-start items-center gap-1 inline-flex">
                                    <p class="text-black/60 text-sm font-semibold ">Choose Nearest Branch in</p>
                                    <p class="text-primary-blue text-[13px] font-bold  leading-7" id="districtName"></p>
                                </div>



                                <!-- <div class="dropdownMain select-none" id="cityDropDown" dataval="Aluva">
                                    <div class="selectedItem">
                                       
                                        <span>Select a city</span>
                                    </div>
                                    <ul class="dropdownList">
                                      
                                        <li class="dropdownItem" value="template" style="display:none;">
                                        
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20"
                                                viewBox="0 0 24 25" fill="none">
                                                <path
                                                    d="M21 5.1875H3C2.6519 5.1875 2.31806 5.32578 2.07192 5.57192C1.82578 5.81806 1.6875 6.1519 1.6875 6.5V18.5C1.6875 18.8481 1.82578 19.1819 2.07192 19.4281C2.31806 19.6742 2.6519 19.8125 3 19.8125H21C21.3481 19.8125 21.6819 19.6742 21.9281 19.4281C22.1742 19.1819 22.3125 18.8481 22.3125 18.5V6.5C22.3125 6.1519 22.1742 5.81806 21.9281 5.57192C21.6819 5.32578 21.3481 5.1875 21 5.1875ZM3 6.3125H21C21.0497 6.3125 21.0974 6.33225 21.1326 6.36742C21.1677 6.40258 21.1875 6.45027 21.1875 6.5V8.9375H2.8125V6.5C2.8125 6.45027 2.83225 6.40258 2.86742 6.36742C2.90258 6.33225 2.95027 6.3125 3 6.3125ZM21 18.6875H3C2.95027 18.6875 2.90258 18.6677 2.86742 18.6326C2.83225 18.5974 2.8125 18.5497 2.8125 18.5V10.0625H21.1875V18.5C21.1875 18.5497 21.1677 18.5974 21.1326 18.6326C21.0974 18.6677 21.0497 18.6875 21 18.6875ZM19.3125 16.25C19.3125 16.3992 19.2532 16.5423 19.1477 16.6477C19.0423 16.7532 18.8992 16.8125 18.75 16.8125H15.75C15.6008 16.8125 15.4577 16.7532 15.3523 16.6477C15.2468 16.5423 15.1875 16.3992 15.1875 16.25C15.1875 16.1008 15.2468 15.9577 15.3523 15.8523C15.4577 15.7468 15.6008 15.6875 15.75 15.6875H18.75C18.8992 15.6875 19.0423 15.7468 19.1477 15.8523C19.2532 15.9577 19.3125 16.1008 19.3125 16.25ZM13.3125 16.25C13.3125 16.3992 13.2532 16.5423 13.1477 16.6477C13.0423 16.7532 12.8992 16.8125 12.75 16.8125H11.25C11.1008 16.8125 10.9577 16.7532 10.8523 16.6477C10.7468 16.5423 10.6875 16.3992 10.6875 16.25C10.6875 16.1008 10.7468 15.9577 10.8523 15.8523C10.9577 15.7468 11.1008 15.6875 11.25 15.6875H12.75C12.8992 15.6875 13.0423 15.7468 13.1477 15.8523C13.2532 15.9577 13.3125 16.1008 13.3125 16.25Z"
                                                    fill="black" />
                                            </svg>
                                            <span>Template City, Location</span>
                                        </li>
                                  
                                    </ul>
                              
                                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                        viewBox="0 0 16 17" fill="none">
                                        <path
                                            d="M13.354 6.85354L8.35403 11.8535C8.30759 11.9 8.25245 11.9369 8.19175 11.9621C8.13105 11.9872 8.06599 12.0002 8.00028 12.0002C7.93457 12.0002 7.86951 11.9872 7.80881 11.9621C7.74811 11.9369 7.69296 11.9 7.64653 11.8535L2.64653 6.85354C2.55271 6.75972 2.5 6.63247 2.5 6.49979C2.5 6.36711 2.55271 6.23986 2.64653 6.14604C2.74035 6.05222 2.8676 5.99951 3.00028 5.99951C3.13296 5.99951 3.26021 6.05222 3.35403 6.14604L8.00028 10.7929L12.6465 6.14604C12.693 6.09958 12.7481 6.06273 12.8088 6.03759C12.8695 6.01245 12.9346 5.99951 13.0003 5.99951C13.066 5.99951 13.131 6.01245 13.1917 6.03759C13.2524 6.06273 13.3076 6.09958 13.354 6.14604C13.4005 6.19249 13.4373 6.24764 13.4625 6.30834C13.4876 6.36904 13.5006 6.43409 13.5006 6.49979C13.5006 6.56549 13.4876 6.63054 13.4625 6.69124C13.4373 6.75193 13.4005 6.80708 13.354 6.85354Z"
                                            fill="black" />
                                    </svg>
                                </div> -->

                                <div class="dropdownMain select-none"  data-search="true" id="cityDropDown" dataval="" >
                                    <div class="selectedItem">

                                    </div>
                                    <ul class="dropdownList overflow-scroll">
                                        <li value="aluva" class="dropdownItem template" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                <path d="M22 19V22H2V19C2 18.45 2.45 18 3 18H21C21.55 18 22 18.45 22 19Z" fill="#ccc" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M7 11H5V18H7V11Z" fill="black"/>
                                                <path d="M11 11H9V18H11V11Z" fill="black"/>
                                                <path d="M15 11H13V18H15V11Z" fill="black"/>
                                                <path d="M19 11H17V18H19V11Z" fill="black"/>
                                                <path d="M23 22.75H1C0.59 22.75 0.25 22.41 0.25 22C0.25 21.59 0.59 21.25 1 21.25H23C23.41 21.25 23.75 21.59 23.75 22C23.75 22.41 23.41 22.75 23 22.75Z" fill="black"/>
                                                <path d="M21.37 5.75009L12.37 2.15009C12.17 2.07009 11.83 2.07009 11.63 2.15009L2.63 5.75009C2.28 5.89009 2 6.30009 2 6.68009V10.0001C2 10.5501 2.45 11.0001 3 11.0001H21C21.55 11.0001 22 10.5501 22 10.0001V6.68009C22 6.30009 21.72 5.89009 21.37 5.75009ZM12 8.50009C11.17 8.50009 10.5 7.83009 10.5 7.00009C10.5 6.17009 11.17 5.50009 12 5.50009C12.83 5.50009 13.5 6.17009 13.5 7.00009C13.5 7.83009 12.83 8.50009 12 8.50009Z" fill="black"/>
                                              </svg>
                                            <span>Aluva2, Ernakulam</span>
                                        </li>
                                        
                                    </ul>
                                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                        viewBox="0 0 16 17" fill="none">
                                        <path
                                            d="M13.354 6.85354L8.35403 11.8535C8.30759 11.9 8.25245 11.9369 8.19175 11.9621C8.13105 11.9872 8.06599 12.0002 8.00028 12.0002C7.93457 12.0002 7.86951 11.9872 7.80881 11.9621C7.74811 11.9369 7.69296 11.9 7.64653 11.8535L2.64653 6.85354C2.55271 6.75972 2.5 6.63247 2.5 6.49979C2.5 6.36711 2.55271 6.23986 2.64653 6.14604C2.74035 6.05222 2.8676 5.99951 3.00028 5.99951C3.13296 5.99951 3.26021 6.05222 3.35403 6.14604L8.00028 10.7929L12.6465 6.14604C12.693 6.09958 12.7481 6.06273 12.8088 6.03759C12.8695 6.01245 12.9346 5.99951 13.0003 5.99951C13.066 5.99951 13.131 6.01245 13.1917 6.03759C13.2524 6.06273 13.3076 6.09958 13.354 6.14604C13.4005 6.19249 13.4373 6.24764 13.4625 6.30834C13.4876 6.36904 13.5006 6.43409 13.5006 6.49979C13.5006 6.56549 13.4876 6.63054 13.4625 6.69124C13.4373 6.75193 13.4005 6.80708 13.354 6.85354Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                

                            </div>

                            






                        </div>
                    </div>

                    <div class="flex flex-col mt-6">
                        <span class="text-black/60 text-sm font-semibold pl-2">Choose Delivery Type</span>


                        <div class="flex flex-col md:flex-row gap-4">
                            <div id="radio1"
                                class="radio p-4 h-24 rounded-lg border flex-col justify-center items-start gap-2 inline-flex mt-2 selectedRadio w-full select-none cursor-pointer">
                                <div class="justify-start items-center gap-2 inline-flex">
                                    <svg class="checkedIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                        viewBox="0 0 24 25" fill="none">
                                        <path
                                            d="M16.1475 9.91695C16.2528 10.0224 16.312 10.1654 16.312 10.3145C16.312 10.4635 16.2528 10.6065 16.1475 10.712L10.8975 15.962C10.792 16.0673 10.6491 16.1265 10.5 16.1265C10.3509 16.1265 10.208 16.0673 10.1025 15.962L7.8525 13.712C7.75314 13.6053 7.69905 13.4643 7.70162 13.3186C7.70419 13.1728 7.76323 13.0338 7.86629 12.9307C7.96935 12.8277 8.10839 12.7686 8.25411 12.7661C8.39984 12.7635 8.54087 12.8176 8.6475 12.917L10.5 14.7685L15.3525 9.91695C15.458 9.81162 15.6009 9.75245 15.75 9.75245C15.8991 9.75245 16.042 9.81162 16.1475 9.91695ZM21.5625 12.5645C21.5625 14.4557 21.0017 16.3045 19.9509 17.8771C18.9002 19.4496 17.4067 20.6753 15.6594 21.3991C13.9121 22.1228 11.9894 22.3122 10.1345 21.9432C8.27951 21.5742 6.57564 20.6635 5.2383 19.3262C3.90096 17.9888 2.99022 16.2849 2.62125 14.43C2.25227 12.5751 2.44164 10.6524 3.16541 8.90504C3.88917 7.15772 5.11482 5.66427 6.68736 4.61352C8.25991 3.56278 10.1087 3.00195 12 3.00195C14.5352 3.00493 16.9658 4.01336 18.7584 5.80603C20.5511 7.5987 21.5595 10.0292 21.5625 12.5645ZM20.4375 12.5645C20.4375 10.8957 19.9427 9.26437 19.0155 7.87683C18.0884 6.48929 16.7706 5.40783 15.2289 4.76922C13.6871 4.13061 11.9906 3.96351 10.3539 4.28908C8.71722 4.61464 7.2138 5.41823 6.03379 6.59824C4.85379 7.77825 4.05019 9.28166 3.72463 10.9184C3.39907 12.5551 3.56616 14.2516 4.20477 15.7933C4.84338 17.3351 5.92484 18.6529 7.31238 19.58C8.69992 20.5071 10.3312 21.002 12 21.002C14.237 20.9995 16.3817 20.1097 17.9635 18.5279C19.5453 16.9461 20.435 14.8015 20.4375 12.5645Z"
                                            fill="white" />
                                    </svg>
                                    <div class="w-5 aspect-square border border-gray-300 rounded-full uncheckedIcon">
                                    </div>
                                    <span class=" text-sm font-semibold">Door Delivery (Upto 8km)</span>
                                </div>
                                <div class="self-stretch">
                                    <span class=" text-xs font-normal leading-none">Delivery Charge :</span>
                                    <span class=" text-xs font-semibold leading-none">₹200</span>
                                    <span class=" text-xs font-normal leading-none">will be applied</span>
                                </div>
                            </div>

                            <div id="radio2"
                                class="radio h-12 md:h-24 px-4  rounded-lg border border-black/10 justify-start items-center gap-2 inline-flex mt-2 w-full select-none cursor-pointer">
                                <svg class="checkedIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                    viewBox="0 0 24 25" fill="none">
                                    <path
                                        d="M16.1475 9.91695C16.2528 10.0224 16.312 10.1654 16.312 10.3145C16.312 10.4635 16.2528 10.6065 16.1475 10.712L10.8975 15.962C10.792 16.0673 10.6491 16.1265 10.5 16.1265C10.3509 16.1265 10.208 16.0673 10.1025 15.962L7.8525 13.712C7.75314 13.6053 7.69905 13.4643 7.70162 13.3186C7.70419 13.1728 7.76323 13.0338 7.86629 12.9307C7.96935 12.8277 8.10839 12.7686 8.25411 12.7661C8.39984 12.7635 8.54087 12.8176 8.6475 12.917L10.5 14.7685L15.3525 9.91695C15.458 9.81162 15.6009 9.75245 15.75 9.75245C15.8991 9.75245 16.042 9.81162 16.1475 9.91695ZM21.5625 12.5645C21.5625 14.4557 21.0017 16.3045 19.9509 17.8771C18.9002 19.4496 17.4067 20.6753 15.6594 21.3991C13.9121 22.1228 11.9894 22.3122 10.1345 21.9432C8.27951 21.5742 6.57564 20.6635 5.2383 19.3262C3.90096 17.9888 2.99022 16.2849 2.62125 14.43C2.25227 12.5751 2.44164 10.6524 3.16541 8.90504C3.88917 7.15772 5.11482 5.66427 6.68736 4.61352C8.25991 3.56278 10.1087 3.00195 12 3.00195C14.5352 3.00493 16.9658 4.01336 18.7584 5.80603C20.5511 7.5987 21.5595 10.0292 21.5625 12.5645ZM20.4375 12.5645C20.4375 10.8957 19.9427 9.26437 19.0155 7.87683C18.0884 6.48929 16.7706 5.40783 15.2289 4.76922C13.6871 4.13061 11.9906 3.96351 10.3539 4.28908C8.71722 4.61464 7.2138 5.41823 6.03379 6.59824C4.85379 7.77825 4.05019 9.28166 3.72463 10.9184C3.39907 12.5551 3.56616 14.2516 4.20477 15.7933C4.84338 17.3351 5.92484 18.6529 7.31238 19.58C8.69992 20.5071 10.3312 21.002 12 21.002C14.237 20.9995 16.3817 20.1097 17.9635 18.5279C19.5453 16.9461 20.435 14.8015 20.4375 12.5645Z"
                                        fill="white" />
                                </svg>
                                <div class="w-5 aspect-square border border-gray-300 rounded-full uncheckedIcon"></div>
                                <span class=" text-sm font-semibold">Store Pickup</span>
                            </div>
                        </div>



                        <div class="flex flex-col mt-8 show" id="doorDeliveryDetails">
                            <span class="text-black/60 text-sm font-semibold leading-[21px]">Add Delivery Address</span>
                            <div class="mt-4 flex flex-col gap-1">
                                <span class="text-black/60 text-mediumFont ml-2">Address<span
                                        class="text-[#e31d1c]  ">*</span></span>

                                <input
                                    class="h-11 px-3 py-2 bg-white rounded-lg border border-black/10 text-black text-sm font-bold outline-none"
                                    id="ddAddress" data-save>


                            </div>

                            

                            <div class="mt-4 flex flex-col gap-1">
                                <span class="text-black/60 text-mediumFont ml-2">Near by Landmark<span
                                        class="text-[#e31d1c]  ">*</span></span>

                                <input
                                    class="h-11 px-3 py-2 bg-white rounded-lg border border-black/10 text-black text-sm font-bold outline-none"
                                    value="" id="ddLandMark" data-save>


                            </div>
                        </div>

                        

                    </div>
                </div>
                <div class="flex-col w-full md:w-1/3 border-black/10 mt-6 customMd:mt-0">

                    <div
                        class="flex  customGradient3 z-20 rounded-tr-2xl rounded-tl-2xl p-2 justify-start items-center h-16">

                        <svg class="max-h-10 max-w-[2.2rem]" xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 26 27" fill="none">
                            <g clip-path="url(#clip0_807_6496)">
                                <path
                                    d="M25.8673 20.9369L20.2633 15.3297C20.2911 15.3079 20.3202 15.288 20.3506 15.27L21.8442 14.4748C22.2262 14.2739 22.5145 13.9316 22.6478 13.5209C22.7811 13.1103 22.7488 12.6638 22.5577 12.2766L21.8137 10.7542C21.7566 10.6381 21.7269 10.5105 21.7269 10.3812C21.7269 10.2518 21.7566 10.1242 21.8137 10.0082L22.5577 8.48572C22.7488 8.09858 22.7811 7.65207 22.6478 7.24142C22.5145 6.83076 22.2262 6.48847 21.8442 6.28755L20.349 5.4932C20.2346 5.43294 20.1357 5.34719 20.0598 5.24256C19.9839 5.13794 19.9331 5.01725 19.9112 4.88982L19.6184 3.22068C19.5456 2.79522 19.3095 2.41505 18.9606 2.16124C18.6116 1.90742 18.1773 1.80003 17.7504 1.86196L16.0732 2.09965C15.9453 2.11747 15.815 2.10599 15.6922 2.06609C15.5694 2.02618 15.4572 1.95888 15.3642 1.86927L14.1459 0.690954C13.837 0.389458 13.4225 0.220703 12.991 0.220703C12.5595 0.220703 12.145 0.389458 11.8361 0.690954L10.6178 1.86927C10.5248 1.95888 10.4126 2.02618 10.2898 2.06609C10.167 2.10599 10.0367 2.11747 9.90877 2.09965L8.2312 1.86196C7.80428 1.80024 7.37014 1.90772 7.02123 2.1615C6.67232 2.41528 6.43622 2.79531 6.36318 3.22068L6.07039 4.88982C6.04856 5.0173 5.99768 5.13804 5.92169 5.24268C5.8457 5.34732 5.74665 5.43304 5.63222 5.4932L4.13861 6.28755C3.75665 6.48847 3.46827 6.83076 3.33498 7.24142C3.20168 7.65207 3.23403 8.09858 3.42511 8.48572L4.16907 10.0082C4.22618 10.1242 4.25588 10.2518 4.25588 10.3812C4.25588 10.5105 4.22618 10.6381 4.16907 10.7542L3.42349 12.2766C3.2324 12.6638 3.20006 13.1103 3.33335 13.5209C3.46665 13.9316 3.75503 14.2739 4.13699 14.4748L5.63384 15.2692C5.66403 15.2872 5.69305 15.3072 5.72075 15.3289L0.116685 20.936C0.0653732 20.9873 0.0287205 21.0514 0.0105348 21.1216C-0.00765088 21.1919 -0.00670607 21.2657 0.0132711 21.3355C0.0332483 21.4052 0.0715289 21.4683 0.124136 21.5183C0.176742 21.5682 0.241756 21.6032 0.312421 21.6195L3.7979 22.4244L4.60237 25.9118C4.61866 25.9825 4.65358 26.0475 4.70349 26.1002C4.75341 26.1528 4.8165 26.1911 4.88621 26.2111C4.95593 26.2311 5.02972 26.232 5.09992 26.2138C5.17012 26.1956 5.23417 26.159 5.28542 26.1076L11.5729 19.8162L11.8365 20.0718C12.1455 20.3732 12.5599 20.5419 12.9914 20.5419C13.4229 20.5419 13.8374 20.3732 14.1463 20.0718L14.4099 19.8162L20.6986 26.1084C20.7499 26.1598 20.8139 26.1965 20.8841 26.2147C20.9543 26.2329 21.0281 26.2319 21.0978 26.2119C21.1675 26.1919 21.2306 26.1536 21.2805 26.101C21.3305 26.0484 21.3654 25.9833 21.3817 25.9126L22.1861 22.4252L25.6716 21.6203C25.7423 21.604 25.8073 21.569 25.8599 21.5191C25.9125 21.4692 25.9508 21.406 25.9708 21.3363C25.9907 21.2665 25.9917 21.1927 25.9735 21.1225C25.9553 21.0522 25.9187 20.9881 25.8673 20.9369ZM5.22775 25.0155L4.5313 21.9949C4.51421 21.9206 4.47658 21.8527 4.42273 21.7988C4.36887 21.7449 4.30096 21.7073 4.22674 21.6902L1.20785 20.9933L6.10978 16.0887L6.3644 17.5417C6.43763 17.967 6.67378 18.3469 7.02264 18.6006C7.3715 18.8543 7.80553 18.9619 8.23242 18.9004L9.90958 18.6627C10.0375 18.6451 10.1677 18.6566 10.2905 18.6965C10.4133 18.7364 10.5255 18.8036 10.6186 18.8931L10.9886 19.2511L5.22775 25.0155ZM12.4014 19.4875L11.8552 18.9593L11.1835 18.3092C10.8753 18.0091 10.4623 17.8412 10.0322 17.8411C9.95328 17.8413 9.87445 17.8468 9.79628 17.8578L8.11831 18.0955C7.90003 18.1276 7.67788 18.0729 7.49943 17.9431C7.32097 17.8133 7.20042 17.6187 7.16359 17.4011L6.8708 15.732C6.83488 15.5424 6.76616 15.3607 6.66775 15.1948C6.65857 15.175 6.64784 15.156 6.63567 15.1379C6.48406 14.8911 6.27001 14.6887 6.01516 14.5512L4.51872 13.7569C4.32337 13.6544 4.1758 13.4796 4.10751 13.2698C4.03923 13.0599 4.05563 12.8317 4.15323 12.6338L4.89719 11.1125C5.0088 10.8853 5.06683 10.6356 5.06683 10.3824C5.06683 10.1292 5.0088 9.87945 4.89719 9.65225L4.15323 8.12978C4.05563 7.93189 4.03923 7.70366 4.10751 7.49382C4.1758 7.28399 4.32337 7.10918 4.51872 7.00673L6.01476 6.21238C6.23863 6.09454 6.43242 5.92677 6.58114 5.72202C6.72986 5.51728 6.82952 5.28106 6.87242 5.03163L7.16521 3.36248C7.20138 3.14475 7.32148 2.9499 7.49971 2.81982C7.67793 2.68975 7.90005 2.63483 8.11831 2.66687L9.79587 2.90456C10.0462 2.94052 10.3014 2.91853 10.5419 2.84026C10.7824 2.762 11.0018 2.62956 11.1831 2.45315L12.4014 1.27483C12.5591 1.12071 12.7709 1.03443 12.9914 1.03443C13.2119 1.03443 13.4237 1.12071 13.5815 1.27483L14.7997 2.45315C14.9809 2.6296 15.2002 2.7621 15.4406 2.84043C15.681 2.91876 15.9362 2.94084 16.1865 2.90497L17.8645 2.66687C18.0828 2.63466 18.305 2.68933 18.4835 2.81914C18.662 2.94895 18.7825 3.14357 18.8192 3.36126L19.112 5.03041C19.1549 5.27978 19.2546 5.51595 19.4032 5.72069C19.5518 5.92542 19.7455 6.09323 19.9693 6.21116L21.4657 7.00551C21.6611 7.10796 21.8086 7.28277 21.8769 7.49261C21.9452 7.70244 21.9288 7.93067 21.8312 8.12856L21.0856 9.64981C20.974 9.87701 20.916 10.1268 20.916 10.38C20.916 10.6331 20.974 10.8829 21.0856 11.1101L21.8296 12.6326C21.9272 12.8305 21.9436 13.0587 21.8753 13.2685C21.807 13.4784 21.6594 13.6532 21.4641 13.7556L19.9681 14.55C19.7442 14.6678 19.5504 14.8356 19.4017 15.0403C19.253 15.2451 19.1533 15.4813 19.1104 15.7307L18.8176 17.3999C18.7809 17.6174 18.6607 17.8119 18.4826 17.9419C18.3045 18.0719 18.0827 18.127 17.8645 18.0955L16.1861 17.8574C15.9358 17.8215 15.6806 17.8435 15.4401 17.9217C15.1996 18 14.9802 18.1324 14.7989 18.3088L13.5806 19.4871C13.423 19.6411 13.2114 19.7273 12.9911 19.7273C12.7708 19.7274 12.5592 19.6414 12.4014 19.4875ZM21.7561 21.6902C21.6819 21.7073 21.6139 21.7449 21.5601 21.7988C21.5062 21.8527 21.4686 21.9206 21.4515 21.9949L20.7551 25.0155L14.9938 19.2511L15.3634 18.8931C15.4566 18.8037 15.5688 18.7366 15.6916 18.6967C15.8143 18.6568 15.9445 18.6452 16.0724 18.6627L17.75 18.9004C18.1769 18.962 18.611 18.8545 18.9599 18.6007C19.3087 18.347 19.5449 17.967 19.618 17.5417L19.8726 16.0887L24.775 20.9933L21.7561 21.6902Z"
                                    fill="white" stroke="white" stroke-width="0.406204" />
                                <path
                                    d="M19.0836 10.3813C19.0838 8.92208 18.5605 7.51124 17.6087 6.40554C17.5754 6.361 17.5333 6.32378 17.485 6.2962C17.4367 6.26862 17.3832 6.25125 17.3279 6.24518C17.2727 6.23911 17.2167 6.24447 17.1636 6.26092C17.1105 6.27737 17.0613 6.30456 17.0191 6.34081C16.9769 6.37706 16.9426 6.42159 16.9183 6.47164C16.894 6.5217 16.8803 6.57621 16.8779 6.6318C16.8756 6.6874 16.8846 6.74288 16.9046 6.79482C16.9245 6.84676 16.9549 6.89404 16.9939 6.93375C17.8653 7.94796 18.3192 9.25547 18.2639 10.5918C18.2085 11.9281 17.6479 13.1936 16.6955 14.1321C15.7432 15.0706 14.4701 15.6123 13.1338 15.6474C11.7975 15.6825 10.4978 15.2085 9.49745 14.3213C8.49713 13.4341 7.87091 12.1999 7.74546 10.8684C7.62001 9.53677 8.00468 8.20721 8.82167 7.1486C9.63867 6.09 10.827 5.38136 12.1463 5.16602C13.4656 4.95068 14.8174 5.24472 15.9283 5.98866C15.9725 6.02025 16.0226 6.04265 16.0756 6.05452C16.1286 6.0664 16.1835 6.06751 16.2369 6.05779C16.2904 6.04807 16.3413 6.02772 16.3868 5.99794C16.4322 5.96817 16.4713 5.92957 16.5015 5.88443C16.5318 5.8393 16.5527 5.78855 16.563 5.73518C16.5733 5.68181 16.5729 5.62692 16.5616 5.57374C16.5503 5.52057 16.5285 5.4702 16.4974 5.42561C16.4664 5.38103 16.4267 5.34313 16.3807 5.31417C15.2521 4.55829 13.9034 4.20145 12.5489 4.30035C11.1944 4.39925 9.91178 4.94823 8.90483 5.86004C7.89788 6.77186 7.22435 7.99423 6.99127 9.33292C6.75818 10.6716 6.97891 12.0498 7.61838 13.2486C8.25785 14.4474 9.27937 15.398 10.5207 15.9494C11.7619 16.5008 13.1518 16.6213 14.4693 16.2918C15.7869 15.9622 16.9566 15.2016 17.7927 14.1308C18.6287 13.0599 19.0831 11.7402 19.0836 10.3813Z"
                                    fill="white" stroke="white" stroke-width="0.406204" />
                                <path
                                    d="M15.3368 8.47608L12.1726 11.8103L10.657 10.0827C10.623 10.0391 10.5804 10.003 10.5319 9.97647C10.4833 9.94997 10.4299 9.93366 10.3749 9.92853C10.3199 9.9234 10.2644 9.92957 10.2118 9.94665C10.1592 9.96373 10.1107 9.99137 10.0692 10.0279C10.0277 10.0644 9.99404 10.109 9.97035 10.1589C9.94666 10.2089 9.93341 10.2632 9.93142 10.3184C9.92942 10.3737 9.93872 10.4288 9.95875 10.4803C9.97877 10.5319 10.0091 10.5788 10.0479 10.6182L11.8546 12.6802C11.8918 12.7227 11.9374 12.757 11.9886 12.7809C12.0398 12.8047 12.0954 12.8176 12.1518 12.8188H12.16C12.2151 12.8187 12.2696 12.8075 12.3202 12.7857C12.3708 12.7639 12.4165 12.732 12.4544 12.692L15.9244 9.03517C15.9631 8.99689 15.9938 8.95122 16.0145 8.90086C16.0352 8.85051 16.0456 8.7965 16.0451 8.74205C16.0445 8.68759 16.033 8.63381 16.0113 8.58388C15.9896 8.53396 15.958 8.48891 15.9185 8.45143C15.879 8.41394 15.8324 8.38478 15.7815 8.36567C15.7305 8.34657 15.6762 8.33791 15.6218 8.34021C15.5675 8.34251 15.5141 8.35572 15.4649 8.37906C15.4158 8.4024 15.3718 8.43539 15.3356 8.47608H15.3368Z"
                                    fill="white" stroke="white" stroke-width="0.406204" />
                            </g>
                            <defs>
                                <clippath id="clip0_807_6496">
                                    <rect width="25.9898" height="26.0042" fill="white"
                                        transform="translate(0 0.223633)" />
                                </clippath>
                            </defs>
                        </svg>

                        <div class="ml-4" id="cartContent">
                            <span class="text-white text-xs font-normal  leading-[18px]">We guarantee fastest
                                delivery</span>
                            <span class="text-white text-xs font-bold  leading-[18px]"> </span>
                            <span class="text-white text-xs font-normal  leading-[18px]">of your product </span>
                            <span class="text-white text-xs font-bold  leading-[18px]" id="cartContentText"></span>
                        </div>

                        <div class="ml-4 hidden" id="cartContentStorePickup">
                            <span class="text-white text-xs font-normal  leading-[18px]">Our customer executive will contact you soon.</span>
                            
                        </div>

                    </div>
                    <div class="px-4 pt-4 flex justify-between flex-col border border-black/10 rounded-b-lg rounded-bl-lg ">
                        <div class="">
                            <span class="text-black text-base font-bold">My Cart </span>

                            <div id="cartItems">
                                <!-- Placeholder where cart items will be dynamically inserted -->
                            </div>
                            
                            <!-- Template for a cart item -->
                            <template id="cartItemTemplate">
                                <div class="flex justify-between border-b border-black/10 mt-4 pb-2">
                                    <div class="h-6 justify-start items-center gap-1.5 inline-flex">
                                        <img src="" alt="Product Icon" class="product-icon">
                                        <p class="text-black text-xs font-medium leading-snug">Buy <span class="product-quantity"></span> <span class="product-name"></span> @ <span class="currency-value"></span></p>
                                    </div>
                                    <span class="text-black text-xs font-semibold leading-snug total-inr">₹ 0</span>
                                </div>
                            </template>
                            
                            
                            
                        </div>


                        <div class="bg-white py-4 rounded-t-3xl  md:static fixed  left-1/2  transform -translate-x-1/2   md:translate-x-0 md:translate-y-0 bottom-0 w-full flex items-center justify-center">
                        <div class="cursor-pointer h-12 px-2 py-3 bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-4 md:mt-20 mb-0 md:mb-4   z-10 w-[90%] md:w-full"
                            id="deliveryUpdateBtn">
                            <div class="text-white text-sm font-bold">Proceed to Next</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                    fill="white" />
                            </svg>
                        </div>
                        </div>
                        
                    </div>

                </div>














            </section>

        </div>

    </div>
    <footer>


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
    include $fold . 'includesv2/footerScripts.php';
    ?>

    </footer>

</body>

</html>