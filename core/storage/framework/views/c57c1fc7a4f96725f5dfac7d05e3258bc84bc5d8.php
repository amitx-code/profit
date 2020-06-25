<?php
    $acts = App\adminLog::orderby('id', 'desc')->paginate(100);
?>
                    
<div class="sparkline9-list shadow-reset mg-tb-30">    
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-12" align="">
                   <form action="/admin/send/notification" method="post">
                        <div class="form-group">
                          <label><?php echo e(__('Title')); ?></label>
                          <input id="subject" type="text" class="form-control" name="subject" required>                         
                        </div>
                        <div class="form-group">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           <label><?php echo e(__('Your message')); ?></label>
                           <textarea id="textmsg2" name="msg" class="form-control" required rows="15"></textarea>
                        </div>
                       <div class="form-group" align="center">
                          <br>
                           <button class="btn btn-info fa fa-paper-plane"> <?php echo e(__('Send Message')); ?></button>
                       </div>
                   </form>
                </div>
               
            </div>           
        </div>
    </div>
</div><?php /**PATH C:\wamp\www\soft.local\core\resources\views/admin/temp/send_not.blade.php ENDPATH**/ ?>