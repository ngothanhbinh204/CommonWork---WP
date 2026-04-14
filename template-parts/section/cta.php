<?php
/**
 * Template Part: CTA Section
 * 
 * Final call-to-action section
 * 
 * ACF Fields:
 * - cta_title (WYSIWYG)
 * - cta_subtitle (Text)
 * - cta_primary (Link)
 * - cta_secondary (Link)
 */

$title = get_field('cta_title');
$subtitle = get_field('cta_subtitle');
$primary = get_field('cta_primary');
$secondary = get_field('cta_secondary');
?>

<section class="section-cta" id="contact">
	<div class="section-cta__bg"></div>
	<div class="section-cta__inner rv" data-aos="fade-up" data-aos-duration="1000">
		<?php if ($title): ?>
			<h2 class="section-cta__title"><?php echo wp_kses_post($title); ?></h2>
		<?php endif; ?>
		
		<?php if ($subtitle): ?>
			<p class="section-cta__sub"><?php echo esc_html($subtitle); ?></p>
		<?php endif; ?>
		
		<?php if ($primary || $secondary): ?>
			<div class="section-cta__btns">
				<?php if ($primary && isset($primary['url'])): ?>
					<a class="btn section-cta__btn--primary btn btn-secondary" href="<?php echo esc_url($primary['url']); ?>" target="<?php echo esc_attr($primary['target'] ?: '_self'); ?>">
						<?php echo esc_html($primary['title']); ?> <span>&rarr;</span>
					</a>
				<?php endif; ?>
				
				<?php if ($secondary && isset($secondary['url'])): ?>
					<a class="btn section-cta__btn--ghost btn btn-ghost" href="<?php echo esc_url($secondary['url']); ?>" target="<?php echo esc_attr($secondary['target'] ?: '_self'); ?>">
						<?php echo esc_html($secondary['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
