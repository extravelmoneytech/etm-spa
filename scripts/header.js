function openMobMenu() {
    const menuIcon = document.querySelector('.menu-icon');
    menuIcon.classList.toggle('open');
    document.querySelector('body').classList.toggle('snipContainer');
    document.querySelector('#mobNavMain').classList.toggle('mobMenuActive')

}
document.querySelector('.menu-icon').addEventListener('click', () => {
    openMobMenu()
})
let dropdownHeader = document.querySelectorAll('.mobDropDownHeader')
let dropdownBody = document.querySelectorAll('.mobDropDownBody')
let dropdownArrow = document.querySelectorAll('.dropDownArrowMob')
dropdownHeader.forEach((item, index) => {
    item.addEventListener('click', () => {
        dropdownBody[index].classList.toggle('showDropDownMob')
        dropdownArrow[index].classList.toggle('rotateDropDownArrow')
    })
})



const contactBtn = document.getElementById('mobileContactBtn');
const contactSection = document.getElementById('mobileContactSection');

contactBtn.addEventListener('click', () => {
    
    // Toggle the visibility of the contact section
    contactSection.classList.toggle('hideContactMob');
    mobileContactBtn.classList.toggle('activeContactBtn')
});


