<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    @if(Auth::check())
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="{{ URL::asset(Auth::user()->avatar) }}" alt="me" class="online" />
						<span>
							{{Auth::user()->name}}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    @endif
    <!-- end user info -->

    <nav>
        <!--
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>


            <li @if(str_contains($controller,'ProgramController') )class="active" @endif>
                <a href="{{ URL::asset('programs') }}" title="Programs"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">Programs</span></a>
            </li>

            <li @if(str_contains($controller,'RiskAndIssueController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('risks') }}" title="Risks"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">Risks</span></a>
            </li>

            <li @if(str_contains($controller,'ActionController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('actions') }}" title="Actions"><i class="fa fa-lg fa-fw fa-bolt"></i> <span class="menu-item-parent">Actions</span></a>
            </li>

            <li @if(str_contains($controller,'TaskController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('tasks') }}" title="Tasks"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Tasks</span></a>
            </li>

            <li @if(str_contains($controller,'ChangeRequestController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('changerequests') }}" title="Change Requests"><i class="fa fa-lg fa-fw fa-adjust"></i> <span class="menu-item-parent">Change Requests</span></a>
            </li>

            <li @if(str_contains($controller,'DependencyController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('dependencies') }}" title="Dependencies"><i class="fa fa-lg fa-fw fa-link"></i> <span class="menu-item-parent">Dependencies</span></a>
            </li>

            @if(Auth::isSuperUser())
                <li @if(str_contains($controller,'UserController'))class="active" @endif>
                    <a href="#" title="Configuration"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">Configuration</span></a>
                <ul>
                    <li @if(str_contains($controller,'UserController') && str_contains($action,'index'))class="active" @endif>
                        <a href="{{ URL::asset('users') }}"><i class="fa fa-users"></i> Users</a>
                    </li>

                    <li @if(str_contains($controller,'DebugController') && str_contains($action,'logfiles'))class="active" @endif>
                        <a href="{{ action('DebugController@logfiles') }}"><i class="fa fa-files-o"></i> Logs</a>
                    </li>

                </ul>
            </li>
            @endif

        </ul>

    </nav>


        <span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>


</aside>


