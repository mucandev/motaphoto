<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
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
    <title><?php bloginfo('name') ?> - <?php bloginfo('description') ?></title>
    <link rel="icon" type="image/vnd.icon" href="<?php echo get_theme_file_uri() . '/assets/images/motaphoto-icon.png'; ?>" >
	<?php wp_head(); ?>
</head>

<body>