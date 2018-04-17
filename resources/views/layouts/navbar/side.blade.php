<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Example user</strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    UPC
                </div>
            </li>
            <li class="{{ isActiveRoute('member.*') }}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">{{ __('app.u_members') }}</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('member.*') }}">
                        <a href="{{ route('member.index') }}"><i class="fa fa-list-ul"></i> <span class="nav-label">{{ __('app.u_member_list') }}</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span></a>
            </li>
        </ul>
    </div>
</nav>
