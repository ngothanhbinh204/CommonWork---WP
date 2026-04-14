<?php
/**
 * Template Part: Hero Section
 * 
 * Homepage hero banner with particles, gradient, title and CTAs
 * 
 * ACF Fields:
 * - hero_background (Image)
 * - hero_eyebrow (Text)
 * - hero_title (WYSIWYG)
 * - hero_subtitle (Textarea)
 * - hero_cta_primary (Link)
 * - hero_cta_secondary (Link)
 * - hero_show_scroll (True/False)
 */

// $background = get_field('hero_background');
$eyebrow = get_field('hero_eyebrow');
$title = get_field('hero_title');
$subtitle = get_field('hero_subtitle');
$cta_primary = get_field('hero_cta_primary');
$cta_secondary = get_field('hero_cta_secondary');
$show_scroll = get_field('hero_show_scroll');
?>

<section class="section-hero">
	<!-- <?php if ($background): ?>
	<div class="section-hero__img-bg" style="background-image: url('<?php echo esc_url($background['url']); ?>');">
	</div>
	<?php endif; ?> -->

	<div class="section-hero__gradient"></div>
	<div class="section-hero__particles" id="particles"></div>
	<div class="section-hero__pattern"></div>
	<div class="section-hero__shimmer"></div>

	<div class="section-hero__inner">
		<?php if ($eyebrow): ?>
		<div class="highlight__eyebrow" data-aos="fade-down" data-aos-duration="800" data-aos-delay="300">
			<?php echo esc_html($eyebrow); ?>
		</div>
		<?php endif; ?>

		<?php if ($title): ?>
		<h1 class="section-hero__title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
			<?php echo wp_kses_post($title); ?>
		</h1>
		<?php endif; ?>

		<?php if ($subtitle): ?>
		<div class="section-hero__subtitle" data-aos="fade-up" data-aos-duration="900" data-aos-delay="700">
			<?php echo wp_kses_post($subtitle); ?>
		</div>
		<?php endif; ?>

		<?php if ($cta_primary || $cta_secondary): ?>
		<div class="section-hero__btns" data-aos="fade-up" data-aos-duration="800" data-aos-delay="900">
			<?php if ($cta_primary): ?>
			<a class="btn-hero btn-hero--gold" href="<?php echo esc_url($cta_primary['url']); ?>"
				target="<?php echo esc_attr($cta_primary['target'] ?: '_self'); ?>">
				<?php echo esc_html($cta_primary['title']); ?>&nbsp;<span class="btn-hero__arrow">→</span>
			</a>
			<?php endif; ?>

			<?php if ($cta_secondary): ?>
			<a class="btn-hero btn-hero--ghost" href="<?php echo esc_url($cta_secondary['url']); ?>"
				target="<?php echo esc_attr($cta_secondary['target'] ?: '_self'); ?>">
				<?php echo esc_html($cta_secondary['title']); ?>&nbsp;<span class="btn-hero__arrow">→</span>
			</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>

	<?php if ($show_scroll): ?>
	<div class="section-hero__scroll" data-aos="fade-in" data-aos-duration="800" data-aos-delay="1400">
		<span>Scroll</span>
		<div class="section-hero__scroll-line"></div>
	</div>
	<?php endif; ?>
</section>