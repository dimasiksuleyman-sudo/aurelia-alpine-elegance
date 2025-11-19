<?php
/**
 * Template Functions
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get room price
 *
 * @param int $post_id The post ID.
 * @return string Room price.
 * @since 1.0.0
 */
function aurelia_get_room_price( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$price = get_post_meta( $post_id, '_aurelia_room_price', true );
	return $price ? $price : __( 'Price on request', 'aurelia-hotel' );
}

/**
 * Get room size
 *
 * @param int $post_id The post ID.
 * @return string Room size.
 * @since 1.0.0
 */
function aurelia_get_room_size( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id, '_aurelia_room_size', true );
}

/**
 * Get room bed type
 *
 * @param int $post_id The post ID.
 * @return string Bed type.
 * @since 1.0.0
 */
function aurelia_get_room_bed_type( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id, '_aurelia_room_bed_type', true );
}

/**
 * Get room max guests
 *
 * @param int $post_id The post ID.
 * @return int Max guests.
 * @since 1.0.0
 */
function aurelia_get_room_max_guests( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id, '_aurelia_room_max_guests', true );
}

/**
 * Get room view type
 *
 * @param int $post_id The post ID.
 * @return string View type.
 * @since 1.0.0
 */
function aurelia_get_room_view( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id, '_aurelia_room_view', true );
}

/**
 * Get room badge text
 *
 * @param int $post_id The post ID.
 * @return string Badge text.
 * @since 1.0.0
 */
function aurelia_get_room_badge( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	return get_post_meta( $post_id, '_aurelia_room_badge', true );
}

/**
 * Display room description (combining size, bed type, and view)
 *
 * @param int $post_id The post ID.
 * @return string Room description.
 * @since 1.0.0
 */
function aurelia_get_room_description( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$parts = array();

	$size = aurelia_get_room_size( $post_id );
	if ( $size ) {
		$parts[] = $size;
	}

	$bed_type = aurelia_get_room_bed_type( $post_id );
	if ( $bed_type ) {
		$parts[] = $bed_type;
	}

	$view = aurelia_get_room_view( $post_id );
	if ( $view ) {
		$parts[] = $view;
	}

	return ! empty( $parts ) ? implode( ' | ', $parts ) : '';
}

/**
 * Display room amenities as list
 *
 * @param int $post_id The post ID.
 * @return void
 * @since 1.0.0
 */
function aurelia_display_room_amenities( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$amenities = get_the_terms( $post_id, 'room_amenity' );

	if ( $amenities && ! is_wp_error( $amenities ) ) {
		echo '<ul class="room-amenities">';
		foreach ( $amenities as $amenity ) {
			echo '<li class="room-amenity">';
			echo '<span class="amenity-icon">✓</span>';
			echo esc_html( $amenity->name );
			echo '</li>';
		}
		echo '</ul>';
	}
}

/**
 * Get room category
 *
 * @param int $post_id The post ID.
 * @return string|false Room category name or false.
 * @since 1.0.0
 */
function aurelia_get_room_category( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$categories = get_the_terms( $post_id, 'room_category' );

	if ( $categories && ! is_wp_error( $categories ) ) {
		return $categories[0]->name;
	}

	return false;
}

/**
 * Display formatted room price
 *
 * @param int $post_id The post ID.
 * @return void
 * @since 1.0.0
 */
function aurelia_the_room_price( $post_id = null ) {
	$price = aurelia_get_room_price( $post_id );
	echo '<span class="room-price">' . esc_html( $price ) . '</span>';
}

/**
 * Check if room has badge
 *
 * @param int $post_id The post ID.
 * @return bool
 * @since 1.0.0
 */
function aurelia_has_room_badge( $post_id = null ) {
	$badge = aurelia_get_room_badge( $post_id );
	return ! empty( $badge );
}

/**
 * Display room badge
 *
 * @param int $post_id The post ID.
 * @return void
 * @since 1.0.0
 */
function aurelia_the_room_badge( $post_id = null ) {
	if ( aurelia_has_room_badge( $post_id ) ) {
		$badge = aurelia_get_room_badge( $post_id );
		echo '<span class="room-badge">' . esc_html( $badge ) . '</span>';
	}
}
