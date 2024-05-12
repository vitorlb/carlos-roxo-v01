<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$post_id = get_the_ID();

// Check if the checkbox is checked
$checkbox_value = get_post_meta($post_id, '_show_contact_form_checkbox', true);

if ($checkbox_value === '1') { 
?>
    <div class="contact-form-cta theme-color--deep d-flex align-items-center pb-3 c-pointer">
        <span class="contact-form-cta__icon d-block material-symbols-outlined me-2">
            package_2
        </span>
        <span class="contact-form-cta__text d-block tilt-t-1 croxo-font-text croxo-underline-hover">Request an order</span>
    </div>
    <div id="croxoContactForm" class="croxo-contact-form__main-wrapper d-none">
        <?php echo do_shortcode('[contact-form-7 id="ca7d930" title="Contact form 1"]'); ?>
    </div>
<?php }
