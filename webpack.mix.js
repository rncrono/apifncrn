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

//  mix.js('resources/js/scripts.js', 'public/js')
//     .postCss('resources/css/styles.css', 'public/css', [
//         //
//     ]);
mix.disableNotifications();

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    
    ]);

mix.postCss('resources/css/head.css', 'public/css', [
    
]);

mix.postCss('resources/css/login.css', 'public/css', [
    
]);

mix.postCss('resources/css/admin/app.css', 'public/css/admin', [
    
]);