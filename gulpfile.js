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
    mix.sass('app.scss');
    mix.sass('fullcalendar.scss');
    mix.scripts(['jquery.js'], 'public/js/jquery.js');
    mix.scripts(['moment.js'], 'public/js/moment.js');
    mix.scripts(['fullcalendar.js'], 'public/js/fullcalendar.js');
    mix.scripts(['app.js'], 'public/js/app.js');
});
