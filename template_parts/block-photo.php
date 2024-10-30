<?php
    // Récupération des informations de la photo associée au post
    $photo_post = get_the_post_thumbnail(get_the_ID(), 'medium');
    $reference_photo = get_field('reference');
    $date_post = get_the_date('Y');
    $titre_post = get_the_title();
    $titre_slug = sanitize_title($titre_post);
    $lien_post = get_site_url().'/photographies/'. $titre_slug;
    $photo_post_full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
// Récupération format  photo et stockage pour filtrage 
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
    <div class="block__photo">        
        <?= $photo_post; ?>
    </div>
    <div class="blockSurvol">
        <div class="blockSurvol__overlay">
            <button class="blockSurvol__iconLightbox" type="button" aria-label="ouvrir une lightbox sur la photo : <?php the_title(); ?>" data-full-image="<?= $photo_post_full[0]; ?>">
                <img src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-lightbox.svg' ?>" alt="lightbox" />
            </button>
            <a class="blockSurvol__iconEye" href=" <?= $lien_post; ?>" aria-label="obtenir les infos de la photo : <?php the_title(); ?>">
                <img id="icon-eye" src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-eye.svg' ?>" alt="Afficher les infos de la photo" />
            </a>
            <div class="blockSurvol__infos">
                <div class="blockSurvol__infos--Ref" aria-label="référence de la photo : <?php the_title(); ?>">
                    <p><?= $reference_photo ?></p>
                </div>
                <div class="blockSurvol__infos--Categorie" aria-label="catégorie de la photo : <?php the_title(); ?>">
                    <p><?=  $liste_categories ?></p>
                </div>
            </div>
        </div>
    </div>    
</div>
