<?php
/**
 * Title: Room Cards Grid
 * Slug: aurelia-hotel/room-cards
 * Categories: aurelia-sections
 * Description: Display hotel rooms in a responsive card grid
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"beige","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-beige-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"textColor":"charcoal","fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-text-align-center has-charcoal-color has-text-color has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--small);font-size:clamp(2rem, 4vw, 3rem);font-weight:600"><?php esc_html_e( 'Signature Suites', 'aurelia-hotel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"}},"textColor":"taupe"} -->
		<p class="has-text-align-center has-taupe-color has-text-color" style="font-size:1.125rem"><?php esc_html_e( 'Each room tells its own story', 'aurelia-hotel' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"3rem"} -->
	<div style="height:3rem" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"hotel_room","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">

		<!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"},"border":{"radius":"0.5rem"}},"backgroundColor":"white","className":"room-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group room-card has-white-background-color has-background" style="border-radius:0.5rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"border":{"radius":{"topLeft":"0.5rem","topRight":"0.5rem"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"}},"fontFamily":"serif"} /-->

					<!-- wp:post-excerpt {"moreText":"View Details","excerptLength":15,"style":{"typography":{"fontSize":"0.875rem"}}} /-->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"},"spacing":{"margin":{"top":"var:preset|spacing|small"}}},"textColor":"gold","fontFamily":"serif"} -->
					<p class="has-gold-color has-text-color has-serif-font-family" style="margin-top:var(--wp--preset--spacing--small);font-size:1.25rem;font-weight:600"><?php esc_html_e( 'From €450/night', 'aurelia-hotel' ); ?></p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"align":"center","textColor":"taupe"} -->
			<p class="has-text-align-center has-taupe-color has-text-color"><?php esc_html_e( 'No rooms available. Please add some rooms to display.', 'aurelia-hotel' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->

	<!-- wp:spacer {"height":"2rem"} -->
	<div style="height:2rem" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"gold","textColor":"charcoal"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-charcoal-color has-gold-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'View All Rooms', 'aurelia-hotel' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

</div>
<!-- /wp:group -->
