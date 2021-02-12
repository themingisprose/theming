<?php
/**
 * Admin API Fields
 *
 * @since Theming 0.0.1
 */
if ( ! class_exists( 'Theming_Social_Options' ) ) :

	class Theming_Social_Options extends Theming_Setting_Fields
	{

		/**
		 * Array of fields to render
		 * @return array 		Array of fields
		 *
		 * @since Theming 0.0.1
		 */
		public function fields()
		{
			$fields = array(
				'twitter'	=> array(
					'label'		=> __( 'Twitter', 'theming' ),
					'option'	=> 'twitter',
				),
				'facebook'	=> array(
					'label'		=> __( 'Facebook', 'theming' ),
					'option'	=> 'facebook',
				),
				'github'	=> array(
					'label'		=> __( 'Github', 'theming' ),
					'option'	=> 'github',
				),
				'instagram'	=> array(
					'label'		=> __( 'Instagram', 'theming' ),
					'option'	=> 'instagram',
				),
				'telegram'	=> array(
					'label'		=> __( 'Telegram', 'theming' ),
					'option'	=> 'telegram',
				),
			);

			/**
			 * Filters the Theming API Options fields
			 * @param array $fields
			 *
			 * @since Rex 1.0.0
			 */
			return apply_filters( 'theming_setting_api_fields', $fields );
		}
	}

	$init = new Theming_Social_Options( 'theming-social-option', __( 'Social Networks', 'theming' ), 'theming-social-fields', __( 'Social Profiles', 'theming' ) );
	$init->init();

endif;
