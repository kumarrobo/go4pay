            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-5  card " style="border: solid 1px #eee;padding:20px; 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">

                <h5 style="margin: 0px; padding: 0px;" class="mb-4">{{ __('Enter Mobile Number') }}</h5>
                 <p>
                   
                    @if(Session::has('error'))
                    <p class="alert alert-danger"><small>
                    @foreach(Session::get('error') as $err)
                    <b>Error:</b> {{ $err }}</br>
                    @endforeach
                    </small>
                    </p>
                    @endif
                     @if(Session::has('message'))
                    <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif

                  </p>
                <form id="personalInformation" method="post" action="{{route('romoneytransfer')}}" method="POST">
                  @csrf
                
               
                   <div class="form-group ">
                     <div class="row">
                       <div class="col-md-4">
                        Mobile Number
                      </div>
                      <div class="col-md-7">
                       <input type="number"  class="form-control" data-bv-field="mobile" id="mobile"  placeholder="{{ __('Enter Mobile Number') }}" name="mobile" maxlength="10" required="required" value="{{$mobile}}" 
                        <?php if($verifyOTP){ ?> readonly="readonly" <?php }?> >
                      </div>
                      </div>
                      
                      
                  </div>
                   <div  <?php if($verifyOTP){ ?> style="display: block" <?php }else{ ?> style="display: none"<?php } ?>>
                    <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        Sender Name
                      </div>
                      <div class="col-md-7">
                       <input type="text"  class="form-control" data-bv-field="name" id="name"  placeholder="{{ __('Enter Sender Name') }}" name="sender_name" value="{{old('sender_name')}}">
                      </div>
                    </div>
                    </div>
                     <div class="form-group"> 
                      <div class="row">
                      <div class="col-md-4">
                        Email
                      </div>
                      <div class="col-md-7">
                      
                       <input type="email"  class="form-control" data-bv-field="email" id="email"  placeholder="{{ __('Enter email address') }}" name="email" value="{{old('email')}}">
                      </div>
                      </div>
                      </div>

                      <div class="form-group"> 
                      <div class="row">
                      <div class="col-md-4">
                        Address
                      </div>
                      <div class="col-md-7">
                      
                       <input type="text"  class="form-control" data-bv-field="address" id="address"  placeholder="{{ __('Enter address') }}" name="address" value="{{old('address')}}">
                      </div>
                      </div>
                      </div>

                      <div class="form-group"> 
                      <div class="row">
                      <div class="col-md-4">
                        Verify OTP
                      </div>
                      <div class="col-md-7">
                      
                       <input type="number"  class="form-control bg-danger" data-bv-field="mobile_otp" id="mobile_otp"  placeholder="{{ __('Enter OTP number') }}" name="mobile_otp" maxlength="6" >
                      </div>
                      </div>
                      </div>
                      
                  </div>
                  

                


                <div class="form-group ">
                     <div class="row">
                       <div class="col-md-4">&nbsp;</div>
                      <div class="col-md-8">
                        <button class="btn btn-danger" type="submit">Cancle</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </div>
                  </div>
                </form>
              </div>

         
          <!-- Orders History end --> 
            </div> 
