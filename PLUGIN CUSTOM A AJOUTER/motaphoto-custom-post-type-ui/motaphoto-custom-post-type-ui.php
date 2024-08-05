<?php
/*
Plugin Name: motaphoto-custom-post-type-ui
Description: Ajoute des colonnes pour les taxonomies dans l'interface d'administration de "photographies".
Version: 1.0
Author: mucandev
*/

// Ajout des nouvelles colonnes
function ajouter_colonnes_photographies($columns) {
    $columns['thumbnail'] = __('Miniatures', 'motaphoto');
    $columns['photocategories'] = __('Photo Categories', 'motaphoto');
    $columns['formats'] = __('Formats', 'motaphoto');
    return $columns;
}
add_filter('manage_photographies_posts_columns', 'ajouter_colonnes_photographies');

// Affichage des données dans les colonnes
function afficher_contenu_colonnes_photographies($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, 'custom-thumbnail');
            } else {
                _e('No Thumbnail', 'motaphoto');
            }
            break;

        case 'photocategories':
            $terms = get_the_terms($post_id, 'photocategories');
            if ($terms && !is_wp_error($terms)) {
                $terms_list = array();
                foreach ($terms as $term) {
                    $terms_list[] = $term->name;
                }
                echo join(', ', $terms_list);
            } else {
                _e('No Photo Categories', 'motaphoto');
            }
            break;

        case 'formats':
            $terms = get_the_terms($post_id, 'formats');
            if ($terms && !is_wp_error($terms)) {
                $terms_list = array();
                foreach ($terms as $term) {
                    $terms_list[] = $term->name;
                }
                echo join(', ', $terms_list);
            } else {
                _e('No Formats', 'motaphoto');
            }
            break;
    }
}
add_action('manage_photographies_posts_custom_column', 'afficher_contenu_colonnes_photographies', 10, 2);

// Rendre les colonnes "photocategories" et "formats" triables
function rendre_colonnes_photographies_triables($columns) {
    $columns['photocategories'] = 'photocategories';
    $columns['formats'] = 'formats';
    return $columns;
}
add_filter('manage_edit-photographies_sortable_columns', 'rendre_colonnes_photographies_triables');


