<div id="div_withdrawal" class="container popmsgContainer" >
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>

      <div class="col-md-4 popmsg-mobile" style=" border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        
        <div class="panel-heading" style="">
          <h3>Withdrawal</h3>
          <h3>Total Earning: <?php echo e($user->currency); ?> <span id="earned"></span></h3>         
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
                
                <p align="left" style="">
                    Amount Withdrawable<span id="days" style="float: right; color:red;"></span>
                    <br>
                </p>
                <form id="wd_formssss" action="/user/wdraw/earning" method="post">
                    <div class="form-group" align="left">                       
                        <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input id="pack_type" type="hidden" class="form-control" name="pack_type" value="">
                        <input id="inv_id" type="hidden" class="form-control" name="p_id" value="">
                        <input id="ended" type="hidden" class="form-control" name="ended" value="">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon" ><?php echo e($user->currency); ?></span>                        
                      <input id="in_wd_amt" type="text" class="form-control" name="amt" readonly required value="" style="background-color: #FFF;" >
                    </div>
                    <div class="form-group">
                      <br><br>
                        <button class="btn btn-info">Withdraw</button>
                        <span style="">            
                          <a id="div_withdrawal_close" href="javascript:void(0)" class="btn btn-danger">Cancel</a>        
                        </span>
                        <br>
                    </div>
                </form>
        </div>  
        <!-- close btn -->
        <script type="text/javascript">
          $('#div_withdrawal_close').click( function(){
            $('#div_withdrawal').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/withdrawal.blade.php ENDPATH**/ ?>