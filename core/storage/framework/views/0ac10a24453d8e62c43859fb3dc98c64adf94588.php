
            <table class="display table table-stripped table-hover" >
                <thead>
                    <tr>
                        <th >Actions</th>
                        <th >Username</th>
                        <th >Amount</th>                        
                        <th >Acct Name</th>
                        <th >Acct No</th>
                        <th >Bank</th>
                        <th >Date</th>
                        <th >Pop</th>
                        <th >Status</th>                                                                               
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($deps) > 0 ): ?>
                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a title="Reject Deposit" href="/admin/reject/user/payment/<?php echo e($dep->id); ?>" > 
                                        <span class=""><i class="fa fa-ban text-warning" ></i></span>
                                    </a>                                    
                                    <?php if($adm->role == 3): ?>
                                        <a title="Approve Deposit" href="/admin/approve/user/payment/<?php echo e($dep->id); ?>" > 
                                            <span><i class="fa fa-check text-success"></i></span>
                                        </a>
                                        <a title="Delete Deposit" href="/admin/delete/user/payment/<?php echo e($dep->id); ?>" > 
                                            <span class=""><i class="fa fa-times text-danger"></i></span>
                                        </a>
                                    <?php endif; ?>
                                </td>                                                            
                                <td><?php echo e($dep->usn); ?></td>
                                <td><?php echo e($dep->currency); ?><?php echo e($dep->amount); ?></td>
                                <!-- <td></td> -->
                                <td><?php echo e($dep->account_name); ?></td>
                                <td><?php echo e($dep->account_no); ?></td>
                                <td><?php echo e($dep->bank); ?></td>
                                <td><?php echo e($dep->created_at); ?></td>
                                <td>
                                    <?php if(!empty($dep->pop)): ?>
                                        <a id="<?php echo e($dep->id); ?>" href="javascript:void(0)" onclick="view_pop(this.id)">
                                            <img id="img<?php echo e($dep->id); ?>" src="/pop/<?php echo e($dep->pop); ?>" style="height: 20px; width:20px;">
                                        </a>
                                    <?php else: ?>
                                        No
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($dep->status == 0): ?>
                                        Pending
                                    <?php elseif($dep->status == 1): ?>
                                        Approved
                                    <?php elseif($dep->status == 2): ?>
                                        Rejected
                                    <?php endif; ?>
                                </td>   
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="" align="">
               <span> <?php echo e($deps->links()); ?></span>  
            </div> 
            <br><br>
        <?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/temp/userDeposits.blade.php ENDPATH**/ ?>