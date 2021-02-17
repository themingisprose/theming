<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Theming_ .0.0.1
 */
if ( ! class_exists( 'Theming_Setup' ) ) {
	class Theming_Setup {

		/**
		 * @var null
		 */
		protected static $instance = null;

		/**
		 * Hook the theme setup
		 *
		 * @since Theming_ 0.0.1
		 */
		public function init()
		{
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
		}

		/**
		 * Add theme support
		 *
		 * @since Theming_ 0.0.1
		 */
		public function setup()
		{
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Custom background color.
			add_theme_support(
				'custom-background',
				array(
					'default-color' => 'ffffff',
				)
			);

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// Custom Background
			$cb_defaults = array(
				'default-color'          => '',
				'default-image'          => '',
				'default-repeat'         => 'repeat',
				'default-position-x'     => 'left',
				'default-position-y'     => 'top',
				'default-size'           => 'auto',
				'default-attachment'     => 'scroll',
				'wp-head-callback'       => '_custom_background_cb',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			);

			/**
			 * Filters the custom background arguments
			 * @param array $cb_defaults 	Array of arguments
			 *
			 * @since Theming_ 0.0.1
			 */
			add_theme_support( 'custom-background', apply_filters( 'theming_custom_brackground_args', $cb_defaults ) );

			// Custom Header
			$ch_defaults = array(
				'default-image'          => '',
				'width'                  => 0,
				'height'                 => 0,
				'flex-height'            => false,
				'flex-width'             => false,
				'uploads'                => true,
				'random-default'         => false,
				'header-text'            => true,
				'default-text-color'     => '',
				'wp-head-callback'       => '',
				'admin-head-callback'    => '',
				'admin-preview-callback' => '',
			);

			/**
			 * Filters the custom headers arguments
			 * @param array $ch_defaults 	Array of arguments
			 *
			 * @since Theming_ 0.0.1
			 */
			add_theme_support( 'custom-header', apply_filters( 'theming_custom_brackground_args', $ch_defaults ) );

			// Custom Logo
			$cl_defaults = array(
				'height'		=> 100,
				'width'			=> 400,
				'flex-height'	=> true,
				'flex-width'	=> true,
				'header-text'	=> array( 'site-title', 'site-description' ),
			);

			/**
			 * Filters the custom logo arguments
			 * @param array $cl_defaults 	Array of arguments
			 *
			 * @since Theming_ 0.0.1
			 */
			add_theme_support( 'custom-logo', apply_filters( 'theming_custom_brackground_args', $cl_defaults ) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				array(
					'comment-list',
					'comment-form',
					'search-form',
					'gallery',
					'caption',
					'style',
					'script'
				)
			);

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			// Register navigation menus
			$locations = array(
				'top-menu'	=> __( 'Top Menu', 'theming' ),
			);

			/**
			 * Filters menu locations
			 * @param array $locations 		Array of locations
			 *
			 * @since Theming_ 0.0.1
			 */
			register_nav_menus( apply_filters( 'theming_menu_locations', $locations ) );
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

	Theming_Setup::getInstance()->init();
}
