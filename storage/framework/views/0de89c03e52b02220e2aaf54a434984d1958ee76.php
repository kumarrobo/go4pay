<?php $__env->startSection('content'); ?>

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
  <div class="row"> 
    <div class="col-lg-12">
    <div class="bg-light shadow-md rounded p-4"> 
      <!--User Profile Section
      ============================================= -->
      <?php echo $__env->make('user.Distributor.MoneyTransfer.moneyTransferSenderInformation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Personal Information end --> 
    </div>
  </div>
  </div>
</div>
</section>

<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/moneyTransfer.blade.php ENDPATH**/ ?>