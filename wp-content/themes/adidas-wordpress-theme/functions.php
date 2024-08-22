<?php
/**
 * adidas wordpress theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adidas_wordpress_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adidas_wordpress_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on adidas wordpress theme, use a find and replace
		* to change 'adidas-wordpress-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adidas-wordpress-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'adidas' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'adidas_wordpress_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'adidas_wordpress_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adidas_wordpress_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adidas_wordpress_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'adidas_wordpress_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adidas_wordpress_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adidas-wordpress-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adidas-wordpress-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adidas_wordpress_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adidas_wordpress_theme_scripts() {
	wp_enqueue_style( 'adidas-wordpress-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adidas-wordpress-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adidas-wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// own style sheets
	wp_enqueue_style('main', get_template_directory_uri().'/assets/css/main.css', array());
    wp_enqueue_style('responsive', get_template_directory_uri().'/assets/css/responsive.css', array('main'));

    // own script files
    wp_enqueue_script('custom-script', get_template_directory_uri().'/assets/js/script.js', array('jQuery'), 1.0, true);

    
	//	Fancybox and Jquery CDN
	wp_enqueue_style('fancy-box', get_template_directory_uri().'assets/plugins/jquery.fancybox.min.css', array('jQuery'));
	wp_enqueue_script('jQuery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js');
    wp_enqueue_script('script-file', get_template_directory_uri().'/assets/js/script.js', array('jQuery'), 1.0, true);

	// FancyBox
    wp_enqueue_script('fancy-jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js', 1.0);
    wp_enqueue_style('fancy-stylesheet', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', 1.0);
    wp_enqueue_script('fancy-js', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('fancy-jquery'), '3.5.7', true);
    
    // slick slider cdns
    wp_enqueue_script('slick-main-JS', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jQuery'), '1.8.1', true);
    wp_enqueue_script('slick-JS-1', '//code.jquery.com/jquery-1.11.0.min.js', array('jQuery'), '1.11.0', true);
    wp_enqueue_script('slick-JS-2', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array('jQuery'), '1.2.1', true);
    wp_enqueue_script('slick-JS-3', get_template_directory_uri() . '/assets/slick/slick/slick.min.js', array('jQuery'), '1.8.1', true);

    wp_enqueue_style('slick-main', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array());
    wp_enqueue_style('slick-1', get_template_directory_uri().'/assets/slick/slick/slick.css', array('slick-main'));
    wp_enqueue_style('slick-2', get_template_directory_uri().'/assets/slick/slick/slick-theme.css', array('slick-main'));


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adidas_wordpress_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * custom post types: cpt -> events 
*/

require get_template_directory() . '/inc/cpt-functions.php';

/**
 *	Data base table creation  
*/

function create_contact_form_table() {
    global $wpdb;
    global $table_prefix;
    $table_name = $table_prefix . 'contact_form';

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        message_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        country VARCHAR(100) NOT NULL,
        state VARCHAR(100) NOT NULL,
        gender VARCHAR(10) NOT NULL,
        message TEXT NOT NULL,
        PRIMARY KEY (message_id)
    ) $charset_collate;";

    // Include the file required for database creation
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // Execute the SQL statement
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'create_contact_form_table' );



/**
 * Show messages in admin menu page
*/


 add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles_and_scripts');

function enqueue_custom_admin_styles_and_scripts() {
        // Enqueue DataTables CSS
        wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css', array(), '2.1.3');
        
        // Enqueue DataTables JS
        wp_enqueue_script('datatables-js', 'https://cdn.datatables.net/2.1.3/js/dataTables.js', array('jquery'), '2.1.3', true);
        
        // Optionally, enqueue a custom script to initialize DataTables on your table
        wp_add_inline_script('datatables-js', '
            jQuery(document).ready(function($) {
                $(".display").DataTable();
            });
        ');
    
}
add_action('admin_menu', 'custom_admin_menu');

function custom_admin_menu() {
    // Add the menu page
    add_menu_page(
        'Messages',                   // Page title
        'Messages',                   // Menu title
        'manage_options',             // Capability
        'messages_page',              // Menu slug
        'display_messages_page',      // Callback function
        'dashicons-email-alt',        // Icon URL (Dashicon in this case)
        110                           // Position
    );
}

// Callback function to display the content of the menu page
function display_messages_page() {
    global $wpdb;
    global $table_prefix;
    
    // Define the table name
    $table = $table_prefix . 'contact_form';
    
    // Fetch data from the database
    $sql = "SELECT * FROM $table";
    $result = $wpdb->get_results($sql);
    
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Messages</h1>
        <table  id="myTable" class="display wp-list-table widefat">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Gender</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $list) { ?>
                    <tr>
                        <td><?php echo esc_html($list->message_id); ?></td>
                        <td><?php echo esc_html($list->name); ?></td>
                        <td><a href="mailto:<?= esc_html($list->email); ?>"><?php echo esc_html($list->email); ?> </a></td>
                        <td><?php echo esc_html($list->country); ?></td>
                        <td><?php echo esc_html($list->state); ?></td>
                        <td><?php echo esc_html($list->gender); ?></td>
                        <td><?php echo esc_html($list->message); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php }
    
function enqueue_custom_scripts() {
    // Enqueue jQuery (if not already included)
    wp_enqueue_script('jquery');
    
    // Enqueue your custom script
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true);

    // Localize the script with ajaxurl
    wp_localize_script('custom-script', 'my_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Insert data
add_action('wp_ajax_contact_us', 'ajax_contact_us');
add_action('wp_ajax_nopriv_contact_us', 'ajax_contact_us'); // For non-logged-in users

function ajax_contact_us() {
    // Initialize an empty array to hold the form data
    $arr = [];
    // Parse the serialized form data
    parse_str($_POST['contact_us'], $arr);
    
    // Make sure we have the required fields
    if (empty($arr['name']) || empty($arr['email']) || empty($arr['country']) || empty($arr['state']) || empty($arr['gender']) || empty($arr['message'])) {
        wp_send_json_error('All fields are required.');
        wp_die(); // End the AJAX request
    }

    global $wpdb;
    global $table_prefix;
    $table = $table_prefix . 'contact_form'; 

    // Sanitize the data
    $data = [
        'name'    => sanitize_text_field($arr['name']),
        'email'   => sanitize_email($arr['email']),
        'country' => sanitize_text_field($arr['country']),
        'state'   => sanitize_text_field($arr['state']),
        'gender'  => sanitize_text_field($arr['gender']),
        'message' => sanitize_textarea_field($arr['message'])
    ];

    // Insert the data into the database
    $result = $wpdb->insert($table, $data);

    // Check if the data was inserted successfully
    if ($result !== false) {
        wp_send_json_success('Data Inserted');
    } else {
        wp_send_json_error('Please try again');
    }

    wp_die(); // End the AJAX request
}



// theme options page -----------------------------------------------------------------------------
// Enqueue Admin Scripts and Styles
function my_admin_enqueue_scripts() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('my-custom-admin-js', get_template_directory_uri() . '/assets/js/admin-custom.js', array('jquery', 'wp-color-picker', 'jquery-ui-tabs'), '', true);
    wp_enqueue_style('my-custom-admin-css', get_template_directory_uri() . '/assets/css/admin-custom.css');
}
add_action('admin_enqueue_scripts', 'my_admin_enqueue_scripts');

// Add Theme Options Page
require get_template_directory() . '/inc/theme-options-page.php'; 

function theme_setting_page() {
    add_menu_page(
        __( 'Custom Menu Title', 'textdomain' ),
        'Theme Options',
        'manage_options',
        'theme-setting',
        'theme_options_callback',
        'dashicons-admin-site-alt2',
        115
    );
}
add_action( 'admin_menu', 'theme_setting_page' );

// Theme Options Page Callback
function theme_options_callback() {
    $tab = isset($_GET['tab']) ? $_GET['tab'] : 'notifications';
    ?>
    <div class="wrap">
        <h1><?php _e('Theme Options', 'textdomain'); ?></h1>
        <h2 class="nav-tab-wrapper">
            <a href="?page=theme-setting&tab=notifications" class="nav-tab <?php echo $tab == 'notifications' ? 'nav-tab-active' : ''; ?>"><?php _e('Notifications', 'textdomain'); ?></a>
            <a href="?page=theme-setting&tab=hero_section" class="nav-tab <?php echo $tab == 'hero_section' ? 'nav-tab-active' : ''; ?>"><?php _e('Hero Section', 'textdomain'); ?></a>
            <a href="?page=theme-setting&tab=readme" class="nav-tab <?php echo $tab == 'readme' ? 'nav-tab-active' : ''; ?>"><?php _e('Read Me', 'textdomain'); ?></a>
        </h2>
        <form method="post" action="options.php">
            <?php
            if ($tab == 'notifications') {
                settings_fields( 'theme_notifications_group' );
                do_settings_sections( 'theme-setting-notifications' );
            } elseif ($tab == 'hero_section') {
                settings_fields( 'theme_hero_section_group' );
                do_settings_sections( 'theme-setting-hero_section' );
            } elseif ($tab == 'readme') {
                settings_fields( 'theme_readme_group' );
                do_settings_sections( 'theme-setting-readme' );
            }
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Initialize Theme Settings
function theme_settings_init() {
    // Notifications Tab
    add_settings_section(
        'notifications_section',
        __('Notifications Settings', 'textdomain'),
        null,
        'theme-setting-notifications'
    );

    add_settings_field(
        'notification_text',
        __('Notification Text', 'textdomain'),
        'notification_text_callback',
        'theme-setting-notifications',
        'notifications_section'
    );
    add_settings_field(
        'notification_link',
        __('Notification Link', 'textdomain'),
        'notification_link_callback',
        'theme-setting-notifications',
        'notifications_section'
    );
    add_settings_field(
        'first_button_text',
        __('First Button Text', 'textdomain'),
        'first_button_text_callback',
        'theme-setting-notifications',
        'notifications_section'
    );
    add_settings_field(
        'first_button_link',
        __('First Button Link', 'textdomain'),
        'first_button_link_callback',
        'theme-setting-notifications',
        'notifications_section'
    );
    add_settings_field(
        'second_button_text',
        __('Second Button Text', 'textdomain'),
        'second_button_text_callback',
        'theme-setting-notifications',
        'notifications_section'
    );
    add_settings_field(
        'second_button_link',
        __('Second Button Link', 'textdomain'),
        'second_button_link_callback',
        'theme-setting-notifications',
        'notifications_section'
    );

    register_setting( 'theme_notifications_group', 'notification_text' );
    register_setting( 'theme_notifications_group', 'notification_link' );
    register_setting( 'theme_notifications_group', 'first_button_text' );
    register_setting( 'theme_notifications_group', 'first_button_link' );
    register_setting( 'theme_notifications_group', 'second_button_text' );
    register_setting( 'theme_notifications_group', 'second_button_link' );

    // Hero Section Tab
    add_settings_section(
        'hero_section',
        __('Hero Section Settings', 'textdomain'),
        null,
        'theme-setting-hero_section'
    );

    add_settings_field(
        'hero_background_image',
        __('Hero Background Image', 'textdomain'),
        'hero_background_image_callback',
        'theme-setting-hero_section',
        'hero_section'
    );

    add_settings_field(
        'hero_sliders',
        __('Hero Sliders', 'textdomain'),
        'hero_sliders_callback',
        'theme-setting-hero_section',
        'hero_section'
    );

    register_setting( 'theme_hero_section_group', 'hero_background_image' );
    register_setting( 'theme_hero_section_group', 'hero_sliders' );

    // Read Me Tab
    add_settings_section(
        'readme_section',
        __('Read Me', 'textdomain'),
        null,
        'theme-setting-readme'
    );

    add_settings_field(
        'readme_text',
        __('About Theme', 'textdomain'),
        'readme_text_callback',
        'theme-setting-readme',
        'readme_section'
    );

    register_setting( 'theme_readme_group', 'readme_text' );
}
add_action( 'admin_init', 'theme_settings_init' );

// Callback functions for Notifications Tab
function notification_text_callback() {
    $notification_text = get_option( 'notification_text', '' );
    echo '<input type="text" name="notification_text" value="' . esc_attr( $notification_text ) . '" class="regular-text" />';
}

function notification_link_callback() {
    $notification_link = get_option( 'notification_link', '' );
    echo '<input type="url" name="notification_link" value="' . esc_attr( $notification_link ) . '" class="regular-text" />';
}

function first_button_text_callback() {
    $first_button_text = get_option( 'first_button_text', '' );
    echo '<input type="text" name="first_button_text" value="' . esc_attr( $first_button_text ) . '" class="regular-text" />';
}

function first_button_link_callback() {
    $first_button_link = get_option( 'first_button_link', '' );
    echo '<input type="url" name="first_button_link" value="' . esc_attr( $first_button_link ) . '" class="regular-text" />';
}

function second_button_text_callback() {
    $second_button_text = get_option( 'second_button_text', '' );
    echo '<input type="text" name="second_button_text" value="' . esc_attr( $second_button_text ) . '" class="regular-text" />';
}

function second_button_link_callback() {
    $second_button_link = get_option( 'second_button_link', '' );
    echo '<input type="url" name="second_button_link" value="' . esc_attr( $second_button_link ) . '" class="regular-text" />';
}

// Callback functions for Hero Section Tab
function hero_background_image_callback() {
    $hero_background_image = get_option( 'hero_background_image', '' );
    echo '<input type="text" name="hero_background_image" value="' . esc_attr( $hero_background_image ) . '" class="regular-text" />';
    echo '<p class="description">' . __( 'Enter the URL of the background image.', 'textdomain' ) . '</p>';
}

function hero_sliders_callback() {
    $hero_sliders = get_option( 'hero_sliders', array() );
    
    if( !is_array($hero_sliders) ) {
        $hero_sliders = array();
    }

    echo '<div id="hero-sliders-container">';
    
    foreach ( $hero_sliders as $index => $slider ) {
        echo '<div class="hero-slider-item">';
        echo '<h3>' . __( 'Slide ', 'textdomain' ) . ($index + 1) . '</h3>';
        echo '<input type="text" name="hero_sliders['.$index.'][heading]" value="' . esc_attr( $slider['heading'] ) . '" placeholder="' . __( 'Heading', 'textdomain' ) . '" class="regular-text" />';
        echo '<textarea name="hero_sliders['.$index.'][description]" placeholder="' . __( 'Description', 'textdomain' ) . '" class="large-text">' . esc_textarea( $slider['description'] ) . '</textarea>';
        echo '<input type="text" name="hero_sliders['.$index.'][image]" value="' . esc_attr( $slider['image'] ) . '" placeholder="' . __( 'Image URL', 'textdomain' ) . '" class="regular-text" />';
        echo '<input type="text" name="hero_sliders['.$index.'][video]" value="' . esc_attr( $slider['video'] ) . '" placeholder="' . __( 'YouTube Video URL', 'textdomain' ) . '" class="regular-text" />';
        echo '<a href="#" class="remove-slider">' . __( 'Remove', 'textdomain' ) . '</a>';
        echo '</div><hr>';
    }
    
    echo '</div>';
    echo '<a href="#" id="add-slider">' . __( 'Add Slide', 'textdomain' ) . '</a>';
    
    // JS to handle adding/removing slides
    echo '<script>
    jQuery(document).ready(function($){
        var sliderCount = ' . count( $hero_sliders ) . ';
        
        $("#add-slider").on("click", function(e){
            e.preventDefault();
            sliderCount++;
            $("#hero-sliders-container").append(`
                <div class="hero-slider-item">
                    <h3>' . __( 'Slide ', 'textdomain' ) . '` + sliderCount + `</h3>
                    <input type="text" name="hero_sliders[` + sliderCount + `][heading]" placeholder="' . __( 'Heading', 'textdomain' ) . '" class="regular-text" />
                    <textarea name="hero_sliders[` + sliderCount + `][description]" placeholder="' . __( 'Description', 'textdomain' ) . '" class="large-text"></textarea>
                    <input type="text" name="hero_sliders[` + sliderCount + `][image]" placeholder="' . __( 'Image URL', 'textdomain' ) . '" class="regular-text" />
                    <input type="text" name="hero_sliders[` + sliderCount + `][video]" placeholder="' . __( 'YouTube Video URL', 'textdomain' ) . '" class="regular-text" />
                    <a href="#" class="remove-slider">' . __( 'Remove', 'textdomain' ) . '</a>
                </div><hr>
            `);
        });

        $("body").on("click", ".remove-slider", function(e){
            e.preventDefault();
            $(this).parent().remove();
        });
    });
    </script>';
}

// Callback function for Read Me Tab
function readme_text_callback() {
    $readme_text = get_option( 'readme_text', '' );
    echo '<textarea name="readme_text" class="large-text" rows="10">' . esc_textarea( $readme_text ) . '</textarea>';
    echo '<p class="description">' . __( 'Enter information about the theme and how to use it.', 'textdomain' ) . '</p>';
}






// ----------------- search form --------------------
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) : ?>
    	<style type="text/css">
    		#datafetch {
		    padding: 15px 0;
		}
    		.search-flex {
			    gap: 15px;
			    margin: 15px 0;
			}

			.search-thumbnail  {
			    width: 200px;
			    height: 175px;
			   overflow: hidden !important; 
			}

			.search-thumbnail img {
			    width: 100%;
			    height: 100%;
			}

			.search-para {
			    color: #e0d7d7
			}
    	</style>
        <?php  while( $the_query->have_posts() ): $the_query->the_post(); ?>

     		<div class="flex search-flex">
	     			<div class="search-thumbnail">
	     				<img width="100%" height="100%" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>"
	     				 alt="thumbnail" />

	     			</div>
     			<div class="search-contant">
     				<h2 class="search-heading"><a href="<?php echo esc_url( post_permalink() ); ?>" target="_blank"><?php the_title();?></a></h2>
     				<p class="search-para">
     					<?php
						    $excerpt = get_the_excerpt();
						    echo wp_trim_words($excerpt, 35, '...'); 
						?>
     				</p>
     			</div>
     		</div>
            

        <?php endwhile;
		wp_reset_postdata();  
	else: 
		echo '<h3>No Results Found</h3>';
    endif;

    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#searchInput').val();
	if(keyword == ""){
		jQuery('#datafetch').html("");
	} else {
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword  },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	}
    

}
</script>

<?php
}