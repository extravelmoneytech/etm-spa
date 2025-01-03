<style>
    .howItWorkBtn{
     color: #2c5aa2;   
    }
    .howItWorksActiveBtn{
        background-color: #2c5aa2;
        color: white;
        box-shadow: 6px 0px 16px 0px rgba(0, 23, 51, 0.10);
    }
</style>

<section id="howItWorkSection" class="mt-24 px-5 sm:px-12 md:px-24">
                <div class="flex flex-col  justify-between customMd:flex-row gap-3">
                    
                    <div
                        class="justify-start items-start gap-2 inline-flex w-full customMd:w-1/2 bg-[#cfe3fb]/60 rounded-[20px] p-1">
                        
                        <div id="forexhowItWorkBtn" data-val="fx" class="howItWorkBtn howItWorksActiveBtn p-2 py-3 rounded-2xl justify-center items-center gap-2.5 inline-flex w-full cursor-pointer">
                            <div class="text-center  text-base font-bold ">Currency Exchange</div>
                        </div>

                        <div id="mthowItWorkBtn" data-val="mt" class="howItWorkBtn p-2 py-3 rounded-2xl justify-center items-center gap-2.5 inline-flex w-full cursor-pointer">
                            <div class="text-center  text-base font-bold ">Money Transfer</div>
                        </div>
                        
                    </div>
                </div>

                <div  class="overflow-hidden mt-8">
                    <div id="howItWorksCardContainer" class="flex duration-300 ">
                        <div class="cards-wrapper w-full flex-none">
                            <div class="mt-6 grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 min-w-[250px] w-full gap-4 sm:gap-8 md:gap-12">
                                <div class="howItWorksCard bg-[#cfe3fb]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#18325b] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#2c5aa2] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">1</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 md:mt-4">Book & Verify</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 mt:mt-4">Compare live rates from trusted exchange houses and banks online. Choose the best deal and verify your KYC effortlessly—at home or the nearest branch.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks1.svg'; ?>" alt="">
                                    </div>
                                </div>

                                <div class="howItWorksCard bg-[#cffbd4]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#4ad89a] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#4ad89a] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">2</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 mt:mt-4">Transfer Funds</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 md:mt-4">Securely transfer funds to your chosen exchange house or bank via NEFT/RTGS.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks2.svg'; ?>" alt="">
                                    </div>
                                </div>

                                <div class="howItWorksCard bg-[#fbf1cf]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#ffa04e] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#ffa04e] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">3</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 md:mt-4">Get Paid!</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 md:mt-4">Sit back and relax! Your beneficiary will receive the funds within 48 working hours.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks3.svg'; ?>" alt="">
                                    </div>
                                </div>

        
        
                            </div>
                        </div>
        
                        <div class="cards-wrapper w-full flex-none">
                            <div class="mt-6 grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 min-w-[250px] w-full gap-4 sm:gap-8 md:gap-12">
                                <div class="howItWorksCard bg-[#cfe3fb]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#18325b] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#2c5aa2] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">1</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 md:mt-4">Book & Verify</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 mt:mt-4">Compare live rates from trusted exchange houses and banks online. Choose the best deal and verify your KYC effortlessly—at home or the nearest branch.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks1.svg'; ?>" alt="">
                                    </div>
                                </div>

                                <div class="howItWorksCard bg-[#cffbd4]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#4ad89a] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#4ad89a] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">2</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 mt:mt-4">Transfer Funds</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 md:mt-4">Securely transfer funds to your chosen exchange house or bank via NEFT/RTGS.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks2.svg'; ?>" alt="">
                                    </div>
                                </div>

                                <div class="howItWorksCard bg-[#fbf1cf]/60 rounded-3xl flex items-center flex-col px-8 md:px-12 ">
                                    <div class="w-[45px] h-[45px] md:w-[65px] md:h-[65px] rounded-full border border-[#ffa04e] flex items-center justify-center mt-6 sm:mt-8">
                                        <div class="w-[38px] h-[38px] md:w-[55px] md:h-[55px] py-1.5 bg-[#ffa04e] rounded-[300px] justify-center items-center inline-flex">
                                            <div class="text-white text-xl md:text-[28px] font-extrabold leading-[44px]">3</div>
                                        </div>
                                    </div>

                                    <div class="text-[#18325b] text-2xl md:text-3xl font-extrabold mt-2 md:mt-4">Get Paid!</div>

                                    <p class="text-center text-[#18325b]  md:text-lg font-normal leading-[27px] mt-2 md:mt-4">Sit back and relax! Your beneficiary will receive the funds within 48 working hours.</p>
                                    
                                    <div class="overflow-hidden mt-auto">
                                        <img src="<?php echo $fold . 'public/images/howItWorks3.svg'; ?>" alt="">
                                    </div>
                                </div>

        
        
                            </div>
                        </div>
                    </div>
                    
                </div>
                

            </section>

  <script>
   // Function to handle button click
function handleButtonClick(event) {
    // Get the container element
    const container = document.querySelector('#howItWorksCardContainer');

    // Get all elements with the class 'serviceBtn'
    const buttons = document.querySelectorAll('.howItWorkBtn');

    // Loop through the buttons to remove the 'servicesActiveBtn' class
    buttons.forEach(button => {
        button.classList.remove('howItWorksActiveBtn');
    });

    // Add the 'servicesActiveBtn' class to the clicked button
    const clickedButton = event.currentTarget;
    clickedButton.classList.add('howItWorksActiveBtn');

    // Check the data-val attribute and adjust the container's transform property
    if (clickedButton.getAttribute('data-val') === 'mt') {
        container.style.transform = 'translateX(calc(-100%))'; // Adjust as needed
    } else {
        container.style.transform = 'translateX(0)';
    }
}

// Attach event listeners to all buttons with the class 'serviceBtn'
document.querySelectorAll('.howItWorkBtn').forEach(button => {
    button.addEventListener('click', handleButtonClick);
});
  </script>
</body>
</html>