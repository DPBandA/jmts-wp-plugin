<?php
add_action('show_user_profile', 'importer_user_extra_fields');
add_action('edit_user_profile', 'importer_user_extra_fields');

function importer_user_extra_fields($user) {
    if (current_user_can('edit_user', $user->ID)) {
        $job_title = get_user_meta($user->ID, 'importer_profile_job_title', true);
        $job_staff_status = get_user_meta($user->ID, 'importer_user_staff_status', true);
        $job_desc = get_user_meta($user->ID, 'importer_profile_job_desc', true);

        $display = "<table class='form-table'>";
        $display .= "<tr><th>" . __('Job Title', 'importer') . "</th>
				<td><input type='text' name='importer_profile_job_title' value='" . $job_title . "' /></td>						</tr>";
        $display .= "<tr><th>" . __('Job Description', 'importer') . "</th>
				<td><textarea name='importer_profile_job_desc'>" . wp_kses_post($job_desc) . "</textarea>				</td></tr>";
        $display .= "<tr><th>" . __('Staff Member', 'importer') . "</th>
					<td><select name='importer_profile_job_staff_status' >
					<option " . selected('no', $job_staff_status, true) . "value='no'>" . __('No', 'importer') . "						</option>
				<option " . selected('yes', $job_staff_status, true) . "value='yes'>" . __('Yes', 'importer') . "					</option>
					</select></td></tr>";
        $display .= "</table>";

        echo $display;
    }
}

add_action('personal_options_update', 'save_importer_user_extra_fields', 9999);
add_action('edit_user_profile_update', 'save_importer_user_extra_fields');

function save_importer_user_extra_fields($user_id) {
    if ($_POST && current_user_can('edit_user', $user_id)) {
        $job_title = isset($_POST['importer_profile_job_title']) ?
                sanitize_text_field($_POST['importer_profile_job_title']) : '';
        $job_staff_status = isset($_POST['importer_profile_job_staff_status']) ?
                sanitize_text_field($_POST['importer_profile_job_staff_status']) : '';
        $job_desc = isset($_POST['importer_profile_job_desc']) ?
                wp_kses_post($_POST['importer_profile_job_desc']) : '';

        update_user_meta($user_id, 'importer_profile_job_title', $job_title);
        update_user_meta($user_id, 'importer_user_staff_status', $job_staff_status);
        update_user_meta($user_id, 'importer_profile_job_desc', $job_desc);
    }
}

add_action('after_setup_theme', 'importer_remove_admin_bar');

function importer_remove_admin_bar() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}

add_action('admin_footer', 'importer_user_action_buttons');

function importer_user_action_buttons() {
    $screen = get_current_screen();
    if ($screen->id != "users")
        return;
    $mark_as_staff = __('Mark as Staff', 'importer');
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('<option>').val('importer_mark_staff_user').text("<?php
    echo
    $mark_as_staff;
    ?>").appendTo("select[name='action']");
            $('<option>').val('importer_mark_staff_user').text("<?php
    echo
    $mark_as_staff;
    ?>").appendTo("select[name='action2']");
        });
    </script>
    <?php
}

add_action('load-users.php', 'importer_users_page_loaded');

function importer_users_page_loaded() {
    if (!current_user_can('manage_options')) {
        return;
    }
    if ((isset($_GET['action']) && $_GET['action'] === 'importer_mark_staff_user') ||
            (isset($_GET['action2']) && $_GET['action2'] === 'importer_mark_staff_user')) {
        $selected_users = isset($_GET['users']) ? $_GET['users'] : '';
        if ('' != $selected_users) {
            foreach ($selected_users as $selected_user) {
                $selected_user = (int) $selected_user;
                $meta = get_user_meta($selected_user, 'importer_user_staff_status', true);
                if ('yes' != $meta) {
                    update_user_meta($selected_user, 'importer_user_staff_status', 'yes');
                }
            }
        }
    }
}

add_shortcode('importer_recent_user_list', 'importer_recent_user_list');

function importer_recent_user_list($atts, $content) {
    $user_query = new WP_User_Query(array(
        'orderby' => 'registered',
        'order' => 'ASC',
        'number' => 5
    ));
    $user_list = $user_query->get_results();

    $user_list_html = '<ul>';
    if (count($user_list) > 0) {
        foreach ($user_list as $key => $user) {
            $user_list_html .= '<li>' . $user->user_login . ', ' . $user->ID . '</li>';
        }
    } else {
        $user_list_html .= '<li>' . __('No Users Found', 'wpccp') . '</li>';
    }
    $user_list_html .= '</ul>';

    return $user_list_html;
}

add_shortcode('importer_user_search', 'importer_profile_user_search');

function importer_profile_user_search($atts, $content) {
    $search_val = '';
    if (isset($_POST['importer_users_search'])) {
        $search_val = sanitize_text_field($_POST['importer_users_search']);
        $user_query = new WP_User_Query(array(
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'first_name',
                    'value' => $search_val,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'last_name',
                    'value' => $search_val,
                    'compare' => 'LIKE'
                )
            )
        ));
        $user_list = $user_query->get_results();
        $user_list_html = '<ul>';
        if (count($user_list) > 0) {
            foreach ($user_list as $key => $user) {
                $user_list_html .= '<li>' . get_user_meta($user->ID,
                                'first_name', true) . ' ' . get_user_meta($user->ID,
                                'last_name', true) . '</li>';
            }
        } else {
            $user_list_html .= '<li>' . __('No Users Found', 'importer') . '</li>';
        }
        $user_list_html .= '</ul>';
    }

    $display = "<form method='POST' >
		<span>" . __('Search ', 'importer') . "
		<input type='text' value='" . $search_val . "' name='importer_users_search' />
		<input type='submit' value='" . __('Search Users', 'importer') . "' />
		</form>";
    $display .= $user_list_html;

    return $display;
}

add_shortcode('jmts_user', 'jmts_user_data');

function jmts_user_data($atts, $content) {
    return "<h1>Yes Iya!!</h1";
}
