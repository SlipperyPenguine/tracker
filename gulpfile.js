var elixir = require('laravel-elixir');

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
    mix.sass('app.scss');

    //main script file
    mix.scripts([
        'libs/jquery-2.1.1.min.js',
        'libs/jquery-ui-1.10.3.min.js',
        'app.config.js',
        'plugin/jquery-touch/jquery.ui.touch-punch.min.js',
        'bootstrap/bootstrap.min.js',
        'notification/SmartNotification.js',
        'smartwidgets/jarvis.widget.min.js',
        'plugin/jquery-validate/jquery.validate.min.js',
        'plugin/masked-input/jquery.maskedinput.min.js',
        'plugins/select2/select2.full.min.js',
        'plugin/bootstrap-slider/bootstrap-slider.min.js',
        'plugin/msie-fix/jquery.mb.browser.min.js',
        'plugin/fastclick/fastclick.min.js',
        'app.min.js',
        'speech/voicecommand.min.js',
        'plugin/datatables/jquery.dataTables.min.js',
        'plugin/datatables/dataTables.colVis.min.js',
        'plugin/datatables/dataTables.tableTools.min.js',
        'plugin/datatables/dataTables.bootstrap.min.js',
        'plugin/datatable-responsive/datatables.responsive.min.js',
        'tracker.js',
        'plugins/datepicker/bootstrap-datepicker.js',
        'plugin/bootstrap-timepicker/bootstrap-timepicker.min.js',
        'plugins/vis/vis.min.js'

        ]);
});


