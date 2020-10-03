
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h5 class="mb-4">{{ __('Wallet Balance Transfered Successfully') }}</h5>
                <hr/>
                 <p>
                    @if(Session::has('message'))
                    <p class="alert alert-success">{{Session::get('message')}}</p>
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
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('DS~RO Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                         {{GeneralHelper::getUserProfileName($userArr)}}
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName">{{ __('Transfer Amount') }}</label>
                      </div>
                       <div class="col-1">
                        <p>{{__(':')}}</p>
                      </div>
                      <div class="col-md-7">
                        {{GeneralHelper::getAmount($userDetails['credit_amount'])}}
                      </div>
                      </div>


                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName">{{ __('Status') }}</label>
                      </div>
                       <div class="col-1">
                        <p>{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold; text-transform: uppercase; color: green">
                        {{$userDetails['status']}}
                      </div>
                      </div>


                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName">{{ __('Transaction Number') }}</label>
                      </div>
                       <div class="col-1">
                        <p>{{__(':')}}</p>
                      </div>
                      <div class="col-md-7">
                        {{$userDetails['transaction_number']}}
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName">{{ __('Transaction Date') }}</label>
                      </div>
                       <div class="col-1">
                        <p >{{__(':')}}</p>
                      </div>
                      <div class="col-md-7">
                        {{$userDetails['transaction_date']}}
                      </div>
                      </div>
                  </div>
              
              </div>
          <!-- Orders History end --> 
            </div> 
