<?php
// Register Custom Post Type Event
function create_event_cpt() {

	$labels = array(
		'name' => _x( 'Events', 'Post Type General Name', 'adidas_wp_theme' ),
		'singular_name' => _x( 'Event', 'Post Type Singular Name', 'adidas_wp_theme' ),
		'menu_name' => _x( 'Events', 'Admin Menu text', 'adidas_wp_theme' ),
		'name_admin_bar' => _x( 'Event', 'Add New on Toolbar', 'adidas_wp_theme' ),
		'archives' => __( 'Event Archives', 'adidas_wp_theme' ),
		'attributes' => __( 'Event Attributes', 'adidas_wp_theme' ),
		'parent_item_colon' => __( 'Parent Event:', 'adidas_wp_theme' ),
		'all_items' => __( 'All Events', 'adidas_wp_theme' ),
		'add_new_item' => __( 'Add New Event', 'adidas_wp_theme' ),
		'add_new' => __( 'Add New', 'adidas_wp_theme' ),
		'new_item' => __( 'New Event', 'adidas_wp_theme' ),
		'edit_item' => __( 'Edit Event', 'adidas_wp_theme' ),
		'update_item' => __( 'Update Event', 'adidas_wp_theme' ),
		'view_item' => __( 'View Event', 'adidas_wp_theme' ),
		'view_items' => __( 'View Events', 'adidas_wp_theme' ),
		'search_items' => __( 'Search Event', 'adidas_wp_theme' ),
		'not_found' => __( 'Not found', 'adidas_wp_theme' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'adidas_wp_theme' ),
		'featured_image' => __( 'Featured Image', 'adidas_wp_theme' ),
		'set_featured_image' => __( 'Set featured image', 'adidas_wp_theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'adidas_wp_theme' ),
		'use_featured_image' => __( 'Use as featured image', 'adidas_wp_theme' ),
		'insert_into_item' => __( 'Insert into Event', 'adidas_wp_theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event', 'adidas_wp_theme' ),
		'items_list' => __( 'Events list', 'adidas_wp_theme' ),
		'items_list_navigation' => __( 'Events list navigation', 'adidas_wp_theme' ),
		'filter_items_list' => __( 'Filter Events list', 'adidas_wp_theme' ),
	);
	$args = array(
		'label' => __( 'Event', 'adidas_wp_theme' ),
		'description' => __( 'Event custom post type', 'adidas_wp_theme' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 100,
		'menu_icon'             => 'dashicons-nametag',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'create_event_cpt', 0 );


// Register Taxonomy Location
function create_location_tax() {

	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name', 'adidas' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'adidas' ),
		'search_items'      => __( 'Search Locations', 'adidas' ),
		'all_items'         => __( 'All Locations', 'adidas' ),
		'parent_item'       => __( 'Parent Location', 'adidas' ),
		'parent_item_colon' => __( 'Parent Location:', 'adidas' ),
		'edit_item'         => __( 'Edit Location', 'adidas' ),
		'update_item'       => __( 'Update Location', 'adidas' ),
		'add_new_item'      => __( 'Add New Location', 'adidas' ),
		'new_item_name'     => __( 'New Location Name', 'adidas' ),
		'menu_name'         => __( 'Location', 'adidas' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Chose location for events', 'adidas' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'location', array('event'), $args );

}
add_action( 'init', 'create_location_tax' );


// Meta Box Class: Event Schedule
class eventscheduleMetabox {

	private $screen = array(
		'event',
	);

	private $meta_fields = array(
		array(
			'label' => 'Date',
			'id' => 'date',
			'type' => 'date',
		),
		array(
			'label' => 'Time Ranges',
			'id' => 'time',
			'type' => 'textarea',
		),
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'eventschedule',
				__( 'Event Schedule', 'adidas_wp_theme' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'low'
			);
		}
	}

	public function meta_box_callback( $post ) {
		wp_nonce_field( 'eventschedule_data', 'eventschedule_nonce' );
		$this->field_generator( $post );
	}

	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				if ( isset( $meta_field['default'] ) ) {
					$meta_value = $meta_field['default'];
				}
			}
			switch ( $meta_field['type'] ) {
				case 'textarea':
					$input = sprintf(
						'<textarea style="width: 50%%" id="%s" name="%s" rows="5">%s</textarea>',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 50%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}

	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['eventschedule_nonce'] ) )
			return $post_id;
		$nonce = $_POST['eventschedule_nonce'];
		if ( !wp_verify_nonce( $nonce, 'eventschedule_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}

if (class_exists('eventscheduleMetabox')) {
	new eventscheduleMetabox;
};

//-------------------------------------------------------------------------------------

// Register Custom Post Type support
function create_support_cpt() {

	$labels = array(
		'name' => _x( 'supports', 'Post Type General Name', 'adidas_wp_theme' ),
		'singular_name' => _x( 'support', 'Post Type Singular Name', 'adidas_wp_theme' ),
		'menu_name' => _x( 'supports', 'Admin Menu text', 'adidas_wp_theme' ),
		'name_admin_bar' => _x( 'support', 'Add New on Toolbar', 'adidas_wp_theme' ),
		'archives' => __( 'support Archives', 'adidas_wp_theme' ),
		'attributes' => __( 'support Attributes', 'adidas_wp_theme' ),
		'parent_item_colon' => __( 'Parent support:', 'adidas_wp_theme' ),
		'all_items' => __( 'All supports', 'adidas_wp_theme' ),
		'add_new_item' => __( 'Add New support', 'adidas_wp_theme' ),
		'add_new' => __( 'Add New', 'adidas_wp_theme' ),
		'new_item' => __( 'New support', 'adidas_wp_theme' ),
		'edit_item' => __( 'Edit support', 'adidas_wp_theme' ),
		'update_item' => __( 'Update support', 'adidas_wp_theme' ),
		'view_item' => __( 'View support', 'adidas_wp_theme' ),
		'view_items' => __( 'View supports', 'adidas_wp_theme' ),
		'search_items' => __( 'Search support', 'adidas_wp_theme' ),
		'not_found' => __( 'Not found', 'adidas_wp_theme' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'adidas_wp_theme' ),
		'featured_image' => __( 'Featured Image', 'adidas_wp_theme' ),
		'set_featured_image' => __( 'Set featured image', 'adidas_wp_theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'adidas_wp_theme' ),
		'use_featured_image' => __( 'Use as featured image', 'adidas_wp_theme' ),
		'insert_into_item' => __( 'Insert into support', 'adidas_wp_theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this support', 'adidas_wp_theme' ),
		'items_list' => __( 'supports list', 'adidas_wp_theme' ),
		'items_list_navigation' => __( 'supports list navigation', 'adidas_wp_theme' ),
		'filter_items_list' => __( 'Filter supports list', 'adidas_wp_theme' ),
	);
	$args = array(
		'label' => __( 'support', 'adidas_wp_theme' ),
		'description' => __( 'supports cpt', 'adidas_wp_theme' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' =>array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 100,
		'menu_icon'             => 'dashicons-games',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'support', $args );

}
add_action( 'init', 'create_support_cpt', 0 );

// Register Taxonomy Support Name
function create_supportname_tax() {

	$labels = array(
		'name'              => _x( 'supports', 'taxonomy general name', 'adidas_wp_theme' ),
		'singular_name'     => _x( 'Support Name', 'taxonomy singular name', 'adidas_wp_theme' ),
		'search_items'      => __( 'Search supports', 'adidas_wp_theme' ),
		'all_items'         => __( 'All supports', 'adidas_wp_theme' ),
		'parent_item'       => __( 'Parent Support Name', 'adidas_wp_theme' ),
		'parent_item_colon' => __( 'Parent Support Name:', 'adidas_wp_theme' ),
		'edit_item'         => __( 'Edit Support Name', 'adidas_wp_theme' ),
		'update_item'       => __( 'Update Support Name', 'adidas_wp_theme' ),
		'add_new_item'      => __( 'Add New Support Name', 'adidas_wp_theme' ),
		'new_item_name'     => __( 'New Support Name Name', 'adidas_wp_theme' ),
		'menu_name'         => __( 'Support Name', 'adidas_wp_theme' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'here choose the support category ', 'adidas_wp_theme' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'supportname', array('support'), $args );

}
add_action( 'init', 'create_supportname_tax' );