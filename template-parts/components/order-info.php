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
    // Checkbox is checked, do something
?>
    <div class="contact-form-cta theme-color--deep d-flex align-items-center">
        <span class="material-symbols-outlined">
            package_2
        </span>
        <span>Request and order</span>
    </div>
<?php }
