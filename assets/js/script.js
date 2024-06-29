// Gestion de la modale de contact
document.addEventListener("DOMContentLoaded", function () { 
    const menuItems = document.querySelectorAll('#menu-header .menu-item');
	const getModale = document.querySelector(".modale");
	const boutonClose = document.querySelector(".close-btn");
	const conteneurModale = document.getElementById("contact-overlay");
	
    boutonContact.addEventListener("click", function() {
        console.log('clic sur contact')
        // Gestion de la fermeture de la modale - En cliquant à nouveau sur Contact
        if (getModale.style.display === "block") {
            getModale.style.display = "none";
        }
        else {
            getModale.style.display = "block";
        }
    });
    // Recherche élément de menu avec le texte "Contact"
    let menuContact;
    menuItems.forEach(item => {
        if (item.textContent.trim().toLowerCase() === "contact") {
            menuContact = item;
        }
    });

    // Ajout eventListener à l'élément de menu "Contact"
    if (menuContact) {
        menuContact.addEventListener('click', togglePopup);
    } else {
        console.error("L'élément de menu 'Contact' n'a pas été trouvé.");
    }
    

    // Fermeture de la modale lorsqu'on clic sur la croix
    boutonClose.addEventListener("click", function() {
        getModale.style.display = "none";
    });

    // Fermeture de la modale lorsqu'on clic hors de la modale - facultatif
    window.addEventListener('click', (event) => {
        if (event.target === conteneurModale) {
            getModale.style.display = "none";
        }
    });
});
