<?php
    $totalEarning = 0;    
    $currentEarning = 0;
    $workingDays = 0;
    
    // foreach($actInv as $inv)
    // {
    //     $sd = $inv->last_wd;
    //     $ed = date('Y-m-d');
        
    //     if($inv->package_id >= 5 && $inv->package_id <= 10)
    //     {
    //         $getDays = getDays($sd, $ed);
    //         $currentEarning += $getDays*$inv->interest*$inv->capital;
    //     }
    //     else
    //     {
    //         $workingDays = getWorkingDays($sd, $ed);
    //         $currentEarning += $workingDays*$inv->interest*$inv->capital;
    //     }
    // }
    
    foreach($actInv as $inv)
    {
        $totalElapse = getDays(date('y-m-d'), $inv->end_date);
        if($totalElapse == 0)
        {
            $lastWD = $inv->last_wd;
            $enddate = ($inv->end_date);
            if($inv->package_id >= 5 && $inv->package_id <= 10)
            {
                $getDays = getDays($lastWD, $enddate);
                $currentEarning += $getDays*$inv->interest*$inv->capital;
            }
            else
            {
                $workingDays = getWorkingDays($lastWD, $enddate);
                $currentEarning += $workingDays*$inv->interest*$inv->capital;
            }
        }
        else
        {
            $sd = $inv->last_wd;
            $ed = date('Y-m-d');
            // $currentEarning += $workingDays*$inv->interest*$inv->capital;
            if($inv->package_id >= 5 && $inv->package_id <= 10)
            {
                $getDays = getDays($sd, $ed);
                $currentEarning += $getDays*$inv->interest*$inv->capital;
            }
            else
            {
                $workingDays = getWorkingDays($sd, $ed);
                $currentEarning += $workingDays*$inv->interest*$inv->capital;
            }
        }
    }
?>
<div class="" style="background-color: #08C; min-height:400px;">
    
    <?php echo $__env->make('inc.searchbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="income-order-visit-user-area " style="">
        <div class="container-fluid">
            <div class="row act_sum_mob">
                <div class="col-lg-3">
                    <a id="wd_bal" title="Click to withdraw" href="javascript:void(0)">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-title">
                                <div class="main-income-head">
                                    <h2><b>Wallet</b></h2>
                                    <div class="main-income-phara">
                                        <p>Total</p>
                                    </div>
                                </div>
                            </div>
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-adminpro-rate">
                                        <h3><span><?php echo e($user->currency); ?></span><span class="counter">&nbsp;<?php echo e($user->wallet); ?></span></h3>
                                    </div>
                                    <div class="price-graph">
                                        <i class="fa fa-money"></i>
                                    </div>
                                </div>
                                <div class="income-range">
                                    <p class="colhd">Withdraw Fund</p>
                                    <span class="income-percentange"> </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Investments</b></h2>
                                <div class="main-income-phara order-cl">
                                    <p><?php echo e(count($actInv)); ?> Active</p>
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span class="counter"><?php echo e(count($myInv)); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline6"></span>
                                </div>
                            </div>
                            <div class="income-range order-cl">
                                <p>Total Investments</p>
                                <span class="income-percentange"><i class="fa fa-pie-chart"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="income-dashone-total shadow-reset nt-mg-b-30">
                        <div class="income-title">
                            <div class="main-income-head">
                                <h2><b>Earnings</b></h2>
                                <div class="main-income-phara visitor-cl">
                                </div>
                            </div>
                        </div>
                        <div class="income-dashone-pro">
                            <div class="income-rate-total">
                                <div class="price-adminpro-rate">
                                    <h3><span><?php echo e($user->currency); ?></span><span class="counter"> <?php echo e($currentEarning); ?></span></h3>
                                </div>
                                <div class="price-graph">
                                    <span id="sparkline2"></span>
                                </div>
                            </div>
                            <div class="income-range visitor-cl">
                                <p >Total Earning </p>
                                <span class="income-percentange"> <i class="fa fa-level-up"></i></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a id="wd_ref_bal##" title="Click to withdraw" href="javascript:void(0)">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <div class="income-title">
                                <div class="main-income-head">
                                    <h2><b>Referral Bonus</b></h2>
                                    <div class="main-income-phara low-value-cl">
                                    </div>
                                </div>
                            </div>
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-adminpro-rate">
                                        <h3><span><?php echo e($user->currency); ?></span><span class="counter"><?php echo e($user->ref_bal); ?></span></h3>
                                    </div>
                                    <div class="price-graph">
                                        <span id="sparkline5"></span>
                                    </div>
                                </div>
                                <div class="income-range low-value-cl">
                                    <p class="colhd">Withdrawal Closed</p>
                                    <span class="income-percentange"> <i class="fa fa-level-down"></i></span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</div>


<!--  <div class="col-lg-12" align="left">-->
<!--                            <ul class="">-->
<!--                                <li style="color:#06a;">-->
<!--                                    <b><span class="">DHP Special Christmas Package is Live Now, Enjoy up to 15% Monthly on Invesment. Hurry Up Now, Offer Valid till December 20th, 2019</span></b><br>-->
                                    <!--<b><span class=""><a href="/<?php echo e($user->username); ?>/xpack">Click Here to Invest Now</a> </span></b>-->
<!--                                </li>-->
                               
<!--                            </ul>-->
<!--                            <a href="/<?php echo e($user->username); ?>/xpack">-->
<!--<img border="0" alt="DHP Special Package" src="https://www.diamondhubplus.com/images/dhpnew9.jpg"> </a>-->
<!--                        </div>-->

<!-- /////////////////////////   withdrawal ////////////////////////////////////////////////// -->

<div style="height: 20px; margin-top:-130px;">
    
</div>

<div id="wallet_wd" class="container popmsgContainer" >
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>

      <div class="col-md-4 popmsg-mobile" style=" border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        
        <div class="panel-heading">
          <h3><b>Wallet Withdrawal</b></h3>
          <h4><b>Available Balance:</b> <?php echo e($user->currency.' '.$user->wallet); ?></h4>         
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
            Enter amount to withdraw and select bank below
            <form id="wd_formssss" action="/user/wallet/wd" method="post">
                <div class="form-group" align="left">                       
                    <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
                </div>
                <div class="input-group">
                  <span class="input-group-addon span_bg" ><?php echo e($user->currency); ?></span>                        
                  <input id="wd_amt" type="text" class="form-control" name="amt"  required placeholder="Enter Amount to withdraw" >
                </div>

                <div class="input-group" style="margin-top: 10px;">
                  <span class="input-group-addon span_bg" >Bank</span> 
                  <select name="bank" class="form-control" required>
                      <?php 
                        $banks = App\banks::where('user_id', $user->id)->get();
                      ?>
                        <?php if(count($banks) > 0): ?>
                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($bank->Account_name.' '.$bank->Account_number.' '.$bank->Bank_Name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                  </select>
                </div>
                <div class="form-group">
                  <br><br>
                    <button class="collb btn btn-info">Withdraw</button>
                    <span style="">            
                      <a id="wallet_wd_close" href="javascript:void(0)" class="collcc btn btn-danger">Cancel</a>        
                    </span>
                    <br>
                </div>
            </form>
        </div>  
        <!-- close btn -->
        <script type="text/javascript">
          $('#wallet_wd_close').click( function(){
            $('#wallet_wd').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
</div>

<div id="ref_wd" class="container popmsgContainer" >
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>

      <div class="col-md-4 popmsg-mobile" style=" border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        
        <div class="panel-heading" style="">
          <h3><b>Referral Withdrawal</b></h3>
          <h4><b>Total Earning:</b> <?php echo e($user->currency.' '.$user->ref_bal); ?></h4>         
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
                        Enter amount to withdraw and select bank below
             <form id="wd_formssss" action="/user/ref/wd" method="post">
                <div class="form-group" align="left">                       
                    <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
                </div>
                <div class="input-group">
                  <span class="input-group-addon span_bg" ><?php echo e($user->currency); ?></span>                        
                  <input id="ref_amt" type="text" class="form-control" name="amt"  required placeholder="Enter Amount to withdraw" >
                </div>

                <div class="input-group" style="margin-top: 10px;">
                  <span class="input-group-addon span_bg" >Bank</span> 
                  <select name="bank" class="form-control" required>
                      <?php 
                        $banks = App\banks::where('user_id', $user->id)->get();
                      ?>
                        <?php if(count($banks) > 0): ?>
                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($bank->Account_name.' '.$bank->Account_number.' '.$bank->Bank_Name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                  </select>
                </div>
                <div class="form-group">
                  <br><br>
                    <button class="collb btn btn-info">Withdraw</button>
                    <span style="">            
                      <a id="ref_wd_close" href="javascript:void(0)" class="collcc btn btn-danger"> Cancel</a>        
                    </span>
                    <br>
                </div>
            </form>
        </div> 
        <!-- close btn -->
        <script type="text/javascript">
          $('#ref_wd_close').click( function(){
            $('#ref_wd').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/act_summary.blade.php ENDPATH**/ ?>