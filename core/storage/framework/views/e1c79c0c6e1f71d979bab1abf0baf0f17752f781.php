<?php
    $trans = App\fund_transfer::where('from_usr',$user->username)->orwhere('to_usr', $user->username)->orderby('id','desc')->get();
?>

    <div class="sparkline9-list shadow-reset mg-tb-30">
        <div class="sparkline9-hd">
            <div class="main-sparkline9-hd">
                <h1>Fund Transfer</h1>
               
            </div>
        </div>
        <div class="sparkline9-graph dashone-comment">
            <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                <table id="table1" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-resizable="true" data-cookie="true" data-page-size="5" data-page-list="[5, 10, 15, 20, 25]" data-cookie-id-table="saveId" data-show-export="true">
                    <thead>
                        <tr>
                            <!-- <th data-field="state" data-checkbox="true"></th> -->
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount</th>
                            <th>Date</th>                                                    
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php if(count($trans) > 0 ): ?>
                            <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!-- <td></td> -->
                                    <td><?php echo e($activity->from_usr); ?></td>
                                    <td><?php echo e($activity->to_usr); ?></td>
                                    <td><?php echo e($activity->amt); ?></td>   
                                    <td><?php echo e($activity->created_at); ?></td> 
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/transfer.blade.php ENDPATH**/ ?>