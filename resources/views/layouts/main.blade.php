<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{csrf_token()}}">

    <title>One Biology Program Tracker</title>

    <link rel="stylesheet"  href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('font-awesome/css/font-awesome.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/iCheck/custom.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/datapicker/datepicker3.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/sweetalert/sweetalert.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/select2/select2.min.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/vis/vis.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/dataTables/datatables.min.css') }}">


    <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">

    @yield('header')

</head>

<body>

<div id="wrapper">


    @include('partials.navbar')

    <div id="page-wrapper" class="gray-bg">
        @include('partials.topbar')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>@yield('heading')</h2>
                <ol class="breadcrumb">
                    @yield('breadcrumbs')
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            @yield('content')
            @include('partials.errors')
        </div>
        @include('partials.footer')

    </div>

</div>



<!-- Mainly scripts -->
<script src="{{ URL::asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ URL::asset('js/inspinia.js') }}"></script>
<script src="{{ URL::asset('js/plugins/pace/pace.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ URL::asset('js/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Data picker -->
<script src="{{ URL::asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

<!-- Toastr script -->
<script src="{{ URL::asset('js/plugins/toastr/toastr.min.js') }}"></script>

<!-- Sweetalerts script -->
<script src="{{ URL::asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('js/plugins/select2/select2.full.min.js') }}"></script>

<!-- Vis -->
<script src="{{ URL::asset('js/plugins/vis/vis.min.js') }}"></script>

<!-- Data Tables -->
<script src="{{ URL::asset('js/plugins/dataTables/datatables.min.js') }}"></script>


@include('partials.flash');

@yield('scripts')

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        @yield('readyfunction')
    });
</script>



</body>

</html>
