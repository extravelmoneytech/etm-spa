<!DOCTYPE html>
<html lang="en">

<?php
$title="Sign Up/Login - ExTravelMoney"; 
$description="Contact us for any foreign currency exchange related queries or for all your international money transfer needs. We are here to help you."; 
$fold="../../"; 
$ogurl="https://www.extravelmoney.com/myaccount";
$ogtype="article";

$title="Total Orders";
$myAccountOrderPage = true;

    include $fold . 'includesv2/head.php';
?>




<style>
    .pending {
    background: rgba(255, 169, 40, 0.1);
    color: #ffa928;
}

.pending #orderStatusDot {
    background: #ffa928;
}

.confirmed {
    background: rgba(23, 178, 106, 0.1);
    color: #17B26A;
}

.confirmed #orderStatusDot {
    background: #17B26A;
}

.cancelled {
    background: rgba(227, 55, 58, 0.1);
    color: #E3373A;
}

.cancelled #orderStatusDot {
    background: #E3373A;
}

.processed {
    background: rgba(72, 133, 237, 0.1);
    color: #4885ED;
}

.processed #orderStatusDot {
    background: #4885ED;
}

.postponed {
    background: rgba(124, 81, 255, 0.1);
    color: #7C51FF;
}

.postponed #orderStatusDot {
    background: #7C51FF;
}
</style>
<body>
    <div class="flex flex-col items-center justify-center relative bg-white">


        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php 

                include $fold . 'includesv2/header.php';

            ?>
            
        
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
                                                <svg id="copyBtn" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
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
                                        
                                            <div id="orderStatusContainer" class="h-[34px] pl-2 pr-3 py-2  rounded-[20px] border justify-start items-center gap-1 inline-flex">
                                                
                                                    <div class="w-1.5 h-1.5 left-[1px] top-[1px]  rounded-full" id="orderStatusDot"></div>
                                                
                                                <span class="text-center  text-sm font-medium" id="orderStatus">Pending (Add Additional KYC Documents )</span>
                                            
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