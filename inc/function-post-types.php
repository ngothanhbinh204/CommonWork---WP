<?php
/**
 * Register custom post type: Expertise
 */
create_post_type('expertise', array(
	'name' => 'Expertise',
	'singular_name' => 'Expertise',
	'slug' => 'expertise',
	'icon' => 'dashicons-portfolio',
	'menu_position' => 20,
	'supports' => array('title', 'editor', 'thumbnail', 'page-attributes','excerpt'),
	'has_archive' => false,
	'public' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
));

// create_post_type('test_products', array(
// 	'name' => 'Test Products',
// 	'slug' => 'test-products',
// 	'icon' => 'dashicons-cart',
// ));

// create_taxonomy($key, array(
// 	'name' => 'Danh mục',
// 	'object_type' => array('test_products'),
// 	'slug' => 'danh-muc-san-pham',
// ));