const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    // .js('resources/datatables/plugins/date-euro.js', 'public/datatables/plugins')
    // .js('resources/daterangepicker/moment.min.js', 'public/moment')
    // .js('resources/daterangepicker/daterangepicker.js', 'public/daterangepicker')
    // .postCss('resources/daterangepicker/daterangepicker.css', 'public/daterangepicker')
    .js('resources/bootstrap-timepicker/js/bootstrap-timepicker.js', 'public/bootstrap-timepicker/js')
    .postCss('resources/bootstrap-timepicker/css/bootstrap-timepicker.css', 'public/bootstrap-timepicker/css')
    .sass('resources/sass/app.scss', 'public/css');
    // .sass('resources/css/admin.scss', 'public/css/admin');
