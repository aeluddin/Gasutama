<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">PT.lukistama</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">LT</a>
        </div>

        <ul class="sidebar-menu">
            <li class=" menu-header"></li>
            <li class=" menu-header">Dashboard</li>
            <li><a class=" nav-link" href="/"><i class="bi bi-house"></i><span>Home</span> </a></li>
            <li class=" menu-header">Menu Manage</li>
            <li class="nav-item {{ Request::is('dashboard/profile*') ? 'active' : '' }}">
                <a class="nav-link " aria-current="page" href="/dashboard/profile"><i class="bi bi-grid-1x2"></i><span> Porto Profile</span> </a>
            </li>
            <li class="nav-item {{ Request::is('dashboard/porto_desain*') ? 'active' : '' }}">
                <a class="nav-link " aria-current="page" href="/dashboard/porto_desain"><i class="bi bi-stickies-fill"></i><span>Porto Desain</span> </a>
            </li>
            <li class="nav-item  {{ Request::is('dashboard/sartifikasi*') ? 'active' : '' }}">
                <a class="nav-link" aria-current="page" href="/dashboard/sartifikasi"><i class="bi bi-stickies-fill"></i><span>Sartifikasi</span> </a>
            </li>
            <li class="nav-item  {{ Request::is('dashboard/ourclient*') ? 'active' : '' }}">
                <a class="nav-link" aria-current="page" href="/dashboard/ourclient"><i class="bi bi-stickies-fill"></i><span>Our Client</span> </a>
            </li>
            <li class="nav-item  {{ Request::is('dashboard/news*') ? 'active' : '' }}">
                <a class="nav-link" aria-current="page" href="{{ route('news.index') }}"><i class="fa fa-newspaper"></i><span>News</span> </a>
            </li>

            <li class=" menu-header">User Manage</li>
            <li class="nav-item  {{ Request::is('dashboard/user*') ? 'active' : '' }}">
                <a class="nav-link" aria-current="page" href="/dashboard/user"><i class="bi bi-person-lines-fill"></i><span>User</span> </a>
            </li>
        </ul>
    </aside>
</div>
