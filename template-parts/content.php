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
