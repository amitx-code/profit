<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $user = Auth::User();  
    $myInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\investment::where('user_id', $user->id)->where('status', 'Active')->orderby('id', 'desc')->get();

    $refs = App\ref::where('username', $user->username)->orderby('id', 'desc')->get();
    
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
            
            <!-- income order visit user Start -->
                 <?php echo $__env->make('user.inc.act_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- income order visit user End -->
            <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <?php if($user->status == 2 || $user->status == 'Blocked'): ?>
                        <div class="alert alert-warning">
                            <p>Account Blocked or restricted! Please contact support for assistance. We apologize for any inconveniency. </p>
                        </div>
                    <?php elseif(empty($user->currency)): ?>
                        <div class="alert alert-warning">
                            <p><a href="/<?php echo e($user->username); ?>/profile#userdet">Please, update your profile to set your currency</a></p>
                        </div>
                    <?php else: ?>

                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="sparkline9-list shadow-reset mg-tb-30" style="background-color: #FFF;">
                                    <div class="sparkline9-hd">
                                        <div class="main-sparkline9-hd">
                                            <h1>Load Your Wallet</h1>                                        
                                        </div>
                                    </div>
                                    <div id="pay_cont" class="row" style="background-color: transparent; padding: 20px;">
                                        <div class="col-lg-6 ">                                                                                   
                                            <div class="payment_method" style="color: #222;">                                                   
                                                <p>
                                                    <i class="fa fa-bank fa fa-4x" style="color: #1F2E86;"></i>
                                                    <strong>Pay with Bank</strong>
                                                </p>
                                                <p>
                                                    Accepts mobile transfer, USSD transfer, Bank deposits, ATM transfer. <p><font color="red">Note: you must provide evidence of payment, your wallet will be funded once payment is confirmed.</font></p>
                                                </p>
                                                <div align="">
                                                    <a id="pay_with_bank" href="javascript:void(0)" class="btn btn-info" style="background-color: #1F2E86;">
                                                        Pay with Bank
                                                    </a>
                                                    
                                                </div>
                                            </div>                                 
                                        
                                        </div>
                                        <div class="col-lg-6">
                                                                                      
                                            <div class="payment_method">
                                                <p>
                                                    <i class="fa fa-credit-card fa fa-4x" style="color: #1F2E86;"></i>
                                                    <strong>Pay with Debit/Credit Card </strong>
                                                </p>
                                                <p>
                                                    Pay with ease and instant confirmation to your wallet. Supports Master, Visa and Verve cards. You can also pay with bank transfer, GTB 737, and Visa QR Code.
                                                </p> 
                                                <P>International Cards are also acceptable.</p>
                                                <div align="">
                                                    <a id="#pay_with_card" href="javascript:void(0)" class="btn btn-info" style="background-color: #1F2E86;">
                                                        Pay with Card (DISABLED FOR NOW)
                                                    </a>
                                                </div>
                                                                                             
                                            </div>
                                           
                                        </div>
                                        <?php if($user->currency == "$"): ?>
                                        <div class="col-lg-6" style="margin-top:20px;">
                                            <div class="payment_method">
                                                <p>
                                                    <i class="fa fa-bitcoin fa fa-4x" style="color: #1F2E86;"></i>
                                                    <strong>Pay with Bitcoin </strong>
                                                </p>
                                                <p>
                                                    Pay with bitcoin at ease and instant confirmation to your wallet.
                                                </p> 
                                                <P></p>
                                                <div align="">
                                                    <a id="pay_with_btc" href="javascript:void(0)" class="btn btn-info" style="background-color: #1F2E86;">
                                                        Pay with Bitcoin
                                                    </a>
                                                </div>                                     
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                    

                                    <div class="row" style="background-color: transparent; ">
                                        <?php echo $__env->make('user.inc.paymentforms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <br><br>

                                </div>

                            </div>

                        </div>

                        <div class="row" >
                            <div class="col-lg-12">
                                <div class="sparkline9-list shadow-reset mg-tb-30">
                                    <div class="sparkline9-hd">
                                        <?php
                                            $deps = App\deposits::where('user_id', $user->id)->orderby('id', 'desc')->paginate(100);
                                        ?>
                                        <div class="main-sparkline9-hd">
                                            <h1>Deposit History</h1>            
                                        </div>
                                    </div>
                                    <div class="sparkline9-graph dashone-comment">
                                        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                            <div class="row">
                                                <div class="col-sm-6" align="">
                                                   <span> <?php echo e($deps->links()); ?></span>  
                                                </div>                                            
                                            </div>
                                            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="100" data-page-list="[5, 10, 15, 20, 25, 50, 100]" data-cookie-id-table="saveId" data-show-export="true" style="">
                                                <thead>
                                                    <tr>
                                                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                                                        <!--<th data-field="id">User ID</th>-->
                                                        <th >Amount</th>
                                                        <!--<th >Currency</th>-->
                                                        <!--<th >Acct Name</th>-->
                                                        <!--<th >Acct No</th>-->
                                                        <th >Bank</th>
                                                        <th >Pop</th>
                                                        <th >Date</th>
                                                        <th >Status</th>
                                                                                                                                  
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php if(count($deps) > 0 ): ?>
                                                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>                                                            
                                                                <!--<td><?php echo e($dep->user_id); ?></td>-->
                                                                <td><?php echo e($dep->currency); ?><?php echo e($dep->amount); ?></td>
                                                                <!--<td><?php echo e($dep->currency); ?></td>-->
                                                                <!--<td><?php echo e($dep->account_name); ?></td>-->
                                                                <!--<td><?php echo e($dep->account_no); ?></td>-->
                                                                <td><?php echo e($dep->bank); ?></td>
                                                                <td>
                                                                    <?php if(!empty($dep->pop)): ?>
                                                                        <a id="<?php echo e($dep->id); ?>" href="javascript:void(0)" onclick="view_pop(this.id)">
                                                                            <img id="img<?php echo e($dep->id); ?>" src="/pop/<?php echo e($dep->pop); ?>" style="height: 20px; width:20px;">
                                                                        </a>
                                                                    <?php else: ?>
                                                                        No
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($dep->created_at); ?></td>
                                                                <td>
                                                                    <?php if($dep->status == 0): ?>
                                                                        Pending
                                                                    <?php elseif($dep->status == 1): ?>
                                                                        Approved
                                                                    <?php elseif($dep->status == 2): ?>
                                                                        Rejected
                                                                    <?php endif; ?>
                                                                </td>                                                                        
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <tr>                                                            
                                                            <td>No data</td>                                        
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>


        </div>
    </div>
    <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- //////////////////  load pop /////////////////////////////////////////////////// -->


<div id="dep_pop" class="container" style="min-width: 100%; background-color: rgba(0,0,0,.6); position: fixed; top: 0; left: 0; bottom: 0; width: 100%; z-index: 20; display: none;">
    <div class="row" style="padding: 5% 2%;">
        <div class="col-md-4">&emps;</div>

        <div class="col-md-4" style="margin: 3% 6% 3% 1%; border-radius: 7px; background-color: ; min-height: 200px;" align="Center">   
        <div class="">                        
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
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/load_wallet.blade.php ENDPATH**/ ?>