// gestions des options de filtre front-page

console.log ('filters-options load');

document.addEventListener('DOMContentLoaded', function() {

    function openMenu (menuId, optionsId) {
        const menu = document.getElementById(menuId);
        const options = document.getElementById(optionsId);
        const fleche = menu.querySelector(".menu-fleche")
        const hideMenu = document.querySelector('.cache');
        const showMenu = document.querySelector('.visible');

        fleche.addEventListener("click", function (){
            //menu déjà ouvert
            if (options.style.display === 'block') {
                options.style.display = 'none';
                menu.style.borderRadius = "8px";
                menu.classList.remove("menu-ouvert");
                fleche.classList.remove("rotation");
                options.classList.remove("apparition");
                hideMenu.style.display = "none";
                showMenu.style.display = "block";
            } else {
                // menu fermé
                options.style.display = 'block';
                menu.style.borderRadius = "8px 8px 0 0";
                menu.classList.add("menu-ouvert");
                fleche.classList.add("rotation");
                options.classList.add("apparition");
                hideMenu.style.display = "block";
                showMenu.style.display = "none";
            }
        });        
    };

    openMenu( "categorie-titre", "categorie-options");
    openMenu( "format-titre", "format-options");
    openMenu( "tri-titre", "tri-options");

    // gestion de l'option selectionnée*****************************************

    function choixOption(optionsId, titreAModifier){
        const options = document.getElementById(optionsId);
        const choixPossibles = options.querySelectorAll(".menu-option");

        choixPossibles[choixPossibles.length - 1].classList.add("dernier");

        choixPossibles.forEach(function(option, index) {
            option.addEventListener ("click", function(){
                titreAModifier.textContent = option.textContent;

                choixPossibles.forEach(function(choix){
                    choix.classList.remove("selectionne");
                    choix.classList.remove("dernier-selectionne");
                });

                option.classList.add("selectionne")

                if(index=== choixPossibles.length - 1) {
                    option.classList.add("dernier-selectionne")
                }
            })
        });
    }

    //emplacement du titre à mettre à jour avec option choisie
    const categorieZone = document.querySelector("#categorie-titre .menu-titre");
    const formatZone = document.querySelector("#format-titre .menu-titre");
    const triZone = document.querySelector("#tri-titre .menu-titre");

    choixOption("categorie-options", categorieZone);
    choixOption("format-options", formatZone);
    choixOption("tri-options", triZone);


});

