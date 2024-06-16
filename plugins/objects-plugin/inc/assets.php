<?php 
/**
 * add scripts
 */

if (! function_exists('ajax_objects_enqueue_scripts')) {
    /**
     * @return void
     */
    function ajax_objects_enqueue_scripts()
    {

        $objectModuleVars = [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce('object_nonce'),
        ];

        wp_enqueue_style('one-object-styles', plugin_dir_url( __FILE__ ) . '../assets/css/objects-style.css');


        wp_enqueue_script( 'objects-script', plugin_dir_url( __FILE__ ) . '../assets/js/objects-script.js', array('jquery'), null, true );
        wp_localize_script( 'objects-script', 'ajax_object', $objectModuleVars);
    }
}
