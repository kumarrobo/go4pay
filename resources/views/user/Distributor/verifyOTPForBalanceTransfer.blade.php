
            <!-- Personal Information
          ============================================= -->
          <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-5" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="" style="font-size: 16px;">{{ __('Wallet Balance Transfer To ') }}{{ __($userDetails['name']) }}</h4>
                 <p>
                    @if(Session::has('message'))
                    <p class="alert alert-success" id="oldSuccessDiv">{{Session::get('message')}}</p>
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
                  <p class="alert alert-danger" id="errorDiv" style="display: none"></p>
                  <p class="alert alert-success" id="successDiv" style="display: none"></p>
                <form id="personalInformation" method="post" action="{{route('transfertouserwallet',['id'=>$id,'tday'=>$tday])}}" method="POST">
                  @csrf
                
                  <div class="row">
                  <div class="col-md-4">
                  <label for="fullName" style="font-weight: bold;">{{ __('Transfer Amount') }}</label>
                  </div>
                   <div class="col-1">
                    <p style="font-weight: bold;">{{__(':')}}</p>
                  </div>
                  <div class="col-md-7" style="font-weight: bold;">
                    {{GeneralHelper::getAmount($requestData['amount'])}}
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-4">
                  <label for="fullName">{{ __('Remarks') }}</label>
                  </div>
                   <div class="col-1">
                    <p>{{__(':')}}</p>
                  </div>
                  <div class="col-md-7">
                    {{$requestData['remarks']}}

                  </div>
                  </div>
                  <input type="hidden" name="remarks" value="{{$requestData['remarks']}}">
                  <input type="hidden" name="amount" value="{{$amount}}">

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-12">
                        <p>
                        <center class="text-2">Please enter Verification Code sent on your Registered Mobile Number ending with {{$mobile}}.</center>
                        <small class="text-1 mb-3">If DND is Registered on your Mobile Number, Contact your Channel Partner OR <a class="justify-content-end" href="#">Resend OTP</a> for get NEW OTP.
                          </small>
                        @if (Session::has('status'))
                               <div class="card-header alert-danger">{{ __(Session::get('status')) }}</div>
                        @endif
                        </p>
                        
                       <input type="number"  class="form-control"  id="OTP"  placeholder="{{ __('Enter OTP') }}" name="OTP" autocomplete="off" >  
                     
                        <div class="row">
                          <div class="text-1" style="padding-left: 20px;">"Resend Otp" Button will be activated in next.</div>
                           
                        </div>
                      </div>
                      </div>

                  </div>

           
                 
                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-12" style="font-weight: bold;">
                      <button class="btn btn-danger" type="button">Cancel</button>
                      <button class="btn btn-primary" type="submit" id="verifyOTP">Verify & Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
          <!-- Orders History end --> 
            </div> 
