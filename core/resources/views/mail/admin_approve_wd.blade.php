<?php
    $st = App\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title> {{ __('mail.Withdrawal_Approval') }}</title>
	<link rel="stylesheet" href="https://wallet.diamondhubplus.com/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="">
        		<img src="https://{{env('MAIL_SENDER')}}/img/{{$st->site_logo}}" style="height:100px; width:100px;" align="center">
        	</div>
        	<h3 align="">{{ __('mail.Withdrawal_Approval') }}</h3>
        	<p>
				{{ __('mail.Hi') }}, {{ __('mail.this_is_to_notify_you_that_your_withdrawal_request_with_ID') }}: <b>{{$md['wd_id']}} on {{env('APP_URL')}} </b> {{ __('mail.has_been_approved') }}. <br>
				{{ __('mail.Kindly_wait_patiently_for_deposit_into_your_account') }}.<br>
        	   <b>{{ __('mail.Account') }}: {{$md['act']}}</b><br>
        	   <b>{{ __('mail.Amount') }}: {{$md['currency']}}{{$md['amt']}}</b>
        	</p>
        	<p>
				<i class="fa fa-certificate">{{$st->site_title}}  {{ __('mail.Investment') }}.</i>
        	</p>
        </div>
    </div>
	
</body>
</html>