<?php
/**
 * CUSTOM COMMENT WALKER
 * A custom walker for comments, based on the walker in Twenty Twenty.
 */
class Theming_Walker_Comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
	 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
	 * @see https://developer.wordpress.org/reference/functions/get_avatar/
	 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
	 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$comment_author_url = get_comment_author_url( $comment );
		$comment_author     = get_comment_author( $comment );
		$avatar 			= get_avatar( $comment, 100, '', $comment_author, array( 'class' => 'rounded-circle' ) );

		?>
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body media my-4 py-3">
				<div class="mr-3">
					<?php echo $avatar; ?>
				</div>
				<div class="comment-content media-body">
					<h5 class="mt-0 comment-author vcard text-primary font-weight-medium">
						<?php
						if ( empty( $comment_author_url ) ) :
							printf(
								'<span class="fn">%1$s</span> <small class="screen-reader-text says text-muted">%2$s</small>',
								esc_html( $comment_author ),
								__( 'says:', 'theming' )
							);
						else :
							printf(
								'<a href="%s" rel="external nofollow" class="url">%s</a> %s',
								$comment_author_url, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
								'<span class="fn">'. $comment_author .'<span>',
								'<small class="screen-reader-text says text-muted">'. __( 'says:', 'theming' ) .'</small>'
							);
						endif;
						?>
					</h5>

					<?php
					nl2br( comment_text() );
					if ( '0' === $comment->comment_approved ) :
					?>
						<p class="comment-awaiting-moderation my-3 font-weight-medium"><?php _e( 'Your comment is awaiting moderation.', 'theming' ); ?></p>
					<?php
					endif;
					?>

					<footer class="comment-meta">
						<div class="comment-metadata">
							<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
								<?php
								/* translators: 1: Comment date, 2: Comment time. */
								$comment_timestamp = sprintf( __( '%1$s at %2$s', 'theming' ), get_comment_date( '', $comment ), get_comment_time() );
								?>
								<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
									<?php echo esc_html( $comment_timestamp ); ?>
								</time>
							</a>
							<?php
							$comment_reply_link = get_comment_reply_link(
								array_merge(
									$args,
									array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '<span aria-hidden="true">&bull;</span> <span class="comment-reply">',
										'after'     => '</span>',
									)
								)
							);

							if ( $comment_reply_link ) :
								echo $comment_reply_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
							endif;

							if ( get_edit_comment_link() ) {
								echo ' <span aria-hidden="true">&bull;</span> <a class="comment-edit-link" href="' . esc_url( get_edit_comment_link() ) . '">' . __( 'Edit', 'theming' ) . '</a>';
							}
							?>
						</div>
					</footer>

				</div>

			</article>

<?php
	}
}
