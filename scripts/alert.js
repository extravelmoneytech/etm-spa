// Function to create and insert an alert below a target element
function insertAlertBelowElement(targetElement, alertContent) {
    // Check if an alert already exists below the target element
    const existingAlert = targetElement.nextElementSibling;
    if (existingAlert && existingAlert.classList.contains('custom-alert')) {
        return; // Exit the function if an alert is already present
    }

    // Create a span element for the alert
    const alertSpan = document.createElement('span');

    // Set the classes and styles for the alert based on your template
    alertSpan.classList.add('text-[#fc4a32]', 'text-base', 'font-medium', 'leading-normal');

    // Add a custom class to identify the alert for future removal
    alertSpan.classList.add('custom-alert');

    // Set the alert message
    alertSpan.textContent = alertContent;

    // Insert the alert element directly below the target element
    targetElement.insertAdjacentElement('afterend', alertSpan);
}

// Function to remove the alert below a target element
function removeAlertBelowElement(targetElement) {
    // Find the alert element next to the target element
    const alertElement = targetElement.nextElementSibling;

    // Check if the next sibling is indeed an alert element
    if (alertElement && alertElement.classList.contains('custom-alert')) {
        alertElement.remove();
    }
}

// Function to capitalize the first letter of a string
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}