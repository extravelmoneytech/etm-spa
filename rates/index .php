<!DOCTYPE html>
<html lang="en">

<?php
$title="ExTravelMoney- Send Money Abroad | Buy Forex Online in India"; 
$description="Get the best exchange rates on currency, forex cards, and money transfers from India. Fast, easy, and trusted RBI-authorized partners!"; 
$sub=0; $page=1; $city=0; $curpage=0; $fold="../"; 
$ogurl="https://www.extravelmoney.com";
$ogtype="website";


$indexPage = true;
$widgetType='fx';
$defaultCountry="us";

    include $fold . 'includesv2/head.php';
?>



<?php include $fold.'includes/dbconnect.php'; 

$query = mysqli_query($con, "select * from currencies WHERE currency = 'USD'");
 $row = mysqli_fetch_object($query);
 $usd = round($row->rate, 2);

$query = mysqli_query($con, "select * from currencies WHERE currency = 'EUR'");
 $row = mysqli_fetch_object($query);
 $eur = round($row->rate, 2);
 
 $query = mysqli_query($con, "select * from currencies WHERE currency = 'GBP'");
 $row = mysqli_fetch_object($query);
 $gbp = round($row->rate, 2);
 
  $query = mysqli_query($con, "select * from currencies WHERE currency = 'AUD'");
 $row = mysqli_fetch_object($query);
 $aud = round($row->rate, 2);
 
   $query = mysqli_query($con, "select * from currencies WHERE currency = 'AED'");
 $row = mysqli_fetch_object($query);
 $aed = round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'NZD'");
 $row = mysqli_fetch_object($query);
 $nzd= round($row->rate, 2);


   $query = mysqli_query($con, "select * from currencies WHERE currency = 'CAD'");
 $row = mysqli_fetch_object($query);
 $cad= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'CHF'");
 $row = mysqli_fetch_object($query);
 $chf= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'JPY'");
 $row = mysqli_fetch_object($query);
 $jpy= round($row->rate, 4);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'SAR'");
 $row = mysqli_fetch_object($query);
 $sar= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'QAR'");
 $row = mysqli_fetch_object($query);
 $qar= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'OMR'");
 $row = mysqli_fetch_object($query);
 $omr= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'BHD'");
 $row = mysqli_fetch_object($query);
 $bhd= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'KWD'");
 $row = mysqli_fetch_object($query);
 $kwd= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'SGD'");
 $row = mysqli_fetch_object($query);
 $sgd= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'MYR'");
 $row = mysqli_fetch_object($query);
 $myr= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'SEK'");
 $row = mysqli_fetch_object($query);
 $sek= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'NOK'");
 $row = mysqli_fetch_object($query);
 $nok= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'DKK'");
 $row = mysqli_fetch_object($query);
 $dkk= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'THB'");
 $row = mysqli_fetch_object($query);
 $thb= round($row->rate, 3);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'HKD'");
 $row = mysqli_fetch_object($query);
 $hkd= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'ZAR'");
 $row = mysqli_fetch_object($query);
 $zar= round($row->rate, 2);

   $query = mysqli_query($con, "select * from currencies WHERE currency = 'CNY'");
 $row = mysqli_fetch_object($query);
 $cny= round($row->rate, 2);

?>







<!--<head>-->
<!--<script src="https://cdn.tailwindcss.com"></script>-->

<!--</head>-->

<style>
  .buyCurrency{
      margin-left: 22px
  }
  

@media screen and (max-width: 1114px){
  .buyCurrency{
      margin-left: -60px
  }
  
}


  /*  @media (min-width: 773px) and (max-width: 1077px) {*/
  /*       .buyCurrency{*/
  /*    margin-left:42px*/
  /*}*/

    }

</style>




<body>
    <div class="flex flex-col items-center justify-center relative bg-white">
        <div class="chooseCityOverlay absolute top-0 left-0 w-full h-[100vh] bg-white customMd:bg-black/30  customMd:bg-opacity-60  z-20"
            style="backdrop-filter: blur(7px)">

            <div
                    class="chooseCityWidget  flex w-full absolute  z-20 top-0 left-0 bg-white px-5  py-5 customMd:rounded-xl flex-col customMd:mt-12 customMd:bg-white h-fit min-h-[100vh] customMd:min-h-fit customMd:max-w-2xl customMd:left-2/4 customMd:top-1/2  customMd:transform customMd:-translate-x-1/2 customMd:-translate-y-1/2">
                    <img class="w-44" 
                    ="<?php echo $fold . 'public/images/logo/ETM logo without tagline.png'; ?>" alt="ETM logo without tagline">
                    <h2 class="font-bold text-2xl mt-6">
                        <span class="custom-gradient-text">We
                            Promise
                        </span>
                        the Best Rates,<br> From the Market for
                        <span class="custom-gradient-text">you.</span>
                    </h2>
                    <p class="text-[#777777] text-xs  leading-3 mt-4">Our Services are provided all across the country
                    </p>

                    <!-- <p class="text-[#777777] text-xs font-bold  leading-3 mt-4">Please Select your City</p> -->

                    <div id="citySelectorContainer"
                        class="custom-gradient-border  relative rounded-lg h-12 flex items-center justify-between border-2 mt-4 px-3">
                        <input type="text" value="" placeholder="Search your city" autocomplete="off"
                            id="citySelector" class="text-black font-semibold text-base w-full h-full outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path
                                d="M21.3963 20.6203L16.5794 15.8035C17.953 14.2238 18.6596 12.1725 18.5503 10.082C18.441 7.99156 17.5243 6.02518 15.9934 4.59741C14.4626 3.16964 12.4371 2.39202 10.3441 2.42847C8.2511 2.46493 6.25399 3.3126 4.77378 4.79282C3.29356 6.27303 2.44588 8.27014 2.40943 10.3632C2.37298 12.4562 3.15059 14.4816 4.57837 16.0125C6.00614 17.5433 7.97252 18.46 10.063 18.5694C12.1535 18.6787 14.2048 17.9721 15.7844 16.5985L20.6013 21.4153C20.7079 21.5147 20.8489 21.5688 20.9947 21.5662C21.1404 21.5636 21.2794 21.5046 21.3825 21.4015C21.4856 21.2985 21.5446 21.1594 21.5472 21.0137C21.5497 20.868 21.4956 20.727 21.3963 20.6203ZM3.56128 10.5178C3.56128 9.14572 3.96816 7.80442 4.73046 6.66356C5.49277 5.52269 6.57625 4.6335 7.84392 4.10841C9.11158 3.58333 10.5065 3.44594 11.8522 3.71363C13.198 3.98131 14.4341 4.64205 15.4043 5.61227C16.3746 6.5825 17.0353 7.81864 17.303 9.16439C17.5707 10.5101 17.4333 11.905 16.9082 13.1727C16.3831 14.4404 15.4939 15.5238 14.3531 16.2861C13.2122 17.0484 11.8709 17.4553 10.4988 17.4553C8.65953 17.4531 6.89625 16.7215 5.5957 15.4209C4.29515 14.1204 3.56352 12.3571 3.56128 10.5178Z"
                                fill="black" />
                        </svg>


                    </div>
                    <p class="text-[#777777] text-sm font-bold  leading-3 mt-4">Popular Cities</p>
                    <div id="searchspin" style="display: none;">Loading...</div>
                    <div id="results" class="popularCityContainer flex flex-wrap gap-3 mt-3 text-[#777777]"></div>
                    <button id="citySelect" disabled
                        class="h-12 px-2 py-3 bg-primary-blue rounded-lg justify-center items-center gap-1 inline-flex mt-6 select-none cursor-pointer opacity-60">
                        <span class="text-white text-sm font-bold">View Best Rates in your City</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M15.781 12.7823L8.28104 20.2823C8.21136 20.3519 8.12863 20.4072 8.03759 20.4449C7.94654 20.4826 7.84896 20.5021 7.75042 20.5021C7.65187 20.5021 7.55429 20.4826 7.46324 20.4449C7.3722 20.4072 7.28947 20.3519 7.21979 20.2823C7.15011 20.2126 7.09483 20.1299 7.05712 20.0388C7.01941 19.9478 7 19.8502 7 19.7516C7 19.6531 7.01941 19.5555 7.05712 19.4645C7.09483 19.3734 7.15011 19.2907 7.21979 19.221L14.1901 12.2516L7.21979 5.28226C7.07906 5.14153 7 4.95066 7 4.75164C7 4.55261 7.07906 4.36174 7.21979 4.22101C7.36052 4.08028 7.55139 4.00122 7.75042 4.00122C7.94944 4.00122 8.14031 4.08028 8.28104 4.22101L15.781 11.721C15.8508 11.7907 15.9061 11.8734 15.9438 11.9644C15.9816 12.0555 16.001 12.1531 16.001 12.2516C16.001 12.3502 15.9816 12.4478 15.9438 12.5388C15.9061 12.6299 15.8508 12.7126 15.781 12.7823Z"
                                fill="white" />
                        </svg>
                    </button>

                    

                </div>
        </div>


        <div class="w-full chooseCityOverlayMain  relative" style="max-width: 103rem;">

            <?php 

                include $fold . 'includesv2/header.php';

            ?>
            
             <div
                    class=" flex w-full flex-col customMd:flex-row heroMain px-5 sm:px-12 md:px-24 py-5 relative justify-center  sm:justify-between customMd:pt-16 md:pt-16"> 
            <section class="w-full">

<div class="text-black text-[1.5rem] sm:text-5xl font-bold font-['Plus Jakarta Sans']">Live Foreign Currency Exchange Rates in  <span class="bg-gradient-to-r from-[#0E51A0] to-[#E3373A] bg-clip-text text-transparent">
                                India
                            </span> </div>

<div class=" w-full text-sm font-normal lg:w-[980px] text-gray-400 text-sm font-normal mt-3 font-['Plus Jakarta Sans'] pr-1 leading-[21px]">Table shows live foreign currency exchange rates (inter-bank) in India today. All major currencies included with rates updated every 3 mins. Please note that buy and sell rates would vary from the inter-bank rates shown here.</div>
                                  

                            <!-- Mobile Table starts -->

                            <div class="border rounded-lg max-w-lg bg-white pt-2 mt-5 sm:max-w-5xl">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-white">
                                            <th class="text-left py-3 px-2" style="font-size: 16px; font-weight: 700;">Popular Currencies</th>
                                        </tr>

                                        <tr class="bg-[#2C5AA2] text-white text-sm h-12">
                                            <th class="flex justify-between px-2 py-4 sm:w-full">
                                                <!-- <div class="sm:w-8/12 sm:text-left" style="font-size: 12px; font-weight: 600;">Currency</div>
                                                <div class="sm:w-7/12 sm:text-left" style="font-size: 12px; font-weight: 600;">Buy Currency ( In INR )</div> -->

                                                <div class="sm:1/4 md:w-7/12 sm:text-left" style="font-size: 12px; font-weight: 600;">Currency</div>
                                                <div class="buyCurrency sm:3/4 md:w-7/12 sm:text-left" style="font-size: 12px; font-weight: 600;">Buy Currency ( In INR )</div>
                                            </th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/usd/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-us ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">US Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 USD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold text-right md:text-left md:font-normal"><?php echo $usd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                         <a href="http://www.extravelmoney.com/rates/usd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        USD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/eur/" class="block md:flex md:gap-2 md:align-center">
                                                    <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-eu ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Euro</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 EUR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $eur; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                      <a href="http://www.extravelmoney.com/rates/eur/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        EUR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"
                                                    > <a href="http://www.extravelmoney.com/rates/gbp/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-gb ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">British Pound</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 GBP</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $gbp; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/gbp/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        GBP Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                     </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/aud/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-au ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Australian Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 AUD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $aud; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/aud/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        AUD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                     </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/aed/" class="block md:flex md:gap-2 md:align-center">
                                                    <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-ae ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">UAE Dirham</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 AED</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $aed; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                      <a href="http://www.extravelmoney.com/rates/aed/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        AED Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/nzd/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-nz ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">New Zealand Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 NZD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $nzd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/nzd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        NZD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                    </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/cad/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-ca ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Canadian Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 CAD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $cad; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                      <a href="http://www.extravelmoney.com/rates/cad/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        CAD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/chf/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-ch ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Swiss Franc</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 CHF</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $chf; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/chf/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        CHF Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                        </svg>
                                                    </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/jpy/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-jp ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Japan</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 JPY</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $jpy; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                     <a href="http://www.extravelmoney.com/rates/jpy/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        JPY Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                     </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> 
                                                    <a href="http://www.extravelmoney.com/rates/sar/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-sa ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Saudi Riyal</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 SAR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $sar; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/sar/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        SAR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                     </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/qar/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-qa ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Qatari Rial</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 QAR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $qar; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                      <a href="http://www.extravelmoney.com/rates/qar/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        QAR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/omr/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-om ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Omani Rial</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 OMR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $omr; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/omr/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        OMR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                     </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/bhd/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-bh ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Bahraini Dinar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 BHD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $bhd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                         <a href="http://www.extravelmoney.com/rates/bhd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        BHD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/kwd/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-kw ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Kuwaiti Dinar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 KWD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $kwd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                      <a href="http://www.extravelmoney.com/rates/kwd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        KWD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/sgd/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-sg ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Singapore Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 SGD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $sgd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/sgd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        SGD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/myr/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-my ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Malaysian Ringgit</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 MYR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $myr; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                   <a href="http://www.extravelmoney.com/rates/myr/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        MYR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                    </a>
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/sek/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-se ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Swedish Krona</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 SEK</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $sek; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                   <a href="http://www.extravelmoney.com/rates/sek/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">

                                                        SEK Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/dkk/" class="block md:flex md:gap-2 md:align-center">
                                            <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-dk ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Danish Krone</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 DKK</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $dkk; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/dkk/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">

                                                        DKK Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/thb/" class="block md:flex md:gap-2 md:align-center">
                                                  <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-th ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Thai Baht</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 THB</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $thb; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                <a href="http://www.extravelmoney.com/rates/thb/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        THB Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/hkd/" class="block md:flex md:gap-2 md:align-center">
                                                    <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-hk ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Hong Kong Dollar</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 HKD</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $hkd; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/hkd/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        HKD Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="border-b">
                                            <td class="md:flex border-b pt-2 pb-2">
                                                <div class="w-full px-2  flex justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/zar/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-za ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">South African Rand</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 ZAR</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $zar; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/zar/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;">
                                                        ZAR Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                            
                                                        </a>
                                                     
            
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="md:flex">
                                                <div class="w-full px-2  flex pt-2 pb-2 justify-between md:w-2/3">
                                                    <div class="flex items-center"> <a href="http://www.extravelmoney.com/rates/cny/" class="block md:flex md:gap-2 md:align-center">
                                                        <span class="md:mt-2 flag-icon icon-dropdown-flag flag-icon-cn ml-2"></span>
                                                        <p style="font-size: 14px; font-weight: 600;"class="mt-3">Chinese Yuan</p>
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="block w-24">
                                                     <p class="text-gray-400 mr-auto text-right md:text-left" style="font-size: 14px; font-weight: 600; font-family: Plus Jakarta Sans;">1 CNY</p> 
                                                     <p style="font-size: 16px;"class="mt-4 md:mt-1 font-bold md:font-normal text-right md:text-left"><?php echo $cny; ?> INR</p> 
                                                    </div>

                                                </div>

                                                <div class="w-full px-2 pb-2 flex justify-center items-center md:w-1/3 md:ml-20 md:mt-2">
                                                    <a href="http://www.extravelmoney.com/rates/cny/" class="p-2 w-full flex justify-center items-center rounded-3xl text-[#0E51A0] bg-[#E7EEF5] hover:underline hover:bg-white md:max-w-48" style="font-size: 14px; font-weight: 600;" >
                                                        
                                                        CNY Buy/Sell Rates
                                                        <svg class="ml-2" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.03104 9.53104L1.53104 17.031C1.46136 17.1007 1.37863 17.156 1.28759 17.1937C1.19654 17.2314 1.09896 17.2508 1.00042 17.2508C0.901871 17.2508 0.804289 17.2314 0.713245 17.1937C0.6222 17.156 0.539474 17.1007 0.469792 17.031C0.400109 16.9614 0.344834 16.8786 0.307122 16.7876C0.26941 16.6965 0.25 16.599 0.25 16.5004C0.25 16.4019 0.26941 16.3043 0.307122 16.2132C0.344834 16.1222 0.400109 16.0395 0.469792 15.9698L7.4401 9.00042L0.469792 2.03104C0.329061 1.89031 0.25 1.69944 0.25 1.50042C0.25 1.30139 0.329061 1.11052 0.469792 0.969792C0.610522 0.829062 0.801394 0.75 1.00042 0.75C1.19944 0.75 1.39031 0.829062 1.53104 0.969792L9.03104 8.46979C9.10077 8.53945 9.15609 8.62216 9.19384 8.71321C9.23158 8.80426 9.25101 8.90186 9.25101 9.00042C9.25101 9.09898 9.23158 9.19657 9.19384 9.28762C9.15609 9.37867 9.10077 9.46139 9.03104 9.53104Z" fill="#0E51A0"/>
                                                            </svg>
                                                      
                                                    </a>
                                                    
            
                                                </div>
                                            </td>
                                        </tr>


                                        
                                    </tbody>

                                </table>
                                 </div>

                                 <!-- Mobile table ends -->
                                    
                                 </section>
                                 
                                 
                                 
            </div>
            







            
            









      
            <div class="mt-12 customMd:mt-24 h-1"></div>

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