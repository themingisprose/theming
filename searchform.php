<?php
/**
 * Template for displaying search forms.
 *
 * @since Theming 1.0.0
 */
?>
<form id="searchform" class="row g-0" action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get">
	<div class="col-9">
		<div class="input-group">
			<input type="text" class="form-control" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search', 'theming' ) ?>" />
		</div>
	</div>
	<div class="col-3">
		<button class="btn btn-primary" type="submit">
			<?php _e( 'Search', 'theming' ) ?>
		</button>
	</div>
</form>
