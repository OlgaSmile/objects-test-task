<?php 

/**
 * AJAX-request
 */

add_action('wp_ajax_nopriv_ajax_get_objects', 'ajax_get_objects');
add_action('wp_ajax_ajax_get_objects', 'ajax_get_objects');

if (!function_exists('ajax_get_objects')) {

  function ajax_get_objects() {
    /**
     * @return void
     */

    if (!isset($_POST["nonce"]) || !wp_verify_nonce($_POST["nonce"], "object_nonce")) {
        exit;
    }

    // Expected input fields
    $input_fields = array(
        'page', 'cat', 'title', 'address', 'floor', 'type', 'ecology', 'square', 'roomsAmount', 'balcony', 'bathroom'
    );

    $input_data = array();

    // Sanitize input fields
    foreach ($input_fields as $field) {
        $input_data[$field] = isset($_POST[$field]) ? sanitize_text_field(wp_unslash($_POST[$field])) : '';
    }

    $page = !empty($input_data['page']) ? intval($input_data['page']) : 1;
    $cat = !empty($input_data['cat']) ? $input_data['cat'] : 'all';

    // Query arguments
    $args = array(
        'post_type' => 'object',
        'posts_per_page' => 5,
        'paged' => $page,
        'meta_query' => array('relation' => 'AND')
    );

    // Tax query for category
    if ($cat !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'district',
                'field' => 'slug',
                'terms' => $cat,
            ),
        );
    }

    // Meta query for each filterable field
    $meta_query_fields = array(
        'title' => array('key' => 'building_name'),
        'address' => array('key' => 'building_coordinates'),
        'floor' => array('key' => 'floor_amount'),
        'type' => array('key' => 'building_type'),
        'ecology' => array('key' => 'building_ecology'),
        'square' => array('key' => 'room_square'),
        'roomsAmount' => array('key' => 'room_rooms_amount'),
        'balcony' => array('key' => 'room_balcony'),
        'bathroom' => array('key' => 'room_bathroom')
    );

    foreach ($meta_query_fields as $field => $meta) {
        if (!empty($input_data[$field])) {
            $args['meta_query'][] = array(
                'key' => $meta['key'],
                'value' => $input_data[$field],
                'compare' => '='
            );
        }
    }

    $query = new WP_Query($args);

    $total_posts = $query->found_posts;
    $total_pages = ceil($total_posts / 5);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            include plugin_dir_path(__FILE__) . '../templates/content-object-list.php';
        endwhile;
    else :
        echo 'No posts found.';
    endif;

    $html = ob_get_clean();
    wp_reset_postdata();

    wp_send_json(array(
        'html' => $html,
        'totalPages' => $total_pages,
    ));
    
  }
}