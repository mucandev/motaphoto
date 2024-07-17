<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package motaphoto
 */


 //chargement des styles et des scripts
function motaphoto_enqueue_styles() {
     //chargement des styles  (css compilé de sass) 
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri() );
    
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null);

    //  Chargement des scripts J
    wp_enqueue_script('jquery');
    wp_enqueue_script('script-modale', get_template_directory_uri() . '/assets/js/modale.js', array(),'1.0.0', true);
    wp_enqueue_script('script-block-photo', get_template_directory_uri() . '/assets/js/block-photo.js', array(),'1.0.0', true);
    wp_enqueue_script('script-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(),'1.0.0', true);

}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');


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

//test thumbnails custom
function motaphoto_thumbnails_sizes() {
    add_image_size( 'nav-thumb', 80, 70, true ); 
    add_image_size( 'current-thumb', 564, 0, true );
}
add_action( 'after_setup_theme', 'motaphoto_thumbnails_sizes' );

