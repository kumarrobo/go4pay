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
            <h1><?php echo e(GeneralHelper::getTitleOfPage($pageDetails)); ?></h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
              <li class="active"><?php echo e(GeneralHelper::getTitleOfPage($pageDetails)); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Secondary Navigation
    ============================================= -->
  
    <!-- Tabs
    ============================================= -->
   <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="bg-light shadow-md rounded h-100 p-3">
            <iframe class="h-100 w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3151.840107317064!2d144.955925!3d-37.817214!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1530885071349" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="bg-light shadow-md rounded p-4">
            <h2 class="text-6">Get in touch</h2>
            <p class="text-3">For Customer Support and Query, Get in touch with us: <a href="#">Help</a></p>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-map-marker-alt"></i></div>
              <h3><?php echo e(GeneralHelper::getSettingValue($Settings,'app_name')); ?></h3>
              <p>
                <?php echo e(GeneralHelper::getSettingValue($Settings,'address_number_1')); ?><br/>
                <?php echo e(GeneralHelper::getSettingValue($Settings,'address_number_2')); ?><br/>
                <?php echo e(GeneralHelper::getSettingValue($Settings,'address_state')); ?>,
                <?php echo e(GeneralHelper::getSettingValue($Settings,'address_country')); ?>

                
              </p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-phone"></i> </div>
              <h3>Telephone</h3>
              <p>
              <?php echo e(GeneralHelper::getSettingValue($Settings,'phone_number')); ?>,              <?php echo e(GeneralHelper::getSettingValue($Settings,'office_number')); ?></p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-envelope"></i> </div>
              <h3>Business Inquiries</h3>
              <p><?php echo e(GeneralHelper::getSettingValue($Settings,'contact_email')); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content end -->
    <!-- Refer & Earn end --> 
    
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


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/Page/contactUsPage.blade.php ENDPATH**/ ?>