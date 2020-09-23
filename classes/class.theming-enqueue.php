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
			wp_register_script( 'theming', get_theme_file_uri( 'assets/dist/js/app.js' ) );
			wp_enqueue_script( 'theming' );
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
