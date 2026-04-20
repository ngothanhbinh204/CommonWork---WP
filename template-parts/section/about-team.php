<?php
/**
 * About Leadership Team Section
 * Grid of team member cards với photo, name, role, contact info
 * 
 * ACF Fields:
 * - team_eyebrow (text) - Section eyebrow
 * - team_title (wysiwyg) - Section title
 * - team_subtitle (wysiwyg) - Section subtitle/description
 * - team_members (repeater) - Team member cards
 *   - photo (image) - Member photo
 *   - name (text) - Member name
 *   - role (text) - Member role/title
 *   - email (email) - Email address
 *   - phone (text) - Phone number
 */

$team_eyebrow = get_field('team_eyebrow');
$team_title = get_field('team_title');
$team_subtitle = get_field('team_subtitle');
$team_members = get_field('team_members');

if ( ! $team_members ) {
	return;
}
?>

<section class="about-team">
	<div class="about-team__inner __inner">
		<div class="about-team__head" data-aos="fade-up">
			<?php if ( $team_eyebrow ) : ?>
			<div class="highlight__eyebrow blue"><?php echo esc_html( $team_eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $team_title ) : ?>
			<div class="title-section">
				<?php echo wp_kses_post( $team_title ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $team_subtitle ) : ?>
			<div class="about-team__subtitle">
				<?php echo wp_kses_post( $team_subtitle ); ?>
			</div>
			<?php endif; ?>
		</div>

		<div class="about-team__grid">
			<?php 
			$delay = 100;
			foreach ( $team_members as $member ) : 
				$photo = $member['photo'] ?? null;
				$name = $member['name'] ?? '';
				$role = $member['role'] ?? '';
				$email = $member['email'] ?? '';
				$phone = $member['phone'] ?? '';
				
				if ( ! $name && ! $role ) {
					continue;
				}
			?>
			<div class="about-team-card hover-y-effect" data-aos="fade-up"
				data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<?php if ( $photo ) : ?>
				<div class="about-team-card__img">
					<?php echo get_image_attrachment( $photo['ID'], 'image'); ?>
				</div>
				<?php else : ?>
				<div class="about-team-card__img"></div>
				<?php endif; ?>

				<div class="about-team-card__info">
					<?php if ( $name ) : ?>
					<h4 class="about-team-card__name"><?php echo esc_html( $name ); ?></h4>
					<?php endif; ?>

					<?php if ( $role ) : ?>
					<span class="about-team-card__role"><?php echo esc_html( $role ); ?></span>
					<?php endif; ?>

					<?php if ( $email || $phone ) : ?>
					<div class="about-team-card__contact">
						<?php if ( $email ) : ?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<i class="fa-regular fa-envelope"></i> <?php echo esc_html( $email ); ?>
						</a>
						<?php endif; ?>

						<?php if ( $phone ) : ?>
						<a href="tel:<?php echo esc_attr( preg_replace('/\s+/', '', $phone) ); ?>">
							<i class="fa-regular fa-phone"></i> <?php echo esc_html( $phone ); ?>
						</a>
						<?php endif; ?>
					</div>
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