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
      <div class="bg-light shadow-md rounded p-4">
        <?php echo GeneralHelper::getPageBanner($pageDetails); ?>

        <?php echo GeneralHelper::getPageDescription($pageDetails); ?>

      </div>
    </div>
    
  </div>
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


<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/siddiventures/resources/views/Page/PageDetails.blade.php ENDPATH**/ ?>