// Gestion de la modale de contact
document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('#menu-header .menu-item');
    const getModale = document.querySelector(".modale");
    const boutonClose = document.querySelector(".close-btn");
    const conteneurModale = document.getElementById("contact-overlay");

    let openModal = false;

    // Fonction pour gérer les clics
    const logClick = (e) => {
        console.log(`clic sur ${e.target.textContent} passe en`, openModal);
    };

    // toggle sur le contact du menu
    const togglePopup = (e) => {
        openModal = !openModal;
        logClick(e);
        openModal ? openPopup() : closePopup();
    };

    // ouverture modale
    const openPopup = () => {
        getModale.classList.remove('hide');
        getModale.classList.add('show');
        setTimeout(() => {
            getModale.style.display = 'flex';
        }, 500); 
    };

    // fermeture modale
    const closePopup = () => {
        getModale.classList.remove('show');
        getModale.classList.add('hide');
        setTimeout(() => {
            getModale.style.display = 'none';
        }, 500); 
    };

    // recherche élément menu "Contact" et écoute
    let menuContact;
    menuItems.forEach(item => {
        if (item.textContent.trim().toLowerCase() === "contact") {
            menuContact = item;
            menuContact.addEventListener('click', togglePopup);
        }
    });

    // fermeture modale au clic sur la croix
    boutonClose.addEventListener('click', (e) => {
        openModal = false;
        logClick(e);
        closePopup();
    });

    // Fermeture modale au clic hors de la modale 
    window.addEventListener('click', (e) => {        
        if (e.target === conteneurModale) {
            openModal = false;
            console.log(`clic sur overlay passe en`,openModal );
            closePopup();
        }
    });

    // soumission du formulaire Contact Form 7
    document.querySelector('.wpcf7-submit').addEventListener('click', (e) => {
        logClick(e);
    });
});
