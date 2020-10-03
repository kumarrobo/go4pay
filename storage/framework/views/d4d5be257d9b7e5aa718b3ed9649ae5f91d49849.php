     <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Company Type')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                       <?php echo e(GeneralHelper::getCompanyTypeList($RODetails['UserDetail']['company_type'])); ?>

                      </div>
                      </div>
                  </div>
                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Company Name')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <?php echo e($RODetails['UserDetail']['company_name']); ?>

                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Service By')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <?php echo e(GeneralHelper::getServiceTypeList($RODetails['UserDetail']['service_by'])); ?>

                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Zone')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                         <?php echo e(GeneralHelper::getZoneTypeList($RODetails['UserDetail']['zone'])); ?>

                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('ID Proof Type')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <?php echo e(GeneralHelper::getDocumentProofType($RODetails['UserDetail']['id_proof_type_id'])); ?><br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('ID Proof Document')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <img src="<?php echo e(Config('global.FILE_PATH')); ?>/<?php echo e($RODetails['UserDetail']['id_proof_document']); ?>" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Address Proof ID Type')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <?php echo e(GeneralHelper::getDocumentProofType($RODetails['UserDetail']['address_proof_type_id'])); ?><br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Address Proof Document')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <img src="<?php echo e(Config('global.FILE_PATH')); ?>/<?php echo e($RODetails['UserDetail']['address_proof']); ?>" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>


                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Business Proof Type')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <?php echo e(GeneralHelper::getDocumentProofType($RODetails['UserDetail']['business_proof_type_id'])); ?><br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;"><?php echo e(__('Business Proof Document')); ?></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"><?php echo e(__(':')); ?></p>
                      </div>
                      <div class="col-md-4">
                        <img src="<?php echo e(Config('global.FILE_PATH')); ?>/<?php echo e($RODetails['UserDetail']['business_proof']); ?>" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>
                  
                <?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/RO/ROCompanyProfile.blade.php ENDPATH**/ ?>