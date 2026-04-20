<?php
/**
 * Portfolio Detail Projects Section
 *
 * ACF Repeater field: 'projects'
 *   project_number      – text (optional, auto-increments if empty)
 *   project_title       – text
 *   project_description – textarea
 *   project_pdf         – file  (Return Format: "File URL" recommended)
 *                         Also handles "File Array" return for backward-compat.
 *
 * CORS note:
 *   When the page and the PDF file are on the same WordPress domain, CORS is not
 *   an issue. If you use a CDN / offload plugin (e.g. WP Offload Media) that
 *   serves uploads from a different subdomain, add the header in functions.php:
 *
 *     add_filter('upload_dir', function($dirs) { return $dirs; });
 *     add_action('send_headers', function() {
 *         header('Access-Control-Allow-Origin: ' . get_site_url());
 *     });
 *
 * @package CanhCamTheme
 */

/**
 * Safely extract a URL from an ACF File field.
 * Handles both "File URL" (string) and "File Array" return formats.
 *
 * @param  string|array|null $field  Raw ACF field value.
 * @return string  Escaped URL, or empty string.
 */
function pj_get_pdf_url( $field ): string {
	if ( empty( $field ) ) {
		return '';
	}
	if ( is_array( $field ) ) {
		// Return Format = "File Array"
		return esc_url( $field['url'] ?? '' );
	}
	// Return Format = "File URL"
	return esc_url( (string) $field );
}

$projects = get_field( 'projects' );

// Enqueue PDF.js CDN for this template (version pinned to match package.json).
// WordPress will output this script in wp_footer() before main.min.js that contains Porfolio.js.
if ( function_exists( 'wp_enqueue_script' ) ) {
	wp_enqueue_script(
		'pdfjs-cdn',
		'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js',
		[], // no deps
		'3.11.174',
		true // in footer, before main.min.js if main.min.js lists 'pdfjs-cdn' as dep
	);
}
?>

<main>
	<?php if ($projects): ?>
	<?php 
		$section_number = 1;
		foreach ($projects as $project):
			$project_number = !empty($project['project_number']) ? $project['project_number'] : sprintf('%02d', $section_number);
			$is_alt         = ($section_number % 2 === 0) ? ' pj-detail--alt' : '';
			$pdf_url        = pj_get_pdf_url( $project['project_pdf'] ?? '' );
		?>
	<section class="pj-detail<?php echo $is_alt; ?>" data-section="<?php echo esc_attr($project_number); ?>">
		<div class="pj-detail__inner __inner">
			<div class="pj-detail__info" data-aos="fade-right">
				<div class="highlight__eyebrow blue"><?php echo esc_html($project_number); ?></div>
				<?php if (!empty($project['project_title'])): ?>
				<h2 class="title-section"><?php echo esc_html($project['project_title']); ?></h2>
				<?php endif; ?>
				<?php if (!empty($project['project_description'])): ?>
				<p class="pj-detail__desc"><?php echo wp_kses_post($project['project_description']); ?></p>
				<?php endif; ?>
			</div>

			<?php if ($pdf_url): ?>
			<div class="pj-detail__viewer" data-pdf="<?php echo $pdf_url; ?>" data-aos="fade-left" data-aos-delay="100">
				<div class="pj-detail__canvas-wrap">
					<canvas></canvas>
					<div class="pj-detail__loading">
						<span class="pj-detail__spin"></span>&nbsp;Loading PDF&hellip;
					</div>
					<div class="pj-detail__error">
						<i class="fa-regular fa-triangle-exclamation pj-detail__err-icon"></i>PDF could not be
						loaded.&nbsp;<code><?php echo $pdf_url; ?></code>
					</div>
				</div>
				<div class="pj-detail__controls">
					<button class="pj-detail__btn pj-detail__btn--prev" type="button" aria-label="Previous page"
						title="Previous page">
						<i class="fa-regular fa-chevron-left"></i>
					</button>
					<span class="pj-detail__page">
						Page&nbsp;<span class="pj-detail__cur">1</span>&nbsp;/&nbsp;<span
							class="pj-detail__tot">&mdash;</span>
					</span>
					<button class="pj-detail__btn pj-detail__btn--next" type="button" aria-label="Next page"
						title="Next page">
						<i class="fa-regular fa-chevron-right"></i>
					</button>
					<button class="pj-detail__btn pj-detail__btn--fs" type="button" aria-label="View fullscreen"
						title="View fullscreen">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<polyline points="15 3 21 3 21 9"></polyline>
							<polyline points="9 21 3 21 3 15"></polyline>
							<line x1="21" y1="3" x2="14" y2="10"></line>
							<line x1="3" y1="21" x2="10" y2="14"></line>
						</svg>
					</button>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php 
		$section_number++;
		endforeach; 
		?>
	<?php endif; ?>

	<!-- Fullscreen PDF Overlay -->
	<div class="pj-detail__ov" id="pjOv" aria-hidden="true" aria-modal="true" role="dialog"
		aria-label="Fullscreen PDF viewer">
		<button class="pj-detail__ov-x" id="pjX" type="button" aria-label="Close fullscreen">
			<i class="fa-regular fa-xmark"></i>
		</button>
		<canvas id="fsC"></canvas>
		<div class="pj-detail__ov-bar">
			<button class="pj-detail__btn" id="fsP" type="button" aria-label="Previous page">
				<i class="fa-regular fa-chevron-left"></i>
			</button>
			<span class="pj-detail__ov-pg">
				Page&nbsp;<span id="fsCur">1</span>&nbsp;/&nbsp;<span id="fsTot">&mdash;</span>
			</span>
			<button class="pj-detail__btn" id="fsN" type="button" aria-label="Next page">
				<i class="fa-regular fa-chevron-right"></i>
			</button>
		</div>
	</div>
</main>