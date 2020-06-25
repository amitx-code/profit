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
        $deps = App\deposits::where('user_id', $v)->orwhere('amount', $v)->orwhere('bank', $v)->orwhere('account_no', $v)->orwhere('account_name', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
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
                                <div class="card-header" style="background-color: #127aff;">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title" style="color: #fff;"> <i class="fas fa-donate"></i> User Deposits</h4>
                                        <div class="card-tools">
                                            <form action="/admin/search/deposit" method="post">
                                                <div class="input-group">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Search:</span>
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
                                    <?php echo $__env->make('admin.temp.userDeposits', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
<!-- //////////////////  load pop /////////////////////////////////////////////////// -->

            <div id="dep_pop" class="container" style="min-width: 100%; background-color: rgba(0,0,0,.6); position: fixed; top: 0; left: 0; bottom: 0; width: 100%; z-index: 20; display: none;">
                <div class="row" style="padding: 5% 2%;">
                    <div class="col-md-4">&emps;</div>

                    <div class="col-md-4" style="margin: 3% 6% 3% 1%; border-radius: 7px; background-color: ; min-height: 200px;" align="Center">        
                       <div style="padding-bottom:5px">                        
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
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/userDeposit.blade.php ENDPATH**/ ?>