<?php
require plugin_dir_path(__FILE__) . 'functions.php';

// Remove admin toolbar for non-admin users
add_action('after_setup_theme', 'jmts_remove_admin_bar');

// A short code to display a user's data for editing and viewing
add_shortcode('jmts_user', 'jmts_user_importer_manufacturer_form');

function jmts_user_importer_manufacturer_form() {
    
    $options = get_option('jmts_options', array());

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

        jmts_user_save__meta_data($jmts_user);
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
        
        // Send email notification about update
        $to = $options['send_error_notification_to'];
        $subject = 'Importer/Manufacturer Registration Update';
        $body = '<h5>The Importer/Manufacturer Registration informationf for the applicant '
                . get_user_meta($jmts_user->ID, 'jmts_user_applicant_name', true).
                ' was updated.</h5>';
        $headers = array('Content-Type: text/html; charset=UTF-8');

        wp_mail($to, $subject, $body, $headers);

        exit();
    }
    ?>
    <h5 style="text-align:center;">IMPORTERS/MANUFACTURERS REGISTRATION FORM</h5>
    <h6 style="text-align:center;">Standards Regulations, 1983, Standards 
        (Amendment) Regulations 1999 and Standards (Amendment) Regulations 2012</h6>
    <h6 style="text-align:center;">Regulation 8B</h6>
    <p style="color: red;">
        This form must be completed in full to register as an importer and or 
        manufacturer in accordance with regulation 8B of the Standards Regulations.
    </p>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="form_submitted" value="true" />
        <?= jmts_user_get_importer_manufacturer_form_table($jmts_user); ?>
        <table class="form-table" style="border: 0;">  
            <tr>
                <td style="border: 0;text-align: center;" colspan="2">
                    <input type="submit" value="Update">
                </td>            
            </tr>  
        </table>
    </form>
    <?php
}
