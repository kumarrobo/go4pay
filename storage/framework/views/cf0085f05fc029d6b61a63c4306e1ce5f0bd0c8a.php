
      <div class="col-lg-12">
        <div class="bg-light shadow-md rounded p-4"> 
          <!-- Orders History
          ============================================= -->
          <h4 class="mb-3">All Wallet Balance Request</h4>
          <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">All Request</a> </li>
            <!-- <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Recharge &amp; Bill Payment</a> </li>
            <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Booking</a> </li> -->
          </ul>
          <div class="tab-content my-3" id="myTabContent">
            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="table-responsive-md" style=" width:1240px; overflow: auto">
                <table class="table table-hover border" style="font-size: 12px;">
                  <thead class="thead-light">
                    <tr>
                      <th>SN</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Mode</th>
                      <th>Depositer Name</th>
                      <th>Bank Name</th>
                      <th>Mobile</th>
                      <th>Location</th>
                      <th>Code</th>
                      <th>Sender Acc No</th>
                      <th>Txn No</th>
                      <th>Remarks</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($allRequest)){ ?>
                    <?php $count=1;foreach ($allRequest as $key => $value) { ?>
                    <tr>
                      <td class="align-middle"><?php echo e($count); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e($value['payment_date']); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e(GeneralHelper::getAmount($value['requested_amount'])); ?></td>
                      <td class="align-middle"><?php echo e(GeneralHelper::getPaymentModeName($value['payment_mode_type_id'])); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e($value['depositer_name']); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e(GeneralHelper::getCompanyBankName($value['company_bank_id'])); ?></td>
                      <td class="align-middle"><?php echo e($value['sender_mobile_number']); ?></td>
                      <td class="align-middle"><?php echo e($value['bank_location']); ?></td>
                      <td class="align-middle"><?php echo e($value['bank_branch_code']); ?></td>
                      <td class="align-middle"><?php echo e($value['sender_account_number']); ?></td>
                      <td class="align-middle"><?php echo e($value['transaction_number']); ?></td>
                      <td class="align-middle"><?php echo e($value['remarks']); ?></td>
                      <td class="align-middle text-center">
                        <?php if($value['status']=='Success'){ ?>
                          <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Your request Successful"></i>
                        <?php }else{ ?>
                           <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="Your Request in <?php echo e($value['status']); ?>"></i>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $count++;} ?>
                     
                    <?php } ?>

                  
                  </tbody>
                </table>
                <div class="pull-right">
                  
                                <?php echo e($allRequest->links()); ?>

                </div>

              </div>
           
            </div>
           
          </div>
          <!-- Orders History end --> 
        </div>
  <?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/Wallet/allWalletBalanceRequest.blade.php ENDPATH**/ ?>