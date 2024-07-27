console.log ('single_photographies.js load');

// Gestion longueur titre h2
document.addEventListener('DOMContentLoaded', () => {
    const titleDescription = document.querySelector('.description > h2');  

    if (titleDescription) {
        // Vérifier la longueur du textContent
        if (titleDescription.textContent.length >= 18) {
            // Modifier la règle CSS
            titleDescription.style.maxWidth = '100%';
        } else {
            // Appliquer la règle initiale
        }
    }

})


