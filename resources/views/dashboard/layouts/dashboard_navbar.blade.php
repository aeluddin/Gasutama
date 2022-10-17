<div class="navbar-bg">
<nav class="navbar navbar-expand-lg main-navbar ">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <div class="d-sm-none d-lg-inline-block">Hi, {{  auth()->user()->name  }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger "><i class="fas fa-sign-out-alt"> </i> Keluar</button>
                  </form>
            </div>
        </li>
    </ul>
</nav>
