<?php
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $adm_users = App\admin::where('id', $v)->orwhere('email', $v)->orwhere('name', $v)->orwhere('role', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'asc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $adm_users = App\admin::orderby('id', 'asc')->paginate(100);
    }
?>

<?php $__env->startSection('content'); ?>


        <div class="main-panel">
            <div class="content">
                <?php echo $__env->make('admin.atlantis.main_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="page-inner mt--5">
                    <?php echo $__env->make('admin.atlantis.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div id="prnt"></div>
                    
                    <div class="row row-card-no-pd">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Admin Users</h4>                                        
                                    </div>
                                    <p class="card-category">
                                    All admin users.</p>
                                </div>
                                <div class="card-body">                    
                                    <div class="table-responsive">
                                        <?php echo $__env->make('admin.temp.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title">Add New users</h4>                                        
                                    </div>
                                    <p class="card-category">
                                        Create new admin users.
                                    </p>
                                </div>
                                <div class="card-body">                    
                                    <div class="table-responsive">
                                        <?php echo $__env->make('admin.temp.addNewAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.atlantis.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superloc/mcode.me/maxprofit.mcode.me/core/resources/views/admin/manageAdm.blade.php ENDPATH**/ ?>