
    <!-- Secondary Navigation
    ============================================= -->
    <div class="bg-secondary">
      <div class="container">
        <ul class="nav secondary-nav">
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('dashboard')); ?>" href="<?php echo e(route('dashboard')); ?>">
              <span><i class="fas fa-home"></i></span> Dashboard</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('addretailer')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('retaileraddress')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('personaldetails')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('documentproof')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('viewrodetails')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('allretailerlist')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('roprofile')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('rocompanyprofile')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('setcommission')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('editusercommission')); ?> 
            <?php echo e(GeneralHelper::isActiveMenu('retailercompany')); ?>" 

            href="<?php echo e(route('allretailerlist')); ?>">
              <span><i class="fas fa-users"></i></span>RO</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('dsmyreport')); ?>" href="<?php echo e(route('dsmyreport')); ?>">
              <span><i class="fas fa-chart-line"></i></span>My Report</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('verifytransfer')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('pushbalancenow')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('pushbalance')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('txncreditsuccess')); ?>

           
            " href="<?php echo e(route('pushbalance')); ?>">
              <span><i class="fas fa-retweet"></i></span>Push Balance-RO</a>
          </li>
      <!--     <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('moneytransfer')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('bankaccountlist')); ?>

            " href="<?php echo e(route('moneytransfer')); ?>">
              <span><i class="fas fa-university"></i></span>Money Transfer</a>
          </li> -->
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('allbalancerequest')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('wallet')); ?>

             <?php echo e(GeneralHelper::isActiveMenu('balancerequest')); ?>" href="<?php echo e(route('balancerequest')); ?>">
              <span><i class="fas fa-wallet"></i></span> Balance Request</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('tatrechargeesybuz')); ?>" href="<?php echo e(route('tatrechargeesybuz')); ?>">
              <span><i class="fas fa-rupee-sign"></i></span> Tatkal Recharge</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('help')); ?>" href="<?php echo e(route('dashboard')); ?>">
              <span><i class="fas fa-life-ring"></i></span> Help</a> 
          </li>
        </ul>
      </div>
    </div>
    <!-- Secondary Navigation end -->
<?php /**PATH /var/www/html/siddiventures/resources/views/user/dashboardMenu.blade.php ENDPATH**/ ?>