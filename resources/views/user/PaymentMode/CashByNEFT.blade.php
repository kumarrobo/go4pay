   
                  <div class="form-group ">
                    <hr/>
                      <label for="fullName" style="font-weight: bold;">
                        {{ __('Payment Mode Details - NEFT/RTGS/FT/IMPS') }}
                      </label>
                      
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('NEFT/RTGS/FT/IMPS Date') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="neft_transfer_date" id="neft_transfer_date"  placeholder="{{ __(date('d-m-Y')) }}" name="neft_transfer_date"  value="{{old('neft_transfer_date')}}">
                      </div>
                      </div>
                  </div>

                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('NEFT/RTGS/FT/IMPS Sender Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="neft_sender_name" id="neft_sender_name"  placeholder="{{ __('Enter Sender Name') }}" name="neft_sender_name" value="{{old('neft_sender_name')}}" >
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Sender A/C No.') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <input type="text"  class="form-control" data-bv-field="sender_account_number" id="sender_account_number"  placeholder="{{ __('Sender Account Number') }}" name="sender_account_number" value="{{old('sender_account_number')}}" >
                      </div>
                      </div>
                  </div>
                  
                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('NEFT/RTGS/FT/IMPS Sent via Bank Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <select name="neft_bank_name" class="form-control">
                          <option value="">Select Bank</option>
                           {!!GeneralHelper::getAllBankName()!!}
                      </select>
                      </div>
                      </div>
                  </div>
                  

                


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Transaction Number') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="transaction_number" id="transaction_number"  placeholder="{{ __('Enter Transaction Number') }}" name="transaction_number" value="{{old('transaction_number')}}" >
                      </div>
                      </div>
                  </div>

                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('NEFT/RTGS/FT/IMPS Sent to Bank Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                       <select name="neft_aes_bank_name" class="form-control">
                          <option value="">Select Bank</option>
                           {!!GeneralHelper::getAESBankName()!!}
                      </select>
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('Remarks') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-7" style="font-weight: bold;">
                      <input type="text"  class="form-control" data-bv-field="Remarks3" id="remarks3"  placeholder="{{ __('Enter Remarks') }}" name="remarks3" >
                      </div>
                      </div>
                  </div>