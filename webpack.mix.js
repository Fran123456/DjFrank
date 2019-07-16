const mix = require('laravel-mix');

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
// .sass('resources/sass/app.scss', 'public/css');


//vue, jquery, boostrap and others components
//mix.sass('resources/sass/app.scss', 'public/css');
//mix.js('resources/js/app.js', 'public/js'); 

//mix.sass('resources/sass/Admin/scss/style.scss', 'public/css');
//mix.sass('resources/sass/Admin/scss/themes/_all-themes.scss', 'public/css');


mix.styles([
    'resources/sass/Admin/style.css',
], 'public/css/style.css');


mix.styles([
    'resources/sass/Admin/all-themes.css',
], 'public/css/all-themes.css');

//mix.sass('resources/sass/app.scss', 'public/css');

mix.styles([
	'resources/sass/Admin/waves.css',
    'resources/sass/Admin/animate.css',
    'resources/sass/Admin/morris.css',
], 'public/css/plugins.css');

//all js scripts
mix.scripts([
    'resources/js/Admin/plugins/bootstrap-select/js/bootstrap-select.js', //Select Plugin Js
    'resources/js/Admin/plugins/jquery-slimscroll/jquery.slimscroll.js', //Slimscroll Plugin Js
    'resources/js/Admin/plugins/node-waves/waves.js', //Waves Effect Plugin Js
    'resources/js/Admin/plugins/jquery-countto/jquery.countTo.js', //Waves Effect Plugin Js
    'resources/js/Admin/plugins/raphael/raphael.min.js', //Morris Plugin Js
    'resources/js/Admin/plugins/morrisjs/morris.js', //Morris Plugin Js
    'resources/js/Admin/plugins/chartjs/Chart.bundle.js', //ChartJs
    'resources/js/Admin/plugins/flot-charts/jquery.flot.js', //Flot Charts Plugin Js
    'resources/js/Admin/plugins/flot-charts/jquery.flot.resize.js', //Flot Charts Plugin Js
    'resources/js/Admin/plugins/flot-charts/jquery.flot.pie.js', //Flot Charts Plugin Js
    'resources/js/Admin/plugins/flot-charts/jquery.flot.categories.js', //Flot Charts Plugin Js
    'resources/js/Admin/plugins/flot-charts/jquery.flot.time.js', //Flot Charts Plugin Js
    'resources/js/Admin/plugins/jquery-sparkline/jquery.sparkline.js', //FSparkline Chart Plugin Js
    'resources/js/Admin/js/admin.js', //Custom Js
    'resources/js/Admin/js/pages/index.js', //Custom Js
    'resources/js/Admin/js/demo.js', //Demo Js
    'resources/js/Admin/plugins/bootstrap-notify/bootstrap-notify.js', //Demo Js
    'resources/js/Admin/js/pages/ui/notifications.js'
], 'public/js/plugins.js');



mix.sass('resources/sass/default.scss', 'public/css');
//remember, boostrap core is not runing on laravelmix 
//because it has a .min css and js