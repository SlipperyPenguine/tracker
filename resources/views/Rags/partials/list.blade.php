<div class="jarviswidget jarviswidget-color-darken" id="wid-id-rags" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-tachometer"></i> </span>
        <h2>RAGs</h2>

        <div class="widget-toolbar">
            <a href="{{action('RagController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new RAG</a>
            <a href="{{action('RagController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>
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

                @foreach($subject->RAGs as $rag)

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

