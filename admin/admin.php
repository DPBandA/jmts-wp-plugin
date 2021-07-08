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
    $new_options['jmts_default_user_role'] = 'subscriber';
    //$new_options['track_outgoing_links'] = false;
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

    global $submenu;
    $url = 'https://dpbennett.com.jm';
    $submenu['jmts-main-menu'][] = array('Help & Support', 'manage_options', $url);
}

function jmts_main() {
    ?>
    <h2>Overview</h2>

    <h3>Coming soon!</h3>

    <?php
    if (isset($_GET['message']) && $_GET['message'] == '1') {
        ?>
        <div id='message' class='updated fade'>
            <p><strong>Settings Saved</strong></p></div>
        <?php
    }
    ?>
    <?php
}

function jmts_settings_submenu() {
    // Retrieve plugin configuration options from database
    $options = jmts_get_options();
    ?>
    <div id="jmts-settings" class="wrap">
        <h2>Settings</h2><br />
        <form method="post" action="admin-post.php">
            <input type="hidden" name="action" value="save_jmts_options" />
            <!-- Adding security through hidden referrer field -->
            <?php wp_nonce_field('jmts'); ?>
            Default user role: 
            <input type="text" 
                   name="jmts_user_default_role" 
                   value="<?php echo esc_html($options['jmts_user_default_role']); ?>"/>
            <br/><br/>
            <input type="submit" value="Submit" class="button-primary"/>
        </form>
    </div>
    <?php
}

add_action('admin_init', 'jmts_admin_init');

function jmts_admin_init() {
    add_action('admin_post_save_jmts_options', 'jmts_process_options');
}

function jmts_process_options() {
    // Check that user has proper security level
    if (!current_user_can('manage_options')) {
        wp_die('Not allowed');
    }
    // Check if nonce field configuration form is present
    check_admin_referer('jmts');
    // Retrieve original plugin options array
    $options = jmts_get_options();
    // Cycle through all text form fields and store their values
    // in the options array
    foreach ($options as $option_name) {
        if (isset($_POST[$option_name])) {
            $options[$option_name] = sanitize_text_field($_POST[$option_name]);
        }
    }
    // Cycle through all check box form fields and set the options
    // array to true or false values based on presence of variables
    // foreach ( array( 'track_outgoing_links' ) as $option_name ) {
    // if ( isset( $_POST[$option_name] ) ) {
    // $options[$option_name] = true;
    //} else {
    //$options[$option_name] = false;
    //}
    //}
    // Store updated options array to database
    update_option('jmts_options', $options);
    // Redirect the page to the configuration form
    //wp_redirect( add_query_arg( 'page', 'jmts-main-menu', 
    //						   admin_url( 'options-general.php' ) ) );
    wp_redirect(add_query_arg(
                    array('page' => 'jmts-main-menu', 'message' => '1'),
                    admin_url('options-general.php')));
    exit;
}
