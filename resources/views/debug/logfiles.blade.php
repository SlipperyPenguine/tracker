@extends('layouts.main')

@section('heading')Log Files @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('actions') }}">Logfiles</a>
    </li>

@endsection

@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-laravellog" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-file"></i> </span>
                        <h2>Laravel Log</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <textarea style=" overflow: scroll;white-space: nowrap; word-wrap: normal" class="form-control" rows="30" id="laravellog">{{$laravellog}}</textarea>

                            <!-- widget footer -->
                            <div class="widget-footer text-right">

                                <button id="btndeletelaravellog" class="btn btn-xs btn-danger">Delete</button>

                            </div>
                            <!-- end widget footer -->

                        </div>

                    </div>

                </div>
            </article>
        </div>
    </section>

@endsection

@section('scripts')

    <script>

        $("#btndeletelaravellog").click( function()
                {
                    $("#laravellog").val("DELETED");

                    request = $.ajax({
                        url: "{{ action('DebugController@deletelaravellog') }}",
                        type: "post",
                        data: { _token: "{{ csrf_token() }}" }
                    });
                }
        );
    </script>
@endsection