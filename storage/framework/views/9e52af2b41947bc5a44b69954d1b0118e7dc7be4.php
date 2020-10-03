   
                  <div class="form-group ">
                    <hr/>
                      <label for="fullName" style="font-weight: bold;">
                        <?php echo e(__('Payment Mode Details - Cash In Machine')); ?>

                      </label>
                      
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Transfer Date')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="transfer_date" id="transfer_date"  placeholder="<?php echo e(__(date('d-m-Y'))); ?>" name="transfer_date" value="<?php echo e(old('transfer_date')); ?>"  autocomplete="no" >
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
                           <?php echo GeneralHelper::getAESBankName(); ?>

                      </select>
                      </div>
                      </div>
                  </div>
                  

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Deposite By Mobile No')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="depositer_mobile_number" id="depositer_mobile_number"  placeholder="<?php echo e(__('Enter Depositer Mobile')); ?>" name="depositer_mobile_number" value="<?php echo e(old('depositer_mobile_number')); ?>" >
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('CDM Branch Name {As per CDM Slip}')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="cdm_branch_name" id="cdm_branch_name"  placeholder="<?php echo e(__('Enter CDM Branch Code/Name')); ?>" name="cdm_branch_name" value="<?php echo e(old('cdm_branch_name')); ?>" >
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
                      <input type="text"  class="form-control" data-bv-field="Remarks2" id="remarks2"  placeholder="<?php echo e(__('Enter Remarks')); ?>" name="remarks2" value="<?php echo e(old('remarks2')); ?>" >
                      </div>
                      </div>
                  </div><?php /**PATH /var/www/html/siddiventures/resources/views/user/PaymentMode/CashInMachine.blade.php ENDPATH**/ ?>