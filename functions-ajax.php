<?php

// Fonction pour gérer le filtrage et la pagination des photos

function filtrer_paginer_catalogue() {

    // Vérification du nonce : sécurité
    check_ajax_referer('ajax-nonce', 'nonce');

    // Initialisation de la requête taxonomique
    $tax_query = array('relation' => 'AND');
    
    // Récupération de la page actuelle pour la pagination, par défaut 1
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'ASC';
    // Validation du paramètre order(sinon "charger plus" dysfonctionne)
    switch ($order) {
        case 'ASC':
        case 'DESC':
            break;
        default:
            $order = 'ASC';
    }

    // Récupération de l'ordre de tri, par défaut 'ASC'
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Ajout du filtre de catégorie si présent
    if (isset($_POST['category']) && $_POST['category'] !== 'all') {
        $category = $_POST['category'];
        $tax_query[] = array(
            'taxonomy' => 'photocategories',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    // Ajout du filtre de format si présent
    if (isset($_POST['format']) && $_POST['format'] !== 'all') {
        $format = $_POST['format'];
        $tax_query[] = array(
            'taxonomy' => 'formats',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    // Arguments de la requête WP_Query
    $args = array(
        'post_type' => 'photographies', 
        'posts_per_page' => 8, 
        'orderby' => 'date',
        'order' => $order,
        'paged' => $paged, 
        'tax_query' => $tax_query,
    );

    // Exécution de la requête WP_Query
    $photo_query = new WP_Query($args);

    // Démarrage de la mise en tampon de sortie
    ob_start();
    // Affichage des résultats de la requête
    if ($photo_query->have_posts()) {
        while ($photo_query->have_posts()) {
            $photo_query->the_post();
            get_template_part('template_parts/block-photo');
        }
        wp_reset_postdata();
    } else {
        // Message si aucune photo n'est trouvée
        echo '<p>aucune photo avec cette selection... pour l\'instant !</p>';
    }

    // Récupération de la sortie tamponnée
    $output = ob_get_clean();

    // Récupération du nombre total de photos trouvées
    $total_photos = $photo_query->found_posts;
    // Envoi de la réponse en JSON
    wp_send_json_success(array(
        'html' => $output,
        'total' => $total_photos,
    ));
}

// Ajout de la fonction aux hooks AJAX
add_action('wp_ajax_filtrer_paginer_catalogue', 'filtrer_paginer_catalogue');
add_action('wp_ajax_nopriv_filtrer_paginer_catalogue', 'filtrer_paginer_catalogue');

