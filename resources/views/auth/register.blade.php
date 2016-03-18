
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
    <!-- Basic Styles -->
    <link rel="stylesheet"  href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/font-awesome.min.css') }}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-production-plugins.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-skins.min.css') }}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/smartadmin-rtl.min.css') }}">

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

    <link rel="stylesheet"  href="{{ URL::asset('css/tracker.css') }}">
</head>

<body class="animated fadeInDown">

<header id="header">

    <div id="logo-group">
        <span id="logo"> <img src="{{asset('img/logo.png')}}" alt="SmartAdmin"> </span>
    </div>

    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Already registered?</span> <a href="{{url('auth/login')}}" class="btn btn-danger">Sign In</a> </span>

</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

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
                    <form method="post" id="registration-form" class="smart-form client-form">
                        <header>
                            Register
                        </header>

                        {{csrf_field()}}

                        <fieldset>
                            <section>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="text" name="name" placeholder="Your Name">
                                    <b class="tooltip tooltip-bottom-right">Needed for display purposes</b> </label>
                            </section>

                            <section>
                                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email address">
                                    <b class="tooltip tooltip-bottom-right">Needed to login to Program Tracker</b> </label>
                            </section>

                            <section>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password" placeholder="Password" id="password">
                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                            </section>

                            <section>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password_confirmation" placeholder="Confirm password">
                                    <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
                            </section>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </footer>

                        <div class="message">
                            <i class="fa fa-check"></i>
                            <p>
                                Thank you for your registration!
                            </p>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>

</div>

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

<!-- BOOTSTRAP JS -->
<script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{ URL::asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{ URL::asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="{{ URL::asset('js/app.min.js') }}"></script>

<!--  My custom functions -->
<script src="{{ URL::asset('js/tracker.js') }}"></script>

<script type="text/javascript">
    runAllForms();

    $(function() {
        // Validation
        $("#registration-form").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true,
                    minlength : 4
                },
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                },
                password_confirmation : {
                    required : true,
                    minlength : 3,
                    maxlength : 20,
                    equalTo : '#password'
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password : {
                    required : 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();

    });
</script>

</body>
</html>