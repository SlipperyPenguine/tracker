<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
<div id="shortcut">
    <ul>

        <li>
            <a href="{{action('UserController@dashboard', auth()->user()->id)}}" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-desktop fa-4x"></i> <span>Dashboard</span> </span> </a>
        </li>
        <li>
            <a href="{{action('UserController@show', auth()->user()->id)}}" class="jarvismetro-tile big-cubes bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->
