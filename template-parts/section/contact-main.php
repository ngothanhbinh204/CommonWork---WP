<?php
/**
 * Contact Main Section (Info + Form)
 * 
 * @package CanhCamTheme
 */

// Contact Info fields
$info_eyebrow = get_field('info_eyebrow');
$info_heading = get_field('info_heading');
$contact_items = get_field('contact_items');
$direct_enabled = get_field('direct_enabled');
$direct_name = get_field('direct_name');
$direct_role = get_field('direct_role');
$direct_avatar = get_field('direct_avatar');
$direct_email = get_field('direct_email');
$direct_phone = get_field('direct_phone');
$map_embed = get_field('map_embed');
$map_link = get_field('map_link');

// Contact Form fields
$form_heading = get_field('form_heading');
$form_description = get_field('form_description');
$form_shortcode = get_field('form_shortcode');
?>

<main>
	<section class="contact">
		<div class="contact__inner __inner">
			<!-- Contact Info (Left Side) -->
			<div class="contact__info" data-aos="fade-right">
				<?php if ($info_eyebrow): ?>
				<div class="highlight__eyebrow"><?php echo esc_html($info_eyebrow); ?></div>
				<?php endif; ?>

				<?php if ($info_heading): ?>
				<h2 class="contact__heading"><?php echo wp_kses_post($info_heading); ?></h2>
				<?php endif; ?>

				<?php if ($contact_items): ?>
				<?php foreach ($contact_items as $item): ?>
				<div class="ci__item">
					<?php if (!empty($item['icon'])): ?>
					<div class="ci__icon"><i class="<?php echo esc_attr($item['icon']); ?>"></i></div>
					<?php endif; ?>
					<div class="ci__text">
						<?php if (!empty($item['title'])): ?>
						<h4><?php echo esc_html($item['title']); ?></h4>
						<?php endif; ?>
						<?php if (!empty($item['content'])): ?>
						<?php echo wp_kses_post($item['content']); ?>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>

				<?php if ($direct_enabled && $direct_name): ?>
				<div class="ci__direct">
					<div class="ci__direct-inner">
						<h4>Direct Contact</h4>
						<div class="ci__direct-person">
							<?php if ($direct_avatar): ?>
							<div class="ci__direct-avatar"><?php echo esc_html($direct_avatar); ?></div>
							<?php endif; ?>
							<div class="ci__direct-info">
								<div class="ci__name"><?php echo esc_html($direct_name); ?></div>
								<?php if ($direct_role): ?>
								<div class="ci__role"><?php echo esc_html($direct_role); ?></div>
								<?php endif; ?>
								<div class="ci__direct-links">
									<?php if ($direct_email): ?>
									<a href="mailto:<?php echo esc_attr($direct_email); ?>">
										<i class="fa-regular fa-envelope"></i> <?php echo esc_html($direct_email); ?>
									</a>
									<?php endif; ?>
									<?php if ($direct_phone): ?>
									<a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $direct_phone)); ?>">
										<i class="fa-regular fa-phone"></i> <?php echo esc_html($direct_phone); ?>
									</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($map_embed): ?>
				<div class="ci__map">
					<?php echo wp_kses_post($map_embed); ?>
					<?php if ($map_link): ?>
					<a class="ci__map-link" href="<?php echo esc_url($map_link); ?>" target="_blank"
						rel="noopener noreferrer">
						<i class="fa-regular fa-arrow-up-right-from-square"></i> Open in Google Maps
					</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

			<!-- Contact Form (Right Side) -->
			<div class="contact__form" data-aos="fade-left" data-aos-delay="100">
				<?php if ($form_heading): ?>
				<h2 class="contact__form-heading"><?php echo wp_kses_post($form_heading); ?></h2>
				<?php endif; ?>

				<?php if ($form_description): ?>
				<div class="contact__form-desc"><?php echo wp_kses_post($form_description); ?></div>
				<?php endif; ?>

				<?php if ($form_shortcode): ?>
				<?php echo do_shortcode($form_shortcode); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>