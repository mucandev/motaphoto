<?php
/**
 * The template for displaying The home page template which is the front page by default
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * *
 * @package motaphoto
 */

?>

<?php get_header();?>
<section class="hero">
    <h1> Photographe Event</h1>
    <div class="hero-banner">
        <!-- <?php get_template_part('/template_parts/front-banner'); ?> -->
        <?php get_template_part('/template_parts/front-banner_landscape'); ?>
    </div>
</section>
<section class="catalog">
    <div class='filters'>
        <div class='filters-block' id="tax">                
            <div class="dropdown" id="tri-categorie">
                <input type="checkbox" class="dropdown__switch" id="filter-switch-categorie" hidden />
                <label for="filter-switch-categorie" class="dropdown__options-filter" >
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li class="dropdown__filter-selected" aria-selected="true">catégories</li>
                        <li>
                            <ul class="dropdown__select">
                                <?php
                                $events = get_terms('photocategories');
                                if (!empty($events) && !is_wp_error($events)) { 
                                    foreach ($events as $event) {                             
                                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($event->slug) . '">' . esc_html($event->name) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
            <div class="dropdown" id="tri-format">
                <input type="checkbox" class="dropdown__switch" id="filter-switch-format" hidden />
                <label for="filter-switch-format" class="dropdown__options-filter" >
                    <ul class="dropdown__filter" role="listbox" tabindex="-1">
                        <li class="dropdown__filter-selected" aria-selected="true">formats</li>
                        <li>
                            <ul class="dropdown__select">
                                <?php
                                $sizes = get_terms('formats');
                                if (!empty($sizes) && !is_wp_error($sizes)) { 
                                    foreach ($sizes as $size) {                             
                                        echo '<li class="dropdown__select-option" role="option" id="' . esc_attr($size->slug) . '">' . esc_html($size->name) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>			
                </label>
            </div>
        </div>
        <div class='filters-block' id="date">
                <div class="dropdown" id="tri-date">
                    <input type="checkbox" class="dropdown__switch" id="filter-switch-date" hidden />
                    <label for="filter-switch-date" class="dropdown__options-filter"  >
                        <ul class="dropdown__filter" role="listbox" tabindex="-1">
                            <li class="dropdown__filter-selected" aria-selected="true">trier par</li>
                            <li>
                                <ul class="dropdown__select">
                                    <li id="DESC" class="dropdown__select-option" role="option">
                                        à partir des plus récentes
                                    </li>
                                    <li id="ASC" class="dropdown__select-option" role="option">
                                        à partir des plus anciennes
                                    </li>
                                </ul>
                            </li>
                        </ul>			
                    </label>
                </div>
            </div>  
        </div>
    </div> 

    <div class="catalog-space">
        <div class="siblings-items">
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
        </div>
    </div>
    <div class="bouton-front">
        <button id="charger-plus" class="btn-chargerPlus">Charger plus</button>
    </div>
</section>
<?php get_footer(); ?>