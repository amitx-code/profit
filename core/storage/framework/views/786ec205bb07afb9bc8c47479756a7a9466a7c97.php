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
                    <div class="row">
                        
                        <div class="col-sm-8">
                            <div class="sparkline9-list shadow-reset mg-tb-30">
                                <div class="sparkline9-hd">
                                    <div class="main-sparkline9-hd">
                                        <h1>Wallet Transfer</h1>
                                    </div>
                                </div>
                                
                                <div class="sparkline9-graph dashone-comment">
                                    <?php if(Session::has('err_send')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(Session::get('err_send')); ?>

                                        </div>
                                        <?php echo e(Session::forget('err_send')); ?>

                                    <?php endif; ?>
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        
                                        <form action="/user/send/fund" method="post" enctype="multipart/form-data">
                                          <div class="form-group" align="left">                       
                                              <input type="hidden" class="regTxtBox" name="_token" value="<?php echo e(csrf_token()); ?>">
                                          </div>                                                    
                                          <div class="input-group" style="margin-top: 10px;">
                                            <span class="input-group-addon span_bg" ><i class="fa fa-user"></i></span>                        
                                            <input type="text" class="regTxtBox" name="usn"  required placeholder="Username" >
                                          </div>
                                          <div class="input-group" style="margin-top: 10px;">
                                            <span class="input-group-addon span_bg" ><?php echo e($user->currency); ?></span>                        
                                            <input type="text" class="regTxtBox" name="s_amt"  required placeholder="Enter amount you want to send" >
                                          </div>
                                                        
                                          <div class="form-group" align="center">
                                            <br><br>
                                              <button class="btn btn-info" style="background-color: #1f2e86; width: 40%; ">Send</button>
                                              <br>
                                          </div>
                                          
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->make('user.inc.transfer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="col-sm-1"></div>
                         <?php echo $__env->make('user.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/send_money.blade.php ENDPATH**/ ?>