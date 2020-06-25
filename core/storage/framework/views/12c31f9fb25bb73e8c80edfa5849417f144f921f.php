<div class="sparkline8-graph dashone-comment  dashtwo-messages">
    <div class="comment-phara">
        <div class="row comment-adminpr">
            <?php
                if($user->currency == 'N')
                {
                    $invs = App\packages::where('currency', 'N')->where('status', 1)->orderby('id', 'asc')->get();
                }
                elseif($user->currency == '$')
                {
                    $invs = App\packages::where('currency', '$')->where('status', 1)->orderby('id', 'asc')->get();
                }

            ?>
            <?php if(isset($invs) && count($invs) > 0): ?>
                <?php $__currentLoopData = $invs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-sm-4">
                        <div class="panel card pack-container" style="" align="center">
                            <div class="panel-head" style="padding:15px; background-color: #F16136; border-bottom: 1px solid #CCC;">
                                <h3 class="txt_transform"><?php echo e($inv->package_name); ?> Package</h3>
                            </div>
                            <div class="" align="center" >
                                <br>
                                    <h4 class="txt_transform" style="text-transform: uppercase;">
                                        <strong>Period of Investment</strong>
                                    </h4>
                                    <div style="font-size: 40px;">
                                        <b>
                                            <?php if($inv->id >= 1 && $inv->id <= 4): ?>
                                                <?php echo e($inv->period); ?>

                                            <?php elseif($inv->id >= 5 && $inv->id <= 10): ?>
                                                <?php echo e($inv->period/$inv->days_interval); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <span class="pk_num">
                                        <?php if($inv->id >= 1 && $inv->id <= 4): ?>
                                            <?php echo e('Days'); ?>

                                        <?php elseif($inv->id >= 5 && $inv->id <= 10): ?>
                                            <?php echo e('Months'); ?>

                                        <?php endif; ?>
                                    </span>
                            </div>
                            <span align="center">..............................</span>
                            <div class="" align="center" style="">
                                    <h4 class="txt_transform" style="text-transform: uppercase;">
                                        <strong>Min Investment</strong>
                                    </h4>
                                    <span class="pk_num"><?php echo e($user->currency); ?> <?php echo e($inv->min); ?></span>
                                    <h4 class="txt_transform" style="text-transform: uppercase;">
                                        <strong>Max Investment</strong>
                                    </h4>
                                    <span class="pk_num"><?php echo e($user->currency); ?> <?php echo e($inv->max); ?></span>
                            </div>                                                    
                            
                            <span align="center">..............................</span>
                            <div class="" align="center">
                                <h4 class="txt_transform">
                                    <?php if($inv->id >= 1 && $inv->id <= 4): ?>
                                        Daily Interest: <?php echo e($inv->daily_interest*100); ?>%
                                    <?php elseif($inv->id >= 5 && $inv->id <= 10): ?>
                                        Monthly Interest: <?php echo e(round($inv->daily_interest*100*30)); ?>%
                                    <?php endif; ?>
                                </h4>
                                <h4 class="txt_transform">Withdrawal Fee: <?php echo e($inv->withdrwal_fee*100); ?>%</h4>
                            </div>
                            <div class="" align="center">
                                <p>Capital accessible after investment elaspses.</p>
                            </div>
                            <div class="" align="center">
                                    <a id="<?php echo e($inv->id); ?>" href="javascript:void(0)" class="collcc btn btn-info" style="color:#FFF;" onclick="inv(this.id, '<?php echo e($inv->package_name); ?>', '<?php echo e($inv->period); ?>', '<?php echo e($inv->daily_interest); ?>', '<?php echo e($inv->min); ?>', '<?php echo e($inv->max); ?>', '<?php echo e($user->wallet); ?>')">
                                        Invest
                                    </a>
                                    <br><br>
                            </div>

                        </div>
                    </div>
                                                                      
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="alert alert-warning">
                    <a href="/<?php echo e($user->username); ?>/profile#userdet">Please, click here to update your profile before you can invest.</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/packages.blade.php ENDPATH**/ ?>