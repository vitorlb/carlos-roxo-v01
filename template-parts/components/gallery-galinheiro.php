<?php

/**
 * The template for displaying post gallery
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$custom_post_args = array(
	'post_type' => 'galinheiro_text', // Your custom post type slug
	'posts_per_page' => 1, // Limit to 1 post
);

$custom_query = new WP_Query($custom_post_args);


if ($custom_query->have_posts()) {
	while ($custom_query->have_posts()) {
		$custom_query->the_post();
		$postType = get_post_type();
		$animations = get_post_meta(get_the_ID(), '_animations', true);
		$count = null;
		// Ensure both arrays have the same length 
		if (!!$animations) {
			$count = count($animations);
		}
		$images = get_post_meta(get_the_ID(), '_igmb_image_gallery_id', true);
		$imgs_count = count($images);
?>
		<?php
		?>
		<div class="croxo-gallery croxo-gallery--galinheiro d-flex flex-row row-gap-50 column-gap-50 w-100 <?php if (!$images && !$animations) {
																												echo 'd-none';
																											} ?>">
			<?php
			if ($images || !!$animations) {
				if ($count > 0 && $postType == 'animation') {
					get_template_part('template-parts/components/gallery-video');
				}
				foreach ($images as $image) {
					$attachment = wp_prepare_attachment_for_js($image);
			?>
					<div class="croxo-gallery__gallery-item c-pointer position-relative">
						<img draggable="false" (dragstart)="false;" class="croxo-gallery__gallery-item__img img-cover" src="<?php echo $attachment['url'] ?>" alt="">
						<?php
						if ($imgs_count > 1) {
						?>
							<div class="croxo-gallery__gallery-item__swipe-indicator d-md-none d-flex justify-content-center pb-1 transition-all-550 p-events-none--deep">
								<div class="swipe-indicator__wrapper d-flex justify-content-center align-items-center p-3">
									<span class="material-symbols-outlined">
										swipe
									</span>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				<?php
				}
				if ($count > 0 && $postType != 'animation') {
					get_template_part('template-parts/components/gallery-video');
				}
			} elseif (has_post_thumbnail() && !$animations) {
				?>
				<div class="croxo-gallery__gallery-item c-pointer flexone">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php
			}
			?>
			<div class="croxo-gallery__lightbox fixed-stretch flex-column-reverse flex-md-row justify-content-center align-items-center d-none">
				<div class="croxo-gallery__lightbox__close-btn__wrapper container d-flex justify-content-end pt-5 absolute-stretch">
					<button class="croxo-gallery__lightbox__close-btn__wrapper__btn reset-button align-self-start">
						<span class="material-symbols-outlined theme-color">
							close
						</span>
					</button>
				</div>
				<?php
				if ($imgs_count > 1) {
				?>
					<div class="croxo-gallery__lightbox__nav-btns__wrapper container d-flex align-items-center justify-content-end justify-content-md-between p-events-none absolute-stretch-md pe-4 pe-md-0 mt-2 mt-md-0">
						<div class="croxo-gallery__lightbox__nav-btns__wrapper__btn prev-btn reset-button p-events-all c-pointer">
							<span class="material-symbols-outlined theme-color">
								arrow_back
							</span>
						</div>
						<div class="croxo-gallery__lightbox__nav-btns__wrapper__btn next-btn reset-button p-events-all c-pointer ps-3 ps-md-0">
							<span class="material-symbols-outlined theme-color">
								arrow_forward
							</span>
						</div>
					</div>
				<?php
				}
				?>
				<div class="croxo-gallery__lightbox__img-placeholder">
					<img class="croxo-gallery__lightbox__img-placeholder__img" src="" alt="">
				</div>
			</div>
		</div> <?php
			}
			// Restore original post data
			wp_reset_postdata();
		} else {
			echo 'No posts found.';
		}

//////////////////
