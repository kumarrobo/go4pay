<style type="text/css">
  .form-control{
    height: 40px !important;
  }
</style>
            <!-- Personal Information
          ============================================= -->
            <div class="row">
            
               <div class="col-lg-3" style="border: solid 0px #eee;padding: 20px;"></div>
                <div class="col-lg-6" style="border: solid 0px #eee;padding:5px; font-size: 12px;">
                  @if(Session::has('error'))
                  <p class="alert alert-danger" style="font-size: 12px;">
                  @foreach(Session::get('error') as $err)
                  {{ $err }}</br>
                  @endforeach
                  </p>
                  @endif
             
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
                          
                      </div>
                      </div>
                  </div>



           
                </div>
              </div>
              </div>


            </div>