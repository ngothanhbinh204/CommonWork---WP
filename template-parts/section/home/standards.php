<?php
/**
 * Template Part: Standards Section
 * 
 * Standards & Software carousel section
 * 
 * ACF Fields:
 * - standards_title (Text)
 * - standards_items (Repeater)
 *   - standard_logo (Image)
 *   - standard_name (Text)
 *   - standard_link (URL)
 *   - standard_svg_code (Textarea) - For custom SVG logos
 */

$title = get_field('standards_title');
$items = get_field('standards_items');

if (!$items || !is_array($items)) return;
?>

<section class="section-standards">
	<div class="section-standards__inner rv" data-aos="fade-up" data-aos-duration="900">
		<?php if ($title): ?>
			<h3 class="section-standards__title"><?php echo esc_html($title); ?></h3>
		<?php endif; ?>
		
		<div class="section-standards__track">
			<div class="section-standards__list">
				<?php 
				// Double the items for infinite scroll effect
				$doubled_items = array_merge($items, $items);
				
				foreach ($doubled_items as $index => $item): 
					$logo = $item['standard_logo'] ?? '';
					$name = $item['standard_name'] ?? '';
					$link = $item['standard_link'] ?? '';
					$svg_code = $item['standard_svg_code'] ?? '';
					$is_duplicate = ($index >= count($items));
				?>
					<div class="section-standards__item" <?php if ($is_duplicate): ?>aria-hidden="true"<?php endif; ?>>
						<?php if ($link): ?>
							<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener">
						<?php endif; ?>
						
							<?php if ($svg_code): ?>
								<?php echo wp_kses_post($svg_code); ?>
							<?php elseif ($logo && is_array($logo)): ?>
								<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: $name); ?>">
								<?php if ($name): ?>
									<span><?php echo esc_html($name); ?></span>
								<?php endif; ?>
							<?php endif; ?>
						
						<?php if ($link): ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
