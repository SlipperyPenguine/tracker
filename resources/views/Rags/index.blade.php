{{\tracker\Helpers\Session::SetRedirect(action('RagController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">


    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-rags" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-tachometer"></i> </span>
                    <h2>RAGs</h2>

                    <div class="widget-toolbar">
                        <a href="{{action('RagController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new RAG</a>
                    </div>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="dt_rags" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-nowrap" data-class="expand">Title</th>
                                <th>Status</th>
                                <th class="text-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($rags as $rag)

                                <tr>
                                    <td>{{$rag['title']}}</td>
                                    <td>
                                        {!! $formater::FormatRAG($rag->value) !!}
                                    </td>
                                    <td>
                                        <a href="{{ URL::asset('rags/') }}/{{$rag['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{action('RagController@edit', [$rag->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>



        </article>

    </div>

</section>


@endsection

@section('readyfunction')

    var responsiveHelper = undefined;

    $('#dt_rags').dataTable({

    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[5] )) {
    $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[5] )) {
    $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
    }
    },
    "pageLength": 20,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
    {"targets": [2],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper) {
    responsiveHelper = new ResponsiveDatatablesHelper($('#dt_rags'), breakpointDefinition_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper.createExpandIcon(nRow);
    },
    });

@endsection

