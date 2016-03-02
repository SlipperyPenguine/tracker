@extends('layouts.main')
@section('header')
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/nouslider/jquery.nouislider.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/nouslider/nouislider.pips.css') }}">
@endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-risks" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-warning"></i> </span>
                        <h2>{{$title}}</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            {!! Form::model($risk, ['id'=>'RiskForm', 'class'=>'smart-form', 'method' => 'PATCH', 'action'=>['RiskAndIssueController@update', $risk->id]]) !!}

                            @include('RisksAndIssues.partials.form')

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>

            </article>

        </div>

    </section>



@endsection
