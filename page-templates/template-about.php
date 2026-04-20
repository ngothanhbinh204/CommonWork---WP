<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 * 
 * About Us page template với ACF section-based architecture
 * 7 sections: Hero, Story, Mission/Vision, Values, Timeline, Team, CTA
 * 
 * @package CanhCamTheme
 */

get_header(); ?>

<main>
	<?php
	// Section 1: Hero với breadcrumb, title, description
	get_template_part( 'template-parts/section/about', 'hero' );

	
	// Section 2: Our Story - Image + badge + content
	get_template_part( 'template-parts/section/about', 'story' );
	
	get_template_part('template-parts/section/home/stats');
	
	// Section 3: Mission & Vision cards
	get_template_part( 'template-parts/section/about', 'mission-vision' );
	
	// Section 4: Core Values grid
	get_template_part( 'template-parts/section/about', 'values' );
	
	// Section 5: Timeline/Journey
	get_template_part( 'template-parts/section/about', 'timeline' );
	
	// Section 6: Leadership Team
	get_template_part( 'template-parts/section/about', 'team' );
	
	// Section 7: Final CTA
	get_template_part( 'template-parts/section/about', 'cta' );
	?>
</main>

<?php get_footer();