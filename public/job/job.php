<?php

add_shortcode('job-list', 'jmts_job_list');

function jmts_job_list() {
    if ( isset( $_GET['job_id'] ) ) {
        echo '<h2>Job Detail</h2>';
        echo $_GET['job_id'];
        
        echo "<br><br><a href=\"javascript:history.go(-1)\">Go back to job list</a>";
        
        exit();
    }
    
    // Preparation of query array to retrieve 5 jobs
    $query_params = array('post_type' => 'job',
        'post_status' => 'publish',
        'posts_per_page' => 5);

    // Retrieve page query variable, if present
    $page_num = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    // If page number is higher than 1, add to query array
    if ($page_num != 1) {
        $query_params['paged'] = $page_num;
    }

    // Execution of post query
    $job_query = new WP_Query;
    $job_query->query($query_params);

    // Check if any posts were returned by query
    if ($job_query->have_posts()) {
        // Display posts in table layout
        $output = '<h2>Job List</h2>';
        $output .= '<table>';
        $output .= '<tr><th style="width: 350px"><strong>Title</strong></th>';
        $output .= '<th><strong>Job Number</strong></th></tr>';

        // Cycle through all items retrieved
        while ($job_query->have_posts()) {
            $job_query->the_post();
            $output .= '<tr><td><a href="' . './?job_id='. get_the_ID() . '">';
            $output .= get_the_title(get_the_ID()) . '</a></td>';
            $output .= '<td>' . esc_html(get_post_meta(get_the_ID(), 'job_number', true));
            $output .= '</td></tr>';
        }

        $output .= '</table>';

        // Display page navigation links
        if ($job_query->max_num_pages > 1) {
            $output .= '<nav id="nav-below">';
            $output .= '<div class="nav-previous">';
            $output .= get_next_posts_link('<span class="meta-nav">&larr;</span> Older jobs', $job_query->max_num_pages);
            $output .= '</div>';
            $output .= "<div class='nav-next'>";
            $output .= get_previous_posts_link('Newer jobs <span class="meta-nav">&rarr;</span>', $job_query->max_num_pages);
            $output .= '</div>';
            $output .= '</nav>';
        }

        // Reset post data query
        wp_reset_postdata();
    }

    return $output;
}

