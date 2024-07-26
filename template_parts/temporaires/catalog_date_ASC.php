<?php

$photos_siblings = new WP_Query(array(
    'post_type' => 'photographies',
    'posts_per_page' => 8,
    'orderby' => 'date',  
    'order' => 'ASC', 
    'paged' => 1, 
));

if ($photos_siblings->have_posts()) {
    while ($photos_siblings->have_posts()) {
        $photos_siblings->the_post();
        // Affichage  template part
        get_template_part('template_parts/block-photo');
    } 
    wp_reset_postdata();
} else {
    echo 'aucune photo avec le ou les filtres selectionnés';
}

?>