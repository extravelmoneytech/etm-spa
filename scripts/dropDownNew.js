const Dropdown = {
    instances: new Map(),

    init(elementId, config = {}) {
        const element = document.getElementById(elementId);
        if (!element) return null;

        const {
            searchable = false,
            customSelected = null,
            onSelect = () => { },
            onOpen = () => { },
            onClose = () => { }
        } = config;

        const instance = {
            element,
            state: {
                isOpen: false,
                selectedValue: null,
                selectedItem: null
            },
            config: {
                searchable,
                customSelected,
                onSelect,
                onOpen,
                onClose
            }
        };

        // Cache DOM elements
        instance.elements = {
            selectedDisplay: element.querySelector('.selectedItem'),
            dropdownList: element.querySelector('.dropdownList'),
            items: element.querySelectorAll('li'),
            arrow: element.querySelector('.dropdownArrow')
        };

        // Create search container and input
        const searchContainer = document.createElement('div');
        searchContainer.className = 'sticky top-0 bg-white z-10 border-b border-gray-200';

        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.className = 'dropdownSearch w-full p-2 outline-none';
        searchInput.placeholder = 'Type to search...';

        searchContainer.appendChild(searchInput);
        instance.elements.dropdownList.insertBefore(searchContainer, instance.elements.dropdownList.firstChild);
        instance.elements.searchInput = searchInput;

        // Find and select default item if specified
        const defaultItem = Array.from(instance.elements.items).find(item => item.hasAttribute('selected'));
        if (defaultItem) {
            this.select(instance, defaultItem, true); // true for silent selection (no events)
        }

        // Event Handlers
        const handlers = {
            toggle: (e) => {
                if (e.target.closest('.dropdownSearch') || e.target.closest('li')) return;
                this.toggle(instance);
            },

            select: (e) => {
                const item = e.target.closest('li');
                if (!item) return;
                // Remove 'selected' from previous item and add to new one
                instance.elements.items.forEach(i => i.removeAttribute('selected'));
                item.setAttribute('selected', '');

                this.select(instance, item);
                this.close(instance); // Explicitly close after selection
                e.stopPropagation(); // Stop event bubbling
            },

            search: (e) => {
                const query = e.target.value.toLowerCase();
                this.filterItems(instance, query);
            },

            keydown: (e) => {
                if (!instance.state.isOpen) {
                    if (e.key === 'Enter' || e.key === ' ' || e.key === 'ArrowDown') {
                        this.open(instance);
                        e.preventDefault();
                    }
                    return;
                }

                switch (e.key) {
                    case 'Escape':
                        this.close(instance);
                        break;
                    case 'Enter':
                        const visibleItems = Array.from(instance.elements.items)
                            .filter(item => item.style.display !== 'none');
                        if (visibleItems.length === 1) {
                            this.select(instance, visibleItems[0]);
                        }
                        break;
                }
            },

            outsideClick: (e) => {
                if (!element.contains(e.target)) {
                    this.close(instance);
                }
            }
        };

        // Bind Events
        element.addEventListener('click', handlers.toggle);
        instance.elements.dropdownList.addEventListener('click', handlers.select);
        instance.elements.searchInput.addEventListener('input', handlers.search);
        instance.elements.searchInput.addEventListener('click', e => e.stopPropagation());
        element.addEventListener('keydown', handlers.keydown);
        document.addEventListener('click', handlers.outsideClick);

        instance.handlers = handlers;
        this.instances.set(elementId, instance);

        return instance;
    },

    select(instance, item, silent = false) {
        if (!item) return;

        // Refresh items reference
        instance.elements.items = instance.elements.dropdownList.querySelectorAll('li');

        const { selectedDisplay, items } = instance.elements;
        const { customSelected, onSelect } = instance.config;

        // Remove previous selection
        items.forEach(i => i.classList.remove('selectedDropDownItem'));
        item.classList.add('selectedDropDownItem');

        // Update selected display
        if (customSelected) {
            selectedDisplay.innerHTML = customSelected(item);
        } else {
            selectedDisplay.innerHTML = item.innerHTML;
        }

        // Update state
        instance.state.selectedValue = item.getAttribute('value');
        instance.state.selectedItem = item;

        // Trigger events if not silent
        if (!silent) {
            const event = new CustomEvent('dropdownChange', {
                detail: {
                    value: instance.state.selectedValue,
                    text: item.textContent,
                    element: instance.element
                }
            });
            instance.element.dispatchEvent(event);
            onSelect(instance.state.selectedValue, item);
        }
    },

    filterItems(instance, query) {
        // Refresh items reference
        instance.elements.items = instance.elements.dropdownList.querySelectorAll('li');

        const items = instance.elements.items;
        let found = false;

        Array.from(items).forEach(item => {
            const text = item.textContent.toLowerCase();
            const matches = text.includes(query);
            item.style.display = matches ? '' : 'none';
            if (matches) found = true;
        });

        // Show "no results" message if needed
        let noResults = instance.elements.dropdownList.querySelector('.no-results');
        if (!found) {
            if (!noResults) {
                noResults = document.createElement('div');
                noResults.className = 'no-results p-2 text-gray-500 text-center';
                noResults.textContent = 'No matches found';
                instance.elements.dropdownList.appendChild(noResults);
            }
        } else if (noResults) {
            noResults.remove();
        }
    },

    toggle(instance) {
        instance.state.isOpen ? this.close(instance) : this.open(instance);
    },

    open(instance) {
        instance.state.isOpen = true;
        instance.element.classList.add('open');

        // Check if the device is mobile (basic check using window width or user agent)
        const isMobile = window.innerWidth <= 768 || /Mobi|Android/i.test(navigator.userAgent);

        if (!isMobile) {
            instance.elements.searchInput.focus(); // Only focus if it's not a mobile device
        }

        instance.config.onOpen();
    },

    close(instance) {
        instance.state.isOpen = false;
        instance.element.classList.remove('open');
        instance.elements.searchInput.value = '';
        this.filterItems(instance, ''); // Reset search results
        instance.config.onClose();
    },

    getValue(elementId) {
        const instance = this.instances.get(elementId);
        return instance ? instance.state.selectedItem : null;
    },

    setValue(elementId, value) {
        const instance = this.instances.get(elementId);
        if (!instance) return;

        const item = Array.from(instance.elements.items).find(i => i.getAttribute('value') === value);
        if (item) {
            this.select(instance, item);
        }
    },

    destroy(elementId) {
        const instance = this.instances.get(elementId);
        if (!instance) return;

        const { element, handlers } = instance;

        element.removeEventListener('click', handlers.toggle);
        instance.elements.dropdownList.removeEventListener('click', handlers.select);
        instance.elements.searchInput.removeEventListener('input', handlers.search);
        element.removeEventListener('keydown', handlers.keydown);
        document.removeEventListener('click', handlers.outsideClick);

        this.instances.delete(elementId);
    }
};