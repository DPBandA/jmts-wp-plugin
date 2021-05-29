<?php
/**
 * Plugin Name: JMTS-WP
 * Plugin URI: 
 * Description: The WordPress plugin for the Job Management & Tracking System (JMTS).
 * Version: 1.0
 * Author: DPB&A
 * Author URI: https://dpbennett.com.jm
 * Author Email: info@dpbennett.com.jm
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:
 * Domain Path:
 */

define( 'jmts', 1 );

require plugin_dir_path( __FILE__ ).'user-admin.php';

if ( is_admin() ) {
	require plugin_dir_path( __FILE__ ).'admin.php';	
}

