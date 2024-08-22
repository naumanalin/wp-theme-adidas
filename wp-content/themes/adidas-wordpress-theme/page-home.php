<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adidas_wordpress_theme
 */

get_header();
?>
<section id="logo-bar">
    <div class="container">
        <div id="datafetch"></div>
    </div> 
</section>

<section id="hero-section">
	<?php require get_template_directory(). '/inc/hero-slider.php'; ?>
</section> <!-- Hero Section -->

<!-- main section two parts part-1(supports, post, zig-zag) part-2(events) -->
    
<section id="main-page">
	<div class="container flex parent-container">
		<div class="w-70 child-container" >

			<!-- cpt slider -->
		<?php require get_template_directory() . '/inc/cpt-slider.php'; ?>

        <!-- last 3 posts -->

        <?php
                $last_three_posts = get_option('public');
                $args_post = array(
                'posts_per_page' => 3,
                'post__in'       => $last_three_posts,
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
                'ignore_sticky_posts' => 1, // Exclude sticky posts, error resolved 
                );

                $query_posts = new WP_Query($args_post);
                echo "<div class=\"last-post-wrapper flex\">";

                if ($query_posts->have_posts()) :
                while ($query_posts->have_posts()) : $query_posts->the_post();
                ?>
                        <div class="post-item">
                                <div class="latest-post-thumbnail">
                                        <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                        </a>
                                        <?php endif; ?>
                                </div>
                                <div class="the-title">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="the-description">
                                        <?php     // Display the excerpt limited to 15 words
				    $excerpt = get_the_excerpt();
				    echo wp_trim_words($excerpt, 35, '...'); 
					?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn-read-more">READ MORE</a>
                        </div>
                <?php
                endwhile;
                wp_reset_postdata();
                endif;
                ?>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" target="_blank" class="see-all">See All</a>


                </div> <!-- last-post-wrapper -->
        

			<!-- sticky post zig_zag section -->
			<?php require get_template_directory() . '/inc/zigzag-posts.php'; ?>

		</div> <!-- parent-container -->

		<!-- events -->
        <?php require get_template_directory() . '/inc/event-section.php'; ?>

	
</section>
<!-- cat / get in touch section  -->
<section id="contact-form">
	<div class="container flex parent-container">
	<div class="w-70 child-container form-parent-container">
                <form  class="contact-form" id="formContactUs">
                        <h2 class="t-center t-white">GET IN TOUCH WITH US</h2>
                        <div class="form-group flex"> <!-- name/email  -->
                                <div class="form-item">
                                        <label for="name">NAME</label> <br>
                                        <input type="text" id="name" class="form-input" name="name" placeholder="enter name">
                                </div>
                                 <div class="form-item">
                                        <label for="email">EMAIL</label> <br>
                                        <input type="email" id="email" class="form-input" name="email" placeholder="enter email">
                                </div>

                        </div> 

                        <div class="form-group flex"> <!-- country/state  -->
                                <div class="form-item">
                                <label for="country">COUNTRY</label> <br>
                                <select id="country" class="form-input" name="country">
                                    <!-- Asia -->
                                    <optgroup label="Asia">
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Japan">Japan</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Philippines">Philippines</option>
                                    </optgroup>
                                    
                                    <!-- Africa -->
                                    <optgroup label="Africa">
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Algeria">Algeria</option>
                                    </optgroup>

                                    <!-- North America -->
                                    <optgroup label="North America">
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Jamaica">Jamaica</option>
                                    </optgroup>

                                    <!-- South America -->
                                    <optgroup label="South America">
                                        <option value="Brazil">Brazil</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Chile">Chile</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Uruguay">Uruguay</option>
                                    </optgroup>

                                    <!-- Europe -->
                                    <optgroup label="Europe">
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Switzerland">Switzerland</option>
                                    </optgroup>

                                    <!-- Australia/Oceania -->
                                    <optgroup label="Australia/Oceania">
                                        <option value="Australia">Australia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                    </optgroup>

                                    <!-- Antarctica -->
                                    <optgroup label="Antarctica">
                                        <!-- No countries in Antarctica but you can list countries that have research stations -->
                                        <option value="Argentina">Argentina</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Chile">Chile</option>
                                        <option value="France">France</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </optgroup>
                                </select>

                                </div>
                                 <div class="form-item">
                                        <label for="state">STATE</label> <br>
                                        <input type="text" id="state" class="form-input" name="state" placeholder="enter state">
                                </div>

                        </div>  <!-- country/state  -->

                        <div class="radio-group flex"> <!-- gender radio buttons -->
                            <div class="form-item ">
                                <label>GENDER</label> <br>
                                <div class="flex">
                                <!-- Male Radio Button -->
                                <input type="radio" id="gender-male" name="gender" value="male">
                                <label for="gender-male">Male</label> <br>
                                
                                <!-- Female Radio Button -->
                                <input type="radio" id="gender-female" name="gender" value="female">
                                <label for="gender-female">Female</label> <br>
                                
                                <!-- Other Radio Button -->
                                <input type="radio" id="gender-other" name="gender" value="other">
                                <label for="gender-other">Other</label>
                                </div> <br>
                            </div>
                        </div> <!-- gender radio buttons -->

                        <div class="message-field-group"><!-- message field -->
                                <label for="message">MESSAGE</label>
                                <textarea id="message" name="message"></textarea>
                        </div>

                        <div class="flex submit-btn-container">
                        <input type="submit" name="submit-form" value="SUBMIT" id="submit-btn">
                        </div>

                </form>
		
	</div>

	<!-- empty div for perfect layout -->
	<div class="w-30 empty-div">	
	</div>

	</div>
       
</section>

<script>
$(document).ready(function() {
    $('#formContactUs').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: my_ajax_obj.ajaxurl, // Use the localized ajaxurl
            type: 'POST',
            data: {
                action: 'contact_us', // The action hook specified in PHP
                contact_us: formData
            },
            success: function(response) {
                if (response.success) {
                    alert('Your message sends successfully.');
                    $('#formContactUs')[0].reset();
                } else {
                    alert('Failed to your message. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred while processing your request.');
            }
        });
    });
});


</script>


<?php
get_footer();