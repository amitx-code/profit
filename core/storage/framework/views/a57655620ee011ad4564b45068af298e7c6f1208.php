<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>User Withdrawal Requests</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-6" align="">
                   <span> <?php echo e($wd->links()); ?></span>  
                </div>
                <div class="col-sm-6" align="">
                   <span>
                        <br>
                        <form action="/admin/search/Withdrawal" method="post">
                            <div class="input-group">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="text" name="search_val" class="form-control" placeholder="Search by id, date, capital status">
                                <span class="input-group-addon" style="padding: 0px;">
                                    <button class="fa fa-search" style="width: 100%; height: 32px; border:none; padding: 2px 15px;"></button>
                                </span>
                            </div>
                        </form>
                   </span>  
                </div>
            </div>
            <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="100" data-page-list="[5, 10, 15, 20, 25, 50, 100]" data-cookie-id-table="saveId" data-show-export="true">
                <thead>
                    <tr>
                        <!-- <th data-field="state" data-checkbox="true"></th> -->
                        <!--<th data-field="id">User ID</th>-->
                        <th data-field="id">Username</th>
                        <th >Amount</th>
                        <!--<th >Charges</th>-->
                        <th >Amount Payable</th>
                        <th >Bank Details</th>
                        <th >Date</th>
                        <th >Status</th>
                        <th >Manage</th>                                                                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($wd) > 0 ): ?>
                        <?php $__currentLoopData = $wd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
                                <!--<td><?php echo e($dep->user_id); ?></td>  -->
                                <td><?php echo e($dep->usn); ?></td>
                                <td><?php echo e($dep->currency); ?><?php echo e($dep->amount); ?></td>
                                <!--<td><?php echo e($dep->currency); ?><?php echo e($dep->charges); ?></td>-->
                                <td><b><?php echo e($dep->currency); ?><?php echo e($dep->recieving); ?></b></td>     
                                <td><?php echo e($dep->account); ?></td>
                                <td><?php echo e($dep->created_at); ?></td>
                                <td><?php echo e($dep->status); ?></td>
                                <td>
                                    <a title="Reject" href="/admin/reject/user/wd/<?php echo e($dep->id); ?>" > 
                                        <span class=""><i class="fa fa-ban btn btn-warning" ></i></span>
                                    </a>                                    
                                    <?php if($adm->role == 3): ?>
                                        <a title="Approve" href="/admin/approve/user/wd/<?php echo e($dep->id); ?>" > 
                                            <span><i class="fa fa-check btn btn-success"></i></span>
                                        </a>
                                        <a title="Delete" href="/admin/delete/user/wd/<?php echo e($dep->id); ?>" > 
                                            <span class=""><i class="fa fa-times btn btn-danger"></i></span>
                                        </a>
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
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/userWithdrawal.blade.php ENDPATH**/ ?>