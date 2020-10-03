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
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('retailercompany')); ?>" href="<?php echo e(route('retailercompany',['id'=>$id])); ?>" ><i class="fas fa-bookmark"></i><?php echo e(__('Retailer Company Proof')); ?></a></li>
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

                <h4 class="mb-4"><?php echo e(__('Company Detail')); ?></h4>
                 <p>
                    <?php if(Session::has('message')): ?>
                    <p class="alert alert-success">Retailer Details Save Successfully.</p>
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
                <form id="personalInformation" method="post" action="<?php echo e(route('retailercompany',['id'=>$id])); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e($id); ?>">
                  <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Company Name ')); ?></label>
                      <input type="text"  class="form-control" data-bv-field="address_line_1" id="company_name" name="company_name"  placeholder="Enter company name" value="<?php echo e(old('company_name',$userDetails['company_name'])); ?>">
                  </div>
                   <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Company Type')); ?></label>
                      <select class="form-control" name="company_type">
                        <option value="1">Indivisual</option>
                        <option value="2">Other</option>
                      </select>

                  </div>
                
                  <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Service By')); ?></label>
                      <select class="form-control" name="service_by">
                       <?php echo GeneralHelper::getServiceTypeOptionList(); ?>

                      </select>
                  </div>
                
                 
                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Zone')); ?></label>
                    <select class="form-control" name="zone">
                        <?php echo GeneralHelper::getZoneTypeOptionList(); ?>

                      </select>
                  </div>

                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Identification Type')); ?></label>
                    <select class="form-control" name="identification_type">
                       <?php echo GeneralHelper::getIdentificationTypeOptionList(); ?>

                      </select>
                  </div>
                  

                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Is Name On Pan Card')); ?></label>
                      <select class="form-control" name="is_name_on_pan_card">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="emailID"><?php echo e(__('Pan Card Number')); ?></label>
                    <input type="text"  class="form-control" data-bv-field="pan_card_number" id="pan_card_number"  placeholder="<?php echo e(__('Enter Pan Card Number')); ?>" name="pan_card_number" value="<?php echo e(old('company_type',$userDetails['pan_card_number'])); ?>">
                      
                    
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


<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/RO/retailerCompanyProof.blade.php ENDPATH**/ ?>