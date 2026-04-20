<?php
/**
 * Template Part: About Section
 * 
 * About section with image slider and text content
 * 
 * ACF Fields:
 * - about_images (Repeater)
 *   - about_image (Image)
 * - about_eyebrow (Text)
 * - about_title (WYSIWYG)
 * - about_content (Textarea)
 * - about_link (Link)
 */

$images = get_field('about_images');
$eyebrow = get_field('about_eyebrow');
$title = get_field('about_title');
$content = get_field('about_content');
$link = get_field('about_link');
?>

<section class="section-about" id="about">
	<div class="section-about__inner">


		<div class="section-about__image rv" data-aos="fade-right" data-aos-duration="1000">
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php 
					foreach ($images as $index => $item): 
						$image = $item['about_image'] ?? '';
						$active_class = ($index === 0) ? 'is-active' : '';
						$bg_url = $image && is_array($image) ? $image['url'] : '';
					?>
					<div class="swiper-slide <?php echo esc_attr($active_class); ?>">
						<a class="section-about__fb" href="<?php echo esc_url($bg_url); ?>"
							data-fancybox="about-gallery" data-caption="Our Team at Work">
							<img class="lozad" data-src="<?php echo esc_url($bg_url); ?>" alt="">
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<div class="section-about__text">
			<?php if ($eyebrow): ?>
			<div class="highlight__eyebrow rv" data-aos="fade-up" data-aos-duration="800">
				<?php echo esc_html($eyebrow); ?>
			</div>
			<?php endif; ?>

			<?php if ($title): ?>
			<div class="title-section" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
				<?php echo wp_kses_post($title); ?>
			</div>
			<?php endif; ?>

			<?php if ($content): ?>
			<div class="section-about__body rv" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
				<?php echo wp_kses_post($content); ?>
			</div>
			<?php endif; ?>

			<?php if ($link && isset($link['url'])): ?>
			<a class="btn btn-primary" href="<?php echo esc_url($link['url']); ?>"
				target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" data-aos="fade-up" data-aos-duration="800"
				data-aos-delay="300">
				<?php echo esc_html($link['title']); ?> <span class="section-about__arrow">&rarr;</span>
			</a>
			<?php endif; ?>
		</div>
	</div>
</section>