<?php
/**
 * The main template file
 *
 * @since Theming_ 0.0.1
 */

get_header();
?>

		<div class="container">
			<div class="post-container mx-auto">
<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				if ( ! is_page() ) :
					theming_posts_navigation();

					comments_template();
				endif;

			else :

			?>
			<p class="h3 my-5"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'theming' ); ?></p>
			<?php

			endif;

?>
			</div>
		</div>
<?php
get_footer();
