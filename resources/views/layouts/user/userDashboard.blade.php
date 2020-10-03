<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>{{env('APP_NAME')}} - Recharge & Bill Payment, Booking</title>
<meta name="description" content="Quickai - Recharge & Bill Payment, Booking HTML5 Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="{{config('global.THEME_PATH')}}/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="{{config('global.THEME_PATH')}}/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="{{config('global.THEME_PATH')}}/vendor/owl.carousel/assets/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="{{config('global.THEME_PATH')}}/vendor/owl.carousel/assets/owl.theme.default.min.css" />
<link rel="stylesheet" type="text/css" href="{{config('global.THEME_PATH')}}/css/stylesheet.css" />
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
  @include('header_user')
<!-- Header end --> 


<!-- Content
============================================= -->
<div id="content"> 

 @include('user.userProfileMenu')

  
<!-- Preloader End --> 
@yield('content')

</div>  
<!-- Footer
============================================= -->
@include('footer')
<!-- Footer end --> 
</div>
<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
    <i class="fa fa-chevron-up"></i>
</a> 

<!-- Modal Dialog - View Plans
============================================= -->
@include('dialog_plans')
<!-- Modal Dialog - View Plans end --> 

<!-- Modal Dialog - Login/Signup
============================================= -->
@include('dialog')
<!-- Modal Dialog - Login/Signup end --> 

<!-- Script --> 
<script src="{{config('global.THEME_PATH')}}/vendor/jquery/jquery.min.js"></script> 
<script src="{{config('global.THEME_PATH')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="{{config('global.THEME_PATH')}}/vendor/owl.carousel/owl.carousel.min.js"></script> 
<script src="{{config('global.THEME_PATH')}}/js/theme.js"></script>
</body>
</html>