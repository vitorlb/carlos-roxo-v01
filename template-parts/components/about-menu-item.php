<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$custom_post_args = array(
    'post_type' => 'about_text', // Your custom post type slug
    'posts_per_page' => 1, // Limit to 1 post
);

$custom_query = new WP_Query($custom_post_args);

if ($custom_query->have_posts()) {
    while ($custom_query->have_posts()) {
        $custom_query->the_post();
?>
        <span class="menu-item--about__title align-self-stretch"><?php the_title(); ?></span>
        <div class="d-none menu-item--about__text croxo-color-transparent croxo-background-transparent--deep--imporant p-events-none--deep transition-all-650 p-3 pt-4">
            <?php the_content(); ?>
        </div>
        </li>
<?php
    }
    // Restore original post data
    wp_reset_postdata();
} else {
    echo 'No posts found.';
}
