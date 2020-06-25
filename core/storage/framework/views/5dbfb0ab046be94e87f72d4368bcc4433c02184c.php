<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>User Deposits</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-6" align="">
                   <span> <?php echo e($deps->links()); ?></span>  
                </div>
                <div class="col-sm-6" align="">
                   <span>
                        <br>
                        <form action="/admin/search/deposit" method="post">
                            <div class="input-group">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="text" name="search_val" class="form-control" placeholder="Search by user id, amount,date, capital or status">
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
                        <th data-field="id">Username</th>
                        <th >Amount</th>                        
                        <th >Acct Name</th>
                        <th >Acct No</th>
                        <th >Bank</th>
                        <th >Date</th>
                        <th >Pop</th>
                        <th >Status</th>
                        <th >Manage</th>                                                                          
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(count($deps) > 0 ): ?>
                        <?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                                                            
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
                                <td>
                                    <a title="Reject Deposit" href="/admin/reject/user/payment/<?php echo e($dep->id); ?>" > 
                                        <span class=""><i class="fa fa-ban btn btn-warning" ></i></span>
                                    </a>                                    
                                    <?php if($adm->role == 3): ?>
                                        <a title="Approve Deposit" href="/admin/approve/user/payment/<?php echo e($dep->id); ?>" > 
                                            <span><i class="fa fa-check btn btn-success"></i></span>
                                        </a>
                                        <a title="Delete Deposit" href="/admin/delete/user/payment/<?php echo e($dep->id); ?>" > 
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
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/userDeposits.blade.php ENDPATH**/ ?>