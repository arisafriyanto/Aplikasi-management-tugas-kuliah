<div class="navbar-bg bg-info"></div>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{asset('/img/aff.png')}}" alt="logo" width="200px">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">AFF</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fas fa-fire"></i><span>Dashboard</span>
            </a>
        </li>
        
        @role('user')

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-layer-group"></i> <span>Semester</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="/semester_I">Semester I</a>
                </li>

                <li><a class="nav-link" href="/semester_II">Semester II</a></li>
                <li><a class="nav-link" href="/semester_III">Semester III</a></li>
                <li><a class="nav-link" href="/semester_IV">Semester IV</a></li>
                <li><a class="nav-link" href="/semester_V">Semester V</a></li>
                <li><a class="nav-link" href="/semester_VI">Semester VI</a></li>
                <li><a class="nav-link" href="/semester_VII">Semester VII</a></li>
                <li><a class="nav-link" href="/semester_VIII">Semester VIII</a></li>
            </ul>
        </li>

        @endrole

        @role('admin')

        <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
                <i class="fas fa-users"> </i><span>Users</span>
            </a>
        </li>

        @endrole

        <li class="nav-item">
            <a href="/account/{{ auth()->user()->id }}" class="nav-link">
                <i class="fas fa-user"> </i><span>Account</span>
            </a>
        </li>


        </ul>
        
    </aside>
</div>