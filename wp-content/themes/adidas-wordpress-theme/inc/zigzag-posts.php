
<div style="margin: 25px;"></div>
<?php
// Retrieve all sticky posts
$sticky = get_option('sticky_posts');

// Check if there are sticky posts
if (!empty($sticky)) {
    // Get the last two sticky posts
    $sticky = array_slice($sticky, -2);

    $args = array(
        'posts_per_page' => 2,
        'post__in' => $sticky,
        'ignore_sticky_posts' => 1,
        'orderby' => 'post__in' // Maintain the order of posts as in the 'post__in' array
    );

    $query_sticky = new WP_Query($args);

	?> 	
	<div class="flex flex-column"> 
	<?php
	
    if ($query_sticky->have_posts()) :
        $counter_class = 101;
        while ($query_sticky->have_posts()) : $query_sticky->the_post();
?>

		    <div class="sticky-post flex">
                <div class="sticky-content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>
                
                <?php if (has_post_thumbnail()) : ?>
                <div class="sticky-post-thumbnail <?= ++$counter_class;?>">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <?php endif; ?>
            </div>
	



<?php
        endwhile;
        wp_reset_postdata();
    endif;
}
?>
</div>