<?php
/**
 * About Story Section
 * Story section với image, established year badge, eyebrow, title và multiple paragraphs
 * 
 * ACF Fields:
 * - story_image (image) - Main story image
 * - story_badge (text) - Established year badge (e.g., "Est. 2017")
 * - story_eyebrow (text) - Small text above title
 * - story_title (wysiwyg) - Story title
 * - story_paragraphs (repeater)
 *   - paragraph (wysiwyg) - Content paragraph
 */

$story_image = get_field('story_image');
$story_badge = get_field('established_badge');
$story_eyebrow = get_field('eyebrow_text');
$story_title = get_field('story_title');
$story_paragraphs = get_field('story_paragraphs');

if ( ! $story_image && ! $story_title && ! $story_paragraphs ) {
	return;
}
?>

<section class="about-story">
	<div class="about-story__inner __inner">
		<?php if ( $story_image ) : ?>
		<div class="about-story__img" data-aos="fade-right" data-aos-duration="900">
			<?php 
				echo get_image_attrachment( $story_image['ID'], 'full', '', '' ); 
				?>

			<?php if ( $story_badge ) : ?>
			<div class="about-story__img-badge"><?php echo esc_html( $story_badge ); ?></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="about-story__text">
			<?php if ( $story_eyebrow ) : ?>
			<div class="highlight__eyebrow" data-aos="fade-up">
				<?php echo esc_html( $story_eyebrow ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $story_title ) : ?>
			<p class="about-story__title" data-aos="fade-up" data-aos-delay="100">
				<?php echo wp_kses_post( $story_title ); ?>
			</p>
			<?php endif; ?>

			<?php if ( $story_paragraphs ) : ?>
			<?php 
				$delay = 200;
				foreach ( $story_paragraphs as $para ) : 
					if ( ! empty( $para['paragraph'] ) ) :
				?>
			<p class="about-story__body" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<?php echo wp_kses_post( $para['paragraph'] ); ?>
			</p>
			<?php 
					$delay += 100;
					endif;
				endforeach; 
				?>
			<?php endif; ?>
		</div>
	</div>
</section>