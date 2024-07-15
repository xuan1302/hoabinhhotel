<?php

// Register Custom Post Type
function reg_testimonial()
{
    $rooms = array(
        'name' => _x('Rooms', 'Post Type General Name', 'hello-theme'),
        'singular_name' => _x('Rooms', 'Post Type Singular Name', 'hello-theme'),
        'menu_name' => __('Rooms', 'hello-theme'),
        'parent_item_colon' => __('Rooms ', 'hello-theme'),
        'all_items' => __('Tất cả Rooms', 'hello-theme'),
        'view_item' => __('Display', 'hello-theme'),
        'add_new_item' => __('Add Rooms', 'hello-theme'),
        'add_new' => __('Thêm Rooms ', 'hello-theme'),
        'edit_item' => __('Edit', 'hello-theme'),
        'update_item' => __('Update', 'hello-theme'),
        'search_items' => __('Search', 'hello-theme'),
        'not_found' => __('Not found', 'hello-theme'),
        'not_found_in_trash' => __('Not found in trash', 'hello-theme'),
    );
    $rooms_cat = array(
        'labels' => $rooms,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 9,
        'can_export' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'rooms'),
    );
    register_post_type('rooms', $rooms_cat);



}


add_action('init', 'reg_testimonial', 0);


