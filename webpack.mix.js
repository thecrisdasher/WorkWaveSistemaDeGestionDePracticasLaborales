const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/assets/js/argon-dashboard.js')
    .sass('resources/scss/argon-dashboard.scss', 'public/assets/css/argon-dashboard.css', [
        //
    ]);
