<?php
/**
 * Template Name: Portfolio Archive
 * 
 * Portfolio listing page with filter tabs and sectors
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<?php 
// Hero Section
get_template_part('template-parts/section/portfolio', 'hero'); 

// Portfolio Grid Section
get_template_part('template-parts/section/portfolio', 'grid'); 

// Sectors Section
get_template_part('template-parts/section/portfolio', 'sectors'); 

// CTA Section
get_template_part('template-parts/section/about', 'cta'); 
?>

<?php get_footer(); ?>
