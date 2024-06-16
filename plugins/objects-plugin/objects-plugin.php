<?php
/*
Plugin Name: Custom Post Type for Objects Plugin
Description: A plugin to create a custom post type and display it on a page.
Text Domain: objects-plugin
Version: 1.0
Author: Olga Smilichenko
*/

/** protection */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class Objects_Plugin
{

    /**
     *
     */
    public function __construct()
    {
        /** add custom post types */
        require_once 'inc/cpt.php';

        /**  AJAX-request */
        require_once 'inc/ajax.php';

        /** Add JSON ACF */
        require_once 'inc/acf-init.php';

        /** scripts plug in */
        require_once 'inc/assets.php';

        /** Add filter shortcode */
        require_once 'inc/filter.php';

        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * @return void
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', 'ajax_objects_enqueue_scripts' );
    }

    /**
     * @return void
     */
    public function install()
    {

    }

}

new Objects_Plugin();