<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content">
            <?php echo $__env->make('user.atlantis.main_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-inner mt--5">
                
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title text-center" align="center"><?php echo e(__('Coinpayment')); ?></div>                                       
                                </div>
                            </div>
                            <div class="card-body table-responsive"> 
                                <h3 align="center">You are about to pay</h3>
                                <h4 class="text-center"><b><?php echo e($trans->amount2); ?> BTC</b></h4> 
                                <p class="text-center"> 
                                    <br>                                   
                                    <a href="<?php echo e($trans->status_url); ?>" target="_blank" class="btn btn-info">Proceed here</a>                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
            
<?php echo $__env->make('layouts.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/user/paybtc.blade.php ENDPATH**/ ?>