<?php
require_once plugin_dir_path(__FILE__) . '../public/user/functions.php';

// Add the Importer role.
add_action('init', 'jmts_add_importer_role');

function jmts_add_importer_role() {
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

