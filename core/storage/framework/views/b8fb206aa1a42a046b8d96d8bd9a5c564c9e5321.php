<?php
    // $user = Auth::User();  
    $msgs = App\msg::orderby('id', 'desc')->get();
?>
<div class="col-lg-4" style="margin-top: 30px;">
    <div class="" style="background-color: #FFF;">
        <div class="sparkline8-hd">
            <div class="main-sparkline8-hd">
                <h1>Messages</h1>
            </div>
        </div>
        <div class=" messages-scrollbar ">
                <div class="">
                    <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <?php 
                            $rd = 0;
                            $str = explode(';', $msg->readers);
                           
                            if(in_array($user->id, $str))
                            {
                                $rd = 1;
                            }
                            
                        ?>
                            <a id="<?php echo e($msg->id); ?>" class="dashtwo-messsage-title" href="javascript:void(0)" onclick="read(this.id, 'yes')">
                                <div class="row alert alert-default" style="border-bottom: 1px solid #CCC;   padding: 2px 10px;">
                                    <div class="col-sm-1" style="" align="center"> 
                                    <?php if($rd == 1): ?>                                      
                                        <i class="fa fa-envelope" style=" color: #777; font-size: 12px; margin-top: 20px;"></i> 
                                    <?php else: ?>
                                        <i class="fa fa-envelope" style=" color: red; font-size: 12px; margin-top: 20px;"></i> 
                                    <?php endif; ?>
                                    </div>
                                    <div class="col-sm-10">
                                        <b>                                   
                                            <p id="msg_cnt<?php echo e($msg->id); ?>" class="comment-content" style=" overflow: hidden;">
                                                <?php echo substr($msg->message, 0, 50).'.....'; ?>

                                            </p>
                                            
                                        </b>
                                    </div>
                                </div>                                
                            </a> 
                             
                        <div id="msg_cnts<?php echo e($msg->id); ?>" style=" display: none;">
                            <?php echo $msg->message; ?>

                        </div> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </div>
    </div>

</div><?php /**PATH C:\wamp64\www\dh\core\resources\views/user/inc/message.blade.php ENDPATH**/ ?>