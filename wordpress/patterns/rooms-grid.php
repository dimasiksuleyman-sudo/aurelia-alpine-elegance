<?php
/**
 * Title: Rooms Grid
 * Slug: aurelia-hotel/rooms-grid
 * Categories: aurelia-sections
 * Description: Display all hotel rooms in a responsive grid layout with images, details, and pricing
 * Keywords: rooms, hotel, grid, accommodation
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"beige","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-beige-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--large)">

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|small"}}},"textColor":"charcoal","fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-text-align-center has-charcoal-color has-text-color has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--small);font-size:clamp(2rem, 4vw, 3rem);font-weight:600"><?php esc_html_e( 'Signature Suites', 'aurelia-hotel' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"}},"textColor":"taupe"} -->
		<p class="has-text-align-center has-taupe-color has-text-color" style="font-size:1.125rem"><?php esc_html_e( 'Each room tells its own story', 'aurelia-hotel' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":"hotel_room","order":"desc","orderBy":"menu_order","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","className":"aurelia-rooms-grid"} -->
	<div class="wp-block-query alignwide aurelia-rooms-grid">

		<!-- wp:post-template {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"grid","columnCount":3}} -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"},"border":{"radius":"0.5rem"}},"backgroundColor":"white","className":"room-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group room-card has-white-background-color has-background" style="border-radius:0.5rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

				<!-- wp:group {"style":{"position":{"type":"relative"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"border":{"radius":{"topLeft":"0.5rem","topRight":"0.5rem"}}}} /-->

					<!-- wp:html -->
					<?php if ( aurelia_has_room_badge() ) : ?>
						<?php aurelia_the_room_badge(); ?>
					<?php endif; ?>
					<!-- /wp:html -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

					<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1.875rem","fontWeight":"600"},"spacing":{"margin":{"bottom":"0.5rem","top":"0"}}},"textColor":"charcoal","fontFamily":"serif"} /-->

					<!-- wp:html -->
					<p class="room-description" style="color: var(--wp--preset--color--taupe); font-size: 0.875rem; margin: 0 0 1rem 0;">
						<?php echo esc_html( aurelia_get_room_description() ); ?>
					</p>
					<!-- /wp:html -->

					<!-- wp:html -->
					<?php
					$features = aurelia_get_room_features();
					if ( ! empty( $features ) && count( $features ) > 0 ) :
						$display_features = array_slice( $features, 0, 3 );
					?>
						<ul class="room-features-preview" style="list-style: none; padding: 0; margin: 0 0 1.5rem 0;">
							<?php foreach ( $display_features as $feature ) : ?>
								<li style="display: flex; align-items: flex-start; gap: 0.5rem; font-size: 0.875rem; margin-bottom: 0.5rem; color: var(--wp--preset--color--charcoal);">
									<svg class="feature-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--wp--preset--color--gold)" stroke-width="2" style="flex-shrink: 0; margin-top: 0.125rem;">
										<polyline points="20 6 9 17 4 12"></polyline>
									</svg>
									<span><?php echo esc_html( $feature ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<!-- /wp:html -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"},"border":{"top":{"color":"var:preset|color|taupe","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","orientation":"horizontal"}} -->
					<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--taupe);border-top-width:1px;padding-top:var(--wp--preset--spacing--small)">

						<!-- wp:html -->
						<span class="room-price" style="font-size: 1.5rem; font-family: var(--wp--preset--font-family--serif); font-weight: 600; color: var(--wp--preset--color--gold);">
							<?php echo esc_html( aurelia_get_room_price() ); ?>
						</span>
						<!-- /wp:html -->

						<!-- wp:buttons -->
						<div class="wp-block-buttons">
							<!-- wp:button {"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1.5rem","right":"1.5rem"}}},"borderColor":"gold","textColor":"gold","className":"is-style-outline"} -->
							<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-gold-color has-text-color has-border-color has-gold-border-color wp-element-button" href="<?php the_permalink(); ?>" style="border-width:1px;padding-top:0.5rem;padding-right:1.5rem;padding-bottom:0.5rem;padding-left:1.5rem"><?php esc_html_e( 'View Details', 'aurelia-hotel' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|large"}}}} -->
			<!-- wp:query-pagination-previous {"style":{"typography":{"fontWeight":"500"}}} /-->
			<!-- wp:query-pagination-numbers /-->
			<!-- wp:query-pagination-next {"style":{"typography":{"fontWeight":"500"}}} /-->
		<!-- /wp:query-pagination -->

		<!-- wp:query-no-results -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center"><?php esc_html_e( 'No Rooms Found', 'aurelia-hotel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"taupe"} -->
				<p class="has-text-align-center has-taupe-color has-text-color"><?php esc_html_e( 'Please check back soon or contact us for availability.', 'aurelia-hotel' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->
		<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
