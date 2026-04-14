<?php
/**
 * Template Part: Sectors Section
 * 
 * Portfolio sectors grid with background images
 * 
 * ACF Fields:
 * - sectors_eyebrow (Text)
 * - sectors_title (WYSIWYG)
 * - sectors_items (Relationship to sector post type)
 *   Uses: Featured Image, Post Title, Post Excerpt
 */

$eyebrow = get_field('sectors_eyebrow');
$title = get_field('sectors_title');
$sectors = get_field('sectors_items'); // Relationship field
?>

<section class="section-sectors" id="sectors">
	<div class="section-sectors__bg"></div>
	<div class="section-sectors__pattern"></div>

	<div class="section-sectors__inner">
		<div class="section-sectors__head rv" data-aos="fade-up" data-aos-duration="900">
			<?php if ($eyebrow): ?>
			<div class="highlight__eyebrow"><?php echo esc_html($eyebrow); ?></div>
			<?php endif; ?>

			<?php if ($title): ?>
			<div class="section-sectors__title"><?php echo wp_kses_post($title); ?></div>
			<?php endif; ?>
		</div>

		<?php if ($sectors && is_array($sectors)): ?>
		<div class="section-sectors__grid">
			<?php 
				$index = 0;
				foreach ($sectors as $post): 
					setup_postdata($post);
					$sector_title = get_the_title();
					$sector_excerpt = get_the_excerpt();
					$thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
					$delay_class = ($index > 0) ? 'd' . $index : '';
				?>
			<div class="section-sectors__card rv <?php echo esc_attr($delay_class); ?>"
				<?php if ($thumbnail): ?>style="background:url('<?php echo esc_url($thumbnail); ?>') center/cover"
				<?php endif; ?> data-aos="fade-up" data-aos-duration="800"
				<?php if ($index > 0): ?>data-aos-delay="<?php echo esc_attr($index * 100); ?>" <?php endif; ?>>
				<div class="section-sectors__overlay"></div>
				<div class="section-sectors__shimmer"></div>
				<div class="section-sectors__content">
					<?php if ($sector_title): ?>
					<h4><?php echo esc_html($sector_title); ?></h4>
					<?php endif; ?>

					<?php if ($sector_excerpt): ?>
					<span><?php echo esc_html($sector_excerpt); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php 
				$index++;
				endforeach; 
				wp_reset_postdata();
				?>
		</div>
		<?php endif; ?>
	</div>
</section>