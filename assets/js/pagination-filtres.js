
console.log('pagination-filtres.js load');
// Code exécuté une fois le DOM entièrement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour gérer l'ouverture et la sélection des dropdowns
    function openDropdown(dropdownId, switchId) {
        const dropdown = document.querySelector(`#${dropdownId}`);
        const toggle = dropdown.querySelector(`#${switchId}`);

        if (!dropdown || !toggle) return;

        const label = dropdown.querySelector('.dropdown__filter-selected');
        const options = Array.from(dropdown.querySelectorAll('.dropdown__select-option'));

        options.forEach((option) => {
            option.addEventListener('click', () => {
                label.textContent = option.textContent;
                options.forEach(opt => opt.classList.remove('dropdown__select-option--selected'));
                option.classList.add('dropdown__select-option--selected');
                toggle.checked = false;
            });
        });

        document.addEventListener('click', (e) => {
            if (e.target === toggle || e.target.closest(`#${dropdownId}`)) return;
            toggle.checked = false;
        });
    }

    // Initialisation des dropdowns
    function initDropdowns() {
        openDropdown("tri-categorie", "filter-switch-categorie");
        openDropdown("tri-format", "filter-switch-format");
        openDropdown("tri-date", "filter-switch-date");
    }

        //////////////////////////////////////////////////
        
    // Fonction pour initialiser les événements sur les éléments de filtre
    function initEventItems(elements, callback) {
        elements.forEach(function (element) {
            element.addEventListener("click", function() {
                callback(element);
            });
        });
    }

    let currentPage = 1; // Variable pour suivre la page actuelle
    let totalPhotos = 0; // Variable pour stocker le nombre total de photos

    // Fonction pour effectuer la requête AJAX et mettre à jour le catalogue
    function newCatalog(category, format, order, page = 1, append = false) {
        jQuery.ajax({
            url: myAjax.ajaxurl,
            method: 'POST',
            data: {
                action: 'filtrer_photos',
                category: category,
                format: format,
                order: order,
                page: page,
                nonce: myAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    if (page === 1 || !append) {
                        catalogItems.innerHTML = response.data.html;
                    } else {
                        catalogItems.insertAdjacentHTML('beforeend', response.data.html);
                    }
                    totalPhotos = response.data.total;
                    totalPhotosCount.textContent = `Total photos: ${totalPhotos}`;
                    compterChargerPlus(totalPhotos);

                    // réintialisation des fonctions déjà exécutées
                    openInfosEvent(); 
                     //lightbox
                    document.dispatchEvent(new Event('ajaxComplete')); // events scroll-arrow.js
                } else {
                    console.log('Erreur dans la réponse Ajax');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    // Fonction pour gérer l'affichage du bouton "Charger Plus"
    function compterChargerPlus(total) {
        const nombrePhotosAffichees = catalogItems.querySelectorAll('.block__photo').length;
        BtnChargerPlus.style.display = (nombrePhotosAffichees < total) ? 'block' : 'none';
    }

    const elementsCategorie = document.querySelectorAll('#tri-categorie .dropdown__select-option');
    const elementsFormats = document.querySelectorAll('#tri-format .dropdown__select-option');
    const elementsTri = document.querySelectorAll('#tri-date .dropdown__select-option');
    const catalogItems = document.querySelector('.siblings-items');
    const BtnChargerPlus = document.getElementById('charger-plus');
    const totalPhotosCount = document.getElementById('total-photos-count');

    let itemsCategorie = 'all';
    let itemsFormat = 'all';
    let itemsTri = 'all';

    // Initialisation des dropdowns
    initDropdowns();

    // Initialisation des événements des filtres
    initEventItems(elementsCategorie, (element) => {
        itemsCategorie = element.id;
        currentPage = 1;
        newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
    });

    initEventItems(elementsFormats, (element) => {
        itemsFormat = element.id;
        currentPage = 1;
        newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
    });

    initEventItems(elementsTri, (element) => {
        itemsTri = element.id;
        currentPage = 1;
        newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
    });

    // Événement pour le bouton "Charger Plus"
    BtnChargerPlus.addEventListener('click', () => {
        currentPage++;
        newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage, true);
    });

    const categorieLabel = document.querySelector('#tri-categorie .dropdown__filter-selected');
    const formatLabel = document.querySelector('#tri-format .dropdown__filter-selected');
    const dateLabel = document.querySelector('#tri-date .dropdown__filter-selected');

    const categorieFull = document.getElementById('categorie-full');
    const formatFull = document.getElementById('format-full');
    const triFull = document.getElementById('date-full');

    // Fonction pour réinitialiser les filtres
    function resetFilter(elementFull, elements, label, setDefaultValue) {
        elementFull.addEventListener("click", function() {
            setDefaultValue();
            elements.forEach(element => element.classList.remove('dropdown__select-option--selected'));
            label.textContent = elementFull.textContent;
            currentPage = 1;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    }

    // Réinitialisation des filtres pour chaque type de filtre
    resetFilter(categorieFull, elementsCategorie, categorieLabel, () => itemsCategorie = 'all');
    resetFilter(formatFull, elementsFormats, formatLabel, () => itemsFormat = 'all');
    resetFilter(triFull, elementsTri, dateLabel, () => itemsTri = 'all');
});
