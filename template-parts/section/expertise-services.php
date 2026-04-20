<?php
/**
 * Template part: Expertise Services Section
 * Uses Relationship field to display selected services from "expertise" post type
 * 
 * @package CanhCamTheme
 */

$services = get_field('services'); // Relationship field

if ( ! $services ) return;

$counter = 0;

foreach ( $services as $post ) : 
	setup_postdata( $post );
	$counter++;
	$is_alt = $counter % 2 === 0;
	
	// Get data from post type defaults
	$service_id = $post->post_name; // Post slug for anchor
	$service_number = str_pad($counter, 2, '0', STR_PAD_LEFT); // Auto number: 01, 02, 03...
	$service_image = get_post_thumbnail_id($post->ID); // Featured image
	$service_title = get_the_title($post->ID); // Post title
	// tách chuỗi để từ cuối cùng bọc trong thẻ <em> để in nghiêng
	$title_parts = explode(' ', $service_title);
	if (count($title_parts) > 1) {
		$last_word = array_pop($title_parts);
		$service_title = implode(' ', $title_parts) . ' <em>' . $last_word . '</em>';
	}
	$service_description = apply_filters('the_content', $post->post_content); // Post content
?>
<section class="expertise-sd <?php echo $is_alt ? 'expertise-sd--alt' : ''; ?>"
	id="<?php echo esc_attr( $service_id ); ?>">
	<div class="expertise-sd__inner __inner">
		<?php if ( $service_image ) : ?>
		<div class="expertise-sd__img" data-aos="fade-up">
			<?php echo get_image_attrachment( $service_image, 'image'); ?>
		</div>
		<?php endif; ?>
		<div class="expertise-sd__txt">
			<?php if ( $service_number ) : ?>
			<div class="highlight__eyebrow blue" data-aos="fade-up"><?php echo esc_html( $service_number ); ?></div>
			<?php endif; ?>
			<?php if ( $service_title ) : ?>
			<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
				<?php echo wp_kses_post( $service_title ); ?>
			</h2>
			<?php endif; ?>
			<?php if ( $service_description ) : ?>
			<div class="expertise-sd__desc" data-aos="fade-up" data-aos-delay="200">
				<?php echo wp_kses_post( $service_description ); ?>
			</div>
			<?php endif; ?>
			<?php if ( have_rows('service_features', $post->ID) ) : ?>
			<div class="expertise-sd__features" data-aos="fade-up" data-aos-delay="300">
				<?php while ( have_rows('service_features', $post->ID) ) : the_row(); 
							$feature_text = get_sub_field('feature_text');
							if ( $feature_text ) :
						?>
				<span class="expertise-sd__feat">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="20 6 9 17 4 12"></polyline>
					</svg><?php echo esc_html( $feature_text ); ?>
				</span>
				<?php endif; endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endforeach; 
wp_reset_postdata(); ?>