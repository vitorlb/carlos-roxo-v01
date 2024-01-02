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
	<main class="croxo-galinheiro--main-wrapper">
		<div class="croxo-galinheiro--main-wrapper__events-list container">
			<div id="croxoEventsFuture" class="croxo-galinheiro--main-wrapper__events-list__future">
				<h1 class="theme-color">Upcoming events!</h1>
				<?php events_list(true) ?>
			</div>
			<div id="croxoEventsFuture" class="croxo-galinheiro--main-wrapper__events-list__past">
				<h1 class="theme-color">Past events</h1>
				<?php events_list(false) ?>
			</div>
		</div>
	</main>
<?php
endwhile;
