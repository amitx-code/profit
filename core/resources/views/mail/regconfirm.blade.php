<?php
    $st = App\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>{{ __('mail.Registration_Confirmation') }}</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:5%; ">
            <div align="">
        		<img src="http://{{env('MAIL_SENDER')}}/img/{{$st->site_logo}}" style="height:100px; width:100px;" align="center">
        	</div>
        	<h3 align="">{{ __('mail.Hi') }} {{$md['usr']}}, </h3>
        	<p>
				{{ __('mail.Youve_taken_a_bold_step_for_registering_with_us_at') }} <a href="https://{{env('MAIL_SENDER')}}"><b>{{env('MAIL_SENDER')}}</b></a><br>
				{{ __('mail.To_complete_your_registration_and_begin_investing_with_us_please_click_the_link_below_to_activate_your_account') }}.<br>
        		<br>
        		<a class="btn btn-info" href="http://{{env('MAIL_SENDER')}}/registration/confirm/{{$md['usr']}}/{{$md['token']}}"><b>{{ __('mail.Confirm_Registration') }}</b></a>
        	</p>
        	<p>
        		<i class="fa fa-certificate"></i>{{ __('mail.Thanks_for_registering_at') }} {{env('MAIL_SENDER')}}.
        	</p>
        </div>
    </div>
	
</body>
</html>