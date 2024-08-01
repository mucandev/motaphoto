console.log ('mobile-menu.js load');

document.addEventListener('DOMContentLoaded', () => {

    if (window.innerWidth <= 700) {
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
            mobileMenu.classList.add('slideUp');
        }

        function closeMenu() {
            btnBurgerMenu.classList.remove('active');
            btnBurgerMenu.setAttribute('aria-expanded', 'false');
            mobileMenu.classList.remove('slideUp');
            mobileMenu.classList.add('fadeOut');
            setTimeout(() => {
            mobileMenu.classList.remove('open');
            }, 500);
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
