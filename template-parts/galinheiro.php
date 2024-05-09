<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<main class="croxo-galinheiro--main-wrapper <?php if (!!is_home() || is_page('galinheiro-criativo')) { ?> croxo-galinheiro--main-wrapper--home <?php } ?>  d-flex flex-column container px-sm-0">
	<div class="croxo-galinheiro--main-wrapper__header">
		<?php if (!is_home()) {
		?>
			<div class="header__main-info d-flex flex-column-reverse flex-md-row align-items-center mb-5 mt-md-4 column-gap-10">
				<div class="header__icon d-flex justify-content-end pt-2 pt-md-0">
					<span class="croxo-icons croxo-iconslava_logo-01-mirror croxo-text-giant-sm"></span>
				</div>
				<div class="header__text croxo-font-text--deep text-center">
					<?php get_template_part('template-parts/components/galinheiro-header-text'); ?>
				</div>
				<div class="header__icon d-none d-md-flex">
					<span class="croxo-icons croxo-iconslava_logo-01 croxo-text-giant-sm"></span>
				</div>
			</div>
		<?php
			get_template_part('template-parts/components/gallery-galinheiro');
		} ?>
		<div class="
						croxo-galinheiro--main-wrapper__events-list__future__title-container
						d-flex
						flex-column
						flex-md-row 
						justify-content-start
						justify-content-md-between mt-5
						">
			<h1 class="theme-color-black croxo-font-text croxo-text-title px-4 py-1 border-theme-black font-size-17 text-center text-md-left">Upcoming events!</h1>
			<?php if (!is_home()) { ?>
				<h5 class="croxo-galinheiro--main-wrapper__events-list__future__title-container__slide-to-past events-list-slide-to theme-color croxo-font-text align-items-center d-flex justify-content-end justify-content-MD-start c-pointer">
					<span>Slide to past events</span>
					<span class="material-symbols-outlined d-block ps-1 tilt-b-5">keyboard_double_arrow_down </span>
				</h5>
			<?php } ?>
		</div>
	</div>
	<div class="croxo-galinheiro--main-wrapper__list--wrapper d-flex">
		<div class="croxo-galinheiro--main-wrapper__list--wrapper__list-container flexone">
			<div id="croxoEventsFuture" class="croxo-galinheiro--main-wrapper__events-list__future">
				<?php events_list(true) ?>
			</div>
			<?php if (!is_home()) { ?>
				<div id="croxoEventsPast" class="croxo-galinheiro--main-wrapper__events-list__past mt-5">
					<h1 class="theme-color-black croxo-font-text croxo-text-title px-4 py-1 border-theme-black font-size-17 text-center text-md-left">Past events</h1>
					<?php events_list(false) ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<div id="croxoEventForm" class="croxo-event-form__main-wrapper d-none">
		<?php echo do_shortcode('[contact-form-7 id="760bea4" title="Contact form 1"]'); ?>
	</div>
</main>
<?php
