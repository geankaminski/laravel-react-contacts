<?php $__env->startSection('title'); ?>
	Início
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('container'); ?>
	<div id="app"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var authUser = <?php echo json_encode(Auth::user(), 15, 512) ?>;
</script>
<script src="<?php echo e(asset('js/views/Dashboard.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gean\Projetos\react-laravel\resources\views/user/dashboard.blade.php ENDPATH**/ ?>