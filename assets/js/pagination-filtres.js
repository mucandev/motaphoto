// Gestion des options de filtre front-page
console.log('front_filters.js load');

document.addEventListener('DOMContentLoaded', function() {

    // Fonction pour ouvrir et gérer les dropdowns
    function openDropdown(dropdownId, switchId) {
        const dropdown = document.querySelector(`#${dropdownId}`);
        const toggle = dropdown.querySelector(`#${switchId}`);

        if (!dropdown || !toggle) return;

        // Change option selected
        const label = dropdown.querySelector('.dropdown__filter-selected');
        const options = Array.from(dropdown.querySelectorAll('.dropdown__select-option'));

        options.forEach((option, index) => {
            option.addEventListener('click', () => {
                label.textContent = option.textContent;
                options.forEach(opt => opt.classList.remove('dropdown__select-option--selected'));
                option.classList.add('dropdown__select-option--selected');
                toggle.checked = false;
            });
        });

        // Close dropdown onclick outside
        document.addEventListener('click', (e) => {
            if (e.target === toggle || e.target.closest(`#${dropdownId}`)) return;
            toggle.checked = false;
        });
    }

    function initDropdowns() {
        openDropdown("tri-categorie", "filter-switch-categorie");
        openDropdown("tri-format", "filter-switch-format");
        openDropdown("tri-date", "filter-switch-date");
    }

    //////////////////////////////////////////////////////

    // Fonction pour ajouter des événements aux éléments de filtre
    function initEventItems(elements, callback) {
        elements.forEach(function (element) {
            element.addEventListener("click", function() {
                callback(element);
            });
        });
    }

    // Fonction pour envoyer une requête AJAX et mettre à jour le catalogue
    function newCatalog(category, format, order) {
        jQuery.ajax({
            url: myAjax.ajaxurl,
            method: 'POST',
            data: {
                action: 'filtrer_photos',
                category: category,
                format: format,
                order: order,
                nonce: myAjax.nonce
            },
            success: function(response) {
                catalogItems.innerHTML = response;
                compterChargerPlus();
                openInfosEvent();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Fonction pour gérer le bouton "Charger Plus"
    function compterChargerPlus() {
        const nombrePhotos = catalogItems.querySelectorAll('.block-photo').length;
        BtnChargerPlus.style.display = (nombrePhotos < 8) ? 'none' : 'block';
    }

    const elementsCategorie = document.querySelectorAll('#tri-categorie .dropdown__select-option');
    const elementsFormats = document.querySelectorAll('#tri-format .dropdown__select-option');
    const elementsTri = document.querySelectorAll('#tri-date .dropdown__select-option');
    const catalogItems = document.querySelector('.siblings-items');
    const BtnChargerPlus = document.getElementById('charger-plus');

    // Valeurs par défaut
    let itemsCategorie = 'all';
    let itemsFormat = 'all';
    let itemsTri = 'all';

    initDropdowns();

    // Gestion des événements des filtres
    initEventItems(elementsCategorie, (element) => {
        itemsCategorie = element.id;
        newCatalog(itemsCategorie, itemsFormat, itemsTri);
    });

    initEventItems(elementsFormats, (element) => {
        itemsFormat = element.id;
        newCatalog(itemsCategorie, itemsFormat, itemsTri);
    });

    initEventItems(elementsTri, (element) => {
        itemsTri = element.id;
        newCatalog(itemsCategorie, itemsFormat, itemsTri);
    });


    // Fonction pour réinitialiser les filtres
    const categorieLabel = document.querySelector('#tri-categorie .dropdown__filter-selected');
    const formatLabel = document.querySelector('#tri-format .dropdown__filter-selected');
    const dateLabel = document.querySelector('#tri-date .dropdown__filter-selected');

    const categorieFull = document.getElementById('categorie-full');
    const formatFull = document.getElementById('format-full');
    const triFull = document.getElementById('date-full');

    function resetFilter(elementFull, elements, label, setDefaultValue) {
        elementFull.addEventListener("click", function() {
            setDefaultValue(); 
            elements.forEach(element => element.classList.remove('dropdown__select-option--selected'));
            label.textContent = elementFull.textContent;
            newCatalog(itemsCategorie, itemsFormat, itemsTri);
        });
    }

    // Réinitialisation des filtres
    resetFilter(categorieFull, elementsCategorie, categorieLabel, () => itemsCategorie = 'all');
    resetFilter(formatFull, elementsFormats, formatLabel, () => itemsFormat = 'all');
    resetFilter(triFull, elementsTri, dateLabel, () => itemsTri = 'all');

});



