<?php
/**
 * The template for displaying the footer
 *
 * @since Theming_ 0.0.1
 */
?>

		</main>

		<footer id="site-footer" class="footer">

			<?php get_sidebar() ?>

			<div id="colophon" class="py-4">

				<div class="container d-md-flex justify-content-md-between">

					<div id="copyright" class="footer-copyright d-flex justify-content-center align-items-center mb-3 mb-md-0">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<span class="ms-3">
							&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x( 'Y', 'copyright date format', 'theming' )
							);
							?>
						</span>
					</div>

					<div class="ml-auto text-center">
						<?php
						wp_nav_menu( array(
							'theme_location'	=> 'footer-menu',
							'container'			=> 'nav',
							'container_id'		=> 'the-footer-menu',
							'menu_class'		=> 'list-inline',
							'item_class'		=> 'list-inline-item text-danger',
							'items_wrap'		=> '%3$s',
							'depth'				=> 1,
							'link_before'		=> '<span>',
							'link_after'		=> '</span>',
							'fallback_cb'		=> false,
						) );
						?>
					</div>

				</div>

			</div>

		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
