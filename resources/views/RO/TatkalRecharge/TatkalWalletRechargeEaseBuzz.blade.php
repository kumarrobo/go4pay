<style type="text/css">
  .form-control{
    height: 40px !important;
  }
</style>
            <!-- Personal Information
          ============================================= -->
            <div class="row">
               <div class="col-lg-12" style="padding:5px;">
               <p>
                    @if(Session::has('message'))
                    <p class="alert alert-success">{{Session::get('message')}}&nbsp; Credit Amount: <b>{{$credit_amount}}</b>, Transaction No: <b>{{$transaction_number}}</b> </p>
                    @endif
                  </p>
                </div>
              <div class="col-lg-4" style="padding:5px;">
                 <div class="card text-white bg-success mb-3">
                  <div class="card-header">Account Information</div>
                  <div class="card-body">
                    <table class="card-text" width="100%" style="font-size: 12px;">
                      <tr>
                        <td width="60%"><b>Total Credit</b></td>
                        <td width="10%">:</td>
                        <td width="30%">{{GeneralHelper::getCreditBalance()}}</td>
                      </tr>
                      <tr>
                        <td><b>Total Debit</b></td>
                        <td>:</td>
                        <td>{{GeneralHelper::getDebitBalance()}}</td>
                      </tr>
                      <tr>
                        <td><b>Balance</b></td>
                        <td>:</td>
                        <td>{{GeneralHelper::getAmount(GeneralHelper::getWalletBalance())}}</td>
                      </tr>
                      <tr></tr>
                    </table>
                  </div>
                </div>

                <div class="card text-white bg-info mb-3">
                <div class="card-header">Charges Details</div>
                <div class="card-body">
                 <table class="card-text" width="100%" style="font-size: 12px;">
                    <?php if(!empty($AgentCommission)){ 
                          foreach($AgentCommission as $itemList){ ?>
                      <tr>
                        <td width="60%"><b>{{$itemList['TransactionType']['transaction_type']}}</b></td>
                        <td width="10%">:</td>
                        <td width="30%">{{$itemList['commission']}}{{'@'}}{{$itemList['TransactionType']['commission_type']}}</td>
                      </tr>
                    <?php }} ?>

                    </table>
                </div>
              </div>



              <div class="card  bg-default mb-3">
                <div class="card-header">Charges Details</div>
                <div class="card-body">
                 <table class="card-text" width="100%" style="font-size: 12px; color: #000">
                    <?php if(!empty($MoneyTransferCharge)){ 
                          foreach($MoneyTransferCharge as $itemList){ ?>
                      <tr>
                        <td width="60%"><b>{{$itemList['AmountType']['transaction_amount']}}</b></td>
                        <td width="10%">:</td>
                        <td width="30%">{{number_format($itemList['value'],2)}}{{'@'}}{{$itemList['AmountType']['type']}}</td>
                      </tr>
                    <?php }} ?>

                    </table>
                </div>
              </div>



              
              </div>
               <div class="col-lg-1" style="border: solid 0px #eee;padding: 20px;"></div>
                <div class="col-lg-7" style="border: solid 0px #eee;padding:5px; font-size: 12px;">
                  @if(Session::has('error'))
                  <p class="alert alert-danger" style="font-size: 12px;">
                  @foreach(Session::get('error') as $err)
                  {{ $err }}</br>
                  @endforeach
                  </p>
                  @endif
                <form action="{{route('roconfirmrecharge')}}" method="POST">
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
                       <input type="text" class="form-control" data-bv-field="agency_name" id="agency_name" placeholder="agency name" name="agency_name" value="{{$userDetails['AgentCode']}}" autocomplete="off" value="{{Auth::user()->AgentCode}}" readonly="readonly
                       ">
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
                       <input type="text" class="form-control" data-bv-field="acurrent_balance" id="acurrent_balance" placeholder="0.00" name="acurrent_balance" value="{{GeneralHelper::getWalletBalance()}}" autocomplete="off"  readonly="readonly">
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
                       <input type="number" class="form-control" data-bv-field="request_amount" id="request_amount" placeholder="0.00" name="request_amount"  autocomplete="off"  maxlength="3" required="required">
                      </div>
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
                       <input type="text" class="form-control" data-bv-field="request_name" id="request_name" placeholder="Enter Request Name" name="request_name"  autocomplete="off"   required="required">
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
                       <select name="payment_mode" class="form-control" style="padding:5px;">
                        <?php foreach($AgentCommission as $item){ ?>
                         <option value="{{$item['TransactionType']['id']}}">{{$item['TransactionType']['transaction_type']}}</option>
                       <?php } ?>
                       </select>
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
                       <input type="text" class="form-control" data-bv-field="email_address" id="email_address" placeholder="Enter email address" name="email_address"  autocomplete="off" value="{{old('email_address')}}" required="required" >
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
                       <input type="number" class="form-control" data-bv-field="mobile" id="mobile" placeholder="Enter mobile number " name="mobile"  autocomplete="off"  maxlength="10" minlength="10" value="{{old('mobile')}}" required="required">
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
                       <input type="text" class="form-control" data-bv-field="remarks" id="remarks" placeholder="Enter remarks" name="remarks"  autocomplete="off" value="{{old('remarks')}}" required="required">
                      </div>
                      </div>
                  </div>
                     <div class="form-group ">
                      <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;"></label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;"></p>
                      </div>

                      <div class="col-md-7">
                        <input type="Submit" name="submit" value="Submit" class=" btn btn-success">
                      </div>
                      </div>
                       
                     </div>
                     </form>
                </div>
              </div>
              </div>


            </div>
