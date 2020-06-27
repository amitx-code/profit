<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
        <div class="main-panel">
            <div class="content">
                <?php ($breadcome = 'My Profile'); ?>
                <?php echo $__env->make('user.atlantis.main_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="page-inner mt--5">
                    <?php echo $__env->make('user.atlantis.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-center"><?php echo e(__('mess.Avatar')); ?></div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="comment-phara">
                                            <div class="comment-adminpr" align="center">
                                                <a id="selectPic" href="javascript:void(0)"  >
                                                    <?php if($user->img == ""): ?>
                                                        <img class="avatar_img" src="/img/any.png">
                                                    <?php else: ?>
                                                        <img class="avatar_img" src="/img/profile/<?php echo e($user->img); ?>">
                                                    <?php endif; ?>
                                                </a> 

                                                <form id="form_profilepic" action="/user/upload/profile_pic" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="file" name="prPic" id="prPic" class="display_not">
                                                </form>
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

                                            <div align="center" style="">
                                                <b><?php echo e(__('mess.Referral_link')); ?>:</b><br>
                                                <div style="color: #c60; font-size: 13px; word-wrap: break-word;">
                                                    <?php echo e(env('APP_URL').__('/register/').$user->username); ?>

                                                </div>
                                                <br>                                               
                                            </div>
                                                                           
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title"><?php echo e(__('mess.Change_Password')); ?></div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="" method="post" action="/user/change/pwd">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <div class="form-group">
                                            <label><?php echo e(__('mess.Old_Password')); ?></label>
                                            <input type="password" class="form-control" name="oldpwd" placeholder="<?php echo e(__('mess.Old_Password')); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo e(__('mess.New_Password')); ?></label>
                                            <input type="password" class="form-control" name="newpwd" placeholder="<?php echo e(__('mess.New_Password')); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label><?php echo e(__('mess.Confirm_Password')); ?></label>
                                            <input type="password" class="form-control" name="cpwd" placeholder="<?php echo e(__('mess.Confirm_Password')); ?>" required>
                                        </div>
                                        <div class="form-group" align="">
                                           <button class="collcc btn btn-info"><?php echo e(__('mess.Update')); ?></button>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title"><?php echo e(__('mess.Profile_Settings')); ?></div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <p class="text-danger">
                                            <?php echo e(__('mess.Please_note')); ?>


                                        </p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.First_Name')); ?></label>
                                                    <input id="adr" type="text" value="<?php echo e(ucfirst($user->firstname)); ?>" class="form-control" name="fname" readonly>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Last_Name')); ?></label>
                                                    <input id="adr" type="text" value="<?php echo e(ucfirst($user->lastname)); ?>" class="form-control" name="lname" readonly>
                                                </div>
                                            </div>                               
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Email_Address')); ?></label>
                                                    <div class="input-group">                                                       
                                                        <input id="email" type="email" value="<?php echo e($user->email); ?>" class="form-control" name="email" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>     

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Username')); ?></label>
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
                                                        <label><?php echo e(__('mess.Country')); ?></label>
                                                        <select id="country" class="form-control" name="<?php echo e(__('mess.Country')); ?>" >
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
                                                                    <option selected disabled><?php echo e(__('mess.Select_Country')); ?></option>
                                                            <?php endif; ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <label><?php echo e(__('mess.State/Province')); ?></label>
                                                        <select  id="states" class="form-control" name="state" required>
                                                            <?php if(isset($cs)): ?>
                                                                 <?php 
                                                                    $st = App\states::where('id', $user->state)->get();
                                                                ?>
                                                                <?php if(count($st) > 0): ?>
                                                                    <option selected value="<?php echo e($st[0]->id); ?>"><?php echo e($st[0]->name); ?></option>
                                                                <?php else: ?>
                                                                    <option selected disabled><?php echo e(__('mess.Select_State')); ?></option>
                                                                <?php endif; ?>
                                                                
                                                            <?php else: ?>
                                                               <option selected disabled><?php echo e(__('mess.Select_State')); ?></option>
                                                            <?php endif; ?>                                                           
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label><?php echo e(__('mess.Address')); ?></label>
                                                        <input id="adr" type="text" class="form-control" value="<?php echo e($user->address); ?>" name="adr" required>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label><?php echo e(__('mess.Phone')); ?></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span id="countryCode" class="input-group-text">
                                                                    <?php if(isset($phn_code)): ?>
                                                                        <?php echo e('+'.$phn_code); ?>

                                                                    <?php else: ?>
                                                                        
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
                                                        <button class="collcc btn btn-info"><?php echo e(__('mess.Update_Profile')); ?></button>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                            <!-- ////////////////////////  Add bank ////////////////////// -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e(__('mess.Add_Bank_Details')); ?></div>
                                </div>
                                <div class="card-body">
                                    <form class="" method="post" action="/user/add/bank">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Bank_Name')); ?></label>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="text" class="form-control" name="bname" required placeholder="<?php echo e(__('mess.Bank_Name')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Account_Number')); ?></label>
                                                    <input type="text" class="form-control" name="actNo"  required placeholder="<?php echo e(__('mess.Account_Number')); ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__('mess.Account_Name')); ?></label>
                                                    <input type="text" class="form-control" name="act_name" required placeholder="<?php echo e(__('mess.Account_Name')); ?>">
                                                </div>
                                            </div>                                             
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="collcc btn btn-info"><?php echo e(__('mess.Add_Bank')); ?></button>
                                                </div>
                                            </div>                                                
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-header">
                                <div class="card-title"><?php echo e(__('mess.Add_BTC_Wallet')); ?></div>
                            </div>
                            <div class="card-body">
                                <form class="" method="post" action="/user/add/btc_wallet">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('mess.Coin Host')); ?></label>
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="text" class="form-control" name="coin_host" required placeholder="Exp. Blockchain, Paxful">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('mess.Wallet')); ?></label>
                                                <input type="text" class="form-control" name="coin_wallet"  required placeholder="<?php echo e(__('mess.Wallet_Address')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <button class="collcc btn btn-info"><?php echo e(__('mess.Add_Bank')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e(__('mess.My_Bank_Details')); ?></div>
                                </div>
                                <div class="card-body pb-0 table-responsive" >
                                   <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>                                                
                                                <th data-field="status" data-editable="true"><?php echo e(__('mess.Bank_Name')); ?></th>
                                                <th data-field="phone" data-editable="true"><?php echo e(__('mess.Acount_Name')); ?></th>
                                                <th data-field="date" data-editable="true"><?php echo e(__('mess.Acount_Number')); ?></th>
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
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e(__('mess.My_Wallet_Addresses')); ?></div>
                                </div>
                                <div class="card-body pb-0 table-responsive" >
                                   <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>                                                
                                                <th><?php echo e(__('mess.Coin')); ?></th>
                                                <th><?php echo e(__('mess.Coin_Host')); ?></th>
                                                <th><?php echo e(__('mess.Wallet_Address')); ?></th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($my_wallets) > 0): ?>
                                                <?php $__currentLoopData = $my_wallets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($bank->Account_name); ?></td>
                                                        <td><?php echo e($bank->Bank_Name); ?></td>
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
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>

             <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
            
<?php echo $__env->make('layouts.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\soft.local\core\resources\views/user/profile.blade.php ENDPATH**/ ?>