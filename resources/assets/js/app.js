
$(document).ready(function () {
	$(window).on('scroll', function (e) {
		if (window.scrollY > 10) {
			$('#main-navbar').addClass('navbar-no-trans');
		} else {
			$('#main-navbar').removeClass('navbar-no-trans');
		}
	});

	$(".form-material.floating > .form-control").each(function() {
		var a = $(this);
		var d = a.parent(".form-material");

		setTimeout(function() {
			a.val() && d.addClass("open")
		}, 150);

		a.on("change", function() {
			a.val() ? d.addClass("open") : d.removeClass("open")
		})
	})
});

import './component'
