<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    @if(Auth::check())
                    <img alt="image" height="60" class="img-circle" src="{{ URL::asset(Auth::user()->avatar) }}" />

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                             <b class="caret"></b> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ URL::asset('users/'.Auth::user()->id) }}">Profile</a></li>
                        <li><a href="{{ URL::asset('auth/logout') }}">Logout</a></li>
                    </ul>
                        @endif
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

            <li @if(str_contains($controller,'RiskAndIssueController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('risks') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Risks</span></a>
            </li>

            @if(Auth::isSuperUser())
                <li @if(str_contains($controller,'UserController'))class="active" @endif>
                    <a href="{{ URL::asset('dashboard/users') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Configuration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li @if(str_contains($controller,'UserController') && str_contains($action,'index'))class="active" @endif><a href="{{ URL::asset('users') }}">Users</a></li>
                    </ul>
                </li>
            @endif

        </ul>

    </div>
</nav>