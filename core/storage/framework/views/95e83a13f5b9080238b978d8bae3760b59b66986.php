<?php
    // $user = Auth::User();  
    $msgs = App\msg::orderby('id', 'desc')->get();

?>

<div class="col-lg-12" style="margin-top: 30px;">
    <div class="" style="background-color: #FFF;">

        <div class="sparkline8-hd">
            <div class="main-sparkline8-hd">
                <h1>Messages</h1>               
            </div>
        </div>
        <div class=" messages-scrollbar ">
            <br>
            <div class="">
                <div class="">
                    <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
                        

                        <a id="<?php echo e($msg->id); ?>" class="dashtwo-messsage-title" href="javascript:void(0)" onclick="admread(this.id, 'yes')">
                            <div class="row alert alert-default" style="border-bottom: 1px solid #CCC;   padding: 2px 10px;">
                                <div class="col-sm-1" style=" " align="center">                                       
                                    <i class="fa fa-envelope" style=" font-size: 12px; margin-top: 20px;"></i> 
                                </div>
                                <div class="col-sm-10">
                                    <b>                                   
                                        <p id="msg_cnt<?php echo e($msg->id); ?>" class="comment-content" style=" overflow: hidden;">
                                            <?php echo substr($msg->message, 0, 100).' .....'; ?>

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
    </div>

</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/oldmsg.blade.php ENDPATH**/ ?>