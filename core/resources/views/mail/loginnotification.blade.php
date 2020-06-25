<?php
    $st = App\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>{{ __('mail.Login_Notification') }}</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div align="">
		<img src="http://{{env('MAIL_SENDER')}}/img/{{$st->site_logo}}" style="height:100px; width:100px;" align="center">
	</div>
	<h3 align=""> {{ __('mail.Hi') }} {{$md['username']}}</h3>
	<p>
		{{ __('mail.This_is_to_notify_you_that_there_is_a_login_into_your_account_a_moment_ago') }}.<br>
		{{ __('mail.If_you_were_not_the_one_please_contact_support_now_for_a_quick_action') }}.<br>
		<br>
		{{ __('mail.Contact_support_now') }}: support{{'@'.env('MAIL_SENDER')}}
	</p>
	<p>
		<i class="fa fa-certificate"></i> {{ __('mail.Thanks_for_using') }} {{$st->site_title}}.
	</p>
</body>
</html>