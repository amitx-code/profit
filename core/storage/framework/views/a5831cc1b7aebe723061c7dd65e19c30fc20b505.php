<?php
    $adm = Session::get('adm');
    $adm = App\admin::find($adm->id);
    Session::put('adm', $adm);

    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::where('status', 'Active')->orderby('id', 'desc')->get();
    $users = App\User::orderby('id', 'desc')->get();
    $user = App\User::find($id);
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
                                        <h1>User Details</h1>
                                        <div class="sparkline9-outline-icon">
                                            <a href="/admin/block/user/<?php echo e($user->id); ?>" > 
                                                <span class=""><i class="fa fa-ban btn btn-warning" ></i></span>
                                            </a>
                                            <a href="/admin/activate/user/<?php echo e($user->id); ?>" > 
                                                <span><i class="fa fa-check btn btn-success"></i></span>
                                            </a>
                                            <?php if($adm->role != 1): ?>
                                                <a href="/admin/delete/user/<?php echo e($user->id); ?>" > 
                                                    <span class=""><i class="fa fa-times btn btn-danger"></i></span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <div class="row" style=" padding-top: 20px;">
                                            <div class="col-lg-6">
                                                <div class="form-group" align="center">
                                                    <?php if($user->img == ""): ?>
                                                        <img class="img-rounded" src="/img/profile/def.png" style="height: 200px; width: 200px; border-radius: 50%;">
                                                    <?php else: ?>
                                                        <img class="img-rounded" src="/img/profile/<?php echo e($user->img); ?>" style="height: 200px; width: 200px; border-radius: 50%;" >
                                                    <?php endif; ?>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="col-sm-6 ">                                                    
                                                    <div class="income-rate-total profile-sum">
                                                        <div class="profile-sum-cont" >
                                                            Wallet Balance
                                                        </div>
                                                        <br>
                                                        <div class="price-adminpro-rate">
                                                            <h3><span><?php echo e($user->currency); ?></span><span class="counter"> <?php echo e($user->wallet); ?></span></h3>
                                                        </div>
                                                        <div class="price-graph">
                                                            <span id="sparkline2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="income-range visitor-cl">                
                                                        <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-6 ">
                                                     <div class="income-rate-total profile-sum">
                                                        <div class="profile-sum-cont">
                                                            Referral Bonus
                                                        </div>
                                                        <br>
                                                        <div class="price-adminpro-rate">
                                                            <h3><span><?php echo e($user->currency); ?></span><span class="counter"> <?php echo e($user->ref_bal); ?></span></h3>
                                                        </div>
                                                        <div class="price-graph">
                                                            <span id="sparkline2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="income-range visitor-cl">                  
                                                        <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-sm-7 ">
                                                     <div class="profile-sum">
                                                        <div class="profile-sum-cont" >
                                                            Account Created
                                                        </div>
                                                        <br>
                                                        <div class="price-adminpro-rate">
                                                            <h5><span class="fa fa-calendar"></span><span class=""> <?php echo e($user->created_at); ?></span></h5>
                                                        </div>
                                                        <div class="price-graph">
                                                            <span id="sparkline2"></span>
                                                            
                                                        </div>
                                                        
                                                    </div>    
                                                    <div class="income-range visitor-cl">                  
                                                        <span class="income-percentange"> <i class="fa fa-level"></i></span>
                                                    </div>
                                                    <hr>                                               
                                                    
                                                </div>
                                                <div class="col-sm-5 ">
                                                     <div class="profile-sum profile-sum">
                                                        <div class="profile-sum-cont">
                                                            Status
                                                        </div>
                                                        <br>
                                                        <div class="price-adminpro-rate">
                                                            <h5>
                                                                <span class="fa fa-circle"></span>
                                                                <span class="">
                                                                <?php if($user->status == 1 || $user->status == 'Active'): ?> 
                                                                    Active
                                                                <?php elseif($user->status == 2 || $user->status == 'Blocked'): ?> 
                                                                    Blocked
                                                                <?php elseif($user->status == 0 || $user->status == 'Inactive'): ?> 
                                                                    No Active
                                                                <?php endif; ?>
                                                                </span>
                                                            </h5>
                                                        </div>
                                                        <div class="price-graph">
                                                            <span id="sparkline2"></span>
                                                        </div>
                                                    </div>  
                                                    <div class="income-range visitor-cl">                  
                                                        <span class="income-percentange"> <i class="fa fa-level"></i></span>
                                                    </div>
                                                    <hr>                                                 
                                                    
                                                </div>
                                            </div>                               
                                            
                                        </div>
                                        <hr><br>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input id="adr" type="text" value="<?php echo e(ucfirst($user->firstname)); ?>" class="form-control" name="fname" readonly>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input id="adr" type="text" value="<?php echo e(ucfirst($user->lastname)); ?>" class="form-control" name="lname" readonly>
                                                </div>
                                            </div>                               
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <div class="input-group">                                                       
                                                        <input id="email" type="email" value="<?php echo e($user->email); ?>" class="form-control" name="email">
                                                    </div>
                                                    
                                                </div>
                                            </div>     

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <div class="input-group">                                                       
                                                        <input id="usn" type="text" value="<?php echo e($user->username); ?>" class="form-control" name="usn" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>                                             
                                            
                                        </div>   

                                        <form class="" method="post" action="/admin/update/user/profile">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="hidden" name="uid" value="<?php echo e($user->id); ?>">
                                                        <label>Country</label>
                                                        <select id="country" class="form-control" name="country" >
                                                            <?php 
                                                                $country = App\country::orderby('name', 'asc')->get();
                                                            ?>
                                                            <?php ($phn_code = ''); ?>
                                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                           
                                                                <?php if($c->id == $user->country): ?>
                                                                    <?php ($cs = $c->id); ?>
                                                                    <?php ($phn_code = $c->phonecode); ?>
                                                                    <?php echo e('selected'); ?>

                                                                    <option selected  value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                                 
                                                                <?php else: ?>
                                                                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(!isset($cs)): ?>
                                                                    <option selected disabled>select Country</option>
                                                            <?php endif; ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <label>State/Province</label>
                                                        <select  id="states" class="form-control" name="state" required>
                                                            <?php if(isset($cs)): ?>
                                                                <?php 
                                                                    $st = App\states::where('id', $user->state)->get();
                                                                ?>
                                                                <?php if(count($st) > 0): ?>
                                                                    <option selected value="<?php echo e($st[0]->id); ?>"><?php echo e($st[0]->name); ?></option>
                                                                <?php else: ?>
                                                                    <option selected disabled>select state</option>
                                                                <?php endif; ?>
                                                                
                                                            <?php else: ?>
                                                               <option selected disabled>select state</option>
                                                            <?php endif; ?>                                                           
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input id="adr" type="text" class="form-control" value="<?php echo e($user->address); ?>" name="adr" required>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <div class="input-group">
                                                            <span id="countryCode" class="input-group-addon">
                                                                <?php if(isset($phn_code)): ?>
                                                                    <?php echo e('+'.$phn_code); ?>

                                                                <?php else: ?>
                                                                    +1
                                                                <?php endif; ?>
                                                            </span>
                                                            <input id="cCode" type="hidden" class="form-control" name="cCode" required>
                                                            <input id="phone" type="text" class="form-control" value="<?php echo e(str_replace('+'.$phn_code,'',$user->phone)); ?>" name="phone" required>
                                                        </div>
                                                        
                                                    </div>
                                                </div>                                             
                                                
                                            </div>   
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <!--<?php if($adm->role == 3 || $adm->role == 2): ?>-->
                                                        <!--   <button class="collb btn btn-info">Save</button>-->
                                                        <!--<?php endif; ?>-->
                                                           <button class="collb btn btn-info">Save</button>
                                                    </div>
                                                </div>              
                                            </div>
                                        </form>
                                    </div>
                                    <div class="sparkline8-list" style="font-size: 16px;" style="padding-bottom: 10px; padding-top:5px">
                                            <div class="main-sparkline8-hd">
                                                <h1>Reset User Password</h1>                                               
                                            </div>
                                        </div>
                                        <div class="sparkline8-graph " style="padding-bottom: 0px;  padding-left:3px" align="left">
                                            <div class="comment-phara">
                                                <div class="comment-adminpr" align="left">
                                                    <form class="" method="post" action="/admin/change/user/pwd">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="hidden" name="uid" value="<?php echo e($user->id); ?>">
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                                        </div>
                                                        <!--  <?php if($adm->role == 3): ?>-->
                                                        <!--    <div class="form-group" align="left">-->
                                                        <!--       <button class="collb btn btn-info">Save</button>-->
                                                        <!--    </div>-->
                                                        <!--<?php endif; ?>-->
                                                            <div class="form-group" align="left">
                                                               <button class="collb btn btn-info">Save</button>
                                                            </div>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->make('admin.temp.userInv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="row">
                                <div class="col-sm-7">
                                    <?php echo $__env->make('admin.temp.user_wd_history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="col-sm-5">
                                    <?php echo $__env->make('admin.temp.userref', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sparkline9-graph dashone-comment">
                                        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                            <div id="toolbar1">
                                               <!--  <select class="form-control">
                                                    <option value="">Export Basic</option>
                                                    <option value="all">Export All</option>
                                                    <option value="selected">Export Selected</option>
                                                </select> -->
                                                <h4>User Banks</h4>
                                            </div>
                                            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                                <thead>
                                                    <tr>
                                                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                        <!-- <th data-field="id"></th> -->
                                                        <th data-field="status" data-editable="true">Bank Name</th>
                                                        <th data-field="date" data-editable="true">Acount Number</th>
                                                        <th data-field="phone" data-editable="true">Acount Name</th>
                                                        <th data-field="company" >Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                         $mybanks = App\banks::where('user_id', $user->id)->get();
                                                    ?>
                                                    <?php if(count($mybanks) > 0): ?>
                                                        <?php $__currentLoopData = $mybanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($bank->Bank_Name); ?></td>
                                                                <td><?php echo e($bank->Account_name); ?></td>
                                                                <td><?php echo e($bank->Account_number); ?></td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                            <!-- ///////////////////////////// activity log ///////////////////////////////////// -->

                            <div class="row" style="padding-top:30px;padding-bottom:30px">
                                <div class="col-sm-12">
                                    <div class="sparkline9-graph dashone-comment">
                                        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                            <div id="toolbar1">
                                               <!--  <select class="form-control">
                                                    <option value="">Export Basic</option>
                                                    <option value="all">Export All</option>
                                                    <option value="selected">Export Selected</option>
                                                </select> -->
                                                <h4>User Activity Logs</h4>
                                            </div>
                                            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                                <thead>
                                                    <tr>
                                                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                        <!-- <th data-field="id"></th> -->
                                                        <th>User ID</th>
                                                        <th>Action</th>
                                                        <th>Date</th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                         $acts = App\activities::where('user_id', $user->id)->orderby('id', 'desc')->get();
                                                    ?>
                                                    <?php if(count($acts) > 0): ?>
                                                        <?php $__currentLoopData = $acts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($bank->user_id); ?></td>
                                                                <td><?php echo e($bank->action); ?></td>
                                                                <td><?php echo e($bank->created_at); ?></td>                               
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                
                                
                            </div>
                            <!-- ///////////////////////////// End activity log ////////////////////////////////////// -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.temp.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/userdetails.blade.php ENDPATH**/ ?>