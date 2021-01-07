<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo e(route('Dashboard')); ?>">
            <h3 style="color: #10008c;"><?php echo e(env('APP_NAME')); ?></h3>
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('Dashboard')); ?>"><img src="<?php echo e(asset('assets/images/logo-mini.svg')); ?>"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" id="container-navbar-toggler" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
            <li class="nav-item nav-logout d-lg-block">
                <a class="nav-link" href="<?php echo e(route('Logout')); ?>">
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
<?php /**PATH C:\Users\Gean\Projetos\react-laravel\resources\views/user/layout/partials/_navbar.blade.php ENDPATH**/ ?>