<?php
/**
 * Title: Welcome Section
 * Slug: aurelia-hotel/welcome-section
 * Categories: aurelia-sections
 * Description: Two-column welcome section with text and featured image
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem","left":"1rem","right":"1rem"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:5rem;padding-right:1rem;padding-bottom:5rem;padding-left:1rem">

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"1280px"}} -->
	<div class="wp-block-group">

		<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"3rem","left":"3rem"}}}} -->
		<div class="wp-block-columns are-vertically-aligned-center">

			<!-- wp:column {"verticalAlignment":"center","className":"welcome__content"} -->
			<div class="wp-block-column is-vertically-aligned-center welcome__content">

				<!-- wp:paragraph {"className":"welcome__label","style":{"typography":{"fontSize":"0.875rem","letterSpacing":"0.1em","fontWeight":"600","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"gold"} -->
				<p class="welcome__label has-gold-color has-text-color" style="margin-bottom:1.5rem;font-size:0.875rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Welcome to The Aurelia</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"className":"welcome__title","style":{"typography":{"fontSize":"clamp(2.5rem, 5vw, 3.75rem)","lineHeight":"1.2"},"spacing":{"margin":{"bottom":"1.5rem"}}},"fontFamily":"serif"} -->
				<h2 class="wp-block-heading welcome__title has-serif-font-family" style="margin-bottom:1.5rem;font-size:clamp(2.5rem, 5vw, 3.75rem);line-height:1.2">Experience Alpine Elegance</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"welcome__text","style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"contrast"} -->
				<p class="welcome__text has-contrast-color has-text-color" style="margin-bottom:1rem;font-size:1.125rem;line-height:1.8;opacity:0.7">Nestled in the heart of the Swiss Alps, The Aurelia offers an unparalleled escape where contemporary luxury meets timeless mountain charm. Our boutique property features 24 carefully curated suites, each designed to frame the spectacular alpine vistas.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"welcome__text","style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1rem"}}},"textColor":"contrast"} -->
				<p class="welcome__text has-contrast-color has-text-color" style="margin-bottom:1rem;font-size:1.125rem;line-height:1.8;opacity:0.7">Every detail has been thoughtfully considered - from locally sourced materials to our partnership with Michelin-starred chefs. We believe true luxury lies in authentic experiences and genuine hospitality.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"welcome__text","style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.8"},"spacing":{"margin":{"bottom":"1.5rem"}}},"textColor":"contrast"} -->
				<p class="welcome__text has-contrast-color has-text-color" style="margin-bottom:1.5rem;font-size:1.125rem;line-height:1.8;opacity:0.7">Whether you seek adventure on mountain trails or tranquility in our award-winning spa, The Aurelia becomes your sanctuary above the clouds.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"welcome__link","style":{"typography":{"fontSize":"1.125rem"}}} -->
				<p class="welcome__link" style="font-size:1.125rem"><a href="#experiences" style="color: hsl(45 90% 55%); text-decoration: none;">Discover Our Story →</a></p>
				<!-- /wp:paragraph -->

			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">

				<!-- wp:group {"className":"welcome__image","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"12px"},"dimensions":{"minHeight":"600px"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group welcome__image" style="border-radius:12px;min-height:600px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

					<!-- wp:cover {"url":"https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&h=1200&fit=crop","dimRatio":0,"minHeight":600,"isDark":false,"style":{"border":{"radius":"12px"}}} -->
					<div class="wp-block-cover is-light" style="border-radius:12px;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Luxury hotel interior lounge" src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&h=1200&fit=crop" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
					<!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
					<p class="has-text-align-center has-large-font-size"></p>
					<!-- /wp:paragraph --></div></div>
					<!-- /wp:cover -->

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
