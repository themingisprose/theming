<?php
/**
 * Display the entry author bio
 *
 * @since Theming_ 0.0.1
 */

if ( get_the_author_meta( 'description' ) ) :
?>
<div class="entry-author author-bio mt-5 row">
	<div class="author-title-wrapper col-2">
		<div class="author-avatar vcard">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 128, '', get_the_author_meta( 'display_name' ), array( 'class' => 'w-100 h-auto' ) ); ?>
		</div>
	</div>
	<div class="col-10">
		<h2 class="author-title h5">
			<?php
			printf(
				/* translators: %s: Author name. */
				__( 'By %s', 'theming' ),
				esc_html( get_the_author() )
			);
			?>
		</h2>
		<div class="author-description">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php _e( 'View Archive', 'theming' ); ?>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>
