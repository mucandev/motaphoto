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
        </div>
        <div class="infos-photo">
            <!-- 'current-thumb' custom size qui optimise 'medium large' -->
            <?php the_post_thumbnail('current-thumb') ?>
        </div>
    </div>

    <?php
    endwhile;
    wp_reset_postdata();
endif;
?>

<!-- zone d'interactions -->
<div class="interactions">
    <div class="interactions-contact">
        <p>Cette photo vous intéresse ?</p> 
        <!-- appel de la modale contact avec numéro photo ref pré rempli  -->
        <button class="btn-contact" >Contact</button>
    </div>     

    <div class="photo-navigation">
        <div class="arrow">
            <?php
                // Requête pour obtenir le dernier post
                $args_dernier = array(
                    'post_type' => 'photographies', 
                    'posts_per_page' => 1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $last_post = new WP_Query($args_dernier);

                // Requête pour obtenir le premier post
                $args_premier = array(
                    'post_type' => 'photographies', 
                    'posts_per_page' => 1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                );
                $first_post = new WP_Query($args_premier);
            ?>
            <div class="arrow-left">
                <?php $previous_post = get_previous_post(); ?>

                <?php if (!empty($previous_post)): ?>
                    <a href="<?php echo get_permalink($previous_post); ?>">
                        <img class="arrow-left-img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-left.svg' ?>" alt="previous" />
                    </a>
                <!-- boucle-->
                <?php else : $last_post = $last_post->posts[0]; ?>
                    <a href="<?php echo get_permalink($last_post); ?>">
                        <img class="arrow-left-img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-left.svg' ?>" alt="previous" />
                    </a>
                <?php endif; ?>
            </div>

            <div class="thumbnail-left">
                <?php
                    // Récupération de la photo du post précédent
                    if (!empty($previous_post)) {
                        //  'nav-thumb' custom size qui optimise 'thumbnail' 
                        $thumbnail_left = get_the_post_thumbnail($previous_post->ID, 'nav-thumb');
                    } else {
                        $thumbnail_left = get_the_post_thumbnail($last_post, 'nav-thumb');
                    }
                    echo $thumbnail_left;
                ?>
            </div>

            <div class="arrow-right">
                <?php $next_post = get_next_post(); ?>

                <?php if (!empty($next_post)): ?>
                    <a href="<?php echo get_permalink($next_post); ?>">
                        <img class="arrow-right-img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-right.svg' ?>" alt="next" />
                    </a>

                <!-- boucle-->
                <?php else : $first_post = $first_post->posts[0]; ?>
                    <a href="<?php echo get_permalink($first_post); ?>">
                        <img class="arrow-right-img" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/arrow-right.svg' ?>" alt="next" />
                    </a>
                <?php endif; ?>

            </div>

            <div class="thumbnail-right">
                <?php
                    // Récupération de la photo du post suivant
                    if (!empty($next_post)) {
                        $thumbnail_right = get_the_post_thumbnail($next_post->ID, 'nav-thumb');
                    } else {
                        $thumbnail_right = get_the_post_thumbnail($first_post, 'nav-thumb');
                    }

                    echo $thumbnail_right;
                ?>
            </div>
        </div>        
    </div> 
</div>
</section>

<!-- partie 2-->
<section class="siblings">
    <h3>Vous aimerez aussi</h3>
    <div class="siblings-items">

        <?php
            // recup catégorie photo cette page
            $categories = wp_get_post_terms(get_the_ID(), 'photocategories');
            if ($categories && !is_wp_error($categories)) {
                $ID_categories = wp_list_pluck($categories, 'term_id');
                // 2 photos aléatoires même catégorie excluant celle de cette page
                $photos_siblings = new WP_Query(array(
                    'post_type' => 'photographies',
                    'posts_per_page' => 2,
                    'post__not_in' => array(get_the_ID()), //requiert une array
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'photocategories',
                            'field' => 'id',
                            'terms' => $ID_categories,
                        ),
                    ),
                ));

                if ($photos_siblings->have_posts()) {
                    while ($photos_siblings->have_posts()) {
                        $photos_siblings->the_post();
                        // Affichage  template part
                        get_template_part('template_parts/block-photo');
                    }
                    wp_reset_postdata();
                } else {            
                    echo '<p>D\'autres photos similaires à découvrir... bientôt</p>';
                }
            }
        ?>
    </div>
</section>   

<?php 
get_footer(); 
?>
