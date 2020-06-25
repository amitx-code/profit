<div id="pay_with_bank_pop" class="container" style="display: none;">
  <div class="row" style="">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
      <br>
        <div class="form-group" align="left">
            <?php if($user->currency == "N"): ?>
             <p align="center">
              <br>
                <i class="fa fa-bank fa-4x" style="color: #1f2e86;"></i>
                <br>
                <font size="+1"><b>Paying With Bank</b></font>
            </p>
                 <p>
                Transfer/Deposit to the company's account below and upload you proof of payment by filling payment form.
            </p>
            <!--<p>-->
            <!--    <b>Bank: Polaris Bank</b> <br>-->
            <!--    Account Number: 4091046063<br>-->
            <!--    Account Name: Neu Diamondhub Ventures<br>-->
            <!--</p>-->
             <p>
                <b>Bank: FCMB (First City Monument Bank)</b> <br>
                Account Number: 5529004017<br>
                Account Name: Neu Diamondhub Ventures<br>
            </p>
             <?php else: ?>
             <p align="center">
              <br>
                <i class="fa fa-bank fa-4x" style="color: #1f2e86;"></i>
                <br>
                <font size="+1"><b>Paying With Bank</b></font>
            </p>
                 <p>
                Transfer/Deposit to the company's dollar account below and upload you proof of payment by filling payment form.
            </p>
            <p>
                <b>Bank: FCMB (First City Monument Bank)</b> <br>
                Account Number: 5529004024<br>
                Account Name: Neu Diamondhub Ventures<br>
            </p>
            </p>
            <?php endif; ?>
          </div>
    </div>


    <div class="col-sm-1" style="position: relative;">
        <td style="background-color: #CCC;  height: 90%; width: 1000px; position: absolute; ">&nbsp; </td>
    </div>


    <div class="col-md-4 paymentForm" style="" align="Center">                                          
      <div class="panel-heading" style="background-color: #1F2E86; color: #fff; padding-top:15px" align="left">
        <h4>Bank Payment Notification Form</h4>
      </div>
      <div id="" style="margin-top: 0px; padding: 15px" align="left">
          <form id="wd_formssss" action="/user/deposit/fund" method="post" enctype="multipart/form-data">
              <div class="form-group" align="left">                       
                  <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
              </div>                                                    

              <div class="input-group" style="margin-top: 10px;">
                <span class="input-group-addon span_bg" ><?php echo e($user->currency); ?></span>                        
                <input type="number" class="form-control" name="p_amt"  required placeholder="Enter amount you paid" >
              </div>

              <div class="input-group" style="margin-top: 10px;">
                <span class="input-group-addon span_bg " ><i class="fa fa-bank"></i></span>                        
                <input type="text" class="form-control" name="y_bank"  required placeholder="Bank name you paid from" >
              </div>

              <div class="input-group" style="margin-top: 10px;">
                <span class="input-group-addon span_bg" ><i class="fa fa-user"></i></span>                        
                <input type="text" class="form-control" name="act_name"  required placeholder="Name on the account" >
              </div>

              <div class="input-group" style="margin-top: 10px;">
                <span class="input-group-addon span_bg" ><i class="fa fa-hashtag"></i></span>                        
                <input type="text" class="form-control" name="act_no"  required placeholder="Account Number" >
              </div>

              <div class="input-group" style="margin-top: 10px;">
                <span class="input-group-addon span_bg " ><i class="fa fa-camera"></i></span>
                <input type="file" class="form-control" name="pop"  required style="padding: 0px; ">
              </div>

                            
              <div class="form-group" align="center">
                <br><br>
                  <button class="btn btn-info" style="background-color: #1f2e86; width: 40%; ">Submit</button>
                  <span style="">            
                    <a id="pay_with_bank_close" href="javascript:void(0)" class="btn btn-danger" style="width: 40%;">Cancel</a>        
                  </span>
                  <br>
              </div>
          </form>
      </div>  

      <!-- close btn -->
      <script type="text/javascript">
        $('#pay_with_bank_close').click( function(){
          $('#pay_with_bank_pop').hide();
          $('#pay_with_card_pop').hide();
          $('#pay_with_btc_pop').hide();
          $('#pay_cont').fadeIn(1000);
        });        
      </script>
      <!-- end close btn -->

    </div>

  </div>
</div>
<?php
  $pay_ref = $user->username.time();
  Session::put('pay_ref', $pay_ref);
?>
<div id="pay_with_card_pop" class="container" style="display: none;">
  <div class="row" style="">
    <div class="col-sm-1"></div>
    <div class="col-sm-3">
      <br>
        <div class="form-group" align="left">
            <p align="center">
              <br>
                <i class="fa fa-credit-card-alt fa-4x" style="color: #1f2e86;"></i>
                <br>
                <font size="+1"><b>Paying With Card</b></font>
            </p>
            <p style="color: red; font-weight: bold;" align="justify">
                Paying with Credit/Debit card.<br>
                Please Note the maximum amount payment per transaction is limited to N500,000. You can make multiple deposits if you want to deposit more.
            </p>
          </div>
    </div>
    <div class="col-sm-1" style="position: relative;">
        <td style="background-color: #CCC;  height: 90%; width: 1000px; position: absolute; ">&nbsp; </td>
    </div>

    <div class="col-md-5 paymentForm" style="" align="Center">                                          
      <div class="panel-heading" style=" color: #1F2E86; " align="left">
        <h3 align="center"><b>Deposit With Card</b></h3>
        <hr>
      </div>
      <div id="" style="margin-top: 0px; padding: 15px" align="left">
          <form id="car_pay_form" action="https://wallet.diamondhubplus.com/flutter/processPayment.php" method="post" target="_blank" >
              <div class="form-group" align="left">                       
                  <input type="hidden" class="form-control" name="_token" value="<?php echo e(csrf_token()); ?>">
              </div>                                                    
              <div class="row">
                <center><label>Enter Amount to Deposit</label></center>
                  <div class="col-sm-12 form-group" style="margin-top: 10px;" >
                    <center>
                      <label>Amount(<?php echo e($user->currency); ?>)</label>   <br>                     
                      <input id="payAmt" type="number" class="regTxtBox" style="width: 60%; text-align: center;" align="center" name="amount"  required placeholder="Enter amount you want to pay" >
                    </center>
                  </div>
              </div>
              <input type="hidden" name="logo" value="https://diamondhubplus.com/dhp.png"  required >
              <input type="hidden" name="payment_options" value="CardPayment"  required >
              <input type="hidden" name="description" value="Deposit@DHP"  required >
              <input type="hidden" name="title" value="DHP-Investment" />
              <input type="hidden" name="usr" value="<?php echo e($user->username); ?>" />
              <input type="hidden" name="country" value="<?php if($user->currency == 'N'): ?><?php echo e('NG'); ?><?php elseif($user->currency == '$'): ?><?php echo e('US'); ?><?php endif; ?>" />
              <input type="hidden" name="currency" value="<?php if($user->currency == 'N'): ?><?php echo e('NGN'); ?><?php elseif($user->currency == '$'): ?><?php echo e('USD'); ?><?php endif; ?>" />
              <input type="hidden" name="email" value="<?php echo e($user->email); ?>" />
              <input type="hidden" name="firstname" value="<?php echo e($user->firstname); ?>" />
              <input type="hidden" name="lastname"value="<?php echo e($user->lastname); ?>" />
              <input type="hidden" name="phonenumber" value="<?php echo e($user->phone); ?>" />
              <input type="hidden" name="pay_button_text" value="Proceed" />
              <input type="hidden" name="ref" value="<?php echo e($pay_ref); ?>" />
              <input type="hidden" name="publicKey" value="FLWPUBK-759bc26f7ec104c75bcd5b798fe93583-X"> <!-- Put your public key here -->
              <input type="hidden" name="secretKey" value="FLWSECK-69c541d1fc2810dd60d0ff4be57c5c55-X"> <!-- Put your secret key here -->
              <input id="successurl" type="hidden" name="successurl" value="https://wallet.diamondhubplus.com/user/payment/successful"> 
              <input type="hidden" name="failureurl" value="https://wallet.diamondhubplus.com/user/payment/failed"> 

              <div class="form-group" align="center">
                <br><br>
                  <button class="btn btn-info" style="background-color: #1f2e86; width: 40%; ">Proceed</button>
                  <span style="">            
                    <a id="pay_with_card_close" href="javascript:void(0)" class="btn btn-danger" style="width: 40%;">Cancel</a>        
                  </span>
                  <br>
              </div>
          </form>
         
      </div>  

      <!-- close btn -->
      <script type="text/javascript">
        $('#pay_with_card_close').click( function(){
          $('#pay_with_bank_pop').hide();
          $('#pay_with_card_pop').hide();
          $('#pay_with_btc_pop').hide();
          $('#pay_cont').fadeIn(1000);
        });        
      </script>
      <!-- end close btn -->

    </div>

  </div>
</div>

<div id="pay_with_btc_pop" class="container" style="display: none;">
  <div class="row" style="">
    <div class="col-sm-1"></div>
    <div class="col-sm-3">
      <br>
        <div class="form-group" align="left">
            <p align="center">
              <br>
                <i class="fa fa-bitcoin fa-4x" style="color: #1f2e86;"></i>
                <br>
                <font size="+1"><b>Paying With BTC</b></font>
            </p>
            <p style="font-weight: bold;" align="justify">
                Paying with Bictoin.<br>
                Please Note: You are required to send the exact <em style="color: red;">value worth of BTC</em> and not the USD value you entered.
            </p>
          </div>
    </div>
    <div class="col-sm-1" style="position: relative;">
        <td style="background-color: #CCC;  height: 90%; width: 1000px; position: absolute; ">&nbsp; </td>
    </div>

    <div class="col-md-5 paymentForm" style="" align="Center">                                          
      <div class="panel-heading" style=" color: #1F2E86; " align="left">
        <h3 align="center"><b>Deposit With BTC</b></h3>
        <hr>
      </div>
      <div id="" style="margin-top: 0px; padding: 15px" align="left">
          <form action="https://wallet.diamondhubplus.com/btcpay/pay_with_btc.php" method="POST" >
              <div class="row">
                <center><label>Enter Amount to Deposit</label></center>
                  <div class="col-sm-12 form-group" style="margin-top: 10px;" >
                    <center>
                      <label>Amount in USD($)</label>   <br>                     
                      <input type="number" class="regTxtBox" style="width: 60%; text-align: center;" align="center" name="amt"  required placeholder="Enter amount you want to pay" >
                      <input type="hidden" class=""  name="txref" value="<?php echo e($pay_ref); ?>"  required >
                      <input type="hidden" class=""  name="usn" value="<?php echo e($user->username); ?>"  required >
                      <input type="hidden" class=""  name="cur" value="<?php echo e($user->currency); ?>"  required >
                    </center>
                  </div>
              </div>
              
              <input id="" type="hidden" name="ref" value="ref">

              <div class="form-group" align="center">
                <br><br>
                  <button class="btn btn-info" style="background-color: #1f2e86; width: 40%; ">Proceed</button>
                  <span style="">            
                    <a id="pay_with_btc_close" href="javascript:void(0)" class="btn btn-danger" style="width: 40%;">Cancel</a>        
                  </span>
                  <br>
              </div>
          </form>
         
      </div>  

      <!-- close btn -->
      <script type="text/javascript">
        $('#pay_with_btc_close').click( function(){
          $('#pay_with_bank_pop').hide();
          $('#pay_with_card_pop').hide();
          $('#pay_with_btc_pop').hide();
          $('#pay_cont').fadeIn(1000);
        });        
      </script>
      <!-- end close btn -->

    </div>

  </div>
</div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/paymentforms.blade.php ENDPATH**/ ?>