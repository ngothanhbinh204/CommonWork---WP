<?php
/**
 * Template Part: Intro Section
 * 
 * Single paragraph introduction section
 * 
 * ACF Fields:
 * - intro_text (WYSIWYG)
 */

$intro_text = get_field('intro_text');

if (!$intro_text) return;
?>

<section class="section-intro">
	<div class="section-intro__text rv" data-aos="fade-up" data-aos-duration="1000">
		<?php echo wp_kses_post($intro_text); ?>
	</div>
</section>
