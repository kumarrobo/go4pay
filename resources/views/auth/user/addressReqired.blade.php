
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
            <h1>Register</h1>
          </div>
          <div class="col-md-4">
            <ul class="breadcrumb justify-content-start justify-content-md-end mb-0">
              <li><a href="{{route('home')}}">Home</a></li>
              <li class="active">Register</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Secondary Navigation
    ============================================= -->
  
    <div class="container" >
      <div class="bg-light shadow-md rounded p-4">
        <div class="row"> 
          
          <!-- Mobile Recharge
          ============================================= -->
          <div class="col-lg-8 mb-4 mb-lg-0">
            <h2 class="text-4 mb-3">New Registration - Address Details</h2>
            <hr/>
            @if (Session::has('message'))
            <div class="card-header alert-success">{{ __(Session::get('message')) }}</div>
            @endif
          <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="loginPage" role="tabpanel" aria-labelledby="login-page-tab">
            
            <form method="POST" action="{{ route('addressreqired',['id'=>$id]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                              <label for="name" class=" col-form-label text-md-right"><b>{{ __('Address Line-1') }}</b></label>
                                <input id="address_line_1" type="text" class="form-control @error('name') is-invalid @enderror" name="address_line_1" value="{{ old('address_line_1') }}" required autocomplete="name" autofocus>

                                @error('address_line_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                               <div class="col-md-6">
                              <label for="name" class=" col-form-label text-md-right"><b>{{ __('Address Line-2') }}</b></label>

                                <input id="address_line_2" type="text" class="form-control @error('address_line_2') is-invalid @enderror" name="address_line_2" value="{{ old('address_line_2') }}" required autocomplete="address_line_2" autofocus>

                                @error('address_line_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     
                            
                            <div class="col-md-6">
                              <label for="email" class=" col-form-label text-md-right"><b>{{ __('Country') }}</b></label>

                                <select id="country_id" class="form-control @error('email') is-invalid @enderror" name="country_id">
                                  <option value="1">India</option>
                                  <option value="999">Other</option>
                                </select>
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                               <label for="email" class=" col-form-label text-md-right"><b>{{ __('State') }}</b></label>
                                <select id="state_id" class="form-control @error('state_id') is-invalid @enderror" name="state_id">
                                  {!!GeneralHelper::getStateOptionListName(1)!!}
                                </select>
                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                               <label for="email" class=" col-form-label text-md-right"><b>{{ __('City') }}</b></label>
                                <select id="city_id" class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                                  {!!GeneralHelper::getCityOptionListName(1)!!}
                                </select>
                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">

                               <label for="district" class="col-form-label text-md-right"><b>{{ __('District') }}</b></label>

                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" required autocomplete="district">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-6">

                               <label for="pincode" class="col-form-label text-md-right"><b>{{ __('Pincode') }}</b></label>

                                <input id="pincode" type="number" class="form-control @error('district') is-invalid @enderror" name="pincode" required autocomplete="pincode">

                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                      


                      
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-3">
                               <button type="button" class="btn btn-danger">
                                    {{ __('Cancle') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save & Continue') }}
                                </button>
                            </div>
                        </div>
                    </form>

          </div>
         
       
       
        </div>
             
            
             
            
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0 ">
                <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div>
                <hr/>
                <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div>
              </div>
          <!-- Mobile Recharge end --> 
          
          <!-- Slideshow
          ============================================= -->
      
        </div>
      </div>
      </div>
    
  
    
   
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

