<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('img/profile_small.jpg') }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">David Williams</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ Route::is('admin.dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">{{ __('Dashboard') }}</span></a>
            </li>

            <li class="{{ Route::is('admin.users.index') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span class="nav-label">{{ __('Users List') }}</span></a>
            </li>
        </ul>
    </div>
</nav>

