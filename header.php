<?php
/**
 * The header for our theme
 **
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package motaphoto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="keywords" content="photographe événementiel, photographe event, nathalie mota"/>
	<meta name="description" content="Nathalie Mota - Projet formation développeur WordPress avec OpenClassrooms."/>

    <title> <?php bloginfo('description') ?> | <?= the_title();?></title>
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<div class="logo">
			<?php
				if (function_exists('the_custom_logo')) {
					the_custom_logo();
				} else {
					echo '<h1>' . get_bloginfo('name') . '</h1>';
				}
			?>
		</div>
		<button class="menu-toggle" aria-controls="nav-menu" aria-expanded="false" aria-label="mobile menu" type="button">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</button>
		<nav id="nav-menu" role="navigation">
			<?php
			wp_nav_menu(array(
				'theme_location' =>	'menu_principal',
				'container' => false,
				'menu_class' => 'menu',
				));
			?>
		</nav>
	</header>

	<main>


