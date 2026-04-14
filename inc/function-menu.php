<?php
/**
 * Menu Functions
 * 
 * @package CanhCamTheme
 */

/**
 * Add CTA classes to last menu item
 */
function canhcam_add_cta_to_last_menu_item($items, $args) {
    // Only apply to header-menu
    if ($args->theme_location !== 'header-menu' && $args->theme_location !== 'header-mobile') {
        return $items;
    }
    
    // Convert items to array if it's a string
    if (is_string($items)) {
        return $items;
    }
    
    // Get the items as array
    $items_array = array_values($items);
    $total_items = count($items_array);
    
    if ($total_items > 0) {
        // Get the last item
        $last_item = &$items_array[$total_items - 1];
        
        // Add CTA classes to the last menu item
        if (isset($last_item->classes)) {
            $last_item->classes[] = 'cta';
            $last_item->classes[] = 'btn';
            $last_item->classes[] = 'btn-primary';
        } else {
            $last_item->classes = array('cta', 'btn', 'btn-primary');
        }
    }
    
    return $items_array;
}
add_filter('wp_nav_menu_objects', 'canhcam_add_cta_to_last_menu_item', 10, 2);