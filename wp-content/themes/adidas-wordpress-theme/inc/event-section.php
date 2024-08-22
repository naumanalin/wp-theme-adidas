<?php
  $args_post = array(
      'posts_per_page' => 4,
      'post_type'      => 'event',
      'orderby'        => 'date',
      'order'          => 'ASC',
  );

  $query_posts = new WP_Query($args_post);	
?>


    <aside class="w-30 aside">
        <div class="events-widget">
          <h3 class="title"><a href="<?php the_permalink(); ?>" class="t-white event-a"> events</a></h3>
          
          <ul class="events">
          <?php if ($query_posts->have_posts()) : 
                while ($query_posts->have_posts()) : $query_posts->the_post();

                   $taxonomy = 'location'; 
                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                  // Prepare taxonomy term display
                  $term_names = wp_list_pluck($terms, 'name');
                  $taxonomy_terms = implode(', ', $term_names);
           ?>
            <li>
              <span class="numbering"></span>
              <div class="detail">
                <h3><a href="<?php the_permalink(); ?>" class="t-white event-a">
                <?php the_title(); ?> </a></h3>
                <p class="t-white">
                  <?php echo esc_html($taxonomy_terms); 
                        echo "<br />";
                        echo get_post_meta(get_the_ID(), 'time', true);
                        echo "<br />";
                        echo get_post_meta(get_the_ID(), 'date', true);
                   ?>            
                </p>
              </div>
            </li>
          <?php 
                endwhile;
                wp_reset_postdata();
                endif;
         ?>
          </ul>
          </div>
		</aside>