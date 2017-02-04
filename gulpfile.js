const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var del = require('del');

elixir.extend('sourcemaps', false);

elixir.extend('remove', function(path) {
	new elixir.Task('remove', function() {
		del(path);
	});
});

elixir(mix => {
	mix.less('./node_modules/slick-carousel/slick/slick.less');
	mix.scripts('./node_modules/slick-carousel/slick/slick.js');

	mix.styles(['app.css', 'oneui.css', 'modern.css'], 'public/css/app.css');
	mix.scripts('oneui.js');
	mix.webpack('app.js');

	mix.scripts('base/plupload.full.min.js');
	mix.webpack('base/chosen.js');
	mix.webpack('base/jquery.js');
	mix.webpack('base/vue.js');
});
