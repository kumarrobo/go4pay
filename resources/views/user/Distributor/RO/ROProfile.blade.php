<p>
  @if(Session::has('message'))
  <p class="alert alert-success">Retailer Details Save Successfully.</p>
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
  <div id="horizontalTab" class="resp-htabs">
          <ul class="resp-tabs-list">
            <li>{{ __('Personal Details') }}</li>
            <li>{{ __('Address Details') }}</li>
            <li>{{ __('Company Details') }}</li>
            <!-- <li>Responsive Tab-3</li> -->
          </ul>
          <div class="resp-tabs-container">
            <div>
              <p>
               
                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2 col-xs-4">
                      <label for="fullName" style="font-weight: bold;">{{ __('First Name') }}</label>
                      </div>
                       <div class="col-1 col-xs-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4 col-xs-7">
                        {{$RODetails['first_name']}}
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Last Name') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['last_name']}}
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Email Address') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['email']}}
                      </div>
                      </div>
                  </div>

                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Mobile') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['mobile']}}
                      </div>
                      </div>
                  </div>
                  
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Date Of Birth') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['UserDetail']['date_of_birth']}}
                      </div>
                      </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Account Status') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                         <?php if($RODetails['status']==0){ ?>
                          <font color="red"><b>In Active</b></font>
                        <?php } ?>
                        <?php if($RODetails['status']==1){ ?>
                          <font color="green"><b>Active</b></font>
                        <?php } ?>
                      </div>
                      </div>
                  </div>


                  


                
              </p>
            </div>
            <div>
                 <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Address-1') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['UserDetail']['address_line_1']}}
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Address-2') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['UserDetail']['address_line_2']}}
                      </div>
                      </div>
                  </div>


                   <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Country / State / City') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-6">
                        {{GeneralHelper::getCountryName($RODetails['UserDetail']['country_id'])}} / {{GeneralHelper::getStateName($RODetails['UserDetail']['state_id'])}} /
                        {{GeneralHelper::getCityName($RODetails['UserDetail']['city_id'])}}
                      </div>
                      </div>
                  </div>
                
                  <div class="form-group ">
                     <div class="row">
                      <div class="col-md-2">
                      <label for="fullName" style="font-weight: bold;">{{ __('Pincode') }}</label>
                      </div>
                       <div class="col-1">
                        <p style="font-weight: bold;">{{__(':')}}</p>
                      </div>
                      <div class="col-md-4">
                        {{$RODetails['UserDetail']['pincode']}}
                      </div>
                      </div>
                  </div>
            </div>
            <div>
              @include('user.Distributor.RO.ROCompanyProfile')
            </div>
          </div>
        </div>


