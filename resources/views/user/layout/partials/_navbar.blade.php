<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('Dashboard') }}">
            <h3 style="color: #10008c;">{{env('APP_NAME')}}</h3>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('Dashboard') }}"><img src="{{ asset('assets/images/favicon-32x32.png') }}"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" id="container-navbar-toggler" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-logout d-lg-block">
                <a class="nav-link" href="{{ route('Logout') }}">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
