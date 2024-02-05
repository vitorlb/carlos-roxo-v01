<?php

/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$footer_class = did_action('elementor/loaded') ? esc_attr(hello_get_footer_layout_class()) : '';
$footer_nav_menu = wp_nav_menu([
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
]);

$email_link = get_option('custom_email');
$email_display_text = get_option('custom_email_text');
$instagram_link = get_option('custom_instagram');
$instagram_display_text = get_option('custom_instagram_text');

?>
<footer id="site-footer" class="site-footer dynamic-footer croxo-footer py-3 mt-5 border-top-theme-color croxo-font-text--deep <?php echo esc_attr($footer_class); ?>" role="contentinfo">
	<div class="container px-0">
		<div class="footer-inner">
			<p class="d-flex reset-margin column-gap-3">
				<?php if (!!$email_link) { ?>
					<a href="mailto:<?php echo $email_link; ?>" class="reset-link footer-inner__instagram-link d-flex align-items-center croxo-text-label column-gap-1">
						<span class="material-symbols-outlined material-symbols-light croxo-text-label theme-color">
							mail
						</span>
						<span class="croxo-underline-hover">
							<?php echo $email_display_text; ?>
						</span>
					</a>
				<?php } ?>
				<?php if (!!$instagram_link) { ?>
					<a href="<?php echo $instagram_link; ?>" class="reset-link footer-inner__instagram-link d-flex align-items-center croxo-text-label column-gap-1">
						<span class="croxo-icons croxo-iconsinstagram croxo-text-label-sm theme-color"></span>
						<span class="croxo-underline-hover">
							<?php echo $instagram_display_text; ?>
						</span>
					</a>
				<?php } ?>
			</p>

			<?php if ('' !== hello_elementor_get_setting('hello_footer_copyright_text') || $is_editor) : ?>
				<div class="copyright d-flex <?php echo esc_attr(hello_show_or_hide('hello_footer_copyright_display')); ?>">
					<p class="croxo-text-label pe-1"><?php echo wp_kses_post(hello_elementor_get_setting('hello_footer_copyright_text')); ?><span class="ps-1">|</span></p>
					<p class="croxo-text-label d-flex column-gap-1 align-items-center"><span>Developed with</span><span class="croxo-icons theme-color croxo-iconsheart2 croxo-text-label-sm"></span><span>by <a href="" class="reset-link"><span class="croxo-underline-hover">Vitor Branco</span></a></span> </p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>