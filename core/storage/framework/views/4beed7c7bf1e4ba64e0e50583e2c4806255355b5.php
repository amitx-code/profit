<?php
    $adm = Session::get('adm');
    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::where('status', 'Active')->orderby('id', 'desc')->get();
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();
    
    // $xpack_inv = App\xpack_inv::orderby('id', 'desc')->get();

    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $cap = $cap2 = $dep = $dep2 = 0;

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
    //     $sd = $inv->last_wd;
    //     $ed = date('Y-m-d');
    //     $workingDays = getWorkingDays($sd, $ed);
    //     $currentEarning += $workingDays*$inv->interest*$inv->capital;
    // }
   
    // function getWorkingDays($startDate, $endDate)
    // {        
    //     $begin = strtotime($startDate)+86400;
    //     $end   = strtotime($endDate);
    //     if ($begin > $end) 
    //     {
    //         // echo "startdate is in the future! <br />";
    //         return 0;
    //     } 
    //     else 
    //     {
    //         $no_days  = 0;
    //         $weekends = 0;
    //         while ($begin <= $end) 
    //         {
    //             $no_days++; // no of days in the given interval      
    //             $what_day = date("N", $begin);
    //             if ($what_day > 5) { // 6 and 7 are weekend days
    //                $weekends++;
    //                // echo $what_day;
    //             };               
    //             $begin += 86400;   // +1 day                 
    //         };
    //         $working_days = $no_days - $weekends;
    //         return $working_days;
    //     }
    // }
?>


<?php $__env->startSection('content'); ?>
<body class="materialdesign">
       <div class="wrapper-pro">
        <?php echo $__env->make('admin.temp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <!-- header -->
            <?php echo $__env->make('admin.temp.headbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Header top area end-->

            <!-- searchbar-->
             <?php echo $__env->make('admin.temp.searchbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end searchbar -->

            <!-- income order visit user Start -->
            <?php echo $__env->make('admin.inc.act_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- income order visit user End -->

            <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">                        
                        <div class="col-sm-12">                            
                          
                          
                            <?php
    
                                if(Session::has('val'))
                                {
                                    $v = Session::get('val');
                                    $actInv = App\xpack_inv::where('user_id', $v)->orwhere('usn', 'like', '%'.$v.'%')->orwhere('capital', $v)->orwhere('status', $v)->orwhere('date_invested', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
                                    Session::forget('val');
                                }
                                else
                                {
                                    $actInv = App\xpack_inv::orderby('id', 'desc')->paginate(100);
                                }
                            
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
                                //         $workingDays = getWorkingDays($lastWD, $enddate);
                                //         $currentEarning += $workingDays*$inv->interest*$inv->capital;
                                //     }
                                //     else
                                //     {
                                //         $sd = $inv->last_wd;
                                //         $ed = date('Y-m-d');
                                //         $workingDays = getWorkingDays($sd, $ed);
                                //         $currentEarning += $workingDays*$inv->interest*$inv->capital;
                                //     }
                                // }
                               
                            
                                function getWorkingDays($startDate, $endDate)
                                {        
                                    $begin = strtotime($startDate)+86400;
                                    $end   = strtotime($endDate);
                                    if ($begin > $end) 
                                    {
                                        // echo "startdate is in the future! <br />";
                                        return 0;
                                    } 
                                    else 
                                    {
                                        $no_days  = 0;
                                        $weekends = 0;
                                        while ($begin <= $end) 
                                        {
                                            $no_days++; // no of days in the given interval      
                                            $what_day = date("N", $begin);
                                            if ($what_day > 5) { // 6 and 7 are weekend days
                                               $weekends++;
                                               // echo $what_day;
                                            };               
                                            $begin += 86400;   // +1 day                 
                                        };
                                        $working_days = $no_days; // - $weekends;
                                        return $working_days;
                                    }
                                }
                                
                                
                               
                            ?>
                            
                            <div id="invdata" class="sparkline9-list shadow-reset mg-tb-30" style="display: none; background-color: #FFF; padding-bottom: 15px;">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>User Investments</h1>
                                        <!-- <div class="sparkline9-outline-icon">
                                            <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment web-table" style="">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div class="row">
                                            <div class="col-sm-6" align="">
                                               <label>Pages:</label><br>
                                               <?php echo e($actInv->links()); ?>  
                                            </div>
                                            <div class="col-sm-6" align="">
                                               <span>
                                                    <b>Search By:</b><br><br>
                                                    <form action="/admin/search/investment" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                            <input type="text" name="search_val" class="form-control" placeholder="Search by username, date, capital, or status">
                                                            <span class="input-group-addon" style="padding: 0px;">
                                                                <button class="fa fa-search" style="width: 100%; height: 32px; border:none; padding: 2px 15px;"></button>
                                                            </span>
                                                        </div>
                                                    </form>
                                               </span>  
                                            </div>
                                        </div>            
                                           
                                        <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="100" data-page-list="[5, 10, 15, 20, 25, 50, 100]" data-cookie-id-table="saveId" data-show-export="true">
                                            <thead class="web-table">
                                                <tr>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th >Username</th>
                                                    <th >Package</th>
                                                    <th >Capital</th>
                                                    <th >Return</th>
                                                    <th >Date Invested</th> 
                                                    <th >Elapse</th>  
                                                    <th >Days Spent</th> 
                                                    <th >Withdrawn</th>  
                                                    <th >Status</th>
                                                    <th >Earning</th>
                                                    <th>Manage</th>                                   
                                                </tr>
                                            </thead>
                                            <tbody class="web-table">
                                                
                            
                                                <?php if(count($actInv) > 0 ): ?>
                                                    <?php $__currentLoopData = $actInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                            
                                                            $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                                                            if($totalElapse == 0)
                                                            {
                                                                $lastWD = $in->last_wd;
                                                                $enddate = ($in->end_date);
                                                                $Edays = getWorkingDays($lastWD, $enddate);
                                                                $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                                                $withdrawable = $ern;
                                                                                                     
                                                                $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                                $ended = "yes";
                            
                                                            }
                                                            else
                                                            {
                                                                $lastWD = $in->last_wd;
                                                                $enddate = (date('Y-m-d'));
                                                                $Edays = getWorkingDays($lastWD, $enddate);
                                                                $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                                                $withdrawable = 0;
                                                                if ($Edays >= $in->days_interval)
                                                                {
                                                                    $withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
                                                                }
                                                                                               
                                                                $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                                $ended = "no";
                                                            }
                            
                                                        ?>
                                                        <tr class="">
                                                            <td><?php echo e($in->usn); ?></td>
                                                            <td><?php echo e($in->package); ?></td>
                                                            <td><?php echo e($in->currency); ?><?php echo e($in->capital); ?></td>
                                                            <td><?php echo e($in->currency); ?><?php echo e($in->i_return); ?></td>
                                                            <td><?php echo e($in->date_invested); ?></td>
                                                            <td><?php echo e($in->end_date); ?></td> 
                                                            <td>
                                                                <?php if($in->status != 'Expired'): ?>
                                                                    <?php echo e($totalDays); ?>

                                                                <?php else: ?>
                                                                    0
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($in->w_amt); ?></td> 
                                                            <td><?php echo e($in->status); ?></td>
                                                            <td>   
                                                                <?php if($in->currency == "" && $in->package != 'International'): ?>
                                                                    N <?php echo e($ern); ?>  
                                                                <?php elseif($in->currency == "" && $in->package = 'International'): ?>
                                                                    $ <?php echo e($ern); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($in->currency); ?> <?php echo e($ern); ?>

                                                                <?php endif; ?>                              
                                                            </td> 
                                                            <td>
                                                                <a title="Pause Investment" href="/admin/pause/x_inv/<?php echo e($in->id); ?>" > 
                                                                    <span class=""><i class="fa fa-pause btn btn-warning" ></i></span>
                                                                </a>                                    
                                                                <?php if($adm->role == 3): ?>
                                                                    <a title="Activate Investment" href="/admin/activate/x_inv/<?php echo e($in->id); ?>" > 
                                                                        <span><i class="fa fa-check btn btn-success"></i></span>
                                                                    </a>
                                                                    <a title="Delete Investment" href="/admin/delete/x_inv/<?php echo e($in->id); ?>" > 
                                                                        <span class=""><i class="fa fa-times btn btn-danger"></i></span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>          
                                                        </tr>                            
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                <?php else: ?>
                                                    
                                                <?php endif; ?>
                                            </tbody>
                                            
                                        </table>
                            
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6" align="">
                                           <span> <?php echo e($actInv->links()); ?></span>  
                                        </div>
                                        <!--<div class="col-sm-6" align="">-->
                                        <!--   <span>-->
                                        <!--        <br>-->
                                        <!--        <form action="/admin/search/investment" method="post">-->
                                        <!--            <div class="input-group">-->
                                        <!--                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">-->
                                        <!--                <input type="text" name="search_val" class="form-control" placeholder="Search by id, date, capital status">-->
                                        <!--                <span class="input-group-addon" style="padding: 0px;">-->
                                        <!--                    <button class="fa fa-search" style="width: 100%; height: 32px; border:none; padding: 2px 15px;"></button>-->
                                        <!--                </span>-->
                                        <!--            </div>-->
                                        <!--        </form>-->
                                        <!--   </span>  -->
                                        <!--</div>-->
                                    </div>
                                </div>
                            
                                <div class="mobile_table container messages-scrollbar"  style="width: 100%; ">
                                    <div class="row">
                                        <div class="col-sm-6" align="">
                                           <span> <?php echo e($actInv->links()); ?></span>  
                                        </div>
                                        <div class="col-sm-6" align="">
                                           <span>
                                                
                                                <form action="/admin/search/investment" method="post">
                                                    <div class="input-group">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="text" name="search_val" class="form-control" placeholder="Search by username, date, capital or status">
                                                        <span class="input-group-addon" style="padding: 0px;">
                                                            <button class="fa fa-search" style="width: 100%; height: 32px; border:none; padding: 2px 15px;"></button>
                                                        </span>
                                                    </div>
                                                </form>
                                           </span>  
                                        </div>
                                    </div>
                                    <?php if(count($actInv) > 0 ): ?>
                                        <?php $__currentLoopData = $actInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                            
                                                $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                                                if($totalElapse == 0)
                                                {
                                                    $lastWD = $in->last_wd;
                                                    $enddate = ($in->end_date);
                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                    $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                                    $withdrawable = $ern;
                                                                                         
                                                    $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                                                    $ended = "yes";
                            
                                                }
                                                else
                                                {
                                                    $lastWD = $in->last_wd;
                                                    $enddate = (date('Y-m-d'));
                                                    $Edays = getWorkingDays($lastWD, $enddate);
                                                    $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                                                    $withdrawable = 0;
                                                    if ($Edays >= $in->days_interval)
                                                    {
                                                        $withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
                                                    }
                                                                                   
                                                    $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                                                    $ended = "no";
                                                }
                            
                                            ?>
                                            
                            
                                                
                                                    <div class="alert alert-info" style="margin-top: 10px; padding-top: 0px; font-size: 14px;">
                                                        <div class="row" style="background-color: #059; color: #FFF; 0px; border-top-left-radius: 3px; border-top-right-radius: 3px;">
                                                            <div class="col-xs-12" align="center" style="padding-top: 5px;">
                                                                <h4 style="text-transform: uppercase;">Pakage: <?php echo e($in->package); ?></h4>
                                                               
                                                            </div>
                                                        </div> 
                                                        <div class="row" style="color: #059;">
                                                            <div class="col-xs-6">
                                                                <b>User:</b>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <b><?php echo e($in->user_id); ?></b>
                                                            </div>
                                                        </div> 
                                                        <div class="row" style="color: #059;">
                                                            <div class="col-xs-6">
                                                                Capital:
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <?php echo e($in->capital); ?>

                                                            </div>
                                                        </div> 
                                                        <div class="row" style="">
                                                            <div class="col-xs-6">
                                                                Return:
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <?php echo e($in->i_return); ?>

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
                                                                <?php echo e($in->w_amt); ?>

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
                                                            <a title="Pause Investment" href="/admin/pause/x_inv/<?php echo e($in->id); ?>" > 
                                                                <span class=""><i class="fa fa-pause btn btn-warning" ></i></span>
                                                            </a>                                    
                                                            <?php if($adm->role == 3): ?>
                                                                <a title="Activate Investment" href="/admin/activate/x_inv/<?php echo e($in->id); ?>" > 
                                                                    <span><i class="fa fa-check btn btn-success"></i></span>
                                                                </a>
                                                                <a title="Delete Investment" href="/admin/delete/x_inv/<?php echo e($in->id); ?>" > 
                                                                    <span class=""><i class="fa fa-times btn btn-danger"></i></span>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>                                                                     
                                                    </div>
                                                                                                 
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-sm-6" align="">
                                           <span> <?php echo e($actInv->links()); ?></span>  
                                        </div>
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
<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/xpack_inv.blade.php ENDPATH**/ ?>