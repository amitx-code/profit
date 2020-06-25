<?php
    if(Session::has('val'))
    {
        $val = Session::get('val');
        $musers = App\User::where('created_at', 'like', '%'.$val.'%')->where('status', 1)->orderby('reg_date', 'desc')->get();
        $mInv = App\investment::where('date_invested', 'like', '%'.$val.'%')->where('status', 'active')->orderby('date_invested', 'desc')->get();
        $mDep = App\deposits::where('created_at', 'like', '%'.$val.'%')->where('status', 1)->orderby('created_at', 'desc')->get();
        $mWd = App\Withdrawal::where('w_date', 'like', '%'.$val.'%')->orderby('w_date', 'desc')->get();

        $mnt = ['Jan','Feb', 'Mar','Apr','May','Jun','Jul','Aug', 'Sep','Oct','Nov','Dec'];
        $datpart = explode('-', $val);
        $num = $mnt[intval($datpart[1])-1];

        // Session::forget('val');

    }
    else
    {
        $musers = App\User::where('created_at', 'like',  '%'.date('Y-m').'%')->where('status', 1)->orderby('created_at', 'desc')->get();
        $mInv = App\investment::where('date_invested', 'like', '%'.date('Y-m').'%')->where('status', 'active')->orderby('date_invested', 'desc')->get();
        $mDep = App\deposits::where('created_at', 'like', '%'.date('Y-m').'%')->where('status', 1)->orderby('created_at', 'desc')->get();
        $mWd = App\Withdrawal::where('w_date', 'like', '%'.date('Y-m').'%')->orderby('w_date', 'desc')->get();

        
    }
    
?>



<div class="row">
    <div class="col-sm-6 float-right" align="" style="">
        
        <form action="/admin/search/stat" method="post">
            <label>Search (yyyy-mm):</label>
            <div class="input-group">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">                
                <span class="input-group-addon span_bg" style="">
                    <i class="fa fa-calendar"></i>
                </span>
                <input type="text" name="search_val" class="form-control" required style="height: 45px;" placeholder="2019-09">
                <span class="input-group-addon" style="padding: 0px;">
                    <button class="fa fa-search" style="width: 100%; height: 43px; border:none; padding: 2px 15px;"></button>
                </span>
            </div>
        </form>
                                                    
    </div>
    <div class="col-sm-6 float-right" align="" style=" padding-top: 30px;">
        <h4 align="right">
            <b>
                Result for: 
            <?php if(Session::has('val')): ?>
                <?php echo e($num.'-'.$datpart[0]); ?>

            <?php else: ?>
                <?php echo e(date('M-Y')); ?>

            <?php endif; ?>
            <?php (Session::forget('val')); ?>
            </b>
        </h4>
    </div>
</div>
<hr>
<div class="row">
                                         
    <br>
    <div class="col-sm-4">
        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="">
            <div class="income-dashone-pro">
                <div class="income-rate-total">
                    <span class="" style="padding: 3px 5px; background-color: #1f2e86; color: #FFF; border-radius: 4px;">
                        Total Users
                    </span>
                    <br><br>
                    <center><i class="fa fa-users fa-3x text-center"></i></center>
                    <br>
                    <div class="price-adminpro-rate">
                        <h3 align="center"><span class="counter"> <?php echo e(count($musers)); ?></span></h3>
                    </div>
                    <div class="price-graph">
                        <span id="sparkline2"></span>
                    </div>
                </div>
                 <div class="income-range visitor-cl">
                    <p ></p>
                    <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                </div>
                <div class="clear">Total users: <?php echo e(count($musers)); ?></div>
                

            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="">
            <div class="income-dashone-pro">
                <div class="income-rate-total">
                    <?php ($dep = 0); ?>
                    <?php ($dep2 = 0); ?>
                    <?php $__currentLoopData = $mInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($in->currency == 'N' || $in->currency == '' ): ?>
                            <?php ($dep = $dep + intval($in->capital) ); ?>
                        <?php endif; ?>
                        <?php if($in->currency == '$'): ?>
                            <?php ($dep2 = $dep2 + intval($in->capital) ); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="" style="padding: 3px 5px; background-color: #095; color: #FFF; border-radius: 4px;">
                        Investment
                    </span>
                    <br><br>
                    <center><i class="fa fa-money fa-3x "></i></center>
                    <br>
                    <div class="price-adminpro-rate">
                        <h3 align="center">N<span class="counter"> <?php echo e($dep); ?></span></h3>
                    </div>
                    <div class="price-graph">
                        <span id="sparkline2"></span>
                    </div>
                </div>
                
                <div class="income-range visitor-cl">
                    <p >$ <?php echo e($dep2); ?></p>
                    <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                </div>
                <div class="clear">User count: <?php echo e(count($mInv)); ?></div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="">
            <div class="income-dashone-pro">
                <div class="income-rate-total">
                    <?php ($dep = 0); ?>
                    <?php ($dep2 = 0); ?>
                    <?php $__currentLoopData = $mDep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($in->currency == 'N' || $in->currency == ''): ?>
                            <?php ($dep = $dep + intval($in->amount) ); ?>
                        <?php endif; ?>
                        <?php if($in->currency == '$'): ?>
                            <?php ($dep2 = $dep2 + intval($in->amount) ); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="" style="padding: 3px 5px; background-color: #1f2e86; color: #FFF; border-radius: 4px;">
                        Deposits
                    </span>
                    <br><br>
                    <center><i class="fa fa-credit-card fa-3x "></i></center>
                    <br>
                    <div class="price-adminpro-rate">
                        <h3 align="center">N<span class="counter"> <?php echo e($dep); ?></span></h3>
                    </div>
                    <div class="price-graph">
                        <span id="sparkline2"></span>
                    </div>
                </div>
                
                <div class="income-range visitor-cl">
                    <p >$ <?php echo e($dep2); ?></p>
                    <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                </div>
                <div class="clear">User count: <?php echo e(count($mDep)); ?></div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="income-dashone-total shadow-reset nt-mg-b-30" style="">
            <div class="income-dashone-pro">
                <div class="income-rate-total">
                    <?php ($dep = 0); ?>
                    <?php ($dep2 = 0); ?>
                    <?php $__currentLoopData = $mWd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($in->currency == 'N' || $in->currency == ""): ?>
                            <?php ($dep = $dep + intval($in->amount) ); ?>
                        <?php endif; ?>
                        <?php if($in->currency == '$'): ?>
                            <?php ($dep2 = $dep2 + intval($in->amount) ); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="" style="padding: 3px 5px; background-color: #A07; color: #FFF; border-radius: 4px;">
                        Withdrawal
                    </span>
                    <br><br>
                    <center><i class="fa fa-download fa-3x "></i></center>
                    <br>
                    <div class="price-adminpro-rate">
                        <h3 align="center">N<span class="counter"> <?php echo e($dep); ?></span></h3>
                    </div>
                    <div class="price-graph">
                        <span id="sparkline2"></span>
                    </div>
                </div>
                
                <div class="income-range visitor-cl">
                    <p >$ <?php echo e($dep2); ?></p>
                    <span class="income-percentange"> <i class="fa fa-level-down"></i></span>
                </div>
                <div class="clear">Users count: <?php echo e(count($mDep)); ?></div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/monthly.blade.php ENDPATH**/ ?>