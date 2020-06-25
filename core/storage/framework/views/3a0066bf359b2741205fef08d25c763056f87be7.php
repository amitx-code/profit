<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-hd">
        <div class="main-sparkline9-hd">
            <h1>Add Admin User</h1>            
        </div>
    </div>
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <form action="/admin/addNew/admin" method="post">
              <input id="token" type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
              
              <div class="input-group">
                  <span class="input-group-addon span_bg" ><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="Name" placeholder="Enter staff name" required>
              </div>
              <br>
              <div class="input-group">                
                  <span class="input-group-addon span_bg"><i class="fa fa-envelope"></i></span>
                  <input id="" type="email" class="form-control" name="email" placeholder="Enter user email address" required>
              </div>
              <br>
              <div class="input-group">                
                  <span class="input-group-addon span_bg"><i class="fa fa-key"></i></span>
                  <input id="" type="password" class="form-control" name="pwd" placeholder="Enter password" required>
              </div>
              <br>
              <div class="input-group">
                  <span class="input-group-addon span_bg"><i class="fa fa-dashboard"></i></span>                  
                  <select name="role" class="form-control" required>
                      <option selected disabled="">Select role</option>
                      <option value="1">Support</option>
                      <option value="2">Manager</option>
                      <option value="3">Admin</option>
                  </select>
              </div>
              <br>
              
              <div class="form-group">
                <br>
                  <button class="collb btn btn-info">Add</button>
                  <br>
              </div>
              
            </form>
        </div>
    </div>
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/addNewAdmin.blade.php ENDPATH**/ ?>