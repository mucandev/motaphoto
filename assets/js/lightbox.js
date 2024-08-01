console.log ('lightbox.js load');

const openLightbox = document.querySelectorAll('#icon-lightbox');
console.log('icon openLightbox', openLightbox)

for (let i=0; i<openLightbox.length; i++) {
    openLightbox[i].addEventListener( "click", (e) =>{
        console.log (`j'ai cliqué sur ${e.target.alt}`, [i])
    })
}

document.addEventListener('DOMContentLoaded', function () {
    const lightbox = document.querySelector('.lightbox');
    const lightboxImage = lightbox.querySelector('.lightbox__image');
    const lightboxRef = lightbox.querySelector('.lightbox__infos--Ref');
    const lightboxCategorie = lightbox.querySelector('.lightbox__infos--Categorie');
    const closeBtn = lightbox.querySelector('.lightbox__close');

    document.querySelectorAll('.blockSurvol__iconLightbox').forEach(function (trigger) {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            const fullImage = trigger.getAttribute('data-full-image');
            const ref = trigger.closest('.blockSurvol').querySelector('.blockSurvol__infos--Ref p').innerText;
            const categorie = trigger.closest('.blockSurvol').querySelector('.blockSurvol__infos--Categorie p').innerText;

            lightboxImage.src = fullImage;
            lightboxRef.innerText = ref;
            lightboxCategorie.innerText = categorie;
            lightbox.style.display = 'flex';
        });
    });

    closeBtn.addEventListener('click', function () {
        lightbox.style.display = 'none';
    });

    lightbox.addEventListener('click', function (event) {
        if (event.target === lightbox) {
            lightbox.style.display = 'none';
        }
    });
});









// const reference = element.querySelector('.blockSurvol__infos--Ref');
// const categorie = element.querySelector('.blockSurvol__infos--Categorie');

