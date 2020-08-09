<header class="navbar-wrapper navbar-boxed navbar-simple-ghost">
    <div class="container-fluid">
        <div class="d-table-cell align-middle pr-md-3">
            <a class="navbar-brand mr-1" href="{{ url('/') }}">
                <img src="{{ url('img/logo/logo-light.png') }}" height="100" width="200" alt="UniSys"/>
            </a>
        </div>
        <div class="d-table-cell w-100 align-middle pl-md-3">
            <div class="navbar justify-content-end justify-content-lg-between">
            <!-- Search-->
            <form class="search-box" method="get">
                <input type="text" id="site-search" placeholder="Type A or C to see suggestions"><span class="search-close"><i class="fe-icon-x"></i></span>
            </form>
            <!-- Main Menu-->
            <ul class="navbar-nav d-none d-lg-block">
                <!-- Home-->
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <!-- About-->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">
                        About UniSys
                    </a>
                </li>
                <!--Features-->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/modules') }}">
                        Modules
                    </a>
                </li>
                <!--Installation Steps-->
                <li class="nav-item mega-dropdown-toggle">
                    <a class="nav-link" href="{{ url('/user-manual') }}">
                        User Manual
                    </a>
                </li>
            </ul>
            <div>
                <ul class="navbar-buttons d-inline-block align-middle">
                    <li class="d-block d-lg-none">
                        <a href="#mobile-menu" data-toggle="offcanvas">
                            <i class="fe-icon-menu"></i>
                        </a>
                    </li>
                </ul>
                <a class="btn btn-gradient ml-3 d-none d-xl-inline-block" href="https://github.com/MartMbithi/UniSys" target="_blank">Download UniSys</a>
            </div>
            </div>
        </div>
    </div>
</header>