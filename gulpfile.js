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
// sys-user view js&css
elixir(function(mix){
    mix.scripts([
        'public/metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js',
        'public/metronic/assets/global/plugins/select2/select2.min.js',
        'public/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',
        'public/metronic/assets/admin/pages/scripts/table-editable.js',
        'public/metronic/theme/topical/default/js/controllers/GeneralPageController.js'
    ],'public/js/view/sys-user.js','public');
})
elixir(function(mix){
    mix.styles([
        "public/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css",
        "public/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css",
        "public/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css",
        "public/metronic/assets/global/plugins/uniform/css/uniform.default.css",
        "public/metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
    ],'public/css/BEGINGLOBALMANDATORYSTYLES.css','public');
});