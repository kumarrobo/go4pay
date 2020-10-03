
    <!-- Secondary Navigation
    ============================================= -->
    <div class="bg-secondary">
      <div class="container">
        <ul class="nav secondary-nav">
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('rodashboard')); ?>" href="<?php echo e(route('rodashboard')); ?>">
              <span><i class="fas fa-home"></i></span> Dashboard</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('myreport')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('rorechargesreport')); ?>


            " href="<?php echo e(route('myreport')); ?>">
              <span><i class="fas fa-chart-line"></i></span>My Report</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('robankaccountlist')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('romoneytransfer')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('roaddaccount')); ?>

         
            " href="<?php echo e(route('romoneytransfer')); ?>">
              <span><i class="fas fa-rupee-sign"></i></span>Money Transfer</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('addbankaccount')); ?>" href="<?php echo e(route('addbankaccount')); ?>">
              <span><i class="fas fa-university"></i></span>Add Bank A/C</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('ropushbalance')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('rotxncreditsuccess')); ?>

            " href="<?php echo e(route('ropushbalance')); ?>">
              <span><i class="fas fa-retweet"></i></span>Push Balance</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link 
            <?php echo e(GeneralHelper::isActiveMenu('wallet')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('rotatrechargeesybuz')); ?>

            <?php echo e(GeneralHelper::isActiveMenu('roconfirmrecharge')); ?>

            " href="<?php echo e(route('rotatrechargeesybuz')); ?>">
              <span><i class="fas fa-wallet"></i></span>Tatkal Recharge</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('writeus')); ?>" href="<?php echo e(route('writeus')); ?>">
              <span><i class="fas fa-envelope"></i></span> Write Us</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('help')); ?>" href="<?php echo e(route('help')); ?>">
              <span><i class="fas fa-life-ring"></i></span> Help</a> 
          </li>
         <!--  <li class="nav-item pull-right" style="float:right; margin-left:80px; color: #FFF"> 
            <a class="nav-link" href="#" style="font-size: 18px;color: #FFF;padding-top: 20px;">
              <span  style="font-size:18px;"><i class="fas fa-wallet"></i>&nbsp;Balance&nbsp;<?php echo e(GeneralHelper::getWalletBalance()); ?></span></a>  
          </li> -->
        </ul>
      </div>
    </div>
    <!-- Secondary Navigation end -->
<?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/RO/dashboardMenu.blade.php ENDPATH**/ ?>