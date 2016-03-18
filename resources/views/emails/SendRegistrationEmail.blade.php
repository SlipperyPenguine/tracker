@extends('emails.template')

@section('Subject_line') Congratulations, you have registered for Program Tracker @endsection

@section('online_link') {{Config::get('app.url')}} @endsection

@section('title')Your registration details are as follows: @endsection

@section('contents')
    <tr>
        <td colspan="2" style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">

            <table>

                <tr>
                    <td>Name: </td>
                    <td>{{$user->name}}</td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>{{$user->email}}</td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><i>The Password you entered</i> <small>(you can reset your password if you forget it)</small></td>
                </tr>

            </table>

        </td>
    </tr>




@endsection
