<?php
/**
 * Portfolio Post Type Registration
 * 
 * @package CanhCamTheme
 */

// Register Portfolio Post Type
function canhcam_register_portfolio_post_type() {
    $labels = array(
        'name'                  => 'Portfolio',
        'singular_name'         => 'Portfolio Item',
        'menu_name'             => 'Portfolio',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Portfolio',
        'edit_item'             => 'Edit Portfolio',
        'new_item'              => 'New Portfolio',
        'view_item'             => 'View Portfolio',
        'search_items'          => 'Search Portfolio',
        'not_found'             => 'No portfolio found',
        'not_found_in_trash'    => 'No portfolio found in Trash',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'portfolio'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'          => true,
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'canhcam_register_portfolio_post_type');

// Register Portfolio Category Taxonomy
function canhcam_register_portfolio_taxonomy() {
    $labels = array(
        'name'              => 'Portfolio Categories',
        'singular_name'     => 'Portfolio Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('portfolio_category', array('portfolio'), $args);
}
add_action('init', 'canhcam_register_portfolio_taxonomy');
