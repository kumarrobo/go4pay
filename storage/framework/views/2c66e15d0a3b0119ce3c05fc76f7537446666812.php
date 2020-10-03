<?php $__env->startSection('content'); ?>
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  
  <!-- Header
  ============================================= -->
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Header end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content"lass="bg-secondary"> 
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>Register</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="active">Register</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Secondary Navigation
    ============================================= -->
  
    <div class="container" >
      <div class="bg-light shadow-md rounded p-4">
        <div class="row"> 
          
          <!-- Mobile Recharge
          ============================================= -->
          <div class="col-lg-8 mb-4 mb-lg-0">
            <h2 class="text-4 mb-3">New Registration- Upload Document </h2>
            <hr/>
            <?php if(Session::has('error')): ?>
            <div class="card-header alert-danger"><?php echo e(__(Session::get('error'))); ?></div>
            <?php endif; ?>
          <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
            
            <form id="personalInformation" method="post" action="<?php echo e(route('uploaddocument',['id'=>$id])); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e($id); ?>">
                  <div class="form-group row">
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Company Type')); ?></label>
                       <select class="form-control" name="company_type">
                        <?php echo GeneralHelper::getCompanyOptionsTypeList(); ?>

                      </select>
                    </div>
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Company Name')); ?></label>
                     <input type="text"  class="form-control" data-bv-field="company_name" id="company_name"   placeholder="<?php echo e(__(' Company Name')); ?>" name="company_name" value="<?php echo e(old('company_name')); ?>">
                    </div>

                  </div>

                   <div class="form-group row">
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Identification Type')); ?></label>
                       <select class="form-control" name="identification_type">
                        <?php echo GeneralHelper::getIdentificationTypeOptionList(); ?>

                      </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Service Type')); ?></label>
                       <select class="form-control" name="service_by">
                        <?php echo GeneralHelper::getServiceTypeOptionList(); ?>

                      </select>
                    </div>
                  

                  </div>

                  <div class="form-group row">
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Is Name On Pan Card')); ?></label>
                       <select class="form-control" name="is_name_on_pan_card">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div> 
                    <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('PAN Card No')); ?></label>
                       <input type="text"  class="form-control" data-bv-field="pan_card_number" id="pan_card_number"  placeholder="<?php echo e(__('Upload ID Proof')); ?>" name="pan_card_number" maxlength="10">
                    </div>
                  

                  </div>

                    <div class="form-group row">
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('ID Proof')); ?></label>
                       <select class="form-control" name="id_proof_file_type">
                        <?php foreach($idProofType as $key=>$item){ ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                     <div class="col-md-6">
                      <label for="fullName"><?php echo e(__('Upload ID Proof')); ?></label>
                     <input type="file"  class="form-control" data-bv-field="id_proof_file" id="id_proof_file"   placeholder="<?php echo e(__('Upload ID Proof')); ?>" name="id_proof_file" value="<?php echo e(old('id_proof_file')); ?>">
                     <small class="" style="color: red">File extension type should be .jpg, .jpeg, .pdf. Max size 1024KB</small>
                    </div>

                  </div>
                  <div class="form-group">
                    <hr/>
                  </div>
                 
                  <div class="form-group row">
                     <div class="col-md-6">
                    <label for="emailID"><?php echo e(__('Address Proof')); ?></label>
                    <select class="form-control" name="address_proof">
                      <?php foreach($addressProofType as $key=>$item){ ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                      <label for="emailID"><?php echo e(__('Upload Address Proof')); ?></label>
                    <input type="file"  class="form-control" data-bv-field="address_proof_file" id="address_proof_file"   name="address_proof_file">
                     <small class="" style="color: red">File extension type should be .jpg, .jpeg, .pdf. Max size 1024KB</small>
                    </div>
                  </div>
                    <div class="form-group">
                    <hr/>
                  </div>

                     <div class="form-group row">
                       <div class="col-md-6">
                        <label for="emailID"><?php echo e(__('Company Proof')); ?></label>
                        <select class="form-control" name="company_proof">
                          <?php foreach($companyProofType as $key=>$item){ ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                            <?php } ?>
                        </select>
                       </div>
                       <div class="col-md-6">
                          <label for="emailID"><?php echo e(__('Company Proof')); ?></label>
                          <input type="file"  class="form-control" data-bv-field="company_proof_file" id="company_proof_file"   name="company_proof_file">
                          
                       </div>
                  </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-3">
                               <button type="button" class="btn btn-danger">
                                    <?php echo e(__('Cancle')); ?>

                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Save & Register')); ?>

                                </button>
                            </div>
                        </div>
                  
                </form>

          </div>
         
       
       
        </div>
             
            
             
            
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 ">
                <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div>
                <hr/>
                <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div>
              </div>
          <!-- Mobile Recharge end --> 
          
          <!-- Slideshow
          ============================================= -->
      
        </div>
      </div>
      </div>
    
  
    
   
    <!-- Mobile App
    ============================================= -->

   
    
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/auth/user/registerUploadNow.blade.php ENDPATH**/ ?>