<?php
define('GENERATE_VERSION', '1.1.0');
require get_template_directory() . '/inc/function-root.php';
require get_template_directory() . '/inc/function-custom.php';
require get_template_directory() . '/inc/function-field.php';
require get_template_directory() . '/inc/function-pagination.php';
require get_template_directory() . '/inc/function-setup.php';
require get_template_directory() . '/inc/function-post-types.php';
require get_template_directory() . '/inc/function-portfolio.php';
require get_template_directory() . '/inc/function-sector.php';
require get_template_directory() . '/inc/function-menu.php';

add_filter('rank_math/frontend/breadcrumb/items', function($crumbs, $class) {
    if (!empty($crumbs[0][0])) {
        $crumbs[0][0] = 'Home';
    }
    return $crumbs;
}, 10, 2);


function custom_active_menu_context($classes, $item) {
    global $post;

    if (!$post) return $classes;

    $post_type = get_post_type($post);
    if ($item->object === 'page') {

        $menu_page_template = get_page_template_slug($item->object_id);

        $map = [
            'page-templates/template-portfolio.php' => 'portfolio'
        ];

        if (!empty($map[$menu_page_template]) && $map[$menu_page_template] === $post_type) {
            $classes[] = 'current-menu-item';
        }
    }

    if ($item->object === $post_type && $item->type === 'post_type_archive') {
        $classes[] = 'current-menu-item';
    }


    if (is_page()) {
        $current_template = get_page_template_slug($post->ID);

        if ($item->object === 'page') {
            $menu_template = get_page_template_slug($item->object_id);

            if ($menu_template && $menu_template === $current_template) {
                $classes[] = 'current-menu-item';
            }
        }
    }

    return array_unique($classes);
}
add_filter('nav_menu_css_class', 'custom_active_menu_context', 10, 2);