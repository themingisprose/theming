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

				<div class="container">

					<div id="copyright" class="footer-copyright">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						&copy;
						<?php
						echo date_i18n(
							/* translators: Copyright date format, see https://www.php.net/date */
							_x( 'Y', 'copyright date format', 'rex' )
						);
						?>
					</div>

				</div>

			</div>

		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
