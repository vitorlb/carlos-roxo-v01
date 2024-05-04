<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Check if the checkbox is checked
$email_link = get_option('custom_email');
$email_display_text = get_option('custom_email_text');
$instagram_link = get_option('custom_instagram');
$instagram_display_text = get_option('custom_instagram_text');
$is_about = is_page('about');

if (!!$email_link || !!$instagram_link) {
?>

    <p class="d-flex reset-margin column-gap-3">
        <?php if (!!$email_link) { ?>
            <a href="mailto:<?php echo $email_link; ?>" class="reset-link footer-inner__instagram-link d-flex align-items-center <?php if(!!$is_about) echo ''; else echo 'croxo-text-label'; ?> column-gap-1">
                <span class="material-symbols-outlined material-symbols-light theme-color font-size-10">
                    mail
                </span>
                <span class="croxo-underline-hover">
                    <?php echo $email_display_text; ?>
                </span>
            </a>
        <?php } ?>
        <?php if (!!$instagram_link) { ?>
            <a href="<?php echo $instagram_link; ?>" class="reset-link footer-inner__instagram-link d-flex align-items-center <?php if(!!$is_about) echo ''; else echo 'croxo-text-label'; ?> column-gap-1">
                <span class="croxo-icons croxo-iconsinstagram <?php if(!!$is_about) echo ''; else echo 'croxo-text-label-sm'; ?> theme-color"></span>
                <span class="croxo-underline-hover">
                    <?php echo $instagram_display_text; ?>
                </span>
            </a>
        <?php } ?>
        <a href="<?php echo get_site_url(); ?>/privacy-policy/" class="reset-link footer-inner__privacy-policy d-flex align-items-center column-gap-1">
            <span class="croxo-underline-hover">
                privacy policy
            </span>
        </a>
    </p>

<?php
}
