 <title>Password Recovery - DiamondHubPlus</title>
<?php $__env->startSection('content'); ?>
<body style="background-color: #fff;">
    <div style="position: relative; background-color: transparent;">
        <img src="/img/preset.jpg" style="position: fixed; left:0px; top: 0px; height: 100%; width: 100%; opacity: .5">
        <!-- <img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 1; width: 100%; opacity: .3"> -->
        <div style="position: fixed; left: 0px; top: 0px; height:100%; width: 100%; background-color: rgba(20, 20, 20, .6);"></div>
        <div class="container" style="background-color: transparent;">
            <div class="row justify-content-center" style="padding-top: 80px; background-color: transparent;">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div align="center">
                         <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;"> 
                            <br>
                            <h3 style="color:#FFF; font-weight:600"><i class="fa fa-key"></i> Password Recovery</h3>
                            <br><br>
                        </div>
                    <div style="color:; background-color: #FFF; border-radius:5px; padding: 15px;">               
                    
                        <div class="panel">                    
                            <?php if(Session::has('msgType') && Session::get('msgType') == 'err'): ?>
                                
                                <div class="alert alert-danger">
                                    <?php echo e(Session::get('status')); ?>

                                </div>
                                <?php echo e(Session::forget('msgType')); ?>

                                <?php echo e(Session::forget('status')); ?>


                            <?php elseif(Session::has('msgType') && Session::get('msgType') == 'suc'): ?>
                            
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('status')); ?>

                                </div>
                                <?php echo e(Session::forget('msgType')); ?>

                                <?php echo e(Session::forget('status')); ?>

                                
                            <?php else: ?>
                            <?php endif; ?>
                            <div class="panel-body">
                                <form method="POST" action="/user/request/change/pwd">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="email" class="col-form-label text-md-right" style="text-align:center"><?php echo e(__('E-Mail Address')); ?></label>
                                        <div class="">
                                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class=" " align="center">
                                            <button type="submit" class="collcc btn btn-primary">
                                                <?php echo e(__('Reset Password')); ?>

                                        </div>
                                        <br><br>
                                      <div align="center">
                                        <a href="/login">
                                            <i class="fa fa-arrow-left"></i> Back to Login
                                        </a>
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

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>