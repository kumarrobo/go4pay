
            <!-- Personal Information
          ============================================= -->
          <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-5" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="" style="font-size: 16px;"><?php echo e(__('Wallet Balance Transfer To ')); ?><?php echo e(__($userDetails['name'])); ?>-<?php echo e(__($userDetails['AgentCode'])); ?></h4>
                 <p>
                    <?php if(Session::has('message')): ?>
                    <p class="alert alert-success" id="oldSuccessDiv"><?php echo e(Session::get('message')); ?></p>
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
                  <p class="alert alert-danger" id="errorDiv" style="display: none"></p>
                  <p class="alert alert-success" id="successDiv" style="display: none"></p>
                <form id="personalInformation" method="post" action="<?php echo e(route('rotransfertouserwallet',['id'=>$id,'tday'=>$tday])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                
                  <div class="row">
                  <div class="col-md-4">
                  <label for="fullName" style="font-weight: bold;"><?php echo e(__('Transfer Amount')); ?></label>
                  </div>
                   <div class="col-1">
                    <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                  </div>
                  <div class="col-md-7" style="font-weight: bold;">
                    <?php echo e(GeneralHelper::getAmount($requestData['amount'])); ?>

                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                  <label for="fullName"><?php echo e(__('Remarks')); ?></label>
                  </div>
                   <div class="col-1">
                    <p><?php echo e(__(':')); ?></p>
                  </div>
                  <div class="col-md-7">
                    <?php echo e($requestData['remarks']); ?>


                  </div>
                  </div>
                  <input type="hidden" name="remarks" value="<?php echo e($requestData['remarks']); ?>">
                  <input type="hidden" name="amount" value="<?php echo e($amount); ?>">

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-12">
                        <p>
                        <center class="text-2">Please enter Verification Code sent on your Registered Mobile Number ending with <?php echo e($mobile); ?>.</center>
                        <small class="text-1 mb-3">If DND is Registered on your Mobile Number, Contact your Channel Partner OR <a class="justify-content-end" href="#">Resend OTP</a> for get NEW OTP.
                          </small>
                        <?php if(Session::has('status')): ?>
                               <div class="card-header alert-danger"><?php echo e(__(Session::get('status'))); ?></div>
                        <?php endif; ?>
                        </p>
                        
                       <input type="number"  class="form-control"  id="OTP"  placeholder="<?php echo e(__('Enter OTP')); ?>" name="OTP" autocomplete="off" >  
                     
                        <div class="row">
                          <div class="text-1" style="padding-left: 20px;">"Resend Otp" Button will be activated in next.</div>
                           
                        </div>
                      </div>
                      </div>

                  </div>

           
                 
                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-12" style="font-weight: bold;">
                      <button class="btn btn-danger" type="button">Cancel</button>
                      <button class="btn btn-primary" type="submit" id="verifyOTP">Verify & Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
          <!-- Orders History end --> 
            </div> 
<?php /**PATH /var/www/html/siddiventures/resources/views/RO/PushBalance/verifyOTPForBalanceTransferForm.blade.php ENDPATH**/ ?>