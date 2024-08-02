console.log('pagination-filtres.js load');

document.addEventListener('DOMContentLoaded', () => {


    //////////// FILTRES :  selections de filtrage
    const openDropdown = (dropdownId, switchId) => {
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

    const initDropdowns = () => {
        openDropdown("tri-categorie", "filter-switch-categorie");
        openDropdown("tri-format", "filter-switch-format");
        openDropdown("tri-date", "filter-switch-date");
    };

    
    ////////////  FILTRATION  ET PAGINATION :  requête AJAX de nouveaux catalogues sur sélection
    let currentPage = 1; 
    let totalPhotos = 0; 

    const newCatalog = (category, format, order, page = 1, append = false) => {

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
            success: (response) => {
                if (response.success) {
                    if (page === 1 || !append) {
                        catalogItems.innerHTML = response.data.html;
                    } else {
                        catalogItems.insertAdjacentHTML('beforeend', response.data.html);
                    }
                    totalPhotos = response.data.total;
                    totalPhotosCount.textContent = `Total photos: ${totalPhotos}`;
                    compterChargerPlus(totalPhotos);
                    //refresh Lightbox sur nouveau DOM (lightbox.js)
                    document.dispatchEvent(new CustomEvent('refreshLightboxEvents'));
                    //refresh fleches défilement sur nouveau DOM (scroll-arrows.js)
                    document.dispatchEvent(new Event('refreshArrowEvents'));
                } else {
                    console.log('Erreur dans la réponse Ajax');
                }
            },
            error: (error) => {
                console.log(error);
            }
        });
    };

     // Fonction pour gérer le bouton "Charger Plus"
    const compterChargerPlus = (total) => {
        const nombrePhotosAffichees = catalogItems.querySelectorAll('.block__photo').length;
        btnChargerPlus.style.display = (nombrePhotosAffichees < total) ? 'block' : 'none';
    };
   // Mise à jour du catalogue en fonction des filtres :
    const elementsCategorie = document.querySelectorAll('#tri-categorie .dropdown__select-option');
    const elementsFormats = document.querySelectorAll('#tri-format .dropdown__select-option');
    const elementsTri = document.querySelectorAll('#tri-date .dropdown__select-option');
    const catalogItems = document.querySelector('.siblings-items');
    const btnChargerPlus = document.getElementById('charger-plus');
    const totalPhotosCount = document.getElementById('total-photos-count');

     // Valeurs par défaut
    let itemsCategorie = 'all';
    let itemsFormat = 'all';
    let itemsTri = 'all';

    initDropdowns();

    // détection  sélection dans "catégories" et filtrage en fonction
    elementsCategorie.forEach(function (element) {
        element.addEventListener("click", function() {
            itemsCategorie = element.id;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    });

    // détection sélection dans "format" et filtrage en fonction
    elementsFormats.forEach(function (element) {
        element.addEventListener("click", function() {
            itemsFormat = element.id;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    });
    
    // détection  sélection dans "tri" et filtrage en fonction
    elementsTri.forEach(function (element) {
        element.addEventListener("click", function() {
            itemsTri = element.id;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    });


    btnChargerPlus.addEventListener('click', () => {
        currentPage++;
        newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage, true);
    });

    ////////////  FILTRES : reset des selections de filtrage
    const categorieLabel = document.querySelector('#tri-categorie .dropdown__filter-selected');
    const formatLabel = document.querySelector('#tri-format .dropdown__filter-selected');
    const dateLabel = document.querySelector('#tri-date .dropdown__filter-selected');

    const categorieFull = document.getElementById('categorie-full');
    const formatFull = document.getElementById('format-full');
    const triFull = document.getElementById('date-full');

    const resetFilter = (elementFull, elements, label, setDefaultValue) => {
        elementFull.addEventListener("click", () => {
            setDefaultValue();
            elements.forEach(element => element.classList.remove('dropdown__select-option--selected'));
            label.textContent = elementFull.textContent;
            currentPage = 1;
            newCatalog(itemsCategorie, itemsFormat, itemsTri, currentPage);
        });
    };

    resetFilter(categorieFull, elementsCategorie, categorieLabel, () => itemsCategorie = 'all');
    resetFilter(formatFull, elementsFormats, formatLabel, () => itemsFormat = 'all');
    resetFilter(triFull, elementsTri, dateLabel, () => itemsTri = 'all');
});
