            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-6 col-sm-12">
              <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4"><?php echo e(__('Verify Account Details')); ?></b></div>
                  <div class="card-body">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4 col-sm-5">Account Number</div>
                        <div class="col-md-1 col-sm-1">&nbsp;</div>
                        <div class="col-md-6 col-sm-6"><input type="number" name="account_no" id="account_no" class="form-control" required="required"></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">Bank Name</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">
                          <select name="master_bank_id" class="form-control" id="master_bank_id">
                              <option value="">Select Bank</option>
                              <?php foreach($bankList as $item){ ?>
                              <option value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">IFSC Code</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6"><input type="text" name="IFSCCode" id="IFSCCode" class="form-control" required="required"></div>
                      </div>
                    </div>

                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">
                          <button type="button" name="cancel" class="btn btn-danger" style="font-size: 14px; text-decoration: none">Cancel</button>
                          <input type="hidden" name="hiddenid" id="hiddenid" value="<?php echo e($id); ?>">
                          <input type="submit" name="cancel" id="addAccountBtn" class="btn btn-success" style="font-size: 14px; text-decoration: none" value="Submit">
                        </div>
                      </div>
                    </div>


                  </div>
              </div>
              </div>



              <div class="col-lg-6 col-sm-12">
              <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4"><?php echo e(__('Verify Account Details')); ?></b></div>
                  <div class="card-body">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-12 col-sm-12">Account Number associated with <b>"Pradeep Kumar"</b></div>
                       
                      </div>
                    </div>
               
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-6">
                          <button type="button" name="cancel" class="btn btn-danger" style="font-size: 14px; text-decoration: none">Cancel</button>
                          <input type="submit" name="save"  class="btn btn-success" style="font-size: 14px; text-decoration: none" value="Save">
                        </div>
                      </div>
                    </div>


                  </div>
              </div>
              </div>
         
          <!-- Orders History end --> 
            </div>

          
<?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/MoneyTransfer/addBankAccount.blade.php ENDPATH**/ ?>