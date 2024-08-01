<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * *
 * @package motaphoto
 */

?>
    </main >

    <footer>
    <?php get_template_part('/template_parts/scroll-arrows'); ?>
        <div class="modale">
			<?php get_template_part('/template_parts/modale'); ?>
        </div>
        <?php get_template_part('/template_parts/lightbox'); ?>
        <div>
            <?php
                wp_nav_menu(array(
                    'theme_location' =>	'menu_secondaire',
                    'container' => false,
                    'menu_class' => 'menu',
                    ));
            ?>
        </div>        
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
