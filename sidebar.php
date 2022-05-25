<?php
/**
 * Template for displaying the sidebar.
 *
 * @since Theming 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' )
	&& ! is_active_sidebar( 'sidebar-2' )
	&& ! is_active_sidebar( 'sidebar-3' ) )
	return;
?>
<section id="sidebar" class="py-5 mb-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<aside class="footer-widgets col-lg-4 col-12 text-center text-md-start mb-4">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<aside class="footer-widgets col-lg-4 col-12 text-center text-md-start mb-4">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</aside>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<aside class="footer-widgets col-lg-4 col-12 text-center text-md-start mb-4">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</aside>
		<?php endif; ?>

		</div>
	</div>
</section>
