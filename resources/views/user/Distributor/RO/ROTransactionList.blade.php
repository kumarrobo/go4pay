
      <div class="col-lg-12">
        <div class="bg-light shadow-md rounded p-4"> 
          <!-- Orders History
          ============================================= -->
          <div class="row">
          <div class="col-md-6" style="padding-bottom: 0px">
            <h6 style="padding: 0px; margin:0px; ">All RO List</h6>
          </div>
          <div class="col-md-6 text-right" style="padding-bottom: 0px">
            <h6 style="padding: 0px; margin:0px;">
            <a class="nav-link" href="{{route('addretailer')}}"><i class="fa fa-plus"></i>&nbsp;Add New RO
            </a>
            </h6>
          </div>
          </div>

          <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">All RO</a> </li>

            <!-- <li class="nav-item"> <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Recharge &amp; Bill Payment</a> </li>
            <li class="nav-item"> <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Booking</a> </li> -->
          </ul>
          <div class="tab-content my-3" id="myTabContent">
            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
              <div class="table-responsive-md" style=" width:1240px; overflow: auto">
                <table class="table table-hover border" style="font-size: 12px;">
                  <thead class="thead-light">
                    <tr>
                      <th>SN</th>
                      <th>Date</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Txn No</th>
                      <th>Remarks</th>
                      <th>Balance</th>
                      <th>Created</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($RODetails)){ ?>
                    <?php $count=1;foreach ($RODetails as $key => $value) { //dd($value); ?>
                    <tr>
                      <td class="align-middle">{{$count}}</td>
                      <td class="align-middle" nowrap="nowrap">{{$value['transaction_date']}}</td>
                      <td class="align-middle">
                        <?php if($value['credit_amount']>0){ ?>
                        <font color="green" style="font-weight:500">{{GeneralHelper::getAmount($value['credit_amount'])}}</font>
                        <?php }else{ ?>
                          {{GeneralHelper::getAmount($value['credit_amount'])}}
                        <?php } ?>  
                      </td>
                      <td class="align-middle">
                      <?php if($value['debit_amount']>0){ ?>
                        <font color="red" style="font-weight:500">{{GeneralHelper::getAmount($value['debit_amount'])}}</font>
                        <?php }else{ ?>
                          {{GeneralHelper::getAmount($value['debit_amount'])}}
                        <?php } ?> 
                      </td>
                      <td class="align-middle" nowrap="nowrap">{{$value['transaction_number']}}</td>
                      <td class="align-middle">{{$value['remarks']}}</td>
                      <td class="align-middle"><i class="fas fa-rupee-sign"></i>&nbsp;{{number_format($value['updated_wallet_balance'],2)}}</td>
                      <td class="align-middle">{{GeneralHelper::getDateFormate($value['created_at'])}}</td>
                      <td class="align-middle text-center">
                        <?php if($value['status']=='Success'){ ?>
                          <i class="fas fa-check-circle text-4 text-success" data-toggle="tooltip" data-original-title="Active"></i>
                        <?php }else{ ?>
                           <i class="fas fa-times-circle text-4 text-danger" data-toggle="tooltip" data-original-title="InActive"></i>
                        <?php } ?>
                      </td>
                       <?php $enid = Crypt::encryptString($value['id']);?>
                       <td class="align-middle" style="font-size: 18px;">
                        <a href="{{route('editusercommission',['id'=>$enid])}}" title="Update Commission Value"><i class="fas fa-rupee-sign"></i></a>&nbsp;
                        <a href="{{route('viewrotransaction',['id'=>$enid])}}" title="View All Transaction"><i class="fas fa-chart-line"></i></a>
                       </td>
                    </tr>
                    <?php $count++;} ?>
                     
                    <?php } ?>

                  
                  </tbody>
                </table>
                <div class="pull-right">
                {{ $RODetails->links() }}
                </div>

              </div>
           
            </div>
           
          </div>
          <!-- Orders History end --> 
        </div>
  