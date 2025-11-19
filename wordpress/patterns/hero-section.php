<?php
/**
 * Title: Hero Section with Booking Widget
 * Slug: aurelia-hotel/hero-section
 * Categories: aurelia-sections, featured
 * Description: Full-viewport hero section with background image, centered content, and floating booking widget. Converted from React/Lovable demo.
 * Keywords: hero, booking, cover, header
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/assets/images/hotel-exterior.jpg' ); ?>","dimRatio":0,"overlayColor":"charcoal","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","gradient":"hero-overlay","contentPosition":"center center","isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"aurelia-hero-section"} -->
<div class="wp-block-cover alignfull is-light aurelia-hero-section" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-charcoal-background-color has-background-dim-0 has-background-dim has-background-gradient has-hero-overlay-gradient-background"></span>
	<img class="wp-block-cover__image-background" alt="<?php esc_attr_e( 'The Aurelia Hotel - Luxury Alpine Resort', 'aurelia-hotel' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hotel-exterior.jpg' ); ?>" data-object-fit="cover"/>

	<div class="wp-block-cover__inner-container">

		<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"1rem","right":"1rem"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
		<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:1rem;padding-bottom:0;padding-left:1rem">

			<!-- wp:group {"style":{"spacing":{"blockGap":"1rem","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
			<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">

				<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(3.5rem, 7vw, 4.5rem)","fontWeight":"600","lineHeight":"1.1","letterSpacing":"0.02em"},"spacing":{"margin":{"bottom":"1rem","top":"0"}}},"textColor":"white","className":"animate-fade-in","fontFamily":"serif"} -->
				<h1 class="wp-block-heading has-text-align-center animate-fade-in has-white-color has-text-color has-serif-font-family" style="margin-top:0;margin-bottom:1rem;font-size:clamp(3.5rem, 7vw, 4.5rem);font-weight:600;line-height:1.1;letter-spacing:0.02em"><?php esc_html_e( 'The Aurelia', 'aurelia-hotel' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"clamp(1.25rem, 2.5vw, 1.5rem)","fontWeight":"300","letterSpacing":"0.05em","lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","className":"animate-fade-in"} -->
				<p class="has-text-align-center animate-fade-in has-white-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:clamp(1.25rem, 2.5vw, 1.5rem);font-weight:300;line-height:1.4;letter-spacing:0.05em"><?php esc_html_e( 'Where Mountains Meet Luxury', 'aurelia-hotel' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:spacer {"height":"6rem","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<div style="margin-top:0;margin-bottom:0;height:6rem" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","right":"2rem","bottom":"2rem","left":"2rem"},"margin":{"top":"0","bottom":"0"},"blockGap":"1.5rem"},"border":{"radius":"0.5rem"},"elements":{"link":{"color":{"text":"var:preset|color|charcoal"}}}},"backgroundColor":"white","className":"aurelia-booking-widget","layout":{"type":"constrained","contentSize":"1000px"}} -->
			<div class="wp-block-group aurelia-booking-widget has-white-background-color has-background has-link-color" style="border-radius:0.5rem;margin-top:0;margin-bottom:0;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem">

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.1em"},"spacing":{"margin":{"bottom":"1rem","top":"0"}}},"textColor":"gold"} -->
				<h3 class="wp-block-heading has-text-align-center has-gold-color has-text-color" style="margin-top:0;margin-bottom:1rem;font-size:0.875rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase"><?php esc_html_e( 'Check Availability', 'aurelia-hotel' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"1rem","left":"1rem"},"margin":{"top":"0","bottom":"0"}}}} -->
				<div class="wp-block-columns" style="margin-top:0;margin-bottom:0">

					<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0.5rem"}}} -->
					<div class="wp-block-column" style="flex-basis:25%">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"500"},"spacing":{"margin":{"bottom":"0.5rem","top":"0"}}},"textColor":"charcoal"} -->
						<p class="has-charcoal-color has-text-color" style="margin-top:0;margin-bottom:0.5rem;font-size:0.875rem;font-weight:500"><?php esc_html_e( 'Check-in', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:html -->
						<div class="booking-field">
							<input
								type="date"
								class="booking-date-input"
								placeholder="<?php esc_attr_e( 'Select date', 'aurelia-hotel' ); ?>"
								aria-label="<?php esc_attr_e( 'Check-in date', 'aurelia-hotel' ); ?>"
								style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--wp--preset--color--taupe); border-radius: 0.375rem; font-size: 0.875rem; font-family: inherit; background-color: #fff; color: var(--wp--preset--color--charcoal);"
							/>
						</div>
						<!-- /wp:html -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0.5rem"}}} -->
					<div class="wp-block-column" style="flex-basis:25%">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"500"},"spacing":{"margin":{"bottom":"0.5rem","top":"0"}}},"textColor":"charcoal"} -->
						<p class="has-charcoal-color has-text-color" style="margin-top:0;margin-bottom:0.5rem;font-size:0.875rem;font-weight:500"><?php esc_html_e( 'Check-out', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:html -->
						<div class="booking-field">
							<input
								type="date"
								class="booking-date-input"
								placeholder="<?php esc_attr_e( 'Select date', 'aurelia-hotel' ); ?>"
								aria-label="<?php esc_attr_e( 'Check-out date', 'aurelia-hotel' ); ?>"
								style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--wp--preset--color--taupe); border-radius: 0.375rem; font-size: 0.875rem; font-family: inherit; background-color: #fff; color: var(--wp--preset--color--charcoal);"
							/>
						</div>
						<!-- /wp:html -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0.5rem"}}} -->
					<div class="wp-block-column" style="flex-basis:25%">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"500"},"spacing":{"margin":{"bottom":"0.5rem","top":"0"}}},"textColor":"charcoal"} -->
						<p class="has-charcoal-color has-text-color" style="margin-top:0;margin-bottom:0.5rem;font-size:0.875rem;font-weight:500"><?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:html -->
						<div class="booking-field">
							<select
								class="booking-select-input"
								aria-label="<?php esc_attr_e( 'Number of guests', 'aurelia-hotel' ); ?>"
								style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--wp--preset--color--taupe); border-radius: 0.375rem; font-size: 0.875rem; font-family: inherit; background-color: #fff; color: var(--wp--preset--color--charcoal); cursor: pointer;"
							>
								<option value="1">1 <?php esc_html_e( 'Guest', 'aurelia-hotel' ); ?></option>
								<option value="2" selected>2 <?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></option>
								<option value="3">3 <?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></option>
								<option value="4">4 <?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></option>
								<option value="5">5 <?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></option>
								<option value="6">6 <?php esc_html_e( 'Guests', 'aurelia-hotel' ); ?></option>
							</select>
						</div>
						<!-- /wp:html -->

					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0"}}} -->
					<div class="wp-block-column" style="flex-basis:25%">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"bottom":"0.5rem","top":"0"}}},"textColor":"white","className":"booking-label-spacer"} -->
						<p class="booking-label-spacer has-white-color has-text-color" style="margin-top:0;margin-bottom:0.5rem;font-size:0.875rem">&nbsp;</p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
						<div class="wp-block-buttons" style="margin-top:0;margin-bottom:0">
							<!-- wp:button {"backgroundColor":"gold","textColor":"charcoal","width":100,"style":{"spacing":{"padding":{"top":"0.75rem","bottom":"0.75rem","left":"2rem","right":"2rem"}},"border":{"radius":"0.375rem"},"typography":{"fontSize":"0.875rem","fontWeight":"600"}}} -->
							<div class="wp-block-button has-custom-width wp-block-button__width-100 has-custom-font-size" style="font-size:0.875rem;font-weight:600"><a class="wp-block-button__link has-charcoal-color has-gold-background-color has-text-color has-background wp-element-button" style="border-radius:0.375rem;padding-top:0.75rem;padding-right:2rem;padding-bottom:0.75rem;padding-left:2rem"><?php esc_html_e( 'Check Availability', 'aurelia-hotel' ); ?></a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->

					</div>
					<!-- /wp:column -->

				</div>
				<!-- /wp:columns -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.75rem"},"spacing":{"margin":{"top":"1rem","bottom":"0"}}},"textColor":"taupe"} -->
				<p class="has-text-align-center has-taupe-color has-text-color" style="margin-top:1rem;margin-bottom:0;font-size:0.75rem"><?php esc_html_e( 'Best rate guaranteed. Free cancellation up to 48 hours before arrival.', 'aurelia-hotel' ); ?></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:group -->

			<!-- wp:spacer {"height":"4rem","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<div style="margin-top:0;margin-bottom:0;height:4rem" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"2rem"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white","className":"animate-bounce"} -->
			<p class="has-text-align-center animate-bounce has-white-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:2rem">↓</p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:group -->

	</div>
</div>
<!-- /wp:cover -->
