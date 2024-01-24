<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$postType = get_post_type();
?>
<div class="ctp-header-wrapper sticky-top <?php if ($postType == 'post') { ?> d-flex <?php }  ?>">
	<?php if ($postType == 'post') { ?>
		<div class="ctp-header-wrapper__calendar-wrapper flexone mt-3 pe-4">
			<?php get_template_part('template-parts/components/calendar-item') ?>
			<a class="ctp-header-wrapper__calendar-wrapper__apply-link reset-link d-flex align-items-center justify-content-center pt-2">
				<span class="ctp-header-wrapper__calendar-wrapper__apply-link__icon material-symbols-outlined theme-color tilt-b-2">hand_gesture</span>
				<span class="ctp-header-wrapper__calendar-wrapper__apply-link__span ps-1 theme-color">apply!</span>
			</a>
		</div>
		<div class="ctp-header-wrapper__text-info-wrapper flexfour <?php if ($postType == 'post') { ?> pt-2 <?php }  ?>">
		<?php }; ?>
		<header class="page-header flexone">
			<?php the_title('<h1 class="entry-title theme-color mt-0 croxo-font-text--deep croxo-text-h1-xl listen-theme-color">', '</h1>'); ?>
			<?php if ($postType != 'post') {
				get_template_part('template-parts/components/order-info');
			} ?>
		</header>
		<div class="page-content flextwo croxo-font-text d-flex flex-column">
			<?php the_content(); ?>
			<div class="actions-container d-flex justify-content-between">
				<div class="page-content__go-back-wrapper d-flex align-items-center align-self-start tilt-l-2 croxo-underline-hover croxo-go-back-btn">
					<span class="material-symbols-outlined croxo-icon-size-micro">first_page</span>
					<span class="croxo-font-text croxo-text-label ps-1 c-pointer">go back</span>
				</div>

			</div>

			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>
		<?php if ($postType == 'post') {
		?>
			<!-- close div.ctp-header-wrapper__text-info-wrapper -->
		</div>
	<?php
		}; ?>

</div>