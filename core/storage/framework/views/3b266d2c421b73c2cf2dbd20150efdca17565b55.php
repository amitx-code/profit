
            <table class="display table table-stripped table-hover">
                <thead>
                    <tr>
                        <th >Actions</th>
                        <th >Username</th>
                        <th >Amount</th>                        
                        <th >Amount Payable</th>
                        <th >Bank Details</th>
                        <th >Date</th>
                        <th >Status</th>                                                                              
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($wd) > 0 ): ?>
                        <?php $__currentLoopData = $wd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
                                <td>
                                    <a title="Reject" href="/admin/reject/user/wd/<?php echo e($dep->id); ?>" > 
                                        <span class=""><i class="fa fa-ban text-warning" ></i></span>
                                    </a>                                    
                                    <?php if($adm->role == 3): ?>
                                        <a title="Approve" href="/admin/approve/user/wd/<?php echo e($dep->id); ?>" > 
                                            <span><i class="fa fa-check text-success"></i></span>
                                        </a>
                                        <a title="Delete" href="/admin/delete/user/wd/<?php echo e($dep->id); ?>" > 
                                            <span class=""><i class="fa fa-times text-danger"></i></span>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($dep->usn); ?></td>
                                <td><?php echo e($dep->currency); ?><?php echo e($dep->amount); ?></td>                                
                                <td><b><?php echo e($dep->currency); ?><?php echo e($dep->recieving); ?></b></td>     
                                <td><?php echo e($dep->account); ?></td>
                                <td><?php echo e($dep->created_at); ?></td>
                                <td><?php echo e($dep->status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                    <?php endif; ?>
                </tbody>
            </table>

            <?php /**PATH /home/superloc/mcode.me/maxprofit.mcode.me/core/resources/views/admin/temp/userWithdrawal.blade.php ENDPATH**/ ?>