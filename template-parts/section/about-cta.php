<?php
/**
 * About CTA Section
 * Final call-to-action section với title, description, button
 * 
 * ACF Fields:
 * - cta_title (wysiwyg) - CTA title
 * - cta_description (wysiwyg) - CTA description
 * - cta_button (link) - CTA button link
 */

$cta_title = get_field('cta_title');
$cta_description = get_field('cta_description');
$cta_button = get_field('cta_button');

if ( ! $cta_title && ! $cta_description && ! $cta_button ) {
	return;
}
?>

<section class="about-cta">
	<div class="about-cta__bg"></div>
	<div class="about-cta__inner __inner" data-aos="fade-up">
		<?php if ( $cta_title ) : ?>
			<h2 class="about-cta__title" data-aos="fade-up" data-aos-duration="800">
				<?php echo wp_kses_post( $cta_title ); ?>
			</h2>
		<?php endif; ?>
		
		<?php if ( $cta_description ) : ?>
			<p class="about-cta__desc" data-aos="fade-up" data-aos-duration="800">
				<?php echo wp_kses_post( $cta_description ); ?>
			</p>
		<?php endif; ?>
		
		<?php if ( $cta_button && ! empty( $cta_button['url'] ) ) : ?>
			<div class="about-cta__btns" data-aos="fade-up" data-aos-duration="800">
				<a class="btn btn-secondary" 
				   href="<?php echo esc_url( $cta_button['url'] ); ?>"
				   <?php echo ( ! empty( $cta_button['target'] ) ) ? 'target="' . esc_attr( $cta_button['target'] ) . '"' : ''; ?>>
					<?php echo esc_html( $cta_button['title'] ?: 'Start a Conversation' ); ?>
					<span class="btn-hero__arrow">→</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
