<?php
/**
 * Add custom classes to nav menu
 *
 * @since Theming_ 0.0.1
 */
function theming_menu_css_class( $classes, $item, $args ){
	if( isset( $args->item_class ) ) :
		$classes[] = $args->item_class;
	endif;

	return $classes;
}
add_filter( 'nav_menu_css_class', 'theming_menu_css_class', 1, 3 );

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 *
 * @param string $uri Social link.
 * @param int    $size The icon size in pixels.
 * @return string
 *
 * @since Theming_ 0.0.1
 */
function theming_get_social_link_svg( $uri, $size = 24 ) {
	return Theming_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Displays SVG icons in the footer navigation.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 *
 * @since Theming_ 0.0.1
 */
function theming_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'footer-menu' === $args->theme_location ) {
		$svg = theming_get_social_link_svg( $item->url, 24 );
		if ( ! empty( $svg ) ) {
			$item_output = str_replace( $args->link_before, $svg, $item_output );
		}
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'theming_nav_menu_social_icons', 10, 4 );
