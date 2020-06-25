<title>Register - DiamondHubPlus</title>
<?php $__env->startSection('content'); ?>
<body style="background-color: transparent;">
    <div style="background-color: transparent;">
        <!-- <img src="/img/designs.jpg" style="position: absolute; left:0px; top: 0px; height: 100%; width: 100%; opacity: .7"> -->
        <img src="/img/adult.jpg" style="position: fixed; left:0px; top: 0px; height: 100%; width: 100%; opacity: .5">
        <div style="position: fixed; left: 0px; top: 0px; height: 100%; width: 100%; background-color: rgba(20, 20, 50, .8);"></div>
        
         <div class="container" style="background-color: transparent;">
            <div class="row" style="padding-top: 40px; background-color: transparent;">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="">
                    
                    <div style="background-color: #FFF; border-radius:5px; padding: 15px;">
                        
                        <div class="panel " style="background-color: transparent;">
                            <div class="card-header">
                                 
                                <div align="center">
                                    <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;">                 
                                    <br>
                                    <h3 class="colhd"><i class="fa fa-user" ></i> Withdrawal Request Form</h3>
                                    <hr>
                                </div>
                            </div>

                            <div class="panel-body" style="">
                                
                                    <?php if(Session::has('err_send')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(Session::get('err_send')); ?>

                                        </div>
                                        <?php echo e(Session::forget('err_send')); ?>

                                    <?php endif; ?>
                                
                                <form method="POST" action="/wd/req/submit">
                                    <?php echo csrf_field(); ?>
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-6">
                                            <label for="usn" class=" col-form-label text-md-right">Username</label>
                                            <input id="usn" type="text" class="form-control <?php if ($errors->has('usn')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('usn'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="usn" value="<?php echo e(old('usn')); ?>" required autocomplete="usn" autofocus placeholder="Your username">

                                            <?php if ($errors->has('usn')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('usn'); ?>
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                         <div class="col-sm-6">
                                            <label for="iv_id" class=" col-form-label text-md-right">Investiment ID</label>
                                            <input id="iv_id" type="text" class="form-control <?php if ($errors->has('iv_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('iv_id'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="iv_id" value="<?php echo e(old('iv_id')); ?>" required autocomplete="in_id" autofocus placeholder="Investment ID">

                                            <?php if ($errors->has('iv_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('iv_id'); ?>
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row"> 
                                        
                                        <div class="col-sm-12">
                                            <label for="act_name" class=" col-form-label text-md-right">Account Name</label>
                                            <input id="act_name" type="text" class="form-control <?php if ($errors->has('act_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('act_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="act_name" value="<?php echo e(old('act_name')); ?>" required autocomplete="act_name" placeholder="Account Name you withdrawn to">

                                            <?php if ($errors->has('act_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('act_name'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-6">
                                            <label for="act_no" class=" col-form-label text-md-right">Account No</label>
                                            <input id="act_no" type="text" class="form-control <?php if ($errors->has('act_no')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('act_no'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="act_no" value="<?php echo e(old('act_no')); ?>" required autocomplete="username" placeholder="Account number you withdrawn to">

                                            <?php if ($errors->has('act_no')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('act_no'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="bank" class=" col-form-label text-md-right">Bank Name</label>
                                            <input id="bank" type="text" class="form-control <?php if ($errors->has('bank')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bank'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="bank" required autocomplete="new-password" placeholder="Bank withdrawn to">

                                            <?php if ($errors->has('bank')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bank'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="amt" class=" col-form-label text-md-right">Amount Withdrawn</label>
                                            <input id="amt" type="text" class="form-control <?php if ($errors->has('amt')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amt'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="amt" required autocomplete="new-password" placeholder="Amount withdrawn">

                                            <?php if ($errors->has('amt')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amt'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="dat" class=" col-form-label text-md-right">Date Withdrawn</label>
                                            <input id="dat" type="date" class="form-control regTxtBox" name="dat" required autocomplete="dat" placeholder="Date of withdrawal" >
                                        </div>

                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="" align="center">
                                            <button type="submit" class="collc btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                            
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br><br>
        </div>
    </div>

       
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/wd_req_form.blade.php ENDPATH**/ ?>