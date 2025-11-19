<?php
/**
 * Title: Testimonials Section
 * Slug: aurelia-hotel/testimonials
 * Categories: aurelia-sections
 * Description: Display guest testimonials in a two-column grid
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"soft-gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-soft-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)">

	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"textColor":"charcoal","fontFamily":"serif"} -->
		<h2 class="wp-block-heading has-text-align-center has-charcoal-color has-text-color has-serif-font-family" style="margin-bottom:var(--wp--preset--spacing--medium);font-size:clamp(2rem, 4vw, 3rem);font-weight:600"><?php esc_html_e( 'Guest Stories', 'aurelia-hotel' ); ?></h2>
		<!-- /wp:heading -->

	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"2rem"} -->
	<div style="height:2rem" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns alignwide">

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"border":{"radius":"0.5rem"}},"backgroundColor":"white","className":"testimonial-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group testimonial-card has-white-background-color has-background" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"gold"} -->
				<p class="has-gold-color has-text-color" style="font-size:0.875rem">★★★★★</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"textColor":"charcoal"} -->
				<p class="has-charcoal-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--medium);font-size:1.125rem;font-style:italic;line-height:1.6"><?php esc_html_e( '"The Aurelia redefined luxury for us. The attention to detail is extraordinary, and the staff anticipated our every need. The views alone are worth the journey."', 'aurelia-hotel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">

					<!-- wp:image {"width":"56px","height":"56px","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image size-thumbnail is-resized has-custom-border"><img alt="<?php esc_attr_e( 'Guest photo', 'aurelia-hotel' ); ?>" style="border-radius:100%;object-fit:cover;width:56px;height:56px"/></figure>
					<!-- /wp:image -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"textColor":"charcoal"} -->
						<p class="has-charcoal-color has-text-color" style="font-size:0.875rem;font-weight:600"><?php esc_html_e( 'Sarah & James Mitchell', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"}},"textColor":"taupe"} -->
						<p class="has-taupe-color has-text-color" style="font-size:0.75rem"><?php esc_html_e( 'London, UK', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"border":{"radius":"0.5rem"}},"backgroundColor":"white","className":"testimonial-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group testimonial-card has-white-background-color has-background" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"gold"} -->
				<p class="has-gold-color has-text-color" style="font-size:0.875rem">★★★★★</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"var:preset|spacing|medium"}}},"textColor":"charcoal"} -->
				<p class="has-charcoal-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--medium);font-size:1.125rem;font-style:italic;line-height:1.6"><?php esc_html_e( '"Three visits and counting. This is our sanctuary. From the spa to the Summit Penthouse views, everything exceeds expectations. Already planning our return."', 'aurelia-hotel' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-group">

					<!-- wp:image {"width":"56px","height":"56px","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
					<figure class="wp-block-image size-thumbnail is-resized has-custom-border"><img alt="<?php esc_attr_e( 'Guest photo', 'aurelia-hotel' ); ?>" style="border-radius:100%;object-fit:cover;width:56px;height:56px"/></figure>
					<!-- /wp:image -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600"}},"textColor":"charcoal"} -->
						<p class="has-charcoal-color has-text-color" style="font-size:0.875rem;font-weight:600"><?php esc_html_e( 'Dr. Elena Rossi', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"}},"textColor":"taupe"} -->
						<p class="has-taupe-color has-text-color" style="font-size:0.75rem"><?php esc_html_e( 'Milan, Italy', 'aurelia-hotel' ); ?></p>
						<!-- /wp:paragraph -->

					</div>
					<!-- /wp:group -->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
