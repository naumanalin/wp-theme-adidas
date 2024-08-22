<?php
// Query for custom post type 'support'
$args = array(
    'posts_per_page' => -1, // -1 to display all posts
    'post_type'      => 'support',  // Custom post type name
    'post_status'    => 'publish',
    'orderby'        => 'post_type',
    'order'          => 'ASC'
);

$support = get_posts($args);

// Check if there are any posts
if ($support) {
    echo "<div class=\"custom_slider_2\">";
    foreach ($support as $post_slider) :
        setup_postdata($post_slider);
        
        // Retrieve taxonomy terms for the post
        $taxonomy = 'supportname'; // Ensure this is the correct taxonomy name
        $terms = get_the_terms($post_slider->ID, $taxonomy);
        
        // Prepare taxonomy term display
            $term_names = wp_list_pluck($terms, 'name');
            $taxonomy_terms = implode(', ', $term_names);

        ?>
        <div class="slider-post-wraper">
            <div class="post-thumbnail">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_slider->ID, 'full')); ?>" alt="img">
            </div>
            <div class="post-title">
                <h4>
                    <a href="<?php echo esc_url(get_permalink($post_slider->ID)); ?>" class="a-post-title">
                       <?php echo esc_html($taxonomy_terms); ?>
                    </a>
                </h4>
            </div>
        </div>
        <?php
    endforeach;
    wp_reset_postdata();
    echo "</div>";
    echo "<hr />";
}
?>

