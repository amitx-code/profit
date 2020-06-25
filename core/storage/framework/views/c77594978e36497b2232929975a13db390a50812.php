<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $user = Auth::User();  
    $myInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\investment::where('user_id', $user->id)->where('state', 0)->orderby('id', 'desc')->get();
    $mybanks = App\banks::where('user_id', $user->id)->get();
    
    $xpack_inv = App\xpack_inv::where('user_id', $user->id)->orderby('id', 'desc')->get();

    // $refs = App\ref::where('username', $user->username)->orderby('id', 'desc')->get();
    // $ref_amt = 0;
    // foreach($refs as $ref)
    // {
    //    $ref_amt += $ref->amount;
    // }
    // $ref_bal = $ref_amt - $user->ref_bal;
    // $totalEarning = 0;    
    // $currentEarning = 0;
    // $workingDays = 0;
    
    // foreach($actInv as $inv)
    // {
    //     $totalElapse = getWorkingDays(date('y-m-d'), $inv->end_date);
    //     if($totalElapse == 0)
    //     {
    //         $lastWD = $inv->last_wd;
    //         $enddate = ($inv->end_date);
    //         if($inv->package_id >= 5 && $inv->package_id <= 10)
    //         {
    //             $getDays = getDays($lastWD, $enddate);
    //             $currentEarning += $getDays*$inv->interest*$inv->capital;
    //         }
    //         else
    //         {
    //             $workingDays = getWorkingDays($lastWD, $enddate);
    //             $currentEarning += $workingDays*$inv->interest*$inv->capital;
    //         }
    //     }
    //     else
    //     {
    //         $sd = $inv->last_wd;
    //         $ed = date('Y-m-d');
    //         // $currentEarning += $workingDays*$inv->interest*$inv->capital;
    //         if($inv->package_id >= 5 && $inv->package_id <= 10)
    //         {
    //             $getDays = getDays($sd, $ed);
    //             $currentEarning += $getDays*$inv->interest*$inv->capital;
    //         }
    //         else
    //         {
    //             $workingDays = getWorkingDays($sd, $ed);
    //             $currentEarning += $workingDays*$inv->interest*$inv->capital;
    //         }
    //     }
    // }
   
?>

<?php $__env->startSection('content'); ?>
<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">
        <?php echo $__env->make('inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <!-- header -->
            <?php echo $__env->make('inc.headbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Header top area end-->
            
            <!-- income order visit user Start -->
                 <?php echo $__env->make('user.inc.act_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- income order visit user End -->
              <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sparkline8-list shadow-reset mg-tb-30" style="font-size: 16px;" style="padding-bottom: 0px;">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>XPack Investments</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline8-graph " style="padding-bottom: 0px;" align="left">
                                    <div class="comment-phara">
                                        <div class="comment-adminpr" align="left">
                                            <div class="sparkline9-graph dashone-comment">
                                                <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                                    <div class="row">
                                                        <?php if(count($xpack_inv) > 0 ): ?>
                                                            <?php $__currentLoopData = $xpack_inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
        
                                                                    $totalElapse = getDays(date('y-m-d'), $in->end_date);
                                                                    if($totalElapse == 0)
                                                                    {
                                                                        $lastWD = $in->last_wd;
                                                                        $enddate = ($in->end_date);
                                                                        $Edays = getDays($lastWD, $enddate);
                                                                        $ern  = $Edays*$in->interest*$in->capital;
                                                                        $withdrawable = $ern;
                                                                                                             
                                                                        $totalDays = getDays($in->date_invested, $in->end_date);
                                                                        $ended = "yes";
        
                                                                    }
                                                                    else
                                                                    {
                                                                        $lastWD = $in->last_wd;
                                                                        $enddate = (date('Y-m-d'));
                                                                        $Edays = getDays($lastWD, $enddate);
                                                                        $ern  = $Edays*$in->interest*$in->capital;
                                                                        $withdrawable = 0;
                                                                        if ($Edays >= $in->days_interval)
                                                                        {
                                                                            $withdrawable = $in->days_interval*$in->interest*$in->capital;
                                                                        }
                                                                                                       
                                                                        $totalDays = getDays($in->date_invested, date('Y-m-d'));
                                                                        $ended = "no";
                                                                    }
        
                                                                ?>
                                                                            
                                                                <div class="col-sm-4" style="padding-top: 0px;">
                                                                    <div class="alert alert-info  xpack_inv" style="font-size:14px; padding-top: 0px;">
                                                                        <div class="row" style="background-color: #059; color: #FFF; 0px; border-top-left-radius: 10px; border-top-right-radius: 0px;">
                                                                            <div class="col-xs-12" align="center" style="padding-top: 5px;">
                                                                                <h4 style="text-transform: uppercase;">Package</h4>
                                                                                <h5 style="text-transform: uppercase; margin-top:0px;"><?php echo e($in->package); ?></h5>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="row" style="margin-top: 10px;">
                                                                            <div class="col-xs-6">
                                                                                Capital:
                                                                            </div>
                                                                            <div class="col-xs-6" align="right">
                                                                                <?php echo e(($user->currency)); ?> <?php echo e($in->capital); ?>

                                                                            </div>
                                                                        </div> 
                                                                        <div class="row" style="">
                                                                            <div class="col-xs-6">
                                                                                Return/Month:
                                                                            </div>
                                                                            <div class="col-xs-6" align="right">
                                                                                 <?php echo e(($user->currency)); ?> <?php echo e(($in->i_return - $in->capital)/($in->period/$in->days_interval)); ?>

                                                                            </div>
                                                                        </div>  
                                                                        <div class="row" style="">
                                                                            <div class="col-xs-4">
                                                                                Started:
                                                                            </div>
                                                                            <div class="col-xs-8" align="right">
                                                                                <?php echo e($in->date_invested); ?>

                                                                            </div>
                                                                        </div> 
                                                                        <div class="row" style="">
                                                                            <div class="col-xs-4">
                                                                                Ending:
                                                                            </div>
                                                                            <div class="col-xs-8" align="right">
                                                                                <?php echo e($in->end_date); ?>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="">
                                                                            <div class="col-xs-6">
                                                                                Status:
                                                                            </div>
                                                                            <div class="col-xs-6" align="right">
                                                                                <?php echo e($in->status); ?>

                                                                            </div>
                                                                        </div> 
                                                                        <div class="row" style="" align="center">
                                                                            <br>
                                                                            <div class="col-xs-12" align="center">
                                                                                <a title="Withdraw" style="color:#FFF;" href="javascript:void(0)" class="btn btn-info" onclick="wd('xpack', '<?php echo e($in->id); ?>', '<?php echo e($ern); ?>', '<?php echo e($withdrawable); ?>', '<?php echo e($Edays); ?>', '<?php echo e($ended); ?>')">
                                                                                    <?php echo e($user->currency); ?> <?php echo e($ern); ?>

                                                                                </a>
                                                                            </div>
                                                                            Click to withdraw
                                                                        </div>                                                                     
                                                                    </div>
                                                                </div>   
                                                                    
                                                                    
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            No data
                                                            
                                                        <?php endif; ?>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>         
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <b>Terms and Conditions</b>                                      
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div class="row">
                                            <div class="col-lg-12" style="color:#e50;">
                                                <p>
                                                    <br>
                                                   The christmas special investment package has been closed<br><br>
                                                </p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                    </div>
                    </div>
                    
                    <!--<div class="row">-->
                    <!--    <div class="col-lg-6">-->
                    <!--        <div class="sparkline9-list shadow-reset">-->
                    <!--            <div class="sparkline9-hd">-->
                    <!--                <div class="main-sparkline9-hd">-->
                    <!--                    <b>1. Light Weight Package</b>                                       -->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="sparkline9-graph dashone-comment">-->
                    <!--                <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">-->
                    <!--                    <form action="/invest/xpack" method="post">-->
                    <!--                        <input type="hidden" class="form-control" name="_token" required value="<?php echo e(csrf_token()); ?>">-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <div class="form-group">-->
                    <!--                                    <input id="xpack_id" type="hidden" class="form-control" name="xpack_id" required value="1">-->
                    <!--                                </div>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <div id="xpack_det2" class="form-group" style="">-->
                    <!--                                    <p>-->
                                                            
                    <!--                                        Minimum investment: N50,000 <br>-->
                                                                
                    <!--                                        Maximum investment: N499,000 <br>-->
                                                            
                    <!--                                        Duration of Investment: 4 months <br>-->
                                                            
                    <!--                                        Monthly Profit = 15% <br>-->
                                                            
                    <!--                                        Gross Profit: 60%, 15% x 4 months excluding capital <br>-->
                                                            
                    <!--                                        Capital is returned after 4 months contracted period <br>-->
                                                            
                    <!--                                        Referral Bonus: 4% <br>-->
                                                            
                    <!--                                        0% withdrawal fee <br>-->
                                                            
                    <!--                                        Referral bonus will be paid within 48 hours upon comfirmation of payment-->
                    <!--                                    </p>-->
                    <!--                                </div>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                                            
                    <!--                        <div class="row">-->
                    <!--                            <div class="form-group col-lg-12">-->
                    <!--                                <label>Amount to invest</label>-->
                    <!--                                <input type="number" class="form-control" name="amt" required placeholder="Amount">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                                            
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <button class="collcc btn btn-info">Invest</button>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                                            
                    <!--                    </form>-->
                                        
                                        
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                            
                    <!--        <br><br>-->
                    <!--    </div>-->
                        
                    <!--    <div class="col-lg-6">-->
                    <!--        <div class="sparkline9-list shadow-reset">-->
                    <!--            <div class="sparkline9-hd">-->
                    <!--                <div class="main-sparkline9-hd">-->
                    <!--                    <b>2. Heavy Weight Package</b>                                       -->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="sparkline9-graph dashone-comment">-->
                    <!--                <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">-->
                    <!--                    <form action="/invest/xpack" method="post">-->
                    <!--                        <input type="hidden" class="form-control" name="_token" required value="<?php echo e(csrf_token()); ?>">-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <div class="form-group">-->
                    <!--                                    <input id="xpack_id" type="hidden" class="form-control" name="xpack_id" required value="2">-->
                    <!--                                </div>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <div id="xpack_det2" class="form-group" style="">-->
                    <!--                                    <p>-->
                                                            
                    <!--                                        Minimum investment: N500,000<br>-->
                                                            
                    <!--                                        Maximum investment: N5,000,000<br>-->
                                                            
                    <!--                                        Duration: 4 months<br>-->
                                                            
                    <!--                                        Monthly Profit = 20%<br>-->
                                                            
                    <!--                                        Gross Profit: 80%, 20% x 4 months excluding capital<br>-->
                                                            
                    <!--                                        Capital is returned after 4 months contracted period<br>-->
                                                            
                    <!--                                        Referral Bonus: 4% <br>-->
                                                            
                    <!--                                        Withdrawal fee: 0% <br>-->
                                                            
                    <!--                                        Referral bonus will be paid within 48 hours upon comfirmation of payment-->
                    <!--                                    </p>-->
                    <!--                                </div>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                                            
                    <!--                        <div class="row">-->
                    <!--                            <div class="form-group col-lg-12">-->
                    <!--                                <label>Amount to invest</label>-->
                    <!--                                <input type="number" class="form-control" name="amt" required placeholder="Amount">-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                                            
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-lg-12">-->
                    <!--                                <button class="collcc btn btn-info">Invest</button>-->
                    <!--                            </div> -->
                    <!--                        </div>-->
                                            
                    <!--                    </form>-->
                                        
                                        
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                            
                    <!--        <br><br>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
            
        </div>
    </div>
    <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.inc.withdrawal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/bonus_pack.blade.php ENDPATH**/ ?>