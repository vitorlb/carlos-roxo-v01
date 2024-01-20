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
<header id="site-header" class="site-header dynamic-header <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="container px-0">
		<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
			<?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ($site_name && ('logo' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<h1 class="site-title d-flex <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" class="reset-link d-flex flexone theme-color--fill--deep listen-theme-color" rel="home">
						<span class="croxo-icons croxo-iconstitulo_site_1 pt-4 pb-3"></span>
					</a>
				</h1>
			<?php endif;

			if ($tagline && (hello_elementor_get_setting('hello_header_tagline_display') || $is_editor)) : ?>
				<p class="site-description <?php echo esc_attr(hello_show_or_hide('hello_header_tagline_display')); ?>">
					<?php echo esc_html($tagline); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ($header_nav_menu) : ?>
			<nav class="site-navigation croxo-font-text--deep <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
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
			<div class="site-navigation-toggle-holder <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<div class="site-navigation-toggle" role="button" tabindex="0">
					<i class="eicon-menu-bar" aria-hidden="true"></i>
					<span class="screen-reader-text"><?php echo esc_html__('Menu', 'hello-elementor'); ?></span>
				</div>
			</div>
			<nav class="site-navigation-dropdown <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif; ?>
		<?php if ($header_nav_menu) : ?>
			<div class="site-navigation--scroll pt-1 pb-1">
				<div class="container d-flex align-items-center">
					<span class="croxo-iconsfavicon croxo-icons theme-color pe-4"></span>
					<nav class="site-navigation croxo-font-text--deep <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
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