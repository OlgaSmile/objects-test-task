<?php 
/**
 * Register Custom Post Type
 */
add_action( 'init', 'register_cpt_objects' );

if (!function_exists('register_cpt_objects')) {

    function register_cpt_objects() {
      /**
     * @return void
     */
      $labels = array(
        'name'                  => _x( 'Об\'єкти нерухомості', 'Post Type General Name', 'objects-plugin'),
        'singular_name'         => _x( 'Об\'єкт нерухомості', 'Post Type Singular Name', 'objects-plugin'),
        'menu_name'             => __( 'Об\'єкти нерухомості', 'objects-plugin' ),
        'name_admin_bar'        => __( 'Об\'єкт нерухомості', 'objects-plugin' ),
        'archives'              => __( 'Архів об\'єктів нерухомості', 'objects-plugin' ),
        'attributes'            => __( 'Атрибути об\'єктів нерухомості', 'objects-plugin' ),
        'parent_item_colon'     => __( 'Батіківський об\'єкт нерухомості:', 'objects-plugin' ),
        'all_items'             => __( 'Всі об\'єкти нерухомості', 'objects-plugin' ),
        'add_new_item'          => __( 'Додати новий об\'єкт нерухомості', 'objects-plugin' ),
        'add_new'               => __( 'Додати новий', 'objects-plugin' ),
        'new_item'              => __( 'Новий об\'єкт нерухомості', 'objects-plugin' ),
        'edit_item'             => __( 'Редагувати об\'єкт нерухомості', 'objects-plugin' ),
        'update_item'           => __( 'Оновити об\'єкт нерухомості', 'objects-plugin' ),
        'view_item'             => __( 'Подивитись об\'єкт нерухомості', 'objects-plugin' ),
        'view_items'            => __( 'Подивитись об\'єкти нерухомості', 'objects-plugin' ),
        'search_items'          => __( 'Шукати об\'єкт нерухомості', 'objects-plugin' ),
        'not_found'             => __( 'Не знайдено', 'objects-plugin' ),
        'not_found_in_trash'    => __( 'Не знайдено у кошику', 'objects-plugin' ),
        'featured_image'        => __( 'Зображення попереднього перегляду', 'objects-plugin' ),
        'set_featured_image'    => __( 'Змінити зображення', 'objects-plugin' ),
        'remove_featured_image' => __( 'Видалити зображення', 'objects-plugin' ),
        'use_featured_image'    => __( 'Використати як зображення', 'objects-plugin' ),
        'insert_into_item'      => __( 'Додати до об\'єкту нерухомості', 'objects-plugin' ),
        'uploaded_to_this_item' => __( 'Довантажено до цього об\'єкту нерухомості', 'objects-plugin' ),
        'items_list'            => __( 'Список об\'єктів нерухомості', 'objects-plugin' ),
        'items_list_navigation' => __( 'Навігація по списку об\'єктів нерухомості', 'objects-plugin' ),
        'filter_items_list'     => __( 'Фільтрувати список об\'єктів нерухомості', 'objects-plugin' ),
      );

      $args = array(
        'label'                 => __( 'Об\'єкт нерухомості', 'objects-plugin' ),
        'description'           => __( 'Об\'єкти нерухомості', 'objects-plugin' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'район' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'menu_icon'             => 'dashicons-admin-home',
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
      );

      register_post_type( 'object', $args );
    }
    
}

/**
 * Register Custom Taxonomy
 */
add_action( 'init', 'register_taxonomy_cpt_objects' );

if (!function_exists('register_taxonomy_cpt_objects')) {

    function register_taxonomy_cpt_objects() {
      /**
     * @return void
     */
      $labels = array(
        'name'                       => _x( 'Райони', 'Taxonomy General Name', 'objects-plugin' ),
        'singular_name'              => _x( 'Район', 'Taxonomy Singular Name', 'objects-plugin' ),
        'menu_name'                  => __( 'Район', 'objects-plugin' ),
        'all_items'                  => __( 'Всі категорії', 'objects-plugin' ),
        'parent_item'                => __( 'Батьківська категорія', 'objects-plugin' ),
        'parent_item_colon'          => __( 'Батьківська категорія:', 'objects-plugin' ),
        'new_item_name'              => __( 'Назва новоЇ категорії', 'objects-plugin' ),
        'add_new_item'               => __( 'Додати нову категорію', 'objects-plugin' ),
        'edit_item'                  => __( 'Редагувати категорію', 'objects-plugin' ),
        'update_item'                => __( 'Оновити категорію', 'objects-plugin' ),
        'view_item'                  => __( 'Подивитись категорію', 'objects-plugin' ),
        'separate_items_with_commas' => __( 'Розділити категорії комами', 'objects-plugin' ),
        'add_or_remove_items'        => __( 'Додати або видалити категорію', 'objects-plugin' ),
        'choose_from_most_used'      => __( 'Обрати з найчастіше використовуваних', 'objects-plugin' ),
        'popular_items'              => __( 'Популярні категорії', 'objects-plugin' ),
        'search_items'               => __( 'Шукати категорії', 'objects-plugin' ),
        'not_found'                  => __( 'Не знайдено', 'objects-plugin' ),
        'no_terms'                   => __( 'Немає категорій', 'objects-plugin' ),
        'items_list'                 => __( 'Список категорій', 'objects-plugin' ),
        'items_list_navigation'      => __( 'Навігація по списку категорій', 'objects-plugin' ),
      );

      $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
      );

      register_taxonomy( 'district', array( 'object' ), $args );
    }

}