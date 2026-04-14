<?php
/**
 * Single Portfolio Template
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<?php while (have_posts()): the_post(); ?>
	
	<?php 
	// Hero Section
	get_template_part('template-parts/section/portfolio-detail', 'hero'); 
	
	// Projects Section (repeater)
	get_template_part('template-parts/section/portfolio-detail', 'projects'); 
	
	// CTA Section
	get_template_part('template-parts/section/about', 'cta'); 
	?>
	
<?php endwhile; ?>

<?php get_footer(); ?>
