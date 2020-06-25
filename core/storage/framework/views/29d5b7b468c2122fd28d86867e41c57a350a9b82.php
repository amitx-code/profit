<?php
    if(Session::has('toast_msg'))
    {
        $toast_msg = Session::get('toast_msg');
        $toast_msg = json_decode($toast_msg);        
    }
?>

<?php if(isset($toast_msg) && $toast_msg[0]->type == 'suc' ): ?>
    <div class=" alert alert-success " align="center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <i class="fas fa-check-circle text-success" style="font-size: 100px;"></i> 
        <br><br>
        <?php echo $toast_msg[0]->msg; ?>

    </div>    
<?php endif; ?>

<?php if(isset($toast_msg) && $toast_msg[0]->type == 'err'): ?>
    <div class="alert alert-danger " align="center">
        <button type="button" class="close " data-dismiss="alert" aria-hidden="true">X</button>  
        <i class="fas fa-times-circle text-danger" style="font-size: 100px;"></i>
        <br><br>
        <?php echo $toast_msg[0]->msg; ?>

    </div>   
<?php endif; ?>                                   

<?php if(Session::has('toast_msg')): ?>
    <?php Session::forget('toast_msg');?>
<?php else: ?>
    <div class="panel-body">

        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="<?php echo URL::route('addmoney.paypal'); ?>" >
            <?php echo e(csrf_field()); ?>


            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                <label for="amount" class="col-md-4 control-label"><?php echo e(__('Enter Amount')); ?></label>
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b><?php echo e($settings->currency); ?></b></span>
                        </div>
                        <input id="amount" type="number" class="form-control" name="amount" value="<?php echo e(old('amount')); ?>" required autofocus>                    
                    </div>
                    <?php if($errors->has('amount')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('amount')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>

            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Pay Now')); ?>

                    </button>
                </div>
            </div>

        </form>

    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/user/inc/paypal_form.blade.php ENDPATH**/ ?>