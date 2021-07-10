<?php
/**
 * Plugin Name: JMTS-WP
 * Plugin URI: https://jmts.dpbennett.com.jm
 * Description: The WordPress plugin for the Job Management & Tracking System (JMTS).
 * Version: 1.0.0
 * Author: DPB&A
 * Author URI: https://dpbennett.com.jm
 * Author Email: info@dpbennett.com.jm
 * License: AGPLv3
 * License URI: https://www.gnu.org/licenses/agpl-3.0.txt
 * Text Domain: jmts-wp
 */

define( 'jmts', 1 );

require plugin_dir_path( __FILE__ ).'/public/user/importer_manufacturer.php';
require plugin_dir_path( __FILE__ ).'/public/job/job.php';

if ( is_admin() ) {
	require plugin_dir_path( __FILE__ ).'/admin/admin.php';	
	require plugin_dir_path( __FILE__ ).'/admin/user-admin.php';
        require plugin_dir_path( __FILE__ ).'/admin/job-admin.php';
}

