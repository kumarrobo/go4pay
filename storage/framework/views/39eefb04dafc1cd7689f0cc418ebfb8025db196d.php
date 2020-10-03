<?php $__env->startSection('content'); ?>
<section class="containers">
<div class="bg-light shadow-md rounded p-4">
  <div class="row"> 
    <div class="col-lg-12">
    <div class="bg-light shadow-md rounded p-4"> 
      <!--User Profile Section

      ============================================= -->
      <h5 class="mb-4">My Waller Transactions</h5>
      <hr/>
      <?php if(count($payment_wallet_transactions)){ ?>

            <div class="tab-content my-3" id="myTabContent">
            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="table-responsive-md" style=" width:1240px; overflow: auto">
                <table class="table table-hover border" style="font-size: 12px;">
                  <thead class="thead-light">
                    <tr>
                      <th>SN</th>
                      <th>Date</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Txn No</th>
                      <th>Payment Mode</th>
                      <th>Status</th>
                      <th>Remarks</th>
                      <th>Transfer</th>
                      <th>Recharge</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;foreach ($payment_wallet_transactions as $key => $value) { //dd($value); ?>
                    <tr>
                      <td class="align-middle"><?php echo e($count); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e(GeneralHelper::getDateFormate($value['transaction_date'])); ?></td>
                      <td class="align-middle">
                        <?php if($value['credit_amount']>0){ ?>
                        <font color="green" style="font-weight:500"><?php echo e(GeneralHelper::getAmount($value['credit_amount'])); ?></font>
                        <?php }else{ ?>
                          <?php echo e(GeneralHelper::getAmount($value['credit_amount'])); ?>

                        <?php } ?>  
                      </td>
                      <td class="align-middle">
                      <?php if($value['debit_amount']>0){ ?>
                        <font color="red" style="font-weight:500"><?php echo e(GeneralHelper::getAmount($value['debit_amount'])); ?></font>
                        <?php }else{ ?>
                          <?php echo e(GeneralHelper::getAmount($value['debit_amount'])); ?>

                        <?php } ?> 
                      </td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e($value['transaction_number']); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e(GeneralHelper::getTransactionTypeName($value['WalletRechargePayment']['payment_mode'])); ?></td>
                      <td class="align-middle"><?php echo e($value['status']); ?></td>
                      <td class="align-middle"><?php echo e($value['remarks']); ?></td>
                      <td class="align-middle">
                       <?php if($value['wallet_recharge_payment_id']==null){ ?>
                          <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Yes"></i>
                      <?php }else{ ?>
                          <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="No"></i>
                      <?php } ?>
                      </td>
                      <td class="align-middle">
                       <?php if($value['wallet_recharge_payment_id']==null){ ?>
                          <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="No"></i>
                      <?php }else{ ?>
                           <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Yes"></i>
                      <?php } ?>
                      </td>
                      <td class="align-middle">
                      <?php if($value['credit_amount']>0){ ?>
                        <font color="green" style="font-weight:500"><i class="fas fa-arrow-up"></i>&nbsp;</font><?php } ?>
                      <?php if($value['debit_amount']>0){ ?>
                         <font color="red" style="font-weight:500"><i class="fas fa-arrow-down"></i></font>&nbsp;
                      <?php } ?>
                      <?php echo e(GeneralHelper::getAmount($value['updated_wallet_balance'])); ?>

                      </td>
                    </tr>
                    <?php $count++;} ?>
                     
                   

                  
                  </tbody>
                </table>
                <p class="pull-right" style="float: right;"><?php echo e($payment_wallet_transactions->onEachSide(5)->links()); ?></p>

              </div>

            </div>
           
          </div>
           <?php }else{?>
            <div class="alert alert-danger col-md-12">No Records Found</div>
           <?php } ?>
      <!-- Personal Information end --> 
    </div>
  </div>
  </div>
</div>
</section>
<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.defaultRODashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/RO/Report/MyReport.blade.php ENDPATH**/ ?>