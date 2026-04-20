<?php
/**
 * Template Part: Services Section
 * 
 * Services grid from Expertise post type via Relationship field
 * 
 * ACF Fields:
 * - services_eyebrow (Text)
 * - services_title (WYSIWYG)
 * - services_items (Relationship → Expertise post type)
 * 
 * Service data comes from:
 * - Post Title → service_title
 * - Post Excerpt → service_description
 * - Post Permalink → service_link
 * - ACF service_icon group (icon_svg or icon_image)
 */

$eyebrow = get_field('services_eyebrow');
$title = get_field('services_title');
$services = get_field('services_items');
?>

<section class="section-services" id="services">
	<div class="section-services__inner">
		<div class="section-services__head rv" data-aos="fade-up" data-aos-duration="900">
			<?php if ($eyebrow): ?>
			<div class="highlight__eyebrow blue"><?php echo esc_html($eyebrow); ?></div>
			<?php endif; ?>

			<?php if ($title): ?>
			<div class="section-services__title"><?php echo wp_kses_post($title); ?></div>
			<?php endif; ?>
		</div>

		<?php if ($services && is_array($services)): ?>
		<div class="section-services__grid">
			<?php 
				foreach ($services as $index => $post): 
					setup_postdata($post);
					
					// Get service data from post
					$service_title = get_the_title($post->ID);
					$service_description = get_the_excerpt($post->ID);
					$service_link = get_permalink($post->ID);
					
					// Get service icon (group field with icon_svg and icon_image)
					$icon_group = get_field('service_icon', $post->ID);
					$icon_svg = $icon_group['icon_svg'] ?? '';
					$icon_image = $icon_group['icon_image'] ?? '';
					
					$delay_class = ($index > 0) ? 'd' . $index : '';
				?>
			<div class="section-services__card rv <?php echo esc_attr($delay_class); ?>" data-aos="fade-up"
				data-aos-duration="800">
				<?php if ($icon_svg || $icon_image): ?>
				<div class="section-services__icon">
					<?php 
								// SVG code takes priority
								if ($icon_svg) {
									echo ($icon_svg);
								} 
								// Fallback to image
								elseif ($icon_image && is_array($icon_image)) {
									echo get_image_attrachment($icon_image, 'image');
								}
								?>
				</div>
				<?php endif; ?>

				<?php if ($service_title): ?>
				<h3><?php echo esc_html($service_title); ?></h3>
				<?php endif; ?>

				<?php if ($service_description): ?>
				<p><?php echo wp_kses_post($service_description); ?></p>
				<?php endif; ?>

				<?php if ($service_link): ?>
				<a class="section-services__link" href="<?php echo esc_url($service_link); ?>">
					Learn more <span class="section-services__arrow">&rarr;</span>
				</a>
				<?php endif; ?>
			</div>
			<?php 
				endforeach; 
				wp_reset_postdata();
				?>
		</div>
		<?php endif; ?>
	</div>
</section>