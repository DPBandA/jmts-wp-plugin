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

function jmts_save_user_meta_data() {
    $jmts_user = wp_get_current_user();

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
    // Applicants
    $jmts_user_applicant_firstname1 = isset($_POST['jmts_user_applicant_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname1']) : '';
    $jmts_user_applicant_lastname1 = isset($_POST['jmts_user_applicant_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname1']) : '';
    $jmts_user_applicant_firstname2 = isset($_POST['jmts_user_applicant_firstname2']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname2']) : '';
    $jmts_user_applicant_lastname2 = isset($_POST['jmts_user_applicant_lastname2']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname2']) : '';
    $jmts_user_applicant_firstname3 = isset($_POST['jmts_user_applicant_firstname3']) ?
            sanitize_text_field($_POST['jmts_user_applicant_firstname3']) : '';
    $jmts_user_applicant_lastname3 = isset($_POST['jmts_user_applicant_lastname3']) ?
            sanitize_text_field($_POST['jmts_user_applicant_lastname3']) : '';
    // Business name
    $jmts_user_applicant_business_name = isset($_POST['jmts_user_applicant_business_name']) ?
            sanitize_text_field($_POST['jmts_user_applicant_business_name']) : '';
    // Partners
    $jmts_user_partner_firstname1 = isset($_POST['jmts_user_partner_firstname1']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname1']) : '';
    $jmts_user_partner_lastname1 = isset($_POST['jmts_user_partner_lastname1']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname1']) : '';
    $jmts_user_partner_firstname2 = isset($_POST['jmts_user_partner_firstname2']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname2']) : '';
    $jmts_user_partner_lastname2 = isset($_POST['jmts_user_partner_lastname2']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname2']) : '';
    $jmts_user_partner_firstname3 = isset($_POST['jmts_user_partner_firstname3']) ?
            sanitize_text_field($_POST['jmts_user_partner_firstname3']) : '';
    $jmts_user_partner_lastname3 = isset($_POST['jmts_user_partner_lastname3']) ?
            sanitize_text_field($_POST['jmts_user_partner_lastname3']) : '';
    // Trading Name (s)
    $jmts_user_trading_name = isset($_POST['jmts_user_trading_name']) ?
            sanitize_text_field($_POST['jmts_user_trading_name']) : '';

    // Save user meta data
    update_user_meta($jmts_user->ID, 'jmts_user_is_importer', $jmts_user_is_importer);
    update_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', $jmts_user_is_manufacturer);
    update_user_meta($jmts_user->ID, 'jmts_user_is_first_time', $jmts_user_is_first_time);
    update_user_meta($jmts_user->ID, 'jmts_user_trn', $jmts_user_trn);
    update_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', $jmts_user_is_tcc_valid);
    update_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', $jmts_user_tcc_expiration_date);
    // Applicants
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', $jmts_user_applicant_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', $jmts_user_applicant_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', $jmts_user_applicant_firstname2);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', $jmts_user_applicant_lastname2);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname3', $jmts_user_applicant_firstname3);
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname3', $jmts_user_applicant_lastname3);
    // Business name
    update_user_meta($jmts_user->ID, 'jmts_user_applicant_business_name', $jmts_user_applicant_business_name);
    // Partners
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname1', $jmts_user_partner_firstname1);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname1', $jmts_user_partner_lastname1);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname2', $jmts_user_partner_firstname2);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname2', $jmts_user_partner_lastname2);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_firstname3', $jmts_user_partner_firstname3);
    update_user_meta($jmts_user->ID, 'jmts_user_partner_lastname3', $jmts_user_partner_lastname3);
    // Trading Name (s)
    update_user_meta($jmts_user->ID, 'jmts_user_trading_name', $jmts_user_trading_name);
}

// A short code to display a user's data for editing and viewing
add_shortcode('jmts_user', 'jmts_user_meta_data_form');

function jmts_user_meta_data_form() {
    ?>
    <?php
    if (is_user_logged_in()) {
        $jmts_user = wp_get_current_user();
    } else {
        ?>
        <h5 style="text-align:center;color: darkblue;">
            PLEASE LOG IN OR REGISTER TO SUBMIT OR UPDATE THE IMPORTER REGISTRATION FORM:
        </h5>     
        <div style="text-align:center;">            
            <a href="<?= site_url() ?>/wp-login.php"><input type="button" value="Log In" ></a>
            <a href="<?= site_url() ?>/wp-login.php?action=register"><input type="button" value="Register" ></a>         
        </div>
        <?php
        exit();
    }

    if (!empty($_POST['form_submitted'])) {

        jmts_save_user_meta_data();
        ?>
        <h6 style="text-align:center;color: darkblue;">
            YOUR FORM WAS SUCCESSFULLY UPDATED
        </h6>
        <div style="text-align:center;">
            <form>
                <input type="submit" value="View Form" >
            </form>
        </div>
        <?php
        exit();
    }
    ?>
    <h5 style="text-align:center;">IMPORTERS/MANUFACTURERS REGISTRATION FORM</h5>
    <h6 style="text-align:center;">Standards Regulations, 1983</h6>
    <h6 style="text-align:center;">Regulation 8B</h6>
    <p style="color: red;">
        This form must be completed in full to register as an importer and or 
        manufacturer in accordance with regulation 8B of the Standards Regulations, 1983.
    </p>
    <form method="post" action="" >
        <input type="hidden" name="form_submitted" value="true" />
        <table class="form-table" style="border: 0;">    
            <tr>
                <td style="border: 0;">
                    <label for="jmts_user_is_importer">
                        <strong>Are you an importer?</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <select id="jmts_user_is_importer" name="jmts_user_is_importer">
                        <option 
                            <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true), true) ?> value="no"> 
                                <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_importer', true), true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>
                <td style="border: 0;">
                    <label for="jmts_user_is_manufacturer">
                        <strong>Are you a manufacturer?</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <select id="jmts_user_is_manufacturer" name="jmts_user_is_manufacturer">
                        <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', true), true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_manufacturer', true), true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>
                <td style="border: 0;">
                    <label for="jmts_user_is_first_time">
                        <strong>Are you registering for first time?</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <select id="jmts_user_is_first_time" name="jmts_user_is_first_time">
                        <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_first_time', true), true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_first_time', true), true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>            
                <td style="border: 0;">
                    <label for="jmts_user_trn">
                        <strong>Tax Registration Number (TRN</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_trn"
                           name="jmts_user_trn"
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_trn', true) ?>" >
                </td>
            </tr>
            <tr>
                <td style="border: 0;">
                    <label for="jmts_user_is_tcc_valid">
                        <strong>Tax Compliance Certificate (TCC) valid?</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <select id="jmts_user_is_tcc_valid" name="jmts_user_is_tcc_valid">
                        <option <?= selected('no', get_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', true), true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', get_user_meta($jmts_user->ID, 'jmts_user_is_tcc_valid', true), true) ?> value="yes">
                            <?= __('Yes', 'jmts') ?>
                        </option>                        
                    </select>
                </td>            
            </tr>
            <tr>            
                <td style="border: 0;">
                    <label for="jmts_user_tcc_expiration_date">
                        <strong>If yes please state date of expiration</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <input type="date"
                           class="regular-text ltr"
                           id="jmts_user_tcc_expiration_date"
                           name="jmts_user_tcc_expiration_date"
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_tcc_expiration_date', true) ?>" >

                </td>
            </tr>
            <tr>
                <td style="border: 0;" colspan="2">
                    <strong>Applicant details:</strong>
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
                    <strong>Applicant(s) Name(s):</strong>
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
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname1', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_firstname1"
                           name="jmts_user_applicant_firstname1"
                           placeholder="First Name" 
                           required
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname1', true) ?>" >
                </td>                
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_lastname2"
                           name="jmts_user_applicant_lastname2"
                           placeholder="Last Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname2', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_firstname2"
                           name="jmts_user_applicant_firstname2"
                           placeholder="First Name (optional)"                            
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname2', true) ?>" >
                </td>                
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_lastname3"
                           name="jmts_user_applicant_lastname3"
                           placeholder="Last Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_lastname3', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_firstname3"
                           name="jmts_user_applicant_firstname3"
                           placeholder="First Name (optional)"                            
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_firstname3', true) ?>" >
                </td>                
            </tr>
            <tr>            
                <td style="border: 0;">
                    <label for="jmts_user_applicant_business_name">
                        <strong>Business Name</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_applicant_business_name"
                           name="jmts_user_applicant_business_name"
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_applicant_business_name', true) ?>" >
                </td>
            </tr>
            <tr>
                <td style="border: 0;text-align: left;" colspan="2">
                    <strong>Partner(s) Name(s):</strong>
                </td>            
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_lastname1"
                           name="jmts_user_partner_lastname1"
                           placeholder="Last Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname1', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_firstname1"
                           name="jmts_user_partner_firstname1"
                           placeholder="First Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname1', true) ?>" >
                </td>                
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_lastname2"
                           name="jmts_user_partner_lastname2"
                           placeholder="Last Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname2', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_firstname2"
                           name="jmts_user_partner_firstname2"
                           placeholder="First Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname2', true) ?>" >
                </td>                
            </tr>
            <tr>   
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_lastname3"
                           name="jmts_user_partner_lastname3"
                           placeholder="Last Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_lastname3', true) ?>" >
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_partner_firstname3"
                           name="jmts_user_partner_firstname3"
                           placeholder="First Name (optional)" 
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_partner_firstname3', true) ?>" >
                </td>                
            </tr>
            <tr>            
                <td style="border: 0;">
                    <label for="jmts_user_trading_name">
                        <strong>Trading Name(s)</strong>
                    </label>
                </td>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="jmts_user_trading_name"
                           name="jmts_user_trading_name"
                           value="<?= get_user_meta($jmts_user->ID, 'jmts_user_trading_name', true) ?>" >
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
