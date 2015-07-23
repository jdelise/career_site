var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;
elixir(function(mix) {
    mix.sass('app.scss');
    // Front End
    mix.styles([
    "rev-settings.css",
    "bootstrap.css",
    "icons-styles.css",
    "template.css",
    "responsive-devices.css",
    "updates.css",
    "gold.css",
    "custom.css"
    ],'public/frontend/css/','public/frontend/css');
    // Admin
    mix.styles([
        "custom.css",
        "layout.css"
    ],'public/admin/css/','public/admin/css');
    mix.styles([
        "default.css"
    ],'public/admin/css/themes','public/admin/css/themes');
    mix.styles([
        "components.css",
        "components-rounded.css",
        "plugins.css"
    ],'public/global/css/','public/global/css/');
    mix.scripts([
        "modernizr.custom.js",
        "bootstrap.js",
        "jquery.themepunch.revolution.min.js",
        "clean-js-plugins.js",
        "cleanlab_script.js",
        "jquery.themepunch.plugins.min.js",
        "mlpushmenu.js"


    ],'public/frontend/js/','public/frontend/js');
});
