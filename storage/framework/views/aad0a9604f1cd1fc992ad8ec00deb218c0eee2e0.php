            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-12" >

                <h5 class="mb-4"><?php echo e(__('Push Wallet Balance')); ?></h5>
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
                <form id="personalInformation" method="post" action="<?php echo e(route('pushbalance')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="agent_id" id="agent_id"  placeholder="<?php echo e(__('Enter Agent ID')); ?>" name="agent_id" >
                      </div>
                      <div class="col-md-1" style="font-weight: bold;padding-top: 10px;">
                        <label>- OR -</label>
                      </div>
                      <div class="col-md-3" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="mobile" id="mobile"  placeholder="<?php echo e(__('Enter Mobile Number')); ?>" name="mobile" >
                      </div>
                      <div class="col-md-3" style="font-weight: bold;">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                <div class="form-group ">
                     <div class="row">
                      
                      </div>
                  </div>
                </form>
              </div>

            <?php if(count($ROList)){ ?>

            <div class="tab-content my-3" id="myTabContent">
            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="table-responsive-md" style=" width:1240px; overflow: auto">
                <table class="table table-hover border" style="font-size: 12px;">
                  <thead class="thead-light">
                    <tr>
                      <th>SN</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>PAN Card</th>
                      <th>Address</th>
                      <th>Pincode</th>
                      <th>Balance</th>
                      <th>Created</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;foreach ($ROList as $key => $value) { //dd($value); ?>
                    <tr>
                      <td class="align-middle"><?php echo e($count); ?></td>
                      <td class="align-middle" nowrap="nowrap">
                      <a href="<?php echo e(route('roprofile',['id'=>$value['id']])); ?>">
                      <?php echo e($value['first_name']); ?>&nbsp;<?php echo e($value['last_name']); ?>

                      </a>
                      </td>
                      <td class="align-middle"><?php echo e($value['email']); ?></td>
                      <td class="align-middle"><?php echo e($value['mobile']); ?></td>
                      <td class="align-middle" nowrap="nowrap"><?php echo e($value['UserDetail']['pan_card_number']); ?></td>
                      <td class="align-middle"><?php echo e($value['UserDetail']['address_line_1']); ?></td>
                      <td class="align-middle"><?php echo e($value['UserDetail']['pincode']); ?></td>
                      <td class="align-middle"><?php echo e(GeneralHelper::getAmount($value['PaymentWallet']['total_balance'])); ?></td>
                      <td class="align-middle"><?php echo e(GeneralHelper::getDateFormate($value['UserDetail']['created_at'])); ?></td>
                      <td class="align-middle text-center">
                        <?php if($value['status']=='1'){ ?>
                          <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Active"></i>
                        <?php }else{ ?>
                           <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="InActive"></i>
                        <?php } ?>
                      </td>
                      <td><?php $id =  Crypt::encryptString($value['id']);?>
                      <?php $tday =  Crypt::encryptString(date('Ymd'));?>
                        <a href="<?php echo e(route('pushbalancenow',['id'=>$id,'tday'=>$tday])); ?>" class="btn btn-success">Push Now</a></td>
                    </tr>
                    <?php $count++;} ?>
                     
                   

                  
                  </tbody>
                </table>

              </div>
           
            </div>
           
          </div>
           <?php } ?>
         
          <!-- Orders History end --> 
            </div> 
<?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/pushBalanceRequest.blade.php ENDPATH**/ ?>