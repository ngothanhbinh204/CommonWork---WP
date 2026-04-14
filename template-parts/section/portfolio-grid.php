<?php
/**
 * Portfolio Grid Section
 * 
 * @package CanhCamTheme
 */

$grid_eyebrow = get_field('grid_eyebrow');
$grid_title = get_field('grid_title');

// Get all portfolio categories for filter tabs
$categories = get_terms([
    'taxonomy' => 'portfolio_category',
    'hide_empty' => false,
]);

// Get all portfolio posts
$portfolio_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);
$portfolio_query = new WP_Query($portfolio_args);
?>

<main>
	<section class="pfl">
		<div class="pfl__inner __inner">
			<div class="pfl__head" data-aos="fade-up">
				<?php if ($grid_eyebrow): ?>
					<div class="highlight__eyebrow"><?php echo esc_html($grid_eyebrow); ?></div>
				<?php endif; ?>
				
				<?php if ($grid_title): ?>
					<h2 class="title-section"><?php echo wp_kses_post($grid_title); ?></h2>
				<?php endif; ?>
				
				<?php if ($categories && !is_wp_error($categories)): ?>
					<div class="pfl__tabs" role="tablist" aria-label="Filter projects by discipline">
						<button class="pfl__tab is-active" data-f="all" role="tab" aria-selected="true">All Projects</button>
						<?php foreach ($categories as $category): ?>
							<button class="pfl__tab" data-f="<?php echo esc_attr($category->slug); ?>" role="tab" aria-selected="false">
								<?php echo esc_html($category->name); ?>
							</button>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			
			<div class="pfl__spinner" aria-hidden="true" aria-label="Loading projects"><span></span></div>
			
			<div class="pfl__grid">
				<?php if ($portfolio_query->have_posts()): ?>
					<?php 
					$delay = 100;
					while ($portfolio_query->have_posts()): $portfolio_query->the_post(); 
						$thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
						$excerpt = get_the_excerpt();
						$tags = get_field('portfolio_tags');
						$categories_list = get_the_terms(get_the_ID(), 'portfolio_category');
						$category_slug = '';
						if ($categories_list && !is_wp_error($categories_list)) {
							$category_slug = $categories_list[0]->slug;
						}
					?>
						<a class="pfl__card" href="<?php the_permalink(); ?>" data-c="<?php echo esc_attr($category_slug); ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
							<?php if ($thumbnail): ?>
								<div class="pfl__card-img" style="background-image:url('<?php echo esc_url($thumbnail); ?>')"></div>
							<?php endif; ?>
							<div class="pfl__card-ov"></div>
							<div class="pfl__card-shine"></div>
							<span class="pfl__card-view">View Sample Works →</span>
							<div class="pfl__card-info">
								<h4><?php the_title(); ?></h4>
								<?php if ($excerpt): ?>
									<span><?php echo esc_html($excerpt); ?></span>
								<?php endif; ?>
								<?php if ($tags): ?>
									<div class="pfl__card-tags">
										<?php foreach ($tags as $tag): ?>
											<span class="pfl__card-tag"><?php echo esc_html($tag['tag']); ?></span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</a>
					<?php 
					$delay += 100;
					if ($delay > 300) $delay = 100;
					endwhile; 
					wp_reset_postdata();
					?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
