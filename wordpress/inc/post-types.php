<?php
/**
 * Custom Post Types Registration
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Hotel Rooms Custom Post Type
 *
 * @since 1.0.0
 */
function aurelia_register_hotel_rooms_cpt() {
	$labels = array(
		'name'                  => _x( 'Hotel Rooms', 'Post Type General Name', 'aurelia-hotel' ),
		'singular_name'         => _x( 'Hotel Room', 'Post Type Singular Name', 'aurelia-hotel' ),
		'menu_name'             => __( 'Hotel Rooms', 'aurelia-hotel' ),
		'name_admin_bar'        => __( 'Hotel Room', 'aurelia-hotel' ),
		'archives'              => __( 'Room Archives', 'aurelia-hotel' ),
		'attributes'            => __( 'Room Attributes', 'aurelia-hotel' ),
		'parent_item_colon'     => __( 'Parent Room:', 'aurelia-hotel' ),
		'all_items'             => __( 'All Rooms', 'aurelia-hotel' ),
		'add_new_item'          => __( 'Add New Room', 'aurelia-hotel' ),
		'add_new'               => __( 'Add New', 'aurelia-hotel' ),
		'new_item'              => __( 'New Room', 'aurelia-hotel' ),
		'edit_item'             => __( 'Edit Room', 'aurelia-hotel' ),
		'update_item'           => __( 'Update Room', 'aurelia-hotel' ),
		'view_item'             => __( 'View Room', 'aurelia-hotel' ),
		'view_items'            => __( 'View Rooms', 'aurelia-hotel' ),
		'search_items'          => __( 'Search Room', 'aurelia-hotel' ),
		'not_found'             => __( 'No rooms found', 'aurelia-hotel' ),
		'not_found_in_trash'    => __( 'No rooms found in Trash', 'aurelia-hotel' ),
		'featured_image'        => __( 'Room Featured Image', 'aurelia-hotel' ),
		'set_featured_image'    => __( 'Set room featured image', 'aurelia-hotel' ),
		'remove_featured_image' => __( 'Remove room featured image', 'aurelia-hotel' ),
		'use_featured_image'    => __( 'Use as room featured image', 'aurelia-hotel' ),
		'insert_into_item'      => __( 'Insert into room', 'aurelia-hotel' ),
		'uploaded_to_this_item' => __( 'Uploaded to this room', 'aurelia-hotel' ),
		'items_list'            => __( 'Rooms list', 'aurelia-hotel' ),
		'items_list_navigation' => __( 'Rooms list navigation', 'aurelia-hotel' ),
		'filter_items_list'     => __( 'Filter rooms list', 'aurelia-hotel' ),
	);

	$args = array(
		'label'               => __( 'Hotel Room', 'aurelia-hotel' ),
		'description'         => __( 'Hotel room accommodations', 'aurelia-hotel' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
		'taxonomies'          => array( 'room_category', 'room_amenity' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-home',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'rooms',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true, // Enable Gutenberg editor
		'rest_base'           => 'hotel-rooms',
		'rewrite'             => array(
			'slug'       => 'rooms',
			'with_front' => false,
		),
	);

	register_post_type( 'hotel_room', $args );
}
add_action( 'init', 'aurelia_register_hotel_rooms_cpt', 0 );

/**
 * Register Room Category Taxonomy
 *
 * @since 1.0.0
 */
function aurelia_register_room_category_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Room Categories', 'Taxonomy General Name', 'aurelia-hotel' ),
		'singular_name'              => _x( 'Room Category', 'Taxonomy Singular Name', 'aurelia-hotel' ),
		'menu_name'                  => __( 'Room Categories', 'aurelia-hotel' ),
		'all_items'                  => __( 'All Categories', 'aurelia-hotel' ),
		'parent_item'                => __( 'Parent Category', 'aurelia-hotel' ),
		'parent_item_colon'          => __( 'Parent Category:', 'aurelia-hotel' ),
		'new_item_name'              => __( 'New Category Name', 'aurelia-hotel' ),
		'add_new_item'               => __( 'Add New Category', 'aurelia-hotel' ),
		'edit_item'                  => __( 'Edit Category', 'aurelia-hotel' ),
		'update_item'                => __( 'Update Category', 'aurelia-hotel' ),
		'view_item'                  => __( 'View Category', 'aurelia-hotel' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'aurelia-hotel' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'aurelia-hotel' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'aurelia-hotel' ),
		'popular_items'              => __( 'Popular Categories', 'aurelia-hotel' ),
		'search_items'               => __( 'Search Categories', 'aurelia-hotel' ),
		'not_found'                  => __( 'No categories found', 'aurelia-hotel' ),
		'no_terms'                   => __( 'No categories', 'aurelia-hotel' ),
		'items_list'                 => __( 'Categories list', 'aurelia-hotel' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'aurelia-hotel' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => 'room-category',
		),
	);

	register_taxonomy( 'room_category', array( 'hotel_room' ), $args );
}
add_action( 'init', 'aurelia_register_room_category_taxonomy', 0 );

/**
 * Register Room Amenity Taxonomy
 *
 * @since 1.0.0
 */
function aurelia_register_room_amenity_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Room Amenities', 'Taxonomy General Name', 'aurelia-hotel' ),
		'singular_name'              => _x( 'Room Amenity', 'Taxonomy Singular Name', 'aurelia-hotel' ),
		'menu_name'                  => __( 'Amenities', 'aurelia-hotel' ),
		'all_items'                  => __( 'All Amenities', 'aurelia-hotel' ),
		'new_item_name'              => __( 'New Amenity Name', 'aurelia-hotel' ),
		'add_new_item'               => __( 'Add New Amenity', 'aurelia-hotel' ),
		'edit_item'                  => __( 'Edit Amenity', 'aurelia-hotel' ),
		'update_item'                => __( 'Update Amenity', 'aurelia-hotel' ),
		'view_item'                  => __( 'View Amenity', 'aurelia-hotel' ),
		'separate_items_with_commas' => __( 'Separate amenities with commas', 'aurelia-hotel' ),
		'add_or_remove_items'        => __( 'Add or remove amenities', 'aurelia-hotel' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'aurelia-hotel' ),
		'popular_items'              => __( 'Popular Amenities', 'aurelia-hotel' ),
		'search_items'               => __( 'Search Amenities', 'aurelia-hotel' ),
		'not_found'                  => __( 'No amenities found', 'aurelia-hotel' ),
		'no_terms'                   => __( 'No amenities', 'aurelia-hotel' ),
		'items_list'                 => __( 'Amenities list', 'aurelia-hotel' ),
		'items_list_navigation'      => __( 'Amenities list navigation', 'aurelia-hotel' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'slug' => 'amenity',
		),
	);

	register_taxonomy( 'room_amenity', array( 'hotel_room' ), $args );
}
add_action( 'init', 'aurelia_register_room_amenity_taxonomy', 0 );

/**
 * Add custom meta boxes for hotel rooms
 *
 * @since 1.0.0
 */
function aurelia_add_room_meta_boxes() {
	add_meta_box(
		'aurelia_room_details',
		__( 'Room Details', 'aurelia-hotel' ),
		'aurelia_room_details_callback',
		'hotel_room',
		'normal',
		'high'
	);

	add_meta_box(
		'aurelia_room_features',
		__( 'Room Features', 'aurelia-hotel' ),
		'aurelia_room_features_callback',
		'hotel_room',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'aurelia_add_room_meta_boxes' );

/**
 * Room Details Meta Box Callback
 *
 * @param WP_Post $post The post object.
 * @since 1.0.0
 */
function aurelia_room_details_callback( $post ) {
	// Add nonce for security.
	wp_nonce_field( 'aurelia_save_room_details', 'aurelia_room_details_nonce' );

	// Get existing values.
	$room_price       = get_post_meta( $post->ID, '_aurelia_room_price', true );
	$room_size        = get_post_meta( $post->ID, '_aurelia_room_size', true );
	$room_bed_type    = get_post_meta( $post->ID, '_aurelia_room_bed_type', true );
	$room_max_guests  = get_post_meta( $post->ID, '_aurelia_room_max_guests', true );
	$room_view        = get_post_meta( $post->ID, '_aurelia_room_view', true );
	$room_badge       = get_post_meta( $post->ID, '_aurelia_room_badge', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="aurelia_room_price"><?php _e( 'Price (per night)', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="text" id="aurelia_room_price" name="aurelia_room_price" value="<?php echo esc_attr( $room_price ); ?>" class="regular-text" placeholder="e.g., From €450/night">
				<p class="description"><?php _e( 'Enter the room price with currency symbol', 'aurelia-hotel' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="aurelia_room_size"><?php _e( 'Room Size', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="text" id="aurelia_room_size" name="aurelia_room_size" value="<?php echo esc_attr( $room_size ); ?>" class="regular-text" placeholder="e.g., 48 sqm">
				<p class="description"><?php _e( 'Enter the room size with unit', 'aurelia-hotel' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="aurelia_room_bed_type"><?php _e( 'Bed Type', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="text" id="aurelia_room_bed_type" name="aurelia_room_bed_type" value="<?php echo esc_attr( $room_bed_type ); ?>" class="regular-text" placeholder="e.g., King Bed">
			</td>
		</tr>
		<tr>
			<th><label for="aurelia_room_max_guests"><?php _e( 'Max Guests', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="number" id="aurelia_room_max_guests" name="aurelia_room_max_guests" value="<?php echo esc_attr( $room_max_guests ); ?>" min="1" max="10" class="small-text">
			</td>
		</tr>
		<tr>
			<th><label for="aurelia_room_view"><?php _e( 'View Type', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="text" id="aurelia_room_view" name="aurelia_room_view" value="<?php echo esc_attr( $room_view ); ?>" class="regular-text" placeholder="e.g., Mountain View Balcony">
			</td>
		</tr>
		<tr>
			<th><label for="aurelia_room_badge"><?php _e( 'Badge Text (Optional)', 'aurelia-hotel' ); ?></label></th>
			<td>
				<input type="text" id="aurelia_room_badge" name="aurelia_room_badge" value="<?php echo esc_attr( $room_badge ); ?>" class="regular-text" placeholder="e.g., MOST POPULAR">
				<p class="description"><?php _e( 'Badge text to display on room card (optional)', 'aurelia-hotel' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save Room Details Meta Box Data
 *
 * @param int $post_id The post ID.
 * @since 1.0.0
 */
function aurelia_save_room_details( $post_id ) {
	// Check if nonce is set.
	if ( ! isset( $_POST['aurelia_room_details_nonce'] ) ) {
		return;
	}

	// Verify nonce.
	if ( ! wp_verify_nonce( $_POST['aurelia_room_details_nonce'], 'aurelia_save_room_details' ) ) {
		return;
	}

	// Check if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check user permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save meta fields.
	$fields = array(
		'aurelia_room_price',
		'aurelia_room_size',
		'aurelia_room_bed_type',
		'aurelia_room_max_guests',
		'aurelia_room_view',
		'aurelia_room_badge',
	);

	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta(
				$post_id,
				'_' . $field,
				sanitize_text_field( $_POST[ $field ] )
			);
		}
	}
}
add_action( 'save_post_hotel_room', 'aurelia_save_room_details' );

/**
 * Room Features Meta Box Callback
 *
 * @param WP_Post $post The post object.
 * @since 1.0.0
 */
function aurelia_room_features_callback( $post ) {
	// Add nonce for security.
	wp_nonce_field( 'aurelia_save_room_features', 'aurelia_room_features_nonce' );

	// Get existing features.
	$features = get_post_meta( $post->ID, '_aurelia_room_features', true );
	if ( ! is_array( $features ) ) {
		$features = array( '' );
	}
	?>
	<div id="aurelia-room-features-container">
		<?php foreach ( $features as $index => $feature ) : ?>
			<div class="aurelia-feature-row" style="margin-bottom: 10px; display: flex; gap: 10px; align-items: center;">
				<input type="text" name="aurelia_room_features[]" value="<?php echo esc_attr( $feature ); ?>" class="regular-text" placeholder="<?php esc_attr_e( 'e.g., Private balcony with panoramic views', 'aurelia-hotel' ); ?>" />
				<button type="button" class="button aurelia-remove-feature" <?php echo ( count( $features ) <= 1 ) ? 'style="display:none;"' : ''; ?>><?php _e( 'Remove', 'aurelia-hotel' ); ?></button>
			</div>
		<?php endforeach; ?>
	</div>

	<p style="margin-top: 10px;">
		<button type="button" class="button button-secondary" id="aurelia-add-feature"><?php _e( 'Add Feature', 'aurelia-hotel' ); ?></button>
	</p>

	<script>
	jQuery(document).ready(function($) {
		// Add feature
		$('#aurelia-add-feature').on('click', function() {
			var container = $('#aurelia-room-features-container');
			var newRow = $('<div class="aurelia-feature-row" style="margin-bottom: 10px; display: flex; gap: 10px; align-items: center;"></div>');
			newRow.append('<input type="text" name="aurelia_room_features[]" value="" class="regular-text" placeholder="<?php esc_attr_e( 'e.g., Private balcony with panoramic views', 'aurelia-hotel' ); ?>" />');
			newRow.append('<button type="button" class="button aurelia-remove-feature"><?php _e( 'Remove', 'aurelia-hotel' ); ?></button>');
			container.append(newRow);

			// Show all remove buttons
			$('.aurelia-remove-feature').show();
		});

		// Remove feature
		$(document).on('click', '.aurelia-remove-feature', function() {
			var rows = $('.aurelia-feature-row');
			if (rows.length > 1) {
				$(this).closest('.aurelia-feature-row').remove();

				// Hide remove button if only one row left
				if ($('.aurelia-feature-row').length === 1) {
					$('.aurelia-remove-feature').hide();
				}
			}
		});
	});
	</script>
	<?php
}

/**
 * Save Room Features Meta Box Data
 *
 * @param int $post_id The post ID.
 * @since 1.0.0
 */
function aurelia_save_room_features( $post_id ) {
	// Check if nonce is set.
	if ( ! isset( $_POST['aurelia_room_features_nonce'] ) ) {
		return;
	}

	// Verify nonce.
	if ( ! wp_verify_nonce( $_POST['aurelia_room_features_nonce'], 'aurelia_save_room_features' ) ) {
		return;
	}

	// Check if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check user permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save features.
	if ( isset( $_POST['aurelia_room_features'] ) && is_array( $_POST['aurelia_room_features'] ) ) {
		$features = array_filter( array_map( 'sanitize_text_field', $_POST['aurelia_room_features'] ) );
		update_post_meta( $post_id, '_aurelia_room_features', $features );
	} else {
		delete_post_meta( $post_id, '_aurelia_room_features' );
	}
}
add_action( 'save_post_hotel_room', 'aurelia_save_room_features' );

/**
 * Flush rewrite rules on theme activation
 *
 * @since 1.0.0
 */
function aurelia_flush_rewrite_rules() {
	aurelia_register_hotel_rooms_cpt();
	aurelia_register_room_category_taxonomy();
	aurelia_register_room_amenity_taxonomy();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'aurelia_flush_rewrite_rules' );
