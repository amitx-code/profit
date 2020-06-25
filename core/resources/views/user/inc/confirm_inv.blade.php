<div id="popInvest" class="container pop_invest_cont" >
  <div class="row wd_row_pad" >
    <div class="col-md-4">&emps;</div>
    <div class="col-md-4 card pop_invest_col" align="center">      
      <div class="card-header" style="">
        <h3><b> {{ __('mess.Initiate_Investment') }}</b></h3>
        <h5> {{ __('mess.Wallet_Balance') }}: {{$settings->currency}} <span id="WalletBal"></span></h5>
        <hr>
      </div>
      <div class="pop_msg_contnt">              
        <p align="center" class="color_blue_b">
             {{ __('mess.You_are_about_to_invest_in') }} <b><span id="pack_inv"></span></b> {{ __('mess.package_which_takes_a_period_of') }}  <b><span id="period"></span></b> {{ __('mess.working_days_and_comes_with') }}  <b><span id="intr"></span></b>%  {{ __('mess.interest_daily') }}.
        </p>
        <form id="userpackinv" action="/user/invest/packages" method="post">
            <div class="form-group" align="left">
              <div class="pop_form_min_max" align="center">
                <b> {{ __('mess.Min_Capital') }}: {{$settings->currency}} <span id="min"></span></b> |
                <b> {{ __('mess.Max_Capital') }}: {{$settings->currency}} <span id="max"></span></b>
              </div> 
              <br>                   
              <label> {{ __('mess.Enter_Amount_to_Invest') }}</label>
              <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
              <input id="p_id" type="hidden" class="form-control" name="p_id" value="">
              <input type="text" class="form-control" name="capital" placeholder="{{ __('mess.Enter_capital_to_invest') }}" required>
            </div>
            <div class="form-group">
                <button class="collb btn btn-info"> {{ __('mess.Proceed') }}</button>
                <span style="">            
                  <a id="popMsg_close_user" href="javascript:void(0)" class="btn btn-danger"> {{ __('mess.Cancel') }}</a>
                </span>
                <br><br>
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
</div>