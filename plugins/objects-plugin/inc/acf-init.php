<?php
/**
 * ACF fields
 */

add_action('acf/init', 'import_acf_fields');

if (! function_exists('import_acf_fields')) {
  
    function import_acf_fields() {
      /**
     * @return void
     */
      $json_file_path = plugin_dir_path(__FILE__) . '../assets/acf-fields.json';
      if (file_exists($json_file_path)) {
          $json_data = file_get_contents($json_file_path);
          $fields = json_decode($json_data, true);
          if ($fields && function_exists('acf_add_local_field_group')) {
              acf_add_local_field_group($fields);
          }
      }
  }
    
}