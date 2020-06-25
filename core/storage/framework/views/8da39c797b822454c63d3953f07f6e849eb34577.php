<?php
    $adm = Session::get('adm');
    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::where('status', 'Active')->orderby('id', 'desc')->get();
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();

    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('date_invested',date('Y-m-d'))->orderby('id', 'desc')->get();
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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
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
                        <div class="col-sm-8">                            
                                <div class="charts-single-pro shadow-reset nt-mg-b-30">
                                    <div class="alert-title">
                                        <h2>Total Investments</h2>
                                        <p>All investment so far this year</p>
                                    </div>
                                    <div id="">
                                        <canvas id="mycanvas"></canvas>
                                    </div>
                                    <div id="data">                                       
                                    </div>
                                </div>
                                <?php if($adm->role != 1): ?>
                                <div class="charts-single-pro shadow-reset nt-mg-b-30" style="color: #1f2e86;">
                                    <div class="alert-title">
                                        <h2>
                                            Stats. Breakdown
                                            
                                        </h2>                               
                                        <hr>
                                    </div>
                                    <?php echo $__env->make('admin.temp.monthly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-sm-4">
                            <?php echo $__env->make('admin.temp.todays_act', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>