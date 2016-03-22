
<!-- HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo"> <img src="{{ URL::asset('img/logo.png') }}" alt="Traxker"> </span>
        <!-- END LOGO PLACEHOLDER -->

    </div>

    <!-- projects dropdown -->
    <div class="project-context hidden-xs">

        <span class="label">Projects:</span>
        <span class="project-selector dropdown-toggle" data-toggle="dropdown">Active Projects <i class="fa fa-angle-down"></i></span>

        <ul class="dropdown-menu">

        @foreach($projects as $project)

                <li>
                    <a href="{{action('ProjectController@show', [$project->program_id, $project->work_stream_id, $project->id])}}">{{$project->name}}</a>
                </li>

        @endforeach

        </ul>
        <!-- end dropdown-menu-->

    </div>
    <!-- end projects dropdown -->

    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->


        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">

            @if (Auth::guest())
                <span> <a href="{{ URL::asset('login') }}"><i class="fa fa-sign-in"></i></a> </span>
            @else
                <span> <a href="{{ URL::asset('logout') }}" title="Sign Out" data-action="userLogout" data-logout-msg="Logout"><i class="fa fa-sign-out"></i></a> </span>
            @endif

        </div>
        <!-- end logout button -->



        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->

        <!-- #Voice Command: Start Speech -->
        <div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
            <div>
                <a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a>
                <div class="popover bottom"><div class="arrow"></div>
                    <div class="popover-content">
                        <h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
                        <h4 class="vc-title-error text-center">
                            <i class="fa fa-microphone-slash"></i> Voice command failed
                            <br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
                            <br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
                        </h4>
                        <a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a>
                        <a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end voice command -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->


