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
            <div class=filter-block>
                <div class="select" id="categorie-titre">
                    <p class="menu-titre visible">catégories</p> 
                    <p class="menu-titre cache">catégories</p> 
                    <i class="fa-solid fa-chevron-down menu-fleche"></i>
                </div> 
                <div class="menu-options" id="categorie-options">
                    <?php
                    $events = get_terms('photocategories');

                    if (!empty($events) && !is_wp_error($events)) { 
                        foreach ($events as $event) { 
                            echo '<p class="menu-option" id="' . esc_attr($event->slug) . '">' . esc_html($event->name) . '</p>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class=filter-block>
                <div class="select" id="format-titre">
                    <p class="menu-titre visible">formats</p> 
                    <p class="menu-titre cache">formats</p> 
                    <i class="fa-solid fa-chevron-down menu-fleche"></i>
                </div>
                <div class="menu-options" id="format-options">
                    <?php
                    // echo '<div class="vide" id="formats-vide"> </div>';
                    $sizes = get_terms('formats');

                    if (!empty($sizes) && !is_wp_error($sizes)) { 
                        foreach ($sizes as $size) { 
                        echo '<p class="menu-option" id="' . esc_attr($size->slug) . '">' . esc_html($size->name) . '</p>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class='filters-block' id="filtre-tri">
            <div class=filter-block>
                <div class="select" id="tri-titre">
                    <p class="menu-titre visible">Trier par</p> 
                    <p class="menu-titre cache">Trier par</p> 
                    <i class="fa-solid fa-chevron-down menu-fleche"></i>
                </div>
                <div class="menu-options" id="tri-options">
                    <!-- <div class="vide" id="tri-vide"></div> -->
                    <p class="menu-option" id="DESC">à partir des plus récentes</p>
                    <p class="menu-option" id="ASC">à partir des plus anciennes</p>
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