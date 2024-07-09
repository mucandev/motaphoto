<!-- template block photo -->
<?php
// Récupérer pour chaque photo : infos
//titre :   
//  $titre_post = get_the_title();
//url :    
//  $lien_post = get_site_url().'/photographies/'
//photo :
//  $photo_post = get_the_content();


//catégorie
?>
<div class="sibling">
    <img class="sibling-photo-img" src="#" alt="" />
    <div class="sibling-survol">
        <div class="sibling-overlay">
            <div class="sibling-above">
                <div class="sibling-lightbox-expand">
                    <div class="sibling-lightbox-expand-icon">
                        <i class="fa-solid fa-expand"></i>
                        <!-- clic  script sur modale-lightbox -->
                    </div>                    
                </div>
                <div class="sibling-info-eye">
                    <div class="sibling-info-eye-icon">
                        <i class="fa-regular fa-eye"></i>
                    <!-- clic lien  echo get_permalink(); -->
                    </div>
                </div>
                <div class="sibling-infos">
                    <div class="sibling-infos-ref">
                        <p>référence de la photo</p>
                    </div>
                    <div class="sibling-infos-categorie">
                        <p>catégorie</p>
                    </div>
            </div>
            </div>

        </div>
    </div>
</div>



