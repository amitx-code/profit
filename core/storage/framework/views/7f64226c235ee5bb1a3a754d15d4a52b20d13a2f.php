<?php
    
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $actInv = App\investment::where('user_id', $v)->orwhere('usn', 'like', '%'.$v.'%')->orwhere('capital', $v)->orwhere('status', $v)->orwhere('date_invested', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $actInv = App\investment::orderby('id', 'desc')->paginate(100);
    }
    function getWorkingDays($startDate, $endDate)
    {        
        $begin = strtotime($startDate)+86400;
        $end   = strtotime($endDate);
        if ($begin > $end) 
        {
            // echo "startdate is in the future! <br />";
            return 0;
        } 
        else 
        {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) 
            {
                $no_days++; // no of days in the given interval      
                $what_day = date("N", $begin);
                if ($what_day > 5) { // 6 and 7 are weekend days
                   $weekends++;
                   // echo $what_day;
                };               
                $begin += 86400;   // +1 day                 
            };
            $working_days = $no_days - $weekends;
            return $working_days;
        }
    }
   
?>
               
<table class="display table table-stripped table-hover">
    <thead>
        <tr>
            <th> <?php echo e(__('Action')); ?> </th>
            <th> <?php echo e(__('Username')); ?> </th>
            <th> <?php echo e(__('Package')); ?> </th>
            <th> <?php echo e(__('Capital')); ?> </th>
            <th> <?php echo e(__('Return')); ?> </th>
            <th> <?php echo e(__('Date Invested')); ?> </th> 
            <th> <?php echo e(__('Elapse')); ?> </th>  
            <th> <?php echo e(__('Days Spent')); ?> </th> 
            <th> <?php echo e(__('Withdrawn')); ?> </th>  
            <th> <?php echo e(__('Status')); ?> </th>
            <th> <?php echo e(__('Earning')); ?> </th>                                  
        </tr>
    </thead>
    <tbody class="web-table">  
        <?php if(count($actInv) > 0 ): ?>
            <?php $__currentLoopData = $actInv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php

                    $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                    if($totalElapse == 0)
                    {
                        $lastWD = $in->last_wd;
                        $enddate = ($in->end_date);
                        $Edays = getWorkingDays($lastWD, $enddate);
                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                        $withdrawable = $ern;
                                                             
                        $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                        $ended = "yes";

                    }
                    else
                    {
                        $lastWD = $in->last_wd;
                        $enddate = (date('Y-m-d'));
                        $Edays = getWorkingDays($lastWD, $enddate);
                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                        $withdrawable = 0;
                        if ($Edays >= $in->days_interval)
                        {
                            $withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
                        }
                                                       
                        $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                        $ended = "no";
                    }

                ?>
                <tr class="">
                    <td>
                        <a title="Pause Investment" href="/admin/pause/user_inv/<?php echo e($in->id); ?>" > 
                            <span class=""><i class="fa fa-pause text-warning" ></i></span>
                        </a>                                    
                        <?php if($adm->role == 3): ?>
                            <a title="Activate Investment" href="/admin/activate/user_inv/<?php echo e($in->id); ?>" > 
                                <span><i class="fa fa-check text-success"></i></span>
                            </a>
                            <a title="Delete Investment" href="/admin/delete/user_inv/<?php echo e($in->id); ?>" > 
                                <span class=""><i class="fa fa-times text-danger"></i></span>
                            </a>
                        <?php endif; ?>
                    </td>   
                    <td><?php echo e($in->usn); ?></td>
                    <td><?php echo e($in->package); ?></td>
                    <td><?php echo e($in->currency); ?><?php echo e($in->capital); ?></td>
                    <td><?php echo e($in->currency); ?><?php echo e($in->i_return); ?></td>
                    <td><?php echo e($in->date_invested); ?></td>
                    <td><?php echo e($in->end_date); ?></td> 
                    <td>
                        <?php if($in->status != 'Expired'): ?>
                            <?php echo e($totalDays); ?>

                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($in->w_amt); ?></td> 
                    <td><?php echo e($in->status); ?></td>
                    <td>   
                        <?php if($in->currency == "" && $in->package != 'International'): ?>
                            N <?php echo e($ern); ?>  
                        <?php elseif($in->currency == "" && $in->package = 'International'): ?>
                            $ <?php echo e($ern); ?>

                        <?php else: ?>
                            <?php echo e($in->currency); ?> <?php echo e($ern); ?>

                        <?php endif; ?>                              
                    </td>
                </tr>                            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        <?php else: ?>
            
        <?php endif; ?>
    </tbody>
    
</table>
<div class="" align="">
   <span> <?php echo e($actInv->links()); ?></span>  
</div><?php /**PATH C:\wamp64\www\dh\core\resources\views/admin/temp/user_invs.blade.php ENDPATH**/ ?>