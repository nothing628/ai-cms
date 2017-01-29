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

elixir.extend('remove', function(path) {
	new elixir.Task('remove', function() {
		del(path);
	});
});

elixir(mix => {
	mix.styles('app.css');
	mix.rollup('app.js');
	mix.copy('bundle.css', 'public/css/bundle.css');
	mix.remove('bundle.css');

	mix.scripts('base/plupload.full.min.js');
	mix.webpack('base/chosen.js');
	mix.webpack('base/jquery.js');
	mix.webpack('base/vue.js');
});
