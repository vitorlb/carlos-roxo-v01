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
<main class="croxo-galinheiro--main-wrapper d-flex flex-column container">
	<div class="croxo-galinheiro--main-wrapper__header">
		<?php if (!is_home()) {
		?> 
			<div class="header__main-info d-flex align-items-center mb-5 mt-4 column-gap-10">
				<div class="header__icon d-flex justify-content-end">
					<span class="croxo-icons croxo-iconslava_logo-01-mirror croxo-text-giant-sm"></span>
				</div>
				<div class="header__text croxo-font-text--deep text-center">
					<?php get_template_part('template-parts/components/galinheiro-header-text'); ?>
				</div>
				<div class="header__icon d-flex">
					<span class="croxo-icons croxo-iconslava_logo-01 croxo-text-giant-sm"></span>
				</div>
			</div>
		<?php
		} ?>
		<div class="
						croxo-galinheiro--main-wrapper__events-list__future__title-container
						d-flex
						justify-content-between
						<?php if (is_home()) { ?> mt-4 <?php } ?>
						">
			<h1 class="theme-color croxo-font-text">Upcoming events!</h1>
			<?php if (!is_home()) { ?>
				<h5 class="croxo-galinheiro--main-wrapper__events-list__future__title-container__slide-to-past theme-color croxo-font-text align-items-center d-flex c-pointer">
					<span>Slide to past events</span>
					<span class="material-symbols-outlined d-block ps-1 tilt-b-5">keyboard_double_arrow_down </span>
				</h5>
			<?php } ?>
		</div>
	</div>
	<div class="croxo-galinheiro--main-wrapper__list--wrapper d-flex">
		<div class="croxo-galinheiro--main-wrapper__list--wrapper__list-container flexthree">
			<div id="croxoEventsFuture" class="croxo-galinheiro--main-wrapper__events-list__future">
				<?php events_list(true) ?>
			</div>
			<?php if (!is_home()) { ?>
				<div id="croxoEventsPast" class="croxo-galinheiro--main-wrapper__events-list__past mt-lg-5">
					<h1 class="theme-color croxo-font-text">Past events</h1>
					<?php events_list(false) ?>
				</div>
			<?php } ?>
		</div>
		<div class="croxo-galinheiro--main-wrapper__img-container d-none d-lg-block pt-4 flexone">
			<div class="croxo-galinheiro--main-wrapper__img-container__wrapper d-none anim-popin anim-350 anim-forwards sticky-top border-theme-color">
				<img src="" alt="">
			</div>
		</div>
	</div>
	<div id="croxoEventForm" class="croxo-event-form__main-wrapper d-none">
		<?php echo do_shortcode('[contact-form-7 id="760bea4" title="Contact form 1"]'); ?>
	</div>
</main>
<?php
