<?php
/**
 *
 * Template Name: test-page
 * 
 * @package motaphoto
 */

?>

<?php get_header();?>



<section class="catalogue">
    <div class='filters'>
        <div class='filters-block' id="tax">
            <div class=filter-block>
                <!-- <div class="select" id="event"> -->
                    <?php get_template_part('/template_parts/test_filtre'); ?>
                <!-- </div> -->
            </div>
            <div class=filter-block>
                <?php get_template_part('/template_parts/test_filtre'); ?>
            </div>
        </div>
        <div class='filters-block' id="filtre-tri">
            <div class=filter-block>
                <?php get_template_part('/template_parts/test_filtre'); ?>
            </div>
        </div>

    </div> 


</section>




<?php get_footer(); ?>
