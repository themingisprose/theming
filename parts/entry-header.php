<?php
/**
 * Display the post header
 *
 * @since Theming 1.0.0
 */
?>

<header class="entry-header mb-4">

	<?php

	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title h1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	endif;

	if ( ! is_page() ) :
	?>
	<small class="entry-meta">
		<time class="entry-date me-3">
			<span class="me-1"><?php echo theming_get_icon_svg( 'ui', 'calendar', 16 ) ?></span>
			<?php echo esc_html( get_the_date() ) ?>
		</time>
		<span class="entry-by me-3">
			<span class="me-1"><?php echo theming_get_icon_svg( 'ui', 'user', 16 ) ?></span>
			<?php echo esc_html( get_the_author() ) ?>
		</span>
	</small>
	<?php
	endif;

	if ( has_post_thumbnail() ) :

		if ( ! is_singular() )
			echo '<a href="' . esc_url( get_permalink() ) . '">';

		the_post_thumbnail( 'full', array( 'class' => 'w-100 h-auto my-3' ) );

		if ( ! is_singular() )
			echo '</a>';

	endif;

	if ( has_excerpt() && is_singular() ) :
		?>
		<div class="entry-excerpt lead">
			<?php the_excerpt(); ?>
		</div>
		<?php
	endif;
	?>

</header>
