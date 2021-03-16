<?php
/**
 * Enqueue scripts and styles
 *
 * @since Theming_ 0.0.1
 */
if ( ! class_exists( 'Theming_Enqueue' ) ) {
	class Theming_Enqueue {

		/**
		 * @var null
		 */
		protected static $instance = null;

		/**
		 * Enqueue
		 *
		 * @since Theming_ 0.0.1
		 */
		public function init()
		{
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ) );
		}

		/**
		 * Handle styles
		 *
		 * @since Theming_ 0.0.1
		 */
		public function enqueue_styles()
		{
			wp_register_style( 'theming', get_theme_file_uri( '/assets/dist/css/style.css' ) );
			wp_enqueue_style( 'theming' );
		}

		/**
		 * Handle scripts
		 *
		 * @since Theming_ 0.0.1
		 */
		public function enqueue_scripts()
		{
			wp_register_script( 'bootstrap', get_theme_file_uri( 'assets/dist/js/bootstrap.js' ) );
			wp_enqueue_script( 'bootstrap' );

			/**
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
				wp_enqueue_script( 'comment-reply' );
			endif;
		}

		/**
		 * Handle admin styles
		 *
		 * @since Theming_ 0.0.0
		 */
		public function admin_enqueue_styles()
		{
			wp_register_style( 'admin', get_theme_file_uri( '/assets/dist/css/admin.css' ) );
			wp_enqueue_style( 'admin' );
		}

		/**
		 * Get Instance
		 *
		 * @since Theming_ 0.0.1
		 */
	    public static function getInstance() : self
	    {
	        if (null === self::$instance) {
	            self::$instance = new self();
	        }
	        return self::$instance;
	    }
	}

	Theming_Enqueue::getInstance()->init();
}
