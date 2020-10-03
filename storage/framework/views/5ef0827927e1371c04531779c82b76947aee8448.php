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
            <h1>Distributor LOGIN</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">Distributor Login</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Secondary Navigation
    ============================================= -->
  
    <section class="container">
      <div class="bg-light shadow-md rounded p-4">
        <div class="row"> 
          
          <!-- Mobile Recharge
          ============================================= -->
          <div class="col-lg-4 mb-4 mb-lg-0">
            <center class="text-3">Please enter Verification Code sent on your Registered Mobile Number ending with <?php echo e($mobile); ?>.</center>
            <small class="text-1 mb-3">If DND is Registered on your Mobile Number, Contact your Channel Partner OR <a class="justify-content-end" href="#">Resend OTP</a> for get NEW OTP.
              </small>
            <?php if(Session::has('status')): ?>
                   <div class="card-header alert-danger"><?php echo e(__(Session::get('status'))); ?></div>
            <?php endif; ?>
            <div class="tab-content pt-4">
            <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
            <form method="POST"  id="loginForm" action="<?php echo e(route('user.verifyotp')); ?>">
             <?php echo csrf_field(); ?>
              <div class="form-group">
                <label for="loginMobile"><b><?php echo e(__('ENTER OTP')); ?></b></label>

                <input id="otp" type="phone" class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="otp" value="<?php echo e(old('otp')); ?>" required autocomplete="otp" autofocus>
                <?php $__errorArgs = ['mobile'];
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
                <input type="hidden" name="pass" value="<?php echo e($pass); ?>">
                <input type="hidden" name="uid" value="<?php echo e($userId); ?>">
              </div>
              <div class="row mb-4">
                <div class="text-1" style="padding-left: 20px;">"Resend Otp" Button will be activated in next.</div>
                 
              </div>
              <button class="btn btn-primary btn-block" type="submit"><?php echo e(__('VERIFY & LOGIN')); ?></button>
            </form>
          </div>
         
       
       
        </div>
             
            
             
            
          </div>
          <!-- Mobile Recharge end --> 
          
          <!-- Slideshow
          ============================================= -->
          <div class="col-lg-8">
            <div class="owl-carousel owl-theme single-slider" data-animateout="fadeOut" data-animatein="fadeIn" data-autoplay="true" data-loop="true" data-autoheight="true" data-nav="true" data-items="1">
              <div class="item"><a href="#"><img class="img-fluid" src="<?php echo e(config('global.THEME_PATH')); ?>/images/slider/banner-1.jpg" alt="banner 1" /></a></div>
              <div class="item"><a href="#"><img class="img-fluid" src="<?php echo e(config('global.THEME_PATH')); ?>/images/slider/banner-2.jpg" alt="banner 2" /></a></div>
            </div>
          </div>
          <!-- Slideshow end --> 
          
        </div>
      </div>
    </section>
    
    <!-- Tabs
    ============================================= -->
    <div class="section pt-4 pb-3">
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="mobile-recharge-tab" data-toggle="tab" href="#mobile-recharge" role="tab" aria-controls="mobile-recharge" aria-selected="true">Mobile Recharge</a> </li>
          <li class="nav-item"> <a class="nav-link" id="billpayment-tab" data-toggle="tab" href="#billpayment" role="tab" aria-controls="billpayment" aria-selected="false">Bill Payment</a> </li>
          <li class="nav-item"> <a class="nav-link" id="why-quickai-tab" data-toggle="tab" href="#why-quickai" role="tab" aria-controls="why-quickai" aria-selected="false">Why Quickai</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade show active" id="mobile-recharge" role="tabpanel" aria-labelledby="mobile-recharge-tab">
            <p>Instant Online mobile recharge Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. Mediocrem qualisque in has. Enim utroque perfecto id mei, ad eam tritani labores facilisis, ullum sensibus no cum. Eius eleifend in quo. At mei alia iriure propriae.</p>
            <p>Partiendo voluptatibus ex cum, sed erat fuisset ne, cum ex meis volumus mentitum. Alienum pertinacia maiestatis ne eum, verear persequeris et vim. Mea cu dicit voluptua efficiantur, nullam labitur veritus sit cu. Eum denique omittantur te, in justo epicurei his, eu mei aeque populo. Cu pro facer sententiae, ne brute graece scripta duo. No placerat quaerendum nec, pri alia ceteros adipiscing ut. Quo in nobis nostrum intellegebat. Ius hinc decore erroribus eu, in case prima exerci pri. Id eum prima adipisci. Ius cu minim theophrastus, legendos pertinacia an nam. <a href="#">Read Terms</a></p>
          </div>
          <div class="tab-pane fade" id="billpayment" role="tabpanel" aria-labelledby="billpayment-tab">
            <p>Partiendo voluptatibus ex cum, sed erat fuisset ne, cum ex meis volumus mentitum. Alienum pertinacia maiestatis ne eum, verear persequeris et vim. Mea cu dicit voluptua efficiantur, nullam labitur veritus sit cu. Eum denique omittantur te, in justo epicurei his, eu mei aeque populo. Cu pro facer sententiae, ne brute graece scripta duo. No placerat quaerendum nec, pri alia ceteros adipiscing ut. Quo in nobis nostrum intellegebat. Ius hinc decore erroribus eu, in case prima exerci pri. Id eum prima adipisci. Ius cu minim theophrastus, legendos pertinacia an nam.</p>
            <p>Instant Online mobile recharge Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. Mediocrem qualisque in has. Enim utroque perfecto id mei, ad eam tritani labores facilisis, ullum sensibus no cum. Eius eleifend in quo. At mei alia iriure propriae.</p>
          </div>
          <div class="tab-pane fade" id="why-quickai" role="tabpanel" aria-labelledby="why-quickai-tab">
            <p>Cu pro facer sententiae, ne brute graece scripta duo. No placerat quaerendum nec, pri alia ceteros adipiscing ut. Quo in nobis nostrum intellegebat. Ius hinc decore erroribus eu, in case prima exerci pri. Id eum prima adipisci. Ius cu minim theophrastus, legendos pertinacia an nam.</p>
            <p>Partiendo voluptatibus ex cum, sed erat fuisset ne, cum ex meis volumus mentitum. Alienum pertinacia maiestatis ne eum, verear persequeris et vim. Mea cu dicit voluptua efficiantur, nullam labitur veritus sit cu. Eum denique omittantur te, in justo epicurei his, eu mei aeque populo.</p>
            <p>Instant Online mobile recharge Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. Mediocrem qualisque in has. Enim utroque perfecto id mei, ad eam tritani labores facilisis, ullum sensibus no cum. Eius eleifend in quo. At mei alia iriure propriae.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabs end --> 
    
    <!-- Refer & Earn
    ============================================= -->
    <div class="container">
      <section class="section bg-light shadow-md rounded px-5">
        <h2 class="text-9 font-weight-600 text-center">Refer & Earn</h2>
        <p class="lead text-center mb-5">Refer your friends and earn up to $20.</p>
        <div class="row">
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-light-4 text-primary rounded-circle"> <i class="fas fa-bullhorn"></i> </div>
              <h3>You Refer Friends</h3>
              <p class="text-3">Share your referral link with friends. They get $10.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-light-4 text-primary rounded-circle"> <i class="fas fa-sign-in-alt"></i> </div>
              <h3>Your Friends Register</h3>
              <p class="text-3">Your friends Register with using your referral link.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-light-4 text-primary rounded-circle"> <i class="fas fa-dollar-sign"></i> </div>
              <h3>Earn You</h3>
              <p class="text-3">You get $20. You can use these credits to take recharge.</p>
            </div>
          </div>
        </div>
        <div class="text-center pt-4"> <a href="#" class="btn btn-primary">Get Started Earn</a> </div>
      </section>
    </div>
    <!-- Refer & Earn end --> 
    
    <!-- Mobile App
    ============================================= -->
    <section class="section pb-0">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-6 text-center"> <img class="img-fluid" alt="" src="<?php echo e(config('global.THEME_PATH')); ?>/images/app-mobile.png"> </div>
          <div class="col-md-7 col-lg-6">
            <h2 class="text-9 font-weight-600 my-4">Download Our Quickai<br class="d-none d-lg-inline-block">
              Mobile App Now</h2>
            <p class="lead">Download our app for the fastest, most convenient way to send Recharge.</p>
            <p>Ridens mediocritatem ius an, eu nec magna imperdiet. Mediocrem qualisque in has. Enim utroque perfecto id mei, ad eam tritani labores facilisis, ullum sensibus no cum. Eius eleifend in quo.</p>
            <ul>
              <li>Recharge</li>
              <li>Bill Payment</li>
              <li>Booking Online</li>
              <li>and much more.....</li>
            </ul>
            <div class="d-flex flex-wrap pt-2"> <a class="mr-4" href=""><img alt="" src="<?php echo e(config('global.THEME_PATH')); ?>/images/app-store.png"></a><a href=""><img alt="" src="<?php echo e(config('global.THEME_PATH')); ?>/images/google-play-store.png"></a> </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mobile App end --> 
    
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/user/otpLoginForm.blade.php ENDPATH**/ ?>