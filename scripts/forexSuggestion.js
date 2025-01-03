let countryDataFull = [
  { "Sl No": 178, "country": "United States", "currency": "USD", "forexCard": "USD", "flagCode": "us" },
  { "Sl No": 31, "country": "Canada", "currency": "CAD", "forexCard": "CAD", "flagCode": "ca" },
  { "Sl No": 177, "country": "United Kingdom", "currency": "GBP", "forexCard": "GBP", "flagCode": "gb" },
  { "Sl No": 62, "country": "Germany", "currency": "EUR", "forexCard": "EUR", "flagCode": "de" },
  { "Sl No": 9, "country": "Australia", "currency": "AUD", "forexCard": "AUD", "flagCode": "au" },
  { "Sl No": 118, "country": "New Zealand", "currency": "USD", "forexCard": "USD", "flagCode": "nz" },
  { "Sl No": 176, "country": "United Arab Emirates", "currency": "AED", "forexCard": "AED", "flagCode": "ae" },

  
  { "Sl No": 2, "country": "Albania", "currency": "USD", "forexCard": "USD", "flagCode": "al" },
  { "Sl No": 3, "country": "Algeria", "currency": "USD", "forexCard": "USD", "flagCode": "dz" },
  { "Sl No": 4, "country": "Andorra", "currency": "USD", "forexCard": "USD", "flagCode": "ad" },
  { "Sl No": 5, "country": "Angola", "currency": "USD", "forexCard": "USD", "flagCode": "ao" },
  { "Sl No": 6, "country": "Antigua and Barbuda", "currency": "USD", "forexCard": "USD", "flagCode": "ag" },
  { "Sl No": 7, "country": "Argentina", "currency": "USD", "forexCard": "USD", "flagCode": "ar" },
  { "Sl No": 8, "country": "Armenia", "currency": "EUR", "forexCard": "EUR", "flagCode": "am" },
  
  { "Sl No": 10, "country": "Austria", "currency": "EUR", "forexCard": "EUR", "flagCode": "at" },
  { "Sl No": 11, "country": "Azerbaijan", "currency": "USD", "forexCard": "USD", "flagCode": "az" },
  { "Sl No": 12, "country": "Bahamas", "currency": "USD", "forexCard": "USD", "flagCode": "bs" },
  { "Sl No": 13, "country": "Bahrain", "currency": "USD", "forexCard": "USD", "flagCode": "bh" },
  { "Sl No": 14, "country": "Bangladesh", "currency": "USD", "forexCard": "USD", "flagCode": "bd" },
  { "Sl No": 15, "country": "Barbados", "currency": "USD", "forexCard": "USD", "flagCode": "bb" },
  { "Sl No": 16, "country": "Belarus", "currency": "USD", "forexCard": "USD", "flagCode": "by" },
  { "Sl No": 17, "country": "Belgium", "currency": "EUR", "forexCard": "EUR", "flagCode": "be" },
  { "Sl No": 18, "country": "Belize", "currency": "USD", "forexCard": "USD", "flagCode": "bz" },
  { "Sl No": 19, "country": "Benin", "currency": "USD", "forexCard": "USD", "flagCode": "bj" },
  { "Sl No": 20, "country": "Bolivia", "currency": "USD", "forexCard": "USD", "flagCode": "bo" },
  { "Sl No": 21, "country": "Bosnia and Herzegovina", "currency": "USD", "forexCard": "USD", "flagCode": "ba" },
  { "Sl No": 22, "country": "Botswana", "currency": "USD", "forexCard": "USD", "flagCode": "bw" },
  { "Sl No": 23, "country": "Brazil", "currency": "USD", "forexCard": "USD", "flagCode": "br" },
  { "Sl No": 24, "country": "Brunei", "currency": "USD", "forexCard": "USD", "flagCode": "bn" },
  { "Sl No": 25, "country": "Bulgaria", "currency": "EUR", "forexCard": "EUR", "flagCode": "bg" },
  { "Sl No": 26, "country": "Burkina Faso", "currency": "USD", "forexCard": "USD", "flagCode": "bf" },
  { "Sl No": 27, "country": "Burundi", "currency": "USD", "forexCard": "USD", "flagCode": "bi" },
  { "Sl No": 28, "country": "Cabo Verde", "currency": "USD", "forexCard": "USD", "flagCode": "cv" },
  { "Sl No": 29, "country": "Cambodia", "currency": "USD", "forexCard": "USD", "flagCode": "kh" },
  { "Sl No": 30, "country": "Cameroon", "currency": "USD", "forexCard": "USD", "flagCode": "cm" },
  
  { "Sl No": 32, "country": "Central African Republic", "currency": "USD", "forexCard": "USD", "flagCode": "cf" },
  { "Sl No": 33, "country": "Chad", "currency": "USD", "forexCard": "USD", "flagCode": "td" },
  { "Sl No": 34, "country": "Chile", "currency": "USD", "forexCard": "USD", "flagCode": "cl" },
  { "Sl No": 35, "country": "China", "currency": "USD", "forexCard": "USD", "flagCode": "cn" },
  { "Sl No": 36, "country": "Colombia", "currency": "USD", "forexCard": "USD", "flagCode": "co" },
  { "Sl No": 37, "country": "Comoros", "currency": "USD", "forexCard": "USD", "flagCode": "km" },
  { "Sl No": 38, "country": "Democratic Republic of the Congo", "currency": "USD", "forexCard": "USD", "flagCode": "cd" },
  { "Sl No": 39, "country": "Costa Rica", "currency": "USD", "forexCard": "USD", "flagCode": "cr" },
  { "Sl No": 40, "country": "Croatia", "currency": "EUR", "forexCard": "EUR", "flagCode": "hr" },
  { "Sl No": 41, "country": "Cuba", "currency": "USD", "forexCard": "USD", "flagCode": "cu" },
  { "Sl No": 42, "country": "Cyprus", "currency": "EUR", "forexCard": "EUR", "flagCode": "cy" },
  { "Sl No": 43, "country": "Czech Republic", "currency": "EUR", "forexCard": "EUR", "flagCode": "cz" },
  { "Sl No": 44, "country": "Denmark", "currency": "EUR", "forexCard": "EUR", "flagCode": "dk" },
  { "Sl No": 45, "country": "Djibouti", "currency": "USD", "forexCard": "USD", "flagCode": "dj" },
  { "Sl No": 46, "country": "Dominica", "currency": "USD", "forexCard": "USD", "flagCode": "dm" },
  { "Sl No": 47, "country": "Dominican Republic", "currency": "USD", "forexCard": "USD", "flagCode": "do" },
  { "Sl No": 48, "country": "Ecuador", "currency": "USD", "forexCard": "USD", "flagCode": "ec" },
  { "Sl No": 49, "country": "Egypt", "currency": "USD", "forexCard": "USD", "flagCode": "eg" },
  { "Sl No": 50, "country": "El Salvador", "currency": "USD", "forexCard": "USD", "flagCode": "sv" },
  { "Sl No": 51, "country": "Equatorial Guinea", "currency": "USD", "forexCard": "USD", "flagCode": "gq" },
  { "Sl No": 52, "country": "Eritrea", "currency": "USD", "forexCard": "USD", "flagCode": "er" },
  { "Sl No": 53, "country": "Estonia", "currency": "EUR", "forexCard": "EUR", "flagCode": "ee" },
  { "Sl No": 54, "country": "Eswatini", "currency": "USD", "forexCard": "USD", "flagCode": "sz" },
  { "Sl No": 55, "country": "Ethiopia", "currency": "USD", "forexCard": "USD", "flagCode": "et" },
  { "Sl No": 56, "country": "Fiji", "currency": "USD", "forexCard": "USD", "flagCode": "fj" },
  { "Sl No": 57, "country": "Finland", "currency": "EUR", "forexCard": "EUR", "flagCode": "fi" },
  { "Sl No": 58, "country": "France", "currency": "EUR", "forexCard": "EUR", "flagCode": "fr" },
  { "Sl No": 59, "country": "Gabon", "currency": "USD", "forexCard": "USD", "flagCode": "ga" },
  { "Sl No": 60, "country": "Gambia", "currency": "USD", "forexCard": "USD", "flagCode": "gm" },
  { "Sl No": 61, "country": "Georgia", "currency": "EUR", "forexCard": "EUR", "flagCode": "ge" },
  
  { "Sl No": 63, "country": "Ghana", "currency": "USD", "forexCard": "USD", "flagCode": "gh" },
  { "Sl No": 64, "country": "Greece", "currency": "EUR", "forexCard": "EUR", "flagCode": "gr" },
  { "Sl No": 65, "country": "Grenada", "currency": "USD", "forexCard": "USD", "flagCode": "gd" },
  { "Sl No": 66, "country": "Guatemala", "currency": "USD", "forexCard": "USD", "flagCode": "gt" },
  { "Sl No": 67, "country": "Guinea", "currency": "USD", "forexCard": "USD", "flagCode": "gn" },
  { "Sl No": 68, "country": "Guinea-Bissau", "currency": "USD", "forexCard": "USD", "flagCode": "gw" },
  { "Sl No": 69, "country": "Guyana", "currency": "USD", "forexCard": "USD", "flagCode": "gy" },
  { "Sl No": 70, "country": "Haiti", "currency": "USD", "forexCard": "USD", "flagCode": "ht" },
  { "Sl No": 71, "country": "Honduras", "currency": "USD", "forexCard": "USD", "flagCode": "hn" },
  { "Sl No": 72, "country": "Hungary", "currency": "EUR", "forexCard": "EUR", "flagCode": "hu" },
  { "Sl No": 73, "country": "Iceland", "currency": "USD", "forexCard": "USD", "flagCode": "is" },
  { "Sl No": 74, "country": "Indonesia", "currency": "USD", "forexCard": "USD", "flagCode": "id" },
  { "Sl No": 75, "country": "Iraq", "currency": "USD", "forexCard": "USD", "flagCode": "iq" },
  { "Sl No": 76, "country": "Ireland", "currency": "EUR", "forexCard": "EUR", "flagCode": "ie" },
  { "Sl No": 77, "country": "Israel", "currency": "USD", "forexCard": "USD", "flagCode": "il" },
  { "Sl No": 78, "country": "Italy", "currency": "EUR", "forexCard": "EUR", "flagCode": "it" },
  { "Sl No": 79, "country": "Jamaica", "currency": "USD", "forexCard": "USD", "flagCode": "jm" },
  { "Sl No": 80, "country": "Japan", "currency": "JPY", "forexCard": "JPY", "flagCode": "jp" },
  { "Sl No": 81, "country": "Jordan", "currency": "USD", "forexCard": "USD", "flagCode": "jo" },
  { "Sl No": 82, "country": "Kazakhstan", "currency": "USD", "forexCard": "USD", "flagCode": "kz" },
  { "Sl No": 83, "country": "Kenya", "currency": "USD", "forexCard": "USD", "flagCode": "ke" },
  { "Sl No": 84, "country": "Kiribati", "currency": "USD", "forexCard": "USD", "flagCode": "ki" },
  { "Sl No": 85, "country": "South Korea", "currency": "USD", "forexCard": "USD", "flagCode": "kr" },
  { "Sl No": 86, "country": "Kosovo", "currency": "USD", "forexCard": "USD", "flagCode": "xk" },
  { "Sl No": 87, "country": "Kuwait", "currency": "USD", "forexCard": "USD", "flagCode": "kw" },
  { "Sl No": 88, "country": "Kyrgyzstan", "currency": "USD", "forexCard": "USD", "flagCode": "kg" },
  { "Sl No": 89, "country": "Laos", "currency": "USD", "forexCard": "USD", "flagCode": "la" },
  { "Sl No": 90, "country": "Latvia", "currency": "EUR", "forexCard": "EUR", "flagCode": "lv" },
  { "Sl No": 91, "country": "Lebanon", "currency": "USD", "forexCard": "USD", "flagCode": "lb" },
  { "Sl No": 92, "country": "Lesotho", "currency": "USD", "forexCard": "USD", "flagCode": "ls" },
  { "Sl No": 93, "country": "Liberia", "currency": "USD", "forexCard": "USD", "flagCode": "lr" },
  { "Sl No": 94, "country": "Libya", "currency": "USD", "forexCard": "USD", "flagCode": "ly" },
  { "Sl No": 95, "country": "Liechtenstein", "currency": "USD", "forexCard": "USD", "flagCode": "li" },
  { "Sl No": 96, "country": "Lithuania", "currency": "EUR", "forexCard": "EUR", "flagCode": "lt" },
  { "Sl No": 97, "country": "Luxembourg", "currency": "EUR", "forexCard": "EUR", "flagCode": "lu" },
  { "Sl No": 98, "country": "Madagascar", "currency": "USD", "forexCard": "USD", "flagCode": "mg" },
  { "Sl No": 99, "country": "Malawi", "currency": "USD", "forexCard": "USD", "flagCode": "mw" },
  { "Sl No": 100, "country": "Malaysia", "currency": "MYR", "forexCard": "USD", "flagCode": "my" },
  { "Sl No": 101, "country": "Maldives", "currency": "USD", "forexCard": "USD", "flagCode": "mv" },
  { "Sl No": 102, "country": "Mali", "currency": "USD", "forexCard": "USD", "flagCode": "ml" },
  { "Sl No": 103, "country": "Malta", "currency": "EUR", "forexCard": "EUR", "flagCode": "mt" },
  { "Sl No": 104, "country": "Marshall Islands", "currency": "USD", "forexCard": "USD", "flagCode": "mh" },
  { "Sl No": 105, "country": "Mauritania", "currency": "USD", "forexCard": "USD", "flagCode": "mr" },
  { "Sl No": 106, "country": "Mauritius", "currency": "USD", "forexCard": "USD", "flagCode": "mu" },
  { "Sl No": 107, "country": "Mexico", "currency": "USD", "forexCard": "USD", "flagCode": "mx" },
  { "Sl No": 108, "country": "Micronesia", "currency": "USD", "forexCard": "USD", "flagCode": "fm" },
  { "Sl No": 109, "country": "Moldova", "currency": "USD", "forexCard": "USD", "flagCode": "md" },
  { "Sl No": 110, "country": "Monaco", "currency": "EUR", "forexCard": "EUR", "flagCode": "mc" },
  { "Sl No": 111, "country": "Mongolia", "currency": "USD", "forexCard": "USD", "flagCode": "mn" },
  { "Sl No": 112, "country": "Montenegro", "currency": "USD", "forexCard": "USD", "flagCode": "me" },
  { "Sl No": 113, "country": "Morocco", "currency": "USD", "forexCard": "USD", "flagCode": "ma" },
  { "Sl No": 114, "country": "Mozambique", "currency": "USD", "forexCard": "USD", "flagCode": "mz" },
  { "Sl No": 115, "country": "Namibia", "currency": "USD", "forexCard": "USD", "flagCode": "na" },
  { "Sl No": 116, "country": "Nauru", "currency": "USD", "forexCard": "USD", "flagCode": "nr" },
  { "Sl No": 117, "country": "Netherlands", "currency": "EUR", "forexCard": "EUR", "flagCode": "nl" },
  
  { "Sl No": 119, "country": "Nicaragua", "currency": "USD", "forexCard": "USD", "flagCode": "ni" },
  { "Sl No": 120, "country": "Niger", "currency": "USD", "forexCard": "USD", "flagCode": "ne" },
  { "Sl No": 121, "country": "Nigeria", "currency": "USD", "forexCard": "USD", "flagCode": "ng" },
  { "Sl No": 122, "country": "North Macedonia", "currency": "USD", "forexCard": "USD", "flagCode": "mk" },
  { "Sl No": 123, "country": "Norway", "currency": "EUR", "forexCard": "EUR", "flagCode": "no" },
  { "Sl No": 124, "country": "Oman", "currency": "USD", "forexCard": "USD", "flagCode": "om" },
  { "Sl No": 125, "country": "Palau", "currency": "USD", "forexCard": "USD", "flagCode": "pw" },
  { "Sl No": 126, "country": "Panama", "currency": "USD", "forexCard": "USD", "flagCode": "pa" },
  { "Sl No": 127, "country": "Papua New Guinea", "currency": "USD", "forexCard": "USD", "flagCode": "pg" },
  { "Sl No": 128, "country": "Paraguay", "currency": "USD", "forexCard": "USD", "flagCode": "py" },
  { "Sl No": 129, "country": "Peru", "currency": "USD", "forexCard": "USD", "flagCode": "pe" },
  { "Sl No": 130, "country": "Philippines", "currency": "USD", "forexCard": "USD", "flagCode": "ph" },
  { "Sl No": 131, "country": "Poland", "currency": "EUR", "forexCard": "EUR", "flagCode": "pl" },
  { "Sl No": 132, "country": "Portugal", "currency": "EUR", "forexCard": "EUR", "flagCode": "pt" },
  { "Sl No": 133, "country": "Qatar", "currency": "USD", "forexCard": "USD", "flagCode": "qa" },
  { "Sl No": 134, "country": "Romania", "currency": "EUR", "forexCard": "EUR", "flagCode": "ro" },
  { "Sl No": 135, "country": "Russia", "currency": "USD", "forexCard": "USD", "flagCode": "ru" },
  { "Sl No": 136, "country": "Rwanda", "currency": "USD", "forexCard": "USD", "flagCode": "rw" },
  { "Sl No": 137, "country": "Saint Kitts and Nevis", "currency": "USD", "forexCard": "USD", "flagCode": "kn" },
  { "Sl No": 138, "country": "Saint Lucia", "currency": "USD", "forexCard": "USD", "flagCode": "lc" },
  { "Sl No": 139, "country": "Saint Vincent and the Grenadines", "currency": "USD", "forexCard": "USD", "flagCode": "vc" },
  { "Sl No": 140, "country": "Samoa", "currency": "USD", "forexCard": "USD", "flagCode": "ws" },
  { "Sl No": 141, "country": "San Marino", "currency": "USD", "forexCard": "USD", "flagCode": "sm" },
  { "Sl No": 142, "country": "Sao Tome and Principe", "currency": "USD", "forexCard": "USD", "flagCode": "st" },
  { "Sl No": 143, "country": "Saudi Arabia", "currency": "USD", "forexCard": "USD", "flagCode": "sa" },
  { "Sl No": 144, "country": "Senegal", "currency": "USD", "forexCard": "USD", "flagCode": "sn" },
  { "Sl No": 145, "country": "Serbia", "currency": "USD", "forexCard": "USD", "flagCode": "rs" },
  { "Sl No": 146, "country": "Seychelles", "currency": "USD", "forexCard": "USD", "flagCode": "sc" },
  { "Sl No": 147, "country": "Sierra Leone", "currency": "USD", "forexCard": "USD", "flagCode": "sl" },
  { "Sl No": 148, "country": "Singapore", "currency": "SGD", "forexCard": "SGD", "flagCode": "sg" },
  { "Sl No": 149, "country": "Slovakia", "currency": "EUR", "forexCard": "EUR", "flagCode": "sk" },
  { "Sl No": 150, "country": "Slovenia", "currency": "EUR", "forexCard": "EUR", "flagCode": "si" },
  { "Sl No": 151, "country": "Solomon Islands", "currency": "USD", "forexCard": "USD", "flagCode": "sb" },
  { "Sl No": 152, "country": "Somalia", "currency": "USD", "forexCard": "USD", "flagCode": "so" },
  { "Sl No": 153, "country": "South Africa", "currency": "USD", "forexCard": "USD", "flagCode": "za" },
  { "Sl No": 154, "country": "South Sudan", "currency": "USD", "forexCard": "USD", "flagCode": "ss" },
  { "Sl No": 155, "country": "Spain", "currency": "EUR", "forexCard": "EUR", "flagCode": "es" },
  { "Sl No": 156, "country": "Sri Lanka", "currency": "USD", "forexCard": "USD", "flagCode": "lk" },
  { "Sl No": 157, "country": "Sudan", "currency": "USD", "forexCard": "USD", "flagCode": "sd" },
  { "Sl No": 158, "country": "Suriname", "currency": "USD", "forexCard": "USD", "flagCode": "sr" },
  { "Sl No": 159, "country": "Sweden", "currency": "EUR", "forexCard": "EUR", "flagCode": "se" },
  { "Sl No": 160, "country": "Switzerland", "currency": "CHF", "forexCard": "CHF", "flagCode": "ch" },
  { "Sl No": 161, "country": "Syria", "currency": "USD", "forexCard": "USD", "flagCode": "sy" },
  { "Sl No": 162, "country": "Taiwan", "currency": "USD", "forexCard": "USD", "flagCode": "tw" },
  { "Sl No": 163, "country": "Tajikistan", "currency": "USD", "forexCard": "USD", "flagCode": "tj" },
  { "Sl No": 164, "country": "Tanzania", "currency": "USD", "forexCard": "USD", "flagCode": "tz" },
  { "Sl No": 165, "country": "Thailand", "currency": "THB", "forexCard": "THB", "flagCode": "th" },
  { "Sl No": 166, "country": "Timor-Leste", "currency": "USD", "forexCard": "USD", "flagCode": "tl" },
  { "Sl No": 167, "country": "Togo", "currency": "USD", "forexCard": "USD", "flagCode": "tg" },
  { "Sl No": 168, "country": "Tonga", "currency": "USD", "forexCard": "USD", "flagCode": "to" },
  { "Sl No": 169, "country": "Trinidad and Tobago", "currency": "USD", "forexCard": "USD", "flagCode": "tt" },
  { "Sl No": 170, "country": "Tunisia", "currency": "USD", "forexCard": "USD", "flagCode": "tn" },
  { "Sl No": 171, "country": "Turkey", "currency": "USD", "forexCard": "USD", "flagCode": "tr" },
  { "Sl No": 172, "country": "Turkmenistan", "currency": "USD", "forexCard": "USD", "flagCode": "tm" },
  { "Sl No": 173, "country": "Tuvalu", "currency": "USD", "forexCard": "USD", "flagCode": "tv" },
  { "Sl No": 174, "country": "Uganda", "currency": "USD", "forexCard": "USD", "flagCode": "ug" },
  { "Sl No": 175, "country": "Ukraine", "currency": "USD", "forexCard": "USD", "flagCode": "ua" },
  
  
  
  { "Sl No": 179, "country": "Uruguay", "currency": "USD", "forexCard": "USD", "flagCode": "uy" },
  { "Sl No": 180, "country": "Uzbekistan", "currency": "USD", "forexCard": "USD", "flagCode": "uz" },
  { "Sl No": 181, "country": "Vanuatu", "currency": "USD", "forexCard": "USD", "flagCode": "vu" },
  { "Sl No": 182, "country": "Vatican City", "currency": "EUR", "forexCard": "EUR", "flagCode": "va" },
  { "Sl No": 183, "country": "Venezuela", "currency": "USD", "forexCard": "USD", "flagCode": "ve" },
  { "Sl No": 184, "country": "Vietnam", "currency": "USD", "forexCard": "USD", "flagCode": "vn" },
  { "Sl No": 185, "country": "Yemen", "currency": "USD", "forexCard": "USD", "flagCode": "ye" },
  { "Sl No": 186, "country": "Zambia", "currency": "USD", "forexCard": "USD", "flagCode": "zm" },
  { "Sl No": 187, "country": "Zimbabwe", "currency": "USD", "forexCard": "USD", "flagCode": "zw" }
];






// JavaScript to handle custom dropdown functionality

// Assume 'countryData' is an array of objects containing country information (country name, currency, and flag code)
const countriesNew = countryDataFull;
const countryNames = []; // Initialize an array to store selected country names

// Maximum number of countries that can be selected
const maxSelections = 3;

// Get necessary DOM elements
const dropdownToggle = document.getElementById('dropdownToggle');
const dropdownMenu = document.getElementById('dropdownMenu');
const dropdownSearch = document.getElementById('dropdownSearch');
const dropdownItemsContainer = document.getElementById('dropdownItems');

// Function to toggle dropdown visibility
dropdownToggle.addEventListener('click', function () {
  dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
  dropdownSearch.focus()
  
});

// Function to create dropdown items
function createDropdownItems() {
  dropdownItemsContainer.innerHTML = ''; // Clear existing items
  countriesNew.forEach(country => {
    const item = document.createElement('div');
    item.classList.add('dropdown-item');
    item.setAttribute('data-value', country.country); // Set data attribute for easy lookup

    // Ensure to use flag-icon-css class or any other flag icon setup you prefer
    item.innerHTML = `
      <span class="flag-icon icon-dropdown-flag flag-icon-${country.flagCode}"></span> ${country.country} 
    `;

    // Add click event listener to the item to select it
    item.addEventListener('click', function (e) {
      const countryIndex = countryNames.indexOf(country.country);
      
      // If the country is already selected, deselect it
      if (countryIndex > -1) {
        countryNames.splice(countryIndex, 1); // Remove country from the selected list
        updateSelectedChoices(); // Update the selected choices display
        item.classList.remove('selected'); // Remove the 'selected' class

      }else{
        if (countryNames.length >= maxSelections) {
          return; // Exit if maxSelections is reached
        }
        
        countryNames.push(country.country); // Add country to selected list
        updateSelectedChoices(); // Update the selected choices display
        // Clear the search input
        dropdownSearch.value = '';
  
        // Show all items again after selection
        const items = dropdownItemsContainer.getElementsByClassName('dropdown-item');
        Array.from(items).forEach(item => {
          item.style.display = 'flex'; // Show all items again
        });
  
        dropdownMenu.style.display = 'none'; // Close dropdown after selection
        item.classList.add('selected'); // Highlight selected item
        
        e.stopPropagation(); // Prevent dropdown from closing if inside click
      }
      
    });

    dropdownItemsContainer.appendChild(item);
  });
}

// Function to filter dropdown items based on search input
dropdownSearch.addEventListener('input', function () {
  const searchTerm = dropdownSearch.value.toLowerCase();
  const items = dropdownItemsContainer.getElementsByClassName('dropdown-item');
  Array.from(items).forEach(item => {
    const label = item.textContent.toLowerCase();
    if (label.includes(searchTerm)) {
      item.style.display = 'flex';
    } else {
      item.style.display = 'none';
    }
  });
});

// Function to update selected choices
function updateSelectedChoices() {
  const selected = [];

  // Clear any existing highlights
  const items = dropdownItemsContainer.getElementsByClassName('dropdown-item');
  Array.from(items).forEach(item => {
    item.classList.remove('selected');
  });

  countryNames.forEach(countryName => {
    const country = countriesNew.find(c => c.country === countryName);
    selected.push(`<span class="selectedChoice">${country.country}<svg class="removeCountry" xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
      <path d="M12.7635 12.7349C12.8003 12.7693 12.8299 12.8107 12.8503 12.8567C12.8708 12.9027 12.8819 12.9523 12.8828 13.0027C12.8836 13.053 12.8744 13.103 12.8555 13.1497C12.8367 13.1964 12.8086 13.2388 12.773 13.2744C12.7374 13.3101 12.695 13.3381 12.6483 13.357C12.6016 13.3758 12.5515 13.3851 12.5012 13.3842C12.4508 13.3833 12.4012 13.3723 12.3552 13.3518C12.3092 13.3313 12.2678 13.3018 12.2335 13.2649L7.99846 9.03055L3.76346 13.2649C3.69237 13.3312 3.59835 13.3672 3.5012 13.3655C3.40405 13.3638 3.31135 13.3244 3.24265 13.2557C3.17394 13.187 3.13459 13.0943 3.13287 12.9972C3.13116 12.9 3.16722 12.806 3.23346 12.7349L7.46783 8.49992L3.23346 4.26492C3.16722 4.19384 3.13116 4.09981 3.13287 4.00266C3.13459 3.90551 3.17394 3.81282 3.24265 3.74411C3.31135 3.67541 3.40405 3.63605 3.5012 3.63434C3.59835 3.63262 3.69237 3.66868 3.76346 3.73492L7.99846 7.9693L12.2335 3.73492C12.3045 3.66868 12.3986 3.63262 12.4957 3.63434C12.5929 3.63605 12.6856 3.67541 12.7543 3.74411C12.823 3.81282 12.8623 3.90551 12.864 4.00266C12.8658 4.09981 12.8297 4.19384 12.7635 4.26492L8.52908 8.49992L12.7635 12.7349Z" fill="black"/>
    </svg></span>`);

    // Highlight the selected items
    const selectedItem = dropdownItemsContainer.querySelector(`[data-value="${countryName}"]`);
    if (selectedItem) {
      selectedItem.classList.add('selected');
    }
  });

  // Update the dropdown toggle text with selected items without commas
  dropdownToggle.innerHTML = selected.length ? selected.join(' ') : 'Select Your Travel Destination';

  // Add event listeners to newly added remove icons
  const removeIcons = dropdownToggle.querySelectorAll('.removeCountry');
  removeIcons.forEach(icon => {
    icon.addEventListener('click', function (e) {
      e.stopPropagation(); // Prevent click event from bubbling up
      const countryName = this.parentElement.textContent.trim();
      const index = countryNames.indexOf(countryName);
      if (index > -1) {
        countryNames.splice(index, 1); // Remove the country from the selected list
        updateSelectedChoices(); // Update the displayed choices
      }
    });
  });

  console.log(countryNames); // Log the selected countries array
  generateRecommendations(countryNames); // Call your recommendation function
}

// Close dropdown when clicking outside
document.addEventListener('click', function (event) {
  if (!event.target.closest('.dropdown')) {
    dropdownMenu.style.display = 'none';
  }
});

// Prevent closing dropdown when clicking inside the search input
dropdownSearch.addEventListener('click', function (event) {
  event.stopPropagation();
});

// Initialize dropdown items on page load
createDropdownItems();










let finalText;

// Function to generate currency and forex card recommendations
function generateRecommendations(countryNames) {
  console.log("working fn");

  // Check if no countries are selected
  if (countryNames.length === 0) {
    document.querySelector('#recomendationContainer').style.display = 'none';
    finalText = "";
    return; // Exit the function early
  }

  let currencyMap = {};
  let forexCardMap = {};

  countryNames.forEach(countryName => {
    let countryInfo = countryDataFull.find(country => country.country.toLowerCase() === countryName.toLowerCase());
    if (countryInfo) {
      if (!currencyMap[countryInfo.currency]) {
        currencyMap[countryInfo.currency] = [];
      }
      currencyMap[countryInfo.currency].push(countryInfo.country);

      if (!forexCardMap[countryInfo.forexCard]) {
        forexCardMap[countryInfo.forexCard] = [];
      }
      forexCardMap[countryInfo.forexCard].push(countryInfo.country);
    }
  });

  let temp = {
    recommendedCurrencies: currencyMap,
    recommendedForexCards: forexCardMap
  };

  // If only one country is selected, call forceSelectDropdownItem with its currency
  if (countryNames.length === 1) {
    const selectedCountry = countryNames[0];
    let selectedCountryInfo = countryDataFull.find(country => country.country.toLowerCase() === selectedCountry.toLowerCase());
    if (selectedCountryInfo) {
      let currencyName = selectedCountryInfo.currency; // Get the currency name for the selected country
      let forexCardName= selectedCountryInfo.forexCard;
      let widgetProduct=document.querySelector('#WidgetProduct').getAttribute('dataval')
      
      if(widgetProduct==='forexCard'){
          
          forceSelectDropdownItem('widgetCurrency', forexCardName);
      }else if(widgetProduct==='currency'){
          forceSelectDropdownItem('widgetCurrency', currencyName);
      }
    }
  }

  createText(temp);
}

// Function to create recommendation text
function createText(val) {
  
  let recommendationsText = [];

  // Get all unique countries from both recommendedForexCards and recommendedCurrencies
  let allCountries = new Set([
    ...Object.values(val.recommendedForexCards).flat(),
    ...Object.values(val.recommendedCurrencies).flat()
  ]);

  // Create a recommendation for each country
  allCountries.forEach(country => {
    let cardRecommendations = [];
    let cashRecommendations = [];

    // Check for forex card recommendations for the country
    for (let [card, countries] of Object.entries(val.recommendedForexCards)) {
      if (countries.includes(country)) {
        cardRecommendations.push(`${card} forex card`);
      }
    }

    // Check for currency cash recommendations for the country
    for (let [currency, countries] of Object.entries(val.recommendedCurrencies)) {
      if (countries.includes(country)) {
        cashRecommendations.push(`${currency.trim()} in Cash`);
      }
    }

    // Combine recommendations for the current country
    let combinedRecommendation = `${cardRecommendations.concat(cashRecommendations).join(' or ')} for ${country}`;
    recommendationsText.push(combinedRecommendation);
  });

  // Combine all recommendations into a single sentence
  finalText = `We recommend ${recommendationsText.join(', ')}.`;

  // Output the generated text
  console.log(finalText, 'finalTxt');
  document.querySelector('#recomendationContainer').style.display = 'flex';
  document.querySelector('#recomendationText').textContent = finalText;
}
