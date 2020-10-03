<!--  <?php if(Session::has('message')): ?>
<p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>        
 -->
 <!-- Personal Information
          ============================================= -->
            <div class="row">

              <div class="col-lg-4 col-sm-12">
              <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4"><?php echo e(__('Sender Details')); ?></b></div>
                  <div class="card-body">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5 col-sm-5">Mobile Number</div>
                        <div class="col-md-1 col-sm-1">:</div>
                        <div class="col-md-6 col-sm-6"><?php echo e($mobileNumber); ?></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5">Sender Name</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?php echo e($senderName); ?></div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5">Address</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?php echo e($address); ?></div>
                      </div>
                    </div>


                  </div>
              </div>

              
                 
                  

                


             
              </div>
              <div class="col-lg-4">

                <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4"><?php echo e(__('Monthly Limit Details')); ?></b></div>
                  <div class="card-body">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5">Monthly Limit</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6" style="color:black; font-weight:bold;"><?php echo e(GeneralHelper::getAmount($monthlyLimit)); ?></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5">Utilized</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6" style="color:red; font-weight: normal;"><?php echo e(GeneralHelper::getAmount($utilized)); ?></div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-5">Balance</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6" style="color: green; font-weight: bold;"><?php echo e(GeneralHelper::getAmount($balance)); ?></div>
                      </div>
                    </div>


                  </div>
              </div>
              </div>

               <div class="col-lg-4" >
                <div class="cards">
                 <div class="card-bodys mt-2">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                          <a href="<?php echo e(route('roaddaccount',['id'=>$id])); ?>" class="btn btn-success"  style="font-size: 14px; width: 100%;text-decoration: none">Account Verification</a>
                         </div>
                         <div class="col-md-1"></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                          <a href="#" class="btn btn-info" style="font-size: 14px;  width: 100%; text-decoration: none">Add Recipient</a>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-1"></div>
                       <div class="col-md-10">
                          <a href="#" class="btn btn-danger" style="font-size: 14px;  width: 100%;text-decoration: none" >Refund Tranaction</a>
                        </div>
                        <div class="col-md-1"></div>

                      </div>
                    </div>


                  </div>
              </div>
               </div>

         
          <!-- Orders History end --> 
            </div>

        


           <div class="row">
            <div class="col-md-12">
            <h5 class="mb-4"></h5>
            <div class="accordion" id="accordionDefault">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0"> <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">All Beneficiries List</a> </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionDefault"   style="border:solid 1px #CCC; padding: 1px;">
                  <div class="card-body" style="padding:5px;"> 
            <?php if(count($bankList)){ ?>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="table-responsive-md" style="overflow: auto">
                <table class="table table-hover border" style="font-size: 13px;">
                  <thead class="thead-light">
                    <tr>
                      <th>SN</th>
                      <th>Sender Name</th>
                      <th>Bank Name</th>
                      <th>IFSC Code</th>
                      <th>Account No</th>
                      <th class="text-center">Status</th>
                      <th>Pay By IFSC</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;foreach ($bankList as $key => $value) {  ?>
                    <tr>
                      <td class="align-middle"><?php echo e($count); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e($value['VerifyBeneficiariesBankAccount']['account_name']); ?></td>
                      <td class="align-middle"><?php echo e($value['VerifyBeneficiariesBankAccount']['bank_name']); ?></td>
                      <td class="align-middle"><?php echo e($value['VerifyBeneficiariesBankAccount']['account_number']); ?></td>
                      <td class="align-middle"><?php echo e($value['VerifyBeneficiariesBankAccount']['account_ifsc']); ?></td>
                      <td class="align-middle text-center">
                        <?php if($value['status']=='1'){ ?>
                          <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Active"></i>
                        <?php }else{ ?>
                           <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="InActive"></i>
                        <?php } ?>
                      </td>
                      <td class="pull-right" align="text-right" style="width: 15%">
                        <?php if($value['status']=='1'){ ?>
                         <a href="<?php echo e(route('rotransfermoney',['id'=>Crypt::encryptString($value['id'])])); ?>" class="btn btn-success " style="padding:10px;font-size: 12px;">Pay Now</a>
                        <?php }else{ ?>
                           <p class="btn btn-default"  style="padding:10px;font-size: 12px; background-color: #CCC">Pay Now</p>
                        <?php } ?>
                        &nbsp;
                        <a href="<?php echo e(route('rodeleteaccount',['id'=>$value['id']])); ?>" class="btn btn-danger" style="padding:10px;font-size: 12px;" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                      </td>
                     
                    </tr>
                    <?php $count++;} ?>
                  </tbody>
                </table>
                <?php echo e($bankList->links()); ?>

              </div>
            </div>
          </div>
           <?php }else{ ?>
            <div class="alert alert-danger">No Beneficiries Found</div>
           <?php }?>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >All Transaction History On - <?php echo e($mobileNumber); ?></a> </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDefault" style="">
                  <div class="card-body" style="padding:5px;"> 
                  
                    <div class=" bg-default table-responsive mb-3">
                         <table class="card-text table table-striped" width="100%" style="font-size: 12px; color: #000">
                          
                            <?php if($AllMobileTxn->total()>0){ ?>
                                <tr>
                                    <td nowrap="nowrap">Date</td>
                                    <td nowrap="nowrap">Debit</td>
                                    <td nowrap="nowrap ">Credit</td>
                                    <td nowrap="nowrap">Txn No</td>
                                    <td nowrap="nowrap">Remarks</td>
                                    <td nowrap="nowrap">Charge</td>
                                    <td nowrap="nowrap">Status</td>
                                    <td nowrap="nowrap">Balance</td>
                                    <td nowrap="nowrap">A/C Name</td>
                                    <td nowrap="nowrap">Bank</td>
                                    <td nowrap="nowrap">A/C No</td>
                              </tr>

                              <?php  foreach($AllMobileTxn as $itemList){ ?>
                              <tr>
                                <td nowrap="nowrap"><?php echo e($itemList['transaction_date']); ?></td>
                                <td nowrap="nowrap">
                                <?php if($itemList['debit_amount']>0){ ?>  
                                <font color="red" style="font-weight:500">
                                  <?php echo e(GeneralHelper::getAmount($itemList['debit_amount'])); ?>

                                </font>
                                <?php }else{ ?>
                                  <?php echo e(GeneralHelper::getAmount($itemList['debit_amount'])); ?>

                                <?php } ?>

                                
                                </td>
                                <td nowrap="nowrap">
                                <?php if($itemList['credit_amount']>0){ ?>  
                                <font color="green" style="font-weight:500">
                                  <?php echo e(GeneralHelper::getAmount($itemList['credit_amount'])); ?>

                                </font>
                                <?php }else{ ?>
                                  <?php echo e(GeneralHelper::getAmount($itemList['credit_amount'])); ?>

                                <?php } ?>
                                </td>
                                <td nowrap="nowrap"><?php echo e($itemList['transaction_number']); ?></td>
                                <td title="<?php echo e($itemList['remarks']); ?>"><?php echo e(Str::limit($itemList['remarks'], 20)); ?></td>

                                <td nowrap="nowrap">
                                
                                <?php if($itemList['transfer_charge']>0){ ?>  
                                <font color="red" style="font-weight:500">
                                  <?php echo e(GeneralHelper::getAmount($itemList['transfer_charge'])); ?>

                                </font>
                                <?php }else{ ?>
                                  <?php echo e(GeneralHelper::getAmount($itemList['transfer_charge'])); ?>

                                <?php } ?>


                                </td>
                                <td><?php echo e($itemList['status']); ?></td>
                                <td nowrap="nowrap">
                                <?php if($itemList['credit_amount']>0){ ?>
                                  <font color="red" style="font-weight:500"><i class="fas fa-arrow-up"></i>&nbsp;</font><?php } ?>
                                <?php if($itemList['debit_amount']>0){ ?>
                                   <font color="red" style="font-weight:500"><i class="fas fa-arrow-down"></i></font>&nbsp;
                                <?php } ?>
                                <?php echo e(GeneralHelper::getAmount($itemList['updated_wallet_balance'])); ?></td>
                                <td><?php echo e($itemList['VerifyBeneficiariesBankAccount']['account_name']); ?></td>
                                <td title="<?php echo e($itemList['VerifyBeneficiariesBankAccount']['bank_name']); ?>"><?php echo e(Str::limit($itemList['VerifyBeneficiariesBankAccount']['bank_name'],10)); ?></td>
                                <td><?php echo e($itemList['VerifyBeneficiariesBankAccount']['account_number']); ?></td>
                              </tr>
                            <?php }}else{ ?>
                              <tr style="background-color: #FFF">
                                  <td nowrap="nowrap" colspan="12">
                                    <div class="alert alert-danger">No Transaction Found</div>
                                    </td>
                              </tr>

                            <?php } ?> 

                            </table>
                            <?php echo e($AllMobileTxn->links()); ?>

                      </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Transaction Charges</a> </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionDefault" style="">
                  <div class="card-body" style="padding:5px;"> 
                      <div class=" bg-default table-responsive mb-3">
                         <table class="card-text table table-striped" width="100%" style="font-size: 13px; color: #000">
                            <?php if(!empty($MoneyTransferCharge)){ 
                                  foreach($MoneyTransferCharge as $itemList){ ?>
                              <tr>
                                <td width="30%"><?php echo e($itemList['AmountType']['transaction_amount']); ?></td>
                                <td width="10%">:</td>
                                <td width="30%"><?php echo e(number_format($itemList['value'],2)); ?><?php echo e('@'); ?><?php echo e($itemList['AmountType']['type']); ?></td>
                              </tr>
                            <?php }} ?>

                            </table>
                      </div>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
             
           </div>
          
<?php /**PATH /var/www/html/siddiventures/resources/views/RO/MoneyTransfer/BankAccountList.blade.php ENDPATH**/ ?>