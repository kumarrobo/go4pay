<!--Include Distributor Profile Menu-->
<?php if(Auth::guard('user')->check()): ?>

  <?php echo $__env->make('user.dashboardMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<!--Include Distributor Ends Menu-->


<!--Include RO Profile Menu-->
<?php if(Auth::guard('ro')->check()): ?>

    <?php echo $__env->make('RO.dashboardMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   

<?php endif; ?>
<!--Include RO Profile Menu-->

<?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/dashboardMenu.blade.php ENDPATH**/ ?>