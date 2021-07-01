let mix = require('laravel-mix');
const config = require('./webpack.config');
require('laravel-mix-workbox');

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
/* === CONTROL PANEL === */
mix.webpackConfig(config)
    .copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/jjs', 'public/js')
    .ts('resources/js/app.ts', 'public/js').vue()
    .sass('resources/sass/app.scss', 'public/css')
    /*.browserSync({
        ui: false,
        proxy: {
            target: process.env.MIX_APP_URL
        },
        ignore: ['app'],
        https: true,
        notify: false,
        port: 3030
    })*/
    .generateSW({
        // Do not precache images
        exclude: [/\.(?:png|jpg|jpeg|svg)$/],

        maximumFileSizeToCacheInBytes: 5000000,

        // Define runtime caching rules.
        runtimeCaching: [{
            // Match any request that ends with .png, .jpg, .jpeg or .svg.
            urlPattern: /\.(?:png|jpg|jpeg|svg)$/,

            // Apply a cache-first strategy.
            handler: 'CacheFirst',

            options: {
                // Use a custom cache name.
                cacheName: 'images',

                // Only cache 10 images.
                expiration: {
                    maxEntries: 10,
                },
            },
        }],

        skipWaiting: true
    });

mix.disableNotifications();


if (mix.inProduction()) {
    mix.version();
}
