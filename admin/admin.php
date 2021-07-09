<?php
if (!defined('jmts')) {
    exit;
}

// Register default options
register_activation_hook(__FILE__, 'jmts_set_default_options_array');

function jmts_set_default_options_array() {
    jmts_get_options();
}

function jmts_get_options() {
    $options = get_option('jmts_options', array());
    $new_options['jmts_user_default_role'] = 'Subscriber';
    $new_options['maximum_upload_file_size'] = "256 MB";
    $new_options['send_email_notification_to'] = get_option('admin_email');
    $new_options['send_error_notification_to'] = get_option('admin_email');
    $merged_options = wp_parse_args($options, $new_options);
    $compare_options = array_diff_key($new_options, $options);
    if (empty($options) || !empty($compare_options)) {
        update_option('jmts_options', $merged_options);
    }

    return $merged_options; 
}

add_action('admin_menu', 'jmts_admin_menu');

function jmts_admin_menu() {

    // Create top-level menu item
    add_menu_page('JMTS Configuration',
            'JMTS',
            'manage_options',
            'jmts-main-menu',
            'jmts_main',
            plugins_url('images/jmts.png', __FILE__));

    add_submenu_page('jmts-main-menu',
            'JMTS Settings',
            'Settings',
            'manage_options',
            'jmts-settings-sub-menu',
            'jmts_settings_submenu');

    //global $submenu;
    //$url = 'https://dpbennett.com.jm';
    //$submenu['jmts-main-menu'][] = array('Help & Support', 'manage_options', $url);
}

function jmts_main() {
    ?>
    <h2>Overview</h2>

    <h3>Coming soon!</h3>

    <?php
}

function jmts_settings_submenu() {

    if (!empty($_POST['jmts_save_options'])) {
        jmts_save_options();
        ?>
        <div class='updated fade'>
            <p><strong>Settings Saved</strong></p></div>
        <?php
    }

    // Retrieve plugin configuration options from database
    $options = jmts_get_options();
    
    ?>
    <div id="jmts-settings" class="wrap">
        <h2>Settings</h2><br />
        <form method="post" action="">
            <input type="hidden" name="jmts_save_options" value="jmts_save_options" />
            <!-- Adding security through hidden referrer field -->
            <?php wp_nonce_field('jmts'); ?>
            <table style="border: 0;">
                <tr>
                    <td style="border: 0;">
                        <label for="jmts_user_default_role">
                            <strong>Default user role</strong>
                        </label>
                    </td>
                    <td style="border: 0;">
                        <input type="text" 
                               name="jmts_user_default_role" 
                               value="<?php echo esc_html($options['jmts_user_default_role']); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0;">
                        <label for="jmts_user_default_role">
                            <strong>Maximum upload file size</strong>
                        </label>
                    </td>
                    <td style="border: 0;">
                        <input type="text" 
                               name="maximum_upload_file_size" 
                               value="<?php echo esc_html($options['maximum_upload_file_size']); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0;">
                        <label for="send_email_notification_to">
                            <strong>Send email notification to</strong>
                        </label>
                    </td>
                    <td style="border: 0;">
                        <input type="text" 
                               name="send_email_notification_to" 
                               value="<?php echo esc_html($options['send_email_notification_to']); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0;">
                        <label for="send_error_notification_to">
                            <strong>Send error notification to</strong>
                        </label>
                    </td>
                    <td style="border: 0;">
                        <input type="text" 
                               name="send_error_notification_to" 
                               value="<?php echo esc_html($options['send_error_notification_to']); ?>"/>
                    </td>
                </tr>
            </table>
            <br/><br/>
            <input type="submit" value="Save" class="button-primary"/>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'jmts_admin_init');

function jmts_admin_init() {
    add_action('admin_post_save_jmts_options', 'jmts_process_options');
}

function jmts_save_options() {
    // Check that user has proper security level
    if (!current_user_can('manage_options')) {
        wp_die('Not allowed');
    }
    // Check if nonce field configuration form is present
    check_admin_referer('jmts');
    
    // Retrieve original plugin options array
    $options = jmts_get_options();

    foreach ($options as $option_name => $option_value) {
        if (isset($_POST[$option_name])) {
            $options[$option_name] = sanitize_text_field($_POST[$option_name]);
        }
    }
   
    // Store updated options array to database
    update_option('jmts_options', $options);  
}
