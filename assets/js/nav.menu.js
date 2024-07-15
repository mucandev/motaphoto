document.addEventListener('DOMContentLoaded', () => {
    const btnBurgerMenu = document.querySelector('.menu-toggle');
    const fullScreenMenu = document.querySelector('.fullScreenMenu');
    const siteNav = document.getElementById("site-navigation");
    const menuLinks = document.querySelectorAll(".fullScreenMenu ul a");

    let openModal = false;

    function toggleMenu() {
        openModal = !openModal;
        console.log(openModal);
        openModal ? openMenu() : closeMenu();
    }

    function openMenu() {
        btnBurgerMenu.classList.add('active');
        fullScreenMenu.classList.add('open');
        fullScreenMenu.classList.remove('fadeOut');
        fullScreenMenu.classList.add('fadeInDown');
    }

    function closeMenu() {
        fullScreenMenu.classList.remove('fadeInDown');
        fullScreenMenu.classList.add('fadeOut');
        btnBurgerMenu.classList.remove('active');
        btnBurgerMenu.setAttribute('aria-expanded', 'false');
        siteNav.classList.remove('toggled');
        setTimeout(() => {
        fullScreenMenu.classList.remove('open');
        }, 400); 
    }

    //toggle principal
    btnBurgerMenu.addEventListener('click', toggleMenu);

    menuLinks.forEach((menuLink, index) => {
        // Ajouter la classe et définir le délai d'animation
        menuLink.classList.add('fadeInDbUp');
        if (index > 0) {
        menuLink.style.animationDelay = `${index * 0.2}s`;
        }
        // Ajouter l'événement de clic
        menuLink.addEventListener("click", (e) => {
        console.log(`j'ai cliqué sur ${e.target.textContent}`);
        openModal = false;
        closeMenu();
        });
    });
});

