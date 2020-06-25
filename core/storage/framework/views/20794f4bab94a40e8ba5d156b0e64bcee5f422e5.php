<?php
    $adm = Session::get('adm');

    $inv = App\investment::orderby('id', 'desc')->get();
    
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();
    $deposits = App\deposits::orderby('id', 'desc')->get();

    

    if(Session::has('val'))
    {
        $v = Session::get('val');
        $deps = App\deposits::where('user_id', $v)->orwhere('amount', $v)->orwhere('bank', $v)->orwhere('account_no', $v)->orwhere('account_name', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $deps = App\deposits::orderby('id', 'desc')->paginate(100);
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
                    <!--<div class="row">                        -->
                    <!--    <div class="col-sm-10"> -->
                    <!--        <?php echo $__env->make('admin.temp.todays_act', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                          -->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="row">                        
                        <div class="col-sm-12">                            
                            <?php echo $__env->make('admin.temp.userDeposits', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- //////////////////  load pop /////////////////////////////////////////////////// -->

<div id="dep_pop" class="container" style="min-width: 100%; background-color: rgba(0,0,0,.6); position: fixed; top: 0; left: 0; bottom: 0; width: 100%; z-index: 20; display: none;">
    <div class="row" style="padding: 5% 2%;">
        <div class="col-md-4">&emps;</div>

        <div class="col-md-4" style="margin: 3% 6% 3% 1%; border-radius: 7px; background-color: ; min-height: 200px;" align="Center">        
           <div style="padding-bottom:5px">                        
                <span>            
                  <a id="dep_pop_close" href="javascript:void(0)" class="btn btn-danger">Cancel</a>        
                </span>
                <br>
            </div>
            <div>
                <img id="img_pop" src="" style="height: 500px;">
            </div>
            <br>
        </div>  

        <!-- close btn -->
        <script type="text/javascript">
          $('#dep_pop_close').click( function(){
            $('#dep_pop').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/userDeposit.blade.php ENDPATH**/ ?>