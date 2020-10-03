
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h5 class="mb-4"><?php echo e(__('Wallet Balance Transfered Successfully')); ?></h5>
                <hr/>
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
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('DS~RO Name')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                         <?php echo e(GeneralHelper::getUserProfileName($userArr)); ?>

                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName"><?php echo e(__('Transfer Amount')); ?></label>
                      </div>
                       <div class="col-1">
                        <p><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7">
                        <?php echo e(GeneralHelper::getAmount($userDetails['credit_amount'])); ?>

                      </div>
                      </div>


                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName"><?php echo e(__('Status')); ?></label>
                      </div>
                       <div class="col-1">
                        <p><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold; text-transform: uppercase; color: green">
                        <?php echo e($userDetails['status']); ?>

                      </div>
                      </div>


                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName"><?php echo e(__('Transaction Number')); ?></label>
                      </div>
                       <div class="col-1">
                        <p><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7">
                        <?php echo e($userDetails['transaction_number']); ?>

                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName"><?php echo e(__('Transaction Date')); ?></label>
                      </div>
                       <div class="col-1">
                        <p ><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7">
                        <?php echo e($userDetails['transaction_date']); ?>

                      </div>
                      </div>
                  </div>
              
              </div>
          <!-- Orders History end --> 
            </div> 
<?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/balanceTransferSuccessfully.blade.php ENDPATH**/ ?>