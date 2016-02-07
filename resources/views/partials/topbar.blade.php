<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">

                <ul class="dropdown-menu dropdown-messages">

                </ul>
            </li>

            <li>

                @if (Auth::guest())
                    <a href="{{ URL::asset('auth/login') }}">
                        <i class="fa fa-sign-in"></i> Login / Register
                    </a>
                @else
                    <a href="{{ URL::asset('auth/logout') }}">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                @endif
            </li>
            <li>
                <a class="right-sidebar-toggle">
                    <i class="fa fa-tasks"></i>
                </a>
            </li>

        </ul>


</nav>
</div>

