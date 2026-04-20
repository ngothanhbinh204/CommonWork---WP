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
$cta_button_primary = get_field('cta_primary');
$cta_button_secondary = get_field('cta_secondary');

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
		<div class="about-cta__desc" data-aos="fade-up" data-aos-duration="800">
			<?php echo wp_kses_post( $cta_description ); ?>
		</div>
		<?php endif; ?>

		<div class="about-cta__btns" data-aos="fade-up" data-aos-duration="800">
			<?php if ( $cta_button_primary && ! empty( $cta_button_primary['url'] ) ) : ?>
			<a class="btn btn-secondary" href="<?php echo esc_url( $cta_button_primary['url'] ); ?>"
				<?php echo ( ! empty( $cta_button_primary['target'] ) ) ? 'target="' . esc_attr( $cta_button_primary['target'] ) . '"' : ''; ?>>
				<?php echo esc_html( $cta_button_primary['title'] ?: 'Start a Conversation' ); ?>
				<span class="btn-hero__arrow">→</span>
			</a>
			<?php endif; ?>

			<?php if ( $cta_button_secondary && ! empty( $cta_button_secondary['url'] ) ) : ?>
			<a class="btn btn-ghost" href="<?php echo esc_url( $cta_button_secondary['url'] ); ?>"
				<?php echo ( ! empty( $cta_button_secondary['target'] ) ) ? 'target="' . esc_attr( $cta_button_secondary['target'] ) . '"' : ''; ?>>
				<?php echo esc_html( $cta_button_secondary['title'] ?: 'Learn More' ); ?>
			</a>
			<?php endif; ?>
		</div>
	</div>
</section>