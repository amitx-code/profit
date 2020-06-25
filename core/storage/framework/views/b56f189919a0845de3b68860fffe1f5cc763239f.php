<?php
    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('date_invested','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $cap = $cap2 = $dep = $dep2 = 0;
?>

<?php if($adm->role != 1): ?>
<div class="income-dashone-total shadow-reset nt-mg-b-30" style="">
    <div class="income-title">
        <div class="main-income-head">
            <h2>Today's Activities</h2>
           
            
        </div>        
    </div>

    <div class="income-dashone-pro">
        <div class="income-rate-total">
            <span class="" style="padding: 3px; background-color: #0a8; color: #FFF;">
                Investment
            </span>
            <br><br>
            <?php ($dep = 0); ?>
            <?php ($dep2 = 0); ?>
            <?php $__currentLoopData = $today_inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($in->currency == 'N'): ?>
                    <?php ($dep = $dep + intval($in->capital) ); ?>
                <?php endif; ?>
                <?php if($in->currency == '$'): ?>
                    <?php ($dep2 = $dep2 + intval($in->capital) ); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <div class="clear">Total users: <?php echo e(count($today_inv)); ?></div>

    </div>
    <div style="height: 2px; background-color: #CCf;"></div>

    <div class="income-dashone-pro">
        <div class="income-rate-total">
            <span class="" style="padding: 3px; background-color: #059; color: #FFF;">
                Deposits
            </span>
            <br><br>
            <?php ($dep = 0); ?>
            <?php ($dep2 = 0); ?>
            <?php $__currentLoopData = $today_dep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($in->currency == 'N'): ?>
                    <?php ($dep = $dep + intval($in->amount) ); ?>
                <?php endif; ?>
                <?php if($in->currency == '$'): ?>
                    <?php ($dep2 = $dep2 + intval($in->amount) ); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="price-adminpro-rate">
                <h3><span>N</span><span class="counter"> <?php echo e($dep); ?></span></h3>
            </div>
            <div class="price-graph">
                <span id="sparkline2"></span>
            </div>
        </div>
        <div class="income-range visitor-cl">
            <p >$ <?php echo e($dep2); ?></p>
            <span class="income-percentange"> <i class="fa fa-level-up" style="color: #059"></i></span>
        </div>
        <div class="clear">Total users: <?php echo e(count($today_dep)); ?></div>
    </div>

    <div style="height: 2px; background-color: #CCf;"></div>

    <div class="income-dashone-pro">
        <div class="income-rate-total">
            <span class="" style="padding: 3px; background-color: #950; color: #FFF;">
                Withdrawal
            </span>
            <br><br>
            <?php ($dep = 0); ?>
            <?php ($dep2 = 0); ?>
            <?php $__currentLoopData = $today_wd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($in->currency == 'N' || $in->package != 'International'): ?>
                    <?php ($dep = $dep + intval($in->amount) ); ?>
                <?php endif; ?>
                <?php if($in->currency == '$' || $in->package == 'International'): ?>
                    <?php ($dep2 = $dep2 + intval($in->amount) ); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="price-adminpro-rate">
                <h3><span>N</span><span class="counter"> <?php echo e($dep); ?></span></h3>
            </div>
            <div class="price-graph">
                <span id="sparkline2"></span>
            </div>
        </div>
        <div class="income-range low-value-cl">
            <p >$ <?php echo e($dep2); ?></p>
            <span class="income-percentange"> <i class="fa fa-level-down"></i></span>
        </div>
        <div class="clear">Total users: <?php echo e(count($today_wd)); ?></div>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/temp/todays_act.blade.php ENDPATH**/ ?>