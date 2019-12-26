const mix = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .js('resources/assets/js/app.js', 'public/js')
    .copy('node_modules/materialize-css/fonts/**', 'public/fonts')
    .webpackConfig({
        resolve: {
            alias: {
                materialize: 'materialize-css/dist/js/materialize.js'
            }
        }
    })
    .version(['public/css/app.css', 'public/js/app.js'])
