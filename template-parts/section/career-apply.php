<?php
/**
 * Career - Apply Section
 * 
 * @package CanhCamTheme
 */

$apply_eyebrow = get_field('apply_eyebrow');
$apply_title = get_field('apply_title');
$apply_description = get_field('apply_description');
$apply_email = get_field('apply_email');
?>

<section class="careers-apply">
	<div class="careers-apply__inner" data-aos="fade-up">
		<?php if ($apply_eyebrow): ?>
		<div class="highlight__eyebrow blue" data-aos="fade-up"><?php echo esc_html($apply_eyebrow); ?></div>
		<?php endif; ?>

		<?php if ($apply_title): ?>
		<h2 class="title-section"><?php echo wp_kses_post($apply_title); ?></h2>
		<?php endif; ?>

		<?php if ($apply_description): ?>
		<div class="careers-apply__desc"><?php echo wp_kses_post($apply_description); ?></div>
		<?php endif; ?>

		<?php if ($apply_email): ?>
		<a class="careers-apply__email" href="mailto:<?php echo esc_attr($apply_email); ?>">
			<i class="fa-regular fa-envelope"></i>&ensp;<?php echo esc_html($apply_email); ?>
		</a>
		<?php endif; ?>
	</div>
</section>