<div class="sparkline9-list shadow-reset">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>User Referrals</h1>
            <!-- <div class="sparkline9-outline-icon">
                <span class="sparkline9-collapse-link"><i class="fa fa-chevron-up"></i></span>
                <span><i class="fa fa-wrench"></i></span>
                <span class="sparkline9-collapse-close"><i class="fa fa-times"></i></span>
            </div> -->
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div id="toolbar1">
                <!-- <select class="form-control">
                    <option value="">Export Basic</option>
                    <option value="all">Export All</option>
                    <option value="selected">Export Selected</option>
                </select> -->
                
            </div>
            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                <thead>
                    <tr>
                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                        <th>Name</th>
                        <th>Username</th>
                        <th>Investment</th>
                        <th>Reg Date</th>   
                    </tr>
                </thead>
                <tbody>

                    <?php
                        $activities = App\User::where('referal', $user->username)->orderby('id', 'desc')->get();
                    ?>
                    <?php if(count($activities) > 0 ): ?>
                        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
                                <td><?php echo e($activity->firstname); ?> <?php echo e($activity->lastname); ?></td>
                                <td><?php echo e($activity->username); ?></td>
                                <td>
                                    <?php  
                                        $ref_inv = App\investment::where('user_id', $activity->id)->get();
                                        echo count($ref_inv);
                                    ?>
                                </td>                                                            
                                <td><?php echo e($activity->created_at); ?></td>                     
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
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/userref.blade.php ENDPATH**/ ?>