<?php
    $st = App\site_settings::find(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Withdrawal Notification</title>
	<link rel="stylesheet" href="https://wallet.diamondhubplus.com/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="border:1px solid #CCC; padding:4%; box-shadow:2px 2px 4px 4px #CCC;">
            <div align="">
        		<img src="http://<?php echo e(env('MAIL_SENDER')); ?>/img/<?php echo e($st->site_logo); ?>" style="height:100px; width:100px;" align="center">
        	</div>
        	<h3 align="">Withdrawal Notification</h3>
        	<p>
        	   Hi, this is to notify you that <b><?php echo e($md['username']); ?></b> has made a withdrawal request on wallet.diamondhubplus.com.
        	   <br>
        	   Kindly attend to this withdrawal request.
        	</p>
        	<p>
        		<i class="fa fa-certificate"><?php echo e($st->site_title); ?> Investment.
        	</p>
        </div>
    </div>
	
</body>
</html><?php /**PATH /home/superloc/mcode.me/maxprofit.mcode.me/core/resources/views/mail/wd_notification.blade.php ENDPATH**/ ?>