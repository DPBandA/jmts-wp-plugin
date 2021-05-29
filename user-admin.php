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
