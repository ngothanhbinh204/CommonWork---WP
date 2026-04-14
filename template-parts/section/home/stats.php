<?php
/**
 * Template Part: Stats Section
 * 
 * Statistics counter section
 * 
 * ACF Fields:
 * - stats_items (Repeater)
 *   - stat_number (Number)
 *   - stat_suffix (Text) - e.g., "+", "K", "M"
 *   - stat_label (Text)
 */

$items = get_field('stats_items');

if (!$items || !is_array($items)) return;
?>

<section class="section-stats">
	<div class="section-stats__bg"></div>
	<div class="section-stats__inner">
		<?php 
		$total_items = count($items);
		foreach ($items as $index => $item): 
			$number = $item['stat_number'] ?? 0;
			$suffix = $item['stat_suffix'] ?? '';
			$label = $item['stat_label'] ?? '';
			$delay_class = ($index > 0) ? 'd' . $index : '';
			$delay = $index * 100;
		?>
			<div class="section-stats__item rv <?php echo esc_attr($delay_class); ?>" data-aos="fade-up" data-aos-duration="800" <?php if ($delay > 0): ?>data-aos-delay="<?php echo esc_attr($delay); ?>"<?php endif; ?>>
				<div class="section-stats__number">
					<span class="countup" data-countup="<?php echo esc_attr($number); ?>">0</span>
					<?php if ($suffix): ?>
						<span><?php echo esc_html($suffix); ?></span>
					<?php endif; ?>
				</div>
				<?php if ($label): ?>
					<div class="section-stats__label"><?php echo esc_html($label); ?></div>
				<?php endif; ?>
			</div>
			
			<?php if ($index < $total_items - 1): ?>
				<div class="section-stats__divider"></div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</section>
