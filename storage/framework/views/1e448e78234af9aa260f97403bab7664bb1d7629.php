<?php $__env->startSection('content'); ?>

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
  <div class="row"> 
    <div class="col-lg-12">
    <div class="bg-light shadow-md rounded p-4"> 
      
            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-3"> 
          <!-- Nav Link
          ============================================= -->
          <ul class="nav nav-pills alternate flex-lg-column sticky-top">
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('personaldetails')); ?>" href="<?php echo e(route('personaldetails',['id'=>$id])); ?>"><i class="fas fa-user"></i><?php echo e(__('Retailer Personal Details')); ?></a></li>
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('retaileraddress')); ?>" href="<?php echo e(route('retaileraddress',['id'=>$id])); ?>" ><i class="fas fa-map-marker"></i><?php echo e(__('Retailer Address Details')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)" ><i class="fas fa-bookmark"></i><?php echo e(__('Retailer Company Proof')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="fas fa-file"></i><?php echo e(__('Retailer Document Proof')); ?></a></li>
            
          </ul>
          <!-- Nav Link end --> 
          <!--  <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div> -->
        </div>
       
              <div class="col-lg-6"  style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4"><?php echo e(__('Retailer Address Detail')); ?></h4>
                 <p>
                    <?php if(Session::has('message')): ?>
                    <p class="alert alert-success">Retailer Updated Successfully.</p>
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
                <form id="personalInformation" method="post" action="<?php echo e(route('retaileraddress',['id'=>$id])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e($id); ?>">
                  <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Address Line-1')); ?></label>
                      <input type="text"  class="form-control" data-bv-field="address_line_1" id="address_line_1" name="address_line_1"  placeholder="Enter Address Line-1" value="<?php echo e(old('address_line_1', $userDetails['address_line_1'])); ?>">
                  </div>
                   <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Address Line-2')); ?></label>
                      <input type="text"  class="form-control" data-bv-field="address_line_2" id="address_line_2" name="address_line_2"  placeholder="Enter Address Line-2" value="<?php echo e(old('address_line_2',$userDetails['address_line_2'])); ?>">
                  </div>
                
                  <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Country')); ?></label>
                      <select class="form-control" name="country_id">
                        <option value="1">India</option>
                        <option value="1">Other</option>
                      </select>
                  </div>
                
                 
                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Choose State')); ?></label>
                    <select class="form-control" name="state_id">
                        <?php echo GeneralHelper::getStateOptionListName($userDetails['state_id']); ?>

                      </select>
                  </div>

                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Choose City')); ?></label>
                    <select class="form-control" name="city_id">
                        <?php echo GeneralHelper::getCityOptionListName($userDetails['city_id']); ?>

                      </select>
                  </div>
                  

                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('District')); ?></label>
                    <input type="text"  class="form-control" data-bv-field="district" id="district"  placeholder="<?php echo e(__('Enter District Name')); ?>" maxlength="10" name="district" value="<?php echo e(old('district', $userDetails['district'])); ?>">
                  </div>
                  <div class="form-group">
                    <label for="emailID"><?php echo e(__('Pincode')); ?></label>
                    <input type="text"  class="form-control" data-bv-field="pincode" id="pincode"  placeholder="<?php echo e(__('Enter pincode')); ?>" name="pincode"  value="<?php echo e(old('district', $userDetails['pincode'])); ?>">
                      <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                  </div>
                <div class="form-group row">
                  <div class="col-md-12 offset-3">
                    <button class="btn btn-danger" type="button" onclick="history.go('-1')">Back</button>
                    <button class="btn btn-primary" type="submit">Save & Continue</button>
                   </div>
                </div>
                </form>
              </div>
             
            </div>
          
    </div>
  </div>
  </div>
</div>
</section>

<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/RO/retailerAddress.blade.php ENDPATH**/ ?>