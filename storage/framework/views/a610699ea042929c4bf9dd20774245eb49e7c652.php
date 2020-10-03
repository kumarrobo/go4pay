
            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-12 col-sm-12">
              <p id="msgBank" style="font-size: 12px;"></p>
              <p id="msg" style="font-size: 12px;"></p>
            </div>
              <div class="col-lg-2 col-sm-12"></div>
                <div class="col-lg-8 col-sm-12">
              <?php //dd($result);?>
              <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4"><?php echo e(__('Transfer Money To Bank Account')); ?></b></div>
                  <div class="card-body">
                    <form action="<?php echo e(route('rotransferaction')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4 col-sm-5">SENDER MOBILE NUMBER</div>
                        <div class="col-md-1 col-sm-1">&nbsp;:</div>
                        <div class="col-md-7 col-sm-6"><input type="number" name="mobile" id="mobile" class="form-control" required="required" readonly="readonly" value="<?php echo e($verifyMobile['mobile']); ?>"></div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4 col-sm-5">SENDER REMAINING LIMIT</div>
                        <div class="col-md-1 col-sm-1">&nbsp;:</div>
                        <div class="col-md-7 col-sm-6"><input type="text" name="balance" id="balance" class="form-control" required="required" readonly="readonly" value="<?php echo e(number_format($mobileTransactionBalanceAmount,2)); ?>"></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">RECIPIENT MOBILE NUMBER</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="number" name="r_mobile" id="r_mobile" class="form-control" required="required" readonly="readonly" value="<?php echo e($verifyMobile['mobile']); ?>">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">RECIPIENT NAME</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="text" name="account_name" id="account_name" class="form-control" required="required" readonly="readonly" value="<?php echo e($result['VerifybeneficiariesBankAccount']['account_name']); ?>">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">RECIPIENT ACCOUNT NUMBER</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="text" name="account_number" id="account_number" class="form-control" required="required" readonly="readonly" value="<?php echo e($result['VerifybeneficiariesBankAccount']['account_number']); ?>">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">RECIPIENT BANK NAME</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="text" name="bank_name" id="bank_name" class="form-control" required="required" readonly="readonly" value="<?php echo e($result['VerifybeneficiariesBankAccount']['bank_name']); ?>">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">RECIPIENT BANK IFSC CODE</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="text" name="account_ifsc" id="account_ifsc" class="form-control" required="required" readonly="readonly" value="<?php echo e($result['VerifybeneficiariesBankAccount']['account_ifsc']); ?>">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">TRANSFER AMOUNT</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="number" name="amount" id="amount" class="form-control" required="required" placeholder="e.g 5000.00">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">TRANSFER FEE</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="number" name="fee" id="fee" class="form-control" required="required" placeholder="0.00" value="0.00" readonly="readonly">
                        </div>
                      </div>
                    </div>
                   
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">TOTAL TRANSFER AMOUNT</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="number" name="fee" id="fee" class="form-control" required="required" placeholder="0.00" value="0.00" readonly="readonly">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">REMARKS</div>
                        <div class="col-md-1">&nbsp;:</div>
                        <div class="col-md-7">
                        <input type="text" name="remarks" id="remarks" class="form-control" required="required">
                        </div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">PAYMENT MODE</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-7">
                          <SELECT name="payment_mode" class="form-control">
                            <option value="IMPS">IMPS</option>
                            <option value="NEFT">NEFT</option>
                          </SELECT>

                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                         <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-7">
                          <button type="button" name="cancel" class="btn btn-danger" style="font-size: 14px; text-decoration: none">Cancel</button>
                          
                          <input type="submit" name="submit" id="verifyAccountBtn"   class="btn btn-success" style="font-size: 14px; text-decoration: none" value="Transfer Now">
                          <input type="hidden" name="beneficiaries_bank_account_id" value="<?php echo e($result['id']); ?>">
                          <input type="hidden" name="verify_mobile_number_id" value="<?php echo e($result['verify_mobile_number_id']); ?>">
                          <input type="hidden" name="verify_mobile_beneficiaries_bank_account_id" value="<?php echo e($result['id']); ?>">
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
              </div>
              </div> 
              <div class="col-lg-2 col-sm-12"></div>
   
              
          <!-- Orders History end --> 
            </div>     
<?php /**PATH /var/www/html/siddiventures/resources/views/RO/MoneyTransfer/TransferMoneyToBankAccount.blade.php ENDPATH**/ ?>