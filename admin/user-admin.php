<?php
global $user_levels;
$user_levels = array('regular' => 'Regular', 'importer' => 'Importer');

add_action('user_new_form', 'jmts_show_user_profile');
add_action('edit_user_profile', 'jmts_show_user_profile');

function jmts_show_user_profile($user) {
    global $user_levels;
    if ('add-new-user' == $user) {
        $current_user_level = '';
    } elseif (!empty($user) && isset($user->data->ID)) {
        $user_id = $user->data->ID;
        $current_user_level = get_user_meta($user_id, 'user_level', true);
    }
    ?>
    <h3>Site membership level</h3>
    <table class="form-table">
        <tr>
            <th>Level</th>
            <td><select name="user_level" id="user_level">
                    <?php foreach ($user_levels as $user_level_index => $user_level) { ?>
                        <option value="<?php echo $user_level_index; ?>"
                                <?php selected($current_user_level, $user_level_index); ?>>
                            <?php echo $user_level; ?></option>
                    <?php } ?>
                </select></td>
        </tr>
    </table>
    <?php
}

add_action('user_register', 'jmts_save_user_data');
add_action('profile_update', 'jmts_save_user_data');

function jmts_save_user_data($user_id) {
    global $user_levels;
    if (isset($_POST['user_level']) &&
            !empty($_POST['user_level']) &&
            array_key_exists($_POST['user_level'], $user_levels)) {
        update_user_meta($user_id, 'user_level',
                $_POST['user_level']);
    } else {
        update_user_meta($user_id, 'user_level', 'regular');
    }
}

add_filter('manage_users_columns', 'jmts_add_user_columns');

function jmts_add_user_columns($columns) {
    $new_columns = array_slice($columns, 0, 2, true) +
            array('level' => 'User Level') +
            array_slice($columns, 2, NULL, true);

    return $new_columns;
}

add_filter('manage_users_custom_column', 'jmts_display_user_columns_data', 10, 3);

function jmts_display_user_columns_data($val, $column_name, $user_id) {
    global $user_levels;
    if ('level' == $column_name) {
        $current_user_level = get_user_meta($user_id, 'user_level', true);
        if (!empty($current_user_level)) {
            $val = $user_levels[$current_user_level];
        }
    }

    return $val;
}

add_action('restrict_manage_users', 'jmts_add_user_filter');

function jmts_add_user_filter() {
    global $user_levels;
    $filter_value = '';
    if (isset($_GET['user_level'])) {
        $filter_value = $_GET['user_level'];
    }
    ?>
    <select name="user_level" class="user_level"
            style="float:none;">
        <option value="">No filter</option>
            <?php foreach ($user_levels as $user_level_index => $user_level) {
                ?>
            <option value="<?php echo $user_level_index; ?>"
            <?php selected($filter_value, $user_level_index); ?>>
            <?php echo $user_level; ?></option>
        <?php } ?>
        <input type="submit" class="button" value="Filter">
    <?php
    }

    add_action('admin_footer', 'jmts_user_filter_js');

    function jmts_user_filter_js() {
        global $current_screen;
        if ('users' != $current_screen->id) {
            return;
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('.user_level').first().change(function () {
                    jQuery('.user_level').
                            last().val(jQuery(this).val());
                });
                jQuery('.user_level').last().change(function () {
                    jQuery('.user_level').
                            first().val(jQuery(this).val());
                });
            });
        </script>
    <?php
    }

    add_filter('pre_get_users', 'jmts_filter_users');

    function jmts_filter_users($query) {
        global $pagenow;
        global $user_levels;
        if (is_admin() && 'users.php' == $pagenow &&
                isset($_GET['user_level'])) {
            $filter_value = $_GET['user_level'];
            if (!empty($filter_value) &&
                    array_key_exists($_GET['user_level'],
                            $user_levels)) {
                $query->set('meta_key', 'user_level');
                $query->set('meta_query', array(
                    array('key' => 'user_level',
                        'value' => $filter_value)));
            }
        }
    }
    