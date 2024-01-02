<?php

/**
 * The template for displaying post text content
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$args = array(
    'post_type' => array('post'),
    'post_status' => 'future', // Retrieve posts scheduled for the future
    'order' => 'ASC', // Order them in ascending order based on their scheduled date
    // Add other parameters as needed
);

$future_posts_query = new WP_Query($args);

if ($future_posts_query->have_posts()) {
    while ($future_posts_query->have_posts()) {
        $future_posts_query->the_post();
        // Output your post content here
        ?>
        <div class="future-post">
            <h2><?php the_title(); ?></h2>
            <h3>perma</h3>
            <h3><?php the_permalink() ?></h3>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            <!-- You can display other post details as needed -->
        </div>
        <?php
    }
    wp_reset_postdata();
} else {
    echo 'No future posts found.';
}