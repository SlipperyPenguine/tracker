{{\tracker\Helpers\Session::SetRedirect(action('ProjectController@edit', [$subject['program_id'], $subject['work_stream_id'], $subject['id']]))}}

@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-project" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
                        <h2>Edit Project</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            {!! Form::model($subject, [ 'id'=>'projectform', 'class'=>'smart-form', 'method' => 'PATCH', 'action'=>['ProjectController@update', $subject->id]]) !!}

                            @include('Project.partials.form')

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </article>

        </div>

    </section>

@endsection


