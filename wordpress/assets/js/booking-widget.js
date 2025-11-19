/**
 * Booking Widget JavaScript
 *
 * Handles date picker functionality, form validation, and guest selection
 *
 * @package Aurelia_Hotel
 * @since 1.0.0
 */

(function() {
	'use strict';

	/**
	 * Booking Widget Handler
	 */
	class BookingWidget {
		constructor() {
			this.form = null;
			this.checkInInput = null;
			this.checkOutInput = null;
			this.guestsSelect = null;
			this.submitButton = null;
			this.isSticky = false;

			this.init();
		}

		/**
		 * Initialize the booking widget
		 */
		init() {
			// Wait for DOM to be ready
			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', () => this.setup());
			} else {
				this.setup();
			}
		}

		/**
		 * Setup widget functionality
		 */
		setup() {
			this.findElements();

			if (!this.checkInInput || !this.checkOutInput) {
				return; // Exit if booking widget doesn't exist on this page
			}

			this.setMinDates();
			this.attachEventListeners();
			this.setupStickyBehavior();
		}

		/**
		 * Find DOM elements
		 */
		findElements() {
			const bookingWidget = document.querySelector('.aurelia-booking-widget');

			if (!bookingWidget) {
				return;
			}

			this.form = bookingWidget;
			this.checkInInput = bookingWidget.querySelector('.booking-date-input[aria-label*="Check-in"]');
			this.checkOutInput = bookingWidget.querySelector('.booking-date-input[aria-label*="Check-out"]');
			this.guestsSelect = bookingWidget.querySelector('.booking-select-input');
			this.submitButton = bookingWidget.querySelector('.wp-block-button__link');
		}

		/**
		 * Set minimum dates for date inputs
		 */
		setMinDates() {
			const today = new Date();
			const tomorrow = new Date(today);
			tomorrow.setDate(tomorrow.getDate() + 1);

			const todayStr = this.formatDateForInput(today);
			const tomorrowStr = this.formatDateForInput(tomorrow);

			// Set minimum date for check-in to today
			this.checkInInput.setAttribute('min', todayStr);

			// Set minimum date for check-out to tomorrow
			this.checkOutInput.setAttribute('min', tomorrowStr);
		}

		/**
		 * Format date for input value (YYYY-MM-DD)
		 */
		formatDateForInput(date) {
			const year = date.getFullYear();
			const month = String(date.getMonth() + 1).padStart(2, '0');
			const day = String(date.getDate()).padStart(2, '0');
			return `${year}-${month}-${day}`;
		}

		/**
		 * Format date for display (e.g., "Jan 15, 2024")
		 */
		formatDateForDisplay(dateStr) {
			if (!dateStr) return '';

			const date = new Date(dateStr + 'T00:00:00');
			const options = { year: 'numeric', month: 'short', day: 'numeric' };
			return date.toLocaleDateString('en-US', options);
		}

		/**
		 * Attach event listeners
		 */
		attachEventListeners() {
			// Check-in date change
			this.checkInInput.addEventListener('change', () => {
				this.validateCheckIn();
				this.updateCheckOutMin();
			});

			// Check-out date change
			this.checkOutInput.addEventListener('change', () => {
				this.validateCheckOut();
			});

			// Form submission
			if (this.submitButton) {
				this.submitButton.addEventListener('click', (e) => {
					this.handleSubmit(e);
				});
			}

			// Input focus effects
			[this.checkInInput, this.checkOutInput].forEach(input => {
				input.addEventListener('focus', () => {
					input.parentElement.classList.add('focused');
				});

				input.addEventListener('blur', () => {
					input.parentElement.classList.remove('focused');
				});
			});
		}

		/**
		 * Update minimum checkout date based on check-in
		 */
		updateCheckOutMin() {
			const checkInDate = new Date(this.checkInInput.value + 'T00:00:00');

			if (!isNaN(checkInDate.getTime())) {
				const minCheckOut = new Date(checkInDate);
				minCheckOut.setDate(minCheckOut.getDate() + 1);
				this.checkOutInput.setAttribute('min', this.formatDateForInput(minCheckOut));

				// Clear check-out if it's before the new minimum
				const checkOutDate = new Date(this.checkOutInput.value + 'T00:00:00');
				if (checkOutDate <= checkInDate) {
					this.checkOutInput.value = '';
				}
			}
		}

		/**
		 * Validate check-in date
		 */
		validateCheckIn() {
			const value = this.checkInInput.value;

			if (!value) {
				this.showError(this.checkInInput, 'Please select a check-in date');
				return false;
			}

			const checkInDate = new Date(value + 'T00:00:00');
			const today = new Date();
			today.setHours(0, 0, 0, 0);

			if (checkInDate < today) {
				this.showError(this.checkInInput, 'Check-in date cannot be in the past');
				this.checkInInput.value = '';
				return false;
			}

			this.clearError(this.checkInInput);
			return true;
		}

		/**
		 * Validate check-out date
		 */
		validateCheckOut() {
			const checkInValue = this.checkInInput.value;
			const checkOutValue = this.checkOutInput.value;

			if (!checkOutValue) {
				this.showError(this.checkOutInput, 'Please select a check-out date');
				return false;
			}

			if (!checkInValue) {
				this.showError(this.checkOutInput, 'Please select check-in date first');
				this.checkOutInput.value = '';
				return false;
			}

			const checkInDate = new Date(checkInValue + 'T00:00:00');
			const checkOutDate = new Date(checkOutValue + 'T00:00:00');

			if (checkOutDate <= checkInDate) {
				this.showError(this.checkOutInput, 'Check-out must be after check-in');
				this.checkOutInput.value = '';
				return false;
			}

			this.clearError(this.checkOutInput);
			return true;
		}

		/**
		 * Show error message
		 */
		showError(input, message) {
			this.clearError(input);

			const errorDiv = document.createElement('div');
			errorDiv.className = 'booking-error';
			errorDiv.textContent = message;
			errorDiv.style.cssText = `
				color: #dc2626;
				font-size: 0.75rem;
				margin-top: 0.25rem;
				animation: fadeIn 0.3s ease;
			`;

			input.parentElement.appendChild(errorDiv);
			input.style.borderColor = '#dc2626';
		}

		/**
		 * Clear error message
		 */
		clearError(input) {
			const existingError = input.parentElement.querySelector('.booking-error');
			if (existingError) {
				existingError.remove();
			}
			input.style.borderColor = '';
		}

		/**
		 * Handle form submission
		 */
		handleSubmit(e) {
			e.preventDefault();

			// Validate all fields
			const checkInValid = this.validateCheckIn();
			const checkOutValid = this.validateCheckOut();

			if (!checkInValid || !checkOutValid) {
				this.showNotification('Please fill in all required fields', 'error');
				return;
			}

			// Get form data
			const formData = {
				checkIn: this.checkInInput.value,
				checkOut: this.checkOutInput.value,
				guests: this.guestsSelect ? this.guestsSelect.value : '2',
				checkInDisplay: this.formatDateForDisplay(this.checkInInput.value),
				checkOutDisplay: this.formatDateForDisplay(this.checkOutInput.value),
			};

			// Calculate nights
			const checkInDate = new Date(formData.checkIn + 'T00:00:00');
			const checkOutDate = new Date(formData.checkOut + 'T00:00:00');
			const nights = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));

			formData.nights = nights;

			// Log booking data (in production, this would make an API call)
			console.log('Booking Request:', formData);

			// Show success notification
			this.showNotification(
				`Availability request submitted for ${nights} night(s) - ${formData.checkInDisplay} to ${formData.checkOutDisplay}`,
				'success'
			);

			// In a real implementation, you would send this data to your booking system
			// Example: this.submitToBookingSystem(formData);
		}

		/**
		 * Submit to booking system (placeholder for actual implementation)
		 */
		submitToBookingSystem(formData) {
			// This would typically make an AJAX call to your WordPress backend
			// or an external booking system API

			if (typeof wp !== 'undefined' && wp.ajax) {
				wp.ajax.post('aurelia_check_availability', {
					nonce: aureliaBooking.nonce,
					data: formData
				}).done((response) => {
					console.log('Booking response:', response);
				}).fail((error) => {
					console.error('Booking error:', error);
				});
			}
		}

		/**
		 * Show notification toast
		 */
		showNotification(message, type = 'success') {
			// Remove existing notifications
			const existingToast = document.querySelector('.booking-toast');
			if (existingToast) {
				existingToast.remove();
			}

			const toast = document.createElement('div');
			toast.className = 'booking-toast';
			toast.textContent = message;

			const bgColor = type === 'success' ? '#16a34a' : '#dc2626';

			toast.style.cssText = `
				position: fixed;
				bottom: 2rem;
				right: 2rem;
				background-color: ${bgColor};
				color: white;
				padding: 1rem 1.5rem;
				border-radius: 0.5rem;
				box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
				z-index: 1000;
				animation: slideInRight 0.3s ease;
				max-width: 400px;
			`;

			document.body.appendChild(toast);

			// Auto-remove after 5 seconds
			setTimeout(() => {
				toast.style.animation = 'slideOutRight 0.3s ease';
				setTimeout(() => toast.remove(), 300);
			}, 5000);
		}

		/**
		 * Setup sticky behavior for hero booking widget
		 */
		setupStickyBehavior() {
			// Only apply sticky behavior if in hero section
			const heroSection = document.querySelector('.aurelia-hero-section');
			if (!heroSection || !this.form) {
				return;
			}

			const handleScroll = () => {
				const heroHeight = window.innerHeight;
				const scrollY = window.scrollY;

				if (scrollY > heroHeight - 100 && !this.isSticky) {
					this.isSticky = true;
					this.form.classList.add('is-sticky');
				} else if (scrollY <= heroHeight - 100 && this.isSticky) {
					this.isSticky = false;
					this.form.classList.remove('is-sticky');
				}
			};

			window.addEventListener('scroll', handleScroll);
		}
	}

	/**
	 * Add animation keyframes
	 */
	const style = document.createElement('style');
	style.textContent = `
		@keyframes slideInRight {
			from {
				transform: translateX(100%);
				opacity: 0;
			}
			to {
				transform: translateX(0);
				opacity: 1;
			}
		}

		@keyframes slideOutRight {
			from {
				transform: translateX(0);
				opacity: 1;
			}
			to {
				transform: translateX(100%);
				opacity: 0;
			}
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}
			to {
				opacity: 1;
			}
		}

		.aurelia-booking-widget.is-sticky {
			position: fixed !important;
			bottom: 2rem !important;
			left: 50% !important;
			transform: translateX(-50%) !important;
			z-index: 100 !important;
			max-width: 1000px !important;
			width: calc(100% - 2rem) !important;
			animation: slideInUp 0.3s ease !important;
		}

		@keyframes slideInUp {
			from {
				transform: translateX(-50%) translateY(100%);
				opacity: 0;
			}
			to {
				transform: translateX(-50%) translateY(0);
				opacity: 1;
			}
		}

		.booking-field.focused {
			transform: scale(1.01);
			transition: transform 0.2s ease;
		}
	`;
	document.head.appendChild(style);

	/**
	 * Initialize booking widget
	 */
	new BookingWidget();

})();
