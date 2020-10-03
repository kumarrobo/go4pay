            <!-- Personal Information
          ============================================= -->
            <div class="row">
              <div class="col-lg-12 col-sm-12">
              <p id="msgBank" style="font-size: 12px;"></p>
              <p id="msg" style="font-size: 12px;"></p>
            </div>
              <div class="col-lg-5 col-sm-12">
              
              <div class="card  mb-3"  style=" 
              -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
              box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4">{{ __('Verify Account Details') }}</b></div>
                  <div class="card-body">
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-3 col-sm-5">Sender</div>
                        <div class="col-md-1 col-sm-1">&nbsp;</div>
                        <div class="col-md-7 col-sm-6">{{$VerifyMobileNumber['sender_name']}},&nbsp;M: {{$VerifyMobileNumber['mobile']}}</div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-3 col-sm-5">A/C Number</div>
                        <div class="col-md-1 col-sm-1">&nbsp;</div>
                        <div class="col-md-7 col-sm-6"><input type="number" name="account_no" id="account_no" class="form-control" required="required"></div>
                      </div>
                    </div>
                     <div class="form-group ">
                     <div class="row">
                        <div class="col-md-3">Bank Name</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-7">
                          <select name="master_bank_id" class="form-control" id="master_bank_id">
                              <option value="">Select Bank</option>
                              <?php foreach($bankList as $item){ ?>
                              <option value="{{$item['title']}}">{{$item['title']}}</option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-3">IFSC Code</div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-7"><input type="text" name="IFSCCode" id="IFSCCode" class="form-control" required="required"></div>
                      </div>
                    </div>

                    <div class="form-group ">
                     <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-8">
                          <button type="button" name="cancel" class="btn btn-danger" style="font-size: 14px; text-decoration: none">Cancel</button>
                          
                          <input type="submit" name="submit" id="verifyAccountBtn"   class="btn btn-success" style="font-size: 14px; text-decoration: none" value="Verify Now">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </div>    
              <div class="col-lg-7 col-sm-12" style="display: none" id="verifedBankAccount">
              
              <div class="card  mb-3"  style=" 
                    -webkit-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
                    -moz-box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75);
                    box-shadow: -5px 8px 24px -17px rgba(0,0,0,0.75); ">
                  <div class="card-header"><b class="mb-4">{{ __('Verifed Account Details') }}</b></div>
                  <div class="card-body">
                    <div class="form-group ">

                     <div class="row">
                      <div class="col-md-12 col-sm-12">Account Number associated with <b id="accountHolerName"></b>.</div>
                      <div class="table-responsive">

                        <table class="table table-hover" style="border:none">
                          <thead  style="border:none">
                            <tr  style="border:none">
                              <th  style="border:none">Message</th>
                              <th  style="border:none">Bank Name</th>
                              <th  style="border:none">Account Number</th>
                              <th  style="border:none">IFSC Code</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="RecipientDetails">
                             
                            </tr>
                            <tr id="addBeneficiaryLinktr">
                              <td colspan="4">Do you want to <b>ADD</b> this Account as RECIPIENT <a href="#" id="add_beneficiary">Click Here</a>
                              <input type="hidden" name="account_name" id="account_name"> 
                              <input type="hidden" name="account_number" id="account_number"> 
                              <input type="hidden" name="ifsc" id="ifsc">
                              <input type="hidden" name="hiddenid" id="hiddenid" value="{{$id}}">
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                     <div class="row">
                        <div class="col-md-4">
                          <input type="text" style="width: 100%;display: none" class="form-control" maxlength="10" name="beneficiary_mob_no" id="beneficiary_mob_no" placeholder="RECIPIENT Mobile No">
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-7">
                          <button type="button" name="cancel" class="btn btn-danger" style="font-size: 14px; text-decoration: none">Cancel</button>
                          <input type="submit" name="save" id="addAccountBtn" class="btn btn-success" style="font-size: 14px; text-decoration: none" value="Add Beneficiary">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
          <!-- Orders History end --> 
            </div>     
<form id="personalInformation" method="post" action="{{route('romoneytransfer')}}" method="POST">
@csrf
<input type="hidden"  id="mobile"   name="mobile"  required="required" value="{{$VerifyMobileNumber['mobile']}}">
</form>