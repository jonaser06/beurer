var mix = require('laravel-mix');

mix.sass('./src/scss/app.scss', './assets/css')
.options({
    processCssUrls: false
})
    .js('./src/js/app.js', './assets/js');