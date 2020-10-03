<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title><?php echo e(env('APP_NAME')); ?> - Recharge & Bill Payment, Booking App</title>
<meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Recharge & Bill Payment">
<meta name="author" content="Pradeep Kumar|go4shoponline@gmail.com">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/jquery-ui/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/vendor/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" type="text/css" href="<?php echo e(config('global.THEME_PATH')); ?>/css/stylesheet.css" />
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 

<!-- Header
============================================= -->
  <?php echo $__env->make('header_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Header end --> 


<!-- Content
============================================= -->
<div id="content"> 

 <?php echo $__env->make('dashboardMenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
<!-- Preloader End --> 
<?php echo $__env->yieldContent('content'); ?>

</div>  
<!-- Footer
============================================= -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer end --> 
</div>
<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
    <i class="fa fa-chevron-up"></i>
</a> 

<!-- Modal Dialog - View Plans
============================================= -->
<!-- <?php echo $__env->make('dialog_plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<!-- Modal Dialog - View Plans end --> 

<!-- Modal Dialog - Login/Signup
============================================= -->
<!-- <?php echo $__env->make('dialog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
<!-- Modal Dialog - Login/Signup end --> 

<!-- Script --> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/jquery/jquery.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/owl.carousel/owl.carousel.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/js/theme.js"></script>
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/daterangepicker/moment.min.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/daterangepicker/daterangepicker.js"></script> 
<script src="<?php echo e(config('global.THEME_PATH')); ?>/vendor/easy-responsive-tabs/easy-responsive-tabs.js"></script> 

<script type="text/javascript">


  /*
   * Script For Choose Payment Mode While "Upload Wallet Balance For Distributor"
   */
  $(document).ready(function(){
    $("#paymentMode").click(function(){
      	var id = $(this).val();
      	$(".paymentmode").hide();
      	$("#paymentmode"+id).fadeIn();
    });


    //Datepicker

  // Hotels Check Out Date
  $('#payment_date').daterangepicker({
    singleDatePicker: true,
    minDate: moment(),
    autoUpdateInput: false,
    }, function(chosen_date) {
      $('#payment_date').val(chosen_date.format('DD-MM-YYYY'));
  });


  $('#transfer_date').daterangepicker({
    singleDatePicker: true,
    minDate: moment(),
    autoUpdateInput: false,
    }, function(chosen_date) {
      $('#transfer_date').val(chosen_date.format('DD-MM-YYYY'));
  });



   $('#neft_transfer_date').daterangepicker({
    singleDatePicker: true,
    minDate: moment(),
    autoUpdateInput: false,
    }, function(chosen_date) {
      $('#neft_transfer_date').val(chosen_date.format('DD-MM-YYYY'));
  });

   $('#busDepart').daterangepicker({
    singleDatePicker: true,
    maxDate: moment(),
    autoUpdateInput: false,
    }, function(chosen_date) {
      $('#busDepart').val(chosen_date.format('YYYY-MM-DD'));
  });




  });
</script>
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
          beforeSend: function(request) {
                request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
          },
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



  //Add Bank Account
   $("#addAccountBtn").click(function(e){
      alert("dasd");
      var account_no      = $("#account_no").val();
      var master_bank_id  = $("#master_bank_id").val();
      var IFSCCode        = $("#IFSCCode").val();
      var hiddenid        = $("#hiddenid").val();
      e.preventDefault();
       $.ajax({
           type:'POST',
           url:"<?php echo e(route('addaccountrequest')); ?>",
           data:{account_no:account_no,master_bank_id:master_bank_id,IFSCCode:IFSCCode,id:hiddenid},
           success:function(data){
            console.log(data);
              if(data.status === true){
                alert("ok");
              }else{
                alert("dasd");
              }
           }
        });
   });
</script>

<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion          
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical', //Types: default, vertical, accordion
});
});
</script>
</body>
</html><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/layouts/defaultDashboard.blade.php ENDPATH**/ ?>