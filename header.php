<?php
/**
 * Header file for Theming_ WordPress theme
 *
 * @since Theming_ 0.0.1
 */
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes() ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ) ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class() ?>>

		<?php wp_body_open(); ?>

			<header id="site-header">
				<?php do_action( 'theming_site_header' ) ?>
			</header>

			<main>
