
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4"><?php echo e(__('Wallet Balance Transfer To ')); ?><?php echo e(__($userDetails['name'])); ?>-<?php echo e(__($userDetails['AgentCode'])); ?></h4>
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
                <form id="personalInformation" method="post" action="<?php echo e(route('roverifytransfer',['id'=>$id,'tday'=>$tday])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Current Balance Amount')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                        Rs. <?php echo e(GeneralHelper::getWalletBalance()); ?>

                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                        <label>Enter Amount</label>
                       <input type="number"  class="form-control" data-bv-field="amount" id="amount"  placeholder="<?php echo e(__('Enter Amount e.g 5000.00')); ?>" name="amount" autocomplete="off" >
                      </div>
                      </div>

                  </div>

                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                         <label>Enter Remarks</label>
                       <input type="text"  class="form-control" data-bv-field="remarks" id="remarks"  placeholder="<?php echo e(__('Enter Remarks')); ?>" name="remarks" required="required">
                      </div>
                      </div>
                      
                  </div>
                 
                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
          <!-- Orders History end --> 
            </div> 
<?php /**PATH /var/www/html/siddiventures/resources/views/RO/PushBalance/TransferBalanceToROForm.blade.php ENDPATH**/ ?>