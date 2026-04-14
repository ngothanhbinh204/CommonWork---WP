<?php
/**
 * About Mission & Vision Section
 * 2 cards: Mission và Vision với icons, eyebrow, title, description
 * 
 * ACF Fields:
 * - mv_cards (repeater) - Mission & Vision cards (usually 2 items)
 *   - icon_svg (textarea) - SVG icon code
 *   - eyebrow (text) - Small label above title
 *   - title (wysiwyg) - Card title
 *   - description (wysiwyg) - Card description
 */

$mv_cards = get_field('mv_cards');

if ( ! $mv_cards ) {
	return;
}
?>

<section class="about-mv">
	<div class="about-mv__bg"></div>
	<div class="about-mv__pat"></div>
	<div class="about-mv__inner __inner">
		<?php 
		$delay = 100;
		foreach ( $mv_cards as $card ) : 
			$icon_svg = $card['icon_svg'] ?? '';
			$eyebrow = $card['eyebrow'] ?? '';
			$title = $card['title'] ?? '';
			$description = $card['description'] ?? '';
			
			if ( ! $title && ! $description ) {
				continue;
			}
		?>
			<div class="about-mv__card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<?php if ( $icon_svg ) : ?>
					<div class="about-mv__icon">
						<?php echo $icon_svg; // SVG code, no escaping ?>
					</div>
				<?php endif; ?>
				
				<?php if ( $eyebrow ) : ?>
					<div class="highlight__eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>
				
				<?php if ( $title ) : ?>
					<h3 class="about-mv__card-title">
						<?php echo wp_kses_post( $title ); ?>
					</h3>
				<?php endif; ?>
				
				<?php if ( $description ) : ?>
					<p class="about-mv__card-text">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php 
			$delay += 200;
		endforeach; 
		?>
	</div>
</section>
