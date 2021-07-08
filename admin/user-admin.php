<?php

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
        // Step 9 Code
        $jmts_user_is_importer = get_user_meta($user->ID, 'jmts_user_is_importer',true);
        
        $display = "<table class='form-table'>";
        $display .= "<tr><th>" . __('Importer', 'jmts') . "</th>
<td><select name='jmts_user_is_importer' >
<option " . selected('no', $jmts_user_is_importer, true) . "value='no'>" . __('No', 'jmts') . "</option>
<option " . selected('yes', $jmts_user_is_importer, true) . "value='yes'>" . __('Yes', 'jmts') . "</option>
</select></td></tr>";
        $display .= "</table>";
        echo $display;
    }
}

add_action('personal_options_update', 'jmts_user_save_importer_manufacturer_profile', 9999);
add_action('edit_user_profile_update', 'jmts_user_save_importer_manufacturer_profile');

function jmts_user_save_importer_manufacturer_profile($user_id) {
    if ($_POST && current_user_can('edit_user', $user_id)) {
        $jmts_user_is_importer = isset($_POST['jmts_user_is_importer']) ?
                sanitize_text_field($_POST['jmts_user_is_importer']) : '';        
    }
}
