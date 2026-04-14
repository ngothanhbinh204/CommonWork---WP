<?php
/**
 * About Hero Section
 * Hero section với breadcrumb, title, description
 * 
 * ACF Fields:
 * - hero_title (wysiwyg) - Main hero title
 * - hero_description (wysiwyg) - Description text
 */

$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');

if ( ! $hero_title && ! $hero_description ) {
	return;
}
?>

<section class="about-hero">
	<div class="about-hero__bg"></div>
	<div class="about-hero__pat"></div>
	<div class="about-hero__content">
		<!-- Global Breadcrumb -->
		<div class="global-breadcrumb">
			<div class="container">
				<?php if ( function_exists('rank_math_the_breadcrumbs') ) : ?>
					<nav class="rank-math-breadcrumb" aria-label="breadcrumbs" data-aos="fade-down" data-aos-delay="200">
						<?php rank_math_the_breadcrumbs(); ?>
					</nav>
				<?php endif; ?>
			</div>
		</div>
		
		<?php if ( $hero_title ) : ?>
			<h1 class="about-hero__title" data-aos="fade-up" data-aos-delay="400">
				<?php echo wp_kses_post( $hero_title ); ?>
			</h1>
		<?php endif; ?>
		
		<?php if ( $hero_description ) : ?>
			<p class="about-hero__desc" data-aos="fade-up" data-aos-delay="600">
				<?php echo wp_kses_post( $hero_description ); ?>
			</p>
		<?php endif; ?>
	</div>
</section>
