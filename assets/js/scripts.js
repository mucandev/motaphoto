'use strict';
console.log ('scripts.js load');

document.addEventListener('DOMContentLoaded', () => {
    
    // Gestion longueur h2 sur single_photographies
    const titleDescription = document.querySelector('.description > h2');  
    if (titleDescription) {
        // Vérifier la longueur du textContent
        if (titleDescription.textContent.length >= 16) {
            titleDescription.style.maxWidth = '100%';
        } 
         // Vérifier si un mot fait plus de 10 caractères
        const words = titleDescription.textContent.split(' ');
        const hasLongWord = words.some(word => word.length > 11);
        if (hasLongWord) {
            titleDescription.style.wordBreak = 'break-word';
        }         
    }

// Gestion évènement tactile sur block-photo
    if (window.innerWidth <= 1040) { 
        const blocks = document.querySelectorAll('.block');

        blocks.forEach(block => {
            const blockSurvol = block.querySelector('.blockSurvol');

             // Ajouter une classe lors d'une touche tactile
            block.addEventListener('touchstart', () => {
                blockSurvol.classList.add('touch-hover');
            });

             // Retirer la classe après avoir fini de toucher
            block.addEventListener('touchend', () => {
                setTimeout(() => {
                    blockSurvol.classList.remove('touch-hover');
                }, 300); 
            });

            // Retirer la classe si le doigt glisse/déplace sur l'élément
            block.addEventListener('touchmove', () => {
                blockSurvol.classList.remove('touch-hover');
            });
        });
    }
})





