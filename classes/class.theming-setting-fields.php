<?php
/**
* Setting Fields
*
* @since Theming_ 0.0.1
*/
abstract class Theming_Setting_Fields
{

	/**
	 * Section ID
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $section_id;

	/**
	 * Section Title
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $section_title;

	/**
	 * Field ID
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $field_id;

	/**
	 * Field Title
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $field_title;


	/**
	 * Construct
	 *
	 * @since Theming_ 0.0.1
	 */
	public function __construct( $section_id = '', $section_title = '', $field_id = '', $field_title = '' )
	{
		$admin = new Theming_Admin;
		$this->slug 			= $admin->slug;
		$this->option_group 	= $admin->option_group;
		$this->option_name 		= $admin->option_name;

		$this->section_id 		= $section_id;
		$this->section_title 	= $section_title;
		$this->field_id 		= $field_id;
		$this->field_title 		= $field_title;
	}

	/**
	 * Init
	 *
	 * @since Theming_ 0.0.1
	 */
	public function init()
	{
		add_action( 'admin_menu', array( $this, 'register_setting' ) );
		add_filter( 'theming_options_input', array( $this, 'validate' ) );
	}

	/**
	 * Register Setting
	 *
	 * @since Theming_ 0.0.1
	 */
	public function register_setting()
	{
		register_setting(
			$this->option_group,
			$this->option_name,
			array( $this, 'sanitize_options' )
		);

		add_settings_section(
			$this->slug .'-'. $this->section_id,
			$this->section_title,
			'__return_false',
			$this->slug
		);

		add_settings_field(
			$this->slug .'-'. $this->field_id,
			$this->field_title,
			$this->callback(),
			$this->slug,
			$this->slug .'-'. $this->section_id
		);
	}

	/**
	 * Main configuration function
	 * @param string $option 	Option stored in theming_options in the data base option table.
	 * @return string 			String. Value of $option.
	 *
	 * @since Theming_ 0.0.1
	 */
	public function get_option( $option )
	{
		$value = get_option( $this->option_name );
		return $value[$option];
	}

	/**
	 * Sanitize Callback
	 *
	 * @since Theming_ 0.0.1
	 */
	public function sanitize_options()
	{
		/**
		 * Filters the Options Input
		 * @param array 	Array of key => value
		 *
		 * @since Theming_ 0.0.1
		 */
		return apply_filters( 'theming_options_input', array() );
	}

	/**
	 * Get the callable that will the content of the section.
	 * @return callable
	 *
	 * @since Theming_ 0.0.1
	 */
	public function callback()
	{
		return array( $this, 'render' );
	}

	/**
	 * Render the content of the section
	 *
	 * @since Theming_ 0.0.1
	 */
	public function render()
	{
		$fields = $this->fields();

		foreach ( $fields as $key => $value ) :
			$type = ( isset( $value['type'] ) ) ? $value['type'] : 'text';
			$this->html( $value['option'], $value['label'], $type );
		endforeach;
	}

	/**
	 * Form fields to render
	 * @param string $option
	 * @param string $label
	 * @param string $type
	 *
	 * @since Theming_ 0.0.1
	 */
	public function html( $option, $label, $type = 'text' )
	{
	?>
		<div class="mb-2">
		<label for="<?php echo $option ?>" class="description d-block mb-2"><?php echo $label ?></label>
		<?php
			if ( 'editor' == $type ) :
				$settings = array(
					'media_buttons'	=> false,
					'textarea_rows'	=> 7,
					'teeny'			=> true,
					'quicktags'		=> false,
					'tinymce'		=> array(
						'resize'				=> false,
						'wordpress_adv_hidden'	=> false,
						'add_unload_trigger'	=> false,
						'statusbar'				=> false,
						'wp_autoresize_on'		=> false,
						'toolbar1'				=> 'bold,italic,bullist,|,link,unlink,|,undo,redo',
					),
				);
				wp_editor( $this->get_option( $option ), $option, $settings );
			elseif ( 'textarea' == $type ) :
		?>
		<textarea id="<?php echo $option ?>" class="regular-text mb-3" name="<?php echo $option ?>" cols="30" rows="5"><?php echo $this->get_option( $option ) ?></textarea>
		<?php else : ?>
		<input id="<?php echo $option ?>" class="regular-text mb-3" type="<?php echo $type ?>" name="<?php echo $option ?>" value="<?php echo $this->get_option( $option ) ?>">
		<?php endif; ?>
		</div>
	<?php
	}

	/**
	 * Process validation fields
	 *
	 * @since Theming_ 0.0.1
	 */
	public function validate( $input )
	{
		$fields = $this->fields();

		foreach ( $fields as $key => $value ) :
				if ( isset( $_POST[$value['option']] ) )
					$input[$value['option']] = stripslashes( trim( $_POST[$value['option']] ) );
		endforeach;

		// TODO: This generate an unexpected output.
		// add_settings_error( 'theming-update', 'theming', __( 'Setting Updated', 'theming' ), 'success' );

		return array_merge( $input, $input );
	}

	/**
	 * Array of fields to render
	 * This method must return an associative array like the example
	 * 		$fields = array(
	 * 			'field_key_name' => array(
	 * 				'label'		=> 'Field Name',
	 * 				'option'	=> 'field_option_name',
	 * 			),
	 * 			...
	 * 		);
	 * @return array 		Array of fields
	 *
	 * @since Theming_ 0.0.1
	 */
	abstract public function fields();
}
