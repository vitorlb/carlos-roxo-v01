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
?>
	<main class="croxo-galinheiro--main-wrapper d-flex flex-column container">
		<div class="croxo-galinheiro--main-wrapper__header">
			<div class="
						croxo-galinheiro--main-wrapper__events-list__future__title-container
						d-flex
						justify-content-between">
				<h1 class="theme-color croxo-font-text">Upcoming events!</h1>
				<h5 class="croxo-galinheiro--main-wrapper__events-list__future__title-container__slide-to-past theme-color croxo-font-text align-items-center d-flex">
					<span>Slide to past events</span>
					<span class="material-symbols-outlined d-block ps-1 tilt-b-5">keyboard_double_arrow_down </span>
				</h5>
			</div>
		</div>
		<div class="croxo-galinheiro--main-wrapper__list--wrapper d-flex">
			<div class="croxo-galinheiro--main-wrapper__list--wrapper__list-container flexthree">
				<div id="croxoEventsFuture" class="croxo-galinheiro--main-wrapper__events-list__future">
					<?php events_list(true) ?>
				</div>
				<div id="croxoEventsPast" class="croxo-galinheiro--main-wrapper__events-list__past mt-lg-5">
					<h1 class="theme-color croxo-font-text">Past events</h1>
					<?php events_list(false) ?>
				</div>
			</div>
			<div class="croxo-galinheiro--main-wrapper__img-container flexone">
				<img src="http://localhost/carlosroxo.com/wp-content/uploads/2023/11/Screenshot-2023-11-26-172410.png" alt="">
			</div>
		</div>
	</main>
<?php
endwhile;
