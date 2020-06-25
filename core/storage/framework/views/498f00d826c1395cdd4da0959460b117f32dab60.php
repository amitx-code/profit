<?php
    $adm = Session::get('adm');
    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::where('status', 'Active')->orderby('id', 'desc')->get();
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();

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
                        <div class="col-sm-12">                            
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>User List</h1>
                                        <?php
                                            if(Session::has('val'))
                                            {
                                                $v = Session::get('val');
                                                $users = App\User::where('id', $v)->orwhere('firstname', 'like', '%'.$v.'%')->orwhere('lastname', 'like', '%'.$v.'%')->orwhere('email', 'like', '%'.$v.'%')->orwhere('phone', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('username', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
                                                Session::forget('val');
                                            }
                                            else
                                            {
                                                $users = App\User::orderby('id', 'desc')->paginate(100);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div class="row">
                                            <div class="col-sm-6" align="">
                                               <span> <?php echo e($users->links()); ?></span>  
                                            </div>
                                            <div class="col-sm-6" align="">
                                               <span>
                                                    <br>
                                                    <form action="/admin/search/user" method="post">
                                                        <div class="input-group">
                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                            <input type="text" name="search_val" class="form-control" placeholder="Search by id, date, capital status">
                                                            <span class="input-group-addon" style="padding: 0px;">
                                                                <button class="fa fa-search" style="width: 100%; height: 32px; border:none; padding: 2px 15px;"></button>
                                                            </span>
                                                        </div>
                                                    </form>
                                               </span>  
                                            </div>
                                        </div>
                                        <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="100" data-page-list="[5, 10, 15, 20, 25, 50, 100]" data-cookie-id-table="saveId" data-show-export="true">
                                            <thead>
                                                <tr>
                                                    <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                    <th data-field="id">ID</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Manage</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php if(count($users) > 0 ): ?>
                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <!-- <td></td> -->
                                                            <td><?php echo e($user->id); ?></td>
                                                            <td><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></td>
                                                            <td><?php echo e($user->username); ?></td>
                                                            <td><?php echo e($user->email); ?></td>  
                                                            <td><?php echo e($user->phone); ?></td>
                                                            <td>
                                                                <?php if($user->status == 1 || $user->status == 'Active'): ?>
                                                                    <?php echo e('Active'); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info" href="/admin/view/userdetails/<?php echo e($user->id); ?>" title="View user details">
                                                                    <i class="fa fa-eye"></i>View
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/manageUsers.blade.php ENDPATH**/ ?>