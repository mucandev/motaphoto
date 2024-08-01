// Gestion du template-part block-photo
'use strict';
console.log(`block-photo.js load`);

function openInfosEvent() {
    let openInfos = document.querySelectorAll("#icon-eye");
    let linkInfos = document.querySelectorAll(".block__linkPhoto");

    for (let i = 0; i < openInfos.length; i++) {
        openInfos[i].addEventListener("click", (e) => {
            e.preventDefault(); 
            console.log(`j'ai cliqué sur ${e.target.alt}`, [i]);
            
            // Récupère l'URL de l'élément correspondant dans linkInfos
            let urlSibling = linkInfos[i].textContent.trim();  
            let linkElement = openInfos[i].parentElement; 

            linkElement.setAttribute('href', urlSibling);
            window.location.href = urlSibling;
        });
    }
}

document.addEventListener('DOMContentLoaded', openInfosEvent);



// A faire après la lightbox
//lightbox
const openLightbox = document.querySelectorAll("#icon-lightbox");
console.log('nodelist iconlightbox', openLightbox)

for (let i=0; i<openLightbox.length; i++) {
    openLightbox[i].addEventListener( "click", (e) =>{
        console.log (`j'ai cliqué sur ${e.target.alt}`, [i])
    })
}



const backPhoto = document.querySelectorAll(".block__photo");
console.log('nodelist photo sibling',backPhoto)