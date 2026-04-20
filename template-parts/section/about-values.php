<?php
/**
 * About Core Values Section
 * Grid of core values cards với số thứ tự, title, description
 * 
 * ACF Fields:
 * - values_eyebrow (text) - Section eyebrow
 * - values_title (wysiwyg) - Section title
 * - values_items (repeater) - Value cards (usually 6 items)
 *   - title (text) - Value title
 *   - description (wysiwyg) - Value description
 */

$values_eyebrow = get_field('values_eyebrow');
$values_title = get_field('values_title');
$values_items = get_field('values_items');

if ( ! $values_items ) {
	return;
}
?>

<section class="about-vals">
	<div class="about-vals__inner __inner">
		<div class="about-vals__head" data-aos="fade-up">
			<?php if ( $values_eyebrow ) : ?>
			<div class="highlight__eyebrow blue"><?php echo esc_html( $values_eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $values_title ) : ?>
			<div class="title-section">
				<?php echo wp_kses_post( $values_title ); ?>
			</div>
			<?php endif; ?>
		</div>

		<div class="about-vals__grid">
			<?php 
			$index = 1;
			$delay = 0;
			foreach ( $values_items as $item ) : 
				$title = $item['title'] ?? '';
				$description = $item['description'] ?? '';
				
				if ( ! $title ) {
					continue;
				}
				
				// Reset delay every 3 items (for grid layout)
				if ( $index > 1 && ( $index - 1 ) % 3 === 0 ) {
					$delay = 0;
				}
			?>
			<div class="about-val-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<div class="about-val-card__num"><?php echo str_pad( $index, 2, '0', STR_PAD_LEFT ); ?></div>

				<h3 class="about-val-card__title"><?php echo esc_html( $title ); ?></h3>

				<?php if ( $description ) : ?>
				<div class="about-val-card__text">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php 
				$index++;
				$delay += 100;
			endforeach; 
			?>
		</div>
	</div>
</section>