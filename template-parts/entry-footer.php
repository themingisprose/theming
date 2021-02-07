<?php
/**
 * Display the post footer
 *
 * @since Theming_ 0.0.1
 */
?>

<footer class="entry-footer border-bottom pt-3 pb-5 mb-5">

	<small class="entry-taxonomies">
		<span class="entry-cats me-3"><?php the_category( ', ' ) ?></span>
		<span class="entry-tags me-3"><?php the_tags( '', ', ' ) ?></span>
	</small>

	<?php
	if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) :
		get_template_part( 'template-parts/entry-author-bio' );
	endif;
	?>

</footer>
