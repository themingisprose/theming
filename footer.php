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

					<div id="social-profiles" class="footer-social ml-auto text-center">
						<?php
						$profiles = new Theming_Social_Options;
						$profiles = $profiles->fields();
						?>
						<ul class="list-inline mb-0 social">
						<?php
						foreach ( $profiles as $key => $value ) :
							if ( ! theming_option( $value['option'], false ) )
								continue;
						?>
							<li class="list-inline-item social-item">
								<a href="<?php theming_option( $value['option'] ) ?>">
									<?php echo $value['label'] ?>
								</a>
							</li>
						<?php
						endforeach;
						?>
						</ul>
					</div>

				</div>

			</div>

		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
