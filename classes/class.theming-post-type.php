<?php
/**
 * Custom Post Type
 *
 * @since Theming_ 0.0.1
 */
abstract class Theming_Custom_Post_Type
{

	/**
	 * Post Type slug
	 * @access protected
	 *
	 * @since Theming_ 0.0.1
	 */
	protected $post_type;

	/**
	 * Labels
	 * @access protected
	 *
	 * @since Theming_ 0.0.1
	 */
	protected $labels = array();

	/**
	 * Arguments
	 * @access protected
	 *
	 * @since Theming_ 0.0.1
	 */
	protected $args = array();

	/**
	 * Init
	 *
	 * @since Theming_ 0.0.1
	 */
	public function init()
	{
 		add_action( 'init', array( $this, 'register_post_type' ) );
 		add_action( 'after_switch_theme', array( $this, 'flush' ) );
	}

 	/**
 	 * Register CPT
 	 *
 	 * @since Theming_ 0.0.1
 	 */
 	public function register_post_type()
 	{
 		$labels = array( 'labels' => $this->labels );
 		$args = array_merge( $labels, $this->args );
 		register_post_type( $this->post_type, $args );
 	}

 	/**
 	 * Flush rewrite rules
 	 *
 	 * @since Theming_ 0.0.1
 	 */
 	public function flush()
 	{
 		$this->register_post_type();

 		flush_rewrite_rules();
 	}
}
