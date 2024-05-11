<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

setup_postdata($post);
$post_id = get_the_ID();
$custom_date = get_post_meta($post_id, '_custom_date', true);
$today_date = date('Y-m-d');
$time =  ($custom_date > $today_date) ? true : false;
$permalink = get_permalink();
$excerpt = get_the_excerpt();
$images = get_post_meta(get_the_ID(), '_igmb_image_gallery_id', true);
$event_thumbnail = null;
if (!!empty($images) || has_post_thumbnail()) {
	$event_thumbnail = !empty($images) ? wp_prepare_attachment_for_js($images[0])['url'] : get_the_post_thumbnail_url();
}
?> 
<li class="croxo-events-list-item d-flex flex-column col-12 col-sm-6 col-md-4 col-xxl-3"
	<?php if(!!$event_thumbnail) { ?>
		thumb-path="<?php echo $event_thumbnail; ?>"
	<?php } ?>
>
	<div class="croxo-events-list-item__calendar-wrapper">
		<?php get_template_part('template-parts/components/calendar-item') ?>
	</div>
	<div class="disco_title__text-container d-flex flexone flex-column mt-3">
		<h2 class="disco_title__paragraph croxo-font-text">
			<a class="reset-link" href="<?= $permalink ?>">
				<span><?php the_title() ?><br></span>
			</a>
		</h2>
		<?php if (!empty($excerpt)) { ?>
			<span class="disco_title__excerpt croxo-font-text">
				<?php echo $excerpt; ?>
			</span>
		<?php } ?>
		<div class="disco_title__actions-container d-flex pt-2">
			<?php if (!!$time) {
			?>
				<a class="disco_title__actions-container__apply-link reset-link d-flex align-items-center c-pointer">
					<span class="disco_title__actions-container__apply-link__icon material-symbols-outlined tilt-b-2  theme-color">hand_gesture</span>
					<span class="disco_title__actions-container__apply-link__span croxo-font-text ps-1  theme-color">apply!</span>
				</a>
			<?php } ?>
			<a href="<?php echo $permalink; ?>" class="disco_title__actions-container__post-link reset-link d-flex align-items-center c-pointer">
				<span class="disco_title__actions-container__post-link__icon material-symbols-outlined theme-color">mystery</span>
				<span class="disco_title__actions-container__post-link__span croxo-font-text ps-1 theme-color">See more</span>
			</a>
		</div>
	</div>
</li>