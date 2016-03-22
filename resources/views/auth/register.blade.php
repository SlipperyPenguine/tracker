@extends('layouts.simple')

@section('headerinbody')
    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Already registered?</span> <a href="{{url('/login')}}" class="btn btn-danger">Sign In</a> </span>
@endsection

@section('form')
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
    @endsection

@section('scripts')

    <script type="text/javascript">
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

@endsection
