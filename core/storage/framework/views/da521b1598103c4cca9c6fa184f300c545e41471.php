<?php
    
    $adm = Session::get('adm');
    $inv = App\investment::orderby('id', 'desc')->get();
    $deposits = App\deposits::orderby('id', 'desc')->get();
    $users = App\User::orderby('id', 'desc')->get();
    $wd = App\withdrawal::orderby('id', 'desc')->get();
    $today_wd = App\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_dep = App\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
    $today_inv = App\investment::where('date_invested', date('Y-m-d'))->orderby('id', 'desc')->get();
    $cap = $cap2 = $dep = $dep2 = $wd_bal = $sum_cap = 0;  
    $logs =  App\adminLog::orderby('id', 'desc')->get();

    if(Session::has('val'))
    {
        $v = Session::get('val');
        $wd = App\withdrawal::where('user_id', $v)->orwhere('amount', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orwhere('account', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $wd = App\withdrawal::orderby('id', 'desc')->paginate(100);
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
                                <div class="card-header" style="background-color: #127aff;">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title" style="color: #fff;"> <i class="fas fa-arrow-alt-circle-down"></i> User Withdrawal</h4>
                                        <div class="card-tools">
                                            <form action="/admin/search/Withdrawal" method="post">
                                                <div class="input-group">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Search:</span>
                                                    </div>
                                                    <input type="text" name="search_val" class="form-control" placeholder="Search by id, date, capital status">
                                                    <div class="input-group-append">
                                                        <button class="btn"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                   <?php echo $__env->make('admin.temp.userWithdrawal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/userWithdrawals.blade.php ENDPATH**/ ?>