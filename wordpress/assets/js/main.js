/**
 * Main JavaScript for Aurelia Hotel Theme
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

(function() {
	'use strict';

	/**
	 * DOM Ready
	 */
	document.addEventListener('DOMContentLoaded', function() {

		// Initialize components
		initSmoothScroll();
		initMobileMenu();

		console.log('Aurelia Hotel Theme loaded successfully');
	});

	/**
	 * Smooth Scroll for Anchor Links
	 */
	function initSmoothScroll() {
		const links = document.querySelectorAll('a[href^="#"]');

		links.forEach(function(link) {
			link.addEventListener('click', function(e) {
				const targetId = this.getAttribute('href');

				// Skip if it's just "#"
				if (targetId === '#') {
					return;
				}

				const target = document.querySelector(targetId);

				if (target) {
					e.preventDefault();
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			});
		});
	}

	/**
	 * Mobile Menu Toggle
	 * (Placeholder - WordPress navigation handles this, but can be customized)
	 */
	function initMobileMenu() {
		const menuToggles = document.querySelectorAll('.wp-block-navigation__responsive-container-open');

		menuToggles.forEach(function(toggle) {
			// Custom mobile menu logic can be added here
			// WordPress core handles basic functionality
		});
	}

	/**
	 * Booking Widget Sticky Behavior
	 * (Placeholder for future implementation)
	 */
	function initStickyBookingWidget() {
		const bookingWidget = document.querySelector('.hero-booking-widget');

		if (!bookingWidget) {
			return;
		}

		window.addEventListener('scroll', function() {
			const scrollPosition = window.scrollY;
			const heroHeight = window.innerHeight;

			if (scrollPosition > heroHeight - 100) {
				bookingWidget.classList.add('is-sticky');
			} else {
				bookingWidget.classList.remove('is-sticky');
			}
		});
	}

	/**
	 * Image Lazy Load Enhancement
	 * (WordPress handles native lazy loading, this is for additional effects)
	 */
	function initImageLazyLoad() {
		if ('IntersectionObserver' in window) {
			const imageObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
						const img = entry.target;
						img.classList.add('animate-fade-in-up');
						observer.unobserve(img);
					}
				});
			});

			const images = document.querySelectorAll('.wp-block-image img');
			images.forEach(function(img) {
				imageObserver.observe(img);
			});
		}
	}

	/**
	 * AJAX Utility for Booking Forms
	 * (Placeholder for future booking widget integration)
	 */
	window.aureliaAjax = window.aureliaAjax || {};

	window.aureliaAjax.send = function(action, data, callback) {
		// Ensure we have the AJAX object from WordPress
		if (typeof aureliaAjax === 'undefined') {
			console.error('aureliaAjax object not found');
			return;
		}

		// Prepare form data
		const formData = new FormData();
		formData.append('action', action);
		formData.append('nonce', aureliaAjax.nonce);

		// Add custom data
		for (const key in data) {
			if (data.hasOwnProperty(key)) {
				formData.append(key, data[key]);
			}
		}

		// Send AJAX request
		fetch(aureliaAjax.ajaxurl, {
			method: 'POST',
			body: formData,
			credentials: 'same-origin'
		})
		.then(function(response) {
			return response.json();
		})
		.then(function(result) {
			if (callback && typeof callback === 'function') {
				callback(result);
			}
		})
		.catch(function(error) {
			console.error('AJAX Error:', error);
		});
	};

})();
