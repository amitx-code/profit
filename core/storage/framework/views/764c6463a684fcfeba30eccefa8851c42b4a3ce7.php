<title>Verify Account - DiamondHubPlus</title>
<?php $__env->startSection('content'); ?>
<body style="height:100vh;">
    <div style="position: relative; background-color: transparent;">
        <img src="/img/adult.jpg" style="position: absolute; top:0; bottom:0; right:0; left:0; height: 100vh; width: 100%; opacity: .4">
         <!--<img src="/img/adult.jpg" style="position: absolute; left:0px; top: 0px; height: 1; width: 100%; opacity: .5"> -->
        <div style="position: absolute; top:0; bottom:0; right:0; left:0; height:100vh; width: 100%; background-color: rgba(20, 20, 20, .6);"></div>
        <div class="container" style="background-color: transparent;">
            <div class="row" style="padding-top: 90px; ">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding: 0px;">
                    
                    <div style="color:; background-color:#FFF; border-radius:5px; padding: 15px;">
                        
                        <div class="panel ">
                            <div class="card-header">
                                <div align="center">
                                     <img src="https://www.diamondhubplus.com/dhp.png" alt="DaimondHubPlus" style="border-radius:50%; height: 70px;">                 
                                    <br>
                                    <h3 class="colhd"><i class="fa fa-key"></i> User Verification</h3>
                                    <hr>
                                </div>
                            </div>

                            <div class="panel-body" style="">
                                <?php if(Session::has('msgType') && Session::get('msgType') == 'err'): ?>
                                
                                    <div class="alert alert-danger">
                                        <?php echo e(Session::get('status')); ?>

                                    </div>
                                    <?php echo e(Session::forget('status')); ?>

                                    <?php echo e(Session::forget('msgType')); ?>

                                    
                                <?php elseif(Session::has('msgType') && Session::get('msgType') == 'suc'): ?>
                                
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('status')); ?>

                                    </div>
                                    <?php echo e(Session::forget('status')); ?>

                                    <?php echo e(Session::forget('msgType')); ?>

                                <?php else: ?>
                                
                                    <div class="alert alert-danger">
                                       <p>
                                           Invalid access to this page.
                                       </p>
                                    </div>
                                     
                                <?php endif; ?>

                                <div class="form-group row mb-0">
                                    <div class="" align="center">
                                       <p>
                                           <strong><a href="/login" class="collcc btn btn-warning">Back to Login</a></strong>
                                       </p>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/auth/act_verify.blade.php ENDPATH**/ ?>