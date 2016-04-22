<div class="well">

    <table width="100%">
        <tr>
            <td>
                <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['name']}} </strong> </H1>
                <H4>part of {{$program['name']}}, Phase {{$subject['phase']}}</H4>
                <div class="">
                    <H4><i class="fa fa-road"></i> {{$subject->StatusText}}</H4>
                </div>
            </td>
            <td valign="centre" class="text-right">
                <a href="{{action('ProgramController@edit', [$subject->id])}}" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
            </td>
        </tr>
        <tr>
            <td>
                <div>{{$subject['description']}}</div>
            </td>
            <td valign="bottom" class="text-right">
                <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
            </td>
        </tr>
    </table>

</div>