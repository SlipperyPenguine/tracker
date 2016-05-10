{{\tracker\Helpers\Session::SetRedirect(action('LinkController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

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

                    <div class="widget-toolbar">
                        <a href="{{action('LinkController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Link</a>
                    </div>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="dt_links" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-nowrap" data-class="expand">Link</th>
                                <th class="text-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($links as $link)

                                <tr>
                                    <td class="table-title">
                                        <a class="table-title" target="_blank" href="{{ $link->url }}">{{$link->title}}</a>
                                    </td>
                                    <td>
                                        <a href="{{ URL::asset('links/') }}/{{$link['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{action('LinkController@edit', [$link->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-default btn-sm"
                                           rel="tooltip" data-placement="top" data-original-title="Delete"
                                           href="{{action('LinkController@destroy', $link->id)}}"
                                           data-delete=""
                                           data-title="Delete Link"
                                           data-message="Are you sure you want to delete this link?"
                                           data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> </a>
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

    $('#dt_links').dataTable({

    "pageLength": 20,
    "order": [[ 0, "asc" ]],
    "columnDefs": [
    {"targets": [1],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')

    });

@endsection

