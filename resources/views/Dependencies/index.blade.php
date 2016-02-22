@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-bolt"></i> Dependencies</h5>
        </div>
        <div class="ibox-content ">
            <br/>
            <table class="table table-hover no-margins">
                <thead>
                <tr>

                    <th>Title</th>
                    <th>Type</th>
                    <th>Dependence</th>
                    <th>Status</th>
                    <th>Next Review</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($dependencies as $dependency)

                    <tr>

                        <td>{{$dependency->title}}</td>
                        <td>@if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif</td>
                        <td>{{$dependency->dependent_on_name}}</td>
                        <td>{{$dependency['status']}}</td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::StandardDateHTML($dependency->NextReviewDate, false, true, true) !!} </td>
                        <td>{{$dependency['description']}}</td>

                        <td><a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('DependencyController@edit', [$dependency->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('DependencyController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Dependency</a>
        </div>
    </div>



@endsection
