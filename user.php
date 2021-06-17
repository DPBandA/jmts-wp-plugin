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

function jmts_user_extra_fields($user) {
    //if (current_user_can('edit_user', $user->ID)) {
    $job_title = get_user_meta($user->ID, 'jmts_profile_job_title', true);
    $job_staff_status = get_user_meta($user->ID, 'jmts_user_staff_status', true);
    $job_desc = get_user_meta($user->ID, 'jmts_profile_job_desc', true);

    $display = "<table class='form-table'>";
    $display .= "<tr><th>" . __('Job Title', 'jmts') . "</th>
				<td><input type='text' name='jmts_profile_job_title' value='" . $job_title . "' /></td>						</tr>";
    $display .= "<tr><th>" . __('Job Description', 'jmts') . "</th>
				<td><textarea name='jmts_profile_job_desc'>" . wp_kses_post($job_desc) . "</textarea>				</td></tr>";
    $display .= "<tr><th>" . __('Staff Member', 'jmts') . "</th>
					<td><select name='jmts_profile_job_staff_status' >
					<option " . selected('no', $job_staff_status, true) . "value='no'>" . __('No', 'jmts') . "						</option>
				<option " . selected('yes', $job_staff_status, true) . "value='yes'>" . __('Yes', 'jmts') . "					</option>
					</select></td></tr>";
    $display .= "</table>";

    echo $display;
    //}
}

function save_jmts_user_extra_fields($user_id) {
    //if ($_POST && current_user_can('edit_user', $user_id)) {
    $job_title = isset($_POST['jmts_profile_job_title']) ?
            sanitize_text_field($_POST['jmts_profile_job_title']) : '';
    $job_staff_status = isset($_POST['jmts_profile_job_staff_status']) ?
            sanitize_text_field($_POST['jmts_profile_job_staff_status']) : '';
    $job_desc = isset($_POST['jmts_profile_job_desc']) ?
            wp_kses_post($_POST['jmts_profile_job_desc']) : '';

    update_user_meta($user_id, 'jmts_profile_job_title', $job_title);
    update_user_meta($user_id, 'jmts_user_staff_status', $job_staff_status);
    update_user_meta($user_id, 'jmts_profile_job_desc', $job_desc);
    //}
}

// A short code to display a user data for editing and viewing
add_shortcode('jmts_user', 'jmts_user_data');

function jmts_user_data() {
    ?>
    <?php
    // tk - $user will be provided as a parameter
    $user = wp_get_current_user();
    // Retrieve stored user meta data
    $trn = get_user_meta($user->ID, 'jmts_user_trn', true);
    $user_is_importer = "no"; //get_user_meta($user->ID, 'jmts_user_is_importer', true);


    if (!empty($_POST['form_submitted'])) { //tk
        echo get_user_meta($user->ID, 'first_name', true) . " your data was successfully updated!";
    } else {
        echo 'Your registration data is not yet updated.';
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
                    <label for="isimporter">Are you an importer?</label>
                </th>
                <td style="border: 0;">
                    <select id="isimporter">
                        <option <?= selected('no', $user_is_importer, true) ?> value="no"> 
                            <?= __('No', 'jmts') ?>
                        </option>
                        <option <?= selected('yes', $user_is_importer, true) ?> value="yes">
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
                    <label for="trn">Tax Registration Number (TRN)</label>
                </th>
                <td style="border: 0;">
                    <input type="text"
                           class="regular-text ltr"
                           id="trn"
                           name="trn"
                           value=<?= $trn ?> >
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
