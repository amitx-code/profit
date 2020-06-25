<div class="header-top-area ">
    <div class="fixed-header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="admin-logo logo-wrap-pro">
                        <a href="/user/dashboard" style="color: #FFF;">
                            <img src="/img/logo.jpg" alt="DIAMONDHUBPLUS" style="height: 50px; width: 50px; z-index: 1; border-radius:50%;" />
                            DIAMONDHUBPLUS
                        </a>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                          
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                    <span class="indicator-nt"></span>
                                </a>
                                <div role="menu" class="notification-author dropdown-menu animated flipInX">
                                    <div class="notification-single-top">
                                        <h1>Notifications</h1>
                                    </div>
                                    <div>
                                        <ul class="notification-menu">
                                            <?php
                                                // $user = Auth::User();  
                                                $msgs = App\msg::orderby('id', 'desc')->get();
    
                                            ?>
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
                                                    <li>
                                                        <a id="<?php echo e($msg->id); ?>" href="javascript:void(0)" onclick="read(this.id, 'yes')">
                                                            <p class="comment-content" style=" overflow: hidden;">
                                                                <b><?php echo substr($msg->message, 0, 100); ?></b> ...
                                                            </p>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <?php if($user->img == ""): ?>
                                        <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                    <?php else: ?>
                                        <img class="adminpro-user-rounded header-riht-inf" src="/img/profile/<?php echo e($user->img); ?>" style="height: 20px; width: 20px; border-radius:50%; margin-top:-8px;" >
                                    <?php endif; ?>
                                    <span class="admin-name"><?php echo e($user->username); ?></span>
                                    <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                    <li><a href="/<?php echo e($user->username); ?>/dashboard"><span class="adminpro-icon adminpro-home-admin author-log-ic"></span>Dashboard</a>
                                    </li>
                                    <li><a href="/<?php echo e($user->username); ?>/profile"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
                                    </li>
                                    <li><a href="/<?php echo e($user->username); ?>/wallet"><span class="adminpro-icon adminpro-money author-log-ic"></span>My Wallet</a>
                                    <li><a href="/<?php echo e($user->username); ?>/send_money"><span class="adminpro-icon adminpro-money author-log-ic"></span>Send Fund</a>
                                    <li><a href="/<?php echo e($user->username); ?>/investments"><span class="adminpro-icon adminpro-money author-log-ic"></span>My Investments</a>
                                    </li>
                                    <li><a href="/<?php echo e($user->username); ?>/xpack"><span class="adminpro-icon adminpro-money author-log-ic"></span>Xmas Package <span class="indicator-right-menu mini-dn"><i style="color:#FF9800; font-size:9px;"><b>closed</b></i></span></a>
                                    </li>
                                    <li><a href="/<?php echo e($user->username); ?>/withdrawal"><span class="adminpro-icon adminpro-money author-log-ic"></span>Withdrawal</a>
                                    </li>
                                    <li><a href="/<?php echo e($user->username); ?>/downlines"><span class="adminpro-icon adminpro-settings author-log-ic"></span>My Downlines</a>
                                    </li>
                                    <li><a href="/logout"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <!-- <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span> -->
                                    <span class="admin-name">&emsp; &emsp;</span>
                                    <!-- <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span> -->
                                </a>
                                
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\dh\core\resources\views/inc/headbar.blade.php ENDPATH**/ ?>