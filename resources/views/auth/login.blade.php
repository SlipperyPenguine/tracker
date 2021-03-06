@extends('layouts.simple')

@section('headerinbody')
    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="{{url('/register')}}" class="btn btn-danger">Create account</a> </span>
@endsection

@section('form')
    <form method="post" id="login-form" class="smart-form client-form">
        <header>
            Sign In
        </header>

        {{csrf_field()}}
        <fieldset>

            <section>
                <label class="label">E-mail</label>
                <label class="input"> <i class="icon-append fa fa-envelope"></i>
                    <input type="email" name="email">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
            </section>

            <section>
                <label class="label">Password</label>
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                    <input type="password" name="password">
                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                <div class="note">
                    <a href="{{ url('/password/reset') }}">Forgot password?</a>
                </div>
            </section>

            <section>
                <label class="checkbox">
                    <input type="checkbox" name="remember" checked="">
                    <i></i>Stay signed in</label>
            </section>
        </fieldset>
        <footer>
            <button type="submit" class="btn btn-primary">
                Sign in
            </button>
        </footer>
    </form>

@endsection

@section('scripts')


    <script type="text/javascript">
        $(function() {
            // Validation
            $("#login-form").validate({
                // Rules for form validation
                rules : {
                    email : {
                        required : true,
                        email : true
                    },
                    password : {
                        required : true,
                        minlength : 3,
                        maxlength : 20
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

@endsection
