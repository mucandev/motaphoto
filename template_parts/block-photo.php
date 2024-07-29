<?php
    // template block-photo
    // Récupération informations photo sibling
    $titre_post = get_the_title();
    $titre_slug = sanitize_title($titre_post);
    $lien_post = get_site_url().'/photographies/'. $titre_slug;
    // 'medium' custom size 
    $photo_post = get_the_post_thumbnail(get_the_ID(), 'medium');
    $reference_photo = get_field('reference');
    $date_post = get_the_date('Y');

// Récupération format  photo et stockage pour filtrage : HOME
    $formats = get_the_terms(get_the_ID(), 'formats');
        if ($formats && !is_wp_error($formats)) {
            $noms_formats = array();
            foreach ($formats as $format) {
                $noms_formats[] = $format->name;
            }
            $liste_formats = join(', ', $noms_formats);
        }

    // Récupération  catégorie photo et stockage pour filtrage
    $categories = get_the_terms(get_the_ID(), 'photocategories');
        if ($categories && !is_wp_error($categories)) {
            $noms_categories = array();
            foreach ($categories as $categorie) {
                $noms_categories[] = $categorie->name;
            }
            $liste_categories = join(', ', $noms_categories);
        }
?>
<div class="block">
    <div class="block__linkPhoto">
        <?= $lien_post; ?>
    </div>
    <div class="block__photo">
        <?= $photo_post; ?>
    </div>

    <div class="blockSurvol">
        <div class="blockSurvol__overlay">
            <div class="blockSurvol__iconLightbox">
                <a href="#">
                    <img id="icon-lightbox" src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-lightbox.svg' ?>" alt="lightbox" />
                </a>
            </div>
            <div class="blockSurvol__iconEye">
                <a href="#">
                    <img id="icon-eye" src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-eye.svg' ?>" alt="infos photo" />
                </a>
            </div>
            <div class="blockSurvol__infos">
                <div class="blockSurvol__infos--Ref">
                <p><?= $reference_photo ?></p>
                </div>
                <div class="blockSurvol__infos--Categorie">
                    <p><?=  $liste_categories ?></p>
                </div>
            </div>
        </div>
    </div>
    
</div>



