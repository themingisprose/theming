<?php
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
