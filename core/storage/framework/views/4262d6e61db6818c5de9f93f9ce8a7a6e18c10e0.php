<div class="left-sidebar-pro">
    <nav id="sidebar">
        <div class="sidebar-header" style="position: relative; background-image: url('/img/user-info.jpg'); height: 120px;">                    
            <div style="position: absolute; height: 100%; width: 100%; left: 0; top:0; z-index: 1; background-color: rgba(20,20,20, .5);">
                <br>
                <a href="/user/dashboard">
                    <img src="/img/logo.jpg" alt="DIAMONDHUBPLUS" style="height: 50px; width: 50px; z-index: 1;" />
                </a>
                <h4 style="color: #FFF; z-index: 1;">DiamondHubPlus</h4>
                <!-- <span  style="color: #07b; margin-top: -55px;">Power to do more</span> -->
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap">
            <ul class="nav navbar-nav left-sidebar-menu-pro">
                <li class="nav-item">
                    <a href="/<?php echo e($user->username); ?>/dashboard" data-toggle="" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                            
                </li>

                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/profile"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-user"></i> <span class="mini-dn">My Profile</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                   
                </li>

                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/wallet"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-money"></i> <span class="mini-dn">Load Wallet</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                   
                </li>
                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/send_money"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-money"></i> <span class="mini-dn">Send Fund</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                   
                </li>

                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/investments"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">Investments</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                    
                </li>
                
                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/xpack"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">Xmas Package</span> <span class="indicator-right-menu mini-dn"><i style="color:red; font-size:9px;"><b>closed</b></i></span></a>                    
                </li>

                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/withdrawal"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-money"></i> <span class="mini-dn">Withdrawal</span></a>
                
                </li>
                
                <li class="nav-item"><a href="/<?php echo e($user->username); ?>/downlines"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users"></i> <span class="mini-dn">My Downlines</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                    
                </li>
                
                <li class="nav-item"><a href="/logout"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-table"></i> <span class="mini-dn">Logout</span> <!-- <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span> --></a>                    
                </li>
                <!-- <li class="nav-item"><a href="#"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Forms Elements</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown form-left-menu-std animated flipInX">
                        <a href="basic-form-element.html" class="dropdown-item">Basic Elements</a>
                        <a href="advance-form-element.html" class="dropdown-item">Advance Elements</a>
                        <a href="password-meter.html" class="dropdown-item">Password Meter</a>
                        <a href="multi-upload.html" class="dropdown-item">Multi Upload</a>
                        <a href="tinymc.html" class="dropdown-item">Text Editor</a>
                        <a href="dual-list-box.html" class="dropdown-item">Dual List Box</a>
                    </div>
                </li>
                <li class="nav-item"><a href="#"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-desktop"></i> <span class="mini-dn">App views</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown apps-left-menu-std animated flipInX">
                        <a href="notifications.html" class="dropdown-item">Notifications</a>
                        <a href="alerts.html" class="dropdown-item">Alerts</a>
                        <a href="modals.html" class="dropdown-item">Modals</a>
                        <a href="buttons.html" class="dropdown-item">Buttons</a>
                        <a href="tabs.html" class="dropdown-item">Tabs</a>
                        <a href="accordion.html" class="dropdown-item">Accordion</a>
                        <a href="tab-menus.html" class="dropdown-item">Tab Menus</a>
                    </div>
                </li>
                <li class="nav-item"><a href="#"  role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-files-o"></i> <span class="mini-dn">Pages</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown pages-left-menu-std animated flipInX">
                        <a href="login.html" class="dropdown-item">Login</a>
                        <a href="register.html" class="dropdown-item">Register</a>
                        <a href="captcha.html" class="dropdown-item">Captcha</a>
                        <a href="checkout.html" class="dropdown-item">Checkout</a>
                        <a href="contact.html" class="dropdown-item">Contacts</a>
                        <a href="review.html" class="dropdown-item">Review</a>
                        <a href="order.html" class="dropdown-item">Order</a>
                        <a href="comment.html" class="dropdown-item">Comment</a>
                    </div>
                </li> -->
            </ul>
        </div>


        



    </nav>
</div><?php /**PATH C:\wamp64\www\dh\core\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>