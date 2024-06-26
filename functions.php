<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

 //chargement des styles et des scripts
function motaphoto_enqueue_styles() {
    wp_enqueue_style('motaphoto-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');

// Ajout de la gestion de menu dans le dashboard  wordpress
function register_custom_menu() {
    register_nav_menus(array(
        'menu_principal' => __('Menu principal', 'Photographe'),
        'menu_secondaire' => __('Menu secondaire', 'Photographe'),
    ));
}
add_action('init', 'register_custom_menu');



