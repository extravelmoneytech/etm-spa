<!DOCTYPE html>
<html lang="en">

<?php

    
    $fold = "../../";  

    $getRatesPage = true;
    $title="Get Rates";
    include $fold . 'includesv2/head.php';
     
?>


<body>
    <div class="flex flex-col items-center justify-center">
        <div class="chooseCityOverlay absolute top-0 left-0 w-full h-[100vh] bg-white customMd:bg-black/30  customMd:bg-opacity-60  z-20"
        style="backdrop-filter: blur(7px)">

        <div
                    class="otpWidget pt-10 customMd:pt-5 flex w-full  customMd::w-[30%] customMd::min-w-[26.5rem] absolute  z-20 top-0 left-0 bg-white px-5  py-5 customMd:rounded-xl flex-col customMd:mt-12 customMd:bg-white  min-h-[100vh] customMd:min-h-[0] h-[37rem] customMd:max-w-2xl customMd:left-2/4  customMd:top-1/2  customMd:transform customMd:-translate-x-1/2 customMd:-translate-y-1/2">
                    <img class="w-44" src="<?php echo $fold . 'public/images/logo/ETM logo without tagline.png'; ?>" alt="">
                    
                    <div id="sendOtpMain" class="flex flex-col ">
                        <img class="w-48 mt-4" src="<?php echo $fold .'public/images/otpImg.svg'; ?>" alt="">

                    <span class="text-black text-sm font-semibold mt-6 leading-7">Enter Your Mobile Number</span>

                    <div class="flex justify-between gap-2" id="otpMobileContainer">
                        <div id=""
                    class="p-[2px] rounded-[12px]  customGradient justify-start items-center gap-2.5 inline-flex w-[35%]">
                    <div style="padding: 0.75rem 0.5rem;height: 3rem;" class="justify-start rounded-[10px] items-center gap-2.5 flex w-full border-0 bg-white">
                        <div style="height: fit-content;padding: 0;border: none;width: 100%;" class="dropdownMain select-none countryCodeContainer" data-search="true" id="contryCodeMain" dataval="oe" custom-content>

                            <div class="selectedItem">

                                    
                                </div>

                            <ul  class="dropdownList overflow-scroll" id="countryCodeDropDown">
                                

                                
                            </ul>
                            <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M13.354 6.85354L8.35403 11.8535C8.30759 11.9 8.25245 11.9369 8.19175 11.9621C8.13105 11.9872 8.06599 12.0002 8.00028 12.0002C7.93457 12.0002 7.86951 11.9872 7.80881 11.9621C7.74811 11.9369 7.69296 11.9 7.64653 11.8535L2.64653 6.85354C2.55271 6.75972 2.5 6.63247 2.5 6.49979C2.5 6.36711 2.55271 6.23986 2.64653 6.14604C2.74035 6.05222 2.8676 5.99951 3.00028 5.99951C3.13296 5.99951 3.26021 6.05222 3.35403 6.14604L8.00028 10.7929L12.6465 6.14604C12.693 6.09958 12.7481 6.06273 12.8088 6.03759C12.8695 6.01245 12.9346 5.99951 13.0003 5.99951C13.066 5.99951 13.131 6.01245 13.1917 6.03759C13.2524 6.06273 13.3076 6.09958 13.354 6.14604C13.4005 6.19249 13.4373 6.24764 13.4625 6.30834C13.4876 6.36904 13.5006 6.43409 13.5006 6.49979C13.5006 6.56549 13.4876 6.63054 13.4625 6.69124C13.4373 6.75193 13.4005 6.80708 13.354 6.85354Z" fill="black"></path>
                            </svg>
                        </div>
                    </div>
                        </div>

                        <div id="otpInputContainer"
                    class="p-[2px] rounded-[12px]  customGradient justify-start items-center gap-2.5 inline-flex  w-[65%]">
                    <div class="justify-start rounded-[10px] items-center gap-2.5 flex bg-white w-full">
                        <input type="text" id="mobNumber"
                            class="font-semibold w-full outline-none border-0 bg-transparent py-3 px-2">
                    </div>
                        </div>
                    </div>
                    <p class="text-[#777777] text-sm font-medium mt-4 leading-[21px] mb-8">We will send you one-time
                                password to your mobile number</p>

                    <!--            <div  id="optSend" class=" px-4 py-3.5  rounded-lg justify-center items-center gap-1 inline-flex  cursor-pointer bg-primary-blue">-->
                    <!--    <div style="color:white" class=" text-base font-bold font-['Plus Jakarta Sans']">Get OTP via SMS</div>-->
                    <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                    <!--        <path-->
                    <!--            d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"-->
                    <!--            fill="white" />-->
                    <!--    </svg>-->
                    <!--</div>-->
                                
                    <!--            <div id="whatsappOtpSend"  style="border:0.8px solid #20bc73;" class=" px-4 py-3.5 mt-4  rounded-lg justify-center items-center gap-1 inline-flex cursor-pointer">-->
                    <!--    <div style="color:#20bc73" class="text-base font-bold font-['Plus Jakarta Sans']">Get OTP on WhatsApp</div>-->
                    <!--    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">-->
                    <!--        <path-->
                    <!--            d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"-->
                    <!--            fill="#20bc73" />-->
                    <!--    </svg>-->
                    <!--</div>-->

                    

                                <div id="whatsappOtpSend" class=" px-4 py-3.5 bg-[#20bc73] rounded-lg justify-center items-center gap-1 inline-flex cursor-pointer">
                        <div class="text-white text-base font-bold font-['Plus Jakarta Sans']">Get OTP on WhatsApp</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                fill="white" />
                        </svg>
                    </div>

                    <div style="border:0.8px solid #2C5AA2;" id="optSend" class=" px-4 py-3.5  rounded-lg justify-center items-center gap-1 inline-flex mt-4 cursor-pointer">
                        <div style="color:#2C5AA2;" class=" text-base font-bold font-['Plus Jakarta Sans']">Get OTP via SMS</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                fill="#2C5AA2" />
                        </svg>
                    </div>
                    </div>

                    <div id="verifyOtpMain" class="mt-6 flex flex-col h-full ">
                        <span class="text-[#777777] text-base font-medium  leading-7">Enter OTP</span>

                    <div class="otpInputBlock mt-4 gap-4 flex mb-2">
                        <input type="number" class="w-16 h-16 bg-primary-blue/10 rounded-xl outline-none border-0  text-white text-center font-semibold text-3xl">

                        <input type="number" class="w-16 h-16 bg-primary-blue/10 rounded-xl outline-none border-0  text-white text-center font-semibold text-3xl">

                        <input type="number" class="w-16 h-16 bg-primary-blue/10 rounded-xl outline-none border-0  text-white text-center font-semibold text-3xl">

                        <input type="number" class="w-16 h-16 bg-primary-blue/10 rounded-xl outline-none border-0  text-white text-center font-semibold text-3xl">

                    </div>

                    
                    <p class="text-[#777777] text-sm font-medium mt-4 leading-[21px] cursor-pointer">Code has been sent to <span id="mobNum"></span><span class="text-black font-semibold ml-4" id="changeNumberBtn">
                        Change?</span></p>

                    <div class="mt-6 justify-start items-center gap-2 inline-flex">
                        <span class="text-black/60 text-sm font-normal  leading-[21px]">Didn’t get the OTP</span>
                        <span class="otpTimer w-12 text-black/60 text-sm font-normal  leading-[21px]">In 30s</span>
                        <span class="text-[#0e51a0] text-sm font-semibold  leading-[21px] otpResendBtn cursor-pointer" >Resend OTP</span>
                    </div>

                    <div id="otpVerify"
                        class="h-12 w-full px-2 py-3 bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-20 customMd:mt-auto select-none cursor-pointer">
                        <span class="text-white text-sm font-bold">Verify OTP</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                fill="white" />
                        </svg>
                        
                    </div>
                    </div>
                    

                </div>
    </div>
        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

           

        <?php

            include $fold . 'includesv2/header.php';
        ?>

            <div class="progressBar mb-0 md:mb-8">
                <div class="w-full justify-start items-center progressBar hidden md:inline-flex mt-8">
                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">1</span>
                        </div>
                        <span
                            class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Get
                            Rates</span>
                    </div>

                    <div class="forexContainer grow shrink basis-0 h-0.5 bg-[#eaeef4]"></div>
                    <div class="forexContainer flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#eaeef4] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">2</span>
                        </div>
                        <span
                            class="text-black text-opacity-60 text-lg font-normal  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Choose Provider</span>
                    </div>
                    
                    <div class="moneyT grow shrink basis-0 h-0.5 bg-[#20bc73]"></div>
                    <div class="moneyT flex flex-col relative">
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

            <div class="progressContainer px-5 sm:px-12 md:px-16">
                <div
                    class="hidden w-full p-2.5 bg-primary-blue/10 rounded-lg justify-center items-center gap-2.5 inline-flex md:hidden">
                    <div class="text-primary-blue text-base font-bold" id="productNameIdentifier">Currency Exchange</div>
                </div>

                <div class="w-full progressBar justify-start items-center gap-2 inline-flex mt-6 md:hidden">
                    <div
                        class=" w-10 aspect-square bg-white rounded-3xl border-2 border-primary-blue flex-col justify-center items-center gap-2.5 inline-flex">
                        <div><span class="text-primary-blue text-lg font-bold ">1</span><span
                                class="text-black/40 text-base font-medium ">/5</span></div>
                    </div>
                    <div class="text-black text-base font-bold leading-none">Get Rates</div>
                    <div class="flex flex-1 shrink gap-2.5 self-stretch my-auto h-0.5 bg-primary-blue basis-4 w-[198px]"
                        role="progressbar"></div>
                </div>
            </div>



            <section class="md:mt-12">
                <div class="pb-32 md:pb-8 px-5 sm:px-12 md:px-16 py-5 md:flex gap-5 md:gap-10 forexContainer flex-col md:flex-row " style="padding-bottom:25rem;">

                    <div class="w-full md:w-2/3 md:border border-black/10 rounded-xl md:px-12 md:py-6">
















                        

                        <div
                            class=" w-full px-[9px] py-2 bg-[#20bc73]/10 rounded-lg justify-start items-center gap-1 hidden md:inline-flex " id="recommendationTextContainer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM12 20.25C10.3683 20.25 8.77326 19.7661 7.41655 18.8596C6.05984 17.9531 5.00242 16.6646 4.378 15.1571C3.75358 13.6496 3.5902 11.9908 3.90853 10.3905C4.22685 8.79016 5.01259 7.32015 6.16637 6.16637C7.32016 5.01259 8.79017 4.22685 10.3905 3.90852C11.9909 3.59019 13.6497 3.75357 15.1571 4.37799C16.6646 5.00242 17.9531 6.05984 18.8596 7.41655C19.7661 8.77325 20.25 10.3683 20.25 12C20.2475 14.1873 19.3775 16.2843 17.8309 17.8309C16.2843 19.3775 14.1873 20.2475 12 20.25ZM13.5 16.5C13.5 16.6989 13.421 16.8897 13.2803 17.0303C13.1397 17.171 12.9489 17.25 12.75 17.25C12.3522 17.25 11.9706 17.092 11.6893 16.8107C11.408 16.5294 11.25 16.1478 11.25 15.75V12C11.0511 12 10.8603 11.921 10.7197 11.7803C10.579 11.6397 10.5 11.4489 10.5 11.25C10.5 11.0511 10.579 10.8603 10.7197 10.7197C10.8603 10.579 11.0511 10.5 11.25 10.5C11.6478 10.5 12.0294 10.658 12.3107 10.9393C12.592 11.2206 12.75 11.6022 12.75 12V15.75C12.9489 15.75 13.1397 15.829 13.2803 15.9697C13.421 16.1103 13.5 16.3011 13.5 16.5ZM10.5 7.875C10.5 7.6525 10.566 7.43499 10.6896 7.24998C10.8132 7.06498 10.9889 6.92078 11.1945 6.83564C11.4001 6.75049 11.6263 6.72821 11.8445 6.77162C12.0627 6.81502 12.2632 6.92217 12.4205 7.0795C12.5778 7.23684 12.685 7.43729 12.7284 7.65552C12.7718 7.87375 12.7495 8.09995 12.6644 8.30552C12.5792 8.51109 12.435 8.68679 12.25 8.8104C12.065 8.93402 11.8475 9 11.625 9C11.3266 9 11.0405 8.88147 10.8295 8.6705C10.6185 8.45952 10.5 8.17337 10.5 7.875Z"
                                    fill="#20BC73" />
                            </svg>
                            <p class="grow shrink basis-0 text-[#20bc73] text-xs font-medium leading-tight" id="recommendationText">We recommend
                                USD forex card for United States of America, CAD in Cash for Canada, and GBK Cash for
                                Germany</p>
                        </div>

                        <div class="cardSection flex flex-col gap-8 mt-4">
                            <div id="productAdder"
                                class="customGradient2 flex flex-col p-4 border border-primary-blue/10 mt-4  rounded-2xl hidden">
                                <div class="flex justify-between">
                                    <p class="text-black text-base font-bold  leading-7">Product 1</p>


                                    <div id="productAdderCloseBtn"
                                        class="h-8 p-2 bg-[#fef2f1] rounded-lg border border-[#b42318]/10 justify-center items-center gap-2 inline-flex cursor-pointer">
                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 17" fill="none">
                                            <path d="M12.7635 12.7349C12.8003 12.7693 12.8299 12.8107 12.8503 12.8567C12.8708 12.9027 12.8819 12.9523 12.8828 13.0027C12.8836 13.053 12.8744 13.103 12.8555 13.1497C12.8367 13.1964 12.8086 13.2388 12.773 13.2744C12.7374 13.3101 12.695 13.3381 12.6483 13.357C12.6016 13.3758 12.5515 13.3851 12.5012 13.3842C12.4508 13.3833 12.4012 13.3723 12.3552 13.3518C12.3092 13.3313 12.2678 13.3018 12.2335 13.2649L7.99846 9.03055L3.76346 13.2649C3.69237 13.3312 3.59835 13.3672 3.5012 13.3655C3.40405 13.3638 3.31135 13.3244 3.24265 13.2557C3.17394 13.187 3.13459 13.0943 3.13287 12.9972C3.13116 12.9 3.16722 12.806 3.23346 12.7349L7.46783 8.49992L3.23346 4.26492C3.16722 4.19384 3.13116 4.09981 3.13287 4.00266C3.13459 3.90551 3.17394 3.81282 3.24265 3.74411C3.31135 3.67541 3.40405 3.63605 3.5012 3.63434C3.59835 3.63262 3.69237 3.66868 3.76346 3.73492L7.99846 7.9693L12.2335 3.73492C12.3045 3.66868 12.3986 3.63262 12.4957 3.63434C12.5929 3.63605 12.6856 3.67541 12.7543 3.74411C12.823 3.81282 12.8623 3.90551 12.864 4.00266C12.8658 4.09981 12.8297 4.19384 12.7635 4.26492L8.52908 8.49992L12.7635 12.7349Z" fill="black"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <p class="text-black/60 text-xs font-medium ">Choose Product</p>

                                    <div class="dropdownMain select-none bg-white mt-2" id="cardProduct"
                                                    dataval="forexCard">
                                                    <div class="selectedItem">

                                                    </div>
                                                    <ul class="dropdownList">
                                                        <li value="forexCard">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="29" height="29" viewBox="0 0 24 25" fill="none">
                                                                <path
                                                                    d="M21 5.1875H3C2.6519 5.1875 2.31806 5.32578 2.07192 5.57192C1.82578 5.81806 1.6875 6.1519 1.6875 6.5V18.5C1.6875 18.8481 1.82578 19.1819 2.07192 19.4281C2.31806 19.6742 2.6519 19.8125 3 19.8125H21C21.3481 19.8125 21.6819 19.6742 21.9281 19.4281C22.1742 19.1819 22.3125 18.8481 22.3125 18.5V6.5C22.3125 6.1519 22.1742 5.81806 21.9281 5.57192C21.6819 5.32578 21.3481 5.1875 21 5.1875ZM3 6.3125H21C21.0497 6.3125 21.0974 6.33225 21.1326 6.36742C21.1677 6.40258 21.1875 6.45027 21.1875 6.5V8.9375H2.8125V6.5C2.8125 6.45027 2.83225 6.40258 2.86742 6.36742C2.90258 6.33225 2.95027 6.3125 3 6.3125ZM21 18.6875H3C2.95027 18.6875 2.90258 18.6677 2.86742 18.6326C2.83225 18.5974 2.8125 18.5497 2.8125 18.5V10.0625H21.1875V18.5C21.1875 18.5497 21.1677 18.5974 21.1326 18.6326C21.0974 18.6677 21.0497 18.6875 21 18.6875ZM19.3125 16.25C19.3125 16.3992 19.2532 16.5423 19.1477 16.6477C19.0423 16.7532 18.8992 16.8125 18.75 16.8125H15.75C15.6008 16.8125 15.4577 16.7532 15.3523 16.6477C15.2468 16.5423 15.1875 16.3992 15.1875 16.25C15.1875 16.1008 15.2468 15.9577 15.3523 15.8523C15.4577 15.7468 15.6008 15.6875 15.75 15.6875H18.75C18.8992 15.6875 19.0423 15.7468 19.1477 15.8523C19.2532 15.9577 19.3125 16.1008 19.3125 16.25ZM13.3125 16.25C13.3125 16.3992 13.2532 16.5423 13.1477 16.6477C13.0423 16.7532 12.8992 16.8125 12.75 16.8125H11.25C11.1008 16.8125 10.9577 16.7532 10.8523 16.6477C10.7468 16.5423 10.6875 16.3992 10.6875 16.25C10.6875 16.1008 10.7468 15.9577 10.8523 15.8523C10.9577 15.7468 11.1008 15.6875 11.25 15.6875H12.75C12.8992 15.6875 13.0423 15.7468 13.1477 15.8523C13.2532 15.9577 13.3125 16.1008 13.3125 16.25Z"
                                                                    fill="black" />
                                                            </svg>
                                                            <span>Forex Card</span>
                                                        </li>
                                                        <li value="currency">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="29" height="29" viewBox="0 0 24 25" fill="none">
                                                                <path
                                                                    d="M21 5.1875H3C2.6519 5.1875 2.31806 5.32578 2.07192 5.57192C1.82578 5.81806 1.6875 6.1519 1.6875 6.5V18.5C1.6875 18.8481 1.82578 19.1819 2.07192 19.4281C2.31806 19.6742 2.6519 19.8125 3 19.8125H21C21.3481 19.8125 21.6819 19.6742 21.9281 19.4281C22.1742 19.1819 22.3125 18.8481 22.3125 18.5V6.5C22.3125 6.1519 22.1742 5.81806 21.9281 5.57192C21.6819 5.32578 21.3481 5.1875 21 5.1875ZM3 6.3125H21C21.0497 6.3125 21.0974 6.33225 21.1326 6.36742C21.1677 6.40258 21.1875 6.45027 21.1875 6.5V8.9375H2.8125V6.5C2.8125 6.45027 2.83225 6.40258 2.86742 6.36742C2.90258 6.33225 2.95027 6.3125 3 6.3125ZM21 18.6875H3C2.95027 18.6875 2.90258 18.6677 2.86742 18.6326C2.83225 18.5974 2.8125 18.5497 2.8125 18.5V10.0625H21.1875V18.5C21.1875 18.5497 21.1677 18.5974 21.1326 18.6326C21.0974 18.6677 21.0497 18.6875 21 18.6875ZM19.3125 16.25C19.3125 16.3992 19.2532 16.5423 19.1477 16.6477C19.0423 16.7532 18.8992 16.8125 18.75 16.8125H15.75C15.6008 16.8125 15.4577 16.7532 15.3523 16.6477C15.2468 16.5423 15.1875 16.3992 15.1875 16.25C15.1875 16.1008 15.2468 15.9577 15.3523 15.8523C15.4577 15.7468 15.6008 15.6875 15.75 15.6875H18.75C18.8992 15.6875 19.0423 15.7468 19.1477 15.8523C19.2532 15.9577 19.3125 16.1008 19.3125 16.25ZM13.3125 16.25C13.3125 16.3992 13.2532 16.5423 13.1477 16.6477C13.0423 16.7532 12.8992 16.8125 12.75 16.8125H11.25C11.1008 16.8125 10.9577 16.7532 10.8523 16.6477C10.7468 16.5423 10.6875 16.3992 10.6875 16.25C10.6875 16.1008 10.7468 15.9577 10.8523 15.8523C10.9577 15.7468 11.1008 15.6875 11.25 15.6875H12.75C12.8992 15.6875 13.0423 15.7468 13.1477 15.8523C13.2532 15.9577 13.3125 16.1008 13.3125 16.25Z"
                                                                    fill="black" />
                                                            </svg>
                                                            <span>Currency</span>
                                                        </li>
                                                    </ul>
                                                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="17" viewBox="0 0 16 17" fill="none">
                                                        <path
                                                            d="M13.354 6.85354L8.35403 11.8535C8.30759 11.9 8.25245 11.9369 8.19175 11.9621C8.13105 11.9872 8.06599 12.0002 8.00028 12.0002C7.93457 12.0002 7.86951 11.9872 7.80881 11.9621C7.74811 11.9369 7.69296 11.9 7.64653 11.8535L2.64653 6.85354C2.55271 6.75972 2.5 6.63247 2.5 6.49979C2.5 6.36711 2.55271 6.23986 2.64653 6.14604C2.74035 6.05222 2.8676 5.99951 3.00028 5.99951C3.13296 5.99951 3.26021 6.05222 3.35403 6.14604L8.00028 10.7929L12.6465 6.14604C12.693 6.09958 12.7481 6.06273 12.8088 6.03759C12.8695 6.01245 12.9346 5.99951 13.0003 5.99951C13.066 5.99951 13.131 6.01245 13.1917 6.03759C13.2524 6.06273 13.3076 6.09958 13.354 6.14604C13.4005 6.19249 13.4373 6.24764 13.4625 6.30834C13.4876 6.36904 13.5006 6.43409 13.5006 6.49979C13.5006 6.56549 13.4876 6.63054 13.4625 6.69124C13.4373 6.75193 13.4005 6.80708 13.354 6.85354Z"
                                                            fill="black" />
                                                    </svg>
                                    </div>

                                </div>


                                <div class="mt-4">
                                    <p class="text-black/60 text-xs font-medium ">Choose Currency</p>

                                    <div class="dropdownMain select-none bg-white mt-2" id="cardCurrency" dataval="usa" >

                                        <div class="selectedItem">

                                        </div>

                                        
                                        <ul class="dropdownList overflow-scroll">
    <li value="USD">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">USD</span>
            <span class="text-sm text-black/40 font-normal">United States Dollar</span>
        </div>
    </li>
    <li value="AUD">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">AUD</span>
            <span class="text-sm text-black/40 font-normal">Australian Dollar</span>
        </div>
    </li>
    <li value="GBP">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">GBP</span>
            <span class="text-sm text-black/40 font-normal">British Pound</span>
        </div>
    </li>
    <li value="CAD">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">CAD</span>
            <span class="text-sm text-black/40 font-normal">Canadian Dollar</span>
        </div>
    </li>
    <li value="EUR">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">EUR</span>
            <span class="text-sm text-black/40 font-normal">Euro</span>
        </div>
    </li>
    <li value="JPY">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">JPY</span>
            <span class="text-sm text-black/40 font-normal">Japanese Yen</span>
        </div>
    </li>
    <li value="MYR">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">MYR</span>
            <span class="text-sm text-black/40 font-normal">Malaysian Ringgit</span>
        </div>
    </li>
    <li value="NZD">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">NZD</span>
            <span class="text-sm text-black/40 font-normal">New Zealand Dollar</span>
        </div>
    </li>
    <li value="SGD">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">SGD</span>
            <span class="text-sm text-black/40 font-normal">Singapore Dollar</span>
        </div>
    </li>
    <li value="THB">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">THB</span>
            <span class="text-sm text-black/40 font-normal">Thai Baht</span>
        </div>
    </li>
    <li value="AED">
        <div class="flex flex-col justify-start items-start">
            <span class="font-medium">AED</span>
            <span class="text-sm text-black/40 font-normal">UAE Dirham</span>
        </div>
    </li>
                                                    </ul>
                                        
                                        
                                        <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <path
                                                d="M13.354 6.85354L8.35403 11.8535C8.30759 11.9 8.25245 11.9369 8.19175 11.9621C8.13105 11.9872 8.06599 12.0002 8.00028 12.0002C7.93457 12.0002 7.86951 11.9872 7.80881 11.9621C7.74811 11.9369 7.69296 11.9 7.64653 11.8535L2.64653 6.85354C2.55271 6.75972 2.5 6.63247 2.5 6.49979C2.5 6.36711 2.55271 6.23986 2.64653 6.14604C2.74035 6.05222 2.8676 5.99951 3.00028 5.99951C3.13296 5.99951 3.26021 6.05222 3.35403 6.14604L8.00028 10.7929L12.6465 6.14604C12.693 6.09958 12.7481 6.06273 12.8088 6.03759C12.8695 6.01245 12.9346 5.99951 13.0003 5.99951C13.066 5.99951 13.131 6.01245 13.1917 6.03759C13.2524 6.06273 13.3076 6.09958 13.354 6.14604C13.4005 6.19249 13.4373 6.24764 13.4625 6.30834C13.4876 6.36904 13.5006 6.43409 13.5006 6.49979C13.5006 6.56549 13.4876 6.63054 13.4625 6.69124C13.4373 6.75193 13.4005 6.80708 13.354 6.85354Z"
                                                fill="black" />
                                        </svg>
                                    </div>

                                </div>
                                
                                <div class="mt-4" id="prodAddContainer">
                                    <p class="text-black/60 text-xs font-medium ">Buy <span id="currencyCode">USD</span></p>
                                    <div class="px-3 h-12 flex justify-between items-center border border-gray-300 rounded-lg mt-2 bg-white" id="">
                                                <input id="prodAddAmnt" class="h-full outline-none w-full  text-base font-semibold" value="1000" type="text">


                                    </div>

                                </div>

                                <div class="mt-6 flex justify-start gap-4 items-center">
                                    <div class="text-[#777777] text-xs font-semibold  leading-none">For <span id="prodAddQuantity">1000</span> <span id="ProdAddcurrencyCode">USD</span>  approximate value is
                                    </div>
                                    <div class="text-primary-blue text-base font-bold  leading-none" id="prodAddInrValue">₹ 74,000 INR</div>

                                    <span class="bg-primary-blue text-white p-1 px-4 rounded-lg ml-auto cursor-pointer" id="prodCardAddBtn">Add</span>
                                </div>



                            </div>

                            <div class="prodCardContainer flex flex-col gap-6" >
                                <div class="prodcard  border border-primary-blue rounded-xl hidden" id="prodCardTemplate">
                                    <div class="md:p-10 p-4">
                                        <div class="flex relative">
                                            <div class="flex flex-col gap-4">
                                                <div class="h-8 justify-start items-center gap-1.5 inline-flex">
    
                                                    <div
                                                        class=" text-black text-mediumFont md:text-base font-normal leading-normal flex md:min-w-40 justify-between">
                                                        <span>Product</span> <span>:</span>
                                                    </div>
    
                                                    <div
                                                        class="pl-2 pr-3 py-1 bg-[#0e51a0]/5 rounded-[10px] border justify-center items-center gap-2.5 flex">
                                                        <span 
                                                            class="buyProduct text-[#0e51a0] text-mediumFont md:text-base font-semibold leading-normal"></span>
                                                    </div>
                                                </div>
                                                <div class="h-8 justify-start items-center gap-1.5 inline-flex">
    
                                                    <div
                                                        class=" text-black text-mediumFont md:text-base font-normal leading-normal flex md:min-w-40 justify-between">
                                                        <span>Currency</span> <span>:</span>
                                                    </div>
    
                                                    <div
                                                        class="pl-2 pr-3 py-1 bg-[#0e51a0]/5 rounded-[10px] border justify-center items-center gap-2.5 flex">
                                                        <span
                                                            class="buyCurrency text-[#0e51a0] text-mediumFont md:text-base font-semibold leading-normal"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="absolute right-0 flex justify-end items-start cursor-pointer" id="deleteCard">
    
                                                <div class="flex justify-center items-center gap-1">
                                                    <div class="border-[#b42318]/40 rounded-full border p-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="md:w-4 w-5"
                                                            viewBox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M13.5 3H11V2.5C11 2.10218 10.842 1.72064 10.5607 1.43934C10.2794 1.15804 9.89782 1 9.5 1H6.5C6.10218 1 5.72064 1.15804 5.43934 1.43934C5.15804 1.72064 5 2.10218 5 2.5V3H2.5C2.36739 3 2.24021 3.05268 2.14645 3.14645C2.05268 3.24021 2 3.36739 2 3.5C2 3.63261 2.05268 3.75979 2.14645 3.85355C2.24021 3.94732 2.36739 4 2.5 4H3V13C3 13.2652 3.10536 13.5196 3.29289 13.7071C3.48043 13.8946 3.73478 14 4 14H12C12.2652 14 12.5196 13.8946 12.7071 13.7071C12.8946 13.5196 13 13.2652 13 13V4H13.5C13.6326 4 13.7598 3.94732 13.8536 3.85355C13.9473 3.75979 14 3.63261 14 3.5C14 3.36739 13.9473 3.24021 13.8536 3.14645C13.7598 3.05268 13.6326 3 13.5 3ZM6 2.5C6 2.36739 6.05268 2.24021 6.14645 2.14645C6.24021 2.05268 6.36739 2 6.5 2H9.5C9.63261 2 9.75979 2.05268 9.85355 2.14645C9.94732 2.24021 10 2.36739 10 2.5V3H6V2.5ZM12 13H4V4H12V13ZM7 6.5V10.5C7 10.6326 6.94732 10.7598 6.85355 10.8536C6.75979 10.9473 6.63261 11 6.5 11C6.36739 11 6.24021 10.9473 6.14645 10.8536C6.05268 10.7598 6 10.6326 6 10.5V6.5C6 6.36739 6.05268 6.24021 6.14645 6.14645C6.24021 6.05268 6.36739 6 6.5 6C6.63261 6 6.75979 6.05268 6.85355 6.14645C6.94732 6.24021 7 6.36739 7 6.5ZM10 6.5V10.5C10 10.6326 9.94732 10.7598 9.85355 10.8536C9.75979 10.9473 9.63261 11 9.5 11C9.36739 11 9.24021 10.9473 9.14645 10.8536C9.05268 10.7598 9 10.6326 9 10.5V6.5C9 6.36739 9.05268 6.24021 9.14645 6.14645C9.24021 6.05268 9.36739 6 9.5 6C9.63261 6 9.75979 6.05268 9.85355 6.14645C9.94732 6.24021 10 6.36739 10 6.5Z"
                                                                fill="#B42318" />
                                                        </svg>
                                                    </div>
    
                                                    <span
                                                        class="text-[#b42318] text-sm font-medium leading-normal hidden md:block">Delete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-black text-sm font-normal  leading-[21px] mt-4" id="cardNote"></p>
                                    </div>
    
                                    <div class="border-t border-black/10 " id="errorMarkContainer">
                                        <div class="flex px-4 md:px-10 py-4 justify-between flex-col md:flex-row gap-4">
                                            <div class="w-full md:w-fit">
                                                <p class="text-black text-sm font-normal">Buy <span id="cardCurrencyName"></span> </p>
                                                <input id="currencyInput" type="text"  value="$ 1000"
                                                    class="text-xl buyAmount w-full md:w-fit  font-semibold leading-[30px] text-primary-blue border-b border-black/20 outline-none ">
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <p class="text-black text-sm font-normal ">Total (INR)</p>
                                                <p class="text-black text-xl  font-bold leading-[30px]" id="inrRate">₹ 00000</p>
                                            </div>
    
                                        </div>
    
                                    </div>
    
    
                                </div>
                            </div>
                            

                        </div>


                        <div class="mt-6" id="addBtnContainer">
                            <p class="text-black text-mediumFont md:text-base font-normal leading-normal">Do
                                you want to add another transaction to this order?</p>
                            <div class="flex  md:gap-8 items-center flex-col md:flex-row">
                                <div id="addForexCardBtn"
                                    class="hidden w-full h-10 mt-3 px-3 py-2 rounded-3xl border border-primary-blue/10 justify-center items-center gap-1 inline-flex cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                        fill="none">
                                        <path
                                            d="M14 8.15039C14 8.283 13.9473 8.41018 13.8536 8.50394C13.7598 8.59771 13.6326 8.65039 13.5 8.65039H8.5V13.6504C8.5 13.783 8.44732 13.9102 8.35355 14.0039C8.25979 14.0977 8.13261 14.1504 8 14.1504C7.86739 14.1504 7.74021 14.0977 7.64645 14.0039C7.55268 13.9102 7.5 13.783 7.5 13.6504V8.65039H2.5C2.36739 8.65039 2.24021 8.59771 2.14645 8.50394C2.05268 8.41018 2 8.283 2 8.15039C2 8.01778 2.05268 7.89061 2.14645 7.79684C2.24021 7.70307 2.36739 7.65039 2.5 7.65039H7.5V2.65039C7.5 2.51778 7.55268 2.39061 7.64645 2.29684C7.74021 2.20307 7.86739 2.15039 8 2.15039C8.13261 2.15039 8.25979 2.20307 8.35355 2.29684C8.44732 2.39061 8.5 2.51778 8.5 2.65039V7.65039H13.5C13.6326 7.65039 13.7598 7.70307 13.8536 7.79684C13.9473 7.89061 14 8.01778 14 8.15039Z"
                                            fill="#0E51A0" />
                                    </svg>
                                    <p class="text-primary-blue text-xs font-semibold ">Add Another Forex Card</p>
                                </div>

                                <div id="addCurrencyCardBtn"
                                    class="w-full h-10 mt-2 px-3 py-2 rounded-3xl border border-primary-blue/10 justify-center items-center gap-1 inline-flex cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                        fill="none">
                                        <path
                                            d="M14 8.15039C14 8.283 13.9473 8.41018 13.8536 8.50394C13.7598 8.59771 13.6326 8.65039 13.5 8.65039H8.5V13.6504C8.5 13.783 8.44732 13.9102 8.35355 14.0039C8.25979 14.0977 8.13261 14.1504 8 14.1504C7.86739 14.1504 7.74021 14.0977 7.64645 14.0039C7.55268 13.9102 7.5 13.783 7.5 13.6504V8.65039H2.5C2.36739 8.65039 2.24021 8.59771 2.14645 8.50394C2.05268 8.41018 2 8.283 2 8.15039C2 8.01778 2.05268 7.89061 2.14645 7.79684C2.24021 7.70307 2.36739 7.65039 2.5 7.65039H7.5V2.65039C7.5 2.51778 7.55268 2.39061 7.64645 2.29684C7.74021 2.20307 7.86739 2.15039 8 2.15039C8.13261 2.15039 8.25979 2.20307 8.35355 2.29684C8.44732 2.39061 8.5 2.51778 8.5 2.65039V7.65039H13.5C13.6326 7.65039 13.7598 7.70307 13.8536 7.79684C13.9473 7.89061 14 8.01778 14 8.15039Z"
                                            fill="#0E51A0" />
                                    </svg>
                                    <p class="text-primary-blue text-xs font-semibold ">Add Another Currency</p>
                                </div>
                            </div>

                        </div>


                    </div>
                    
                    <div class="md:static fixed  left-1/2  transform -translate-x-1/2   md:translate-x-0 md:translate-y-0 bottom-0 w-full md:w-1/3 mt-2  md:mt-0 bg-white md:h-full px-5 sm:px-12 md:px-0 pb-4 md:pb-0">
                        <div class="  rounded-2xl border border-black/10 w-full">
                        <div
                            class="w-full h-10 customGradient3  rounded-tl-2xl z-20 rounded-tr-xl justify-center items-center inline-flex">
                            <div
                                class="grow shrink basis-0 self-stretch px-3 py-1 justify-start items-center gap-1.5 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"
                                    fill="none">
                                    <path
                                        d="M17.5769 6.47083C17.3387 6.35406 17.0686 6.31905 16.8085 6.37121C16.5483 6.42338 16.3126 6.55981 16.1378 6.75941L13.5741 9.52261L10.8482 3.40916C10.8481 3.40662 10.8481 3.40408 10.8482 3.40154C10.7508 3.19013 10.5947 3.01107 10.3987 2.88557C10.2026 2.76006 9.97468 2.69336 9.74188 2.69336C9.50908 2.69336 9.28115 2.76006 9.08508 2.88557C8.88901 3.01107 8.73301 3.19013 8.63554 3.40154C8.63566 3.40408 8.63566 3.40662 8.63554 3.40916L5.90965 9.52261L3.34594 6.75941C3.17003 6.55977 2.93359 6.42322 2.67276 6.37061C2.41193 6.31801 2.14105 6.35224 1.9015 6.46809C1.66196 6.58393 1.46693 6.77501 1.34621 7.01214C1.2255 7.24926 1.18573 7.51939 1.233 7.78124C1.233 7.78961 1.233 7.79723 1.23833 7.8056L2.96523 15.7145C3.01839 15.993 3.16702 16.2442 3.38551 16.4249C3.604 16.6056 3.87866 16.7044 4.16219 16.7043H15.3223C15.6057 16.7042 15.8802 16.6053 16.0985 16.4247C16.3169 16.244 16.4654 15.9929 16.5185 15.7145L18.2454 7.8056C18.2454 7.79723 18.2454 7.78961 18.2508 7.78124C18.2989 7.51906 18.2589 7.24831 18.137 7.01126C18.0151 6.7742 17.8182 6.58417 17.5769 6.47083ZM15.3269 15.4617L15.3223 15.4861H4.16142L4.15686 15.4617L2.43224 7.56728L2.4429 7.57946L5.64087 11.0241C5.70934 11.0981 5.79512 11.154 5.8905 11.1867C5.98587 11.2193 6.08787 11.2278 6.18734 11.2114C6.28681 11.1949 6.38064 11.154 6.46041 11.0924C6.54019 11.0307 6.60341 10.9502 6.64442 10.8581L9.74188 3.91246L12.8401 10.8604C12.8811 10.9525 12.9443 11.033 13.0241 11.0947C13.1039 11.1563 13.1977 11.1972 13.2972 11.2137C13.3967 11.2301 13.4987 11.2216 13.594 11.1889C13.6894 11.1563 13.7752 11.1004 13.8437 11.0264L17.0416 7.58175L17.0515 7.56728L15.3269 15.4617Z"
                                        fill="white" />
                                </svg>
                                <p class="text-white text-xs font-bold ">We Promise the Best Rates in the Forex market.
                                </p>
                            </div>
                        </div>
                        <div class="px-4 mt-6 flex justify-between flex-col h-full">
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


                            <div class="bg-white py-4 rounded-t-3xl   w-full flex items-center justify-center flex-col">
                            <div class=" h-12 px-2 py-3 cursor-pointer bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-4 md:mt-20 mb-0 md:mb-4   z-10 w-full"
                                id="bestRatesFetchBtn">
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
                    </div>
                    
                    







                </div>
                <div class="moneyT flex flex-col px-5 sm:px-12 md:px-16 py-5">


                    <div class="flex items-center bg-[#20bc73]/5 px-4 py-2 gap-4 rounded-lg max-w-[34rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                            <g clip-path="url(#clip0_1338_22482)">
                                <mask id="mask0_1338_22482" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0"
                                    y="0" width="32" height="33">
                                    <path d="M0 0.563965H32V32.564H0V0.563965Z" fill="white" />
                                </mask>
                                <g mask="url(#mask0_1338_22482)">
                                    <path
                                        d="M10.6325 7.71184C10.539 7.80912 10.4627 7.9216 10.4068 8.04447L10.4001 8.03774L0.955052 29.3135L0.964314 29.3228C0.789157 29.6622 1.08221 30.3527 1.68263 30.9539C2.28221 31.5535 2.97274 31.8466 3.3121 31.6714L3.32053 31.6798L24.598 22.2356L24.5913 22.2281C24.7159 22.1691 24.8287 22.0975 24.9239 22.0024C26.2393 20.687 24.1062 16.4217 20.1601 12.4756C16.214 8.52868 11.9479 6.39647 10.6325 7.71184Z"
                                        fill="#DD2E44" />
                                    <path
                                        d="M11.7896 11.5113L1.19252 28.7795L0.955051 29.3142L0.964314 29.3226C0.789157 29.6629 1.08221 30.3525 1.68263 30.9538C1.86319 31.1323 2.0635 31.2897 2.27968 31.4229L15.158 15.7218L11.7896 11.5113Z"
                                        fill="#EA596E" />
                                    <path
                                        d="M20.2179 12.4088C24.1505 16.3431 26.3341 20.5368 25.0928 21.7772C23.8524 23.0176 19.6587 20.8349 15.7236 16.9023C11.7901 12.9679 9.60736 8.77342 10.8478 7.53216C12.089 6.29174 16.2827 8.47532 20.2179 12.4088Z"
                                        fill="#A0041E" />
                                    <path
                                        d="M16.4957 12.8675C16.4098 12.9371 16.3109 12.989 16.2048 13.0201C16.0987 13.0512 15.9875 13.0608 15.8776 13.0485C15.1466 12.9694 14.5319 12.715 14.1016 12.3134C13.646 11.8881 13.4212 11.318 13.4826 10.7454C13.5904 9.74157 14.5976 8.82031 16.3146 9.00641C16.9824 9.07799 17.2805 8.86326 17.2898 8.76052C17.3016 8.65863 17.0565 8.38494 16.3896 8.31252C15.6578 8.23336 15.0439 7.97905 14.6127 7.57736C14.1572 7.1521 13.9315 6.58115 13.9938 6.00936C14.1033 5.00557 15.1096 4.08431 16.8249 4.27041C17.3117 4.32263 17.5677 4.22157 17.6763 4.15673C17.7639 4.10368 17.7984 4.05315 17.8018 4.02452C17.811 3.92262 17.5694 3.64894 16.8999 3.57652C16.6813 3.5484 16.4824 3.43571 16.346 3.26263C16.2095 3.08954 16.1464 2.86987 16.1701 2.65075C16.1938 2.43163 16.3025 2.23054 16.4727 2.09063C16.643 1.95072 16.8614 1.88315 17.0809 1.90241C18.7963 2.08684 19.5845 3.20094 19.4759 4.20557C19.3673 5.20936 18.3609 6.12978 16.6439 5.94452C16.1572 5.89147 15.902 5.99252 15.7934 6.05736C15.7066 6.11041 15.6713 6.16178 15.6679 6.18957C15.6569 6.29231 15.9003 6.56599 16.5698 6.63841C18.2852 6.82284 19.0734 7.93694 18.9647 8.94157C18.8561 9.94536 17.8489 10.8666 16.1336 10.6805C15.6468 10.6283 15.3908 10.7285 15.2814 10.7934C15.1946 10.8464 15.1609 10.8978 15.1576 10.9264C15.1466 11.0283 15.39 11.302 16.0586 11.3744C16.2246 11.3917 16.3816 11.4579 16.5098 11.5647C16.638 11.6715 16.7315 11.8141 16.7783 11.9742C16.8252 12.1344 16.8234 12.3048 16.773 12.4639C16.7227 12.623 16.6261 12.7635 16.4957 12.8675Z"
                                        fill="#AA8DD8" />
                                    <path
                                        d="M26.6605 20.654C28.322 20.1849 29.4681 20.926 29.7409 21.8986C30.0138 22.8704 29.4226 24.1007 27.7628 24.5672C27.1144 24.7491 26.9199 25.059 26.946 25.1584C26.9746 25.2578 27.3039 25.4211 27.9506 25.2375C29.6112 24.771 30.7573 25.5121 31.0302 26.4839C31.3056 27.4565 30.7127 28.6851 29.0512 29.1533C28.4037 29.3352 28.2083 29.646 28.2369 29.7445C28.2647 29.843 28.5931 30.0055 29.2407 29.8245C29.3481 29.7913 29.4611 29.7799 29.573 29.7911C29.6849 29.8023 29.7935 29.8357 29.8922 29.8895C29.991 29.9433 30.078 30.0163 30.148 30.1043C30.2181 30.1922 30.2699 30.2933 30.3002 30.4016C30.3306 30.5099 30.339 30.6231 30.3249 30.7347C30.3108 30.8462 30.2745 30.9539 30.2181 31.0512C30.1617 31.1485 30.0864 31.2335 29.9967 31.3012C29.9069 31.369 29.8045 31.418 29.6954 31.4455C28.0365 31.9129 26.8887 31.1735 26.6142 30.2001C26.3413 29.2283 26.9333 27.9997 28.5957 27.5314C29.2432 27.3487 29.4386 27.0397 29.41 26.9403C29.3822 26.8418 29.0546 26.6775 28.407 26.8594C26.7456 27.3277 25.5994 26.5883 25.3258 25.6148C25.0521 24.6422 25.6441 23.4135 27.3064 22.9453C27.9523 22.7643 28.1477 22.4527 28.1199 22.355C28.0912 22.2548 27.7645 22.0914 27.1161 22.2742C27.0083 22.3089 26.8946 22.3215 26.7819 22.3112C26.6691 22.301 26.5596 22.2681 26.4598 22.2145C26.3601 22.161 26.2721 22.0878 26.2013 21.9995C26.1304 21.9112 26.0781 21.8095 26.0474 21.7005C26.0168 21.5915 26.0084 21.4775 26.0229 21.3651C26.0373 21.2528 26.0743 21.1446 26.1315 21.0469C26.1887 20.9492 26.2651 20.8641 26.356 20.7965C26.4469 20.729 26.5504 20.6805 26.6605 20.654Z"
                                        fill="#77B255" />
                                    <path
                                        d="M20.209 18.3828C20.0346 18.3826 19.8646 18.3283 19.7224 18.2273C19.5801 18.1264 19.4727 17.9839 19.4149 17.8194C19.3571 17.6549 19.3517 17.4765 19.3995 17.3088C19.4473 17.1411 19.5459 16.9923 19.6818 16.883C19.8654 16.7357 24.2443 13.2965 30.433 14.1815C30.5424 14.1971 30.6477 14.2341 30.7429 14.2905C30.838 14.3468 30.9211 14.4213 30.9874 14.5097C31.0538 14.5982 31.102 14.6989 31.1294 14.806C31.1568 14.9131 31.1628 15.0245 31.1471 15.134C31.1319 15.2437 31.0952 15.3493 31.0389 15.4447C30.9827 15.5402 30.9081 15.6235 30.8194 15.6899C30.7308 15.7563 30.6298 15.8045 30.5225 15.8316C30.4151 15.8588 30.3034 15.8644 30.1938 15.8481C24.726 15.0717 20.7732 18.1672 20.7345 18.1984C20.5855 18.318 20.4 18.3831 20.209 18.3828Z"
                                        fill="#AA8DD8" />
                                    <path
                                        d="M5.68424 14.8799C5.55289 14.8799 5.42335 14.8493 5.30597 14.7903C5.18859 14.7313 5.08663 14.6457 5.00824 14.5404C4.92985 14.435 4.8772 14.3127 4.8545 14.1833C4.8318 14.0539 4.83968 13.921 4.87751 13.7953C5.83161 10.618 6.69645 5.54767 5.63372 4.22641C5.51414 4.07651 5.33561 3.92914 4.92466 3.9603C4.13393 4.02009 4.20972 5.68746 4.21056 5.7043C4.22126 5.81587 4.20957 5.92844 4.1762 6.03543C4.14283 6.14242 4.08843 6.24168 4.0162 6.32737C3.94398 6.41307 3.85537 6.48349 3.75558 6.5345C3.65578 6.58551 3.54681 6.61608 3.43505 6.62443C3.32329 6.63279 3.21098 6.61874 3.10471 6.58313C2.99845 6.54752 2.90036 6.49105 2.8162 6.41704C2.73204 6.34303 2.66349 6.25296 2.61459 6.15212C2.56569 6.05128 2.5374 5.94169 2.5314 5.82978C2.44382 4.66851 2.80593 2.43188 4.79751 2.28114C5.68677 2.21378 6.4253 2.52283 6.9474 3.17125C8.94403 5.6563 6.91709 12.8614 6.49014 14.2803C6.43804 14.4536 6.33152 14.6054 6.18637 14.7134C6.04123 14.8214 5.86516 14.8798 5.68424 14.8799Z"
                                        fill="#77B255" />
                                    <path
                                        d="M23.5779 9.40628C23.5779 9.57221 23.5451 9.73651 23.4816 9.88979C23.418 10.0431 23.3249 10.1823 23.2075 10.2996C23.0902 10.4169 22.9508 10.51 22.7975 10.5734C22.6442 10.6369 22.4799 10.6695 22.3139 10.6694C22.148 10.6694 21.9837 10.6366 21.8304 10.5731C21.6771 10.5095 21.5379 10.4164 21.4206 10.299C21.3033 10.1817 21.2103 10.0423 21.1468 9.88902C21.0834 9.73569 21.0507 9.57137 21.0508 9.40543C21.0509 9.07031 21.1841 8.74896 21.4212 8.51207C21.6582 8.27518 21.9797 8.14216 22.3148 8.14228C22.6499 8.14239 22.9713 8.27562 23.2081 8.51267C23.445 8.74971 23.5781 9.07115 23.5779 9.40628Z"
                                        fill="#5C913B" />
                                    <path
                                        d="M4.20911 16.5638C4.20905 16.7851 4.16542 17.0041 4.08071 17.2085C3.996 17.4129 3.87186 17.5985 3.71539 17.7549C3.55892 17.9113 3.37318 18.0354 3.16877 18.12C2.96436 18.2046 2.74528 18.2481 2.52405 18.248C2.30283 18.248 2.08377 18.2044 1.87941 18.1197C1.67504 18.0349 1.48936 17.9108 1.33296 17.7543C1.17657 17.5979 1.05253 17.4121 0.967918 17.2077C0.883308 17.0033 0.839789 16.7842 0.839844 16.563C0.839955 16.1162 1.01755 15.6878 1.33356 15.3719C1.64957 15.0561 2.0781 14.8787 2.5249 14.8788C2.97169 14.8789 3.40014 15.0565 3.71599 15.3725C4.03184 15.6885 4.20922 16.117 4.20911 16.5638Z"
                                        fill="#9266CC" />
                                    <path
                                        d="M29.4723 17.8272C29.4722 17.9931 29.4395 18.1574 29.3759 18.3107C29.3124 18.464 29.2193 18.6032 29.1019 18.7205C28.9845 18.8378 28.8452 18.9309 28.6919 18.9943C28.5385 19.0578 28.3742 19.0904 28.2083 19.0903C28.0424 19.0903 27.8781 19.0575 27.7248 18.994C27.5715 18.9304 27.4322 18.8373 27.3149 18.7199C27.1976 18.6026 27.1046 18.4632 27.0412 18.3099C26.9777 18.1566 26.9451 17.9923 26.9451 17.8263C26.9452 17.4912 27.0785 17.1699 27.3155 16.933C27.5526 16.6961 27.874 16.5631 28.2091 16.5632C28.5443 16.5633 28.8656 16.6965 29.1025 16.9336C29.3394 17.1706 29.4724 17.4921 29.4723 17.8272Z"
                                        fill="#5C913B" />
                                    <path
                                        d="M21.8943 27.9322C21.8943 28.0981 21.8616 28.2624 21.798 28.4157C21.7344 28.569 21.6413 28.7082 21.524 28.8255C21.4066 28.9428 21.2673 29.0358 21.1139 29.0993C20.9606 29.1627 20.7963 29.1954 20.6303 29.1953C20.4644 29.1953 20.3001 29.1625 20.1468 29.099C19.9935 29.0354 19.8543 28.9423 19.737 28.8249C19.6197 28.7075 19.5267 28.5682 19.4632 28.4149C19.3998 28.2616 19.3671 28.0972 19.3672 27.9313C19.3673 27.5962 19.5005 27.2748 19.7376 27.038C19.9746 26.8011 20.2961 26.668 20.6312 26.6682C20.9663 26.6683 21.2877 26.8015 21.5245 27.0385C21.7614 27.2756 21.8945 27.597 21.8943 27.9322Z"
                                        fill="#5C913B" />
                                    <path
                                        d="M26.1038 4.77477C26.1038 4.996 26.0601 5.21505 25.9754 5.41942C25.8907 5.62379 25.7666 5.80947 25.6101 5.96586C25.4536 6.12226 25.2679 6.2463 25.0635 6.33091C24.8591 6.41552 24.64 6.45904 24.4188 6.45898C24.1975 6.45893 23.9785 6.4153 23.7741 6.33059C23.5698 6.24588 23.3841 6.12174 23.2277 5.96527C23.0713 5.8088 22.9472 5.62305 22.8626 5.41864C22.778 5.21423 22.7345 4.99516 22.7346 4.77393C22.7347 4.32714 22.9123 3.89869 23.2283 3.58284C23.5443 3.26699 23.9728 3.08961 24.4196 3.08972C24.8664 3.08983 25.2949 3.26743 25.6107 3.58344C25.9266 3.89944 26.1039 4.32798 26.1038 4.77477Z"
                                        fill="#FFCC4D" />
                                    <path
                                        d="M29.4723 8.56399C29.4722 8.72993 29.4395 8.89423 29.3759 9.04751C29.3124 9.20079 29.2193 9.34006 29.1019 9.45735C28.9845 9.57465 28.8452 9.66768 28.6919 9.73113C28.5385 9.79458 28.3742 9.8272 28.2083 9.82715C28.0424 9.82709 27.8781 9.79435 27.7248 9.7308C27.5715 9.66725 27.4322 9.57413 27.3149 9.45676C27.1976 9.33938 27.1046 9.20006 27.0412 9.04673C26.9777 8.89341 26.9451 8.72908 26.9451 8.56315C26.9452 8.22803 27.0785 7.90667 27.3155 7.66979C27.5526 7.4329 27.874 7.29988 28.2091 7.29999C28.5443 7.3001 28.8656 7.43334 29.1025 7.67038C29.3394 7.90743 29.4724 8.22887 29.4723 8.56399Z"
                                        fill="#FFCC4D" />
                                    <path
                                        d="M26.9451 11.9322C26.9451 12.0981 26.9123 12.2624 26.8488 12.4157C26.7852 12.569 26.6921 12.7082 26.5747 12.8255C26.4574 12.9428 26.318 13.0358 26.1647 13.0993C26.0114 13.1627 25.8471 13.1954 25.6811 13.1953C25.5152 13.1953 25.3509 13.1625 25.1976 13.099C25.0443 13.0354 24.9051 12.9423 24.7878 12.8249C24.6705 12.7075 24.5774 12.5682 24.514 12.4149C24.4505 12.2616 24.4179 12.0972 24.418 11.9313C24.4181 11.5962 24.5513 11.2748 24.7884 11.038C25.0254 10.8011 25.3468 10.668 25.682 10.6682C26.0171 10.6683 26.3384 10.8015 26.5753 11.0385C26.8122 11.2756 26.9452 11.597 26.9451 11.9322Z"
                                        fill="#FFCC4D" />
                                    <path
                                        d="M8.41778 21.1958C8.41773 21.3618 8.38499 21.5261 8.32144 21.6793C8.25789 21.8326 8.16476 21.9719 8.04739 22.0892C7.93002 22.2065 7.79069 22.2995 7.63737 22.363C7.48404 22.4264 7.31972 22.459 7.15378 22.459C6.98785 22.4589 6.82355 22.4262 6.67026 22.3626C6.51698 22.2991 6.37772 22.206 6.26042 22.0886C6.14313 21.9712 6.0501 21.8319 5.98665 21.6786C5.9232 21.5252 5.89057 21.3609 5.89063 21.195C5.89074 20.8599 6.02397 20.5385 6.26102 20.3016C6.49806 20.0647 6.8195 19.9317 7.15463 19.9318C7.48975 19.9319 7.8111 20.0652 8.04799 20.3022C8.28487 20.5393 8.41789 20.8607 8.41778 21.1958Z"
                                        fill="#FFCC4D" />
                                </g>
                            </g>
                            <defs>
                                <clipPath id="clip0_1338_22482">
                                    <rect width="32" height="32" fill="white" transform="translate(0 0.563965)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="leading-[21px] text-[#20bc73] text-sm font-normal">You saved approximately
                            <b id="mtSavings"></b> on this transfer!
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path
                                d="M12 2.81396C10.0716 2.81396 8.18657 3.38579 6.58319 4.45714C4.97982 5.52848 3.73013 7.05122 2.99218 8.8328C2.25422 10.6144 2.06114 12.5748 2.43735 14.4661C2.81355 16.3574 3.74215 18.0947 5.10571 19.4583C6.46928 20.8218 8.20656 21.7504 10.0979 22.1266C11.9892 22.5028 13.9496 22.3097 15.7312 21.5718C17.5127 20.8338 19.0355 19.5842 20.1068 17.9808C21.1782 16.3774 21.75 14.4923 21.75 12.564C21.7473 9.97894 20.7192 7.50058 18.8913 5.67269C17.0634 3.8448 14.585 2.81669 12 2.81396ZM12 20.814C10.3683 20.814 8.77326 20.3301 7.41655 19.4236C6.05984 18.5171 5.00242 17.2286 4.378 15.7211C3.75358 14.2136 3.5902 12.5548 3.90853 10.9545C4.22685 9.35413 5.01259 7.88412 6.16637 6.73033C7.32016 5.57655 8.79017 4.79081 10.3905 4.47249C11.9909 4.15416 13.6497 4.31754 15.1571 4.94196C16.6646 5.56638 17.9531 6.6238 18.8596 7.98051C19.7661 9.33722 20.25 10.9323 20.25 12.564C20.2475 14.7512 19.3775 16.8482 17.8309 18.3949C16.2843 19.9415 14.1873 20.8115 12 20.814ZM13.5 17.064C13.5 17.2629 13.421 17.4536 13.2803 17.5943C13.1397 17.7349 12.9489 17.814 12.75 17.814C12.3522 17.814 11.9706 17.6559 11.6893 17.3746C11.408 17.0933 11.25 16.7118 11.25 16.314V12.564C11.0511 12.564 10.8603 12.4849 10.7197 12.3443C10.579 12.2036 10.5 12.0129 10.5 11.814C10.5 11.6151 10.579 11.4243 10.7197 11.2836C10.8603 11.143 11.0511 11.064 11.25 11.064C11.6478 11.064 12.0294 11.222 12.3107 11.5033C12.592 11.7846 12.75 12.1661 12.75 12.564V16.314C12.9489 16.314 13.1397 16.393 13.2803 16.5336C13.421 16.6743 13.5 16.8651 13.5 17.064ZM10.5 8.43896C10.5 8.21646 10.566 7.99895 10.6896 7.81395C10.8132 7.62894 10.9889 7.48475 11.1945 7.3996C11.4001 7.31445 11.6263 7.29217 11.8445 7.33558C12.0627 7.37899 12.2632 7.48614 12.4205 7.64347C12.5778 7.8008 12.685 8.00126 12.7284 8.21949C12.7718 8.43772 12.7495 8.66392 12.6644 8.86948C12.5792 9.07505 12.435 9.25075 12.25 9.37437C12.065 9.49798 11.8475 9.56396 11.625 9.56396C11.3266 9.56396 11.0405 9.44544 10.8295 9.23446C10.6185 9.02348 10.5 8.73733 10.5 8.43896Z"
                                fill="#20BC73" />
                        </svg>
                    </div>

                    <div class="flex justify-center flex-col">
                        <p class="text-black text-base font-bold mt-4">Choose Your Exchange Center</p>

                        <!-- The template card (hidden initially) -->
<div id="mtcardTemplate" class="mtCard flex flex-col border border-black/10 p-2 rounded-3xl" style="display: none;">
    <div class="px-4 flex flex-col justify-center items-start border-b border-black/10 pb-3">
        <img src="" alt="Bank Logo" class="bank-logo " style="width:auto; height:32px;">
        <p class="text-black text-lg mt-2 font-semibold bank-name"></p>

        

        <div class="flex justify-between items-end w-full">

            <div>
                <!--<div class="flex justify-start items-center gap-2 mt-6">-->
                <!--    <span class="text-sm">Payments:</span>-->
                <!--    <span class="bg-black/5 rounded-[20px] font-medium px-2 py-1 text-sm payment-method1"></span>-->
                <!--    <span class="bg-black/5 rounded-[20px] font-medium px-2 py-1 text-sm payment-method2"></span>-->
                <!--</div>-->
    
                <p class="text-black/40 text-xs font-normal mt-3 supported-services"></p>
            </div>


            
        </div>
        
        
        

        
    </div>

    <div class="px-4 flex justify-between items-center mt-4 flex-col w-full customMd:flex-row">
        <div class="flex justify-between items-center w-full">
            <div class="flex flex-col ">
                <p class="text-black/40 text-xs font-normal">Bank Charges</p>
                <p class="text-black text-xs font-normal bank-charges"></p>
            </div>
    
            <div class="flex flex-col ml-auto mr-8">
                <div class="text-black/40 text-xs font-normal">TOTAL AMOUNT</div>
                <div class="text-black text-lg font-bold leading-[27px] total-amount"></div>
            </div>
        </div>
        

        <div class="select-button cursor-pointer customMd:max-w-[10rem] h-10 pl-4 pr-2.5 py-2.5 bg-[#0e51a0] rounded-[20px] justify-center items-center gap-0.5 inline-flex mt-4 w-full">
            <div class="text-white text-sm font-medium">Select</div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9.53104 3.96896L17.031 11.469C17.1008 11.5386 17.1561 11.6213 17.1938 11.7124C17.2316 11.8034 17.251 11.901 17.251 11.9996C17.251 12.0981 17.2316 12.1957 17.1938 12.2868C17.1561 12.3778 17.1008 12.4606 17.031 12.5302L9.53104 20.0302C9.39031 20.1709 9.19944 20.25 9.00042 20.25C8.80139 20.25 8.61052 20.1709 8.46979 20.0302C8.32906 19.8895 8.25 19.6986 8.25 19.4996C8.25 19.3006 8.32906 19.1097 8.46979 18.969L15.4401 11.9996L8.46979 5.03021C8.40011 4.96052 8.34483 4.8778 8.30712 4.78675C8.26941 4.69571 8.25 4.59813 8.25 4.49958C8.25 4.40104 8.26941 4.30345 8.30712 4.21241C8.34483 4.12136 8.40011 4.03864 8.46979 3.96896C8.53947 3.89927 8.6222 3.844 8.71324 3.80629C8.80429 3.76858 8.90187 3.74916 9.00042 3.74916C9.09896 3.74916 9.19654 3.76858 9.28759 3.80629C9.37863 3.844 9.46136 3.89927 9.53104 3.96896Z" fill="white"/>
            </svg>
        </div>

        
    </div>

    
    
</div>

<!-- The container for dynamically inserted cards -->
<div id="mtcardContainer" class="mtCardContainer mt-4 flex flex-col gap-8 "></div>


                        <div class="bg-primary-blue/5 py-4 mt-6 rounded-lg">
                            <div class="flex justify-between px-6 items-center">
                                <p class="text-[#0e51a0] text-base font-semibold font-['Plus Jakarta Sans'] leading-normal">The ExTravelMoney <br/>Customer Advantage</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="40" viewBox="0 0 80 40" fill="none">
                                    <g clip-path="url(#clip0_1338_22590)">
                                      <path d="M25.3937 22.0864L36.0932 37.7418H23.6142L20.0481 31.5008" fill="white"/>
                                      <path d="M13.092 19.4819L0.612976 37.7414H13.092L23.5258 19.4819L13.5196 1.5332H1.12579L13.092 19.4819Z" fill="white"/>
                                      <path d="M61.5963 0.769043C49.9276 0.769043 42.2476 8.2275 42.2476 19.8963C42.2476 31.565 50.3707 38.5065 60.9317 38.5065H61.0055C70.6065 38.5065 79.9862 32.4521 79.9862 19.3055C79.9862 8.3752 72.6004 0.769043 61.5963 0.769043Z" fill="white"/>
                                      <path d="M70.3469 13.9248L70.3449 13.9258C70.0413 13.9792 69.7777 14.0428 69.6013 14.1125L67.4598 14.9464L65.8679 15.5669L57.7059 18.7495L56.6505 19.1597L53.0648 20.5608L49.9315 17.8858L47.509 18.8305L52.2218 25.3535L58.1521 23.2048V23.05L58.1562 30.4531L60.8248 29.3587L66.9777 18.1402L68.1162 17.5064L67.1541 19.6151L68.5541 18.9935L70.6813 18.1618L70.8587 18.092L75.8956 16.091C75.8956 16.091 73.5325 12.7874 70.3469 13.9248Z" fill="#F3F6FA"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_1338_22590">
                                        <rect width="80" height="38.4615" fill="white" transform="translate(0 0.769043)"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                            </div>

                            <div class="flex px-6 mt-4 gap-6 items-center">
                                <div class="bg-white/50 p-4 rounded-full">
                                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M2.25 9.87844H4.5V15.8784H3C2.80109 15.8784 2.61032 15.9575 2.46967 16.0981C2.32902 16.2388 2.25 16.4295 2.25 16.6284C2.25 16.8274 2.32902 17.0181 2.46967 17.1588C2.61032 17.2994 2.80109 17.3784 3 17.3784H21C21.1989 17.3784 21.3897 17.2994 21.5303 17.1588C21.671 17.0181 21.75 16.8274 21.75 16.6284C21.75 16.4295 21.671 16.2388 21.5303 16.0981C21.3897 15.9575 21.1989 15.8784 21 15.8784H19.5V9.87844H21.75C21.9132 9.87828 22.0719 9.82489 22.202 9.72639C22.3321 9.62789 22.4265 9.48964 22.4709 9.33261C22.5153 9.17559 22.5073 9.00837 22.4481 8.8563C22.3889 8.70424 22.2817 8.57564 22.1428 8.49L12.3928 2.49C12.2747 2.41736 12.1387 2.37891 12 2.37891C11.8613 2.37891 11.7253 2.41736 11.6072 2.49L1.85719 8.49C1.71828 8.57564 1.61108 8.70424 1.55187 8.8563C1.49266 9.00837 1.48466 9.17559 1.52908 9.33261C1.57351 9.48964 1.66793 9.62789 1.79803 9.72639C1.92814 9.82489 2.08681 9.87828 2.25 9.87844ZM6 9.87844H9V15.8784H6V9.87844ZM13.5 9.87844V15.8784H10.5V9.87844H13.5ZM18 15.8784H15V9.87844H18V15.8784ZM12 4.00875L19.1006 8.37844H4.89937L12 4.00875ZM23.25 19.6284C23.25 19.8274 23.171 20.0181 23.0303 20.1588C22.8897 20.2994 22.6989 20.3784 22.5 20.3784H1.5C1.30109 20.3784 1.11032 20.2994 0.96967 20.1588C0.829018 20.0181 0.75 19.8274 0.75 19.6284C0.75 19.4295 0.829018 19.2388 0.96967 19.0981C1.11032 18.9575 1.30109 18.8784 1.5 18.8784H22.5C22.6989 18.8784 22.8897 18.9575 23.0303 19.0981C23.171 19.2388 23.25 19.4295 23.25 19.6284Z" fill="black"/>
                                      </svg>
                                </div>
                                
                                    
                                    <p class="text-black text-xs font-normal font-['Plus Jakarta Sans'] leading-[18px]"> Minimum 5% Savings from <br> <b>Normal Bank Rates</b></p>
                             </div>

                             <div class="flex px-6 mt-4 gap-6 items-center border-t-white  border-2 py-4 border-b-white border-l-0 border-r-0">
                                <div class="bg-white/50 p-4 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M18.9272 5.25279C18.03 4.34658 16.9629 3.62624 15.7869 3.13302C14.611 2.63979 13.3493 2.38336 12.0741 2.37842H12C9.41414 2.37842 6.93419 3.40565 5.10571 5.23413C3.27723 7.06261 2.25 9.54256 2.25 12.1284V17.3784C2.25 17.9752 2.48705 18.5475 2.90901 18.9694C3.33097 19.3914 3.90326 19.6284 4.5 19.6284H6C6.59674 19.6284 7.16903 19.3914 7.59099 18.9694C8.01295 18.5475 8.25 17.9752 8.25 17.3784V13.6284C8.25 13.0317 8.01295 12.4594 7.59099 12.0374C7.16903 11.6155 6.59674 11.3784 6 11.3784H3.78375C3.92839 9.81461 4.51578 8.32442 5.47709 7.08252C6.43839 5.84061 7.73377 4.89845 9.21141 4.36645C10.689 3.83445 12.2877 3.73466 13.82 4.07877C15.3524 4.42288 16.7548 5.19664 17.8631 6.30936C19.2177 7.67089 20.0509 9.46504 20.2172 11.3784H18C17.4033 11.3784 16.831 11.6155 16.409 12.0374C15.9871 12.4594 15.75 13.0317 15.75 13.6284V17.3784C15.75 17.9752 15.9871 18.5475 16.409 18.9694C16.831 19.3914 17.4033 19.6284 18 19.6284H20.25C20.25 20.2252 20.0129 20.7975 19.591 21.2194C19.169 21.6414 18.5967 21.8784 18 21.8784H12.75C12.5511 21.8784 12.3603 21.9574 12.2197 22.0981C12.079 22.2387 12 22.4295 12 22.6284C12 22.8273 12.079 23.0181 12.2197 23.1587C12.3603 23.2994 12.5511 23.3784 12.75 23.3784H18C18.9946 23.3784 19.9484 22.9833 20.6517 22.2801C21.3549 21.5768 21.75 20.623 21.75 19.6284V12.1284C21.7549 10.853 21.5081 9.58919 21.0237 8.40935C20.5393 7.2295 19.8268 6.15683 18.9272 5.25279ZM6 12.8784C6.19891 12.8784 6.38968 12.9574 6.53033 13.0981C6.67098 13.2387 6.75 13.4295 6.75 13.6284V17.3784C6.75 17.5773 6.67098 17.7681 6.53033 17.9087C6.38968 18.0494 6.19891 18.1284 6 18.1284H4.5C4.30109 18.1284 4.11032 18.0494 3.96967 17.9087C3.82902 17.7681 3.75 17.5773 3.75 17.3784V12.8784H6ZM18 18.1284C17.8011 18.1284 17.6103 18.0494 17.4697 17.9087C17.329 17.7681 17.25 17.5773 17.25 17.3784V13.6284C17.25 13.4295 17.329 13.2387 17.4697 13.0981C17.6103 12.9574 17.8011 12.8784 18 12.8784H20.25V18.1284H18Z" fill="black"/>
                                      </svg>
                                </div>
                                
                                    
                                    <p class="text-black text-xs font-normal font-['Plus Jakarta Sans'] leading-[18px]">Guidance from 
                                         <br> <b>Money Transfer Specialists</b></p>
                             </div>

                             <div class="flex px-6 gap-6 items-center py-4">
                                <div class="bg-white/50 p-4 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M20.25 3.87842H3.75C3.35218 3.87842 2.97064 4.03645 2.68934 4.31776C2.40804 4.59906 2.25 4.98059 2.25 5.37842V18.1284C2.25 18.5262 2.40804 18.9078 2.68934 19.1891C2.97064 19.4704 3.35218 19.6284 3.75 19.6284H5.25V21.1284C5.25 21.3273 5.32902 21.5181 5.46967 21.6587C5.61032 21.7994 5.80109 21.8784 6 21.8784C6.19891 21.8784 6.38968 21.7994 6.53033 21.6587C6.67098 21.5181 6.75 21.3273 6.75 21.1284V19.6284H17.25V21.1284C17.25 21.3273 17.329 21.5181 17.4697 21.6587C17.6103 21.7994 17.8011 21.8784 18 21.8784C18.1989 21.8784 18.3897 21.7994 18.5303 21.6587C18.671 21.5181 18.75 21.3273 18.75 21.1284V19.6284H20.25C20.6478 19.6284 21.0294 19.4704 21.3107 19.1891C21.592 18.9078 21.75 18.5262 21.75 18.1284V5.37842C21.75 4.98059 21.592 4.59906 21.3107 4.31776C21.0294 4.03645 20.6478 3.87842 20.25 3.87842ZM20.25 18.1284H3.75V5.37842H20.25V11.3784H18.6863C18.4982 10.2659 17.899 9.26457 17.0075 8.57293C16.116 7.8813 14.9972 7.54982 13.8729 7.64418C12.7485 7.73854 11.7006 8.25185 10.9368 9.08239C10.1731 9.91293 9.74919 11.0001 9.74919 12.1284C9.74919 13.2567 10.1731 14.3439 10.9368 15.1744C11.7006 16.005 12.7485 16.5183 13.8729 16.6127C14.9972 16.707 16.116 16.3755 17.0075 15.6839C17.899 14.9923 18.4982 13.991 18.6863 12.8784H20.25V18.1284ZM15.5475 11.3784C15.3824 11.0925 15.1276 10.869 14.8225 10.7426C14.5174 10.6162 14.1792 10.5941 13.8602 10.6795C13.5413 10.765 13.2594 10.9533 13.0584 11.2153C12.8574 11.4772 12.7485 11.7982 12.7485 12.1284C12.7485 12.4586 12.8574 12.7796 13.0584 13.0416C13.2594 13.3035 13.5413 13.4918 13.8602 13.5773C14.1792 13.6628 14.5174 13.6406 14.8225 13.5142C15.1276 13.3879 15.3824 13.1644 15.5475 12.8784H17.1562C16.9737 13.5854 16.5396 14.2016 15.9352 14.6114C15.3309 15.0212 14.5979 15.1965 13.8735 15.1045C13.1491 15.0125 12.4832 14.6595 12.0005 14.1116C11.5178 13.5637 11.2515 12.8586 11.2515 12.1284C11.2515 11.3982 11.5178 10.6931 12.0005 10.1452C12.4832 9.59736 13.1491 9.24433 13.8735 9.15233C14.5979 9.06032 15.3309 9.23566 15.9352 9.64547C16.5396 10.0553 16.9737 10.6714 17.1562 11.3784H15.5475Z" fill="black"/>
                                      </svg>
                                </div>
                                
                                    
                                    <p class="text-black text-xs font-normal font-['Plus Jakarta Sans'] leading-[18px]"> Account Opening <br> <b>Not Required</b></p>
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