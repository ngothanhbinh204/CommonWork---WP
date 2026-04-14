<?php
/**
 * Template Name: Homepage
 * 
 * Homepage template with 10 ACF-powered sections
 * Each section uses ACF fields and template parts for maintainability
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<main>
	<?php 
	// Hero Section
	get_template_part('template-parts/section/home/hero'); 
	
	// Intro Section
	get_template_part('template-parts/section/home/intro'); 
	
	// Services Section
	get_template_part('template-parts/section/home/services'); 
	
	// Sectors/Portfolio Section
	get_template_part('template-parts/section/home/sectors'); 
	
	// About Section
	get_template_part('template-parts/section/home/about'); 
	
	// Stats Section
	get_template_part('template-parts/section/home/stats'); 
	
	// Why Choose Us Section
	get_template_part('template-parts/section/home/why'); 
	
	// Our People Section
	get_template_part('template-parts/section/home/people'); 
	
	// Standards & Software Section
	get_template_part('template-parts/section/home/standards'); 
	
	// CTA Section (shared)
	get_template_part('template-parts/section/cta'); 
	?>
</main>

<?php get_footer(); ?>
