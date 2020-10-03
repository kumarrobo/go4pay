     <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Company Type') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                       {{GeneralHelper::getCompanyTypeList($RODetails['UserDetail']['company_type'])}}
                      </div>
                      </div>
                  </div>
                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Company Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['UserDetail']['company_name']}}
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Service By') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{GeneralHelper::getServiceTypeList($RODetails['UserDetail']['service_by'])}}
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Zone') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                         {{GeneralHelper::getZoneTypeList($RODetails['UserDetail']['zone'])}}
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('ID Proof Type') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{GeneralHelper::getDocumentProofType($RODetails['UserDetail']['id_proof_type_id'])}}<br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('ID Proof Document') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        <img src="{{Config('global.FILE_PATH')}}/{{$RODetails['UserDetail']['id_proof_document']}}" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Address Proof ID Type') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{GeneralHelper::getDocumentProofType($RODetails['UserDetail']['address_proof_type_id'])}}<br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Address Proof Document') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        <img src="{{Config('global.FILE_PATH')}}/{{$RODetails['UserDetail']['address_proof']}}" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>


                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Business Proof Type') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{GeneralHelper::getDocumentProofType($RODetails['UserDetail']['business_proof_type_id'])}}<br/>
                        
                      </div>
                      </div>
                  </div>
                  
                    <div class="form-group ">
                     <div class="row">
                      <div class="col-md-3">
                      <label for="fullName" style="font-weight: bold;">{{ __('Business Proof Document') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        <img src="{{Config('global.FILE_PATH')}}/{{$RODetails['UserDetail']['business_proof']}}" width="350" onerror="this.onerror=null;this.src='<?php echo env('NO_IMAGE'); ?>'">
                      </div>
                      </div>
                  </div>
                  
                