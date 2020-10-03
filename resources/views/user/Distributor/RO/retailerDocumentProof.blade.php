
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
       
              <div class="col-lg-8"  style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4">{{ __('Upload Document Proof') }}</h4>
                 <p>
                    
                    @if(Session::has('error'))
                    <p class="alert alert-danger"><small>
                    @foreach(Session::get('error') as $err)
                    <b>Error:</b> {{ $err }}</br>
                    @endforeach
                    </small>
                    </p>
                    @endif

                  </p>
                <form id="personalInformation" method="post" action="{{route('documentproof',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$id}}">
                  <div class="form-group row">
                      <div class="col-md-6">
                      <label for="fullName">{{ __('ID Proof') }}</label>
                       <select class="form-control" name="id_proof_file_type">
                        <?php foreach($idProofType as $key=>$item){ ?>
                        <option value="{{$key}}">{{$item}}</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fullName">{{ __('Upload ID Proof') }}</label>
                     <input type="file"  class="form-control" data-bv-field="id_proof_file" id="id_proof_file"   placeholder="{{ __('Upload ID Proof') }}" name="id_proof_file">
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    </div>

                  </div>
                  <div class="form-group">
                    <hr/><br/>
                  </div>
                 
                    <div class="form-group row">
                      <div class="col-md-6">
                    <label for="emailID">{{ __('Address Proof') }}</label>
                    <select class="form-control" name="address_proof">
                      <?php foreach($addressProofType as $key=>$item){ ?>
                        <option value="{{$key}}">{{$item}}</option>
                        <?php } ?>
                    </select>
                  </div>
                    <div class="col-md-6">
                    <label for="emailID">{{ __('Upload Address Proof') }}</label>
                    <input type="file"  class="form-control" data-bv-field="address_proof_file" id="address_proof_file"   name="address_proof_file">
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    
                  </div>
              
                  </div>
                    <div class="form-group">
                    <hr/><br/>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                    <label for="emailID">{{ __('Company Proof') }}</label>
                    <select class="form-control" name="company_proof">
                      <?php foreach($companyProofType as $key=>$item){ ?>
                        <option value="{{$key}}">{{$item}}</option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-md-6">
                    <label for="emailID">{{ __('Company Proof') }}</label>
                    <input type="file"  class="form-control" data-bv-field="company_proof_file" id="company_proof_file"   name="company_proof_file">
                     <small class="" style="color: red">File extension should be .jpg, .jpeg  Max size 1024KB</small>
                    </div>
                  </div>
                    <div class="form-group">
                    <hr/><br/>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12 offset-2">
                  <button class="btn btn-danger" type="button">Cancle</button>
                  <button class="btn btn-primary" type="submit">Upload & Save</button>
                </div>
              </div>
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

      