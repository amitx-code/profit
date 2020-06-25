<?php echo $__env->make('user.inc.fetch', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $user = Auth::User();  
    $myInv = App\investment::where('user_id', $user->id)->orderby('id', 'desc')->get();
    $actInv = App\investment::where('user_id', $user->id)->where('status', 'Active')->orderby('id', 'desc')->get();
?>

<?php $__env->startSection('content'); ?>




<body class="materialdesign">
    
    <div class="wrapper-pro">
        <?php echo $__env->make('inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <!-- header -->
            <?php echo $__env->make('inc.headbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Header top area end-->
            <!-- searchbar-->
             
            <!-- end searchbar -->
            <!-- income order visit user Start -->
                 <?php echo $__env->make('user.inc.act_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- income order visit user End -->
            <div class="feed-mesage-project-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sparkline8-list shadow-reset mg-tb-30">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Investment Packages</h1>
                                    </div>
                                </div>
                                <?php echo $__env->make('user.inc.packages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                        </div>
                         <?php echo $__env->make('user.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php echo $__env->make('user.inc.confirm_inv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('inc.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/dashboard.blade.php ENDPATH**/ ?>