@extends('layouts.simple')

@section('headerinbody')


    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Remembered Password?</span> <a href="{{url('/login')}}" class="btn btn-danger">Sign In</a> </span>

@endsection

@section('form')

<form method="post" id="reset-form" class="smart-form client-form" action="{{ url('/password/reset') }}">
    <header>
        Password Reset
    </header>

    {{csrf_field()}}
    <input type="hidden" name="token" value="{{ $token }}">
    <fieldset>

        <section>
            <label class="label">E-mail Address</label>
            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                <input type="email" name="email" value="{{ $email or old('email') }}">
                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter the email address</b></label>
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
            Reset Password
        </button>
    </footer>
</form>

@endsection

@section('scripts')
<script type="text/javascript">

    $(function() {
        // Validation
        $("#reset-form").validate({
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
                    required : 'Please enter the new password'
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