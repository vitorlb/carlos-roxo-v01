<?php

/**
 * The template for displaying post gallery
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<div class="croxo-gallery d-flex flex-column flex-wrap row-gap-50 column-gap-50">
	<?php
	$images = get_post_meta(get_the_ID(), '_igmb_image_gallery_id', true);
	if ($images) {
		foreach ($images as $image) {
			$attachment = wp_prepare_attachment_for_js($image);
	?>
			<div class="croxo-gallery__gallery-item c-pointer ratio-square flexone">
				<img class="croxo-gallery__gallery-item__img img-cover" src="<?php echo $attachment['url'] ?>" alt="">
			</div>
	<?php
		}
	}
	?>
	<div class="croxo-gallery__lightbox fixed-stretch justify-content-center align-items-center d-none">
		<div class="croxo-gallery__lightbox__close-btn__wrapper container d-flex justify-content-end pt-5 absolute-stretch">
			<button class="croxo-gallery__lightbox__close-btn__wrapper__btn reset-button align-self-start">
				<span class="material-symbols-outlined theme-color">
					close
				</span>
			</button>
		</div>
		<div class="croxo-gallery__lightbox__nav-btns__wrapper container d-flex align-items-center justify-content-between p-events-none absolute-stretch">
			<div class="croxo-gallery__lightbox__nav-btns__wrapper__btn prev-btn reset-button p-events-all c-pointer">
				<span class="material-symbols-outlined theme-color">
					arrow_back
				</span>
			</div>
			<div class="croxo-gallery__lightbox__nav-btns__wrapper__btn next-btn reset-button p-events-all c-pointer">
				<span class="material-symbols-outlined theme-color">
					arrow_forward
				</span>
			</div>
		</div>
		<div class="croxo-gallery__lightbox__img-placeholder">
			<img class="croxo-gallery__lightbox__img-placeholder__img" src="" alt="">
		</div>
	</div>
</div>