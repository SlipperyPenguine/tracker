@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-bullseye"></i> RAGs</h5>
        </div>
        <div class="ibox-content ">
            <br/>
            <table class="table table-hover no-margins">
                <thead>
                <tr>
                    <th></th>
                    <th>Status</th>
                    <th>Comments</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($rags as $rag)

                    <tr>
                        <td>{{$rag['title']}}</td>
                        <td>
                            {!! $formater::FormatRAG($rag->value) !!}
                        </td>
                        <td>{{$rag['comments']}}</td>
                        <td>
                            <a href="{{ URL::asset('rags/') }}/{{$rag['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('RagController@edit', [$rag->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('RagController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new RAG</a>
        </div>
    </div>

@endsection

