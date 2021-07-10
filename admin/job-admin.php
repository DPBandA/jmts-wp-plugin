<?php
/*
 * Job Administration...
 */

add_action('init', 'jmts_create_job_post_type');

function jmts_create_job_post_type() {
    register_post_type('job',
            array(
                'labels' => array(
                    'name' => 'Jobs',
                    'singular_name' => 'Job',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Job',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Job',
                    'new_item' => 'New Job',
                    'view' => 'View',
                    'view_item' => 'View Job',
                    'search_items' => 'Search Jobs',
                    'not_found' => 'No Jobs found',
                    'not_found_in_trash' =>
                    'No Jobs found in Trash',
                    'parent' => 'Parent Job'
                ),
                'public' => true,
                'menu_position' => 20,
                'supports' => array('title', 'editor', 'comments', 'thumbnail'),
                'taxonomies' => array(''),
                //'menu_icon' => plugins_url('images/jmts.png', __FILE__),
                'has_archive' => true,
                'exclude_from_search' => true
            )
    );
}

//add_action('admin_init', 'jmts_job_br_admin_init');

function jmts_job_br_admin_init() {
    $var1 = 'this';
    $var2 = 'that';
    add_meta_box('jmts_job_details_meta_box',
            'Job Details',
            'jmts_br_display_job_details_meta_box',
            'job');
}

//function jmts_job_br_admin_init() {
//    add_meta_box('jmts_job_details_meta_box',
//            'Job Details',
//            'jmts_br_display_job_details_meta_box',
//            'job', 
//            'normal', 
//            'high');
//}

function jmts_br_display_job_details_meta_box($job) {
// Retrieve current author and rating based on review ID
    $job_number = esc_html(get_post_meta($job->ID, 'job_number', true));
    //$job_tat = intval(get_post_meta($job->ID,'job_tat', true));
    ?>
    <table>
        <tr>
            <td style="width: 100%">
                <strong>Job Number</strong>
            </td>
            <td>
                <input type="text" size="80"
                       name="job_number"
                       value="<?php echo $job_number; ?>" />
            </td>
        </tr>        
    </table> 
    <?php
}

//add_action('save_post', 'jmts_br_add_job_fields', 10, 2);

function jmts_br_add_job_fields($job_id, $job) {
    // Check post type for jobs
    if ('jobs' == $job->post_type) {
        // Store data in post meta table if present in post data
        if (isset($_POST['job_number'])) {
            update_post_meta($job_id, 'job_number',
                    sanitize_text_field(
                            $_POST['job_number']));
        }
    }
}

//add_filter('template_include', 'ch4_br_template_include', 1);

function ch4_br_template_include($template_path) {
    if ('job' == get_post_type()) {
        if (is_single()) {
// checks if the file exists in the theme first,
// otherwise install content filter
            if ($theme_file = locate_template(array
                ('single-job.php'))) {
                $template_path = $theme_file;
            } else {
                add_filter('the_content',
                        'jmts_br_display_single_job',
                        20);
            }
        }
    }
    return $template_path;
}

function jmts_br_display_single_job($content) {
    if (!empty(get_the_ID())) {
        echo 'yes!!!';
    }
}

// tk Adds a new custom field if the key does not already exist, or updates the 
// value of the custom field with that key otherwise.
//if ( ! add_post_meta( 7, 'fruit', 'banana', true ) ) { 
//   update_post_meta ( 7, 'fruit', 'banana' );
//}



