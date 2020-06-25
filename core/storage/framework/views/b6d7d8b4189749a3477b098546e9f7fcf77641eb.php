<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>Investment Packages</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-6" align="">
                   <span> <?php echo e($packs->links()); ?></span>

                </div>
                <div class="col-sm-6" align="">
                   <span>
                        <br>
                        <form action="/admin/search/deposit" method="post">
                            <div class="input-group">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="text" name="search_val" class="form-control" placeholder="Search by id, date, capital or status">
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
                        <th data-field="id">ID</th>
                        <th >Name</th>
                        <th >Min</th>
                        <th >Max</th>
                        <th >Daily Interest</th>
                        <th >Period</th>
                        <th >WD Interval</th>
                        <th >WD Fee</th>
                        <th >On/Off</th>
                        <th >Manage</th>                                                                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($packs) > 0 ): ?>
                        <?php $__currentLoopData = $packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
                                <td><?php echo e($dep->id); ?></td>
                                <td><?php echo e($dep->package_name); ?></td>
                                <td><?php echo e($dep->min); ?></td>
                                <td><?php echo e($dep->max); ?></td>
                                <td><?php echo e($dep->daily_interest); ?></td>
                                <td><?php echo e($dep->period); ?></td>
                                <td><?php echo e($dep->days_interval); ?></td>
                                <td><?php echo e($dep->withdrwal_fee); ?></td>
                                <td>
                                     
                                        <label class="switch" >
                                          <input type="checkbox" <?php if($dep->status == 1): ?><?php echo e('checked'); ?><?php endif; ?>>
                                          <span id="switch_pack<?php echo e($dep->id); ?>" class="slider round" onclick="act_deact_pack('<?php echo e($dep->id); ?>')"></span>
                                        </label>
                                    
                                </td>
                                
                                <td>                                                                       
                                    <?php if($adm->role == 3 || $adm->role == 2): ?>
                                        <a id="<?php echo e($dep->id); ?>" title="Edit Package" href="javascript:void(0)" onclick="edit_pack(this.id, '<?php echo e($dep->min); ?>', '<?php echo e($dep->max); ?>', '<?php echo e($dep->daily_interest); ?>', '<?php echo e($dep->withdrwal_fee); ?>', '<?php echo e(csrf_token()); ?>')"> 
                                            <span><i class="fa fa-edit btn btn-warning"></i></span>
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
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/inv_pack.blade.php ENDPATH**/ ?>