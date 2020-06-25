<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $user = Auth::User();  
    $myInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\investment::where('user_id', $user->id)->where('state', 0)->orderby('id', 'desc')->get();
    $mybanks = App\banks::where('user_id', $user->id)->get();
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
            <!-- searchbar-->
             <!--<?php echo $__env->make('inc.searchbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
            <!-- end searchbar -->
            <!-- Mobile Menu start -->
            <!-- Mobile Menu end -->
            <!-- income order visit user Start -->
                 <?php echo $__env->make('user.inc.act_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- income order visit user End -->
              <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sparkline8-list shadow-reset mg-tb-30">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Profile</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline8-graph ">
                                    <div class="comment-phara">
                                        <div class="comment-adminpr" align="center">
                                            <a id="selectPic" href="javascript:void(0)"  >
                                                <?php if($user->img == ""): ?>
                                                    <img class="img-rounded" src="/img/profile/def.png" style="height: 200px; width: 200px; border-radius: 50%;">
                                                <?php else: ?>
                                                    <img class="img-rounded" src="/img/profile/<?php echo e($user->img); ?>" style="height: 200px; width: 200px; border-radius: 50%;" >
                                                <?php endif; ?>
                                            </a> 

                                            <form id="form_profilepic" action="/user/upload/profile_pic" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="file" name="prPic" id="prPic" style="display: none;">
                                            </form>
                                            <!-- <span class="fa fa-camera camshow" style=""></span> -->
                                        </div>
                                        <br>
                                        
                                    </div>
                                    <div class="admin-comment-month" align="left" style="font-size: 16px;">
                                        
                                        <div align="center"><b> <?php echo e(ucfirst($user->firstname).' '.ucfirst($user->lastname)); ?> </b></div>
                                        <hr>

                                        <?php
                                            $country = App\country::find($user->country);
                                            $state = App\states::find($user->state);
                                        ?>

                                        <div align="center">
                                            <b>Referral link:</b><br>
                                           <textarea style="font-size:13px; padding-top:10px; border-style:none" width="100%" id="reflnk" readonly>https://wallet.diamondhubplus.com/register/<?php echo e($user->username); ?></textarea>
                                            <button onclick="copy_txt()" class="collcc btn btn-info" style="margin-top:10px">Copy Referral Link</button>
                                        </div>
                                                                       
                                    </div>

                                </div>


                            </div>

                            <div class="sparkline8-list shadow-reset mg-tb-30" style="font-size: 16px;" style="padding-bottom: 0px;">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Change Password</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline8-graph " style="padding-bottom: 0px;" align="left">
                                    <div class="comment-phara">
                                        <div class="comment-adminpr" align="left">
                                            <form class="" method="post" action="/user/change/pwd">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control" name="oldpwd" placeholder="Your current password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                                </div>
                                                <div class="form-group" align="center">
                                                   <button class="collcc btn btn-info">Update Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>         
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1 id="userdet">User Details</h1>                                        
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <p style="color: red">Please note: Updating your country for the first time will permanently set currency for your profile.</p>
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
                                                        <input id="email" type="email" value="<?php echo e($user->email); ?>" class="form-control" name="email" readonly>
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

                                        <form class="" method="post" action="/user/update/profile">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <label>Country</label>
                                                        <select id="country" class="form-control" name="country" >
                                                            <?php 
                                                                $country = App\country::orderby('name', 'asc')->get();
                                                                $phn_code = "";
                                                            ?>
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
                                                        <button class="collcc btn btn-info">Update Profile</button>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Add Bank details</h1>
                                        <!-- <div class="sparkline9-outline-icon">
                                            <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">

                                        <form class="" method="post" action="/user/add/bank">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Bank name</label>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="text" class="form-control" name="bname" required placeholder="Bank name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Account number</label>
                                                        <input type="text" class="form-control" name="actNo"  required placeholder="Account number">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="act_name" required placeholder="Account Name">
                                                    </div>
                                                </div>                                             
                                                
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button class="collcc btn btn-info">Add Bank</button>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!--///////////////////////// ADD BTC Wallet //////////////////////////////////////-->
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Add Bitcoin Wallet</h1>
                                        <!-- <div class="sparkline9-outline-icon">
                                            <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="sparkline9-graph dashone-comment">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">

                                        <form class="" method="post" action="/user/add/btc_wallet">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Wallet Address</label>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="text" class="form-control" name="wallet_address" required placeholder="Bitcoin wallet address">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button class="collcc btn btn-info">Add Wallet</button>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
<!-- //////////////////////////////////////////////////////   End Add BTC Wallet /////////////////////////////////////////////////////////-->
                            
                            <div class="sparkline9-graph dashone-comment">
                                <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                    <div id="toolbar1">
                                       <!--  <select class="form-control">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select> -->
                                        <h4>My Banks/Bitcoin wallets</h4>
                                    </div>
                                    <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                                        <thead>
                                            <tr>
                                                <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                <!-- <th data-field="id"></th> -->
                                                <th data-field="status" data-editable="true">Bank Name</th>
                                                <th data-field="phone" data-editable="true">Acount Name</th>
                                                <th data-field="date" data-editable="true">Acount Number</th>
                                                <th data-field="company" >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($mybanks) > 0): ?>
                                                <?php $__currentLoopData = $mybanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($bank->Bank_Name); ?></td>
                                                        <td><?php echo e($bank->Account_name); ?></td>
                                                        <td><?php echo e($bank->Account_number); ?></td>
                                                        <td>
                                                            <a class="btn btn-danger" href="/user/remove/bankaccount/<?php echo e($bank->id); ?>" title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/profile.blade.php ENDPATH**/ ?>