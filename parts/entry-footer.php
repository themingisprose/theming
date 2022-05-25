<?php
/**
 * Display the post footer
 *
 * @since Theming 1.0.0
 */
?>

<footer class="entry-footer border-bottom pt-3 pb-5 mb-5">

	<small class="entry-taxonomies">
		<span class="entry-cats me-3">
			<span class="me-1"><?php echo theming_get_icon_svg( 'ui', 'bookmark', 16 ) ?></span>
			<?php the_category( ', ' ) ?>
		</span>
		<span class="entry-tags me-3">
			<?php the_tags( '<span class="me-1">'. theming_get_icon_svg( 'ui', 'tag', 16 ) .'</span>', ', ' ) ?>
		</span>
	</small>

	<?php
	if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) :
		get_template_part( 'parts/entry-author-bio' );
	endif;
	?>

</footer>
