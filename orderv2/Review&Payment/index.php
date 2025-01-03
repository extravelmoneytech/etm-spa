<!DOCTYPE html>
<html lang="en">

<?php
$fold="../../";

$reviewAndPaymentPage = true;
$title="Review And Payment";
include $fold . 'includesv2/head.php';
?>

<body>
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
                        <span
                            class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Get
                            Rates</span>
                    </div>

                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">2</span>
                        </div>
                        <span
                            class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Choose Provider</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
                            <span class="text-black text-xl font-bold ">3</span>
                        </div>
                        <span
                            class="text-black text-lg font-bold  absolute -bottom-12 min-w-48 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">Contact
                            Details</span>
                    </div>
                    <div class="grow shrink basis-0 h-0.5  bg-[#20bc73]"></div>
                    <div class="flex flex-col relative">
                        <div
                            class="w-12 h-12 p-2.5 bg-white rounded-[30px] border-2 border-[#20bc73] flex-col justify-center items-center gap-2.5 inline-flex">
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

            <section>
                <div class="px-5 sm:px-12 md:px-16 py-5">
                    <div
                        class=" w-full p-2.5 bg-primary-blue/10 rounded-lg justify-center items-center gap-2.5 inline-flex md:hidden">
                        <div class="text-primary-blue text-base font-bold" id="productNameIdentifier">Currency Exchange</div>
                    </div>

                    <div class="w-full progressBar justify-start items-center gap-2 inline-flex mt-6 md:hidden">
                        <div
                            class=" w-10 aspect-square bg-white rounded-3xl border-2 border-primary-blue flex-col justify-center items-center gap-2.5 inline-flex">
                            <div><span class="text-primary-blue text-lg font-bold ">4</span><span
                                    class="text-black/40 text-base font-medium ">/5</span></div>
                        </div>
                        <div class="text-black text-base font-bold leading-none">Review Payment</div>
                        <div class="flex flex-1 shrink gap-2.5 self-stretch my-auto h-0.5 bg-primary-blue basis-4 w-[198px]"
                            role="progressbar"></div>
                    </div>

                    <div class="flex flex-col md:flex-row md:gap-16  md:border border-primary-blue/10 rounded-2xl md:p-8">
                        <div class="w-full md:w-1/2 mt-4 md:border-0 border border-primary-blue/10 rounded-2xl ">
                            <div class="py-4 px-3 border-b border-black/20">
                                <h2 class="text-black text-base font-bold ">Order Summary</h2>
                            <div class="flex flex-col mt-6 gap-4 forexContainer">
                                <div class="flex flex-col  gap-4 " id="productList">
                                    
                                </div>
                                
                                <div id="doorDeliveryData" class=" justify-between items-start inline-flex w-full">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight">Delivery Fee</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="deliveryFee">₹ 000</p>
                                </div>
                                <div class="inline-flex justify-between items-start  w-full">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight ">GST</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="gst">₹ 000</p>
                                </div>
                                  
                            </div>
                            <div class="flex flex-col mt-6 gap-4 moneyT">
                                <div class="flex  gap-4 mb-4 justify-between" id="mtProduct">
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
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="gstMt">₹ 000</p>
                                </div>
                                <div class="justify-between items-start inline-flex w-full mt-4">
                                    <p class="text-[#677489] text-sm font-medium  tracking-tight">Bank Charges</p>
                                    <p class="text-[#111729] text-sm font-medium  tracking-tight" id="bankCharges"></p>
                                </div>
                            </div>
                            </div>
    
                            <div class=" px-3 justify-between items-start inline-flex w-full py-4 border-b border-black/20">
                                <p class="text-black text-base font-bold  leading-relaxed tracking-tight">Total</p>
                                <p class="text-[#111729] text-base font-bold  leading-relaxed" id="totalAmnt">₹ 000</p>
                            </div>
    
                            <!-- <div class="w-full px-3 py-4 justify-between items-center inline-flex">
                                <div class="text-black/40 text-sm font-semibold   tracking-tight">Have a Discount Code?</div>
                                <div class="text-[#0e51a0] text-sm font-bold  ">Apply Now</div>
                            </div> -->
                            
                            <div class="moneyT px-3 pb-3">
                                <span class="text-black/60 text-xs font-normal  leading-[18px]" id="intermediatoryNote">Note: Intermediatory bank may charge US$ 15-30 for receiving the Wire Transfer. Kindly check with the beneficiary to find out the exact fee.</span>
                              <p class="text-black/60 text-xs font-normal  leading-[18px] mt-4"><span >TCS (Tax Collected at Source) may be applicable on your Wire Transfer. It is NOT an additional charge and can be claimed when filing Income Tax Returns. </span><a href="https://www.extravelmoney.com/tcs-tax-on-remittance-from-india/" target="_blank" class="text-[#0e51a0] text-xs font-normal  underline leading-[18px]"> Know more about TCS.</a></p>
                            </div>
                            
    
                            
                        </div>
    
                        <div class="flex w-full md:w-2/5 flex-col mt-6">
                                
                            
                            <p class="text-black/60 text-sm font-semibold">Select Payment Method</p>
    
                        


                             <div class="flex flex-col gap-2 forexContainer">
                                <div id=""
                                    class="radio  p-4 rounded-lg border flex-col justify-center items-start gap-2 inline-flex mt-2 selectedRadio w-full select-none cursor-pointer">
                                    <div class="justify-start items-center gap-2 inline-flex">
                                        <svg class="checkedIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M16.1475 9.91695C16.2528 10.0224 16.312 10.1654 16.312 10.3145C16.312 10.4635 16.2528 10.6065 16.1475 10.712L10.8975 15.962C10.792 16.0673 10.6491 16.1265 10.5 16.1265C10.3509 16.1265 10.208 16.0673 10.1025 15.962L7.8525 13.712C7.75314 13.6053 7.69905 13.4643 7.70162 13.3186C7.70419 13.1728 7.76323 13.0338 7.86629 12.9307C7.96935 12.8277 8.10839 12.7686 8.25411 12.7661C8.39984 12.7635 8.54087 12.8176 8.6475 12.917L10.5 14.7685L15.3525 9.91695C15.458 9.81162 15.6009 9.75245 15.75 9.75245C15.8991 9.75245 16.042 9.81162 16.1475 9.91695ZM21.5625 12.5645C21.5625 14.4557 21.0017 16.3045 19.9509 17.8771C18.9002 19.4496 17.4067 20.6753 15.6594 21.3991C13.9121 22.1228 11.9894 22.3122 10.1345 21.9432C8.27951 21.5742 6.57564 20.6635 5.2383 19.3262C3.90096 17.9888 2.99022 16.2849 2.62125 14.43C2.25227 12.5751 2.44164 10.6524 3.16541 8.90504C3.88917 7.15772 5.11482 5.66427 6.68736 4.61352C8.25991 3.56278 10.1087 3.00195 12 3.00195C14.5352 3.00493 16.9658 4.01336 18.7584 5.80603C20.5511 7.5987 21.5595 10.0292 21.5625 12.5645ZM20.4375 12.5645C20.4375 10.8957 19.9427 9.26437 19.0155 7.87683C18.0884 6.48929 16.7706 5.40783 15.2289 4.76922C13.6871 4.13061 11.9906 3.96351 10.3539 4.28908C8.71722 4.61464 7.2138 5.41823 6.03379 6.59824C4.85379 7.77825 4.05019 9.28166 3.72463 10.9184C3.39907 12.5551 3.56616 14.2516 4.20477 15.7933C4.84338 17.3351 5.92484 18.6529 7.31238 19.58C8.69992 20.5071 10.3312 21.002 12 21.002C14.237 20.9995 16.3817 20.1097 17.9635 18.5279C19.5453 16.9461 20.435 14.8015 20.4375 12.5645Z"
                                                fill="white" />
                                        </svg>
                                        <div class="w-5 aspect-square border border-gray-300 rounded-full uncheckedIcon">
                                        </div>
                                        <p class=" text-sm font-semibold">Book now & Pay later</p>
                                    </div>
                                    <div class="self-stretch">
                                        <div class=" text-xs font-normal leading-5"><p id="paymentInfoText"></p></div>
                                    </div>
                                </div>
    
                                
                            </div>


                            <div class="flex flex-col gap-2 moneyT">
                                <div id="radio1"
                                    class="radio h-28 p-4 rounded-lg border flex-col justify-center items-start gap-2 inline-flex mt-2 selectedRadio w-full select-none cursor-pointer">
                                    <div class="justify-start items-center gap-2 inline-flex">
                                        <svg class="checkedIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M16.1475 9.91695C16.2528 10.0224 16.312 10.1654 16.312 10.3145C16.312 10.4635 16.2528 10.6065 16.1475 10.712L10.8975 15.962C10.792 16.0673 10.6491 16.1265 10.5 16.1265C10.3509 16.1265 10.208 16.0673 10.1025 15.962L7.8525 13.712C7.75314 13.6053 7.69905 13.4643 7.70162 13.3186C7.70419 13.1728 7.76323 13.0338 7.86629 12.9307C7.96935 12.8277 8.10839 12.7686 8.25411 12.7661C8.39984 12.7635 8.54087 12.8176 8.6475 12.917L10.5 14.7685L15.3525 9.91695C15.458 9.81162 15.6009 9.75245 15.75 9.75245C15.8991 9.75245 16.042 9.81162 16.1475 9.91695ZM21.5625 12.5645C21.5625 14.4557 21.0017 16.3045 19.9509 17.8771C18.9002 19.4496 17.4067 20.6753 15.6594 21.3991C13.9121 22.1228 11.9894 22.3122 10.1345 21.9432C8.27951 21.5742 6.57564 20.6635 5.2383 19.3262C3.90096 17.9888 2.99022 16.2849 2.62125 14.43C2.25227 12.5751 2.44164 10.6524 3.16541 8.90504C3.88917 7.15772 5.11482 5.66427 6.68736 4.61352C8.25991 3.56278 10.1087 3.00195 12 3.00195C14.5352 3.00493 16.9658 4.01336 18.7584 5.80603C20.5511 7.5987 21.5595 10.0292 21.5625 12.5645ZM20.4375 12.5645C20.4375 10.8957 19.9427 9.26437 19.0155 7.87683C18.0884 6.48929 16.7706 5.40783 15.2289 4.76922C13.6871 4.13061 11.9906 3.96351 10.3539 4.28908C8.71722 4.61464 7.2138 5.41823 6.03379 6.59824C4.85379 7.77825 4.05019 9.28166 3.72463 10.9184C3.39907 12.5551 3.56616 14.2516 4.20477 15.7933C4.84338 17.3351 5.92484 18.6529 7.31238 19.58C8.69992 20.5071 10.3312 21.002 12 21.002C14.237 20.9995 16.3817 20.1097 17.9635 18.5279C19.5453 16.9461 20.435 14.8015 20.4375 12.5645Z"
                                                fill="white" />
                                        </svg>
                                        <div class="w-5 aspect-square border border-gray-300 rounded-full uncheckedIcon">
                                        </div>
                                        <p class=" text-sm font-semibold">NEFT/RTGS</p>
                                    </div>
                                    <div class="self-stretch">
                                        <p class=" text-xs font-normal leading-5">Pay as NEFT/RTGS transfer to the Bank/Exchange House's Account. Payment instructions will be shared on your registered email.</p>
                                    </div>
                                </div>
    
                                <div id="radio2"
                                    class="radio h-28 p-4 rounded-lg border flex-col justify-center items-start gap-2 inline-flex mt-2 w-full select-none cursor-pointer">
                                    <div class="justify-start items-center gap-2 inline-flex">
                                        <svg class="checkedIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <path
                                                d="M16.1475 9.91695C16.2528 10.0224 16.312 10.1654 16.312 10.3145C16.312 10.4635 16.2528 10.6065 16.1475 10.712L10.8975 15.962C10.792 16.0673 10.6491 16.1265 10.5 16.1265C10.3509 16.1265 10.208 16.0673 10.1025 15.962L7.8525 13.712C7.75314 13.6053 7.69905 13.4643 7.70162 13.3186C7.70419 13.1728 7.76323 13.0338 7.86629 12.9307C7.96935 12.8277 8.10839 12.7686 8.25411 12.7661C8.39984 12.7635 8.54087 12.8176 8.6475 12.917L10.5 14.7685L15.3525 9.91695C15.458 9.81162 15.6009 9.75245 15.75 9.75245C15.8991 9.75245 16.042 9.81162 16.1475 9.91695ZM21.5625 12.5645C21.5625 14.4557 21.0017 16.3045 19.9509 17.8771C18.9002 19.4496 17.4067 20.6753 15.6594 21.3991C13.9121 22.1228 11.9894 22.3122 10.1345 21.9432C8.27951 21.5742 6.57564 20.6635 5.2383 19.3262C3.90096 17.9888 2.99022 16.2849 2.62125 14.43C2.25227 12.5751 2.44164 10.6524 3.16541 8.90504C3.88917 7.15772 5.11482 5.66427 6.68736 4.61352C8.25991 3.56278 10.1087 3.00195 12 3.00195C14.5352 3.00493 16.9658 4.01336 18.7584 5.80603C20.5511 7.5987 21.5595 10.0292 21.5625 12.5645ZM20.4375 12.5645C20.4375 10.8957 19.9427 9.26437 19.0155 7.87683C18.0884 6.48929 16.7706 5.40783 15.2289 4.76922C13.6871 4.13061 11.9906 3.96351 10.3539 4.28908C8.71722 4.61464 7.2138 5.41823 6.03379 6.59824C4.85379 7.77825 4.05019 9.28166 3.72463 10.9184C3.39907 12.5551 3.56616 14.2516 4.20477 15.7933C4.84338 17.3351 5.92484 18.6529 7.31238 19.58C8.69992 20.5071 10.3312 21.002 12 21.002C14.237 20.9995 16.3817 20.1097 17.9635 18.5279C19.5453 16.9461 20.435 14.8015 20.4375 12.5645Z"
                                                fill="white" />
                                        </svg>
                                        <div class="w-5 aspect-square border border-gray-300 rounded-full uncheckedIcon">
                                        </div>
                                        <p class=" text-sm font-semibold">Payment Gateway</p>
                                    </div>
                                    <div class="self-stretch">
                                        <p class=" text-xs font-normal leading-5">Pay via the payment gateway provided by the Bank/Exchange House. Payment instructions will be shared on your registered email.</p>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="text-black/60 text-xs font-normal mt-10"><span>By proceeding I agree to the </span><a class="cursor-pointer" target=_blank href="https://www.extravelmoney.com/terms/"><span class="underline">Terms & Conditions</span></a><span> and </span><a class="cursor-pointer" target=_blank href="https://www.extravelmoney.com/refund-policy/"><span class="underline">Cancellation & Refund Policy</span></a><span> of ExTravelmoney Technosol Pvt. Ltd.</span></div>


                            <div class="bg-white py-4 rounded-t-3xl  md:static fixed bottom-0 left-0 w-full flex items-center justify-center">
                            <div class="w-[90%] md:w-full h-12 px-2 py-3 bg-primary-blue rounded-lg justify-center items-center gap-1   flex md:inline-flex cursor-pointer" id="summaryConfirm">
                                <div class="text-white text-sm font-bold">Place Order</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z" fill="white"/>
                                  </svg>
                            </div>
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