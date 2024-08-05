'use strict';

console.log ('mobile-menu.js load');

document.addEventListener('DOMContentLoaded', () => {

    if (window.innerWidth <= 768) {
        const btnBurgerMenu = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('nav');
        const menuLinks = document.querySelectorAll("nav ul a");

        let openModal = false;

        function toggleMenu() {
            openModal = !openModal;
            console.log(openModal);
            openModal ? openMenu() : closeMenu();
        }

        function openMenu() {
            btnBurgerMenu.classList.add('active');
            btnBurgerMenu.setAttribute('aria-expanded', 'true');
            mobileMenu.classList.add('open');
            mobileMenu.classList.remove('fadeOut');
            mobileMenu.classList.add('slideRight');
        }

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

        //toggle principal
        btnBurgerMenu.addEventListener('click', toggleMenu);

        menuLinks.forEach((menuLink, index) => {
            menuLink.addEventListener("click", (e) => {
            openModal = false;
            closeMenu();
            });
        });
    }
});
