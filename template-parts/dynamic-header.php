<?php

/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!hello_get_header_display()) {
	return;
}

$logo_svg_path = get_stylesheet_directory() . '/imgs/titulo_site_1_plain.svg';
$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$header_nav_menu = wp_nav_menu([
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
]);
?>
<header id="site-header" class="site-header dynamic-header pb-0 pb-md-3 <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="container px-sm-0">
		<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
			<?php
			if ($site_name) : ?>
				<h1 class="site-title d-flex <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" class="reset-link d-flex flexone theme-color--fill--deep listen-theme-color justify-content-center" rel="home">
						<span class="croxo-icons <?php if (is_page('galinheiro-criativo')) { ?> croxo-iconsgalinhierocriativo-title <?php } else { ?> croxo-iconstitulo_site_2 <?php } ?> pt-4 pb-md-3 transparent"></span>
					</a>
				</h1>
			<?php endif;  ?>
		</div>
		<?php if (!is_home() && !is_page('work')) {
			if ($header_nav_menu) :
		?>
			<div class="croxo-work-filters--main-nav d-flex justify-content-center mt-4 mt-md-0 mb-4 mb-md-0">
				<nav class="site-navigation site-navigation--main-nav">
					<div class="post-type-filter__main-nav ">
						<?php
						echo $header_nav_menu;
						?>
					</div>
				</nav>
			</div>
		<?php
			endif;
		} ?>

		<?php if ($header_nav_menu) : ?>
			<div class="site-navigation--scroll">
				<div class="container d-flex align-items-center">
					<a href="<?php echo get_home_url(); ?>" class="reset-link">
						<span class="croxo-iconsfavicon croxo-icons pe-4 theme-color listen-theme-color"></span>
					</a>
					<nav class="site-navigation croxo-font-text--deep align-self-stretch <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
						<?php
						echo $header_nav_menu;
						?>
						<?php
						$custom_post_args = array(
							'post_type' => 'about_text', // Your custom post type slug
							'posts_per_page' => 1, // Limit to 1 post
						);

						$custom_query = new WP_Query($custom_post_args);

						if ($custom_query->have_posts()) {
							while ($custom_query->have_posts()) {
								$custom_query->the_post();
						?>
								<li id="croxoAboutMenuItem" class="menu-item menu-item-object-page menu-item--about d-flex flex-column align-items-end position-relative">
									<div class="menu-item--about__wrapper absolute-stretch transition-all-650 d-flex flex-column">
										<span class="menu-item--about__title align-self-stretch"><?php the_title(); ?></span>
										<div class="menu-item--about__text croxo-color-transparent croxo-background-transparent--deep--imporant p-events-none--deep transition-all-650 p-3 pt-4">
											<?php the_content(); ?>
										</div>
									</div>
								</li>
						<?php
							}
							// Restore original post data
							wp_reset_postdata();
						} else {
							echo 'No posts found.';
						}
						?>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	</div>
</header>