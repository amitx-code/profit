<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>Admin Users</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-6" align="">
                   <span> <?php echo e($adm_users->links()); ?></span>  
                </div>
                <div class="col-sm-6" align="">
                   <span>
                        <br>
                        <form action="/admin/search/adminUser" method="post">
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
                        <!--<th data-field="id">ID</th>-->
                        <th >Name</th>
                        <th >Email</th>
                        <th >Role</th>
                        <!--<th >Date</th> -->
                        <!--<th >Status</th>-->
                        <th >Manage</th>                                                                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($adm_users) > 0 ): ?>
                        <?php $__currentLoopData = $adm_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
                                <!--<td><?php echo e($dep->id); ?></td>-->
                                <td><?php echo e($dep->name); ?></td>
                                <td><?php echo e($dep->email); ?></td>
                                <td>
                                    <?php if($dep->role == 1): ?>
                                    <?php echo e($dep->role = "Support"); ?>

                                    <?php elseif($dep->role == 2): ?>
                                    <?php echo e($dep->role = "Manager"); ?>

                                     <?php else: ?>
                                     <?php echo e($dep->role = "Admin"); ?>

                                    <?php endif; ?>
                                    </td>
                                <!--<td><?php echo e($dep->created_at); ?></td>-->
                                <!--<td><?php echo e($dep->status); ?></td> -->
                                <td>
                                    <a title="Ban User" href="/admin/ban/admuser/<?php echo e($dep->id); ?>" > 
                                        <span class=""><i class="fa fa-ban btn btn-warning" ></i></span>
                                    </a>       
                                    <a title="Activate User" href="/admin/activate/admuser/<?php echo e($dep->id); ?>" > 
                                        <span><i class="fa fa-check btn btn-success"></i></span>
                                    </a>                             
                                    <?php if($adm->role == 3): ?>                                        
                                        <a title="Delete Investment" href="/admin/delete/admuser/<?php echo e($dep->id); ?>" > 
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
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/admin.blade.php ENDPATH**/ ?>