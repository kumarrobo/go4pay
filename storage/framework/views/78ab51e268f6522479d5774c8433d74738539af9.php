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
                <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('personaldetails')); ?>" href="<?php echo e(route('personaldetails',['id'=>$id])); ?>"><i class="fas fa-user"></i><?php echo e(__('Personal Details')); ?></a></li>
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('retaileraddress')); ?>" href="<?php echo e(route('retaileraddress',['id'=>$id])); ?>" ><i class="fas fa-bookmark"></i><?php echo e(__('Address Details')); ?></a></li>
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('retailercompany')); ?>" href="<?php echo e(route('retailercompany',['id'=>$id])); ?>" ><i class="fas fa-bookmark"></i><?php echo e(__('Company Proof')); ?></a></li>
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('documentproof')); ?>" href="<?php echo e(route('documentproof',['id'=>$id])); ?>" ><i class="fas fa-bookmark"></i><?php echo e(__('Document Proof')); ?></a></li>
           
            
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
       
              <div class="col-lg-8"  style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4"><?php echo e(__('Upload Document Proof')); ?></h4>
                 <p>
                    
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><small>
                    <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <b>Error:</b> <?php echo e($err); ?></br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </small>
                    </p>
                    <?php endif; ?>

                  </p>
                <form id="personalInformation" method="post" action="<?php echo e(route('documentproof',['id'=>$id])); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="id" value="<?php echo e($id); ?>">
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
                     <input type="file"  class="form-control" data-bv-field="id_proof_file" id="id_proof_file"   placeholder="<?php echo e(__('Upload ID Proof')); ?>" name="id_proof_file">
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    </div>

                  </div>
                  <div class="form-group">
                    <hr/><br/>
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
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    
                  </div>
              
                  </div>
                    <div class="form-group">
                    <hr/><br/>
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
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    </div>
                  </div>
                    <div class="form-group">
                    <hr/><br/>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 offset-2">
                  <button class="btn btn-danger" type="button">Cancle</button>
                  <button class="btn btn-primary" type="submit">Upload & Save</button>
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

      
<?php echo $__env->make('layouts.defaultDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/user/Distributor/RO/retailerDocumentProof.blade.php ENDPATH**/ ?>