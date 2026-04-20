<?php
/**
 * Contact Hero Section
 * 
 * @package CanhCamTheme
 */

$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
?>

<section class="about-hero">
	<div class="about-hero__bg"></div>
	<div class="about-hero__pat"></div>
	<div class="about-hero__content">
		<div class="global-breadcrumb">
			<div class="container">
				<?php
				if (function_exists('rank_math_the_breadcrumbs')) {
					rank_math_the_breadcrumbs([
						'wrap_before' => '<nav class="rank-math-breadcrumb" aria-label="breadcrumbs" data-aos="fade-down" data-aos-delay="200"><p>',
						'wrap_after'  => '</p></nav>',
					]);
				}
				?>
			</div>
		</div>
		<?php if ($hero_title): ?>
		<h1 class="about-hero__title" data-aos="fade-up" data-aos-delay="400">
			<?php echo wp_kses_post($hero_title); ?>
		</h1>
		<?php endif; ?>

		<?php if ($hero_description): ?>
		<div class="about-hero__desc" data-aos="fade-up" data-aos-delay="600">
			<?php echo wp_kses_post($hero_description); ?>
		</div>
		<?php endif; ?>
	</div>
</section>