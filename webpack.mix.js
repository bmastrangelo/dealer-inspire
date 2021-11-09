const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack'); //to access built-in plugins

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js')
        }
    },
    plugins: [
        // ...
        new webpack.ProvidePlugin({
            $: 'jquery',
            jquery: 'jquery',
            'window.jQuery': 'jquery',
            jQuery: 'jquery'
        })
    ]
};
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
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.browserSync({
    proxy: 'http://dealer-inspire',
    host: 'dealer-inspire',
    port: 8080,
    open: 'external'
});
