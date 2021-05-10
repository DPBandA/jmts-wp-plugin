<?php

/**
 * Plugin Name: JMTS Client
 * Plugin URI: 
 * Description: A plugin for the Job Management & Tracking System (JMTS) client.
 * Version: 1.0
 * Author: Desmond Bennett
 * Author URI: 
 * Author Email: 
 * License: GNU AFFERO GENERAL PUBLIC LICENSE Version 3, 19 November 2007
 * License URI: https://www.gnu.org/licenses
 * Text Domain: jmts
 * Domain Path: 
 */

function jmts_client_post_type() {
  $labels = array(
    'name' => _x( 'Clients', 'Post Type General Name', 'jmts_client' ),
    'singular_name' => _x( 'Client', 'Post Type Singular Name', 'jmts_client' ),
    'menu_name' => __( 'Clients', 'jmts_client' ),
    'name_admin_bar' => __( 'Client', 'jmts_client' ),
    'archives' => __( 'Client Archives', 'jmts_client' ),
  );

  $args = array(
    'label' => __( 'Client', 'jmts_client' ),
    'description' => __( 'Client Description', 'jmts_client' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    'taxonomies' => array( 'category', 'post_tag' ),    
    'public' => true, 
    'has_archive' => true,
    //'show_in_rest' => true,
    'capability_type' => 'post',
  );
  register_post_type( 'client', $args );
}

add_action( 'init', 'jmts_client_post_type');

