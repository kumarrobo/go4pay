
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4">{{ __('Wallet Balance Transfer To ') }}{{ __($userDetails['name']) }}</h4>
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
                <form id="personalInformation" method="post" action="{{route('verifytransfer',['id'=>$id,'tday'=>$tday])}}" method="POST">
                  @csrf
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Current Balance Amount') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                        Rs. {{GeneralHelper::getWalletBalance()}}
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                        <label>Enter Amount</label>
                       <input type="number"  class="form-control" data-bv-field="amount" id="amount"  placeholder="{{ __('Enter Amount e.g 5000.00') }}" name="amount" autocomplete="off" >
                      </div>
                      </div>

                  </div>

                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                         <label>Enter Remarks</label>
                       <input type="text"  class="form-control" data-bv-field="remarks" id="remarks"  placeholder="{{ __('Enter Remarks') }}" name="remarks" required="required">
                      </div>
                      </div>
                      
                  </div>
                 
                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-7" style="font-weight: bold;">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
          <!-- Orders History end --> 
            </div> 
