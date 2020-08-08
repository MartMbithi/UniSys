<div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu">
    <span class="offcanvas-close">
        <i class="fe-icon-x"></i>
    </span>
    <div class="px-4 pb-4">
        <h6>Menu</h6>
        <div class="d-flex justify-content-between pt-2">
            <div class="btn-group w-100 mr-2">
                <a class="btn btn-secondary btn-sm btn-block">
                    <img src="img/flags/en.png" alt="English"/>
                    English
                </a>
            </div>
            <a class="btn btn-primary btn-sm btn-block" target="_blank" href="https://github.com/MartMbithi/UniSys">
                <i class="fe-icon-download"></i>&nbsp;Download UniSys
            </a>
        </div>
    </div>
    <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
        <!-- Mobile Menu-->
        <div class="accordion mobile-menu" id="accordion-menu">
            <!-- Home-->
            <div class="card">
                <div class="card-header">
                    <a class="mobile-menu-link" href="{{ url('/') }}">Home</a>
                </div>
            </div>

            <!-- About UniSys-->
            <div class="card">
                <div class="card-header">
                    <a class="mobile-menu-link" href="{{ url('/about') }}">
                        About UniSys
                    </a>
                </div>
            </div>

            <!--Features-->
            <div class="card">
                <div class="card-header">
                    <a class="mobile-menu-link" href="{{ url('/features') }}">
                        UniSys Features
                    </a>
                </div>
            </div>

            <!--Installation Steps-->
            <div class="card">
                <div class="card-header">
                    <a class="mobile-menu-link" href="{{ url('/user-manual') }}">
                        User Manual
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>