// Gestion de block-photo
console.log('bloc-photo.js chargé')

const openInfos = document.querySelectorAll(".icon-eye");
console.log(openInfos)
const linkPhoto = document.querySelectorAll(".block-photo");
console.log(linkPhoto)
const linkInfos = document.querySelectorAll(".block-lien-photo");
console.log(linkInfos)
const openLightbox = document.querySelectorAll(".icon-lightbox");
console.log(openLightbox)

for (let i=0; i<openInfos.length; i++) {
    openInfos[i].addEventListener( "click", (e) =>{
        console.log (`j'ai cliqué sur ${e.target.alt}`,[i], linkInfos[i].firstChild)  
    })
}


for (let i=0; i<openLightbox.length; i++) {
    openLightbox[i].addEventListener( "click", (e) =>{
        console.log (`j'ai cliqué sur ${e.target.alt}`, [i])
    })
}
