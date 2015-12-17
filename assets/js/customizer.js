/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});
	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind(function (to) {
			if ('blank' === to) {
				$('.site-title a, .site-description').css({
					'clip'    : 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				});
			} else {
				$('.site-title a, .site-description').css({
					'clip'    : 'auto',
					'position': 'relative'
				});
				$('.site-title a, .site-description').css({
					'color': to
				});
			}
		});
	});

	// affix header
	$(document).ready(function () {
		$('.affix-top').affix({
			offset: {
				top: $('header').outerHeight(true)
			}
		});
	});

	$('#masthead .navbar > .menu-item-has-children, .navbar > li ul li').hover(
		function () {
			$(this).children('.sub-menu').stop(true, false).slideDown(250);
		},
		function () {
			$(this).children('.sub-menu').stop(true, false).slideUp(250);
		}
	);

})(jQuery);
