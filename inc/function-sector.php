<?php
/**
 * Sector Post Type Registration
 * 
 * @package CanhCamTheme
 */

// Register Sector Post Type
function canhcam_register_sector_post_type() {
    $labels = array(
        'name'                  => 'Sectors',
        'singular_name'         => 'Sector',
        'menu_name'             => 'Sectors',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Sector',
        'edit_item'             => 'Edit Sector',
        'new_item'              => 'New Sector',
        'view_item'             => 'View Sector',
        'search_items'          => 'Search Sectors',
        'not_found'             => 'No sectors found',
        'not_found_in_trash'    => 'No sectors found in Trash',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'sector'),
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-building',
        'supports'              => array('title', 'editor', 'thumbnail'),
        'show_in_rest'          => true,
    );

    register_post_type('sector', $args);
}
add_action('init', 'canhcam_register_sector_post_type');
