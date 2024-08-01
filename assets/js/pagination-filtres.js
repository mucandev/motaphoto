<<<<<<< HEAD
console.log('pagination-filtres.js load');

document.addEventListener('DOMContentLoaded', () => {
    const openDropdown = (dropdownId, switchId) => {
=======

console.log('pagination-filtres.js load');
// Code exécuté une fois le DOM entièrement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour gérer l'ouverture et la sélection des dropdowns
    function openDropdown(dropdownId, switchId) {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
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
    };

<<<<<<< HEAD
    const initDropdowns = () => {
=======
    // Initialisation des dropdowns
    function initDropdowns() {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
        openDropdown("tri-categorie", "filter-switch-categorie");
        openDropdown("tri-format", "filter-switch-format");
        openDropdown("tri-date", "filter-switch-date");
    };

<<<<<<< HEAD
    const initEventItems = (elements, callback) => {
        elements.forEach(element => {
            element.addEventListener("click", () => {
=======
        //////////////////////////////////////////////////
        
    // Fonction pour initialiser les événements sur les éléments de filtre
    function initEventItems(elements, callback) {
        elements.forEach(function (element) {
            element.addEventListener("click", function() {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
                callback(element);
            });
        });
    };

<<<<<<< HEAD
    let currentPage = 1; 
    let totalPhotos = 0; 

    const newCatalog = (category, format, order, page = 1, append = false) => {
=======
    let currentPage = 1; // Variable pour suivre la page actuelle
    let totalPhotos = 0; // Variable pour stocker le nombre total de photos

    // Fonction pour effectuer la requête AJAX et mettre à jour le catalogue
    function newCatalog(category, format, order, page = 1, append = false) {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
        jQuery.ajax({
            url: myAjax.ajaxurl,
            method: 'POST',
            data: {
                action: 'filtrer_paginer_catalogue',
                category: category,
                format: format,
                order: order,
                page: page,
                nonce: myAjax.nonce
            },
<<<<<<< HEAD
            success: (response) => {
=======
            success: function(response) {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
                if (response.success) {
                    if (page === 1 || !append) {
                        catalogItems.innerHTML = response.data.html;
                    } else {
                        catalogItems.insertAdjacentHTML('beforeend', response.data.html);
                    }
                    totalPhotos = response.data.total;
                    totalPhotosCount.textContent = `Total photos: ${totalPhotos}`;
                    compterChargerPlus(totalPhotos);

<<<<<<< HEAD
                    document.dispatchEvent(new Event('ajaxComplete'));
                    document.dispatchEvent(new CustomEvent('refreshLightboxEvents'));
=======
                    // réintialisation des fonctions déjà exécutées
                    openInfosEvent(); 
                     //lightbox
                    document.dispatchEvent(new Event('ajaxComplete')); // events scroll-arrow.js
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
                } else {
                    console.log('Erreur dans la réponse Ajax');
                }
            },
            error: (error) => {
                console.log(error);
            }
        });
    };

<<<<<<< HEAD
    const compterChargerPlus = (total) => {
        const nombrePhotosAffichees = catalogItems.querySelectorAll('.block__photo').length;
        BtnChargerPlus.style.display = (nombrePhotosAffichees < total) ? 'block' : 'none';
    };
=======
    // Fonction pour gérer l'affichage du bouton "Charger Plus"
    function compterChargerPlus(total) {
        const nombrePhotosAffichees = catalogItems.querySelectorAll('.block__photo').length;
        BtnChargerPlus.style.display = (nombrePhotosAffichees < total) ? 'block' : 'none';
    }
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b

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

<<<<<<< HEAD
=======
    // Initialisation des événements des filtres
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
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

<<<<<<< HEAD
=======
    // Événement pour le bouton "Charger Plus"
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
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

<<<<<<< HEAD
    const resetFilter = (elementFull, elements, label, setDefaultValue) => {
        elementFull.addEventListener("click", () => {
=======
    // Fonction pour réinitialiser les filtres
    function resetFilter(elementFull, elements, label, setDefaultValue) {
        elementFull.addEventListener("click", function() {
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
            setDefaultValue();
            elements.forEach(element => element.classList.remove('dropdown__select-option--selected'));
            label.textContent = elementFull.textContent;
            currentPage = 1;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    };

<<<<<<< HEAD
=======
    // Réinitialisation des filtres pour chaque type de filtre
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
    resetFilter(categorieFull, elementsCategorie, categorieLabel, () => itemsCategorie = 'all');
    resetFilter(formatFull, elementsFormats, formatLabel, () => itemsFormat = 'all');
    resetFilter(triFull, elementsTri, dateLabel, () => itemsTri = 'all');
});
