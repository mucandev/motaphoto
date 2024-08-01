<?php
/**
 *
 * Template Name: test-page
 * 
 * @package motaphoto
 */

?>

<?php get_header();?>

<h1>page test</h1>
<section class="siblings">

    <div class="siblings-items">
    
        <?php
            $photos_siblings = new WP_Query(array(
                'post_type' => 'photographies',
                'posts_per_page' => 1,
                'orderby' => 'rand',
            ));

            if ($photos_siblings->have_posts()) {
                while ($photos_siblings->have_posts()) {
                    $photos_siblings->the_post();
                    // Affichage  template part
<<<<<<< HEAD
                    get_template_part('template_parts/block-photo');                    
=======
                    get_template_part('template_parts/block-photo');
>>>>>>> 07594daf0c9365b2bd4c6c20539cb39c532f169b
                }
                wp_reset_postdata();
            }
        ?>
    </div>
</section> 

<?php get_footer(); ?>
