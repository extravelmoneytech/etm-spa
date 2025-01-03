document.addEventListener('DOMContentLoaded', () => {
    const datePicker = document.getElementById('datePicker');
    const selector = document.querySelector('#datePickerSelector');
    const calendar = document.getElementById('calendar');
    const calendarDays = document.getElementById('calendarDays');
    const monthYear = document.getElementById('monthYear');
    const prevMonth = document.getElementById('prevMonth');
    const nextMonth = document.getElementById('nextMonth');

    let currentDate = new Date();
    let selectedDate = currentDate; // Track the selected date
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Retrieve the saved date from sessionStorage
    let savedDate = sessionStorage.getItem('selectedDate');
    console.log(`Retrieved savedDate from sessionStorage: ${savedDate}`);

    // If no date is found in sessionStorage, store the current date
    if (!savedDate) {
        console.log("No date found in sessionStorage. Storing current date.");
        savedDate = currentDate;
        sessionStorage.setItem('selectedDate', currentDate); // Store current date in sessionStorage
    } else {
        selectedDate = new Date(savedDate); // If a date is found, use it as the selected date
        currentMonth = selectedDate.getMonth();
        currentYear = selectedDate.getFullYear();
    }

    // Update the initial date picker value with the selected date
    updateDatePicker(selectedDate);

    function updateDatePicker(d) {
        const date = new Date(d);

        // Extract the day, month, and year
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() is zero-based
        const year = date.getFullYear();

        // Format the date as "DD/MM/YYYY"
        const formattedDate = `${day}/${month}/${year}`;

        // Update the displayed selected date
        document.querySelector('#selectedDate').textContent = formattedDate;

        // Set the value of the date picker input
        datePicker.value = formattedDate;

        console.log(`Updated date picker with value: ${formattedDate}`); // Debug log
    }

    function renderCalendar() {
        monthYear.textContent = `${months[currentMonth]} ${currentYear}`;

        // Clear the calendar
        calendarDays.innerHTML = '';

        // Get the first day of the month and the number of days in the month
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Adjust for Sunday as the first day (if necessary)
        const firstDayIndex = firstDayOfMonth === 0 ? 6 : firstDayOfMonth - 1;

        // Fill in the days
        let day = 1;
        for (let i = 0; i < 6; i++) { // 6 weeks
            let row = document.createElement('tr');

            for (let j = 0; j < 7; j++) { // 7 days
                let cell = document.createElement('td');

                if (i === 0 && j < firstDayIndex) {
                    cell.innerHTML = '<span></span>';
                } else if (day > daysInMonth) {
                    cell.innerHTML = '<span></span>';
                } else {
                    // Create a span element for the day
                    let span = document.createElement('span');
                    span.textContent = day;

                    // Create the date in the format dd/mm/yyyy
                    const cellDate = `${String(day).padStart(2, '0')}/${String(currentMonth + 1).padStart(2, '0')}/${currentYear}`;

                    // Set the cell's value as the date
                    cell.setAttribute('data-value', cellDate);

                    // Re-add the selected class if this is the selected date
                    if (
                        selectedDate &&
                        day === selectedDate.getDate() &&
                        currentMonth === selectedDate.getMonth() &&
                        currentYear === selectedDate.getFullYear()
                    ) {
                        cell.classList.add('selected');
                    }

                    // Preserve the current day's value in the event listener
                    const currentDay = day;

                    cell.addEventListener('click', () => {
                        // Remove 'selected' class from any other cell
                        document.querySelectorAll('.selected').forEach(el => el.classList.remove('selected'));

                        // Update the selectedDate to the clicked cell's date
                        selectedDate = new Date(currentYear, currentMonth, currentDay);

                        // Save the selected date to sessionStorage
                        sessionStorage.setItem('selectedDate', selectedDate);

                        console.log(`Selected date saved to sessionStorage: ${selectedDate}`);

                        updateDatePicker(selectedDate); // Update the date picker value

                        // Add 'selected' class to the clicked cell
                        cell.classList.add('selected');

                        // Hide the calendar after selection
                        calendar.classList.remove('calendar-visible');
                        calendar.classList.add('calendar-hidden');
                    });

                    cell.appendChild(span); // Add the span to the cell

                    day++; // Increment day only after it has been assigned and used
                }

                row.appendChild(cell);
            }

            calendarDays.appendChild(row);
        }
    }

    selector.addEventListener('click', () => {
        calendar.classList.toggle('calendar-visible');
        calendar.classList.toggle('calendar-hidden');
    });

    prevMonth.addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
    });

    nextMonth.addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar();
    });

    // Initial render
    renderCalendar();
});
