<?php

/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$is_elementor_theme_exist = function_exists('elementor_theme_do_location');
?>
<?php 
if (
	(is_singular($post_types = 'clothing'))
	|| (is_singular($post_types = 'ceramics'))
	|| (is_singular($post_types = 'ilustrations'))
	|| (is_singular($post_types = 'graphic_design')) 
	|| (is_singular($post_types = 'animation'))
	) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('ilustrations')) {
		get_template_part('template-parts/ilustrations');
	}
}  elseif (is_singular($post_types = 'post')) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('ilustrations')) {
		get_template_part('template-parts/event');
	}
} elseif (is_page('work')) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('single')) { ?>
		<div class="discos-grelha container px-sm-0">
			<?php grelha_discos(); ?>
		</div>
	<?php }
} elseif (is_page('galinheiro-criativo')) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('single')) {
		get_template_part('template-parts/galinheiro');
	}
} elseif (is_page('about')) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('single')) {
		get_template_part('template-parts/event');
	}
} elseif (is_singular()) {
	if (!$is_elementor_theme_exist || !elementor_theme_do_location('single')) {
		get_template_part('template-parts/single');
	}
} elseif (is_home()) {
?>
	<div class="discos-grelha container px-sm-0">
		<?php grelha_discos(); ?>
	</div>
	
	<?php get_template_part('template-parts/galinheiro'); } elseif (is_archive()) {
			if (!$is_elementor_theme_exist || !elementor_theme_do_location('archive')) {
				get_template_part('template-parts/archive');
			}
		} elseif (is_search()) {
			if (!$is_elementor_theme_exist || !elementor_theme_do_location('archive')) {
				get_template_part('template-parts/search');
			}
		} else {
			if (!$is_elementor_theme_exist || !elementor_theme_do_location('single')) {
				get_template_part('template-parts/404');
			}
		}
		get_footer();
