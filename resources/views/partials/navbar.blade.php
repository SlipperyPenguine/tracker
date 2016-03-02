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
            <li @if(str_contains($controller,'PagesController') && str_contains($action,'welcome') )class="active" @endif>
                <a href="{{ URL::asset('welcome') }}" title="Welcome"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Welcome</span></a>
            </li>

            <li @if(str_contains($controller,'ProgramController') )class="active" @endif>
                <a href="{{ URL::asset('programs') }}" title="Programs"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">Programs</span></a>
            </li>

            <li @if(str_contains($controller,'RiskAndIssueController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('risks') }}" title="Risks"><i class="fa fa-lg fa-fw fa-warning"></i> <span class="menu-item-parent">Risks</span></a>
            </li>

            <li @if(str_contains($controller,'ActionController') && str_contains($action,'indexall') )class="active" @endif>
                <a href="{{ URL::asset('actions') }}" title="Actions"><i class="fa fa-lg fa-fw fa-bolt"></i> <span class="menu-item-parent">Actions</span></a>
            </li>

            @if(Auth::isSuperUser())
                <li @if(str_contains($controller,'UserController'))class="active" @endif>
                    <a href="#" title="Configuration"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">Configuration</span></a>
                <ul>
                    <li @if(str_contains($controller,'UserController') && str_contains($action,'index'))class="active" @endif>
                        <a href="{{ URL::asset('users') }}"><i class="fa fa-users"></i> Users</a>
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


