<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" height="60" class="img-circle" src="{{ URL::asset('img/avatars/JohnBoothProfile.jpg') }}" />

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">John Booth</strong>
                             </span> <span class="text-muted text-xs block">IS Lead <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    TRACKER
                </div>
            </li>

            <li @if(str_contains($controller,'PagesController') && str_contains($action,'welcome') )class="active" @endif>
                <a href="{{ URL::asset('welcome') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Main View</span></a>
            </li>


            <li @if(str_contains($controller,'ProgramController') )class="active" @endif>
                <a href="{{ URL::asset('programs') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Programs</span></a>
            </li>

            @if(Auth::isSuperUser())
                <li @if(str_contains($controller,'UserController'))class="active" @endif>
                    <a href="{{ URL::asset('dashboard/users') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Configuration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(str_contains($controller,'UserController') && str_contains($action,'index'))class="active" @endif><a href="{{ URL::asset('dashboard/users') }}">Users</a></li>
                    </ul>
                </li>
            @endif

        </ul>

    </div>
</nav>