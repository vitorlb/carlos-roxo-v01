<?php
$custom_post_args = array(
    'post_type' => 'galinheiro_text', // Your custom post type slug
    'posts_per_page' => 1, // Limit to 1 post
);

$custom_query = new WP_Query($custom_post_args);

if ($custom_query->have_posts()) {
    while ($custom_query->have_posts()) {
        $custom_query->the_post();
?>
            <?php the_content(); ?>
<?php
    }
    // Restore original post data
    wp_reset_postdata();
} else {
    echo 'No posts found.';
}
