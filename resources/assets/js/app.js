String.prototype.format = String.prototype.f = function() {
    var s = this,
        i = arguments.length;

    while (i--) {
        s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
    }
    return s;
};

$(document).ready(function () {
	App.initHelper('appear');

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

import './init'
