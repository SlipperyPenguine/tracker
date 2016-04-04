@extends('layouts.main')

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-meetings" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                    <h2>{{$title}}</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        {!! Form::model($meeting, ['id'=>'meetingsform', 'class'=>'smart-form', 'method' => 'PATCH', 'action'=>['MeetingController@update', $meeting->id]]) !!}

                        @include('Meetings.partials.form')

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </article>

    </div>

</section>


@endsection
