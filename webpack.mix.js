let mix = require('laravel-mix');
const config = require('./webpack.config');

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
    .browserSync({
        ui: false,
        proxy: {
            target: process.env.MIX_APP_URL
        },
        ignore: ['app'],
        notify: false,
        port: 3030
    });

mix.disableNotifications();


if (mix.inProduction()) {
    mix.version();
}
