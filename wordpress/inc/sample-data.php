<?php
/**
 * Sample Data for Hotel Rooms
 *
 * Run this file once to populate sample room data.
 * Access via: yoursite.com/?aurelia_create_sample_data=1
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create sample hotel rooms data
 *
 * @return void
 */
function aurelia_create_sample_rooms() {
	// Check if we should create sample data
	if ( ! isset( $_GET['aurelia_create_sample_data'] ) || $_GET['aurelia_create_sample_data'] != '1' ) {
		return;
	}

	// Check if user has permission
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have permission to perform this action.', 'aurelia-hotel' ) );
	}

	// Check if rooms already exist
	$existing_rooms = get_posts( array(
		'post_type'      => 'hotel_room',
		'posts_per_page' => 1,
		'post_status'    => 'any',
	) );

	if ( ! empty( $existing_rooms ) ) {
		wp_die( __( 'Sample rooms already exist. Delete existing rooms first.', 'aurelia-hotel' ) );
	}

	// Sample rooms data
	$rooms = array(
		array(
			'title'       => 'Alpine Suite',
			'content'     => 'Our signature Alpine Suite offers the perfect blend of contemporary luxury and mountain charm. Wake up to breathtaking views of the Swiss Alps from your private balcony, unwind in the freestanding soaking tub, and experience the finest Italian marble craftsmanship in your spacious bathroom.

This 48-square-meter suite is designed with your comfort in mind. The king-sized bed features premium linens and a pillow menu for your perfect night\'s sleep. Floor-to-ceiling windows flood the space with natural light and frame the spectacular mountain vistas.

The private balcony is your personal sanctuary, perfect for morning coffee or evening wine while watching the alpenglow on the peaks. Inside, the soaking tub invites relaxation after a day on the slopes or hiking mountain trails.',
			'price'       => 'From €450/night',
			'size'        => '48 sqm',
			'bed_type'    => 'King Bed',
			'max_guests'  => '2',
			'view'        => 'Mountain View Balcony',
			'badge'       => 'MOST POPULAR',
			'features'    => array(
				'Private balcony with panoramic views',
				'Freestanding soaking tub',
				'Italian marble bathroom',
				'Pillow menu and premium linens',
				'Floor-to-ceiling windows',
				'Daily housekeeping',
			),
			'amenities'   => array( 'WiFi', 'Balcony', 'Air Conditioning', 'Mini Bar', 'Safe' ),
			'category'    => 'Suite',
			'menu_order'  => 1,
		),
		array(
			'title'       => 'Summit Penthouse',
			'content'     => 'Experience alpine living at its finest in our exclusive Summit Penthouse. This spacious suite features floor-to-ceiling windows offering 270-degree mountain views, a private terrace with heated hot tub, and a separate living area perfect for entertaining or relaxation.

Spanning an impressive 85 square meters, the Summit Penthouse is our premier accommodation. The wraparound terrace provides unobstructed views of the surrounding peaks, creating an unforgettable backdrop for your stay.

The private hot tub on the terrace is heated year-round, allowing you to soak under the stars regardless of the season. Inside, the separate living area features a comfortable seating arrangement, perfect for entertaining guests or enjoying quiet moments with a book.',
			'price'       => 'From €850/night',
			'size'        => '85 sqm',
			'bed_type'    => 'Premium Suite',
			'max_guests'  => '4',
			'view'        => 'Wraparound Terrace',
			'badge'       => '',
			'features'    => array(
				'270-degree mountain vistas',
				'Private terrace with hot tub',
				'Separate living area',
				'Premium entertainment system',
				'Walk-in closet',
				'Complimentary minibar',
			),
			'amenities'   => array( 'WiFi', 'Hot Tub', 'Terrace', 'Air Conditioning', 'Entertainment System', 'Mini Bar' ),
			'category'    => 'Penthouse',
			'menu_order'  => 2,
		),
		array(
			'title'       => 'Garden Retreat',
			'content'     => 'Find tranquility in our Garden Retreat, featuring direct access to our manicured alpine gardens. This ground-floor suite offers a seamless indoor-outdoor experience with floor-to-ceiling windows, a private outdoor seating area, and the perfect setting for morning meditation or evening relaxation.

The 42-square-meter Garden Retreat is designed for those who appreciate a connection to nature. Step directly from your room into our beautifully landscaped gardens, where native alpine plants and flowers create a serene environment.

Your private outdoor seating area is furnished with comfortable lounge chairs and a small table, perfect for al fresco breakfast or afternoon tea. The floor-to-ceiling windows can be fully opened, creating a truly integrated indoor-outdoor living space.',
			'price'       => 'From €380/night',
			'size'        => '42 sqm',
			'bed_type'    => 'Queen Bed',
			'max_guests'  => '2',
			'view'        => 'Private Garden Access',
			'badge'       => '',
			'features'    => array(
				'Direct garden access',
				'Outdoor seating area',
				'Floor-to-ceiling windows',
				'Rain shower',
				'Garden view',
				'Pet-friendly option available',
			),
			'amenities'   => array( 'WiFi', 'Garden Access', 'Air Conditioning', 'Coffee Machine', 'Pet Friendly' ),
			'category'    => 'Retreat',
			'menu_order'  => 3,
		),
	);

	// Create room category taxonomy terms
	$categories = array( 'Suite', 'Penthouse', 'Retreat' );
	foreach ( $categories as $category ) {
		if ( ! term_exists( $category, 'room_category' ) ) {
			wp_insert_term( $category, 'room_category' );
		}
	}

	// Create room amenity taxonomy terms
	$all_amenities = array( 'WiFi', 'Balcony', 'Hot Tub', 'Terrace', 'Garden Access', 'Air Conditioning', 'Entertainment System', 'Mini Bar', 'Safe', 'Coffee Machine', 'Pet Friendly' );
	foreach ( $all_amenities as $amenity ) {
		if ( ! term_exists( $amenity, 'room_amenity' ) ) {
			wp_insert_term( $amenity, 'room_amenity' );
		}
	}

	// Create rooms
	$created_count = 0;
	foreach ( $rooms as $room_data ) {
		// Create the post
		$post_id = wp_insert_post( array(
			'post_title'   => $room_data['title'],
			'post_content' => $room_data['content'],
			'post_type'    => 'hotel_room',
			'post_status'  => 'publish',
			'menu_order'   => $room_data['menu_order'],
		) );

		if ( ! is_wp_error( $post_id ) ) {
			// Add meta data
			update_post_meta( $post_id, '_aurelia_room_price', $room_data['price'] );
			update_post_meta( $post_id, '_aurelia_room_size', $room_data['size'] );
			update_post_meta( $post_id, '_aurelia_room_bed_type', $room_data['bed_type'] );
			update_post_meta( $post_id, '_aurelia_room_max_guests', $room_data['max_guests'] );
			update_post_meta( $post_id, '_aurelia_room_view', $room_data['view'] );
			update_post_meta( $post_id, '_aurelia_room_badge', $room_data['badge'] );
			update_post_meta( $post_id, '_aurelia_room_features', $room_data['features'] );

			// Assign category
			if ( ! empty( $room_data['category'] ) ) {
				wp_set_object_terms( $post_id, $room_data['category'], 'room_category' );
			}

			// Assign amenities
			if ( ! empty( $room_data['amenities'] ) ) {
				wp_set_object_terms( $post_id, $room_data['amenities'], 'room_amenity' );
			}

			$created_count++;
		}
	}

	// Success message
	wp_die(
		sprintf(
			__( 'Success! Created %d sample rooms. <a href="%s">View Rooms</a> or <a href="%s">Go to Dashboard</a>', 'aurelia-hotel' ),
			$created_count,
			get_post_type_archive_link( 'hotel_room' ),
			admin_url()
		)
	);
}
add_action( 'init', 'aurelia_create_sample_rooms' );

/**
 * Add admin notice for sample data creation
 *
 * @return void
 */
function aurelia_sample_data_admin_notice() {
	// Only show on hotel room admin pages
	$screen = get_current_screen();
	if ( ! $screen || $screen->post_type !== 'hotel_room' ) {
		return;
	}

	// Check if we have any rooms
	$rooms = get_posts( array(
		'post_type'      => 'hotel_room',
		'posts_per_page' => 1,
		'post_status'    => 'any',
	) );

	// Only show if no rooms exist
	if ( ! empty( $rooms ) ) {
		return;
	}

	?>
	<div class="notice notice-info is-dismissible">
		<p>
			<strong><?php _e( 'Welcome to Aurelia Hotel!', 'aurelia-hotel' ); ?></strong>
		</p>
		<p>
			<?php _e( 'Get started quickly by creating sample room data.', 'aurelia-hotel' ); ?>
			<a href="<?php echo esc_url( home_url( '/?aurelia_create_sample_data=1' ) ); ?>" class="button button-primary" style="margin-left: 10px;">
				<?php _e( 'Create Sample Rooms', 'aurelia-hotel' ); ?>
			</a>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'aurelia_sample_data_admin_notice' );
