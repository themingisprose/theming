<?php
/**
 * The default template for displaying content
 *
 * @since Theming_ 0.0.1
 */
?>

<article id="post-<?php the_ID() ?>" <?php post_class() ?>>

	<?php get_template_part( 'template-parts/entry-header' ); ?>

	<div class="entry-content mx-auto">

		<?php
		if ( is_search() || ! is_singular() ) :
			the_excerpt();
		else :
			the_content( __( 'Continue reading', 'theming' ) );
		endif;
		?>

	</div>

	<?php get_template_part( 'template-parts/entry-footer' ); ?>

</article>

<?php if ( is_singular() ) : ?>
<div class="row my-5">

	<div class="col-md-6 py-3 d-flex flex-column">
		<?php previous_post_link( sprintf( __( '<small class="text-muted">%s Previous</small>', 'theming' ), theming_get_icon_svg( 'ui', 'arrow_left', 16 ) ) .' %link' ) ?>
	</div>

	<div class="col-md-6 py-3 text-end d-flex flex-column">
		<?php next_post_link( sprintf( __( '<small class="text-muted">Next %s</small>', 'theming' ), theming_get_icon_svg( 'ui', 'arrow_right', 16 ) ) .' %link' ) ?>
	</div>

</div>
<?php endif; ?>
