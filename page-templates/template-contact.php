<?php
/**
 * Template Name: Contact Page
 * 
 * Contact page template with ACF-powered sections
 * Includes hero, contact info, and contact form
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<?php 
// Hero Section
get_template_part('template-parts/section/contact', 'hero'); 

// Main Contact Section (Info + Form)
get_template_part('template-parts/section/contact', 'main'); 
?>

<?php get_footer(); ?>