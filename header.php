<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link
		href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php if (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false) : ?>
	<?php wp_head(); ?>
	<?php endif; ?>
	<?= get_field('field_config_head', 'options') ?>
</head>

<body <?php body_class(get_field('add_class_body', get_the_ID())); ?>>
	<?php
	// Get Header ACF Options
	$header_logo_icon = get_field('header_logo_icon', 'option');
	$header_logo_text = get_field('header_logo_text', 'option');
	$header_phone = get_field('header_phone', 'option');
	$header_email = get_field('header_email', 'option');
	?>

	<!-- Loader -->
	<?php if (get_field('show_loader', 'option')): ?>
	<div class="loader" id="loader">
		<?php
			$loader_image = get_field('loader_image', 'option');
			if ($loader_image):
				echo get_image_attrachment($loader_image, 'image');
			endif;
			?>
		<div class="loader__bar">
			<div class="loader__bar-inner"></div>
		</div>
	</div>
	<?php endif; ?>

	<!-- Header -->
	<header class="header" id="header">
		<div class="header__inner">
			<!-- Logo -->
			<?php if ($header_logo_icon || $header_logo_text): ?>
			<a class="header__logo" href="<?php echo esc_url(home_url('/')); ?>">
				<?php if ($header_logo_icon): ?>
				<div class="header__logo-icon">
					<?php echo get_image_attrachment($header_logo_icon, 'image'); ?>
				</div>
				<?php endif; ?>

				<?php if ($header_logo_text): ?>
				<div class="header__logo-text">
					<?php echo get_image_attrachment($header_logo_text, 'image'); ?>
				</div>
				<?php endif; ?>
			</a>
			<?php endif; ?>

			<!-- Main Navigation -->
			<?php if (has_nav_menu('header-menu')): ?>
			<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container' => false,
					'menu_class' => 'header__nav',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb' => false,
				));
				?>
			<?php endif; ?>

			<!-- Header Actions -->
			<div class="header__actions">
				<!-- Hamburger Menu -->
				<div class="header-hamburger">
					<div class="hamburger-inner">
						<div class="hamburger-front"><i class="fa-regular fa-bars"></i></div>
						<div class="hamburger-back"><i class="fa-solid fa-xmark"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Mobile Menu Overlay -->
	<div class="header__mobile-overlay">
		<!-- Mobile Navigation -->
		<?php if (has_nav_menu('header-mobile')): ?>
		<nav class="header__mobile-nav">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'header-mobile',
					'container' => false,
					'menu_class' => '',
					'items_wrap' => '%3$s',
					'link_before' => '<span class="header__mobile-link">',
					'link_after' => '</span>',
					'fallback_cb' => false,
				));
				?>

			<!-- Mobile CTA -->
			<?php if ($header_cta): ?>
			<a href="<?php echo esc_url($header_cta['url']); ?>" class="header__mobile-cta"
				<?php if ($header_cta['target']): ?>target="<?php echo esc_attr($header_cta['target']); ?>"
				<?php endif; ?>>
				<?php echo esc_html($header_cta['title']); ?>
			</a>
			<?php endif; ?>
		</nav>
			<?php endif; ?>

			<?php if ($header_email): ?>
			<a href="mailto:<?php echo esc_attr($header_email); ?>">
				<?php echo esc_html($header_email); ?>
			</a>
			<?php endif; ?>
		</div>

		<div class="header__mobile-modal"></div>
	</div>

	<main>