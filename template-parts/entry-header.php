<?php
/**
 * Display the post header
 *
 * @since Theming_ 0.0.1
 */
?>

<header class="entry-header">

	<div class="entry-header-inner">
	<?php

	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title h1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
	endif;

	?>
	<small class="entry-meta">
		<time class="entry-date me-3"><?php echo esc_html( get_the_date() ) ?></time>
		<span class="entry-by me-3"><?php echo esc_html( get_the_author() ) ?></span>
	</small>
	<?php

	if ( has_post_thumbnail() ) :

		if ( ! is_singular() )
			echo '<a href="' . esc_url( get_permalink() ) . '">';

		the_post_thumbnail( 'full', array( 'class' => 'w-100 h-auto my-3' ) );

		if ( ! is_singular() )
			echo '</a>';

	endif;

	if ( has_excerpt() && is_singular() ) :
		?>
		<div class="entry-exceprt lead">
			<?php the_excerpt(); ?>
		</div>
		<?php
	endif;
	?>
	</div>

</header>
