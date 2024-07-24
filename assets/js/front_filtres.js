// gestions des options de filtre front-page

console.log ('front_filters load');

document.addEventListener('DOMContentLoaded', function() {

    function openDropdown (dropdownId, switchId ) {

        const dropdown = document.querySelector(`#${dropdownId}`);
        if (!dropdown) return;             

		// Change option selected
        const label = dropdown.querySelector('.dropdown__filter-selected');
        const options = Array.from(dropdown.querySelectorAll('.dropdown__select-option'))

        options.forEach((option) => {
            option.addEventListener('click', () => {
                label.textContent = option.textContent;
            })
        })

        // Close dropdown onclick outside        
        document.addEventListener('click', (e) => {
            const toggle = dropdown.querySelector(`#${switchId}`);
            const element = e.target

            if (element == toggle) return;

            const isDropdownChild = element.closest(`#${dropdownId}`);		
            
            if (!isDropdownChild) {
                toggle.checked = false
            }
        });   
    };

    openDropdown( "tri-categorie", "filter-switch-categorie");
    openDropdown( "tri-format", "filter-switch-format");
    openDropdown( "tri-date", "filter-switch-date");
	
});

