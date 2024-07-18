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
    <img class="hero-title" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/title-hero.svg' ?>" alt="photographe event" />
    <div class="hero-banner">
        <!-- <img class="404" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/nathalie-mota-404.jpg' ?>"/> -->
        <?php get_template_part('/template_parts/banner'); ?>        
    </div>
</section>
<section class="catalogue">
    <div class='filters'>
        <div class='filters-tax'>
            <div class="select event">
                <p>catégories</p>
                <!-- <form method="get" action="">
                    <p>
                        <label for="categorie">catégories</label><br>
                        <select name="categorie" id="categorie">
                            <option value="mariage">mariage</option>
                            <option value="concert">concert</option>
                        </select>
                    </p>
                </form> -->                   
            </div>
            <div class="select format">
                <p>format</p>
                <!-- <form method="get" action="">
                    <p>
                        <label for="format">format</label><br>
                        <select name="format" id="format">
                            <option value="paysage">paysage</option>
                            <option value="royaume-uni">portrait</option>
                        </select>
                    </p>
                </form> -->        
                
            </div>
        </div>
        <div class='filters-time'>
            <div class="select time">
                <p>trier par</p>
                <!-- trier par date publication -->
            </div>            
        </div>
    </div>  
    <div class="siblings-items">
        <!-- //wp-query $photos_filtrees -->
        <?php

                $photos_siblings = new WP_Query(array(
                    'post_type' => 'photographies',
                    'posts_per_page' => 8,
                    'orderby' => 'rand',                   
                ));

                if ($photos_siblings->have_posts()) {
                    while ($photos_siblings->have_posts()) {
                        $photos_siblings->the_post();
                        // Affichage  template part
                        get_template_part('template_parts/block-photo');
                    }
                    wp_reset_postdata();
                }             
        ?>

    <button class="btn-chargerPlus">Charger plus</button>
    </div> 
    
</section>
<?php get_footer(); ?>