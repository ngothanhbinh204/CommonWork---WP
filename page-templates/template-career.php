<?php
/**
 * Template Name: Career Page
 * Template Post Type: page
 * 
 * Careers page template with ACF section-based architecture
 * 5 sections: Hero, Why CommonWorks, Open Positions, Apply, CTA
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<main>
	<?php
	// Section 1: Hero with breadcrumb, title, description (reuse from About)
	get_template_part('template-parts/section/about', 'hero');
	
	// Section 2: Why CommonWorks - Benefits cards
	get_template_part('template-parts/section/career', 'why');
	
	// Section 3: Open Positions - Social links
	get_template_part('template-parts/section/career', 'positions');
	
	// Section 4: Apply Section - Email contact
	get_template_part('template-parts/section/career', 'apply');
	
	// Section 5: Final CTA (reuse from About)
	get_template_part('template-parts/section/about', 'cta');
	?>
</main>

<?php get_footer();
