<?php $__env->startSection('content'); ?>

<section class="containers">
<div class="bg-light shadow-md rounded p-4">


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
                          <a class="nav-link 
                          <?php echo e(GeneralHelper::isActiveMenu('romoneytransfer')); ?>

                          <?php echo e(GeneralHelper::isActiveMenu('roaddaccount')); ?>

                          " href="<?php echo e(route('romoneytransfer')); ?>">
                            <span><i class="fas fa-rupee-sign"></i></span>Money Transfer</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('wallet')); ?>" href="<?php echo e(route('robalancerequest')); ?>">
                            <span><i class="fas fa-university"></i></span> Add Bank A/C</a> 
                        </li>
                        
                      
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('moneytransfer')); ?>" href="<?php echo e(route('ropushbalance')); ?>">
                            <span><i class="fas fa-retweet"></i></span>Push Balance</a>
                        </li>

                      
                         <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('tatrechargeesybuz')); ?>" href="<?php echo e(route('rotatrechargeesybuz')); ?>">
                            <span><i class="fas fa-wallet"></i></span> Tatkal Recharge</a>
                        </li>
                    
                        </ul>
                           <ul class="nav secondary-nav">
                         <li class="nav-item"> 
                            <a class="nav-link"  href="<?php echo e(route('allbalancerequest')); ?>">
                              <span><i class="fas fa-gavel"></i></span>Balance Request</a> 
                          </li>
                         <li class="nav-item"> 
                          <a class="nav-link 
                          <?php echo e(GeneralHelper::isActiveMenu('myreport')); ?>

                          " href="recharge-bill-datacard.html">
                            <span><i class="fas fa-hand-holding-usd" aria-hidden="true"></i></span>Commission</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('rorechargesreport')); ?>" href="<?php echo e(route('rorechargesreport')); ?>">
                            <span><i class="fas fa-unlink"></i></span>Recharge Status</a>
                        </li>
                        <li class="nav-item"> 
                          <a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('myreport')); ?>" href="recharge-bill-datacard.html">
                            <span><i class="fas fa-chart-line"></i></span>My Report</a>
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


            </div>
</div>


</section>

<section class="containers section pb-4">
  <div class="bg-light shadow-md rounded p-4">
  
  <div class="row"> 
    <div class="col-lg-12">

        <h2 class="text-9 font-weight-600 text-center">Welcome to the world of SiddiVenture Pvt Ltd!</h2>
        <p class="lead mb-5 text-center">Best Recharge , Topup and Bill Payment Appication!</p>
        <div class="row">
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-dollar-sign"></i> </div>
              <h3>Easy To Understand</h3>
              <p>No hidden charges, no payment fees, and free customer service. So you get the best deal every time!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-search"></i> </div>
              <h3>Quick and Easy Bill Payment</h3>
              <p>We'll find you the best deals available from top bus companies for you to choose from, combining quality and economy. </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-percentage"></i> </div>
              <h3>Instant Money Transfer</h3>
              <p>Always get cheapest price with the best in the industry. So you get the best deal every time.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-road"></i> </div>
              <h3>100+ Cities</h3>
              <p>Make your road journeys easier across world with 10000+ Operators.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="far fa-times-circle"></i> </div>
              <h3>Easy Cancellation &amp; Refunds</h3>
              <p>Get instant refund and get any booking fees waived off!</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-1 mb-4">
              <div class="featured-box-icon text-primary"> <i class="fas fa-heart"></i> </div>
              <h3>Every time, anywhere</h3>
              <p>Because your trip doesn't end with a ticket, we’re here for you all the way</p>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
      </section>
<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/RO/dashboard.blade.php ENDPATH**/ ?>