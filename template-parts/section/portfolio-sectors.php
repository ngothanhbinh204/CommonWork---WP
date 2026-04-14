<?php
/**
 * Portfolio Sectors Section
 * 
 * @package CanhCamTheme
 */

$sectors_eyebrow = get_field('sectors_eyebrow');
$sectors_title = get_field('sectors_title');
$sectors_items = get_field('sectors_items');
?>

<section class="pfl-sec">
	<div class="pfl-sec__bg"></div>
	<div class="pfl-sec__inner __inner">
		<?php if ($sectors_eyebrow): ?>
			<div class="highlight__eyebrow" data-aos="fade-up"><?php echo esc_html($sectors_eyebrow); ?></div>
		<?php endif; ?>
		
		<?php if ($sectors_title): ?>
			<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
				<?php echo wp_kses_post($sectors_title); ?>
			</h2>
		<?php endif; ?>
		
		<?php if ($sectors_items): ?>
			<div class="pfl-sec__grid">
				<?php 
				$delay = 100;
				foreach ($sectors_items as $sector): 
					$image = $sector['sector_image'];
				?>
					<div class="pfl-sec__card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
						<?php if ($image): ?>
							<div class="pfl-sec__card-img" style="background-image:url('<?php echo esc_url($image['url']); ?>')"></div>
						<?php endif; ?>
						<div class="pfl-sec__card-ov"></div>
						<div class="pfl-sec__card-info">
							<?php if (!empty($sector['sector_title'])): ?>
								<h4><?php echo esc_html($sector['sector_title']); ?></h4>
							<?php endif; ?>
							<?php if (!empty($sector['sector_description'])): ?>
								<span><?php echo esc_html($sector['sector_description']); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php 
				$delay += 100;
				endforeach; 
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
