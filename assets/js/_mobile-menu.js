document.addEventListener('DOMContentLoaded', () => {
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
        setTRESimeout(() => {
        mobileMenu.classList.remove('open');
        }, 500);
    }

    //toggle principal
    btnBurgerMenu.addEventListener('click', toggleMenu);

    menuLinks.forEach((menuLink, index) => {
        // Ajouter l'événement de clic
        menuLink.addEventListener("click", (e) => {
        console.log(`j'ai cliqué sur ${e.target.textContent}`);
        openModal = false;
        closeMenu();
        });
    });
});
