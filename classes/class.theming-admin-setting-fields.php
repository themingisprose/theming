<?php
/**
 * Setting Fields
 *
 * @since Theming_ 0.0.1
 */
if ( ! class_exists( 'Theming_Setting_Fields' ) ) :

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
		 * @param string $option 	Option stored in theming_options in the data base option table. Optional
		 *
		 * @since Theming_ 0.0.1
		 */
		public function get_option( $option ){
			if ( ! $option )
				return;

			$value = get_option( 'theming_options' );

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
			?>
				<label for="<?php echo $value['option'] ?>" class="description d-block mb-1"><?php echo $value['label'] ?></label>
				<input id="<?php echo $value['option'] ?>" class="regular-text mb-3" type="text" name="<?php echo $value['option'] ?>" value="<?php echo $this->get_option( $value['option'] ) ?>">
			<?php
			endforeach;
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
				$input[$value['option']] = sanitize_text_field( $_POST[$value['option']] );
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

endif;
