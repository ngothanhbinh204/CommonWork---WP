<?php
/**
 * Template part: Expertise Software & Standards Section
 * 
 * @package CanhCamTheme
 */

$software_eyebrow = get_field('software_eyebrow');
$software_title = get_field('software_title');

if ( ! $software_title && ! have_rows('software_tools') ) return;
?>

<section class="expertise-sw section-py bg-dark">
	<div class="expertise-sw__bg"></div>
	<div class="expertise-sw__inner __inner">
		<?php if ( $software_eyebrow ) : ?>
		<div class="highlight__eyebrow" data-aos="fade-up">
			<?php echo esc_html( $software_eyebrow ); ?>
		</div>
		<?php endif; ?>
		<?php if ( $software_title ) : ?>
		<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
			<?php echo wp_kses_post( $software_title ); ?>
		</h2>
		<?php endif; ?>
		<?php if ( have_rows('software_tools') ) : ?>
		<div class="expertise-sw__grid">
			<?php 
				$delay_counter = 0;
				while ( have_rows('software_tools') ) : the_row(); 
					$tool_svg = get_sub_field('tool_svg');
					$tool_title = get_sub_field('tool_title');
					$tool_description = get_sub_field('tool_description');
					
					$delay = ($delay_counter % 4) * 80;
					$delay_counter++;
				?>
			<div class="expertise-sw__card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<?php if ( $tool_svg ) : ?>
				<div class="expertise-sw__icon">
					<?php echo $tool_svg; // SVG output, already sanitized ?>
				</div>
				<?php endif; ?>
				<?php if ( $tool_title ) : ?>
				<h4><?php echo esc_html( $tool_title ); ?></h4>
				<?php endif; ?>
				<?php if ( $tool_description ) : ?>
				<p><?php echo esc_html( $tool_description ); ?></p>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>