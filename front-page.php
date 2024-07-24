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
        <?php get_template_part('/template_parts/front-banner'); ?>
    </div>
</section>
<section class="catalogue">
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

    <div class="siblings-items">
        <!-- //wp-query $photos_filtrees -->
        <?php get_template_part('/template_parts/catalog_date_ASC'); ?>
    </div>
    <div class="bouton-front">
        <button class="btn-chargerPlus">Charger plus</button>
    </div>
</section>
<?php get_footer(); ?>