<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

while (have_posts()):
	the_post();

	// Attachment IDs
	$images = get_post_meta(get_the_ID(), '_igmb_image_gallery_id', true);
	?>

	<main id="content" <?php post_class('site-main'); ?>>
		<?php if (apply_filters('hello_elementor_page_title', true)): ?>
			<header class="page-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
		<?php endif; ?>
		<div class="page-content">
			<h1>Discos to see you discos friend</h1>
			<?php the_content(); ?>
			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>
		<div class="page-content">
			<div class="croxo-gallery d-flex flex-wrap column-gap-50">
				<?php
				if ($images) {
					foreach ($images as $image) {
						$attachment = wp_prepare_attachment_for_js($image);
						?>
						<div class="croxo-gallery__gallery-item ratio-square flexone">
							<img class="croxo-gallery__gallery-item__img img-cover" src="<?php echo $attachment['url'] ?>" alt="">
						</div>
						<?php
					}
				}
				?>
				<div class="croxo-gallery__lightbox justify-content-center align-items-center d-none">
					<div class="croxo-gallery__lightbox__close-btn">
						<button class="reset-btn">
							<span class="dashicons dashicons-no"></span>
						</button>
					</div>
					<div class="croxo-gallery__lightbox__img-placeholder"></div>
				</div>
			</div>
		</div>

		<?php comments_template(); ?>

	</main>

	<?php
endwhile;