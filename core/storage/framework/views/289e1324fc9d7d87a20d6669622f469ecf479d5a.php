<!DOCTYPE html>
<html>
<head>
	<title>Registration Confirmation</title>
	<!--<link rel="stylesheet" href="https://wallet.diamondhubplus.com/css/bootstrap.min.css">-->
	<!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >-->
	<style>
	    @import  url("https://wallet.diamondhubplus.com/css/bootstrap.min.css");
	</style>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div
        <div class="col-sm-4" style="border:1px solid #CCC; padding:5%; ">
            <div align="">
        		<img src="https://diamondhubplus.com/dhp.png" style="height:100px; width:100px;" align="center">
        	</div>
        	<h3 align="">Hi <?php echo e($md['usr']); ?>, </h3>
        	<p>
        	    You've taken a bold step for registering with us at <a href="https://www.diamondhubplus.com"><b>Diamond Hub Plus</b></a><br>
        		To complete your registration and begin investing with us, please click the link below to activate your account.<br>
        		<br>
        		<a class="btn btn-info" href="https://wallet.diamondhubplus.com/registration/confirm/<?php echo e($md['usr']); ?>/<?php echo e($md['token']); ?>"><b>Confirm Registration</b></a>
        	</p>
        	<p>
        		<i class="fa fa-certificate"></i>Thanks for using DiamondHubPlus Investment.
        	</p>
        </div
    </div>
	
</body>
</html><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/mail/regconfirm.blade.php ENDPATH**/ ?>