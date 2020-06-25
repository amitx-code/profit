<title>Register - DiamondHubPlus</title>
<?php $__env->startSection('content'); ?>
<body style="background-color: #059;">
    <div style="position: relative; background-color: transparent;">
        <!-- <img src="/img/designs.jpg" style="position: absolute; left:0px; top: 0px; height: 100%; width: 100%; opacity: .7"> -->
        <img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 100%; width: 100%; opacity: .5">
        <div style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; background-color: rgba(20, 20, 20, .8);"></div>
        
         <div class="container">
            <div class="row" style="padding-top: 40px; ">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="">
                    
                    <div style="color:; background-color: #FFF; border-radius:5px; padding: 15px;">
                        
                        <div class="panel " style="background-color: transparent;">
                            <div class="card-header">
                                 
                                <div align="center">
                                    <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;">                 
                                    <br>
                                    <h3 class="colhd"><i class="fa fa-user" ></i> Join Us</h3>
                                    <hr>
                                </div>
                            </div>

                            <div class="panel-body" style="">
                                <form method="POST" action="<?php echo e(route('register')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        
                                        <div class="col-sm-6">
                                            <label for="Fname" class=" col-form-label text-md-right"><?php echo e(__('First Name')); ?></label>
                                            <input id="Fname" type="text" class="form-control <?php if ($errors->has('Fname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('Fname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="Fname" value="<?php echo e(old('Fname')); ?>" required autocomplete="Fname" autofocus placeholder="First name">

                                            <?php if ($errors->has('Fname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('Fname'); ?>
                                                <span class="invalid-feedback" role="alert" style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                         <div class="col-sm-6">
                                            <label for="Lname" class=" col-form-label text-md-right"><?php echo e(__('Last Name')); ?></label>
                                            <input id="Lname" type="text" class="form-control <?php if ($errors->has('Lname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('Lname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="Lname" value="<?php echo e(old('Lname')); ?>" required autocomplete="Lname" autofocus placeholder="Last name">

                                            <?php if ($errors->has('Lname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('Lname'); ?>
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
                                            <label for="email" class=" col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>
                                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Email">

                                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <label for="username" class=" col-form-label text-md-right"><?php echo e(__('Username')); ?></label>
                                            <input id="username" type="username" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" placeholder="Username">

                                            <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
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
                                            <label for="password" class=" col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
                                            <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> regTxtBox" name="password" required autocomplete="new-password" placeholder="Password">

                                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="password-confirm" class=" col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>
                                            <input id="password-confirm" type="password" class="form-control regTxtBox" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" >
                                        </div>

                                    </div>


                                    <?php
                                        $usn = App\User::where('username', Session::get('ref'))->get();
                                    ?>

                                    <div class="form-group row" style="display:;">
                                        <div class="">
                                            <input id="ref" type="hidden" class="form-control" name="ref" value="<?php if(count($usn) > 0): ?><?php echo e(Session::get('ref')); ?><?php endif; ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="" align="center">
                                            <button type="submit" class="collc btn btn-primary">
                                                <?php echo e(__('Register')); ?>

                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="" align="center">
                                           <p>
                                              <strong>Already have an account? <a href="/login">Login</a></strong>
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

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/auth/register.blade.php ENDPATH**/ ?>