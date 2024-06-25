<?php
/**
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

 function motaphoto_add_admin_pages() {
    add_menu_page(__('Paramètres du thème motaphoto', 'motaphoto'), __('motaphoto', 'motaphoto'), 'manage_options', 'motaphoto-settings', 'motaphoto_theme_settings', 'dashicons-admin-settings', 60);
}

function motaphoto_theme_settings() {
echo '<h1>'.get_admin_page_title().'</h1>';
}

add_action('admin_menu', 'motaphoto_add_admin_pages', 10);