
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
       
              <div class="col-lg-6" style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h4 class="mb-4">{{ __('Wallet Balance Request') }}</h4>
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
                <form id="personalInformation" method="post" action="{{route('balancerequest')}}" method="POST">
                  @csrf
                  
                  <div class="form-group ">
                    <div class="row">
                      <div class="col-md-4">
                        <p style="font-weight: bold;">{{__('Distributor')}}</p>
                      </div>
                      <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7">
                        <p>{{Auth::user()->name}}</p>
                      </div>
                   </div>
                  </div>
                  
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Current Balance Amount') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;"><i class="fas fa-sack"></i>
                        {{GeneralHelper::getWalletBalance()}}
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Request for Amount') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="request_amount" id="request_amount"  placeholder="{{ __('Enter Amount e.g 5000') }}" name="request_amount" value="{{ old('request_amount') }}" >
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Payment Date') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="payment_date" id="payment_date"  placeholder="{{ __(date('d-m-Y')) }}" name="payment_date" value="{{ old('payment_date') }}" autocomplete="off" >
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('WB Request In') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <select name="request_in" class="form-control">
                          <option value="1" <?php if(old('request_in') == 1){ ?> selected="selected" <?php }?>>AES Wallet</option>
                          <option value="2" <?php if(old('request_in') == 2){ ?> selected="selected" <?php }?>>Bank</option>
                          <option value="3" <?php if(old('request_in') == 3){ ?> selected="selected" <?php }?>>Other</option>
                      </select>
                      </div>
                      </div>
                  </div>
                    
                     <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Payment Mode') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <select name="paymentMode" class="form-control" id="paymentMode">
                          <option value="">Select Payment Mode</option>
                            {!!GeneralHelper::getPaymentMode(old('paymentMode'))!!}
                      </select>
                      </div>
                      </div>
                  </div>

                <!--Details Tab for Cash In Bank--->
                  <div id="paymentmode1" class="paymentmode" <?php if(Session::get('paymentMode')==1){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      @include('user.PaymentMode.CashInBank')
                  </div>
                <!--Details Tab for Cash In Bank--->

                <!--Details Tab for CashInMachine In Bank--->
                  <div id="paymentmode2" class="paymentmode" <?php if(Session::get('paymentMode')==2){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      @include('user.PaymentMode.CashInMachine')
                  </div>
                <!--Details Tab for CashInMachine In Bank--->


                 <!--Details Tab for NEFT/RTGS/FT/IMPS In Bank--->
                  <div id="paymentmode3" class="paymentmode" <?php if(Session::get('paymentMode')==3){ ?> style="display: block" <?php }else{ ?> style="display: none" <?php } ?>>
                      @include('user.PaymentMode.CashByNEFT')
                  </div>
                <!--Details Tab for NEFT/RTGS/FT/IMPS  In Bank--->
  


                <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      &nbsp;
                      </div>
                       <div class="col-1">
                        &nbsp;
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <button class="btn btn-danger" type="button">Cancle</button>
                      <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
            </div> 
