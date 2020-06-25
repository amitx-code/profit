<title>Admin Login - Diamond Hub Plus</title>
<?php $__env->startSection('content'); ?>
<body style="">
    
    <div style="position:fixed; left: 0; top:0; width: 100%; height: 100%; background-color: #059;">
        
    </div>
    <!-- searchbar-->
    <!-- end searchbar -->
    <div class="container">
        <div class="row" style="padding-top: 40px; ">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="padding: 0px;">
                <div align="center">
                    <a href="http://daimondhubplus.com" style="color:#FFF;">
                        <img src="/img/logo.jpg" alt="DaimondHubPlus" style="border-radius:50%; height: 40px; width: 40px;"> 
                        <br>
                        <b>DIAMONDHUBPLUS</b>
                    </a>
                    <br><br>
                    <h3 style="color:#FFF;">Admin Login</h3>
                    <br>
                </div>
                <div style="color:; background-color: #FFF; border-radius:5px; padding: 15px;">
                    
                    <div class="panel ">
                        <div id="errMsg" class="card-header alert alert-danger" style="color: #930; display: none;" align="center">
                           
                        </div>

                        <?php if(Session::has('err2') ): ?>         
                            <script type="text/javascript">            
                                $('#errMsg').html("<?php echo e(Session::get('err2')); ?>");
                                $('#errMsg').show();
                            </script>
                            <?php echo e(Session::forget('err2')); ?>

                        <?php endif; ?>

                        <div class="panel-body" style="">
                        <form method="POST" action="/dhadmin/login">                        

                        <div class="form-group row">
                            <label for="email" class=" col-form-label text-md-right"><?php echo e(__('E-Mail')); ?></label>

                            <div class="input-group">
                                <input id="" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" class="form-control">
                                <span class="input-group-addon" style="background-color: #CCC;">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email">

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

                            <div class="input-group">
                                <span class="input-group-addon" style="background-color: #CCC;">
                                    <i class="fa fa-key"></i>
                                </span>
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password" placeholder="Password">

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
                        <div class="form-group row mb-0">
                            <div class="" align="center">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>                               
                            </div>                            
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <br><br><br><br><br><br><br>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/login.blade.php ENDPATH**/ ?>