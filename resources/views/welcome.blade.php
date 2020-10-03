
@extends('layouts.default')

@section('content')
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  
  <!-- Header
  ============================================= -->
  @include('header')
  <!-- Header end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content"lass="bg-secondary"> 
    <section class="page-header page-header-text-light bg-secondary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h1>LOGIN</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="index.html">Home</a></li>
              <li class="active">Login</li>
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
            <h2 class="text-4 mb-3">Login</h2>
            @if (Session::has('status'))
                     <div class="card-header alert-danger">{{ __(Session::get('status')) }}</div>
                 @endif
          <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
            
            <form method="POST"  id="loginForm" action="{{ route('login') }}">
             @csrf
              <div class="form-group">
                <label for="loginMobile">Mobile Number</label>
                <input id="mobile" type="phone" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="loginPassword">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="row mb-4">
                <div class="col-sm">
                  <div class="form-check custom-control custom-checkbox">
                    <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="col-sm text-right"> 
                    @if (Route::has('password.request'))
                        <a class="justify-content-end" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                  </div>


              </div>
              <button class="btn btn-primary btn-block" type="submit">Login</button>

            </form>
            
          </div>
         
       
       
        </div>
             
            
             
            
          </div>
          <!-- Mobile Recharge end --> 
          
          <!-- Slideshow
          ============================================= -->
          <div class="col-lg-8">
            <div class="owl-carousel owl-theme single-slider" data-animateout="fadeOut" data-animatein="fadeIn" data-autoplay="true" data-loop="true" data-autoheight="true" data-nav="true" data-items="1">
              <div class="item">
                <a href="#">
                  <img class="img-fluid" src="{{config('global.THEME_PATH')}}/images/slider/banner-3.jpg" alt="banner 1" />
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img class="img-fluid" src="{{config('global.THEME_PATH')}}/images/slider/banner-6.jpg" alt="banner 2" />
                </a>
              </div>
              <div class="item">
                <a href="#">
                  <img class="img-fluid" src="{{config('global.THEME_PATH')}}/images/slider/banner-11.jpg" alt="banner 2" />
                </a>
              </div>

            </div>
          </div>
          <!-- Slideshow end --> 
          
        </div>
      </div>
    </section>
    
    <!-- Tabs
    ============================================= -->
   <div class="section py-4">
      <div class="container">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" id="mobile-recharge-tab" data-toggle="tab" href="#mobile-recharge" role="tab" aria-controls="mobile-recharge" aria-selected="true">About Us</a> </li>
          <li class="nav-item"> <a class="nav-link" id="billpayment-tab" data-toggle="tab" href="#billpayment" role="tab" aria-controls="billpayment" aria-selected="false">Service</a> </li>
          <li class="nav-item"> <a class="nav-link" id="why-quickai-tab" data-toggle="tab" href="#why-quickai" role="tab" aria-controls="why-quickai" aria-selected="false">Refund Policy</a> </li>
        </ul>
        <div class="tab-content my-3" id="myTabContent">
          <div class="tab-pane fade active show" id="mobile-recharge" role="tabpanel" aria-labelledby="mobile-recharge-tab">
            <p>We offers you Online and Offline recharge facility for Mobile Recharge, DTH Recharge, Datacard Recharge, Postpaid Bill, Landline Bill, Gas Bill, Electricity and Insurance Premium Payment all over in India. We also provide you with Flight Booking services. It is like a value added service for the businesses. We believe in friendly business because we provide services by themselves is your place.

We set up your own multi level commission structure, Configure forwarding API, Bill Payment etc. using our ready made Recharge framework. <a href="{{url('contactus')}}">Read More</a></p>
          </div>
          <div class="tab-pane fade" id="billpayment" role="tabpanel" aria-labelledby="billpayment-tab">
            <p>
              What We Offer In Service?
              RechargeOnline
              Recharge gives you the liberty to recharge your mobile phone number anytime and from anywhere.

              DTH Recharge
              We provide Online DTH Recharge Services for all major operators for SD connection & HD Connections.

              Travel Booking
              Now do Travel Booking using our app anytime and anywhere.

              Bill Payment
              Instant, secure, fast BillPayment Services. [Coming Soon]

              Tickets Booking
              Online bus tickets booking option is a great way and also promotes hassle-free bus travel across the India.

              Easy Payment
              Safe, Quick and Easy payment! Choose any electricity bill payment using credit card or dedit card.
            </p>
          </div>
          <div class="tab-pane fade" id="why-quickai" role="tabpanel" aria-labelledby="why-quickai-tab">
            <p>We at www.siddhiventures.com describe the procedure we follow to handle your personal information. It refers to the information that is being collected within www.siddhiventures.com. By accepting the privacy policy you acknowledge the practices and policies outlined within this policy and hereby give your approval that we will use, collect and share your information in the following ways.

We have strong return policy, if any issue with service, we have guarantee of full refund within 10 days.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabs end --> 
    
    <!-- Refer & Earn
    ============================================= -->
    <section class="section bg-light shadow-md">
      <div class="container">
        <h2 class="text-9 font-weight-600 text-center">Refer &amp; Earn</h2>
        <p class="lead text-center mb-5">Refer your friends and earn up to ₹20*.</p>
        <div class="row">
          <div class="col-sm-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-primary text-light rounded-circle"> <i class="fas fa-bullhorn"></i> </div>
              <h3>You Refer Friends</h3>
              <p class="text-3">Share your referral link with friends. They get ₹10*.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-primary text-light rounded-circle"> <i class="fas fa-share"></i> </div>
              <h3>Your Friends Register</h3>
              <p class="text-3">Your friends Register with using your referral link.</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="featured-box style-4">
              <div class="featured-box-icon bg-primary text-light rounded-circle"> <i class="fas fa-rupee-sign"></i> </div>
              <h3>Earn You</h3>
              <p class="text-3">You get ₹20*. You can use these credits to take recharge.</p>
            </div>
          </div>
        </div>
        <div class="text-center pt-4"> <a href="{{url('register')}}" class="btn  btn-danger">Get Started Earn</a> </div>  
    </div>
    </section>
    <!-- Refer & Earn end --> 
    
    <!-- Mobile App
    ============================================= -->

   
    
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
  @include('footer')
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 
@endsection

