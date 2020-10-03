<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title><?php echo e(env('APP_NAME')); ?> - Money Transfer Recharge & Bill Payment, Booking</title>
<meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/css/stylesheet.css" />
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>

<!-- Preloader End --> 
    <?php echo $__env->yieldContent('content'); ?>
<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
    <i class="fa fa-chevron-up"></i>
</a> 

<!-- Modal Dialog - View Plans
============================================= -->
<?php echo $__env->make('dialog_plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Modal Dialog - View Plans end --> 

<!-- Modal Dialog - Login/Signup
============================================= -->
<?php echo $__env->make('dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Modal Dialog - Login/Signup end --> 

<!-- Script --> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/jquery/jquery.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/owl.carousel.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/js/theme.js"></script>

<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#verifyOTP").click(function(e){
        $("#verifyOTP").html("Please wait...");
        $("#verifyOTP").attr("disabled","disabled");
        e.preventDefault();
        var OTP       = $("input[name=OTP]").val();
        $.ajax({
           type:'POST',
           url:"<?php echo e(route('verifyotp')); ?>",
           data:{otp:OTP},
           success:function(data){
              if(data.status === true){
                $("#oldSuccessDiv").hide();
                $("#errorDiv").hide();
                $("#successDiv").show();
                $("#successDiv").html(data.message);
                $("#otp").val('');
                $("#personalInformation").submit();
              }else{
                $("#oldSuccessDiv").hide();
                $("#errorDiv").show();
                $("#errorDiv").html(data.message);
                $("#verifyOTP").html("Verify & Submit");
                $("#verifyOTP").removeAttr("disabled");
              }
           }
        });
  });
</script>
</body>
</html><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/layouts/default.blade.php ENDPATH**/ ?>