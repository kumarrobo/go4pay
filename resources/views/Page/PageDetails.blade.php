
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
      <div class="bg-light shadow-md rounded p-4">
        {!!GeneralHelper::getPageBanner($pageDetails)!!}
        {!!GeneralHelper::getPageDescription($pageDetails)!!}
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
  @include('footer')
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 
@endsection

