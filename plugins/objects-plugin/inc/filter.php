<?php
/**
 *  Filter
 */

add_shortcode( 'shortcode_filter_func', 'filter_shortcode' );

if (! function_exists('filter_shortcode')) {

    function filter_shortcode (){
        ob_start();
        
        // Function to render select options
        function render_select_options($options, $default_label) {
            echo '<option value="">' . esc_html($default_label) . '</option>';
            foreach ($options as $label) {
                echo '<option value="' . esc_attr($label) . '">' . esc_html($label) . '</option>';
            }
        }

        // Get acf values
        function add_select_option($acf_func, &$arr) {
            $option_name = $acf_func;
            if (!in_array($option_name, $arr)) {
                $arr[] = $option_name;
            }
        }

        $building_names = [];
        $building_addresses = [];
        $floor_values = [];
        $type_values = [];
        $ecology_values = [];
        $square_values = [];
        $rooms_amount_values = [];
        $balcony_values = [];
        $bathroom_values = [];

        $args = array(
            'post_type' => 'object',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                add_select_option(get_field('building_name'), $building_names);
                add_select_option(get_field('building_coordinates'), $building_addresses);
                add_select_option(get_field('floor_amount'), $floor_values);
                add_select_option(get_field('building_type'), $type_values);
                add_select_option(get_field('building_ecology'), $ecology_values);

                if (have_rows('room')) {
                    while (have_rows('room')) {
                        the_row();
                        add_select_option(get_sub_field('square'), $square_values);
                        add_select_option(get_sub_field('rooms_amount'), $rooms_amount_values);
                        add_select_option(get_sub_field('balcony'), $balcony_values);
                        add_select_option(get_sub_field('bathroom'), $bathroom_values);
                    }
                }
            }
            wp_reset_postdata();
        }

        sort($building_names);
        sort($building_addresses);
        sort($floor_values);
        sort($type_values);
        sort($ecology_values);
        sort($square_values);
        sort($rooms_amount_values);
        sort($balcony_values);
        sort($bathroom_values);

        // Get category terms
        $taxonomy_terms = get_terms(array(
            'taxonomy' => 'district',
            'hide_empty' => false,
        ));

        $district_options = [];
        foreach ($taxonomy_terms as $term) {
            $district_options[$term->slug] = $term->name;
        }
        
        include plugin_dir_path(__FILE__) . '../templates/form.php';
        include plugin_dir_path(__FILE__) . '../templates/objects-block.php';

        return ob_get_clean();
    }
}