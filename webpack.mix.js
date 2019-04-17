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
      //extensions: ['.js', '.json', '.vue', '.css', '.scss'],
      alias: {
        '@': path.resolve(__dirname, 'resources/src/'),
        admin: path.resolve(__dirname, 'resources/src/admin/'),
      }
    }
  })
  .options({
  postCss: [
    require('postcss-unprefix'),
    require('autoprefixer')({
      browsers: '>0.1%'
    }),
    require('cssnano')({
      preset: ['default', {
        discardComments: {
          removeAll: true,
        },
      }]
    }),
  ]
})

mix.copy('resources/src/admin/img', 'public/images')