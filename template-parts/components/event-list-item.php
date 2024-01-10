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

<li class="croxo--events-list__list__list-item"> <?php if (has_post_thumbnail()) { ?>
		<div class="croxo--events-list__list__list-item__thumb-wrapper">
			<a href="<?= $permalink ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php } else {
	?>
		<div class="disco_thumb croxo--events-list__list__list-item__thumb-wrapper">
			<p><?php the_title(); ?></p>
		</div>
	<?php } ?>
	<div class="disco_title croxo--events-list__list__list-item__title">
		<div class="disco_title__text-container d-flex flex-column justify-content-end">
			<p class="disco_title__paragraph px-2 pt-2">
				<a href="<?= $permalink ?>">
					<span style="font-size: 1.3rem"><?php the_title() ?><br></span>
				</a>
			</p>
			<?php if (!empty($excerpt)) { ?>
				<span class="disco_title__excerpt px-2">
					<?php echo $excerpt; ?>
				</span>
			<?php } ?>
			<div class="disco_title__actions-container d-flex justify-content-between px-2 pt-2">
				<a href="<?php echo $permalink; ?>" class="disco_title__actions-container__post-link theme-color reset-link d-flex align-items-center">
					<span class="disco_title__actions-container__post-link__icon material-symbols-outlined">mystery</span>
					<span class="disco_title__actions-container__post-link__span ps-1">See more</span>
				</a>
				<?php if (!!$time) {
				?>
					<a class="disco_title__actions-container__apply-link theme-color reset-link d-flex align-items-center">
						<span class="disco_title__actions-container__apply-link__icon material-symbols-outlined tilt-b-2">hand_gesture</span>
						<span class="disco_title__actions-container__apply-link__span ps-1">apply!</span>
					</a>
				<?php
				} ?>
			</div>
		</div>
	</div>
</li>