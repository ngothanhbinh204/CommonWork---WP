<?php
/**
 * Career - Open Positions Section
 * 
 * @package CanhCamTheme
 */

$positions_eyebrow = get_field('positions_eyebrow');
$positions_eyebrow_class = get_field('positions_eyebrow_class');
$positions_title = get_field('positions_title');
$positions_description = get_field('positions_description');
$positions_buttons = get_field('positions_buttons');
?>

<section class="careers-positions">
	<div class="careers-positions__inner">
		<div class="careers-positions__content" data-aos="fade-up">
			<?php if ($positions_eyebrow): ?>
			<div class="highlight__eyebrow blue" data-aos="fade-up">
				<?php echo esc_html($positions_eyebrow); ?>
			</div>
			<?php endif; ?>

			<?php if ($positions_title): ?>
			<h2 class="title-section"><?php echo wp_kses_post($positions_title); ?></h2>
			<?php endif; ?>

			<?php if ($positions_description): ?>
			<div class="careers-positions__desc"><?php echo wp_kses_post($positions_description); ?></div>
			<?php endif; ?>

			<?php if ($positions_buttons): ?>
			<div class="careers-positions__btns">
				<?php foreach ($positions_buttons as $item): 
						$button = $item['button'];
						$button_class = !empty($item['button_class']) ? $item['button_class'] : 'btn-primary';
						if ($button): 
					?>
				<a class="btn <?php echo esc_attr($button_class); ?>" href="<?php echo esc_url($button['url']); ?>"
					<?php echo $button['target'] ? 'target="' . esc_attr($button['target']) . '"' : ''; ?>
					<?php echo $button['target'] === '_blank' ? 'rel="noopener"' : ''; ?>>
					<?php echo esc_html($button['title']); ?>&nbsp;<i class="fa-regular fa-arrow-right"></i>
				</a>
				<?php 
						endif;
					endforeach; 
					?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>