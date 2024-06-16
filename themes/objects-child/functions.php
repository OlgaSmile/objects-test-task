<?php

add_action( 'wp_enqueue_scripts', 'building_child_styles' );
 
function building_child_styles() {

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('understrap-styles'), null  );
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/src/styles/main.css', array('child-style'), null  );
  wp_enqueue_style( 'lightbox-style', "https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css", array() );
  
  wp_enqueue_script( 'lightbox-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', array(), false, true );

  
  if (is_page_template('templates/home.php')) {  
    wp_enqueue_style( 'home-styles', trailingslashit( get_stylesheet_directory_uri() ) . '/src/styles/templates-styles/home.css');
    }
    
  if (is_page_template('templates/all_posts.php')) {  
    wp_enqueue_style( 'all_posts-styles', trailingslashit( get_stylesheet_directory_uri() ) . '/src/styles/templates-styles/home.css');
    }
    
  if (is_singular() && locate_template('template-parts/one-post.php')) {
    wp_enqueue_style('one-post-styles', trailingslashit( get_stylesheet_directory_uri()). '/src/styles/template-parts-styles/one-post.css');
    }
  if (is_singular() && locate_template('template-parts/content-post.php')) {
    wp_enqueue_style('content-post-styles', trailingslashit( get_stylesheet_directory_uri()). '/src/styles/template-parts-styles/content-post.css');
    }
  if (is_singular() && locate_template('template-parts/content-object.php')) {
    wp_enqueue_style('content-object-styles', trailingslashit( get_stylesheet_directory_uri()). '/src/styles/template-parts-styles/content-object.css');
  }

  if (is_singular() && locate_template('template-parts/navigation.php')) {
      wp_enqueue_style('navigation-styles', trailingslashit( get_stylesheet_directory_uri()). '/src/styles/template-parts-styles/navigation.css');
    }
}

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
      'page_title'    => 'Theme General Settings',
      'menu_title'    => 'Theme Settings',
      'menu_slug'     => 'theme-general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
  ));
}