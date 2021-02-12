<?php
/**
 * Template for displaying the sidebar.
 *
 * @since Theming_ 0.0.1
 */
?>
<section id="sidebar" class="py-5 mb-5">
	<div class="container">
		<div class="row">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<aside class="col-lg-3 col-md-6 col-12 text-center text-md-start footer-widgets">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<aside class="col-lg-3 col-md-6 col-12 text-center text-md-start footer-widgets">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</aside>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<aside class="col-lg-3 col-md-6 col-12 text-center text-md-start footer-widgets">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</aside>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
			<aside class="col-lg-3 col-md-6 col-12 text-center text-md-start footer-widgets">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</aside>
		<?php endif; ?>

		</div>
	</div>
</section>
