<?php
// Register a REST route
add_action('rest_api_init', function () {
    //Path to meta query route
    register_rest_route('shokok/v2', '/get_latest_ten_posts/', array(
        'methods' => 'GET',
        'callback' => 'custom_meta_query'
    ));
});

// Do the actual query and return the data
function custom_meta_query()
{
    $args = array(
        'post_type' => 'clients',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => 'ID',
    );

    // Run a custom query
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        //Define and empty array
        $data = array();
        // Store each post's title in the array
        while ($query->have_posts()) {
            $query->the_post();
            $data[] = array(get_the_title(), get_post_meta(get_the_ID(), 'location'));
        }
        // Return the data
        return new WP_REST_Response($data, 200);
    } else {
        // If there is no post
        return new WP_REST_Response('Failure', 204);

    }
}