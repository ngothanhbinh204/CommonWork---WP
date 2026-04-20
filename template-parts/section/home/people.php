<?php
/**
 * Template Part: People Section
 * 
 * Our People section with photos and content
 * 
 * ACF Fields:
 * - people_eyebrow (Text)
 * - people_title (WYSIWYG)
 * - people_content (Textarea)
 * - people_link (Link)
 * - people_photos (Repeater)
 *   - people_photo (Image)
 */

$eyebrow = get_field('people_eyebrow');
$title = get_field('people_title');
$content = get_field('people_content');
$link = get_field('people_link');
$photos = get_field('people_photos');
?>

<section class="section-people" id="people">
	<div class="section-people__inner">
		<div class="section-people__text">
			<?php if ($eyebrow): ?>
			<div class="highlight__eyebrow blue" data-aos="fade-up" data-aos-duration="800">
				<?php echo esc_html($eyebrow); ?>
			</div>
			<?php endif; ?>

			<?php if ($title): ?>
			<div class="title-section rv" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
				<?php echo wp_kses_post($title); ?>
			</div>
			<?php endif; ?>

			<?php if ($content): ?>
			<div class="section-people__body rv" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
				<?php echo wp_kses_post($content); ?>
			</div>
			<?php endif; ?>

			<?php if ($link && isset($link['url'])): ?>
			<a class="btn btn-primary" href="<?php echo esc_url($link['url']); ?>"
				target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" data-aos="fade-up" data-aos-duration="800"
				data-aos-delay="300">
				<?php echo esc_html($link['title']); ?> <span class="section-people__arrow">&rarr;</span>
			</a>
			<?php endif; ?>
		</div>

		<?php if ($photos && is_array($photos)): ?>
		<div class="section-people__photos">
			<?php 
				foreach ($photos as $index => $item): 
					$photo = $item['people_photo'] ?? '';
					$offset_class = ($index > 0) ? 'section-people__photo--offset' : '';
					$delay_class = ($index > 0) ? 'd2' : '';
					$delay = ($index > 0) ? 200 : 0;
					$bg_url = $photo && is_array($photo) ? $photo['url'] : '';
				?>
			<div class="section-people__photo rv <?php echo esc_attr($offset_class . ' ' . $delay_class); ?>"
				<?php if ($index === 0): ?>id="pplSlide" <?php endif; ?> data-aos="fade-left" data-aos-duration="1000"
				<?php if ($delay > 0): ?>data-aos-delay="<?php echo esc_attr($delay); ?>" <?php endif; ?>>
				<?php echo get_image_attrachment($photo, 'image') ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>