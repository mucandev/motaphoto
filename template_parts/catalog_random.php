<?php

    $photos_siblings = new WP_Query(array(
        'post_type' => 'photographies',
        'posts_per_page' => 8,
        'orderby' => 'rand', 
        'paged' => 1,                  
    ));

    if ($photos_siblings->have_posts()) {
        while ($photos_siblings->have_posts()) {
            $photos_siblings->the_post();
            // Affichage  template part
            get_template_part('template_parts/block-photo');
        }
        wp_reset_postdata();
    }   
 
?>