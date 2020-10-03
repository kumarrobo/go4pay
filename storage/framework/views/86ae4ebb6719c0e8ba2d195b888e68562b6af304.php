
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4"><?php echo e(__('Wallet Balance Request')); ?></h4>
                 <p>
                    <?php if(Session::has('message')): ?>
                    <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><small>
                    <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <b>Error:</b> <?php echo e($err); ?></br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </small>
                    </p>
                    <?php endif; ?>

                  </p>
                <form id="personalInformation" method="post" action="<?php echo e(route('balancerequest')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-4">
                        <p style="font-weight: bold;"><?php echo e(__('Distributor')); ?></p>
                      </div>
                      <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7">
                        <p><?php echo e(Auth::user()->name); ?></p>
                      </div>
                   </div>
                  </div>
                  
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Current Balance Amount')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;"><i class="fas fa-sack"></i>
                        <?php echo e(GeneralHelper::getWalletBalance()); ?>

                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Request for Amount')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="request_amount" id="request_amount"  placeholder="<?php echo e(__('Enter Amount e.g 5000')); ?>" name="request_amount" value="<?php echo e(old('request_amount')); ?>" >
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Payment Date')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="payment_date" id="payment_date"  placeholder="<?php echo e(__(date('d-m-Y'))); ?>" name="payment_date" value="<?php echo e(old('payment_date')); ?>" autocomplete="off" >
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('WB Request In')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <select name="request_in" class="form-control">
                          <option value="1" <?php if(old('request_in') == 1){ ?> selected="selected" <?php }?>>AES Wallet</option>
                          <option value="2" <?php if(old('request_in') == 2){ ?> selected="selected" <?php }?>>Bank</option>
                          <option value="3" <?php if(old('request_in') == 3){ ?> selected="selected" <?php }?>>Other</option>
                      </select>
                      </div>
                      </div>
                  </div>
                    
                     <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Payment Mode')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <select name="paymentMode" class="form-control" id="paymentMode">
                          <option value="">Select Payment Mode</option>
                            <?php echo GeneralHelper::getPaymentMode(old('paymentMode')); ?>

                      </select>
                      </div>
                      </div>
                  </div>

                <!--Details Tab for Cash In Bank--->
                  <div id="paymentmode1" class="paymentmode" <?php if(Session::get('paymentMode')==1){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      <?php echo $__env->make('user.PaymentMode.CashInBank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                <!--Details Tab for Cash In Bank--->

                <!--Details Tab for CashInMachine In Bank--->
                  <div id="paymentmode2" class="paymentmode" <?php if(Session::get('paymentMode')==2){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      <?php echo $__env->make('user.PaymentMode.CashInMachine', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                <!--Details Tab for CashInMachine In Bank--->


                 <!--Details Tab for NEFT/RTGS/FT/IMPS In Bank--->
                  <div id="paymentmode3" class="paymentmode" <?php if(Session::get('paymentMode')==3){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      <?php echo $__env->make('user.PaymentMode.CashByNEFT', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                <!--Details Tab for NEFT/RTGS/FT/IMPS  In Bank--->
  


                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      &nbsp;
                      </div>
                       <div class="col-1">
                        &nbsp;
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <button class="btn btn-danger" type="button">Cancle</button>
                      <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
            </div> 
<?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/DSDashboard.blade.php ENDPATH**/ ?>