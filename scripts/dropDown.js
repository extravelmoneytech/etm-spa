

// Global function to handle setting innerHTML of selectedItem and li elements
function setSelectedItemInnerHTML(dropdownId, item, selectedItem) {
    const dropdownMain = document.getElementById(dropdownId);
    console.log(item,'setSelectedItemInnerHTML');
    // Check if the dropdown has a 'custom-content' attribute
    if (dropdownMain && dropdownMain.hasAttribute('custom-content')) {
        if(dropdownId==='contryCodeMain'){
            selectedItem.innerHTML=`<span>${item.getAttribute('mob-code')}</span><span>${item.getAttribute('value')}</span>`
        }
        if(dropdownId==='widgetCurrency'){
            let currencyName=item.getAttribute('currency-name')
            selectedItem.innerHTML=`<span>${currencyName}</span>`
        }
        
    } else {
        console.log(item,'jjnn')
        // Default behavior: directly set the itemInnerHTML passed as the parameter
        selectedItem.innerHTML = item.innerHTML;
    }
}

// Function to select the first dropdown item
function selectFirstDropdownItem(dropdownMain) {
    const dropdownList = dropdownMain.querySelector('.dropdownList');
    const selectedItem = dropdownMain.querySelector('.selectedItem');
    const items = dropdownList.querySelectorAll('li:not(.template)'); // Exclude template item

    if (items.length > 0) {
        const firstItem = items[0];

        // Globalized call to set innerHTML, passing the innerHTML of the firstItem
        setSelectedItemInnerHTML(dropdownMain.id, firstItem, selectedItem);

        dropdownMain.setAttribute('dataVal', firstItem.getAttribute("value"));

        // Add 'selected' class to the first item instead of hiding it
        firstItem.classList.add('selectedDropDown');

        // Store the selected value in sessionStorage
        sessionStorage.setItem(`dropdown_${dropdownMain.id}_selected`, firstItem.getAttribute("value"));

        // Dispatch a custom event after the first item is selected
        const selectEvent = new CustomEvent('dropdownFirstItemSelected', {
            detail: {
                value: firstItem.getAttribute('value'),
                text: firstItem.innerHTML,
                dropdown: dropdownMain
            }
        });
        dropdownMain.dispatchEvent(selectEvent);
    }
}

function updateFromSession(dropdownMain) {
    console.log('check...');
    const dropdownList = dropdownMain.querySelector('.dropdownList');
    const selectedItem = dropdownMain.querySelector('.selectedItem');
    const storedValue = sessionStorage.getItem(`dropdown_${dropdownMain.id}_selected`);
    const selectValue = dropdownMain.getAttribute('selectvalue');
    const valueToSelect = selectValue || storedValue;

    let item = null;

    // Determine the item to select based on valueToSelect
    if (valueToSelect) {
        item = dropdownList.querySelector(`li[value="${valueToSelect}"]`);
        // Check if the item exists and is visible
        if (!item || item.style.display === 'none') {
            item = null; // Reset if item is invalid
        }
    }

    // Fallback to the first visible item if no valid item is found
    if (!item) {
        selectFirstDropdownItem(dropdownMain);
    } else {
        setSelectedItemInnerHTML(dropdownMain.id, item, selectedItem);
        dropdownMain.setAttribute('dataVal', item.getAttribute('value'));
        item.classList.add('selectedDropDownItem');
    }
}


document.addEventListener('DOMContentLoaded', () => {
    const dropdowns = document.querySelectorAll('.dropdownMain');

    dropdowns.forEach(dropdownMain => {
        const dropdownList = dropdownMain.querySelector('.dropdownList');
        const selectedItem = dropdownMain.querySelector('.selectedItem');
        const searchEnabled = dropdownMain.hasAttribute('data-search');
        let searchInput;

        if (searchEnabled) {
            searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'Search...';
            searchInput.classList.add('dropdownSearch');
            searchInput.style.width = '100%';
            searchInput.style.padding = '8px';
            searchInput.style.boxSizing = 'border-box';
            searchInput.style.position = 'sticky'; 
            searchInput.style.top = '0'; 
            dropdownList.insertBefore(searchInput, dropdownList.firstChild);

            searchInput.addEventListener('click', (event) => {
                event.stopPropagation(); 
            });
        }

        updateFromSession(dropdownMain);

        dropdownMain.addEventListener('click', (event) => {
            event.stopPropagation();
            dropdowns.forEach(d => {
                if (d !== dropdownMain) {
                    d.classList.remove('open');
                }
            });

            const items = dropdownList.querySelectorAll('li:not(.template)');
            const selectedValue = dropdownMain.getAttribute('dataVal');
            items.forEach(item => {
                if (item.getAttribute('value') === selectedValue) {
                    item.classList.add('selectedDropDownItem'); // Keep the selected class
                } else {
                    item.classList.remove('selectedDropDownItem'); // Remove from others
                }
            });

            dropdownMain.classList.toggle('open');
        });

        dropdownList.addEventListener('click', (event) => {
            const item = event.target.closest('li');
            if (item && item !== dropdownList && !item.classList.contains('template')) {
                event.stopPropagation();

                const previouslySelected = dropdownList.querySelector('li.selectedDropDownItem');

                if (previouslySelected) {
                    previouslySelected.classList.remove('selectedDropDownItem');
                }

                // Use globalized function to set the innerHTML with custom content if applicable
                setSelectedItemInnerHTML(dropdownMain.id, item, selectedItem);
                dropdownMain.setAttribute('dataVal', item.getAttribute("value"));

                // Add 'selected' class to the newly selected item
                item.classList.add('selectedDropDownItem');
                dropdownMain.classList.remove('open');

                // Clear the search input
                if (searchEnabled && searchInput) {
                    searchInput.value = '';

                    // Reset the visibility of all items (show all items)
                    const items = dropdownList.querySelectorAll('li:not(.template)');
                    items.forEach(item => {
                        item.style.display = ''; // Show all items
                    });
                }

                sessionStorage.setItem(`dropdown_${dropdownMain.id}_selected`, item.getAttribute("value"));

                const changeEvent = new CustomEvent('dropdownChange', {
                    detail: {
                        value: item.getAttribute('value'),
                        text: item.innerHTML,
                        dropdown: dropdownMain
                    }
                });
                dropdownMain.dispatchEvent(changeEvent);
            }
        });

        if (searchEnabled && searchInput) {
            searchInput.addEventListener('input', () => {
                const filter = searchInput.value.toLowerCase();
                const items = dropdownList.querySelectorAll('li:not(.template)');

                items.forEach(item => {
                    const text = item.innerHTML.toLowerCase();
                    const alternativeName = item.getAttribute('alternativeName') ? item.getAttribute('alternativeName').toLowerCase() : '';

                    if (text.includes(filter) || alternativeName.includes(filter)) {
                        item.style.display = ''; 
                    } else {
                        item.style.display = 'none'; 
                    }
                });
            });
        }
    });

    document.addEventListener('click', () => {
        dropdowns.forEach(dropdownMain => {
            dropdownMain.classList.remove('open');
        });
    });
});

document.addEventListener('dropdownChange', (event) => {
    console.log('Dropdown changed:', event.detail);
});

function getSelectedDropdownItemElement(dropdownId) {
    const dropdownMain = document.getElementById(dropdownId);

    if (!dropdownMain) {
        console.error(`Dropdown with ID ${dropdownId} not found.`);
        return null;
    }

    const dropdownList = dropdownMain.querySelector('.dropdownList');
    const selectedValue = dropdownMain.getAttribute('dataVal');

    if (selectedValue) {
        const selectedItemElement = dropdownList.querySelector(`li[value="${selectedValue}"]`);

        if (selectedItemElement) {
            return selectedItemElement; 
        }
    }

    return null;
}




function forceSelectDropdownItem(dropdownId, valueToSelect) {


    console.log()



    const dropdownMain = document.getElementById(dropdownId);


    if (!dropdownMain) {
        console.error(`Dropdown with ID ${dropdownId} not found.`);
        return;
    }

    const dropdownList = dropdownMain.querySelector('.dropdownList');
    const selectedItem = dropdownMain.querySelector('.selectedItem');

    
    const item = dropdownList.querySelector(`li[value="${valueToSelect}"]`);

    
    if (item) {
        // Use globalized function to set the innerHTML
        setSelectedItemInnerHTML(dropdownMain.id, item, selectedItem);
        dropdownMain.setAttribute('dataVal', item.getAttribute('value'));

        // Remove 'selectedDropDownItem' class from any previously selected item
        const previouslySelected = dropdownList.querySelector('li.selectedDropDownItem');
        if (previouslySelected) {
            previouslySelected.classList.remove('selectedDropDownItem');
        }

        // Add 'selectedDropDownItem' class to the newly selected item
        item.classList.add('selectedDropDownItem');

        // Store the selected value in sessionStorage
        sessionStorage.setItem(`dropdown_${dropdownMain.id}_selected`, item.getAttribute('value'));

        // Dispatch the dropdownChange event
        const changeEvent = new CustomEvent('dropdownChange', {
            detail: {
                value: item.getAttribute('value'),
                text: item.innerHTML,
                dropdown: dropdownMain
            }
        });
        dropdownMain.dispatchEvent(changeEvent);
    } else {
        console.warn(`Dropdown item with value "${valueToSelect}" not found.`);
    }
}
