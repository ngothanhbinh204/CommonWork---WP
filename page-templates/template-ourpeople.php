<?php
/**
 * Template Name: Our People
 * Template Post Type: page
 * 
 * Our People page template with 7 ACF-powered sections
 * Leadership, Team, Culture, Gallery, Careers, CTA
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<main>
	<?php
	// Section 1: Hero with breadcrumb, title, description
	get_template_part('template-parts/section/ourpeople', 'hero');
	
	// Section 2: Leadership team cards
	get_template_part('template-parts/section/ourpeople', 'leadership');
	
	// Section 3: Team photo with description
	get_template_part('template-parts/section/ourpeople', 'teamphoto');
	
	// Section 4: Culture values grid
	get_template_part('template-parts/section/ourpeople', 'culture');
	
	// Section 5: Department/Team gallery
	get_template_part('template-parts/section/ourpeople', 'gallery');
	
	// Section 6: Join/Careers section
	get_template_part('template-parts/section/ourpeople', 'careers');
	
	// Section 7: Final CTA (shared)
	get_template_part('template-parts/section/about', 'cta');
	?>
</main>

<?php get_footer(); ?>
