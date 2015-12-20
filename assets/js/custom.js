/**
 * Created by tutv95 on 10/12/2015.
 */

jQuery(document).ready(function ($) {
	/**
	 * Preloader
	 */
	$(window).load(function () {
		$('.preloader-active .wrapper').fadeIn();
		$('.preloader-active #loader-wrapper').fadeOut();
	});

	/**
	 * Back to top
	 */
	var back_to_top = $("#back-to-top");
	if ($(window).scrollTop() == 0) {
		back_to_top.hide();
	}

	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {
			back_to_top.fadeIn();
		} else {
			back_to_top.fadeOut();
		}
	});

	back_to_top.click(function () {
		$('html, body').animate({scrollTop: 0}, 800);
		return false;
	});

	// Affix header
	$('.sticky_menu .affix-top').affix({
		offset: {
			top: 1
		}
	});

	// Sub menu
	$('#masthead .navbar > .menu-item-has-children, .navbar > li ul li').hover(
		function () {
			$(this).children('.sub-menu').stop(true, false).slideDown(250);
		},
		function () {
			$(this).children('.sub-menu').stop(true, false).slideUp(250);
		}
	);

	$('.content-pusher .comment-form-comment').insertBefore('.form-submit');

	// Mobile menu
	jQuery('.menu-mobile-effect').click(function (e) {
		e.stopPropagation();
		jQuery('.wrapper').toggleClass('mobile-menu-open');
	});
	jQuery('#content').click(function () {
		jQuery('.wrapper').removeClass('mobile-menu-open');
	});

	$('.mobile-menu-container .navbar-nav>li.menu-item-has-children >a').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
	$('.mobile-menu-container .navbar-nav>li.menu-item-has-children .icon-toggle').click(function () {
		//alert('test');
		if ($(this).next('ul.sub-menu').is(':hidden')) {
			$(this).next('ul.sub-menu').slideDown(200, 'linear');
			$(this).html('<i class="fa fa-angle-up"></i>');
		}
		else {
			$(this).next('ul.sub-menu').slideUp(200, 'linear');
			$(this).html('<i class="fa fa-angle-down"></i>');
		}
	});

});