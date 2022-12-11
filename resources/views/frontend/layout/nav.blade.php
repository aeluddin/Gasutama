<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('/frontend/Assets/img/logo small.png') }}"
                alt="" height="37px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-5">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item dropdown mx-5">
                    <a class="nav-link dropdown-toggle {{ Request::is('projectPortofolio*') ? 'active' : '' }}{{ Request::is('designportofolio*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        PORTOFOLIO
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ Request::is('projectPortofolio*') ? 'active' : '' }}" href="/projectPortofolio">Project Portofolio</a></li>
                        <li><a class="dropdown-item {{ Request::is('designportofolio*') ? 'active' : '' }}" href="{{ route('designporto.frontend.index') }}">Design Portofolio</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link {{ Request::is('certificate*') ? 'active' : '' }}" href="{{ route('certificate.frontend.index') }}">CERTIFICATE</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="/contact">CONTACT</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link {{ Request::is('news*') ? 'active' : '' }}" href="{{ route('news.frontend.index') }}">NEWS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
