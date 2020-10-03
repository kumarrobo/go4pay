<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title><?php echo e(env('APP_NAME')); ?> - Recharge & Bill Payment</title>
<meta name="description" content="<?php echo e(env('APP_NAME')); ?> - Recharge & Bill Payment">
<meta name="author" content="Pradeep Kumar|go4shoponline@gmail.com|www.go4shop.online">

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
<style>
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 18px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
</head>
<body>
<div id="overlay">
  <div id="text">Please Wait...</div>
</div>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring" ></div>
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
<?php echo $__env->make('dialog_plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
           url:"<?php echo e(route('roverifyotp')); ?>",
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

  $("#add_beneficiary").click(function(e){
        $("#beneficiary_mob_no").show();
  });  

  //Add Bank Account
   $("#verifyAccountBtn").click(function(e){
      var account_no      = $("#account_no").val();
      if(account_no.length==0){
        $("#account_no").addClass('alert-danger');
        return false;
      }else{
        $("#account_no").removeClass('alert-danger');
      }
      var master_bank_id  = $("#master_bank_id").val();
      if(master_bank_id.length==0){
        $("#master_bank_id").addClass('alert-danger');
        return false;
      }else{
        $("#master_bank_id").removeClass('alert-danger');
      }

      var ifsccodeStr     = $("#IFSCCode").val();
      if(ifsccodeStr.length==0){
        $("#IFSCCode").addClass('alert-danger');
        return false;
      }else{
        $("#IFSCCode").removeClass('alert-danger');
      }
      var hiddenid            = $("#hiddenid").val();
      var beneficiary_mob_no  = $("#beneficiary_mob_no").val();
      e.preventDefault();
      $.ajax({
           type:'POST',
           url:"<?php echo e(route('roverifybankaccount')); ?>",
           data:{account_no:account_no,master_bank_id:master_bank_id,IFSCCode:ifsccodeStr,id:hiddenid,beneficiary_mob_no:beneficiary_mob_no},
           beforeSend: function(){
            // Statement
            $('#overlay').show();
           },
           success:function(data){
              if(data.success === true){
                    if(data.is_api == false){

                       $('#verifedBankAccount').show();
                        var account_name    = data.data.account_name;
                        var bank_name       = $("#master_bank_id").val();
                        var account_number  = data.data.account_number;
                        var ifsc            = data.data.account_ifsc;
                    }else if(data.data.data.is_valid == true){
                        $('#verifedBankAccount').show();
                        var account_name    = data.data.data.account_name;
                        var bank_name       = $("#master_bank_id").val();
                        var account_number  = data.data.data.account_number;
                        var ifsc            = data.data.data.ifsc;
                    }else{
                      var str = "<div class='alert alert-danger'>Invalid Account Details</div>";
                        $("#msg").html(str);
                        $('#overlay').hide();
                    }
                      
                      $("#ifsc").val(ifsc);
                      $("#account_number").val(account_number);
                      $("#account_name").val(account_name);

                      $("#accountHolerName").html(account_name);
                      var str ="<th scope='row'>Success</th>";
                          str+="<td>"+bank_name+"</td>";
                          str+="<td>"+account_number+"</td>";
                          str+="<td>"+ifsc+"</td>";
                      $("#RecipientDetails").html(str);
                      $("#account_number").val(account_number);
                      $('#overlay').hide();
                      var str = "<div class='alert alert-success'>Account Varified !!</div>";
                      $("#msg").html(str);
                       
                   
                
              }else{
                var str = "<div class='alert alert-danger'>"+data.message+"</div>";
                $("#msg").html(str);
                $('#overlay').hide();
              }
           }
        });
   });
 
  //Add Bank Account
   $("#addAccountBtn").click(function(e){
      var account_no      = $("#account_number").val();
      if(account_no.length==0){
        $("#account_no").addClass('alert-danger');
        return false;
      }else{
        $("#account_no").removeClass('alert-danger');
      }
      var master_bank_id  = $("#master_bank_id").val();
      if(master_bank_id.length==0){
        $("#master_bank_id").addClass('alert-danger');
        return false;
      }else{
        $("#master_bank_id").removeClass('alert-danger');
      }

      var ifsccodeStr     = $("#ifsc").val();
      if(ifsccodeStr.length==0){
        $("#IFSCCode").addClass('alert-danger');
        return false;
      }else{
        $("#IFSCCode").removeClass('alert-danger');
      }
      var hiddenid            = $("#hiddenid").val();
      var beneficiary_mob_no  = $("#beneficiary_mob_no").val();
      e.preventDefault();
      $.ajax({
           type:'POST',
           url:"<?php echo e(route('roaddaccountrequest')); ?>",
           data:{account_no:account_no,master_bank_id:master_bank_id,IFSCCode:ifsccodeStr,id:hiddenid},
           beforeSend: function(){
            // Statement
            $('#overlay').show();
           },
           success:function(data){
              if(data.success === true){
                var str = "<div class='alert alert-success'>"+data.message+"</div>";
                $("#msgBank").html(str);
                $('#overlay').hide();
                if(data.redirect){
                  $("#personalInformation").submit();
                }
              }else{
                var str = "<div class='alert alert-danger'>"+data.message+"</div>";
                $("#msgBank").html(str);
                $('#overlay').hide();
                if(data.redirect){
                  $("#personalInformation").submit();
                }
              }
           }
        });
   });
</script>
</body>
</html><?php /**PATH /var/www/html/siddiventures/resources/views/layouts/defaultRODashboard.blade.php ENDPATH**/ ?>