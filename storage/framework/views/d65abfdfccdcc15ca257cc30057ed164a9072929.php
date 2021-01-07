<!DOCTYPE html>
<html http-equiv="Content-Language" content="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="csrf-token" name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>" />
    <link href="<?php echo e(asset('assets/global/iziToast/css/iziToast.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
  </head>
  <body>
    <div class="container-scroller">
      <?php echo $__env->make('user.layout.partials._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="container-fluid page-body-wrapper">
        <?php echo $__env->make('user.layout.partials._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <?php echo $__env->yieldContent('container'); ?>
          </div>
          <?php echo $__env->make('user.layout.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
    <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>

    <!-- inject:js -->
    <script src="<?php echo e(asset('assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/iziToast/js/iziToast.js')); ?>"></script>
    <?php echo $__env->make('global_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- endinject -->
    <?php echo $__env->make('user.layout.partials._toaster-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH C:\Users\Gean\Projetos\react-laravel\resources\views/user/layout/master.blade.php ENDPATH**/ ?>