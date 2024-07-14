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
    <img class="hero-title" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/title-hero.svg' ?>" alt="photographz event" />
    <div class="hero-banner">

    </div>

</section>
<section class="catalogue">
    <div class='filters'>
        <div class='filters-tax'>
            <div class="select event">
                <p>catégories</p>
            </div>
            <div class="select format">
                <p>format</p>
            </div>
        </div>
        <div class='filters-time'>
            <div class="select time">
                <p>trier par</p>
            </div>            
        </div>
    </div>  
    <div class="siblings-items">

<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>
<?php get_template_part('template_parts/block-photo'); ?>

</div> 
</section>
<?php get_footer(); ?>