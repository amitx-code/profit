<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $user = Auth::User();  
    $myInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $refs = App\ref::where('username', $user->username)->orderby('id', 'desc')->get();
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
                        <!-- <div class="col-lg-1"></div> -->
                        <div class="col-lg-11">
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>My Investments</h1>
                                        <!-- <div class="sparkline9-outline-icon">
                                            <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment web-table">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div id="toolbar1">
                                            <!-- <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select> -->
                                            
                                        </div>
                                        <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                            <thead class="web-table">
                                                <tr>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th >Package</th>
                                                    <th >Capital</th>
                                                    <th >Return</th>
                                                    <th >Date Invested</th> 
                                                    <th >Elapse</th>  
                                                    <th >Days Spent</th> 
                                                    <th >Withdrawn</th>  
                                                    <th >Status</th>
                                                    <th >Earning</th>  
                                                    <th >Action</th> 
                                                </tr>
                                            </thead>
                                            <tbody class="web-table">
                                                
                                                <?php if(count($actInv) > 0 ): ?>
                                                    <?php $__currentLoopData = $actInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            if($in->package_id >= 5 && $in->package_id <= 10)
                                                            {
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
                                                            }
                                                            elseif($in->package_id >= 1 && $in->package_id <= 4)
                                                            {
                                                                $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                                                                if($totalElapse == 0)
                                                                {
                                                                    $lastWD = $in->last_wd;
                                                                    $enddate = ($in->end_date);
                                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                                    $ern  = $Edays*$in->interest*$in->capital;
                                                                    $withdrawable = $ern;
                                                                    $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                                    $ended = "yes";
                                                                }
                                                                else
                                                                {
                                                                    $lastWD = $in->last_wd;
                                                                    $enddate = (date('Y-m-d'));
                                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                                    $ern  = $Edays*$in->interest*$in->capital;
                                                                    $withdrawable = 0;
                                                                    if ($Edays >= $in->days_interval)
                                                                    {
                                                                        $withdrawable = $in->days_interval*$in->interest*$in->capital;
                                                                    }
                                                                                                   
                                                                    $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                                    $ended = "no";
                                                                }
                                                            }
                                                        
                                                        ?>
                                                        <tr class="">
                                                            <td><?php echo e($in->package); ?></td>
                                                            <td><?php echo e(($user->currency)); ?> <?php echo e($in->capital); ?></td>
                                                            <td><?php echo e(($user->currency)); ?> <?php echo e($in->i_return); ?></td>
                                                            <td><?php echo e($in->date_invested); ?></td>
                                                            <td><?php echo e($in->end_date); ?></td> 
                                                            <td><?php echo e($totalDays); ?></td>
                                                            <td><?php echo e(($user->currency)); ?> <?php echo e($in->w_amt); ?></td> 
                                                            <td><?php echo e($in->status); ?></td>
                                                            <td><?php echo e($user->currency); ?> <?php echo e($ern); ?></td>
                                                            <td>
                                                                <a title="Withdraw" href="javascript:void(0)" class="btn btn-info" onclick="wd('pack', '<?php echo e($in->id); ?>', '<?php echo e($ern); ?>', '<?php echo e($withdrawable); ?>', '<?php echo e($Edays); ?>', '<?php echo e($ended); ?>')">
                                                                    Withdraw
                                                                </a>
                                                            </td>           
                                                        </tr>
                                                        
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    
                                                <?php endif; ?>
                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>

                                <div class="mobile_table container messages-scrollbar" >
                                                
                                            <?php if(count($actInv) > 0 ): ?>
                                                <?php $__currentLoopData = $actInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php

                                                        $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                                                        if($totalElapse == 0)
                                                        {
                                                            $lastWD = $in->last_wd;
                                                            $enddate = ($in->end_date);
                                                            $Edays = getWorkingDays($lastWD, $enddate);
                                                            $ern  = $Edays*$in->interest*$in->capital;
                                                            $withdrawable = $ern;
                                                                                                 
                                                            $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                            $ended = "yes";

                                                        }
                                                        else
                                                        {
                                                            $lastWD = $in->last_wd;
                                                            $enddate = (date('Y-m-d'));
                                                            $Edays = getWorkingDays($lastWD, $enddate);
                                                            $ern  = $Edays*$in->interest*$in->capital;
                                                            $withdrawable = 0;
                                                            if ($Edays >= $in->days_interval)
                                                            {
                                                                $withdrawable = $in->days_interval*$in->interest*$in->capital;
                                                            }
                                                                                           
                                                            $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                            $ended = "no";
                                                        }

                                                    ?>
                                                    

                                                        
                                                            <div class="alert alert-info" style="margin-top: 10px; padding-top: 0px; font-size: 14px;">
                                                                <div class="row" style="background-color: #059; color: #FFF; 0px; border-top-left-radius: 3px; border-top-right-radius: 3px; pad">
                                                                    <div class="col-xs-12" align="center" style="padding-top: 5px;">
                                                                        <h4 style="text-transform: uppercase;">Package: <?php echo e($in->package); ?></h4>
                                                                       
                                                                    </div>
                                                                </div> 
                                                                <div class="row" style="color: #059;">
                                                                    <div class="col-xs-6">
                                                                        Capital:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e(($user->currency)); ?> <?php echo e($in->capital); ?>

                                                                    </div>
                                                                </div> 
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Return:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e(($user->currency)); ?> <?php echo e($in->i_return); ?>

                                                                    </div>
                                                                </div>  
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Started:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e($in->date_invested); ?>

                                                                    </div>
                                                                </div> 
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Ending:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e($in->end_date); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Days:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e($totalDays); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Withdrawn:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e(($user->currency)); ?> <?php echo e($in->w_amt); ?>

                                                                    </div>
                                                                </div> 
                                                                <div class="row" style="">
                                                                    <div class="col-xs-6">
                                                                        Status:
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        <?php echo e($in->status); ?>

                                                                    </div>
                                                                </div> 
                                                                <div class="row" style="" align="center">
                                                                    <br>
                                                                    <div class="col-xs-12" align="center">
                                                                        <a title="Withdraw" href="javascript:void(0)" class="btn btn-info" onclick="wd('pack', '<?php echo e($in->id); ?>', '<?php echo e($ern); ?>', '<?php echo e($withdrawable); ?>', '<?php echo e($Edays); ?>', '<?php echo e($ended); ?>')">
                                                                            <?php echo e($user->currency); ?> <?php echo e($ern); ?>

                                                                        </a>
                                                                    </div>
                                                                    Click to withdraw
                                                                </div>                                                                     
                                                            </div>
                                                                                                         
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                
                                            <?php endif; ?>
                                </div>

                            </div>
                            

                        </div>
                        
                    </div>
                    
                    <div class="row">                        
                        <div class="col-lg-11">
                            <div class="sparkline8-list shadow-reset mg-tb-30">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Investment Packages</h1>
                                        <!-- <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                
                                <?php echo $__env->make('user.inc.packages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user.inc.withdrawal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/my_investment.blade.php ENDPATH**/ ?>