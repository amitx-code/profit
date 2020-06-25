<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo e($settings->site_title); ?> - <?php echo e($settings->site_descr); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/img/<?php echo e($settings->site_logo); ?>" />
	<!-- Fonts and icons -->
	<script src="/atlantis/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/atlantis/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/atlantis/css/bootstrap.min.css">
	<link rel="stylesheet" href="/atlantis/css/atlantis.min.css">
	<link rel="stylesheet" href="/atlantis/style.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="/atlantis/css/demo.css">
	<!-- jquery lib -->
	<script src="/atlantis/js/core/jquery.3.2.1.min.js"></script>

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" style="background-color: <?php echo e($settings->header_color); ?>">				
				<a href="/user/dashboard" class="text-white">
                    <img src="/img/<?php echo e($settings->site_logo); ?>" alt="<?php echo e($settings->site_title); ?>" class="header_logo" align="center"/>
                     <span id="title_collapse font_20" > <?php echo e($settings->site_title); ?></span> 
                </a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu text-white"></i>
					</span>
				</button>
				<button class="topbar-toggler more text-white"><i class="icon-options-vertical text-white"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar" onclick="title_collapse()">
					    &emsp; <i class="icon-menu text-white"></i>
					</button>
				</div>
				<script type="text/javascript">
					function title_collapse()
					{
						$("#title_collapse").toggle();
					}
				</script>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color: <?php echo e($settings->header_color); ?>">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">							
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php                                  
	                                $msgs = App\msg::orderby('id', 'desc')->take(5)->get();
	                            ?>								
								<i class="fa fa-bell not_cont text-white">
									<?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                            $rd = 0;
                                            $str = explode(';', $msg->readers);                                           
                                            if(!in_array($user->id, $str))
                                            {
                                                $rd = 1;
                                            }                                            
                                        ?>
                                        <?php if($rd == 1): ?>   
                                        	<i class="fa fa-circle new_not"></i>
                                        <?php else: ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
								</i> <span class="text-white">Notifications </span><i class="fa fa-chevron-down text-white"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">	
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">											
                                            <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <?php 
                                                    $rd = 0;
                                                    $str = explode(';', $msg->readers);                                           
                                                    if(in_array($user->id, $str))
                                                    {
                                                        $rd = 1;
                                                    }
                                                    
                                                ?>
                                                <?php if($rd == 1): ?>   
                                                
                                                <?php else: ?>
                                                    
                                                    <a id="<?php echo e($msg->id); ?>" href="/notification/<?php echo e($msg->id); ?>" >
														<div class="notif-img"> 
															<i class="fa fa-bell fa-2x"></i>
														</div>
														<div class="notif-content " >
															<span class="subject"></span>
															<span class="block">
																<?php echo e($msg->subject); ?>

															</span>
															<span class="time"><?php echo e($msg->created_at); ?> ...</span> 
														</div>
													</a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>										
									</div>
									<div class="dropdown-divider"></div>
									<div align="center">
										<a href="/notifications"> &nbsp;View all</a>
										<br><br>
									</div>
								</li>
								
							</ul>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<?php if($user->img != ''): ?>
										<img src="/img/profile/<?php echo e($user->img); ?>" alt="..." class="avatar-img rounded-circle">
									<?php else: ?>
										<img src="/img/any.png" alt="image profile" class="avatar-img rounded-circle" style="">
									<?php endif; ?>	
								</div>								
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
												<?php if($user->img != ''): ?>
													<img src="/img/profile/<?php echo e($user->img); ?>" alt="..." class="avatar-img rounded-circle">
												<?php else: ?>
													<img src="/img/any.png" alt="image profile" class="avatar-img rounded" style="">
												<?php endif; ?>	
											</div>
											<a href="/<?php echo e($user->username); ?>/profile">
												<div class="u-text">
													<h4>Hi <?php echo e($user->username); ?></h4>
													<p class="text-muted"><?php echo e($user->email); ?></p>
												</div>
											</a>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>										
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/dashboard"><span class="fa fa-desktop"></span> &nbsp;Dashboard</a>
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/wallet"><span class="fa fa-folder"></span>&nbsp; My Wallet</a>
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/send_money"><span class="fa fa-paper-plane"></span>&nbsp; Transfer Fund</a>
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/investments"><span class="fa fa-wallet"></span>&nbsp; My Investments</a>
										<!-- <a class="dropdown-item" href="/<?php echo e($user->username); ?>/xpack"><span class="fa fa-file"></span>&nbsp; Xmas Pack <span class="indicator-right-menu mini-dn"><i style="color:#FF9800; font-size:9px;"><b>closed</b></i></span></a> -->
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/withdrawal"><span class="fa fa-download"></span>&nbsp; Withdrawal</a>
										<a class="dropdown-item" href="/<?php echo e($user->username); ?>/downlines"><span class="fa fa-users"></span>&nbsp; Downlines</a>
										
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logout"><span class="fa fa-arrow-right"></span> &nbsp;Logout</a>

									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<?php if($user->img != ''): ?>
								<img src="/img/profile/<?php echo e($user->img); ?>" alt="..." class="avatar-img rounded-circle" >
							<?php else: ?>
								<img src="/img/any.png" alt="image profile" class="avatar-img rounded" >
							<?php endif; ?>	
						</div>
						<div class="info">
							<a data-toggle="collapse" href="/<?php echo e($user->username); ?>/profile" aria-expanded="true">
								<span>
									<?php echo e(ucfirst($user->username)); ?>

									<span class="user-level"><?php echo e($user->email); ?></span>									
								</span>
							</a>
							<div class="clearfix"></div>							
						</div>
					</div>
					<ul class="nav nav-primary">
						
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/dashboard">
								<i class="fas fa-layer-group"></i>
								<p>Dashboard</p>								
							</a>							
						</li>
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/profile">
								<i class="fas fa-user"></i>
								<p>My Profile</p>								
							</a>							
						</li>
						<li class="nav-item">
							<a  href="/<?php echo e($user->username); ?>/wallet">
								<i class="fas fa-wallet"></i>
								<p>Wallet</p>
							</a>							
						</li>
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/send_money">
								<i class="fas fa-paper-plane"></i>
								<p>Transfer Fund</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/investments">
								<i class="fas fa-folder"></i>
								<p>My Investments</p>
							</a>							
						</li>
						
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/withdrawal">
								<i class="fas fa-download"></i>
								<p>Withdrawal</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="/<?php echo e($user->username); ?>/downlines">
								<i class="fas fa-users"></i>
								<p>Downlines</p>
							</a>							
						</li>
						<li class="nav-item">
							<a href="/logout">
								<i class="fas fa-arrow-right"></i>
								<p>Logout</p>
							</a>							
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar --><?php /**PATH C:\wamp64\www\dh\core\resources\views/layouts/atlantis/header.blade.php ENDPATH**/ ?>