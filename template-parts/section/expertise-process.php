<?php
/**
 * Template part: Expertise Process Section
 * 
 * @package CanhCamTheme
 */

$process_eyebrow = get_field('process_eyebrow');
$process_title = get_field('process_title');

if ( ! $process_title && ! have_rows('process_steps') ) return;
?>

<section class="expertise-proc section-py">
	<div class="expertise-proc__inner __inner">
		<div class="expertise-proc__head" data-aos="fade-up">
			<?php if ( $process_eyebrow ) : ?>
			<div class="highlight__eyebrow blue">
				<?php echo esc_html( $process_eyebrow ); ?>
			</div>
			<?php endif; ?>
			<?php if ( $process_title ) : ?>
			<h2 class="title-section">
				<?php echo wp_kses_post( $process_title ); ?>
			</h2>
			<?php endif; ?>
		</div>
		<?php if ( have_rows('process_steps') ) : ?>
		<div class="expertise-proc__steps">
			<?php 
				$step_counter = 0;
				while ( have_rows('process_steps') ) : the_row(); 
					$step_counter++;
					$step_title = get_sub_field('step_title');
					$step_description = get_sub_field('step_description');
					
					$delay = ($step_counter - 1) * 100;
				?>
			<div class="expertise-proc__step" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<div class="expertise-proc__num"><?php echo esc_html( $step_counter ); ?></div>
				<?php if ( $step_title ) : ?>
				<h4><?php echo esc_html( $step_title ); ?></h4>
				<?php endif; ?>
				<?php if ( $step_description ) : ?>
				<p><?php echo esc_html( $step_description ); ?></p>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>