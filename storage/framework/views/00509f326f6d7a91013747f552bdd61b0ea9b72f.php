<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.ico')); ?>" />
  </head>
  <body>
    <div id="app"></div>
    <script src="<?php echo e(asset('js/views/Login.js')); ?>"></script>
  </body>
</html>
<?php /**PATH C:\Users\Gean\Projetos\contacts\resources\views/user/login.blade.php ENDPATH**/ ?>