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
    <p><img style="width:2%; " src="<?php echo e(env('LOADER_URL')); ?>" class="img-fluid" alt=""></p>
    <h4>Please Wait...</h4>
    <p>Do not refresh this page, your order is creating, you will auto redirect.<br/><small>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR']?></small></p>

    <div>
</center>
            <div class="row">
            
               <div class="col-lg-3" style="border: solid 0px #eee;padding: 20px;"></div>
                <div class="col-lg-6" style="border: solid 0px #eee;padding:5px; font-size: 12px;">
                  <?php if(Session::has('error')): ?>
                  <p class="alert alert-danger" style="font-size: 12px;">
                  <?php $__currentLoopData = Session::get('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($err); ?></br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </p>
                  <?php endif; ?>
                <form action="<?php echo e(env('APP_URL')); ?>/public/paywitheasebuzz/easebuzz.php?api_name=initiate_payment" method="POST" name="payuForm">
                <?php echo csrf_field(); ?>
                  <input id="txnid"       name="txnid"       value="<?php echo e($paymentFormData['txnid']); ?>"       type="hidden">
                  <input id="amount"      name="amount"      value="<?php echo e($paymentFormData['amount']); ?>"      type="hidden">
                  <input id="firstname"   name="firstname"   value="<?php echo e($paymentFormData['firstname']); ?>"   type="hidden">
                  <input id="email"       name="email"       value="<?php echo e($paymentFormData['email']); ?>"       type="hidden">
                  <input id="phone"       name="phone"       value="<?php echo e($paymentFormData['phone']); ?>"       type="hidden">
                  <input id="productinfo" name="productinfo" value="<?php echo e($paymentFormData['productinfo']); ?>" type="hidden">
                  <input id="surl"        name="surl"        value="<?php echo e($paymentFormData['surl']); ?>"        type="hidden">
                  <input id="furl"        name="furl"        value="<?php echo e($paymentFormData['furl']); ?>"        type="hidden">
                  <input id="udf1"        name="udf1"        value="<?php echo e($paymentFormData['udf1']); ?>"        type="hidden">
                  <input id="udf2"        name="udf2"        value="<?php echo e($paymentFormData['udf2']); ?>"        type="hidden">
                  <input id="udf3"        name="udf3"        value="<?php echo e($paymentFormData['udf3']); ?>"        type="hidden">
                  <input id="udf4"        name="udf4"        value="<?php echo e($paymentFormData['udf4']); ?>"        type="hidden">
                  <input id="udf5"        name="udf5"        value="<?php echo e($paymentFormData['udf5']); ?>"        type="hidden">
                  <input id="address1"    name="address1"    value="<?php echo e($paymentFormData['address1']); ?>"    type="hidden">
                  <input id="address2"    name="address2"    value="<?php echo e($paymentFormData['address2']); ?>"    type="hidden">
                  <input id="city"        name="city"        value="<?php echo e($paymentFormData['city']); ?>"        type="hidden">
                  <input id="state"       name="state"       value="<?php echo e($paymentFormData['state']); ?>"       type="hidden">
                  <input id="country"     name="country"     value="<?php echo e($paymentFormData['country']); ?>"     type="hidden">
                  <input id="zipcode"     name="zipcode"     value="<?php echo e($paymentFormData['zipcode']); ?>"     type="hidden">
                  <input id="sub_merchant_id" name="sub_merchant_id" value="<?php echo e($paymentFormData['sub_merchant_id']); ?>" type="hidden">
                  <input id="sub_merchant_id" name="sub_merchant_id" value="<?php echo e($paymentFormData['sub_merchant_id']); ?>" type="hidden">
                  <input id="split_payments"  name="split_payments"  value="<?php echo e($paymentFormData['split_payments']); ?>" type="hidden">
                  <input id="show_payment_mode"  name="show_payment_mode"  value="<?php echo e($paymentFormData['show_payment_mode']); ?>" type="hidden">
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
</script> <?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/TatkalRecharge/paymentPreProcess.blade.php ENDPATH**/ ?>