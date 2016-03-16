@extends('layouts.main')

@section('header')

    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/gantt/dhtmlxgantt.css') }}">

    @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-tasks" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                    <h2>Tasks & Milestones</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <div class="custom-scroll table-responsive" style="height:600px; overflow-y: scroll;">

                            <div id="gantt_here" style='width:100%; height:100%;'></div>
                        </div>

                        <div class="widget-footer">
                            <div class="pull-left">
                                <a href="{{action('TaskController@createTask', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Task</a>
                            </div>
                            <a href="{{action('ProjectController@MicrosoftProjectUpload', [$subjectid])}}" class="btn btn-info btn-sm">Import MS Project File</a>

                        </div>

                    </div>
                </div>
            </div>

        </article>
    </div>
</section>
@endsection

@section('scripts')

        <!-- Gantt Charts -->
    <script src="{{ URL::asset('js/plugins/gantt/dhtmlxgantt.js') }}"></script>

    <script type="text/javascript">
        var tasks =  {
            data:[
                    @foreach($tasks as $task)
                {id:@if(isset($task->UID)){{$task->UID}} @else 999{{$task->id}}  @endif, text:"<a href='{{ URL::asset('tasks/') }}/{{$task['id']}}'>{{$task->title}}</a>", start_date:"{{$task->StartDate->format('d-m-Y')}}", @if($task->milestone==1) end_date:"{{$task->StartDate->adddays(1)->format('d-m-Y')}}" @else end_date:"{{$task->EndDate->format('d-m-Y')}}" @endif ,order:10,
                    @if(isset($task->parentUID))parent:{{$task->parentUID}}, @endif progress:0.4, open: true},
                @endforeach
            ],
            links:[
            ]
        };

        gantt.config.readonly = true;
        gantt.init("gantt_here");


        gantt.parse(tasks);

    </script>


@endsection