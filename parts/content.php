<?php
/**
 * The default template for displaying content
 *
 * @since Theming 1.0.0
 */
?>

<article id="post-<?php the_ID() ?>" <?php post_class() ?>>

	<?php get_template_part( 'parts/entry-header' ); ?>

	<div class="entry-content mx-auto">

		<?php
		if ( is_search() || ! is_singular() ) :
			the_excerpt();
		else :
			the_content( __( 'Continue reading', 'theming' ) );
		endif;
		?>

	</div>

	<?php
	if ( ! is_page() )
		get_template_part( 'parts/entry-footer' );
	?>

</article>

<?php if ( is_singular() && ! is_page() ) : ?>
<div class="row my-5">

	<div class="col-md-6 py-3 d-flex flex-column">
		<?php previous_post_link( sprintf( __( '<small class="text-muted">%s Previous</small>', 'theming' ), theming_get_icon_svg( 'ui', 'arrow_left', 16 ) ) .' %link' ) ?>
	</div>

	<div class="col-md-6 py-3 text-end d-flex flex-column">
		<?php next_post_link( sprintf( __( '<small class="text-muted">Next %s</small>', 'theming' ), theming_get_icon_svg( 'ui', 'arrow_right', 16 ) ) .' %link' ) ?>
	</div>

</div>
<?php endif; ?>
