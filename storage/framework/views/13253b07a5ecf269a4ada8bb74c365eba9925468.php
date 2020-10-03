
            <!-- Personal Information
          ============================================= -->
            <div class="row">
              
       
              <div class="col-lg-6" style="padding: 20px;">

                <h4 class="mb-4"><?php echo e(__('Welcome Back,')); ?>&nbsp;<?php echo e(Auth::user()->name); ?></h4>
                
               
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="nav secondary-nav">
                            <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('wallet')); ?>" href="<?php echo e(route('balancerequest')); ?>">
                            <span><i class="fas fa-wallet"></i></span> Balance Request</a> 
                        </li>
                         <li class="nav-item"> 
                            <a class="nav-link"  href="<?php echo e(route('allretailerlist')); ?>">
                              <span><i class="fas fa-users"></i></span>Active RO</a> 
                          </li>
                      
                         <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('dsmyreport')); ?>" href="<?php echo e(route(('dsmyreport'))); ?>">
                            <span><i class="fas fa-chart-line"></i></span>My Report</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('moneytransfer')); ?>" href="<?php echo e(route('pushbalance')); ?>">
                            <span><i class="fas fa-retweet"></i></span>Push Balance-RO</a>
                        </li>
                    
                        </ul>
                           <ul class="nav secondary-nav">
                         <li class="nav-item"> 
                            <a class="nav-link"  href="<?php echo e(route('allbalancerequest')); ?>">
                              <span><i class="fas fa-gavel"></i></span>All Balance Request</a> 
                          </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('addretailer')); ?>" href="<?php echo e(route('addretailer')); ?>">
                            <span><i class="fas fa-user-plus"></i></span>Add RO</a> 
                        </li>
                         <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('myreport')); ?>" href="recharge-bill-datacard.html">
                            <span><i class="fas fa-hand-holding-usd" aria-hidden="true"></i></span>Commission</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('transactionstatus')); ?>" href="<?php echo e(route('transactionstatus')); ?>">
                            <span><i class="fas fa-unlink"></i></span>Transaction Status</a>
                        </li>
                    
                        </ul>


                      </div>
                   </div>
                  </div>
              </div>
               <div class="col-lg-6" style="border: solid 1px #eee;padding: 20px;">

                <h4 class="mb-4"><?php echo e(__('Report')); ?></h4>
                
               
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-12">
                       <?php echo $__env->make('user.Distributor.ReportChart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
                   </div>
                  </div>
              </div>


            </div><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/Dashboard.blade.php ENDPATH**/ ?>