<?php
/**
 * Include files
 */
require_once( get_template_directory() . '/templates/navigation.php' );

/**
 * Enqueue
 *
 * @since 0.0.1
 */
function theming_enqueue(){
	// Enqueue css
	wp_register_style( 'theming', get_theme_file_uri( '/assets/dist/css/style.css' ) );
	wp_enqueue_style( 'theming' );

	// Enqueue js
	wp_register_script( 'theming', get_theme_file_uri( 'assets/dist/js/app.js' ) );
	wp_enqueue_script( 'theming' );
}
add_action( 'wp_enqueue_scripts', 'theming_enqueue' );
