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

<section class="pfl-sec bg-dark">
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
				foreach ($sectors_items as $post): 
					setup_postdata($post);
					$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
				?>
			<div class="pfl-sec__card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
				<?php if ($thumbnail_url): ?>
				<div class="pfl-sec__card-img" style="background-image:url('<?php echo esc_url($thumbnail_url); ?>')">
				</div>
				<?php endif; ?>
				<div class="pfl-sec__card-ov"></div>
				<div class="pfl-sec__card-info">
					<h4><?php echo esc_html(get_the_title()); ?></h4>
					<?php if (get_the_excerpt()): ?>
					<span><?php echo esc_html(get_the_excerpt()); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php 
				$delay += 100;
				endforeach; 
				wp_reset_postdata();
				?>
		</div>
		<?php endif; ?>
	</div>
</section>