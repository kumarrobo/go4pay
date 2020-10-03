<?php 
function getCallbackUrl()
{
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response';
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<center>
    <div style="margin-top: 10%">
    <p><img style="width:2%; " src="{{env('LOADER_URL')}}" class="img-fluid" alt=""></p>
    <h4>Please Wait...</h4>
    <p>Do not refresh this page, your order is creating, you will auto redirect.<br/><small>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR']?></small></p>

    <div>
</center>
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
                <form action="{{env('APP_URL')}}/public/paywitheasebuzz/easebuzz.php?api_name=initiate_payment" method="POST" name="payuForm">
                @csrf
                  <input id="txnid"       name="txnid"       value="{{$paymentFormData['txnid']}}"       type="hidden">
                  <input id="amount"      name="amount"      value="{{$paymentFormData['amount']}}"      type="hidden">
                  <input id="firstname"   name="firstname"   value="{{$paymentFormData['firstname']}}"   type="hidden">
                  <input id="email"       name="email"       value="{{$paymentFormData['email']}}"       type="hidden">
                  <input id="phone"       name="phone"       value="{{$paymentFormData['phone']}}"       type="hidden">
                  <input id="productinfo" name="productinfo" value="{{$paymentFormData['productinfo']}}" type="hidden">
                  <input id="surl"        name="surl"        value="{{$paymentFormData['surl']}}"        type="hidden">
                  <input id="furl"        name="furl"        value="{{$paymentFormData['furl']}}"        type="hidden">
                  <input id="udf1"        name="udf1"        value="{{$paymentFormData['udf1']}}"        type="hidden">
                  <input id="udf2"        name="udf2"        value="{{$paymentFormData['udf2']}}"        type="hidden">
                  <input id="udf3"        name="udf3"        value="{{$paymentFormData['udf3']}}"        type="hidden">
                  <input id="udf4"        name="udf4"        value="{{$paymentFormData['udf4']}}"        type="hidden">
                  <input id="udf5"        name="udf5"        value="{{$paymentFormData['udf5']}}"        type="hidden">
                  <input id="address1"    name="address1"    value="{{$paymentFormData['address1']}}"    type="hidden">
                  <input id="address2"    name="address2"    value="{{$paymentFormData['address2']}}"    type="hidden">
                  <input id="city"        name="city"        value="{{$paymentFormData['city']}}"        type="hidden">
                  <input id="state"       name="state"       value="{{$paymentFormData['state']}}"       type="hidden">
                  <input id="country"     name="country"     value="{{$paymentFormData['country']}}"     type="hidden">
                  <input id="zipcode"     name="zipcode"     value="{{$paymentFormData['zipcode']}}"     type="hidden">
                  <input id="sub_merchant_id" name="sub_merchant_id" value="{{$paymentFormData['sub_merchant_id']}}" type="hidden">
                  <input id="sub_merchant_id" name="sub_merchant_id" value="{{$paymentFormData['sub_merchant_id']}}" type="hidden">
                  <input id="split_payments"  name="split_payments"  value="{{$paymentFormData['split_payments']}}" type="hidden">
                  <input id="show_payment_mode"  name="show_payment_mode"  value="{{$paymentFormData['show_payment_mode']}}" type="hidden">
                </form>
                </div>
              </div>
              </div>
            </div>

<script type="text/javascript">
submitPayuForm();
var hash = '';
function submitPayuForm() {
    var payuForm = document.forms.payuForm;
    payuForm.submit();
}
</script> 