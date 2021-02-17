<?php
/**
 * Top navbar
 */
function theming_top_navbar(){
?>
	<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<?php
			$brand = ( has_custom_logo() )
					? the_custom_logo()
					: '<a href="'. home_url( '/' ) .'" class="navbar-brand" rel="home">'. get_bloginfo( 'title' ) .'</a>';
			echo $brand;

			if ( has_nav_menu( 'top-menu' ) ) :
			?>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#the-top-menu"
					aria-controls="the-top-menu"
					aria-expanded="false"
					aria-label="<?php _e( 'Toggle navigation', 'theming' ) ?>"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
			<?php
				wp_nav_menu( array(
						'theme_location'	=> 'top-menu',
						'container'			=> 'div',
						'container_class'	=> 'collapse navbar-collapse',
						'container_id'		=> 'the-top-menu',
						'menu_class'		=> 'navbar-nav',
						'depth'				=> 2,
						'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
						'walker'			=> new WP_Bootstrap_Navwalker(),
				) );
			endif;
			?>
		</div>
	</nav>
<?php
}
add_action( 'theming_site_header', 'theming_top_navbar' );
