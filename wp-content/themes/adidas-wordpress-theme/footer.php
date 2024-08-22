<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adidas_wordpress_theme
 */

?>

	<footer id="colophon" class="site-footer">
		<?php
			function get_all_page_names() {
			    $pages = get_pages();
			    $page_names = [];

			    foreach ($pages as $page) {
			        $page_names[] = $page->post_title;
			    }
					return $page_names;
			}
			$all_page_names = get_all_page_names();
			// print_r($all_page_names);
			$selected_page_names = [];

			for ($i = 0; $i < 5; $i++) {
			    if (isset($all_page_names[$i])) {
			        $selected_page_names[] = $all_page_names[$i];
			    }
			}$pages_string = implode(' / ', $selected_page_names);

			
		 ?>
		 <div class="container footer-container">
		 	<p class="footer-pages"><?php echo $pages_string; ?></p>

		 	<div class="footer-icons">
		 	<a href="<?php ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/facebook-icon.png" alt="icon"></a>
		 	<a href="<?php ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/twitter-icon.png" alt="icon"></a>
		 	<a href="<?php ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/linkedin-icon.png" alt="icon"></a>
		 	<a href="<?php ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/instagram-icon.png" alt="icon"></a>
		 	</div>

		 	<div class="copy-right">
		 		<?php ?> Copy right @ 2024
		 	</div>
		 	
		 </div> <!-- container -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
