<style type="text/css">
  .form-control{
    height: 40px !important;
  }
</style>
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
               <div class="col-lg-3" style="border: solid 0px #eee;padding: 20px;"></div>
                <div class="col-lg-6" style="border: solid 0px #eee;padding:5px; font-size: 13px;">
                  @if(Session::has('error'))
                  <p class="alert alert-danger" style="font-size: 12px;">
                  @foreach(Session::get('error') as $err)
                  {{ $err }}</br>
                  @endforeach
                  </p>
                  @endif
                <form action="{{route('roconfirmationorder')}}" method="POST">
                @csrf
                <div class="card  mb-3">
                <div class="card-header"><b>Tatkal Wallet Topup</b></div>
                <div class="card-body">

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Agency Name</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                            {{Auth::user()->AgentCode}}
                      </div>
                      </div>
                  </div>



                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Current Balance Amount</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       {{GeneralHelper::getAmount(GeneralHelper::getWalletBalance())}}                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Requested By Name</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       {{$request_name}}
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Request for Amount</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       <b>{{$request_amount}}</b>
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Payment Method</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                      {{$payment_mode}}
                      </div>
                      </div>
                  </div>
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Amount Into Wallet</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       <b>{{GeneralHelper::getAmount($afterComission)}}</b>
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Email ID</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       {{$email_address}}
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Mobile Numebr</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                      {{$mobile}}
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">Remarks</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>
                      <div class="col-md-7">
                       {{$productinfo}}
                      </div>
                      </div>
                  </div>
                     <div class="form-group ">
                      <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;"></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>

                      <div class="col-md-7">
                        <input type="hidden" name="request_name" value="{{$request_name}}">
                        <input type="hidden" name="paymentMode" value="{{$paymentMode}}">
                        <input type="hidden" name="enRequestAmount" value="{{$enRequestAmount}}">
                        <input type="hidden" name="enEmailAddress" value="{{$enEmailAddress}}">
                        <input type="hidden" name="enMobile" value="{{$enMobile}}">
                        <input type="hidden" name="enUserID" value="{{$enUserID}}">
                        <input type="button" name="cancle" value="Cancle" class=" btn btn-danger">
                        <input type="Submit" name="submit" value="Submit" class=" btn btn-success">
                      </div>
                      </div>
                       
                     </div>
                     </form>
                </div>
              </div>
              </div>


            </div>
