document.addEventListener('DOMContentLoaded', function () {
    
    
    
    console.log('loading....')
  let forexCityData = {};
  let moneyTransferCityData = {};
  const cityInput = document.getElementById('citySelector');
  const resultsContainer = document.getElementById('results');
  const searchSpinner = document.getElementById('searchspin');
  const MIN_LENGTH = 3; // Minimum length to trigger filtering

  // Define a list of popular cities (can be customized for each type if needed)
  // Updated list of popular cities from buy_forex.json (Forex)
  const popularForexCities = [
    "Mumbai", "New Delhi", "Bangalore", "Hyderabad", 
    "Chennai", "Kolkata", "Ahmedabad", "Pune", 
    "Ernakulam", "Coimbatore"
];

// Updated list of popular cities from money_transfer.json (Money Transfer)
const popularMoneyTransferCities = [
    "Mumbai", "New Delhi", "Bangalore", "Hyderabad", 
    "Chennai", "Kolkata", "Pune", "Ahmedabad", 
    "Jaipur", "Surat"
];

  // Function to load both JSON files simultaneously
  async function loadCityData() {
      
      let version=Date.now();
      console.log(version,'version num')
      try {
          const [forexResponse, moneyTransferResponse] = await Promise.all([
              fetch(`/locationData/buy_forex.json?ver=1.${version}`), // Replace with actual URL of forex JSON
              fetch(`/locationData/money_transfer.json?ver=1.${version}`) // Replace with actual URL of money transfer JSON
          ]);

          forexCityData = await forexResponse.json();
          moneyTransferCityData = await moneyTransferResponse.json();
          console.log(forexCityData);
          // Initially display forex city list or wait for user to choose
          displayPopularCities(forexCityData.cityData, popularForexCities); // Show forex list by default
      } catch (error) {
          console.error('Error loading city data:', error);
      }
  }

  // Call the function to load both JSON files when DOM is loaded
  loadCityData();

  // Function to create a city element
  function createCityElement(city) {
      const cityElement = document.createElement('div');
      cityElement.setAttribute('value', city);
      cityElement.className = 'cityBtn h-7 px-3 py-2 bg-[#e7eef5] rounded-xl justify-center items-center gap-1 inline-flex cursor-pointer';

      const cityText = document.createElement('p');
      cityText.className = 'text-xs font-medium leading-3';
      cityText.textContent = city;

      cityElement.appendChild(cityText); // Append the text to the city element

      // Add click event to each city element
      cityElement.addEventListener('click', function () {
          document.querySelectorAll('.cityBtn').forEach(item=>{
              item.setAttribute("selectStatus","false")
          })
          cityElement.setAttribute("selectStatus", "true");
          cityInput.value = city; // Update input value with the selected city
          highlightSelectedCity(cityElement); // Highlight the selected city
      });

      return cityElement;
  }

  // Function to highlight the selected city element
  function highlightSelectedCity(selectedElement) {
      // Remove 'selectedCity' class from any previously selected city element
      const previousSelected = document.querySelector('.selectedCity');
      if (previousSelected) {
          previousSelected.classList.remove('selectedCity');
      }

      // Add 'selectedCity' class to the newly selected city element
      selectedElement.classList.add('selectedCity');
  }

  // Function to display popular cities (based on the current type: forex or money transfer)
  function displayPopularCities(cityData, popularCities) {
      resultsContainer.innerHTML = ''; // Clear previous results

      popularCities.forEach(city => {
          const cityElement = createCityElement(city);
          resultsContainer.appendChild(cityElement);
      });

      resultsContainer.style.display = 'flex'; // Show results container with popular cities
  }

  // Function to filter and display city results
  function filterCities(keyword, cityData) {
      resultsContainer.innerHTML = ''; // Clear previous results

      if (keyword.length >= MIN_LENGTH) {
          searchSpinner.style.display = 'block'; // Show loading spinner
            
          const cityList = Object.keys(cityData);

          const filteredCities = cityList.filter(city => {
              
              const alternatives = cityData[city] || []; // Ensure alternatives is an array
              // Check if the city name or any of its alternatives include the keyword
              return city.toLowerCase().includes(keyword.toLowerCase()) || (Array.isArray(alternatives) && alternatives.some(alt => alt.toLowerCase().includes(keyword.toLowerCase())));
          });

          // Display filtered cities or 'No cities found'
          if (filteredCities.length > 0) {
              filteredCities.forEach(city => {
                  const cityElement = createCityElement(city);
                  resultsContainer.appendChild(cityElement); // Append city element to the results container
              });

              resultsContainer.style.display = 'flex'; // Show results container if there are results
          } else {
              const noResultsItem = document.createElement('div');
              noResultsItem.className = 'h-7 px-3 py-2 text-red-500 rounded-xl justify-center items-center gap-1 inline-flex';
              noResultsItem.textContent = 'No cities found';
              resultsContainer.appendChild(noResultsItem);

              resultsContainer.style.display = 'flex'; // Show results container even if no results are found
          }

          searchSpinner.style.display = 'none'; // Hide loading spinner
      } else {
          // Display popular cities if input length is less than MIN_LENGTH
          if (currentCityType === 'forex') {
              displayPopularCities(forexCityData.cityData, popularForexCities);
          } else {
              displayPopularCities(moneyTransferCityData.cityData, popularMoneyTransferCities);
          }
      }
  }

  // Initial display of popular forex cities
  let currentCityType = 'forex'; // Default to forex initially

  // Event listener for keyup event on city input
  cityInput.addEventListener('keyup', function () {
      const keyword = cityInput.value.trim(); // Get input value and remove extra spaces

      if (currentCityType === 'forex') {
          filterCities(keyword, forexCityData.cityData);
      } else {
          filterCities(keyword, moneyTransferCityData.cityData);
      }
  });

  // Event listeners for switching between forex and money transfer cities
  document.getElementById('getRatesButton').addEventListener('click', function () {
      currentCityType = 'forex';
      displayPopularCities(forexCityData.cityData, popularForexCities); // Show forex city list
  });

  document.getElementById('getRatesButtonMt').addEventListener('click', function () {
      currentCityType = 'moneyTransfer';
      displayPopularCities(moneyTransferCityData.cityData, popularMoneyTransferCities); // Show money transfer city list
  });

  // Event listener for input field focus event to show popular cities when input is cleared
  cityInput.addEventListener('input', function () {
      if (cityInput.value.trim() === '') {
          if (currentCityType === 'forex') {
              displayPopularCities(forexCityData.cityData, popularForexCities); // Show forex popular cities
          } else {
              displayPopularCities(moneyTransferCityData.cityData, popularMoneyTransferCities); // Show money transfer popular cities
          }
      }
  });
});
