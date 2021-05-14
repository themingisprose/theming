<?php
/**
 * Show the option value from 'theming_options' row in wp_options table
 * @param string $option 	Required. Option name.
 *
 * @since Theming_ 0.0.1
 */
function theming_option( $option ){
	echo theming_get_option( $option );
}

/**
 * Get the option value from 'theming_options' row in wp_options table
 * @param string $option 	Required. Option name.
 *
 * @since Theming_ 0.0.1
 */
function theming_get_option( $option ){
	return Theming_Admin::get_option( $option );
}

/**
 * Posts navigation
 * @param object $the_query 	Default to $wp_query object.
 *
 * @since Theming_ 0.0.1
 */
function theming_posts_navigation( $the_query = null ){
	if ( ! $the_query )
		$the_query = $GLOBALS['wp_query'];

	// Don't print empty markup if there's only one page.
	if ( $the_query->max_num_pages < 2 || is_404() )
		return;

	$paged 			= get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link 	= html_entity_decode( get_pagenum_link() );
	$query_args 	= array();
	$url_parts 		= explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	$args = array(
		'base'					=> $pagenum_link,
		'format'				=> $format,
		'total'					=> $the_query->max_num_pages,
		'current'				=> $paged,
		'add_args'				=> array_map( 'urlencode', $query_args ),
		'prev_text'				=> __( 'Newer posts', 'theming' ),
		'next_text'				=> __( 'Older posts', 'theming' ),
		'end_size'				=> 1,
		'mid_size'				=> 2,
		'type'					=> 'list',
		'prev_next'				=> true,
		'add_fragment'			=> null,
		'before_page_number'	=> null,
		'after_page_number'		=> null,
	);

	$links = paginate_links( $args );

	if ( $links ) :
		$current_page = ( 0 == get_query_var( 'paged' ) ) ? '1' : get_query_var( 'paged' );
		$total_pages = $the_query->max_num_pages;
?>
	<nav class="posts-pagination my-5" aria-label="<?php _e( 'Page navigation', 'theming' ) ?>"><?php echo $links; ?></nav>
<?php
	endif;
}

/**
 * Make comments form fields Bootstrap like
 *
 * @since Theming_ 0.0.1
 */
function theming_comment_form_fields(){
	$commenter 	= wp_get_current_commenter();
	$req		= get_option( 'require_name_email' );
	$aria_req	= ( $req ? " aria-required='true'" : '' );
	$html_req	= ( $req ? " required='required'" : '' );
	$html5		= current_theme_supports( 'html5' ) ? true : null;
	$form_group	= '<div class="form-group %s">%s</div>';
	$fields = array(
		'author'	=> sprintf( $form_group, 'comment-form-author col-lg-4 col-12 mt-3',
						'<label for="author">'. __( 'Name', 'theming' ) .( $req ? ' <span class="required">*</span>' : '' ) . '</label> '.
						'<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" aria-describedby="author" maxlength="245"' . $aria_req . $html_req . ' />' ),
		'email'		=> sprintf( $form_group, 'comment-form-email col-lg-4 col-12 mt-3',
						'<label for="email">'. __( 'Email', 'theming' ) .( $req ? ' <span class="required">*</span>' : '' ) . '</label> '.
						'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) . '" aria-describedby="email-notes" maxlength="100"' . $aria_req . $html_req . ' />' ),
		'url'		=> sprintf( $form_group, 'comment-form-url col-lg-4 col-12 mt-3',
						'<label for="url">'. __( 'Website', 'theming' ) .'</label> '.
						'<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" aria-describedby="email-notes" maxlength="200" />' ),
		'cookies'	=> sprintf( $form_group, 'col-12 mt-3',
						'<input id="cookies-consent" class="form-check-input" name="wp-comment-cookies-consent" type="checkbox" value="yes">'.
						'<label for="cookies-consent" class="form-check-label ms-2">'. __( 'Save my name, email, and website in this browser for the next time I comment.', 'theming' ) .'</label>' ),
	);
	return $fields;
}
add_filter( 'comment_form_default_fields', 'theming_comment_form_fields' );

/**
 * Make comments textarea Bootstrap like
 *
 * @since Twenty'em 1.2
 */
function theming_comment_form_textarea() {
	$comment_area = '<div class="form-group comment-form-comment col-12"><label for="comment">' . __( 'Comment', 'theming' ) . '</label>' .
					'<textarea id="comment" class="form-control" name="comment" rows="8" aria-required="true" required="required" maxlength="65525"></textarea></div>';
	return $comment_area;
}
add_filter('comment_form_field_comment', 'theming_comment_form_textarea');

/**
 * Gets the SVG code for a given icon.
 * @param string $group The icon group.
 * @param string $icon The icon.
 * @param int    $size The icon size in pixels.
 * @return string
 *
 * @since Theming_ 0.0.1
 */
function theming_get_icon_svg( $group, $icon, $size = 24 ) {
	return Theming_SVG_Icons::get_svg( $group, $icon, $size );
}
