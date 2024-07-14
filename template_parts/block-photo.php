<!-- template block photo -->

<?php
    // Récupération des informations de la photo
    $titre_post = get_the_title();
    $titre_nettoye = sanitize_title($titre_post);
    $lien_post = get_site_url().'/photographies/'. $titre_nettoye;
    $photo_post = get_the_post_thumbnail(get_the_ID(), 'medium large');
    $reference_photo = get_field('reference');

    // Récupération de la catégorie de la photo et stockage pour filtrage
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
    <div class="block-lien-photo">
        <?php echo $lien_post; ?>
    </div>
    <div class="block-photo">
        <?php echo $photo_post; ?>
    </div>
    <div class="block-survol">
        <div class="block-overlay">
            <div class="block-lightbox-expand">
                <a href="#">
                    <img class="icon-lightbox" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icon-lightbox.svg' ?>" alt="lightbox" />
                </a>
            </div>
            <div class="block-info-eye">
                <a href="#">
                    <img class="icon-eye" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icon-eye.svg' ?>" alt="infos photo" />
                </a>
            </div>
            <div class="block-infos">
                <div class="block-infos-ref">
                <p><?php echo $reference_photo ?></p>
                </div>
                <div class="block-infos-categorie">
                    <p><?php echo  $liste_categories ?></p>
                </div>
            </div>

        </div>
    </div>
</div>



