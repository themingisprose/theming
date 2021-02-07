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

	<div class="col-md-6 py-3">
		<?php previous_post_link() ?>
	</div>

	<div class="col-md-6 py-3 text-end">
		<?php next_post_link() ?>
	</div>

</div>
<?php endif; ?>
