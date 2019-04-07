const mix = require('laravel-mix')
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

mix.js('resources/src/admin/index.js', 'public/js/app-admin.js')
mix.js('resources/src/admin/main-login.js', 'public/js/app-admin-login.js')
  .webpackConfig({
    resolve: {
      symlinks: false,
      alias: {
        '@': path.resolve(__dirname, 'resources/src/'),
      }
    }
  })

mix.copy('resources/src/admin/img', 'public/images')