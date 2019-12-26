const mix = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/app.js', 'public/js')
    .copy('node_modules/materialize-css/fonts/**', 'public/fonts')
    .version(['public/css/app.css', 'public/js/app.js'])
