
$(document).ready(function () {
	$(window).on('scroll', function (e) {
		if (window.scrollY > 10) {
			$('#main-navbar').addClass('navbar-no-trans');
		} else {
			$('#main-navbar').removeClass('navbar-no-trans');
		}
	});
});