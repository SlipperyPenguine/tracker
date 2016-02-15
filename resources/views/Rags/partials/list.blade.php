<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><i class="fa fa-tachometer"></i> RAGs</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content no-padding">

        <table class="table table-hover no-margins">
            <thead>
            <tr>
                <th></th>
                <th>Status</th>
                <th>Comments</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($subject->RAGs as $rag)

                <tr>
                    <td>{{$rag['title']}}</td>
                    <td>
                        {!! $formater::FormatRAG($rag->value) !!}
                    </td>
                    <td>{{$rag['comments']}}</td>
                    <td>
                        <a href="{{ URL::asset('rags/') }}/{{$rag['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('RagController@edit', [$rag->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('RagController@index', [$subjecttype, $subjectid])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('RagController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new RAG</a>
    </div>
</div>