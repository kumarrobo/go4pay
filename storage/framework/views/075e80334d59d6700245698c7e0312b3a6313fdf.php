<?php $__env->startSection('content'); ?>

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
      <!--User Profile Section
      ============================================= -->
      <?php echo $__env->make('user.Distributor.RO.ROTransactionList', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Personal Information end --> 
</div>
</section>

<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/user/ROTransactionList.blade.php ENDPATH**/ ?>