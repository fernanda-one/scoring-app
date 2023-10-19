const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/scoringJuri.js', 'public/js')
    .js('resources/js/scoringDewan.js', 'public/js')
    .js('resources/js/scoreUpdate.js', 'public/js')
    .js('resources/js/operator.js', 'public/js')
    .js('resources/js/dropVerification.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.options({
    hmrOptions : {
        host: 'localhost',
        port:8080,
    }
})
