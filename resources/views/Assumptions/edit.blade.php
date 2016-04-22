@extends('layouts.main')

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-assumptions" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
                    <h2>{{$title}}</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        {!! Form::model($item, ['id'=>'assumptionsform', 'class'=>'smart-form', 'method' => 'PATCH', 'action'=>['AssumptionController@update', $item->id]]) !!}

                        @include('Assumptions.partials.form')

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </article>

    </div>

</section>


@endsection
