<?php

/*
 * Job Administration...
 */

add_action('init', 'jmts_create_job_post_type');

function jmts_create_job_post_type() {
    register_post_type('job',
            array(
                'labels' => array(
                    'name' => 'Jobs',
                    'singular_name' => 'Job',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Job',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Job',
                    'new_item' => 'New Job',
                    'view' => 'View',
                    'view_item' => 'View Job',
                    'search_items' => 'Search Jobs',
                    'not_found' => 'No Jobs found',
                    'not_found_in_trash' =>
                    'No Jobs found in Trash',
                    'parent' => 'Parent Job'
                ),
                'public' => true,
                //'menu_position' => 20,
                'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
                'taxonomies' => array(''),
                //'menu_icon' => plugins_url('images/jmts.png', __FILE__),
                'has_archive' => true,
                'exclude_from_search' => true
            )
    );
}
