@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-links" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-external-link"></i> </span>
                    <h2>{{$title}}</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        {!! Form::model($link, ['id'=>'LinkForm', 'class'=>'smart-form', 'method' => 'PATCH', 'action'=>['LinkController@update', $link->id]]) !!}

                        @include('Links.partials.form')

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </article>

    </div>

</section>

@endsection
