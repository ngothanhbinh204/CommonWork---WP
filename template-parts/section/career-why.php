<?php
/**
 * Career - Why CommonWorks Section
 * 
 * @package CanhCamTheme
 */

$why_eyebrow = get_field('why_eyebrow');
$why_eyebrow_class = get_field('why_eyebrow_class');
$why_title = get_field('why_title');
$why_description = get_field('why_description');
$why_cards = get_field('why_cards');
?>

<section class="careers-why">
	<div class="careers-why__inner">
		<div class="careers-why__head" data-aos="fade-up">
			<?php if ($why_eyebrow): ?>
			<div class="highlight__eyebrow blue" data-aos="fade-up">
				<?php echo esc_html($why_eyebrow); ?>
			</div>
			<?php endif; ?>

			<?php if ($why_title): ?>
			<h2 class="title-section"><?php echo wp_kses_post($why_title); ?></h2>
			<?php endif; ?>

			<?php if ($why_description): ?>
			<div class="careers-why__desc"><?php echo wp_kses_post($why_description); ?></div>
			<?php endif; ?>
		</div>

		<?php if ($why_cards): ?>
		<div class="careers-why__grid">
			<?php 
				$delay = 100;
				foreach ($why_cards as $card): 
				?>
			<div class="careers-why__card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
				<?php if (!empty($card['icon'])): ?>
				<div class="careers-why__icon">
					<i class="<?php echo esc_attr($card['icon']); ?>"></i>
				</div>
				<?php endif; ?>

				<?php if (!empty($card['title'])): ?>
				<h4 class="careers-why__card-title"><?php echo esc_html($card['title']); ?></h4>
				<?php endif; ?>

				<?php if (!empty($card['text'])): ?>
				<div class="careers-why__card-text"><?php echo wp_kses_post($card['text']); ?></div>
				<?php endif; ?>
			</div>
			<?php 
				$delay += 100;
				endforeach; 
				?>
		</div>
		<?php endif; ?>
	</div>
</section>