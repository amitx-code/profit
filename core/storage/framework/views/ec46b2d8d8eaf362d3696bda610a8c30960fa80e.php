<?php    
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $deps = App\deposits::where('user_id', 'like', '%'.$v.'%')->orwhere('usn', 'like', '%'.$v.'%')->orwhere('amount', 'like', '%'.$v.'%')->orwhere('bank', 'like', '%'.$v.'%')->orwhere('account_no', 'like', '%'.$v.'%')->orwhere('account_name', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $deps = App\deposits::orderby('id', 'desc')->paginate(100);
    }
    
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
                                <div class="card-header card_header_bg_blue" >
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title text-white" > <i class="fas fa-donate"></i> <?php echo e(__('User Deposits')); ?> </h4>
                                        <div class="card-tools">
                                            <form action="/admin/search/deposit" method="post">
                                                <div class="input-group">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <?php echo e(__('Search:')); ?> </span>
                                                    </div>
                                                    <input type="text" name="search_val" class="form-control" placeholder="Search by user id, amount,date, capital or status">
                                                    <div class="input-group-append">
                                                        <button class="btn"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    <?php echo $__env->make('admin.temp.user_deposits', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/user_deposit.blade.php ENDPATH**/ ?>