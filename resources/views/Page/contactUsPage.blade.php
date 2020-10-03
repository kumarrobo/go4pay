
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
            <h1>{{GeneralHelper::getTitleOfPage($pageDetails)}}</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="{{route('home')}}">Home</a></li>
              <li class="active">{{GeneralHelper::getTitleOfPage($pageDetails)}}</li>
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
              <h3>{{GeneralHelper::getSettingValue($Settings,'app_name')}}</h3>
              <p>
                {{GeneralHelper::getSettingValue($Settings,'address_number_1')}}<br/>
                {{GeneralHelper::getSettingValue($Settings,'address_number_2')}}<br/>
                {{GeneralHelper::getSettingValue($Settings,'address_state')}},
                {{GeneralHelper::getSettingValue($Settings,'address_country')}}
                
              </p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-phone"></i> </div>
              <h3>Telephone</h3>
              <p>
              {{GeneralHelper::getSettingValue($Settings,'phone_number')}},              {{GeneralHelper::getSettingValue($Settings,'office_number')}}</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="fas fa-envelope"></i> </div>
              <h3>Business Inquiries</h3>
              <p>{{GeneralHelper::getSettingValue($Settings,'contact_email')}}</p>
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
  @include('footer')
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 
@endsection

