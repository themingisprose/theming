<?php
/**
 * Top navbar
 */
function theming_top_navbar(){
?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a href="<?php echo home_url() ?>" class="navbar-brand"><?php bloginfo( 'title' ) ?></a>
		</div>
	</nav>
<?php
}
add_action( 'theming_site_header', 'theming_top_navbar' );
