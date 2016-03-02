<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <meta name="token" content="{{csrf_token()}}">

    <title>Tracker</title>
    <meta name="description" content="A tool for tracking the One Biology Program">
    <meta name="author" content="John Booth">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/font-awesome.min.css') }}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-production-plugins.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-skins.min.css') }}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-rtl.min.css') }}">


{{--    <link rel="stylesheet"  href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('font-awesome/css/font-awesome.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/iCheck/custom.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/datapicker/datepicker3.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/sweetalert/sweetalert.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/select2/select2.min.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/vis/vis.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/dataTables/datatables.min.css') }}">


    <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">--}}

        <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('img/favicon/favicon.ico') }}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{ URL::asset('img/splash/sptouch-icon-iphone.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('img/splash/touch-icon-ipad.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('img/splash/touch-icon-iphone-retina.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('img/splash/touch-icon-ipad-retina.png') }}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{ URL::asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">


    @yield('header')

</head>

<!-- #BODY -->
<!-- Possible Classes

    * 'smart-style-{SKIN#}'
    * 'smart-rtl'         - Switch theme mode to RTL
    * 'menu-on-top'       - Switch to top navigation (no DOM change required)
    * 'no-menu'			  - Hides the menu completely
    * 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
    * 'fixed-header'      - Fixes the header
    * 'fixed-navigation'  - Fixes the main menu
    * 'fixed-ribbon'      - Fixes breadcrumb
    * 'fixed-page-footer' - Fixes footer
    * 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
-->
<body class="">


    @include('partials.topbar')

    @include('partials.navbar')

    <!-- MAIN PANEL -->
    <div id="main" role="main">


        <!-- RIBBON -->
        <div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

            <!-- breadcrumb -->
            <ol class="breadcrumb">
                @yield('breadcrumbs')
            </ol>
            <!-- end breadcrumb -->

            <!-- You can also add more buttons to the
            ribbon for further usability

            Example below:

            <span class="ribbon-button-alignment pull-right">
            <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
            <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
            <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
            </span> -->

        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            @yield('content')
            @include('partials.errors')

        </div>
    </div>
    <!-- END MAIN PANEL -->

    @include('partials.footer')

    @include('partials.shortcut')


            <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ URL::asset('js/plugin/pace/pace.min.js') }}"></script>

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="{{ URL::asset('js/libs/jquery-2.1.1.min.js') }}"><\/script>');
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="{{ URL::asset('js/libs/jquery-ui-1.10.3.min.js') }}"><\/script>');
        }
    </script>

    <!-- IMPORTANT: APP CONFIG -->
    <script src="{{ URL::asset('js/app.config.js') }}"></script>

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
    <script src="{{ URL::asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- CUSTOM NOTIFICATION -->
    <script src="{{ URL::asset('js/notification/SmartNotification.min.js') }}"></script>

    <!-- JARVIS WIDGETS -->
    <script src="{{ URL::asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>

    <!-- JQUERY VALIDATE -->
    <script src="{{ URL::asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

    <!-- JQUERY MASKED INPUT -->
    <script src="{{ URL::asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

    <!-- JQUERY SELECT2 INPUT -->
    <script src="{{ URL::asset('js/plugin/select2/select2.min.js') }}"></script>

    <!-- JQUERY UI + Bootstrap Slider -->
    <script src="{{ URL::asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

    <!-- browser msie issue fix -->
    <script src="{{ URL::asset('js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

    <!-- FastClick: For mobile devices -->
    <script src="{{ URL::asset('js/plugin/fastclick/fastclick.min.js') }}"></script>

    <!--[if IE 8]>

    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

    <![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="{{ URL::asset('js/app.min.js') }}"></script>

    <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
    <!-- Voice command : plugin -->
    <script src="{{ URL::asset('js/speech/voicecommand.min.js') }}"></script>

    <!-- SmartChat UI : plugin -->
    <script src="{{ URL::asset('js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>



<!-- iCheck -->
{{--<script src="{{ URL::asset('js/plugins/iCheck/icheck.min.js') }}"></script>--}}

<!-- Data picker -->
{{--<script src="{{ URL::asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>--}}

<!-- Toastr script -->
{{--<script src="{{ URL::asset('js/plugins/toastr/toastr.min.js') }}"></script>--}}

<!-- Sweetalerts script -->
{{--<script src="{{ URL::asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>--}}

<!-- Select2 -->
{{--<script src="{{ URL::asset('js/plugins/select2/select2.full.min.js') }}"></script>--}}

<!-- Vis -->
<script src="{{ URL::asset('js/plugins/vis/vis.min.js') }}"></script>

<!-- Data Tables -->
{{--<script src="{{ URL::asset('js/plugins/dataTables/datatables.min.js') }}"></script>--}}


@include('partials.flash');

@yield('scripts')

<script>
        $(document).ready(function() {

            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            pageSetUp();


        @yield('readyfunction')
    });
</script>



</body>

</html>
