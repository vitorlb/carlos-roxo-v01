<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (apply_filters('hello_elementor_page_title', true)) : ?>
<div class="ctp-header-wrapper sticky-top">
	<header class="page-header flexone">
		<?php the_title('<h1 class="entry-title theme-color mt-0 croxo-font-text--deep croxo-text-h1-xl listen-theme-color">', '</h1>'); ?>
	</header>
<?php endif; ?>
<div class="page-content flextwo croxo-color-text--deep croxo-font-text d-flex flex-column">
	<?php the_content(); ?>
	<!-- croxo-go-back-btn -->
	<div class="page-content__go-back-wrapper d-flex align-items-center align-self-start tilt-l-2 croxo-underline-hover croxo-go-back-btn">
		<span class="material-symbols-outlined croxo-icon-size-micro">first_page</span>
		<span class="croxo-font-text croxo-text-label ps-1 c-pointer">go back</span>
	</div>
	<div class="post-tags">
		<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
	</div>
	<?php wp_link_pages(); ?>
</div>
</div>