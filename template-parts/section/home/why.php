<?php
/**
 * Template Part: Why Choose Us Section
 * 
 * Complex section with intro stats and feature cards
 * 
 * ACF Fields:
 * - why_eyebrow (Text)
 * - why_title (WYSIWYG)
 * - why_description (Textarea)
 * - why_stats (Repeater)
 *   - stat_value (Text)
 *   - stat_label (Text)
 * - why_cards (Repeater)
 *   - card_icon (Image or SVG code)
 *   - card_title (Text)
 *   - card_description (Textarea)
 */

$eyebrow = get_field('why_eyebrow');
$title = get_field('why_title');
$description = get_field('why_description');
$stats = get_field('why_stats');
$cards = get_field('why_cards');
?>

<section class="section-why" id="whyus">
	<div class="section-why__inner">
		<div class="section-why__left" data-aos="fade-right" data-aos-duration="1000">
			<div class="section-why__head rv">
				<?php if ($eyebrow): ?>
				<div class="highlight__eyebrow rv"><?php echo esc_html($eyebrow); ?></div>
				<?php endif; ?>

				<?php if ($title): ?>
				<div class="title-section"><?php echo wp_kses_post($title); ?></div>
				<?php endif; ?>

				<?php if ($description): ?>
				<div class="section-why__desc"><?php echo wp_kses_post($description); ?></div>
				<?php endif; ?>

				<?php if ($stats && is_array($stats)): ?>
				<div class="section-why__stats">
					<?php foreach ($stats as $stat): 
							$value = $stat['stat_value'] ?? '';
							$label = $stat['stat_label'] ?? '';
						?>
					<div class="section-why__stat">
						<?php if ($value): ?>
						<div class="section-why__stat-value"><?php echo esc_html($value); ?></div>
						<?php endif; ?>
						<?php if ($label): ?>
						<div class="section-why__stat-label"><?php echo esc_html($label); ?></div>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ($cards && is_array($cards)): ?>
		<div class="section-why__grid">
			<?php 
				foreach ($cards as $index => $card): 
					$icon = $card['card_icon'] ?? '';
					$card_title = $card['card_title'] ?? '';
					$card_description = $card['card_description'] ?? '';
					$delay_class = ($index > 0) ? 'd' . (($index % 3) + 1) : '';
					$delay = ($index > 0) ? ($index * 100) : 0;
				?>
			<div class="section-why__card rv <?php echo esc_attr($delay_class); ?>" data-aos="fade-up"
				data-aos-duration="800" <?php if ($delay > 0): ?>data-aos-delay="<?php echo esc_attr($delay); ?>"
				<?php endif; ?>>
				<?php if ($icon): ?>
				<div class="section-why__icon">
					<?php 
								// If icon is ACF image field
								if (is_array($icon) && isset($icon['url'])) {
									echo get_image_attrachment($icon, 'image');
								} 
								// If icon is SVG code (text field)
								elseif (is_string($icon) && strpos($icon, '<svg') !== false) {
									echo ($icon);
								}
								?>
				</div>
				<?php endif; ?>

				<div class="section-why__text">
					<?php if ($card_title): ?>
					<h3><?php echo esc_html($card_title); ?></h3>
					<?php endif; ?>
					<?php if ($card_description): ?>
					<p><?php echo wp_kses_post($card_description); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>