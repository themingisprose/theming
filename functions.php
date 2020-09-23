<?php
/**
 * CONTSTANTS
 */
define( 'THEMING_THEME_DIR', get_template_directory() );

/**
 * Include classes files
 */
require_once( THEMING_THEME_DIR . '/classes/class.theming-setup.php' );
require_once( THEMING_THEME_DIR . '/classes/class.theming-enqueue.php' );

/**
 * Include template files
 */
require_once( THEMING_THEME_DIR . '/templates/navigation.php' );
