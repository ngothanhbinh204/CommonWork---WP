<?php
/**
 * Template Name: Expertise Page
 * 
 * Expertise page template with 5 ACF-powered sections
 * Each section uses ACF fields and template parts for maintainability
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<main>
	<?php 
	// Hero Section
	get_template_part('template-parts/section/expertise', 'hero'); 
	
	// Services Section (Relationship to dich_vu post type)
	get_template_part('template-parts/section/expertise', 'services'); 
	
	// Software & Standards Section
	get_template_part('template-parts/section/expertise', 'software'); 
	
	// Process Section
	get_template_part('template-parts/section/expertise', 'process'); 
	
	// CTA Section
	get_template_part('template-parts/section/about', 'cta'); 
	?>
</main>

<?php get_footer(); ?>
