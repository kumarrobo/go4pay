<!-- Personal Information
============================================= -->
<div class="row">
<div class="col-lg-12" style="padding: 20px;">
  <section >
    <div class="row">
      <div class="col-md-12">
        <?php if(Session::has('message')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('message')); ?></p>
      </div>
      </div>
      <?php endif; ?> 
    </div> 
    </section>
  <?php $enid = Crypt::encryptString($user['id']);?>
      <form action="<?php echo e(route('editusercommission',['id'=>$enid])); ?>" method="POST">
      <?php echo csrf_field(); ?>
    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h5 class="box-title">Transaction Commission Information Of -<?php echo e($user['name']); ?></h5>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col-md-2">
                  <label for="exampleInputEmail1" style="font-weight: bold">Transaction Mode</label>
            </div>
             <div class="col-md-2">
                  <label for="exampleInputEmail1" style="font-weight: bold">Comission Type</label>
            </div>
            <div class="col-md-2">
                  <label for="exampleInputEmail1" style="font-weight: bold">Value</label>
            </div>
            <!-- /.col -->
             <div class="col-md-2">
                  <label for="exampleInputEmail1" style="font-weight: bold">Status</label>
            </div>
        </div>
          <?php foreach($transactionTypesList as $item){ ?>
          <div class="row">
            <div class="col-md-2">
               <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Enter Transaction Mode Type" name="transaction_type_code[]" value="<?php echo e($item['transaction_type']); ?>" readonly="readonly">
                  <input type="hidden" class="form-control"  placeholder="Enter Transaction Mode Type" name="ids[]" value="<?php echo e($item['id']); ?>">
                </div>
            </div>
             <div class="col-md-2">
                <div class="form-group">
                  <select name="commission_type[]" class="form-control" disabled="disabled">
                    <option value="Flat" <?php if($item['commission_type']=='Flat'){ ?> selected="selected" <?php } ?>>Flat</option>
                    <option value="Percentage" <?php if($item['commission_type']=='Percentage'){ ?> selected="selected" <?php } ?>>Percentage</option>
                  </select>
                </div>
            </div>
            <div class="col-md-2">
              <!-- /.form-group -->
              <div class="form-group">
                  <input type="text" class="form-control" id="value_<?php echo e($item['id']); ?>" placeholder="Enter Value" name="value[]" value="<?php echo e(GeneralHelper::getCommissionValue($agentCommission,$item['id'])); ?>">


                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-2">
                <div class="form-group">
                  <select name="commission_type_status[]" class="form-control alert-danger" disabled="disabled">
                    <option value="0" <?php if(GeneralHelper::getCommissionStatusValue($agentCommission,$item['id'])==0){ ?> selected="selected" <?php } ?>>InActive</option>
                    <option value="1" <?php if(GeneralHelper::getCommissionStatusValue($agentCommission,$item['id'])==1){ ?> selected="selected" <?php } ?>>Active</option>
                  </select>
                </div>
            </div>
        
         
        </div>
      <?php } ?>

      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->

   <div class="row">
    <div class="col-lg-6" style="padding: 20px;">   
       <button type="button" class="btn btn-danger pull-right Cancel" style="margin-right: 10px">Cancel</button>
       <button type="submit" class="btn btn-info pull-right">Save</button>
    </div>
</div>   
 </form>
</div>
</div><?php /**PATH /home/childftn/public_html/siddhiventures.com/resources/views/user/Distributor/RO/editROCommission.blade.php ENDPATH**/ ?>