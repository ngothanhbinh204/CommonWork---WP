<?php
/**
 * Template part: Our People Culture Section
 * 
 * @package CanhCamTheme
 */

$culture_eyebrow = get_field('culture_eyebrow');
$culture_title = get_field('culture_title');
$culture_values = get_field('culture_values');

if (!$culture_values) return;
?>

<section class="our-culture bg-dark">
	<div class="our-culture__bg"></div>
	<div class="our-culture__inner __inner">
		<?php if ($culture_eyebrow): ?>
		<div class="highlight__eyebrow" data-aos="fade-up"><?php echo esc_html($culture_eyebrow); ?></div>
		<?php endif; ?>

		<?php if ($culture_title): ?>
		<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
			<?php echo wp_kses_post($culture_title); ?>
		</h2>
		<?php endif; ?>

		<div class="our-culture__grid">
			<?php 
			$delay_counter = 0;
			foreach ($culture_values as $value):
				$icon_svg = $value['icon_svg'] ?? '';
				$title = $value['title'] ?? '';
				$description = $value['description'] ?? '';
				
				// Cycle delays: 100, 200, 300, then back to 100
				$delay = (($delay_counter % 3) + 1) * 100;
				$delay_counter++;
			?>
			<div class="our-cult__card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
				<?php if ($icon_svg): ?>
				<div class="our-cult__icon">
					<?php echo ($icon_svg); ?>
				</div>
				<?php endif; ?>

				<?php if ($title): ?>
				<h4><?php echo esc_html($title); ?></h4>
				<?php endif; ?>

				<?php if ($description): ?>
				<p><?php echo esc_html($description); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>