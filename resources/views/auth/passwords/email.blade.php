@extends('layouts.simple')

@section('headerinbody')


    <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Remembered Password?</span> <a href="{{url('/login')}}" class="btn btn-danger">Sign In</a> </span>

@endsection

@section('form')

<form method="post" id="email-form" class="smart-form client-form" action="{{ url('/password/email') }}">
    <header>
        Email Reset Password Link
    </header>

    {{csrf_field()}}
    <fieldset>

        <section>
            <label class="label">E-mail Address</label>
            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                <input type="email" name="email">
                <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter the email address</b></label>
        </section>

    </fieldset>
    <footer>
        <button type="submit" class="btn btn-primary">
            Send Password Reset
        </button>
    </footer>
</form>

@endsection

@section('scripts')
<script type="text/javascript">

    $(function() {
        // Validation
        $("#email-form").validate({
            // Rules for form validation
            rules : {
                email : {
                    required : true,
                    email : true
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
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