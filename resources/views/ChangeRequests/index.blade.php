@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-changerequests" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-adjust"></i> </span>
                    <h2>ChangeRequests</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        <table id="dt_changerequests" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th  data-class="expand">Ref</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th data-hide="always">Description</th>
                                <th class="text-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($changerequests as $changerequest)

                                <tr>
                                    <td>{{$changerequest->external_id}}</td>
                                    <td>{{$changerequest->title}}</td>
                                    <td>{{$changerequest['status']}}</td>
                                    <td>{{$changerequest['description']}}</td>

                                    <td><a href="{{ URL::asset('changerequests/') }}/{{$changerequest['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                        <a href="{{action('ChangeRequestController@edit', [$changerequest->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                        <div class="widget-footer">
                            <div class="pull-left">
                                <a href="{{action('ChangeRequestController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Change Request</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </article>
    </div>
</section>
@endsection

@section('readyfunction')

    @include('ChangeRequests.partials.listreadtyfunction')

@endsection



