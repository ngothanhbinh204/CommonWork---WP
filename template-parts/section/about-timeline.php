<?php
/**
 * About Timeline Section
 * Timeline/Journey milestones với year, title, description
 * 
 * ACF Fields:
 * - timeline_eyebrow (text) - Section eyebrow
 * - timeline_eyebrow_class (text) - CSS class for eyebrow (e.g., "blue")
 * - timeline_title (wysiwyg) - Section title
 * - timeline_items (repeater) - Timeline items
 *   - year (text) - Year (e.g., "2017")
 *   - title (text) - Milestone title
 *   - description (wysiwyg) - Milestone description
 */

$timeline_eyebrow = get_field('timeline_eyebrow');
$timeline_eyebrow_class = get_field('timeline_eyebrow_class');
$timeline_title = get_field('timeline_title');
$timeline_items = get_field('timeline_items');

if ( ! $timeline_items ) {
	return;
}
?>

<section class="about-timeline">
	<div class="about-timeline__inner __inner">
		<div class="about-timeline__head" data-aos="fade-up">
			<?php if ( $timeline_eyebrow ) : ?>
			<div class="highlight__eyebrow <?php echo esc_attr( $timeline_eyebrow_class ); ?>">
				<?php echo esc_html( $timeline_eyebrow ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $timeline_title ) : ?>
			<div class="title-section">
				<?php echo wp_kses_post( $timeline_title ); ?>
			</div>
			<?php endif; ?>
		</div>

		<?php 
		$delay = 0;
		foreach ( $timeline_items as $item ) : 
			$year = $item['date'] ?? '';
			$title = $item['title'] ?? '';
			$description = $item['description'] ?? '';
			
			if ( ! $year && ! $title ) {
				continue;
			}
		?>
		<div class="about-tl-item" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
			<?php if ( $year ) : ?>
			<div class="about-tl-item__year"><span><?php echo esc_html( $year ); ?></span></div>
			<?php endif; ?>

			<div class="about-tl-item__line"></div>

			<div class="about-tl-item__content">
				<?php if ( $title ) : ?>
				<h4 class="about-tl-item__title"><?php echo esc_html( $title ); ?></h4>
				<?php endif; ?>

				<?php if ( $description ) : ?>
				<div class="about-tl-item__text">
					<?php echo wp_kses_post( $description ); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php 
			$delay += 80;
		endforeach; 
		?>
	</div>
</section>