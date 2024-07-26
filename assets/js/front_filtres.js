// gestions des options de filtre front-page

console.log ('front_filters.js load');

document.addEventListener('DOMContentLoaded', function() {

    function openDropdown (dropdownId, switchId ) {

        const dropdown = document.querySelector(`#${dropdownId}`);
        const toggle = dropdown.querySelector(`#${switchId}`);

        if (!dropdown || !toggle) return;             

		// Change option selected
        const label = dropdown.querySelector('.dropdown__filter-selected');
        const options = Array.from(dropdown.querySelectorAll('.dropdown__select-option'))

        options.forEach((option) => {
            option.addEventListener('click', () => {

                label.textContent = option.textContent;

                options.forEach(opt => opt.classList.remove('dropdown__select-option--selected'));

                // Ajouter la classe de sélection à l'option cliquée
                option.classList.add('dropdown__select-option--selected');

                // Fermer le dropdown après la sélection
                toggle.checked = false;

            })
        })

        // Close dropdown onclick outside        
        document.addEventListener('click', (e) => {
            const element = e.target;

            if (element === toggle || element.closest(`#${dropdownId}`)) return;

            toggle.checked = false;
        });
    };

    openDropdown( "tri-categorie", "filter-switch-categorie");
    openDropdown( "tri-format", "filter-switch-format");
    openDropdown( "tri-date", "filter-switch-date");
	
});

