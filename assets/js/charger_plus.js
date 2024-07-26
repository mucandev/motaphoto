// import { openInfosEvent } from './block-photo.js';

console.log ('charger_plus.js load');

document.addEventListener('DOMContentLoaded', function (){
    //initialisation de la page
    let page = 1;
    let ordreTriage = 'ASC';

    const selectionTriDESC = document.getElementById('DESC');
    console.log('selectionTriDESC',selectionTriDESC)
    const catalog = document.querySelector('.catalog');
    const catalogItems = document.querySelector('.siblings-items');
    const chargerPlusBouton = document.getElementById('charger-plus');

    chargerPlusBouton.addEventListener("click",async function(){
        ordreTriage = selectionTriDESC.classList.contains("dropdown__select-option--selected") ? 'DESC' : 'ASC';

        // incrementation du numero de page
        page++;

        //création d'un objet pour envoyer la requête
        const data = new URLSearchParams();
        data.append('action', 'charger_plus');
        data.append('page', page);
        data.append('order', ordreTriage);
        //ajout du nonce de sécurité
        data.append('nonce', myAjax.nonce);

        try {
            //envoi de la requête
            const reponse = await fetch(myAjax.ajaxurl, {
                method: 'POST',
                body: data,
            });

            if(reponse.ok) {
                //Réception de la réponse de la requête
                const responseData = await reponse.text();
                catalogItems.insertAdjacentHTML('beforeend', responseData);

                //Ajout d'un compte pour masquer le bouton si éléments < 8u
                const parser = new DOMParser();
                const doc = parser.parseFromString(responseData, 'text/html')
                const itemsCompte = doc.querySelectorAll('img .block-photo').length;
                console.log(' itemsCompte',  itemsCompte)
                // //l'overlay de chaque photo se charge au clic sur le bouton
                openInfosEvent()
                // lightbox();

                //si moins de 8 éléments, le bouton disparait
                if ( itemsCompte < 8){
                    chargerPlusBouton.style.display = 'none';
                }
            } else {
                chargerPlusBouton.style.display = 'none';
                //création d'un message d'erreur
                const erreurMessage = document.createElement('div');
                erreurMessage.textContent = 'une erreur s\'est produite lors du chargement';
                catalog.appendChild(erreurMessage);
            }
        } catch(error) {
            //capture des erreurs afin de les rendre visibles dans la console
            console.error ('une erreur s\'est produite : ', error);
        }
    })

})