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
        <h5 style="text-align:center;color: darkblue;">
            PLEASE LOG IN OR REGISTER TO SUBMIT OR UPDATE THE IMPORTER REGISTRATION FORM
        </h5>
        <?php
        exit();
    }

    // Retrieve stored user meta data
    $jmts_user_is_importer = get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true);
    $jmts_user_is_manufacturer = get_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', true);
    $jmts_user_is_first_time = get_user_meta($jmts_user->ID, 'jmts_user_is_first_time', true);
    $jmts_user_trn = get_user_meta($jmts_user->ID, 'jmts_user_trn', true);    
    $jmts_user_is_tcc_valid = get_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', true);
    $jmts_user_tcc_expiration_date = get_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', true); 
    $jmts_user_applicant_firstname1 = get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', true); 
    $jmts_user_applicant_lastname1 = get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', true);
    $jmts_user_applicant_firstname2 = get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', true); 
    $jmts_user_applicant_lastname2 = get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', true);

    if (!empty($_POST['form_submitted'])) {
        
        // Get and save user meta data        
        $jmts_user_is_importer = isset($_POST['jmts_user_is_importer']) ?
                sanitize_text_field($_POST['jmts_user_is_importer']) : '';
        $jmts_user_is_manufacturer = isset($_POST['jmts_user_is_manufacturer']) ?
                sanitize_text_field($_POST['jmts_user_is_manufacturer']) : '';
        $jmts_user_is_first_time = isset($_POST['jmts_user_is_first_time']) ?
                sanitize_text_field($_POST['jmts_user_is_first_time']) : '';
        $jmts_user_trn = isset($_POST['jmts_user_trn']) ?
                sanitize_text_field($_POST['jmts_user_trn']) : '';
        $jmts_user_is_tcc_valid = isset($_POST['jmts_user_is_tcc_valid']) ?
                sanitize_text_field($_POST['jmts_user_is_tcc_valid']) : '';
        $jmts_user_tcc_expiration_date = isset($_POST['jmts_user_tcc_expiration_date']) ?
                sanitize_text_field($_POST['jmts_user_tcc_expiration_date']) : '';
        $jmts_user_applicant_firstname1 = isset($_POST['jmts_user_applicant_firstname1']) ?
                sanitize_text_field($_POST['jmts_user_applicant_firstname1']) : '';
        $jmts_user_applicant_lastname1 = isset($_POST['jmts_user_applicant_lastname1']) ?
                sanitize_text_field($_POST['jmts_user_applicant_lastname1']) : '';
        $jmts_user_applicant_firstname2 = isset($_POST['jmts_user_applicant_firstname2']) ?
                sanitize_text_field($_POST['jmts_user_applicant_firstname2']) : '';
        $jmts_user_applicant_lastname2 = isset($_POST['jmts_user_applicant_lastname2']) ?
                sanitize_text_field($_POST['jmts_user_applicant_lastname2']) : '';

        // Save user meta data
        update_user_meta($jmts_user->ID, 'jmts_user_is_importer', $jmts_user_is_importer);
        update_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', $jmts_user_is_manufacturer);
        update_user_meta($jmts_user->ID, 'jmts_user_is_first_time', $jmts_user_is_first_time);
        update_user_meta($jmts_user->ID, 'jmts_user_trn', $jmts_user_trn);
        update_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', $jmts_user_is_tcc_valid);
        update_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', $jmts_user_tcc_expiration_date);
        update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', $jmts_user_applicant_firstname1);
        update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', $jmts_user_applicant_lastname1);
        update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', $jmts_user_applicant_firstname2);
        update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', $jmts_user_applicant_lastname2);
                
        ?>
        <h6 style="text-align:center;color: darkblue;">
            YOUR FORM WAS SUCCESSFULLY UPDATED
        </h6>
        <?php
    } 
    ?>
    <h5 style="text-align:center;">IMPORTERS/MANUFACTURERS REGISTRATION FORM</h5>
    <h6 style="text-align:center;">Standards Regulations, 1983</h6>
    <p style="color: red;">
        This form must be completed in full to register as an importer and or 
        manufacturer in accordance with regulation 8B of the Standards Regulations, 1983.
    </p>
    <form method="post" action="" >
        <input type="hidden" name="form_submitted" value="true" />
        <table class="form-table" style="border: 0;">    
            <tr>
                <th style="border: 0;">
                    <label for="jmts_user_is_importer">Are you an importer?</label>
                </th>
                <td style="border: 0;">
                    <select id="jmts_user_is_importer" name="jmts_user_is_importer">
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
                    <label for="jmts_user_is_manufacturer">Are you a manufacturer?</label>
                </th>
                <td style="border: 0;">
                    <select id="jmts_user_is_manufacturer" name="jmts_user_is_manufacturer">
                        <option <?= selected('no', $jmts_user_is_manufacturer, true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', $jmts_user_is_manufacturer, true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>
                <th style="border: 0;">
                    <label for="jmts_user_is_first_time">Are you registering for first time?</label>
                </th>
                <td style="border: 0;">
                    <select id="jmts_user_is_first_time" name="jmts_user_is_first_time">
                        <option <?= selected('no', $jmts_user_is_first_time, true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', $jmts_user_is_first_time, true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
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
                    <label for="jmts_user_is_tcc_valid">Tax Compliance Certificate (TCC) valid?</label>
                </th>
                <td style="border: 0;">
                    <select id="jmts_user_is_tcc_valid" name="jmts_user_is_tcc_valid">
                        <option <?= selected('no', $jmts_user_is_tcc_valid, true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', $jmts_user_is_tcc_valid, true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>            
                <th style="border: 0;">
                    <label for="jmts_user_tcc_expiration_date">
                        If yes please state date of expiration
                    </label>
                </th>
                <td style="border: 0;">
                    <input type="date"
                           class="regular-text ltr"
                           id="jmts_user_tcc_expiration_date"
                           name="jmts_user_tcc_expiration_date"
                           value=<?= $jmts_user_tcc_expiration_date ?> >
                   
                </td>
            </tr>
            <tr>
                <td style="border: 0;" colspan="2">
                    <strong>Applicant details</strong>
                </td>            
            </tr>
            <tr>
                <td style="border: 0;text-align: center;" colspan="2">
                    <span style="color: red;">
                        (Either Individual or Incorporated Business / Partnership/ Associated or Trust)
                    </span>
                </td>            
            </tr>
            <tr>
                <td style="border: 0;text-align: left;" colspan="2">
                    <span style="color: black;">
                       Applicant (s) Name (s):
                    </span>
                </td>            
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_lastname1"
                           name="jmts_user_applicant_lastname1"
                           placeholder="Last Name" 
                           required
                           value=<?= $jmts_user_applicant_lastname1 ?> >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_firstname1"
                           name="jmts_user_applicant_firstname1"
                           placeholder="First Name" 
                           required
                           value=<?= $jmts_user_applicant_firstname1 ?> >
                </td>                
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_lastname2"
                           name="jmts_user_applicant_lastname2"
                           placeholder="Last Name (optional)" 
                           value=<?= $jmts_user_applicant_lastname2 ?> >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_firstname2"
                           name="jmts_user_applicant_firstname2"
                           placeholder="First Name (optional)"                            
                           value=<?= $jmts_user_applicant_firstname2 ?> >
                </td>                
            </tr>
            <tr>
                <td style="border: 0;text-align: center;" colspan="2">
                    <input type="submit" value="Submit">
                </td>            
            </tr>
           
        </table>
    </form>
    <?php
}
