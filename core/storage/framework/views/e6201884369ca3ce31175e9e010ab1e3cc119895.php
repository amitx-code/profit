<?php
    $adm = Session::get('adm');

    $inv = App\investment::orderby('id', 'desc')->get();
    
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();
    $deposits = App\deposits::orderby('id', 'desc')->get();

    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $cap = $cap2 = $dep = $dep2 = 0;

    if(Session::has('val'))
    {
        $v = Session::get('val');
        $adm_users = App\admin::where('id', $v)->orwhere('email', $v)->orwhere('name', $v)->orwhere('role', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'asc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $adm_users = App\admin::orderby('id', 'asc')->paginate(100);
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
                    <div class="row">                        
                        <div class="col-sm-4">
                        </div>

                        <div class="col-sm-4"> 

                            
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Change Password</h1>            
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <form action="/admin/change/pwd" method="post">
                                          <input id="token" type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
                                          
                                          <div class="input-group">
                                              <span class="input-group-addon span_bg" ><i class="fa fa-key"></i></span>
                                              <input type="Password" class="form-control" name="oldpwd" placeholder="Old Password" required>
                                          </div>
                                          <br>
                                          <div class="input-group">                
                                              <span class="input-group-addon span_bg"><i class="fa fa-key"></i></span>
                                              <input id="" type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                          </div>
                                          <br>
                                          <div class="input-group">                
                                              <span class="input-group-addon span_bg"><i class="fa fa-key"></i></span>
                                              <input id="" type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                          </div>
                                          <br>
                                          
                                          <div class="form-group">
                                            <br>
                                              <button class="collb btn btn-info">Update Password</button>
                                              <br>
                                          </div>
                                          
                                        </form>
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




<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/changepwd.blade.php ENDPATH**/ ?>