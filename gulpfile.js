var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss')



    .scripts([
        "jquery.min.js",
        "masonry.pkgd.min.js",    
        "semantic.min.js",
        "angular/angular.min.js",        
        "main.js",
        "app/app.js",
        "gallery.js"
    ], 'public/js/bundle.js')



    .styles([
    	"semantic-ui/semantic.min.css"
    ], 'public/css/styles.css')



    .version([
    	'public/js/bundle.js',
    	'public/css/styles.css',
    	'public/css/app.css'
    ])


    .copy('resources/assets/img', 'public/img')

    .copy('resources/assets/css/semantic-ui/themes', 'public/build/css/themes')

    .copy('resources/assets/js/app/memes.json', 'public/js/memes.json')

    .copy('resources/assets/js/app/templates', 'public/js/templates');
});
