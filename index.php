<!DOCTYPE html>
<html class="h-100">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ) ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'd-flex flex-column h-100' ); ?>>

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

	<?php wp_footer(); ?>
</body>
</html>
