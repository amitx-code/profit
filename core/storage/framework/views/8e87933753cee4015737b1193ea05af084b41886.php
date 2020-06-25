<?php if($adm->role != 1): ?>
    <div class="income-order-visit-user-area mob_d">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Total Users</b></h2>
                                <div class="main-income-phara">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span></span><span class="counter">&nbsp;<?php echo e(count($users)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Inactive: <?php echo e(count($users->where('status', '!=', '1'))); ?></p>
                                <span class="income-percentange"> </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Investments</b></h2>
                                <div class="main-income-phara order-cl">
                                    <?php
                                        $inv = App\investment::where('status', 'active')->orderby('id', 'desc')->get();
                                        $cap = 0;
                                        $cap2 = 0;
                                    ?>
                                    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                            <?php ($cap = $cap + intval($in->capital) ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                            <?php ($cap2 = $cap2 + intval($in->capital) ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e(count($inv->where('status', '!=', 'Active'))); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?php echo e(count($inv)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>
                            <div class="income-range order-cl">
                                <p> N<?php echo e($cap); ?>; $<?php echo e($cap2); ?></p>                            
                                <span class="income-percentange"><i class="fa fa-pie-chart"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Deposits</b></h2>
                                <div class="main-income-phara low-value-cl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <?php
                                        $deposits = App\deposits::where('status', 1)->orderby('id', 'desc')->get();
                                        $dep = 0;
                                        $dep2 = 0;
                                    ?>
                                    <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                            <?php ($dep += $in->amount ); ?>
                                        <?php endif; ?>
                                        <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                            <?php ($dep2 += $in->amount ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <h3><span>N</span><span class="counter"><?php echo e($dep); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline5"></span>
                                </div>
                            </div>
                            <div class="income-range low-value-cl">
                                <p>USD: <?php echo e($dep2); ?></p>
                                <span class="income-percentange"> <i class="fa fa-level-down"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Withdrawals</b></h2>
                                <?php
                                    $wd = App\withdrawal::orderby('id', 'desc')->get();
                                    $dep = 0;
                                    $dep2 = 0;
                                ?>
                                
                                <?php $__currentLoopData = $wd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                        <?php ($dep = $dep + $in->amount ); ?>
                                    <?php endif; ?>
                                    <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                        <?php ($dep2 = $dep2 + $in->amount ); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="main-income-phara visitor-cl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span>N</span><span class="counter"> <?php echo e($dep); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline2"></span>
                                </div>
                            </div>
                            <div class="income-range visitor-cl">
                                <p >$ <?php echo e($dep2); ?></p>
                                <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="income-order-visit-user-area mob_d">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Total Users</b></h2>
                                <div class="main-income-phara">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span></span><span class="counter">&nbsp;<?php echo e(count($users)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <i class="fa fa-money"></i>
                                </div>
                            </div>
                            <div class="income-range">
                                <p>Inactive: <?php echo e(count($users->where('status', '!=', '1'))); ?></p>
                                <span class="income-percentange"> </span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Investments</b></h2>
                                <div class="main-income-phara order-cl">
                                    <?php
                                        $inv = App\investment::where('status', 'active')->orderby('id', 'desc')->get();
                                        $cap = 0;
                                        $cap2 = 0;
                                    ?>
                                    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                            <?php ($cap = $cap + intval($in->capital) ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                            <?php ($cap2 = $cap2 + intval($in->capital) ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e(count($inv->where('status', '!=', 'Active'))); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?php echo e(count($inv)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>
                            <div class="income-range order-cl">
                                <p></p>                            
                                <span class="income-percentange"><i class="fa fa-pie-chart"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Deposits</b></h2>
                                <div class="main-income-phara low-value-cl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <?php
                                        $deposits = App\deposits::where('status', 1)->orderby('id', 'desc')->get();
                                        $dep = 0;
                                        $dep2 = 0;
                                    ?>
                                    <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                            <?php ($dep += $in->amount ); ?>
                                        <?php endif; ?>
                                        <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                            <?php ($dep2 += $in->amount ); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <h3><span></span><span class="counter"><?php echo e(count($deposits)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline5"></span>
                                </div>
                            </div>
                            <div class="income-range low-value-cl">
                                <p></p>
                                <span class="income-percentange"> <i class="fa fa-level-down"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Withdrawals</b></h2>
                                <?php
                                    $wd = App\withdrawal::orderby('id', 'desc')->get();
                                    $dep = 0;
                                    $dep2 = 0;
                                ?>
                                <?php $__currentLoopData = $wd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                                        <?php ($dep = $dep + $in->amount ); ?>
                                    <?php endif; ?>
                                    <?php if($in->currency == '$' || $in->package == 'International'): ?>
                                        <?php ($dep2 = $dep2 + $in->amount ); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="main-income-phara visitor-cl">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span></span><span class="counter"> <?php echo e(count($wd)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline2"></span>
                                </div>
                            </div>
                            <div class="income-range visitor-cl">
                                <p ></p>
                                <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/inc/act_summary.blade.php ENDPATH**/ ?>