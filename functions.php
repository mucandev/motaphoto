<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package motaphoto
 */


 //chargement des styles et des scripts
function motaphoto_enqueue_assets() {
     //chargement des styles  (css compilé de sass) 
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri() );    
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null);

    //  Chargement des scripts JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('script-modale', get_template_directory_uri() . '/assets/js/modale.js', array(),'1.0.0', true);
    wp_enqueue_script('script-block-photo', get_template_directory_uri() . '/assets/js/block-photo.js', array(),'1.0.0', true);
    wp_enqueue_script('script-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(),'1.0.0', true);

    //  scripts JS accueil
    if(is_home(  )){ 
        wp_enqueue_script('script-front_filtres', get_template_directory_uri() . '/assets/js/front_filtres.js', array(),'1.0.0', true);  
        wp_enqueue_script('script-pagination', get_template_directory_uri() . '/assets/js/charger_plus.js', array(),'1.0.0', true);  
        // wp_localize_script('script-pagination', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php'))); 
        wp_localize_script('script-pagination', 'myAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax-nonce') // Ajout de la génération de nonce
        ));

    }  
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_assets');


// Ajout gestion menus dashboard 
function register_custom_menu() {
    register_nav_menus(array(
        'menu_principal' => __( 'Menu principal', 'motaphoto' ),
        'menu_secondaire' => __( 'Menu secondaire', 'motaphoto' ),
    ));
}
add_action( 'init', 'register_custom_menu' );


// Ajout prise en charge logo
function motaphoto_custom_logo_setup() {
    $defaults = array(
        'height'      => 44,  
        'width'       => 690,  
        'flex-height' => true, 
        'flex-width'  => true, 
        'header-text' => array('site-title', 'site-description'), 
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'motaphoto_custom_logo_setup');

// custom thumbnails 
function motaphoto_custom_thumbnails_sizes() {
    // miniatures hover navigation
    add_image_size( 'custom-thumbnail', 80, 70, true); 
    // vignettes block photo
    remove_image_size( 'medium' );
    add_image_size( 'medium', 564, 495, true); 
    // visuel infos photo  570 pour 564 conflit 'medium' ?
    remove_image_size( 'medium large' );
    add_image_size( 'medium large', 570, 0, false); 
    // visuel bannière accueil
    remove_image_size( 'large' );
    add_image_size( 'large', 1440, 0, false); 
}
add_action( 'after_setup_theme', 'motaphoto_custom_thumbnails_sizes' );


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
