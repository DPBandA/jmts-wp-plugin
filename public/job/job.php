<?php

add_shortcode('job-list', 'jmts_job_list');

function jmts_job_list() {
// Preparation of query array to retrieve 5 book reviews
    $query_params = array('post_type' => 'job',
        'post_status' => 'publish',
        'posts_per_page' => 5);
// Execution of post query
    $job_query = new WP_Query;
    $job_query->query($query_params);
// Check if any posts were returned by the query
    if ($job_query->have_posts()) {
        echo 'Jobs found!!';
        
        while ($job_query->have_posts()) {
            $job_query->the_post();
            echo get_the_title( get_the_ID() );//get_permalink();
        }
    }

    wp_reset_postdata();
}
