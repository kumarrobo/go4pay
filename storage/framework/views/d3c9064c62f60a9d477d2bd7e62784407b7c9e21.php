

<!--Include RO Profile Menu-->
<?php if(Auth::guard('ro')->check()): ?>

    <?php echo $__env->make('RO.dashboardMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   

<?php endif; ?>
<!--Include RO Profile Menu-->

<?php /**PATH /var/www/html/siddiventures/resources/views/dashboardMenu.blade.php ENDPATH**/ ?>