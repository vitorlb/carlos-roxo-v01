<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$postTitle = trim(get_the_title());
$permalink = get_permalink();
wp_localize_script('form-data', 'customFormData', array(
	'postTitle' => $postTitle,
	'permalink' => $permalink,
));
