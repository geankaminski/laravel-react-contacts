<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?php echo e(asset('assets/images/faces/face1.jpg')); ?>" alt="profile">
                  <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo e(Auth::user()->name); ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('Dashboard')); ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#lead-routes" aria-expanded="false" aria-controls="lead-routes">
                <span class="menu-title">Contatos</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
              <div class="collapse" id="lead-routes">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('Leads')); ?>">Mostrar</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('NewContact')); ?>">Adicionar</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
<?php /**PATH C:\Users\Gean\Projetos\contacts\resources\views/user/layout/partials/_sidebar.blade.php ENDPATH**/ ?>