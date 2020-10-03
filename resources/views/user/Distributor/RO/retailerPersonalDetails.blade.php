
@extends('layouts.defaultDashboard')

@section('content')

<section class="containers">
<div class="bg-light shadow-md rounded p-4">
  <div class="row"> 
    <div class="col-lg-12">
    <div class="bg-light shadow-md rounded p-4"> 
      
            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-3"> 
          <!-- Nav Link
          ============================================= -->
          <ul class="nav nav-pills alternate flex-lg-column sticky-top">
                <li class="nav-item"><a class="nav-link {{GeneralHelper::isActiveMenu('personaldetails')}}" href="{{route('personaldetails',['id'=>$id])}}"><i class="fas fa-user"></i>{{ __('Personal Details') }}</a></li>
            <li class="nav-item"><a class="nav-link {{GeneralHelper::isActiveMenu('retaileraddress')}}" href="{{route('retaileraddress',['id'=>$id])}}" ><i class="fas fa-bookmark"></i>{{ __('Address Details')}}</a></li>
            <li class="nav-item"><a class="nav-link {{GeneralHelper::isActiveMenu('retailercompany')}}" href="{{route('retailercompany',['id'=>$id])}}" ><i class="fas fa-bookmark"></i>{{ __('Company Proof')}}</a></li>
            <li class="nav-item"><a class="nav-link {{GeneralHelper::isActiveMenu('documentproof')}}" href="{{route('documentproof',['id'=>$id])}}" ><i class="fas fa-bookmark"></i>{{ __('Document Proof')}}</a></li>
            
          </ul>
          <!-- Nav Link end --> 
          <!--  <div class="bg-light-2 p-3">
                  <p class="mb-2">We value your Privacy.</p>
                  <p class="text-1 mb-0">We will not sell or distribute your contact information. Read our <a href="#">Privacy Policy</a>.</p>
                  <hr>
                  <p class="mb-2">Billing Enquiries</p>
                  <p class="text-1 mb-0">Do not hesitate to reach our <a href="#">support team</a> if you have any queries.</p>
                </div> -->
        </div>
       
              <div class="col-lg-6">

                <h4 class="mb-4">{{ __('Retailer Personal Details') }}</h4>
                 <p>
                    @if(Session::has('message'))
                    <p class="alert alert-success">You profile is created successfully, click here for <a href="{{route('login')}}">Login</a></p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert alert-danger"><small>
                    @foreach(Session::get('error') as $err)
                    <b>Error:</b> {{ $err }}</br>
                    @endforeach
                    </small>
                    </p>
                    @endif

                  </p>
                <form id="personalInformation" method="post" action="{{route('updateretailer')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="male" name="profile" class="custom-control-input" checked="" required="required" type="radio">
                      <label class="custom-control-label" for="male">{{ __('Male') }}</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input id="female" name="profile" class="custom-control-input" required="required" type="radio">
                      <label class="custom-control-label" for="female">{{ __('Female') }}</label>
                    </div>
                  </div>
                  <div class="form-group ">
                      <label for="fullName">{{ __('Full Name') }}</label>
                      <input type="text"  class="form-control" data-bv-field="first_name" id="first_name" name="first_name"  placeholder="Enter First Name" value="{{$userArr['first_name']}}">
                  </div>
                  <div class="form-group">
                    <label for="mobileNumber">{{ __('Last Name') }}</label>
                    <input type="text"  class="form-control" data-bv-field="last_name" id="last_name"   placeholder="{{ __('Enter Last Name') }}" name="last_name" value="{{$userArr['last_name']}}">
                  </div>
                
                 
                    <div class="form-group">
                    <label for="emailID">{{ __('Email Address') }}</label>
                    <input type="text"  class="form-control" data-bv-field="emailid" id="emailID"  placeholder="{{ __('Enter Email Address') }}" name="email" value="{{$userArr['email']}}" readonly="readonly">
                  </div>
                    <div class="form-group">
                    <label for="emailID">{{ __('Mobile Number') }}</label>
                    <input type="phone"  class="form-control" data-bv-field="emailid" id="emailID"  placeholder="{{ __('Enter Mobile Number') }}" maxlength="10" name="mobile" value="{{$userArr['mobile']}}" readonly="readonly">
                  </div>   
                  <div class="form-group">
                    <label for="emailID">{{ __('DOB') }}</label>
                    <input id="busDepart" type="text" class="form-control" required="" placeholder="Depart Date" maxlength="10" name="date_of_birth"  autocomplete="off" >
                    
                    <input type="hidden"  name="id" value="{{$userArr['id']}}">
                  </div>
                  <button class="btn btn-primary" type="submit">Update</button>
                </form>
              </div>
             
            </div>
           
    </div>
  </div>
  </div>
</div>
</section>

<!-- Document Wrapper end --> 
@endsection

      