
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link rel="stylesheet"  href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('font-awesome/css/font-awesome.css') }}">

    <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/iCheck/custom.css') }}">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">OBD</h1>

        </div>
        <h3>Welcome to the One Biology dashboard</h3>

        <p>Login in is required to add and edit data</p>
        <form class="m-t" role="form" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>

            <div class="form-group">


                    <div class="i-checks"><label class=" control-label" for="remember">Remember Me </label> <label> {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!}   <i></i>  </label></div>

            </div>


            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
        </form>
        <p class="m-t"> <small>Developed by John Booth &copy; 2016</small> </p>
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

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

    });
</script>

</body>

</html>
