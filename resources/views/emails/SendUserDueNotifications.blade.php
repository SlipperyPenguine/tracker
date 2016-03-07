@extends('emails.template')

@section('Subject_line') You have items that are due for review @endsection

@section('online_link') {{Config::get('app.url')}} @endsection

@section('title')The following items are in need of your attention: @endsection

@section('contents')
    <tr>
        <td colspan="2" style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">

            <table>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Review</th>
                        <th></th>
                    </tr>
                </thead>

                @if($actions->count()>0)
                    @foreach($actions as $action)
                        <tr>
                            <td>Action</td>
                            <td>{{$action->id}}</td>
                            <td>{{$action->subject_type}}</td>
                            <td>{{$action->subject_name}}</td>
                            <td>{{$action->title}}</td>
                            <td>{{$action->DueDate->diffForHumans()}} ({{$action->DueDate->format('d M Y')}})</td>
                            <td><a href="{{Config::get('app.url') . action('ActionController@show', ['id'=>$action->id], false)}}">View Online</a> </td>
                        </tr>
                    @endforeach

                @endif


                @if($risks->count()>0)

                    @foreach($risks as $risk)
                        <tr>
                            <td>Risk</td>
                            <td>{{$risk->id}}</td>
                            <td>{{$risk->subject_type}}</td>
                            <td>{{$risk->subject_name}}</td>
                            <td>{{$risk->title}}</td>
                            <td>{{$risk->NextReviewDate->diffForHumans()}} ({{$risk->NextReviewDate->format('d M Y')}})</td>
                            <td><a href="{{Config::get('app.url') . action('RiskAndIssueController@show', ['id'=>$risk->id], false)}}">View Online</a> </td>
                        </tr>
                    @endforeach
                @endif

            </table>



        </td>
    </tr>




@endsection
