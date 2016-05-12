@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program->name}}</a>
    </li>
    <li>
        Workstreams
    </li>
    <li>
        <a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}">{{$workstream->name}}</a>
    </li>
    <li>
        Projects
    </li>
    <li>
       <a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}/projects/{{$project->id}}">{{$project->name}}</a>
    </li>

    <li class="active">
        <strong>Microsoft Project Upload</strong>
    </li>
@endsection

@section('content')

        <section id="widget-grid" class="">

        <div class="well">
        {{--Form to select a file to upload--}}
        {!! Form::open(['id'=>'msprojectfileuploadform', 'class'=>'smart-form', 'url'=>route('MicrosoftProjectUpload', $project->id )]) !!}

            <fieldset>

                <section>



                    <input id="xmlfile" name="xmlfile" type="file" accept=".xml" class="filestyle" data-buttonText="Select Project XML File" data-buttonName="btn btn-primary btn-sm" data-buttonBefore="true">

                </section>

                <section>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Upload File
                    </button>

                </section>

            </fieldset>

            <fieldset>
                <section>
                    <div class="row" >
                        <div class="col col-lg-12" id="uploading" style="display: none">
                            <p>
                                <span id="progresstext" class="pull-right">0%</span>
                                <h3 id="fileloading"><i class="fa fa-cog fa-spin"></i> File is uploading...</h3>

                            </p>
                            <div class="progress">
                                <div id="uploadprogressbar" class="progress-bar bg-color-green" role="progressbar" style="width: 0%"></div>
                            </div>

                        </div>
                    </div>

                </section>
            </fieldset>

        {!! Form::close() !!}

            <section>

            <label>Extended Attributes</label>

            {!! Form::select('extendedAttributes', [], null ,['class'=>"form-control", 'id'=>"extendedAttributes"] ) !!}

            </section>

            <section>
            <button id="btnParseFile" type="button" class="btn btn-primary btn-lg btn-block">
                Parse File
            </button>
            </section>
        </div>

            <div class="row" id="ajaxresponse">

            </div>


    </section>
@endsection

    @section('scripts')

            <!-- Validate -->
    <script src="{{ URL::asset('js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Filestype -->
    <script src="{{ URL::asset('js/plugins/filestyle/filestyle.min.js') }}"></script>

    @include('Project.partials.ajaxscript')




@endsection

@section('readyfunction')

    $(":file").filestyle();

    $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content') }
    });

@endsection