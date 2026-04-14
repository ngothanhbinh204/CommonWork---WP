<?php
/**
 * Template part: Our People Careers Section
 * 
 * @package CanhCamTheme
 */

$careers_eyebrow = get_field('careers_eyebrow');
$careers_title = get_field('careers_title');
$careers_description = get_field('careers_description');
$careers_button = get_field('careers_button');
$careers_image = get_field('careers_image');

if (!$careers_title && !$careers_image) return;
?>

<section class="our-join">
	<div class="our-join__inner __inner">
		<div class="our-join__txt">
			<?php if ($careers_eyebrow): ?>
			<div class="highlight__eyebrow" data-aos="fade-up"><?php echo esc_html($careers_eyebrow); ?></div>
			<?php endif; ?>

			<?php if ($careers_title): ?>
			<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
				<?php echo wp_kses_post($careers_title); ?>
			</h2>
			<?php endif; ?>

			<?php if ($careers_description): ?>
			<p class="our-join__desc" data-aos="fade-up" data-aos-delay="200">
				<?php echo esc_html($careers_description); ?>
			</p>
			<?php endif; ?>

			<?php if ($careers_button && isset($careers_button['url'])): ?>
			<a class="btn btn-primary" href="<?php echo esc_url($careers_button['url']); ?>"
				target="<?php echo esc_attr($careers_button['target'] ?: '_self'); ?>" data-aos="fade-up"
				data-aos-delay="300">
				<?php echo esc_html($careers_button['title']); ?> <span>→</span>
			</a>
			<?php endif; ?>
		</div>

		<?php if ($careers_image): ?>
		<div class="our-join__img" data-aos="fade-up" data-aos-delay="200" data-fancybox
			data-src="<?php echo esc_url($careers_image['url']); ?>" data-parallax data-parallax-y="20">
			<?php echo get_image_attrachment($careers_image, 'large', '', '', 'data-parallax-img'); ?>
		</div>
		<?php endif; ?>
	</div>
</section>