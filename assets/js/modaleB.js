// Gestion de la modale de contact
document.addEventListener("DOMContentLoaded", function () { 
    const menuItems = document.querySelectorAll('#menu-header .menu-item');
	const getModale = document.querySelector(".modale");
	const boutonClose = document.querySelector(".close-btn");
	const conteneurModale = document.getElementById("contact-overlay");

    // recherche élément menu "Contact" et écoute
    let menuContact;
    menuItems.forEach(item => {
        // recherche élément menu "Contact" et écoute
        if (item.textContent.trim().toLowerCase() === "contact") {
            menuContact = item;

            menuContact.addEventListener("click", function() {
                console.log('clic sur contact')
                //  fermeture modale - reclick Contact
                if (getModale.style.display === "block") {
                    getModale.style.display = "none";
                }
                else {
                    getModale.style.display = "block";
                }
            });
        }
    });

	// fermeture modale au clic sur la croix
    boutonClose.addEventListener("click", function() {
        getModale.style.display = "none";
    });

    // Fermeture modale au clic hors de la modale 
    window.addEventListener('click', (event) => {
        if (event.target === conteneurModale) {
            getModale.style.display = "none";
        }
    });
});
