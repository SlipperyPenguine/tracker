<div class="jarviswidget jarviswidget-color-darken" id="wid-id-rags" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-tachometer"></i> </span>
        <h2>RAGs</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

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
                            <a href="{{ URL::asset('rags/') }}/{{$rag['id']}}" class="btn btn-default btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('RagController@edit', [$rag->id])}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="widget-footer">
                <div class="pull-left">
                    <a href="{{action('RagController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new RAG</a>

                </div>
                <a href="{{action('RagController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-folder"></i> View All </a>

            </div>

        </div>
    </div>
</div>

