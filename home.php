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

    <?php

    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content/content-page' );

    endwhile; 
    ?>

<?php get_footer(); ?>