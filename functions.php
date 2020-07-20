<?php
/**
 * Enqueue
 *
 * @since 0.0.1
 */
function theming_enqueue(){
	wp_register_style( 'theming-style', get_theme_file_uri( '/assets/css/style.css' ) );
	wp_enqueue_style( 'theming-style' );
}
add_action( 'wp_enqueue_scripts', 'theming_enqueue' );
?>
