<?php if(Session::has('error-toaster')): ?>
<script>
  <?php
    Session::get('error-toaster')->render()
  ?>
</script>
<?php endif; ?>

<?php if(Session::has('success-toaster')): ?>
<script>
  <?php
    Session::get('success-toaster')->render()
  ?>
</script>
<?php endif; ?><?php /**PATH C:\Users\Gean\Projetos\contacts\resources\views/user/layout/partials/_toaster-message.blade.php ENDPATH**/ ?>