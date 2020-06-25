<?php
    $acts = App\adminLog::orderby('id', 'desc')->paginate(100);
?>

<table id="basic-datatables" class="display table table-stripped table-hover">
    <thead>
        <tr>            
            <th>ID</th>
            <th >Admin</th>
            <th >Action</th>
            <th >Date</th>                                                              
        </tr>
    </thead>
    <tbody>
        <?php if(count($acts) > 0 ): ?>
            <?php $__currentLoopData = $acts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>                                                            
                    <td><?php echo e($dep->id); ?></td>
                    <td><?php echo e($dep->admin); ?></td>
                    <td><?php echo e($dep->action); ?></td>
                    <td><?php echo e($dep->created_at); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>                                                            
                <td>No data</td>                                        
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div align="center">
   <span> <?php echo e($acts->links()); ?></span>  
</div><?php /**PATH /home/superloc/mcode.me/maxprofit.mcode.me/core/resources/views/admin/temp/userlog.blade.php ENDPATH**/ ?>