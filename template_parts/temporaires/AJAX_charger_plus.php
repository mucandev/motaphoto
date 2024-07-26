<?php

//fonction AJAX pour le charger plus
function charger_plus(){
    // vérrification du nonce avant exécution de la requête
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

    if ($photo_query->have-posts()){
        while ($photo_query->have-posts()){
            $photo_query->the_post();
            get_template_part('template_parts/block-photo');            
        }
        wp_reset_postdata();
    } 
    wp_die();
}

add_action( 'wp_ajax_charger_plus', 'charger_plus');
add_action( 'wp_ajax_nopriv_charger_plus', 'charger_plus');

?>