<?php
/**
 * Register widgets areas
 *
 * @since Theming_ 0.0.1
 */
if ( ! class_exists( 'Theming_Sidebar' ) ) :

	class Theming_Sidebar
	{

		/**
		 * @var null
		 */
		protected static $instance = null;

		/**
		 * Init
		 */
		public function init()
		{
			add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		}

		/**
		 * Register Sidebars
		 *
		 * @since Theming_ 1.0.0
		 */
		public function register_sidebars()
		{
			// Arguments used in all register_sidebar() calls
			$args = array(
				'before_title'  => '<h3 class="widget-title h5 bm-3 fw-bolder">',
				'after_title'   => '</h3>',
				'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
				'after_widget'  => '</div></div>',
			);

			// Footer #1.
			register_sidebar(
				array_merge(
					$args,
					array(
						'name'        => __( 'Footer #1', 'theming' ),
						'id'          => 'sidebar-1',
						'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'theming' ),
					)
				)
			);

			// Footer #2.
			register_sidebar(
				array_merge(
					$args,
					array(
						'name'        => __( 'Footer #2', 'theming' ),
						'id'          => 'sidebar-2',
						'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'theming' ),
					)
				)
			);

			// Footer #3.
			register_sidebar(
				array_merge(
					$args,
					array(
						'name'        => __( 'Footer #3', 'theming' ),
						'id'          => 'sidebar-3',
						'description' => __( 'Widgets in this area will be displayed in the third column in the footer.', 'theming' ),
					)
				)
			);

			// Footer #4.
			register_sidebar(
				array_merge(
					$args,
					array(
						'name'        => __( 'Footer #4', 'theming' ),
						'id'          => 'sidebar-4',
						'description' => __( 'Widgets in this area will be displayed in the fourth column in the footer.', 'theming' ),
					)
				)
			);
		}

		/**
		 * Get Instance
		 *
		 * @since Theming_ 0.0.1
		 */
	    public static function get_instance() : self
	    {
	        if (null === self::$instance) {
	            self::$instance = new self();
	        }
	        return self::$instance;
	    }
	}

endif;

Theming_Sidebar::get_instance()->init();
