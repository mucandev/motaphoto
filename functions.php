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





function motaphoto_add_admin_pages() {
    add_menu_page(__('Paramètres du thème motaphoto', 'motaphoto'), __('motaphoto', 'motaphoto'), 'manage_options', 'motaphoto-settings', 'motaphoto_theme_settings', 'dashicons-admin-settings', 60);
}

function motaphoto_theme_settings() {
echo '<h1>'.get_admin_page_title().'</h1>';
}

add_action('admin_menu', 'motaphoto_add_admin_pages', 10);