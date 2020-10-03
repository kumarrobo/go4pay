
            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-3"> 
          <!-- Nav Link
          ============================================= -->
          <ul class="nav nav-pills alternate flex-lg-column sticky-top">
            <li class="nav-item"><a class="nav-link <?php echo e(GeneralHelper::isActiveMenu('addretailer')); ?>" href="<?php echo e(route('addretailer')); ?>"><i class="fas fa-user"></i><?php echo e(__('Add New Retailer')); ?></a>
            </li>
            <li class="nav-item"><a class="nav-link disabled" href="#"><i class="fas fa-map-marker"></i><?php echo e(__('Retailer Address')); ?></a>
            </li>
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
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4"><?php echo e(__('Add New Retailer')); ?></h4>
                 <p>
                    <?php if(Session::has('message')): ?>
                    <p class="alert alert-success">You profile is created successfully, click here for <a href="<?php echo e(route('login')); ?>">Login</a></p>
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
                <form id="personalInformation" method="post" action="<?php echo e(route('addretailer')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="mb-3">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="male" name="profile" class="custom-control-input" checked="" required="required" type="radio">
                      <label class="custom-control-label" for="male"><?php echo e(__('Male')); ?></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="female" name="profile" class="custom-control-input" required="required" type="radio">
                      <label class="custom-control-label" for="female"><?php echo e(__('Female')); ?></label>
                    </div>
                  </div>
                  <div class="form-group ">
                      <label for="fullName"><?php echo e(__('Full Name')); ?></label>
                      <input type="text"  class="form-control" data-bv-field="first_name" id="first_name" name="first_name"  placeholder="Enter First Name" value="<?php echo e(old('first_name')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="mobileNumber"><?php echo e(__('Last Name')); ?></label>
                    <input type="text"  class="form-control" data-bv-field="last_name" id="last_name"   placeholder="<?php echo e(__('Enter Last Name')); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>">
                  </div>
                
                 
                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Email Address')); ?></label>
                    <input type="text"  class="form-control" data-bv-field="emailid" id="emailID"  placeholder="<?php echo e(__('Enter Email Address')); ?>" name="email" value="<?php echo e(old('email')); ?>">
                  </div>
                    <div class="form-group">
                    <label for="emailID"><?php echo e(__('Mobile Number')); ?></label>
                    <input type="phone"  class="form-control" data-bv-field="emailid" id="emailID"  placeholder="<?php echo e(__('Enter Mobile Number')); ?>" maxlength="10" name="mobile" value="<?php echo e(old('mobile')); ?>">
                  </div>
                  <div class="form-group">
                    <label for="emailID"><?php echo e(__('Password')); ?></label>
                    <input type="phone"  class="form-control" data-bv-field="Password" id="Password"  placeholder="<?php echo e(__('Enter Password')); ?>" name="password">
                      <?php $__errorArgs = ['password'];
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
                    <small><i>Please note this password before submitting</i></small>
                  </div>
                 
                  
                  <button class="btn btn-primary" type="submit">Create Now</button>
                </form>
              </div>
             
            </div>
          <?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/RO/addRetailer.blade.php ENDPATH**/ ?>