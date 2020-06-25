<div id="popInvest" class="container" style="min-width: 100%; background-color: rgba(0,0,0,.6); position: fixed; top: 0; left: 0; bottom: 0; width: 100%; z-index: 20; display: none;">
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>

      <div class="col-md-4" style="margin: 3% 6% 3% 1%; border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        
        <div class="panel-heading" style="">
          <h3><b>Initiate Investment</b></h3>
          <h4>Wallet Balance: <?php echo e($user->currency); ?> <span id="WalletBal"></span></h4>         
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
                
                <p align="left" style="color:#039;">
                    You are about to invest in <b><span id="pack_inv"></span></b> package which takes a period of <b><span id="period"></span></b> working days and comes with <b><span id="intr"></span></b>% interest daily.
                    <br><br>
                    <b>Minimum capital: <span id="min"></span> </b>
                    <br>
                    <b>Maximum capital: <span id="max"></span></b>
                </p>
                <form id="userpackinv" action="/user/invest/packages" method="post">
                    <div class="form-group" align="left">
                        <label>Enter amount to invest</label>
                        <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input id="p_id" type="hidden" class="form-control" name="p_id" value="">
                        <input type="text" class="form-control" name="capital" placeholder="Enter capital to invest" required>
                    </div>
                    <div class="form-group">
                        <button class="collb btn btn-info">Proceed</button>
                        <span style="">            
                          <a id="popMsg_close_user" href="javascript:void(0)" class="btn btn-danger">Cancel</a>        
                        </span>
                        <br>
                    </div>
                </form>
        
        </div>  
        <!-- close btn -->
        <script type="text/javascript">
          $('#popMsg_close_user').click( function(){
            $('#popInvest').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/confirm_inv.blade.php ENDPATH**/ ?>