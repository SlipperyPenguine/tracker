<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <meta name="token" content="{{csrf_token()}}">
    <meta name="base_assets_url" content="{{ URL::asset('') }}">

    <title>Tracker</title>
    <meta name="description" content="A tool for tracking the One Biology Program">
    <meta name="author" content="John Booth">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/app.css') }}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('img/favicon/favicon.ico') }}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

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

<body class="{!! session('body-class', 'normal') !!}"  >

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

    @if(auth()->check())
        @include('partials.shortcut')
    @endif

    <div id='divSmallBoxes'></div>
    <div id='divMiniIcons'>
        <div id='divbigBoxes'></div>


            <!--================================================== -->

    <script src="{{ URL::asset('js/all.js') }}"></script>


    <!--[if IE 8]>

    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

    <![endif]-->

    @include('partials.flash');

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>

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
