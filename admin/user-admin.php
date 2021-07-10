<?php
require_once plugin_dir_path(__FILE__) . '../public/user/functions.php';

// Add the Importer role.
add_action('init', 'jmts_user_add_importer_role');

function jmts_user_add_importer_role() {
    add_role(
            'importer',
            'Importer',
            array(
                'read' => true,
                'edit_posts' => true,
                'upload_files' => true,
            ),
    );
}

add_action('show_user_profile', 'jmts_user_importer_manufacturer_profile');
add_action('edit_user_profile', 'jmts_user_importer_manufacturer_profile');

function jmts_user_importer_manufacturer_profile($user) {
    if (current_user_can('edit_user', $user->ID)) {

        echo jmts_user_get_importer_manufacturer_form_table($user);
    }
}

add_action('personal_options_update', 'jmts_user_save_importer_manufacturer_profile', 9999);
add_action('edit_user_profile_update', 'jmts_user_save_importer_manufacturer_profile');

function jmts_user_save_importer_manufacturer_profile($user_id) {
    $user = get_user_by('id', $user_id);
    jmts_user_save__meta_data($user);
}

add_action( 'pre_user_query', function( $uqi ) {
    global $wpdb;
 
    $search = '';
    if (isset($uqi->query_vars['search'])) {
        $search = trim($uqi->query_vars['search']);
    }

    if ( $search ) {
        $search = trim($search, '*');
        $the_search = '%'.$search.'%';
 
        $search_meta = $wpdb->prepare("
        ID IN ( SELECT user_id FROM {$wpdb->usermeta}
        WHERE ( ( meta_key='first_name' OR meta_key='last_name'
                OR meta_key='jmts_user_applicant_business_name'
                OR meta_key='jmts_user_applicant_name' )
            AND {$wpdb->usermeta}.meta_value LIKE '%s' )
        )", $the_search);
 
        $uqi->query_where = str_replace(
            'WHERE 1=1 AND (',
            "WHERE 1=1 AND (" . $search_meta . " OR ",
            $uqi->query_where );
    }
});

