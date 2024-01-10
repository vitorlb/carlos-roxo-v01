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
?>

<li class="croxo-events-list-item d-flex"> <?php if (has_post_thumbnail()) { ?>
		<div class="d-none croxo-events-list-item__thumb-wrapper">
			<a href="<?= $permalink ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php } ?>
		<div class="croxo-events-list-item__calendar-wrapper">
			<?php get_template_part('template-parts/components/calendar-item') ?>
		</div>
		<div class="disco_title__text-container d-flex flexone flex-column tilt-t-lg-6">
			<h2 class="disco_title__paragraph croxo-font-text px-2">
				<a class="reset-link" href="<?= $permalink ?>">
					<span><?php the_title() ?><br></span>
				</a>
			</h2>
			<?php if (!empty($excerpt)) { ?>
				<span class="disco_title__excerpt croxo-font-text px-2">
					<?php echo $excerpt; ?>
				</span>
			<?php } ?>
			<div class="disco_title__actions-container d-flex px-2 pt-2">
				<a class="disco_title__actions-container__apply-link reset-link d-flex align-items-center">
					<span class="disco_title__actions-container__apply-link__icon material-symbols-outlined tilt-b-2  theme-color">hand_gesture</span>
					<span class="disco_title__actions-container__apply-link__span croxo-font-text ps-1  theme-color">apply!</span>
				</a>
				<a href="<?php echo $permalink; ?>" class="disco_title__actions-container__post-link reset-link d-flex align-items-center">
					<span class="disco_title__actions-container__post-link__icon material-symbols-outlined theme-color">mystery</span>
					<span class="disco_title__actions-container__post-link__span croxo-font-text ps-1 theme-color">See more</span>
				</a>
				<?php if (!!$time) {
				?>
				<?php
				} ?>
			</div>
		</div>
</li>