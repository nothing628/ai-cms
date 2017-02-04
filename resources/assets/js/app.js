
$(document).ready(function () {
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
