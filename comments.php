<?php
/**
 * The comments template
 */

	/**
	 * If comments are enabled, we have comments
	 */
	if ( 'open' != get_option( 'default_comment_status' ) )
		return;

	/**
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;

	$comments_number = absint( get_comments_number() );
?>
<section id="comments" class="comments">
		<?php if ( $comments ) : ?>
			<header class="comments-header">
				<h3 class="h4">
				<?php
				if ( have_comments() ) :
					if ( 1 === $comments_number ) :
						/* translators: %s: Post title. */
						printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'theming' ), get_the_title() );
					else :
						printf(
							/* translators: 1: Number of comments, 2: Post title. */
							_nx(
								'%1$s reply on &ldquo;%2$s&rdquo;',
								'%1$s replies on &ldquo;%2$s&rdquo;',
								$comments_number,
								'comments title',
								'theming'
							),
							number_format_i18n( $comments_number ),
							get_the_title()
						);
					endif;
				endif;
				?>
				</h3>
			</header>
			<div class="comment-list">
				<?php
				$args = array(
					'walker'		=> new Theming_Walker_Comment,
					'style'			=> 'div',
				);
				wp_list_comments( $args );
				?>
			</div>

		<?php endif; ?>
		<hr class="mt-5 mb-4">
		<?php
		if ( comments_open() ) :
			$args = array(
				'class_container'		=> 'comment-respond',
				'class_form'			=> 'row comment-form',
				'class_submit'			=> 'btn btn-primary my-3 submit',
				'title_reply'			=> __( 'Leave a comment', 'theming' ),
				'title_reply_before'	=> '<h3 class="h4">',
				'title_reply_after'		=> '</h3>',
			);
			comment_form( $args );
		else :
		?>
			<h5 class="text-muted font-weight-semi-bold"><?php _e( 'Comments are close', 'theming' ); ?></h5>
		<?php
		endif;
		?>
</section>
