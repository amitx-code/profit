<?php $__env->startSection('content'); ?>
<body>
    <div style="">
        <img src="/img/inv_bg2.jpg" class="fixedOverlayIMG">         
        <div class="fixedOeverlayBG"></div>
        <div class="">
            <div class="row login_row_cont">
                <div class="col-md-6 position_relative">
                    <div class="logo_cont" align="center">
                        <img src="/img/<?php echo e($settings->site_logo); ?>" alt="<?php echo e($settings->site_title); ?>" class="login_logo">
                        <h1><?php echo e($settings->site_title); ?></h1> 
                        <p>                                                       
                            <h4><?php echo e($settings->site_descr); ?></h4>
                        </p>
                    </div>                    
                </div>
                <div class="col-md-6 bg_white">
                    <div class="login_fixed_panel">
                        <div class="row">
                            <div class="col-md-12" >
                                <div style="">                        
                                    <div class="">
                                        <div class="">
                                            <div align="center">
                                                <img src="/img/<?php echo e($settings->site_logo); ?>" alt="<?php echo e($settings->site_title); ?>" class="login_logo">
                                                <br>
                                                <h3 class="colhd"><i class="fa fa-key"></i><?php echo e(__('auth.User_Login')); ?></h3>
                                                <ul class="navbar-nav ml-auto">
                                                    ...
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo e(route('locale', ['locale' => 'en'])); ?>">EN</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo e(route('locale', ['locale' => 'ru'])); ?>">RU</a>
                                                    </li>
                                                </ul>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="form_cont">
                                            <form method="POST" action="<?php echo e(route('login')); ?>" class="">                                                
                                                <input id="csrf" type="hidden"  name="_token" value="<?php echo e(csrf_token()); ?>" >
                                                <?php if(Session::has('err_msg')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(Session::get('err_msg')); ?>

                                                    </div>
                                                     <?php echo e(Session::forget('err_msg')); ?>

                                                <?php endif; ?>

                                                <?php if(Session::has('regMsg')): ?>
                                                    <div class="alert alert-success" >
                                                        <?php echo e(Session::get('regMsg')); ?>

                                                    </div>
                                                     <?php echo e(Session::forget('regMsg')); ?>

                                                <?php endif; ?>                                                
                                                
                                                <div class="form-group row" > 
                                                        <label for="email"><?php echo e(__('mess.E_Mail_Address')); ?></label>
                                                        <input id="email" type="email" class=" <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> regTxtBox" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="E-Mail Address">

                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert alert-danger" >
                                                                <?php echo e($message); ?>

                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                  
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password"><?php echo e(__('mess.Password')); ?></label>
                                                        <input id="password" type="password" class=" <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> regTxtBox" name="password" required autocomplete="current-password" placeholder="Password">

                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert alert-danger" >
                                                                <?php echo e($message); ?>

                                                            </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    
                                                </div>

                                                <div class="row">                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input class="" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                    &nbsp;
                                                    <label class="" for="remember">
                                                        <?php echo e(__('auth.Remember_Me')); ?>

                                                    </label>
                                                                                                            
                                                </div>

                                                <div class="">
                                                    <div class="" align="center">
                                                        <button type="submit" class="collc btn btn-primary">
                                                            <?php echo e(__('mess.Login')); ?>

                                                        </button>                               
                                                    </div>
                                                    <div class="" align="center" >                                
                                                        <?php if(Route::has('password.request')): ?>
                                                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                                                <?php echo e(__('auth.Forgot_Your_Password')); ?>?
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <div class="" align="center">
                                                       <p>
                                                           <strong><?php echo e(__("auth.Don_t_have_an_account")); ?>? <a href="/register"><?php echo e(__('Register')); ?></a></strong>
                                                       </p>
                                                    </div>                                                   
                                                    
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\soft.local\core\resources\views/auth/login.blade.php ENDPATH**/ ?>