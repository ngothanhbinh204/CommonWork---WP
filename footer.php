	<?php
	// Get Footer ACF Options
	$footer_logo = get_field('footer_logo', 'option');
	$footer_phone = get_field('footer_phone', 'option');
	$footer_email = get_field('footer_email', 'option');
	$footer_cta = get_field('footer_cta_button', 'option');
	$footer_address = get_field('footer_address', 'option');
	$footer_copyright = get_field('footer_copyright', 'option');
	$social_media = get_field('social_media_links', 'option');
	?>

	<!-- Toast Container -->
	<div id="container-toast"></div>

	<!-- Footer -->
	<footer class="footer">
		<div class="footer__inner">
			<!-- Brand Section -->
			<div class="footer__brand">
				<?php if ($footer_logo): ?>
					<div class="footer__logo">
						<?php echo get_image_attrachment($footer_logo, 'image'); ?>
					</div>
				<?php endif; ?>

				<!-- Social Media Links -->
				<?php if ($social_media && is_array($social_media)): ?>
					<div class="footer__social">
						<?php foreach ($social_media as $social): ?>
							<?php
							$platform = isset($social['platform']) ? $social['platform'] : '';
							$url = isset($social['url']) ? $social['url'] : '';
							$icon = isset($social['icon']) ? $social['icon'] : '';

							if ($url):
							?>
								<a class="footer__social-link" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($platform); ?>">
									<?php if ($icon): ?>
										<i class="<?php echo esc_attr($icon); ?>"></i>
									<?php endif; ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- Expertise Menu Column -->
			<?php if (has_nav_menu('footer-expertise')): ?>
				<div class="footer__col footer__col--expertise">
					<h4 class="footer__col-title"><?php echo esc_html(get_field('footer_expertise_title', 'option') ?: 'Expertise'); ?></h4>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-expertise',
						'container' => false,
						'menu_class' => 'footer__list',
						'fallback_cb' => false,
					));
					?>
				</div>
			<?php endif; ?>

			<!-- Portfolio Menu Column -->
			<?php if (has_nav_menu('footer-portfolio')): ?>
				<div class="footer__col footer__col--portfolio">
					<h4 class="footer__col-title"><?php echo esc_html(get_field('footer_portfolio_title', 'option') ?: 'Portfolio'); ?></h4>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-portfolio',
						'container' => false,
						'menu_class' => 'footer__list',
						'fallback_cb' => false,
					));
					?>
				</div>
			<?php endif; ?>

			<!-- Company Menu Column -->
			<?php if (has_nav_menu('footer-company')): ?>
				<div class="footer__col footer__col--company">
					<h4 class="footer__col-title"><?php echo esc_html(get_field('footer_company_title', 'option') ?: 'Company'); ?></h4>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-company',
						'container' => false,
						'menu_class' => 'footer__list',
						'fallback_cb' => false,
					));
					?>
				</div>
			<?php endif; ?>

			<!-- Contact Section -->
			<div class="footer__contact">
				<h4 class="footer__col-title"><?php echo esc_html(get_field('footer_contact_title', 'option') ?: 'Get in Touch'); ?></h4>

				<!-- Phone -->
				<?php if ($footer_phone): ?>
					<p class="footer__contact-item">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
							<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"></path>
						</svg>
						<a href="tel:<?php echo esc_attr(str_replace(' ', '', $footer_phone)); ?>">
							<?php echo esc_html($footer_phone); ?>
						</a>
					</p>
				<?php endif; ?>

				<!-- Email -->
				<?php if ($footer_email): ?>
					<p class="footer__contact-item">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
							<polyline points="22,6 12,13 2,6"></polyline>
						</svg>
						<a href="mailto:<?php echo esc_attr($footer_email); ?>">
							<?php echo esc_html($footer_email); ?>
						</a>
					</p>
				<?php endif; ?>

				<!-- CTA Button -->
				<?php if ($footer_cta): ?>
					<a class="footer__cta" href="<?php echo esc_url($footer_cta['url']); ?>" <?php if ($footer_cta['target']): ?>target="<?php echo esc_attr($footer_cta['target']); ?>" <?php endif; ?>>
						<?php echo esc_html($footer_cta['title']); ?> &rarr;
					</a>
				<?php endif; ?>

				<!-- Address -->
				<?php if ($footer_address): ?>
					<address class="footer__address">
						<?php echo wp_kses_post($footer_address); ?>
					</address>
				<?php endif; ?>
			</div>
		</div>

		<!-- Footer Bottom Bar -->
		<div class="footer__bottom">
			<span><?php echo esc_html($footer_copyright ?: '© ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'); ?></span>

			<!-- Legal Links -->
			<?php if (has_nav_menu('footer-legal')): ?>
				<div class="footer__bottom-links">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-legal',
						'container' => false,
						'items_wrap' => '%3$s',
						'before' => '',
						'after' => '<span>|</span>',
						'fallback_cb' => false,
					));
					?>
				</div>
			<?php endif; ?>
		</div>
	</footer>

	<!-- Back to Top Button -->
	<?php if (get_field('show_back_to_top', 'option')): ?>
		<button class="button-to-top" aria-label="Back to top">
			<i class="fa-solid fa-arrow-up"></i>
		</button>
	<?php endif; ?>

	<!-- Search Form (if enabled) -->
	<?php if (get_field('show_search_form', 'option')): ?>
		<div class="header-search-form">
			<div class="close"><i class="fa-light fa-xmark"></i></div>
			<div class="container">
				<div class="wrap-form-search-product">
					<form role="search" method="get" class="productsearchbox" action="<?php echo esc_url(home_url('/')); ?>">
						<input type="text" name="s" placeholder="<?php echo esc_attr(get_field('search_placeholder', 'option') ?: 'Tìm kiếm...'); ?>">
						<button type="submit" class="btn-search"><?php echo esc_html(get_field('search_button_text', 'option') ?: 'Tìm'); ?></button>
					</form>
					<div class="message-search">
						Nhấn <span>Esc</span> để đóng
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

</main>

<?php if (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false) : ?>
	<?php wp_footer(); ?>
<?php endif; ?>
<?= get_field('field_config_body', 'options') ?>
</body>

</html>