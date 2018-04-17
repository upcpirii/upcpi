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

// mix.webpackConfig({
//   node: {
//     fs: "empty"
//   },
//   resolve: {
//     modules: [
//       path.resolve('./resources/assets'),
//       path.resolve('./node_modules')
//     ]
//   },
//   module: {
//     rules: [
//       {
//         test: /\.jsx?$/,
//         use: {
//           loader: 'babel-loader',
//           options: {
//             presets: ['env', 'stage-3']
//           }
//         }
//       }
//     ]
//   }
// });

  mix.sass('resources/assets/sass/app.scss', 'public/css');
  mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
  mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts');
  mix.copy('resources/assets/vendor/dataTables/js/jquery.dataTables.min.js', 'public/js');
  mix.styles([
    'resources/assets/vendor/bootstrap/css/bootstrap.css',
    'resources/assets/vendor/font-awesome/css/font-awesome.css',
    'resources/assets/vendor/dataTables/css/datatables.min.css',
    'resources/assets/vendor/animate/animate.css',
    'resources/assets/vendor/style.css',
  ], 'public/css/vendor.css', './');
  mix.scripts([
    'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
    'resources/assets/vendor/bootstrap/js/bootstrap.js',
    'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
    'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
    'resources/assets/js/app.js',
    'resources/assets/vendor/pace/pace.min.js'
  ], 'public/js/app.js', './');
//
// mix.js
//
// mix.js('resources/assets/js/app.js', 'public/js')
//
//   .js('node_modules/instascan/src/scanner.js', 'public/js')
//   // .js('node_modules/instascan/src/camera.js', 'public/js')
//   // .js('node_modules/instascan/src/zxing.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');
