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
        <div class="modale">
			<?php get_template_part('/template_parts/modale'); ?>
        </div>
        <div>
            <?php
                wp_nav_menu(array(
                    'theme_location' =>	'menu_secondaire',
                    'container' => false,
                    'menu_class' => 'menu',
                    ));
            ?>
        </div>
        <?php get_template_part('/template_parts/lightbox'); ?>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
