<?php
   $cap = $cap2 = $dep = $dep2 = $wd_bal = $sum_cap = 0;   
?>

<?php $__env->startSection('content'); ?>
        <div class="main-panel">
            <div class="content">
                <?php echo $__env->make('admin.atlantis.main_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="page-inner mt--5">
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><i class="fa fa-wrench"></i> <?php echo e(__('Site Settings')); ?> </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <form id="settings_form" action="/admin/update/site/settings" method="post">
                                        <div class="form-group">                                            
                                            <div class="row">                                                
                                                <div class="col-md-12" align="">
                                                    <h3><i class="fas fa-feather-alt"></i> <?php echo e(__('Header Color (Hex code)')); ?> </h3>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div id="hcolor" class="admin_settings_input" style="background-color: <?php echo e($settings->header_color); ?>;"></div>
                                                    <input id="input_hcolor" value="<?php echo e($settings->header_color); ?>" class="form-control float-left with_50per" type="text"  name="hcolor" placeholder="#FFFFFF" required >&nbsp;
                                                    <a href="javascript:void(0)" class="btn btn-info" onclick="prvColor('h', 'hcolor')">
                                                    <?php echo e(__('Preview')); ?> </a>
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <div class="row">                                                
                                                <div class="col-md-12" align="">
                                                    <h3><i class="fas fa-feather-alt"></i> <?php echo e(__('Footer Color (Hex code)')); ?> </h3>
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div id="fcolor" class="admin_settings_input" style="background-color: <?php echo e($settings->footer_color); ?>;"></div>
                                                    <input id="input_fcolor" value="<?php echo e($settings->footer_color); ?>" class="form-control float-left with_50per" type="text"  name="fcolor" placeholder="#FFFFFF" required >
                                                        &nbsp;<a href="javascript:void(0)" class="btn btn-info" onclick="prvColor('f', 'fcolor')"> <?php echo e(__('Preview')); ?> </a>
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div   class="col-md-6">
                                                    <h3><i class="fab fa-centercode"></i> <?php echo e(__('Site Logo')); ?> </h3>
                                                    <input type="file" name="siteLogo" class=" btn btn-info border_none" >
                                                </div>                                               
                                                <div class="col-md-6" align="center"> 
                                                      <img src="/img/<?php echo e($settings->site_logo); ?>" alt="Logo" class="height_50" align="center" >
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>

                                            <div class="row margin_top50"> 
                                                <div class="col-md-6">
                                                    <h3><i class="fas fa-thumbtack"></i> <?php echo e(__('Site Title')); ?> </h3>
                                                    <input type="text" name="siteTitle" value="<?php echo e($settings->site_title); ?>" class="form-control" placeholder="Site Name" required >
                                                </div>                                      
                                            </div>
                                            <br><br>
                                            <hr>

                                            <div class="row margin_top50"> 
                                                <div class="col-md-12">
                                                    <h3><i class="fas fa-pen"></i> <?php echo e(__('Site Description')); ?> </h3>
                                                    <input type="text" name="siteDescr" value="<?php echo e($settings->site_descr); ?>" class="form-control" placeholder="Site Description" required>
                                                </div>                                      
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-12">
                                                    <h3><i class="fas fa-hand-holding-usd"></i> <?php echo e(__('Minimum Deposit (').$settings->currency.__(')')); ?> </h3>
                                                    <input type="number" name="min_dep" value="<?php echo e(env('MIN_DEPOSIT')); ?>" class="form-control" placeholder="Minimum Deposit" step="0.01" required>
                                                </div>                                      
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-12">
                                                    <h3><i class="fas fa-users"></i> <?php echo e(__('Referal Bonus(x/100)')); ?> </h3>
                                                    <input type="number" name="ref_bonus" value="<?php echo e(env('REF_BONUS')); ?>" class="form-control" placeholder="Enter percentage value" required>
                                                </div>                                      
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-12">
                                                    <h3><i class="fas fa-users"></i> <?php echo e(__('Referal Type')); ?> </h3>
                                                    <select class="form-control" name="referal_type" >
                                                        <option value="Single">Single</option>
                                                        <option value="Multiple">Multiple</option>
                                                    </select> 
                                                    <small>Current selection: <?php echo e(env('REF_TYPE')); ?></small>
                                                </div>                                      
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-12 pad_btm_40">
                                                    <h3><i class="fa fa-credit-card"></i> <?php echo e(__('Payment Gateway Setup')); ?> </h3>
                                                </div>
                                                <div   class="col-md-6 ">
                                                    <div class="card pad_20">
                                                        <h3 align="center"><i class="fab fa-cc-paypal fa-3x"></i></h3>
                                                        <h2 class="text-center">Paypal Setup</h2>
                                                        <hr>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Paypal ID')); ?> </h5>
                                                            <input type="text" name="paypal_ID" value="<?php echo e($settings->paypal_ID); ?>" class="form-control" placeholder="Site Name" >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Paypal Secret')); ?> </h5>
                                                            <input type="text" name="paypal_secret" value="<?php echo e($settings->paypal_secret); ?>" class="form-control" placeholder="Site Name" >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Mode')); ?> </h5>
                                                            <select class="form-control" name="paypal_mode" >
                                                                <option value="sandbox">Sandbox</option>
                                                                <option value="live">Live</option>
                                                            </select> 
                                                        </div>
                                                        <div class="" align="right"> 
                                                            <b>On/Off</b><br>             
                                                            <label class="switch">
                                                              <input id="switch_paypal" type="checkbox" name="switch_paypal"  value="<?php echo e(env('SWITCH_PAYPAL')); ?>" <?php if(env('SWITCH_PAYPAL') == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                              <span id="" class="slider round" onclick="checkedOnOff('switch_paypal')"></span>
                                                            </label>
                                                        </div>  
                                                        
                                                    </div>
                                                </div> 
                                                <div   class="col-md-6">
                                                    <div class="card pad_20" >
                                                        <h3 align="center"><i class="fab fa-cc-stripe fa-3x"></i></h3>
                                                        <h2 class="text-center">Stripe Setup</h2>
                                                        <hr>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Stripe Key')); ?> </h5>
                                                            <input type="text" name="stripe_key" value="<?php echo e($settings->stripe_key); ?>" class="form-control" placeholder="Site Name"  >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Stripe Secret')); ?> </h5>
                                                            <input type="text" name="stripe_secret" value="<?php echo e($settings->stripe_secret); ?>" class="form-control" placeholder="Stripe Secrete" >
                                                        </div>   
                                                        <div class="" align="right"> 
                                                            <b>On/Off</b><br>             
                                                            <label class="switch">
                                                              <input id="switch_stripe" type="checkbox" name="switch_stripe"  value="<?php echo e(env('SWITCH_STRIPE')); ?>" <?php if(env('SWITCH_STRIPE') == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                              <span id="" class="slider round" onclick="checkedOnOff('switch_stripe')"></span>
                                                            </label>
                                                        </div>                                                     
                                                    </div>                                                   
                                                </div>  
                                                <div   class="col-md-6">
                                                    <div class="card pad_20" >
                                                        <h3 align="center"><i class="far fa-building fa-3x"></i></h3>
                                                        <h2 class="text-center">Bank Deposit Setup</h2>
                                                        <hr>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Bank Name')); ?> </h5>
                                                            <input type="text" name="bank_name" value="<?php echo e(env('BANK_NAME')); ?>" class="form-control" placeholder=""  >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Account Name')); ?> </h5>
                                                            <input type="text" name="act_name" value="<?php echo e(env('ACCOUNT_NAME')); ?>" class="form-control" placeholder="" >
                                                        </div>  
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Account Number')); ?> </h5>
                                                            <input type="number" name="act_no" value="<?php echo e(env('ACCOUNT_NUMBER')); ?>" class="form-control" placeholder="" >
                                                        </div> 
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('Response Email')); ?> </h5>
                                                            <input type="email" name="dep_email" value="<?php echo e(env('BANK_DEPOSIT_EMAIL')); ?>" class="form-control" placeholder="" >
                                                        </div>  
                                                        <div class="" align="right"> 
                                                            <b>On/Off</b><br>             
                                                            <label class="switch">
                                                              <input id="switch_bank_deposit" type="checkbox" name="switch_bank_deposit"  value="<?php echo e(env('BANK_DEPOSIT_SWITCH')); ?>" <?php if(env('BANK_DEPOSIT_SWITCH') == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                              <span id="" class="slider round" onclick="checkedOnOff('switch_bank_deposit')"></span>
                                                            </label>
                                                        </div>                                                     
                                                    </div>                                                   
                                                </div>  
                                                <div   class="col-md-6">
                                                    <div class="card pad_20" >
                                                        <h3 align="center"><i class="fab fa-bitcoin fa-3x"></i></h3>
                                                        <h2 class="text-center">Bitcoin Setup</h2>
                                                        <hr>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('COINPAYMENTS_MERCHANT_ID')); ?> </h5>
                                                            <input type="text" name="cp_m_id" value="<?php echo e(env('COINPAYMENTS_MERCHANT_ID')); ?>" class="form-control" placeholder=""  >
                                                        </div>  
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('COINPAYMENTS_PUBLIC_KEY')); ?> </h5>
                                                            <input type="text" name="cp_p_key" value="<?php echo e(env('COINPAYMENTS_PUBLIC_KEY')); ?>" class="form-control" placeholder=""  >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('COINPAYMENTS_PRIVATE_KEY')); ?> </h5>
                                                            <input type="text" name="cp_pr_key" value="<?php echo e(env('COINPAYMENTS_PRIVATE_KEY')); ?>" class="form-control" placeholder=""  >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('COINPAYMENTS_IPN_SECRET')); ?> </h5>
                                                            <input type="text" name="cp_ipn_secret" value="<?php echo e(env('COINPAYMENTS_IPN_SECRET')); ?>" class="form-control" placeholder=""  >
                                                        </div>
                                                        <div class="form-group">
                                                            <h5> <?php echo e(__('COINPAYMENTS_IPN_URL')); ?> </h5>
                                                            <input type="text" name="cp_ipn_url" value="<?php echo e(env('COINPAYMENTS_IPN_URL')); ?>" class="form-control" placeholder=""  >
                                                        </div>
                                                        
                                                        <div class="" align="right"> 
                                                            <b>Enable/Disable BTC Deposit</b><br>             
                                                            <label class="switch">
                                                              <input id="switch_BTC" type="checkbox" name="switch_BTC"  value="<?php echo e(env('SWITCH_BTC')); ?>" <?php if(env('SWITCH_BTC') == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                              <span id="" class="slider round" onclick="checkedOnOff('switch_BTC')"></span>
                                                            </label>
                                                        </div>                                                     
                                                    </div>                                                   
                                                </div>                                       
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-4">
                                                    <h3><i class="fas fa-dollar-sign"></i> <?php echo e(__('Wallet Funding')); ?> </h3>
                                                </div>                                               
                                                <div class="col-md-8" align="right"> 
                                                    <b>On/Off</b><br>             
                                                    <label class="switch">
                                                      <input id="wallet" type="checkbox" name="wallet"  value="<?php echo e($settings->deposit); ?>" <?php if($settings->deposit == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                      <span id="" class="slider round" onclick="checkedOnOff('wallet')"></span>
                                                    </label>
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div class="col-md-4">
                                                    <h3><i class="fas fa-hand-holding-usd"></i> <?php echo e(__('Investment')); ?>  </h3>
                                                </div>                                               
                                                <div class="col-md-8" align="right">
                                                    <b>On/Off</b><br>               
                                                    <label class="switch">
                                                      <input id="inv" type="checkbox" name="inv"  value="<?php echo e($settings->investment); ?>" <?php if($settings->investment == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                      <span id="" class="slider round" onclick="checkedOnOff('inv')"></span>
                                                    </label> 
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div   class="col-md-4">
                                                    <h3><i class="fas fa-money-bill-alt"></i> <?php echo e(__('Withdrawal')); ?> </h3>
                                                </div>                                               
                                                <div class="col-md-8" align="right">
                                                    <b>On/Off</b><br>               
                                                    <label class="switch">
                                                      <input id="wd" type="checkbox" name="wd" value="<?php echo e($settings->withdrawal); ?>" <?php if($settings->withdrawal == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                      <span id="" class="slider round" onclick="checkedOnOff('wd')"></span>
                                                    </label> 
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50"> 
                                                <div   class="col-md-4">
                                                    <h3> <i class="fas fa-user"></i> <?php echo e(__('Enable user registration')); ?> </h3>
                                                </div>                                               
                                                <div class="col-md-8" align="right">
                                                    <b>On/Off</b><br>               
                                                    <label class="switch">
                                                      <input id="reg" type="checkbox" name="reg" value="<?php echo e($settings->user_reg); ?>" <?php if($settings->user_reg == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                                      <span id="" class="slider round" onclick="checkedOnOff('reg')"></span>
                                                    </label> 
                                                </div>                                                
                                            </div>
                                            <br><br>
                                            <hr>
                                            <div class="row margin_top50">                                                                                               
                                                <div class="col-md-12" >
                                                    <h3><i class="fa fa-coggs"></i> <?php echo e(__('Currency Settings')); ?> </h3>
                                                </div>
                                                <div   class="col-md-6 ">
                                                    <div class="card pad_20" >
                                                        <h5> <?php echo e(__('Currency symbol/Code')); ?> </h5>
                                                        <input type="text" name="cur" value="<?php echo e($settings->currency); ?>" class="form-control" placeholder="currency symbol or code" required >
                                                    </div>
                                                </div> 
                                                <div   class="col-md-6">
                                                    <div class="card form-group pad_20" >
                                                        <h5> <?php echo e(__('Currency Rate to US Dollar')); ?> </h5>
                                                        <input type="text" name="cur_conv" value="<?php echo e($settings->currency_conversion); ?>" class="form-control" placeholder="Currency conversion rate to doller" required >
                                                    </div>
                                                </div>                                            
                                            </div>
                                            
                                        </div>
                                    </form>
                                    <div class="row margin_top50"> 
                                        <div   class="col-md-12">
                                            <button class="btn btn-info float-right"  onclick="load_post_ajax('/admin/update/site/settings', 'settings_form', 'admin_settings_form' )"> <?php echo e(__('Save Changes')); ?> </button>
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
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/settings.blade.php ENDPATH**/ ?>