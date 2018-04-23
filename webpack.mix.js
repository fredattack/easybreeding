let mix = require('laravel-mix');

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
// resources/assets/images
mix.copyDirectory('resources/assets/img', '/public/img');
mix.copyDirectory('resources/assets/images', 'public/images');
mix.copyDirectory('resources/assets/icons', 'public/icons');




mix.sass('resources/assets/sass/frontend/site/style.scss', 'public/css/sitefrontend.css')
    .sass('resources/assets/sass/frontend/app/style.scss', 'public/css/appfrontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')
    .js('resources/assets/js/frontend/app/app.js', 'public/js/appfrontend.js')
    .js('resources/assets/js/frontend/site/app.js', 'public/js/sitefrontend.js')
    .js([
        'resources/assets/js/backend/before.js',
        'resources/assets/js/backend/app.js',
        'resources/assets/js/backend/after.js'
    ], 'public/js/backend.js')
    .mix.react('resources/assets/js/frontend/site/app.jsx', 'public/js/react.js');

if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}

// mix.disableNotifications();