<?php
/**
 * Template part: Our People Leadership Section
 * 
 * @package CanhCamTheme
 */

$leadership_eyebrow = get_field('leadership_eyebrow');
$leadership_title = get_field('leadership_title');
$leadership_description = get_field('leadership_description');
$leadership_members = get_field('leadership_members');

if (!$leadership_members) return;
?>

<section class="our-lead">
	<div class="our-lead__inner __inner">
		<div class="our-lead__head" data-aos="fade-up">
			<?php if ($leadership_eyebrow): ?>
				<div class="highlight__eyebrow"><?php echo esc_html($leadership_eyebrow); ?></div>
			<?php endif; ?>
			
			<?php if ($leadership_title): ?>
				<h2 class="title-section" data-text-ripple><?php echo wp_kses_post($leadership_title); ?></h2>
			<?php endif; ?>
			
			<?php if ($leadership_description): ?>
				<p class="our-lead__desc"><?php echo esc_html($leadership_description); ?></p>
			<?php endif; ?>
		</div>
		
		<div class="our-lead__grid">
			<?php 
			$delay = 100;
			foreach ($leadership_members as $member):
				$photo = $member['photo'] ?? '';
				$name = $member['name'] ?? '';
				$role = $member['role'] ?? '';
				$bio = $member['bio'] ?? '';
			?>
				<div class="our-lead__card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
					<?php if ($photo): ?>
						<div class="our-lead__card-img">
							<?php echo get_image_attrachment($photo, 'full'); ?>
						</div>
					<?php endif; ?>
					
					<div class="our-lead__card-body">
						<?php if ($name): ?>
							<h3><?php echo esc_html($name); ?></h3>
						<?php endif; ?>
						
						<?php if ($role): ?>
							<span class="our-lead__role"><?php echo esc_html($role); ?></span>
						<?php endif; ?>
						
						<?php if ($bio): ?>
							<p><?php echo esc_html($bio); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php 
				$delay += 100;
			endforeach; 
			?>
		</div>
	</div>
</section>
