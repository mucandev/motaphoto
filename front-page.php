<?php
/**
 * The template for displaying The home page template which is the front page by default
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * *
 * @package motaphoto
 */

?>

<?php get_header();?>
<section class="hero">
    <h1> Photographe Event</h1>
    <div class="hero-banner">
        <?php get_template_part('/template_parts/front-banner_landscape'); ?>
    </div>
</section>
<section class="catalog">
    <?php get_template_part('/template_parts/front-filtres'); ?>
    <div class="catalog-space">
        <div class="siblings-items">
        <?php

        $photos_siblings = new WP_Query(array(
            'post_type' => 'photographies',
            'posts_per_page' => 8,
            'orderby' => 'date',  
            'order' => 'ASC', 
            'paged' => 1, 
        ));

        if ($photos_siblings->have_posts()) {
            while ($photos_siblings->have_posts()) {
                $photos_siblings->the_post();
                // Affichage  template part
                get_template_part('template_parts/block-photo');
            } 
            wp_reset_postdata();
        } else {
            echo 'aucune photo avec le ou les filtres selectionnés';
        }

        ?>

        </div>
    </div>
    <div class="bouton-front">
        <div id="total-photos-count"></div>
        <button id="charger-plus" class="btn-chargerPlus">Charger plus</button>
    </div>
</section>
<?php get_footer(); ?>