var elixir = require('laravel-elixir');
//process.env.DISABLE_NOTIFIER = true
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('*.scss');
});
elixir(function(mix){
    mix.scriptsIn([
        'public/metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js',
        'public/metronic/assets/global/plugins/select2/select2.min.js',
        'public/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',
        'public/metronic/assets/admin/pages/scripts/table-editable.js',
        'js/controllers/GeneralPageController.js'
    ],'public/js/view/sys-users.js');
});