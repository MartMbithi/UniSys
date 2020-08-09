<header class="navbar-wrapper navbar-sticky">
    <div class="d-table-cell align-middle pr-md-3">
        <a class="navbar-brand mr-1" href="index-2.html">
            <img src="{{ url('img/logo/logo-dark.png') }}" alt="Logo"/>
        </a>
    </div>
    <div class="d-table-cell w-100 align-middle pl-md-3">
    <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
            <div>
                <a class="navbar-link mr-3" href="tel:+254737229776">
                    <i class="fe-icon-phone"></i>
                    +254 737 22 9776
                </a>
                <a class="navbar-link mr-3" href="mailto:martdevelopers254@gmail.com">
                    <i class="fe-icon-mail"></i>
                    mail@unisys.org
                </a>
                <a class="social-btn sb-style-3 sb-twitter" target="_blank" href="https://twitter.com/martinezmbithi">
                    <i class="socicon-twitter"></i>
                </a>
                <a class="social-btn sb-style-3 sb-facebook" target="_blank" href="https://www.facebook.com/martin.mbithi.73">
                    <i class="socicon-facebook"></i>
                </a>
                <a class="social-btn sb-style-3 sb-github" target="_blank" href="https://github.com/MartMbithi/">
                    <i class="socicon-github"></i>
                </a>
            </div>
        <div>
        </div>
    </div>
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
                    Documentation
                </a>
            </li>
        </ul>
        <div>
        <ul class="navbar-buttons d-inline-block align-middle mr-lg-2">
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
</header>