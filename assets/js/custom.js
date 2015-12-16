/**
 * Created by tutv95 on 10/12/2015.
 */

jQuery(document).ready(function ($) {
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

});