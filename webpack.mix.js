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
    .js('resources/js/checkout.js', 'public/js')
<<<<<<< HEAD
     .css('resources/css/extra.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css',[
=======
    .css('resources/css/extra.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css',[
        require('postcss-import'),
>>>>>>> 2c61a53ef0f3182cf0a833532b26aeada9c07bcc
        require('tailwindcss'),
    ]);
   

  










