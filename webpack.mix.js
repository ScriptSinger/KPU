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

mix.styles(
    [
        'resources/assets/admin/plugins/fontawesome-free/css/all.css',
        'resources/assets/admin/css/adminlte.css',
        'resources/assets/admin/plugins/select2/css/select2.css',
        'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
        'resources/assets/admin/plugins/DataTables/datatables.css',


    ],
    'public/assets/admin/css/adminlte.css');

mix.scripts(
    [
        'resources/assets/admin/plugins/jquery/jquery.min.js',
        'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.js',
        'resources/assets/admin/js/adminlte.js',
        'resources/assets/admin/plugins/select2/js/select2.full.js',
        'resources/assets/admin/js/demo.js',
        'resources/assets/admin/plugins/DataTables/datatables.js',


    ],
    'public/assets/admin/js/adminlte.js');

mix.copyDirectory(
    'resources/assets/admin/plugins/fontawesome-free/webfonts',
    'public/assets/admin/webfonts'
)
mix.copyDirectory(
    'resources/assets/admin/img',
    'public/assets/admin/img'
)
mix.copy(
    'resources/assets/admin/css/adminlte.css.map',
    'public/assets/admin/css/adminlte.css.map'
)

mix.js('resources/js/app.js', 'public/assets/auth/js')
    .sass('resources/sass/app.scss', 'public/assets/auth/css')
    .sourceMaps();

// npm install
// npm run dev