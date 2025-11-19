<?php
/**
 * Title: Location Section
 * Slug: aurelia-hotel/location
 * Categories: aurelia-sections
 * Description: Location map placeholder with contact information
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem","left":"1rem","right":"1rem"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:5rem;padding-right:1rem;padding-bottom:5rem;padding-left:1rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group">

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"3rem","left":"3rem"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">

				<!-- wp:group {"className":"location__map","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"}},"border":{"radius":"12px"},"dimensions":{"minHeight":"500px"}},"backgroundColor":"beige","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
				<div class="wp-block-group location__map has-beige-background-color has-background" style="border-radius:12px;min-height:500px;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem">

					<!-- wp:html -->
					<div style="text-align: center;">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="hsl(45 90% 55%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 1rem auto;">
							<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
							<circle cx="12" cy="10" r="3"/>
						</svg>
						<h3 style="font-family: var(--font-serif); font-size: 1.875rem; margin: 0 0 0.5rem 0; color: hsl(220 15% 20%);">Zermatt, Switzerland</h3>
						<p style="color: hsl(30 15% 60%); margin: 0;">Interactive map coming soon</p>
					</div>
					<!-- /wp:html -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","className":"location__details"} -->
			<div class="wp-block-column is-vertically-aligned-center location__details">

				<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"2rem"}}},"fontFamily":"serif"} -->
				<h2 class="wp-block-heading has-serif-font-family" style="margin-bottom:2rem;font-size:clamp(2rem, 4vw, 3rem);line-height:1.2">Find Your Way to Paradise</h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"location__detail","style":{"spacing":{"margin":{"bottom":"1.5rem"},"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
				<div class="wp-block-group location__detail" style="margin-bottom:1.5rem">

					<!-- wp:html -->
					<div class="location__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="hsl(45 90% 55%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
							<circle cx="12" cy="10" r="3"/>
						</svg>
					</div>
					<!-- /wp:html -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"className":"location__label","style":{"typography":{"fontWeight":"600"}}} -->
						<p class="location__label" style="font-weight:600">Address</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"location__value","textColor":"contrast","style":{"typography":{"fontSize":"0.9375rem"}}} -->
						<p class="location__value has-contrast-color has-text-color" style="font-size:0.9375rem;opacity:0.7">Bergstrasse 42, 3920 Zermatt, Switzerland</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"location__detail","style":{"spacing":{"margin":{"bottom":"1.5rem"},"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
				<div class="wp-block-group location__detail" style="margin-bottom:1.5rem">

					<!-- wp:html -->
					<div class="location__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="hsl(45 90% 55%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<rect width="20" height="16" x="2" y="4" rx="2"/>
							<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
						</svg>
					</div>
					<!-- /wp:html -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"className":"location__label","style":{"typography":{"fontWeight":"600"}}} -->
						<p class="location__label" style="font-weight:600">Email</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"location__value","textColor":"contrast","style":{"typography":{"fontSize":"0.9375rem"}}} -->
						<p class="location__value has-contrast-color has-text-color" style="font-size:0.9375rem;opacity:0.7">reservations@theaurelia.ch</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"location__detail","style":{"spacing":{"margin":{"bottom":"2rem"},"blockGap":"0.75rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
				<div class="wp-block-group location__detail" style="margin-bottom:2rem">

					<!-- wp:html -->
					<div class="location__icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="hsl(45 90% 55%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
						</svg>
					</div>
					<!-- /wp:html -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"className":"location__label","style":{"typography":{"fontWeight":"600"}}} -->
						<p class="location__label" style="font-weight:600">Phone</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"location__value","textColor":"contrast","style":{"typography":{"fontSize":"0.9375rem"}}} -->
						<p class="location__value has-contrast-color has-text-color" style="font-size:0.9375rem;opacity:0.7">+41 27 966 8800</p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"location__travel","style":{"spacing":{"padding":{"top":"1.5rem"},"margin":{"top":"0"}},"border":{"top":{"color":"hsl(35 25% 88%)","width":"1px"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group location__travel" style="border-top-color:hsl(35 25% 88%);border-top-width:1px;margin-top:0;padding-top:1.5rem">

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"},"spacing":{"margin":{"bottom":"0.75rem"}}},"fontFamily":"serif"} -->
					<h3 class="wp-block-heading has-serif-font-family" style="margin-bottom:0.75rem;font-size:1.25rem">Travel Information</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"textColor":"contrast","style":{"typography":{"fontSize":"0.9375rem","lineHeight":"1.8"}}} -->
					<p class="has-contrast-color has-text-color" style="font-size:0.9375rem;line-height:1.8;opacity:0.7">90 minutes from Geneva Airport<br>10 minutes walk from Zermatt train station<br>Car-free village - electric shuttle available</p>
					<!-- /wp:paragraph -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
