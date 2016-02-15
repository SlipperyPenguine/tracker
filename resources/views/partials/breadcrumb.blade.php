@section('breadcrumbs')

    @foreach($breadcrumbs as $crumb)
        <li @if($crumb[2]== true) class="active" @endif >
            @if($crumb[2]) <strong> @endif
            @if($crumb[1]!='')
                <a href="{{$crumb[1]}}">{{$crumb[0]}}</a>
            @else
                {{$crumb[0]}}
            @endif

           @if($crumb[2]) </strong> @endif
        </li>

    @endforeach

@endsection