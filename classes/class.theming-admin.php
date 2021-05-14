<?php
/**
* Admin Page
*
* @since Theming_ 0.0.1
*/
class Theming_Admin
{

	/**
	 * @var null
	 */
	protected static $instance = null;

	/**
	 * Page slug
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $slug;

	/**
	 * Option Group
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $option_group;

	/**
	 * Option Name
	 * @access public
	 *
	 * @since Theming_ 0.0.1
	 */
	public $option_name;

	/**
	 * Construct
	 *
	 * @since Theming_ 0.0.1
	 */
	public function __construct()
	{
		$this->slug 			= 'theming-setting';
		$this->option_group 	= 'theming_setting';
		$this->option_name 		= 'theming_options';
	}

	/**
	 * Init
	 *
	 * @since Theming_ 0.0.1
	 */
	public function init()
	{
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	 * Add the admin menu page
	 *
	 * @since Theming_ 0.0.1
	 */
	public function admin_menu()
	{
		add_menu_page(
			sprintf( __( '%s Admin Page', 'theming' ), $this->theme() ),
			$this->theme(),
			'manage_options',
			$this->slug,
			array( $this, 'setting_options' ),
			'',
			2
		);
	}

	/**
	 * Display the form
	 *
	 * @since Theming_ 0.0.1
	 */
	public function setting_options()
	{
		?>
			<div class="wrap">
				<h2><?php printf( __( '%s Dashboard', 'theming' ), $this->theme() ) ?></h2>
				<?php settings_errors( 'theming-update' ) ?>
				<form id="<?php echo $this->slug ?>" method="post" action="options.php">
					<?php
						settings_fields( $this->option_group );
						do_settings_sections( $this->slug );
						submit_button();
					?>
				</form>
			</div>
		<?php
	}

	/**
	 * Theme data
	 *
	 * @since Theming_ 0.0.1
	 */
	private function theme()
	{
		return wp_get_theme()->get( 'Name' );
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

Theming_Admin::get_instance()->init();
