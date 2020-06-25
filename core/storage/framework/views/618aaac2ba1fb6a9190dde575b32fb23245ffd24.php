<?php
    $acts = App\adminLog::orderby('id', 'desc')->paginate(100);
?>
                    
<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>Send Message</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-12" align="">
                   <form action="/admin/send/notification" method="post">
                       <div class="">
                           <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                           <textarea id="textmsg" name="msg" class="form-control" required rows="15"></textarea>
                       </div>
                       <div class="form-group" align="center">
                        <br>
                           <button class="collb btn btn-info fa fa-paper-plane"> Send Message</button>
                       </div>
                   </form>
                </div>
               
            </div>           
        </div>
    </div>
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/sendNot.blade.php ENDPATH**/ ?>