'use strict';

console.log ('mobile-menu.js load');

document.addEventListener('DOMContentLoaded', () => {

    // Vérifier si la largeur de la fenêtre est inférieure ou égale à 768 pixels
    if (window.innerWidth <= 768) {
        const btnBurgerMenu = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('nav');
        const menuLinks = document.querySelectorAll("nav ul a");

        // État du menu : ouvert ou fermé
        let openModal = false;

        // Fonction pour alterner l'état du menu
        function toggleMenu() {
            openModal = !openModal;
            console.log(openModal);
            openModal ? openMenu() : closeMenu();
        }

        // Fonction pour ouvrir le menu
        function openMenu() {
            btnBurgerMenu.classList.add('active');
            btnBurgerMenu.setAttribute('aria-expanded', 'true');
            mobileMenu.classList.add('open');
            mobileMenu.classList.remove('fadeOut');
            mobileMenu.classList.add('slideRight');
        }

         // Fonction pour fermer le menu
        function closeMenu() {
            btnBurgerMenu.classList.remove('active');
            btnBurgerMenu.setAttribute('aria-expanded', 'false');
            mobileMenu.classList.remove('slideRight');
            mobileMenu.classList.add('fadeOut');
            mobileMenu.classList.remove('open');
            setTimeout(() => {
            mobileMenu.classList.remove('open');
            }, 200);
        }

        
        // Écouter les clics sur le bouton du menu pour alterner l'ouverture/fermeture du menu
        btnBurgerMenu.addEventListener('click', toggleMenu);

        // Fermer le menu lorsque l'un des liens du menu est cliqué
        menuLinks.forEach((menuLink, index) => {
            menuLink.addEventListener("click", (e) => {
            openModal = false;
            closeMenu();
            });
        });
    }
});
