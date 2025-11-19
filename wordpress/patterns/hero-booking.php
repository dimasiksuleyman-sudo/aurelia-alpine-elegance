<?php
/**
 * Title: Hero Section with Booking Widget
 * Slug: aurelia-hotel/hero-booking
 * Categories: aurelia-sections
 * Description: Full-screen hero section with background image and booking widget overlay
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>","dimRatio":40,"overlayColor":"charcoal","minHeight":100,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-charcoal-background-color has-background-dim-40 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php esc_attr_e( 'The Aurelia Hotel Exterior', 'aurelia-hotel' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>" data-object-fit="cover"/>

	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3rem, 7vw, 5rem)","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"textColor":"white","fontFamily":"serif"} -->
			<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--small);font-size:clamp(3rem, 7vw, 5rem);font-weight:600"><?php esc_html_e( 'The Aurelia', 'aurelia-hotel' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontWeight":"300","letterSpacing":"0.05em"}},"textColor":"white"} -->
			<p class="has-text-align-center has-white-color has-text-color" style="font-size:1.5rem;font-weight:300;letter-spacing:0.05em"><?php esc_html_e( 'Where Mountains Meet Luxury', 'aurelia-hotel' ); ?></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"4rem"} -->
		<div style="height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"backgroundColor":"white","className":"hero-booking-widget","layout":{"type":"constrained","contentSize":"1000px"}} -->
		<div class="wp-block-group hero-booking-widget has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem","fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"gold"} -->
			<p class="has-text-align-center has-gold-color has-text-color" style="font-size:0.875rem;font-weight:500;letter-spacing:0.1em;text-transform:uppercase"><?php esc_html_e( 'Check Availability', 'aurelia-hotel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"}},"textColor":"charcoal"} -->
			<p class="has-text-align-center has-charcoal-color has-text-color" style="font-size:0.875rem"><?php esc_html_e( 'Booking widget will be integrated here. This is a placeholder for the custom booking block.', 'aurelia-hotel' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"gold","textColor":"charcoal"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-charcoal-color has-gold-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'Check Availability', 'aurelia-hotel' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
