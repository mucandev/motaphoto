// Gestion de la modale de contact
document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('#menu-header .menu-item');
    const getModale = document.querySelector(".modale");
    const boutonClose = document.querySelector(".close-btn");
    const conteneurModale = document.getElementById("contact-overlay");
    
    let openModal = false;

    // toggle sur le contact du menu
    const togglePopup = (e) => {
        openModal = !openModal;
        console.log(`clic sur ${e.target.textContent} passe en`,openModal );
        openModal ? openPopup() : closePopup();
    };

    // ouverture modale
    const openPopup = () => {
        getModale.classList.add('modale-block');
        getModale.classList.remove('modale');
    };

    // fermeture modale
    const closePopup = () => {
        getModale.classList.remove('modale-block');
        getModale.classList.add('modale');
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
        console.log(`clic sur ${e.target.textContent}`);
        openModal = false;
        closePopup();
    });

    // Fermeture modale au clic hors de la modale 
    window.addEventListener('click', (e) => {
        if (e.target === conteneurModale) {
            openModal = false;
            closePopup();
        }
    });
});


