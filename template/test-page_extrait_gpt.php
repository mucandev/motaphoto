<section class="siblings">
    <div class="siblings-items">
        <?php
            $photos_siblings = new WP_query(array(
                'post_type' => 'photographies',
                'posts_per_page' => 1,
                'orderby' => 'rand',
            ));

            if ($photos_siblings->have_posts()) {
                while ($photos_siblings->have_posts()) {
                    $photos_siblings->the_post();
                    $titre_post = get_the_title();
                    $titre_slug = sanitize_title($titre_post);
                    $lien_post = get_site_url().'/photographies/'. $titre_slug;
                    $photo_post = get_the_post_thumbnail(get_the_ID(), 'medium');
                    $photo_post_full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $reference_photo = get_field('reference');
                    $date_post = get_the_date('Y');
                    $formats = get_the_terms(get_the_ID(), 'formats');
                    if ($formats && !is_wp_error($formats)) {
                        $noms_formats = array();
                        foreach ($formats as $format) {
                            $noms_formats[] = $format->name;
                        }
                        $liste_formats = join(', ', $noms_formats);
                    }
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
                        <a href="<?= $lien_post; ?>"><?= $titre_post; ?></a>
                    </div>
                    <div class="block__photo">
                        <?= $photo_post; ?>
                    </div>

                    <div class="blockSurvol">
                        <div class="blockSurvol__overlay">
                            <div class="blockSurvol__iconLightbox">
                                <button type="button" class="lightbox-trigger" data-full-image="<?= $photo_post_full[0]; ?>">
                                    <img src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-lightbox.svg' ?>" alt="lightbox" />
                                </button>
                            </div>

                                <a class="blockSurvol__iconEye"href="<?= $lien_post; ?>" aria-label="<?php the_title(); ?>">
                                    <img id="icon-eye" src="<?= get_stylesheet_directory_uri() . '/assets/images/icon-eye.svg' ?>" alt="Afficher les infos de la photo" />
                                </a>

                            <div class="blockSurvol__infos">
                                <div class="blockSurvol__infos--Ref">
                                    <p><?= $reference_photo ?></p>
                                </div>
                                <div class="blockSurvol__infos--Categorie">
                                    <p><?= $liste_categories ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            }
        ?>
    </div>
</section>

<!-- Lightbox structure -->
<div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-image">
</div>

<!-- Add the JavaScript to handle lightbox functionality -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.lightbox-close');

    document.querySelectorAll('.lightbox-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            const fullImage = trigger.getAttribute('data-full-image');
            lightboxImage.src = fullImage;
            lightbox.style.display = 'block';
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
</script>

<style>
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.9);
}

.lightbox-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.lightbox-close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.lightbox-close:hover,
.lightbox-close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}
</style>
