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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).sass('resources/sass/homepage.scss','public/sass')
    .sass('resources/sass/login.scss','public/sass')
    .sass('resources/sass/adminlayout.scss','public/sass')
    .sass('resources/sass/ProductsManagement.scss','public/sass')
    .sass('resources/sass/collectionmanagement.scss','public/sass')
    .sass('resources/sass/ProductDetails.scss','public/sass')
    .sass('resources/sass/collectiondetails.scss','public/sass')
    .sass('resources/sass/StockManagement.scss','public/sass')
    .sass('resources/sass/orders.scss','public/sass')
    .sass('resources/sass/products.scss','public/sass')
    .sass('resources/sass/verifyemail.scss','public/sass');