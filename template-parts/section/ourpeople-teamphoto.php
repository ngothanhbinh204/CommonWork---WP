<?php
/**
 * Template part: Our People Team Photo Section
 * 
 * @package CanhCamTheme
 */

$team_photo = get_field('team_photo');
$team_eyebrow = get_field('team_eyebrow');
$team_title = get_field('team_title');
$team_paragraphs = get_field('team_paragraphs');

if (!$team_photo && !$team_title) return;
?>

<section class="our-tphoto">
	<div class="our-tphoto__inner __inner">
		<?php if ($team_photo): ?>
		<div class="our-tphoto__img hover-image" data-aos="fade-up" data-parallax data-parallax-y="20">
			<img src="<?php echo get_image_attrachment($team_photo, 'url'); ?>" data-parallax-img alt="">
		</div>
		<?php endif; ?>

		<div class="our-tphoto__txt">
			<?php if ($team_eyebrow): ?>
			<div class="highlight__eyebrow" data-aos="fade-up"><?php echo esc_html($team_eyebrow); ?></div>
			<?php endif; ?>

			<?php if ($team_title): ?>
			<h2 class="title-section" data-aos="fade-up" data-aos-delay="100">
				<?php echo wp_kses_post($team_title); ?>
			</h2>
			<?php endif; ?>

			<?php if ($team_paragraphs && is_array($team_paragraphs)): 
				$delay = 200;
				foreach ($team_paragraphs as $item):
					$paragraph = $item['paragraph'] ?? '';
					if (!$paragraph) continue;
			?>
			<p class="our-tphoto__desc" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
				<?php echo esc_html($paragraph); ?>
			</p>
			<?php 
					$delay += 100;
				endforeach; 
			endif; ?>
		</div>
	</div>
</section>