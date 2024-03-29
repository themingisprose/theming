<?php
/**
 * Enqueue scripts and styles
 *
 * @since Theming 1.0.0
 */
class Theming_Enqueue
{

	/**
	 * @var null
	 */
	protected static $instance = null;

	/**
	 * Enqueue
	 *
	 * @since Theming 1.0.0
	 */
	public function init()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	/**
	 * Handle styles
	 *
	 * @since Theming 1.0.0
	 */
	public function styles()
	{
		wp_register_style( 'theming-style', get_theme_file_uri( '/assets/dist/css/style.css' ) );
		wp_enqueue_style( 'theming-style' );
	}

	/**
	 * Handle scripts
	 *
	 * @since Theming 1.0.0
	 */
	public function scripts()
	{
		wp_register_script( 'theming-bootstrap', get_theme_file_uri( 'assets/dist/js/bootstrap.js' ) );
		wp_enqueue_script( 'theming-bootstrap' );

		/**
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
			wp_enqueue_script( 'comment-reply' );
		endif;
	}

	/**
	 * Get Instance
	 *
	 * @since Theming 1.0.0
	 */
    public static function get_instance() : self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

Theming_Enqueue::get_instance()->init();
