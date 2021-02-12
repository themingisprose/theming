<?php
// Silent is gold

// Admin classes
require_once( get_template_directory() . '/classes/class.theming-admin.php' );
require_once( get_template_directory() . '/classes/class.theming-admin-setting-fields.php' );
require_once( get_template_directory() . '/classes/class.theming-admin-social-options.php' );

// General Theme classes
require_once( get_template_directory() . '/classes/class.theming-setup.php' );
require_once( get_template_directory() . '/classes/class.theming-sidebar.php' );
require_once( get_template_directory() . '/classes/class.theming-enqueue.php' );

// External classes
require_once( get_template_directory() . '/classes/class.theming-walker-comment.php' );
