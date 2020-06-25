<?php
    $adm = Session::get('adm');
    $adm = App\admin::find($adm->id);
    Session::put('adm', $adm);    
    $users = App\User::orderby('id', 'desc')->get();
    $user = App\User::find($id);
    // $wd = App\withdrawal::orderby('id', 'desc')->get();
    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();

    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('date_invested', date('Y-m-d'))->orderby('id', 'desc')->get();
    $cap = $cap2 = $dep = $dep2 = $wd_bal = $sum_cap = 0;  
    $logs =  App\adminLog::orderby('id', 'desc')->get();
?>


<?php $__env->startSection('content'); ?>
        <div class="main-panel">
            <div class="content">
                <?php echo $__env->make('admin.atlantis.main_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="page-inner mt--5">
                    <?php echo $__env->make('admin.atlantis.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #127aff;">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title" style="color: #fff;">User Activities</h4>
                                        <div class="card-tools">
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
                                <div class="card-body">                                    
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
                                            <div class="card full-height">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h2 class="text-success">Account Summary</h2>
                                                    </div>
                                                    <hr>
                                                    <div class="row py-3 <?php if($adm->role < 2): ?> <?php echo e(blur_cnt); ?><?php endif; ?>" style="position: relative;">
                                                        <div class="col-md-6 d-flex flex-column justify-content-around">
                                                            <div style="border-bottom: 1px solid #CCC;">
                                                                <h4 class="fw-bold  text-info op-8">Wallet Balance</h4>
                                                                $ <?php echo e($user->wallet); ?>

                                                                <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div>
                                                                <br>                        
                                                            </div>                      
                                                          <div class="clearfix"><br></div>                      
                                                            <div>                           
                                                                <h4 class="fw-bold text-info op-8">Referral Bonus</h4>
                                                                <h3 class="fw-bold">$ <?php echo e($user->ref_bal); ?></h3>
                                                                <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div>
                                                                <br>                                    
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div style="border-bottom: 1px solid #CCC;">
                                                                <h4 class="fw-bold text-info op-8">Date Created</h4>
                                                                <?php echo e($user->created_at); ?>

                                                                <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div> 
                                                                <br>    
                                                            </div>
                                                            <div class="clearfix"><br></div> 
                                                            <div>
                                                                <h4 class="fw-bold text-info op-8">Status</h4>       
                                                                <span class="fa fa-circle" style="color: green;"></span>
                                                                <span class="">
                                                                <?php if($user->status == 1 || $user->status == 'Active'): ?> 
                                                                    Active
                                                                <?php elseif($user->status == 2 || $user->status == 'Blocked'): ?> 
                                                                    Blocked
                                                                <?php elseif($user->status == 0 || $user->status == 'Inactive'): ?> 
                                                                    No Active
                                                                <?php endif; ?>
                                                                </span> 
                                                               
                                                                <div class="colhd" style="font-size: 10px; margin-top: -10px;">&emsp;</div> 
                                                                <br>    
                                                            </div>

                                                        </div>

                                                    </div>             
                                                </div>
                                            </div>                                            
                                            
                                        </div>                               
                                        
                                    </div>

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
                                                        <div class="input-group-prepend">
                                                            <span id="countryCode" class="input-group-text">
                                                                <?php if(isset($phn_code)): ?>
                                                                    <?php echo e('+'.$phn_code); ?>

                                                                <?php else: ?>
                                                                    +1
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>                                                        
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
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Reset User Password</div>
                                </div>
                                <div class="card-body pb-0">
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">User Investment</div>
                                </div>
                                <div class="card-body pb-0">
                                    <?php echo $__env->make('admin.temp.userInv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Withdrawal History</div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <?php echo $__env->make('admin.temp.user_wd_history', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Referrals</div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <?php echo $__env->make('admin.temp.userref', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Bank Accounts</div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <table  id="" class="display table table-stripped table-hover">
                                        <thead>
                                            <tr>
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
                                    <br><br>
                                </div>
                            </div>
                        </div>                        
                    </div>         
                    
                </div>
            </div>
<?php $__env->stopSection(); ?>
            
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superloc/mcode.me/maxprofit.mcode.me/core/resources/views/admin/userdetails.blade.php ENDPATH**/ ?>