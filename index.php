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
			<h1 class="mt-5"><?php bloginfo( 'name' ) ?></h1>
			<p class="lead"><?php bloginfo( 'description' ) ?></p>
		</div>
	</main>

	<?php wp_footer(); ?>
</body>
</html>
