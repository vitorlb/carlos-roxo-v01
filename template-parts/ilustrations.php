<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

while (have_posts()) :
	the_post();

	// Attachment IDs
	$images = get_post_meta(get_the_ID(), '_igmb_image_gallery_id', true);
	$postTitle = trim(get_the_title());
?>
	<main id="content" class="container px-md-0">  
		<div class="croxo-custom-post-type croxo-custom-post-type--illustrations d-flex flex-column flex-md-row">
			<div class="page-content flextwo pt-md-4 d-flex flex-row flex-md-column">
				<?php get_template_part('template-parts/components/gallery'); ?>
			</div>
			<div class="croxo-custom-post-type__header flexone ps-md-4">
			<?php get_template_part('template-parts/components/cpt-header-descr'); ?>
			</div>
			<?php comments_template(); ?>
		</div>
	</main>
<?php
endwhile;
