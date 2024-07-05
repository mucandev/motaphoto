<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/template-files-section/custom-post-type-template-files/
 *
 * @package motaphoto
 */

get_header();

// identifiant photo dans l'URL
$slug = get_query_var('photographies');

// critères recherche
$args = [
    'post_type' => 'photographies',
    'name' => $slug,
    'posts_per_page' => 1
];

// Requête database wordpress 
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();

	$reference = get_field('reference');
	$categories = wp_get_post_terms(get_the_ID(), 'photocategories');
	$formats = wp_get_post_terms(get_the_ID(), 'formats');
    $type = get_field('type'); 
    $annee = get_field('annee');
?>
<!-- partie 1-->
<section class="photo-choice"> 
    <div class="infos">
        <div class="description"> 
            <h2><?php echo the_title();?></h2>             
            <p>référence : <span id="photo-ref"><?php echo $reference;?></span></p>  
            <p>catégorie : <?php foreach ($categories as $categorie) { echo esc_html($categorie->name); } ?></p> 
            <p>format : <?php foreach ($formats as $format) { echo esc_html($format->name);} ?></p>  
            <p>type : <?php echo $type;?></p>  
            <p>année : <?php echo $annee ;?></p>          
            <!-- <p>année : <?php echo the_date('Y');?></p>  -->
        </div>
        <div class="photo-choice-img">
            <?php the_content('full');?>  <!--full ne marche pas -->
        </div>
    </div>

        <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <!-- zone d'interactions -->
    <div class="photo-choice-interactions"><!-- row -->
        <div class="photo-choice-contact"><!-- row -->
            <p>Cette photo vous intéresse ?</p> 
            <button class="btn-choice" >Contact</button><!-- appel de la modale contact avec numéro photo ref pré rempli  -->
        </div>
        
        <div class="photo-choice-navigation">
            <?php 
                    // Requête  dernier post
                    $args_dernier = array(
                        'post_type' => 'photographies', 
                        'posts_per_page' => 1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $last_post = new WP_Query($args_dernier);

                    // Requête  premier post
                    $args_premier = array(
                        'post_type' => 'photographies', 
                        'posts_per_page' => 1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );
                    $first_post = new WP_Query($args_premier);
                ?>
            <div class="photo-navigation">
                <div class="vignette-temp"></div>
                <div class="arrows">
                    <a href="#">
                        <img class="arrow-left" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-left.png' ?>" alt="previous" />
                    </a>
                    <a href="#">
                        <img class="arrow-right" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-right.png' ?>" alt="next" />
                    </a>
                </div>
            </div>   




        </div>
    </div>
</section>

<!-- partie 2-->
<section class="siblings">
    <h3>Vous aimerez aussi</h3>
    <div class="siblings-row"><!-- row -->
        <div class="photo-bloc"> 
            <?php get_template_part('/template_parts/bloc-photo'); ?>
        </div>
        <div class="photo-bloc"> 
            <?php get_template_part('/template_parts/bloc-photo'); ?>
        </div>
    </div>



</section>   




<?php 
get_footer(); 
