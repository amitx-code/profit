<title>Wallet Login - DiamondHubPlus</title>
<?php $__env->startSection('content'); ?>
<body style="background-color: #059;">
    <div style="position: relative; background-color: transparent;">
        <img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 100%; width: 100%; opacity: .4">
         <!--<img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 1; width: 100%; opacity: .5"> -->
        <div style="position: absolute; left: 0px; top: 0px; height:100%; width: 100%; background-color: rgba(20, 20, 20, .6);"></div>
        <div class="container" style="">
            <div class="row" style="padding-top: 40px; ">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding: 0px;">
                    
                    <div style="color:; background-color:#FFF; border-radius:5px; padding: 15px;">
                        
                        <div class="panel ">
                            <div class="card-header">
                                <div align="center">
                                     <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;">                 
                                    <br>
                                    <h3 class="colhd"><i class="fa fa-key"></i> User Login</h3>
                                    <hr>
                                </div>
                            </div>

                            <div class="panel-body" style="">
                                <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            
                                <?php if(Session::has('err_msg')): ?>
                                    <div class="alert alert-danger">
                                        <?php echo e(Session::get('err_msg')); ?>

                                    </div>
                                     <?php echo e(Session::forget('err_msg')); ?>

                                <?php endif; ?>

                                <?php if(Session::has('regMsg')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('regMsg')); ?>

                                    </div>
                                     <?php echo e(Session::forget('regMsg')); ?>

                                <?php endif; ?>
                            
                            <div class="form-group row">
                                <label for="email" class=" col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                <div class="">
                                    <input id="email" type="email" class=" <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="E-Mail Address">

                                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class=" col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                <div class="">
                                    <input id="password" type="password" class=" <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="password" required autocomplete="current-password" placeholder="Password">

                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                        <span class="invalid-feedback" role="alert" style="color: red;">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                        <label class="form-check-label" for="remember">
                                            <?php echo e(__('Remember Me')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="" align="center">
                                    <button type="submit" class="collc btn btn-primary">
                                        <?php echo e(__('Login')); ?>

                                    </button>                               
                                </div>
                                <div class="" align="center" >                                
                                    <?php if(Route::has('password.request')): ?>
                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                            <?php echo e(__('Forgot Your Password?')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="" align="center">
                                   <p>
                                       <strong>Don't have an account? <a href="/register">Register</a></strong>
                                   </p>                            
                                </div>
                                
                                 <div class="" align="center">
                                   <p>
                                       <strong>To access your old Investments? <a href="https://diamondhubplus.com/login.php">Login Here</a></strong>
                                   </p>                            
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

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/auth/login.blade.php ENDPATH**/ ?>