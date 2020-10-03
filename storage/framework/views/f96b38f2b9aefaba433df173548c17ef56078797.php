<!--Include Distributor Profile Menu-->
<?php if(Auth::guard('user')->check()): ?>

  <?php echo $__env->make('user.dashboardMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<!--Include Distributor Ends Menu-->


<?php /**PATH /var/www/html/siddiventures/resources/views/distributorDashboardMenu.blade.php ENDPATH**/ ?>