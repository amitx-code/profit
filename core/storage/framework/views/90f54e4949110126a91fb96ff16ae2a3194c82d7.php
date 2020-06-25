<title>DiamondHubPlus - Password Reset</title>
<?php $__env->startSection('content'); ?>

<body>
    <div style="position: relative; background-color: transparent; height:100vh;">
        
        <img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; bottom: 0px; height: 100%; width: 100%; opacity: .9">
        <!-- <img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 1; width: 100%; opacity: .3"> -->
        <div style="position: absolute; left: 0px; top: 0px; bottom: 0px; height:100%; width: 100%; background-color: rgba(20, 20, 20, .6);"></div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color:#FFF; padding: 10px 20px; margin-top:100px; border-radius:5px;">
                    <div class="card">
                        <div class="card-header">
                            <div align="center">
                                <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;">                 
                                <br>
                                <?php echo e(__('Reset Password')); ?>

                                <hr>
                            </div>
                        
                        </div>

                        <div class="card-body">
                            
                                <?php if(Session::has('msgType') && Session::get('msgType') == 'err'): ?>
                                
                                    <div class="alert alert-danger">
                                        <?php echo e(Session::get('status')); ?>

                                    </div>
                                    <?php echo e(Session::forget('msgType')); ?>

                                    <?php echo e(Session::forget('status')); ?>

                                     
                                <?php endif; ?>
                           
                                <?php if(Session::has('pwd_rst_suc')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('status')); ?>

                                    </div>
                                    <?php echo e(Session::forget('msgType')); ?>

                                    <?php echo e(Session::forget('status')); ?>

                                    <?php echo e(Session::forget('pwd_rst_suc')); ?>

                                    
                                <?php elseif(Session::has('pwd_reset_err')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(Session::get('pwd_reset_err')); ?>

                                    </div>
                                    <?php echo e(Session::forget('pwd_reset_err')); ?>

                                    <br><br><br>
                                <?php else: ?>
                                    <form method="POST" action="/user/update/pwd">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <div class="form-group row">
                                            <div class="col-md-12">
                                            <label for="password" class=" col-form-label text-md-right"><?php echo e(__('New Password')); ?></label>
                                            <input id="password" type="password" class="regTxtBox <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="new-password">
    
                                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="password-confirm" class=" col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>
                                            <input id="password-confirm" type="password" class="regTxtBox" name="c_pwd" required autocomplete="new-password">
                                        </div>
                                    </div>
    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-12" align="center">
                                            <button type="submit" class="btn btn-primary collc">
                                                <?php echo e(__('Reset Password')); ?>

                                            </button>
                                        </div>
                                        <br><br>
                                    </div>
                                </form>
                                    
                                <?php endif; ?>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12" align="center">
                                        <a href="/login">
                                            <i class="fa fa-arrow-left"></i> Back to Login
                                        </a>
                                    </div>
                                    <br><br>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>