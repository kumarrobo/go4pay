   
                  <div class="form-group ">
                    <hr/>
                      <label for="fullName" style="font-weight: bold;">
                        <?php echo e(__('Payment Mode Details - Cash In Bank')); ?>

                      </label>
                      
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Depositor Name')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="depositor_name" id="depositor_name"  placeholder="<?php echo e(__('Enter Depositor Name')); ?>" name="depositer_name"  value="<?php echo e(old('depositor_name')); ?>">
                      </div>
                      </div>
                  </div>
                  
                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Deposit in Bank Name')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <select name="aes_bank_name" class="form-control">
                          <option value="">Select Bank</option>
                           <?php echo GeneralHelper::getAESBankName(old('aes_bank_name')); ?>

                      </select>
                      </div>
                      </div>
                  </div>
                  

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Depositing Location')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="depositing_location" id="depositing_location"  placeholder="<?php echo e(__('Enter Depositing Location')); ?>" name="depositing_location" value="<?php echo e(old('depositing_location')); ?>" >
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Depositing Branch Code')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="depositor_branch_code" id="depositor_branch_code"  placeholder="<?php echo e(__('Enter Depositing Branch Code')); ?>" name="depositor_branch_code" >
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Remarks')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="remarks1" id="remarks1"  placeholder="<?php echo e(__('Enter Remarks')); ?>" name="remarks1" >
                      </div>
                      </div>
                  </div><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/PaymentMode/CashInBank.blade.php ENDPATH**/ ?>