<?php
// Remove admin toolbar for non-admin users
add_action('after_setup_theme', 'jmts_remove_admin_bar');

function jmts_remove_admin_bar() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}

// Remove backend access for non-admin users
add_action('admin_init', 'jmts_remove_backend_access');

function jmts_remove_backend_access() {
    if (!current_user_can('administrator')) {
        wp_redirect(site_url());
        exit;
    }
}

// A short code to display a user's data for editing and viewing
add_shortcode('jmts_user', 'jmts_user_meta_data');

function jmts_user_meta_data() {
    ?>
    <?php
    global $jmts_user, $jmts_user_trn, $jmts_user_is_importer;
    // tk - $jmts_user will be provided as a parameter??
    if (is_user_logged_in()) {
        $jmts_user = wp_get_current_user();
    } else {
        ?>
        <h5 style="text-align:center;">
            PLEASE LOG IN OR REGISTER TO SUBMIT OR UPDATE THE IMPORTER REGISTRATION FORM
        </h5>
        <?php
        exit();
    }

    // Retrieve stored user meta data
    $jmts_user_trn = get_user_meta($jmts_user->ID, 'jmts_user_trn', true);
    $jmts_user_is_importer = get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true);

    if (!empty($_POST['form_submitted'])) {
        
        // Get and save user meta data
        $jmts_user_trn = isset($_POST['jmts_user_trn']) ?
                sanitize_text_field($_POST['jmts_user_trn']) : '';
        $jmts_user_is_importer = isset($_POST['jmts_user_is_importer']) ?
                sanitize_text_field($_POST['jmts_user_is_importer']) : '';

        update_user_meta($jmts_user->ID, 'jmts_user_trn', $jmts_user_trn);
        update_user_meta($jmts_user->ID, 'jmts_user_is_importer', $jmts_user_is_importer);
        
        ?>
        <h6 style="text-align:center;color: darkblue;">
            YOUR FORM WAS SUCCESSFULLY UPDATED
        </h6>
        <?php
    } 
    ?>
    <h5 style="text-align:center;">IMPORTERS/MANUFACTURERS REGISTRATION FORM</h5>
    <h6 style="text-align:center;">Standards Regulations, 1983 </h6>
    <p style="color: red;">
        This form must be completed in full to register as an importer and or 
        manufacturer in accordance with regulation 8B of the Standards Regulations, 1983
    </p>
    <form method="post" action="" >
        <input type="hidden" name="form_submitted" value="true" />
        <table class="form-table" style="border: 0;">    
            <tr>
                <th style="border: 0;">
                    <label for="jmts_user_is_importer">Are you an importer?</label>
                </th>
                <td style="border: 0;">
                    <select id="jmts_user_is_importer">
                        <option <?= selected('no', $jmts_user_is_importer, true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', $jmts_user_is_importer, true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>
                <th style="border: 0;">
                    <label for="ismanufacturer">Are you an manufacturer?</label>
                </th>
                <td style="border: 0;">
                    <input type="checkbox"
                           class="regular-text ltr"
                           id="ismanufacturer"
                           name="ismanufacturer"
                           value="ismanufacturer" >
                </td>            
            </tr>
            <tr>
                <th style="border: 0;">
                    <label for="isfirstregister">Are you registering for first time?</label>
                </th>
                <td style="border: 0;">
                    <input type="checkbox"
                           class="regular-text ltr"
                           id="isfirstregister"
                           name="isfirstregister"
                           value="isfirstregister" >
                </td>            
            </tr>
            <tr>            
                <th style="border: 0;">
                    <label for="jmts_user_trn">Tax Registration Number (TRN)</label>
                </th>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_trn"
                           name="jmts_user_trn"
                           value=<?= $jmts_user_trn ?> >
                </td>
            </tr>
            <tr>            
                <th style="border: 0;">
                    <label for="birthday">Birthday</label>
                </th>
                <td style="border: 0;">
                    <input type="date"
                           class="regular-text ltr"
                           id="birthday"
                           name="birthday"
                           value="<?= esc_attr(get_user_meta($user->ID, 'birthday', true)) ?>"
                           title="Please use YYYY-MM-DD as the date format."
                           pattern="(19[0-9][0-9]|20[0-9][0-9])-(1[0-2]|0[1-9])-(3[01]|[21][0-9]|0[1-9])" >
                    <p class="description">
                        Please enter your birthday date.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="border: 0;">

                </td>  
                <td style="border: 0;">
                    <input type="submit" value="Submit">
                </td>            
            </tr>
        </table>
    </form>
    <?php
}
