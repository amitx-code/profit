<?php
    $st = App\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>{{ __('mail.Withdrawal_Notification') }}</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="">
        		<img src="http://{{env('MAIL_SENDER')}}/img/{{$st->site_logo}}" style="height:100px; width:100px;" align="center">
        	</div>
        	<h3 align="">{{ __('mail.Withdrawal_Notification') }}</h3>
        	<p>
				{{ __('mail.Hi_this_is_to_notify_you_that') }}<b>{{$md['username']}}</b>{{ __('mail.has_made_a_withdrawal_request_on') }} {{env('APP_URL')}}
        	   <br>
				{{ __('mail.Kindly_attend_to_this_withdrawal_request') }}.
        	</p>
        	<p>
				<i class="fa fa-certificate">{{$st->site_title}} {{ __('mail.Investment') }}.</i>
        	</p>
        </div>
    </div>
	
</body>
</html>