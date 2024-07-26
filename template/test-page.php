<?php
/**
 *
 * Template Name: test-page
 * 
 * @package motaphoto
 */

?>

<?php get_header();?>

<h1>template_parts</h1>
<section class="hero">
    <div class="hero-banner"> 
        <h2>front-banner</h2>
        <?php get_template_part('/template_parts/front-banner'); ?>
    </div>
</section>


<section>
<div class='filters'>
        <div class='filters-block' id="tax">
            <div class="select" id="event">
                <?php get_template_part('/template_parts/test_filtre'); ?>
            </div>

        </div>
        <div class='filters-block' id="chronos">
            <div class="select" id="time">
                <!-- <p>trier par</p> -->
                <label for="timer">trier par</label>
                <select name="timer" id="timer">
                    <option value="DESC">à partir des plus récentes</option>
                    <option value="ASC">à partir des plus anciennes</option>
                </select>
            </div>
                <!-- trier par date publication -->
            </div>
        </div>
    </div> 
    


    
        <h2>catalog_random</h2> 
    <div class="siblings-items">
        <?php get_template_part('/template_parts/catalog_random'); ?>
    </div >
    <h2>catalog_order</h2> 
    <div class="siblings-items">
        <?php get_template_part('/template_parts/catalog_date_ASC'); ?>
    </div >
</section>
<?php get_footer(); ?>
