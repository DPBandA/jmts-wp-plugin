<?php
/**
 * Plugin Name: JMTS-WP
 * Plugin URI: 
 * Description: The WordPress plugin for the Job Management & Tracking System (JMTS).
 * Version: 1.0
 * Author: DPB&A
 * Author URI: https://dpbennett.com.jm
 * Author Email: info@dpbennett.com.jm
 * License: GNU AFFERO GENERAL PUBLIC LICENSE, Version 3, 19 November 2007
 * License URI: https://www.gnu.org/licenses/
 * Text Domain:
 * Domain Path:
 */

define( 'jmts', 1 );

require plugin_dir_path( __FILE__ ).'user-admin.php';

if ( is_admin() ) {
	require plugin_dir_path( __FILE__ ).'admin.php';	
}

