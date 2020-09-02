<?php
/**
 * The main template file
 *
 * @since Theming_ 0.0.1
 */

get_header();
?>

	<main class="flex-shrink-0">
		<div class="container">
			<h1 class="mt-5"><a href="<?php echo home_url() ?>"><?php bloginfo( 'name' ) ?></a></h1>
			<p class="lead"><?php bloginfo( 'description' ) ?></p>

<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
				<?php the_content() ?>
			</article>
<?php
				endwhile;
			endif;

?>
		</div>
	</main>
<?php
get_footer();
