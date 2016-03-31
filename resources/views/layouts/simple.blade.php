
<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
    <meta charset="utf-8">
    <title> Program Tracker</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="token" content="{{csrf_token()}}">
    <meta name="base_assets_url" content="{{ URL::asset('') }}">

    <!-- #CSS Links -->

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

    @yield('headers')
</head>

<body style="background-color: white; background: none;" class="animated fadeInDown">

<header id="header">

    <div id="logo-group">
        <span id="logo"> <img src="{{asset('img/logo.png')}}" alt="SmartAdmin"> </span>
    </div>

    @yield('headerinbody')
</header>



<div id="main" role="main" style="margin-left: 0">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        @include('partials.errors')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">Program Tracker</h1>
                <div class="hero">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">Welcome to the Program Tracker.  A single home for all the risks, issues, actions, dependencies, change requests and more...</h4>

                    </div>

                    <img src="{{asset('img/demo/iphoneview.png')}}" class="pull-right display-image" alt="" style="width:210px">

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">About Program Tracker</h5>
                        <p>
                            The program tracker has been created to help us coordinate key information related to One Biology.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Still in development</h5>
                        <p>
                            If you have suggestions for improvements or find a bug please <a href="mailto:john.booth@syngenta.com">Email Me</a>
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    @yield('form')
                </div>


            </div>
        </div>
    </div>

</div>

<div id='divSmallBoxes'></div>
<div id='divMiniIcons'>
    <div id='divbigBoxes'></div>

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ URL::asset('js/plugin/pace/pace.min.js') }}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->

    <script src="{{ URL::asset('js/all.js') }}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->


<script type="text/javascript">
    runAllForms();
</script>

@include('partials.flash');

@yield('scripts')

<script>
    $(document).ready(function() {

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();

    });
</script>

</body>
</html>