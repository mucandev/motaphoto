<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
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