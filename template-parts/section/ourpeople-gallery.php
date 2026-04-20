<?php
/**
 * Template part: Our People Gallery Section
 * 
 * @package CanhCamTheme
 */

$gallery_eyebrow = get_field('gallery_eyebrow');
$gallery_title = get_field('gallery_title');
$gallery_photos = get_field('gallery_photos');

if (!$gallery_photos) return;
?>

<section class="our-dept">
	<div class="our-dept__inner __inner">
		<div class="our-dept__head" data-aos="fade-up">
			<?php if ($gallery_eyebrow): ?>
			<div class="highlight__eyebrow blue"><?php echo esc_html($gallery_eyebrow); ?></div>
			<?php endif; ?>

			<?php if ($gallery_title): ?>
			<h2 class="title-section" data-text-ripple><?php echo wp_kses_post($gallery_title); ?></h2>
			<?php endif; ?>
		</div>

		<div class="our-dept__grid">
			<?php 
			$delay_counter = 0;
			foreach ($gallery_photos as $photo):
				// Cycle delays: 0, 100, 200, 300, then back to 0
				$delay = ($delay_counter % 4) * 100;
				$delay_counter++;
				
				$full_url = $photo['url'] ?? '';
			?>
			<div class="our-dept__card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
				<div class="our-dept__card-img" data-fancybox="gallery" data-src="<?php echo esc_url($full_url); ?>">
					<?php echo get_image_attrachment($photo, 'image'); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>