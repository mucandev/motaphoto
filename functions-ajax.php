<?php

//fonction AJAX pour le charger plus
function charger_plus(){
    // vérification du nonce avant exécution de la requête
    check_ajax_referer( 'ajax-nonce', 'nonce' );

    $page = $_POST['page'];
    $ordreTriage = $_POST['order'];
    
    $args = array(
        'post_type' => 'photographies',
        'posts_per_page' => 8,
        'orderby' => 'date',  
        'order' =>  $ordreTriage, 
        'paged' => $page, 
    );
    
    $photo_query = new WP_Query($args);

    if ($photo_query->have_posts()){
        while ($photo_query->have_posts()){
            $photo_query->the_post();
            get_template_part('template_parts/block-photo');            
        }
        wp_reset_postdata();
    } 
    wp_die();
}

add_action( 'wp_ajax_charger_plus', 'charger_plus');
add_action( 'wp_ajax_nopriv_charger_plus', 'charger_plus');


//fonction ajax pour récupérer les photos filtrées
function filtrer_photos(){
    check_ajax_referer( 'ajax-nonce', 'nonce' );

    $tax_query = array ('relation' =>  'AND');
    $order = $_POST['order'] ?? 'ASC';

    //si une catégorie est présente et n'est pas égale à all
    if (isset ($_POST['category']) && $_POST[ 'category']  !=='all') {
        $category = $_POST['category'];
        $tax_query[] = array(
            'taxonomy' => 'photocategories',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    //si un format est présent et n'est pas égal à all
    if (isset ($_POST['format']) && $_POST[ 'format']  !=='all') {
        $format = $_POST['format'];
        $tax_query[] = array(
            'taxonomy' => 'formats',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    $args = array(
        'post_type' => 'photographies', 
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => $order,
        'paged' => 1, 
        'tax_query' => $tax_query,      
    );

    $photo_query = new WP_Query($args);

    // stockage du résultat en tampon temporairement
    ob_start();

    //définition de la structure d'affichage des nouveaux éléments
    if ($photo_query->have_posts()) {
        while ($photo_query->have_posts()) {
            $photo_query->the_post();
            get_template_part('template_parts/block-photo');
        }                    
        wp_reset_postdata();
    } else {            
        echo '<p>aucune photo trouvée</p>';
    }

    //récupérer les photos mises en tampon
    $output = ob_get_clean();
    echo $output;

    wp_die();
}

add_action( 'wp_ajax_filtrer_photos', 'filtrer_photos');
add_action( 'wp_ajax_nopriv_filtrer_photos', 'filtrer_photos');

