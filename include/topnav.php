<?php 
    
?>
<header id="topnav">
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        
                        <li class="dropdown notification-list">

                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo $user->fullName; ?><i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="change-password.php" class="dropdown-item notify-item">
                                    <i class="dripicons-user"></i> <span>Change Password</span>
                                </a>
                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="dripicons-power"></i> <span>Logout</span>
                                </a>
    
                            </div>
                        </li>
                        
                    </ul>
    
                    <ul class="list-unstyled menu-left mb-0">
                        <li class="float-left">
                            <a href="dashboard.php" class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="assets/images/speed2.png" alt="" height="50">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/speed2.png" alt="" height="20">
                                </span>
                            </a>
                        </li>
                        <li class="float-left">
                            <a class="button-menu-mobile open-left navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li class="app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit" class="sr-only"></button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- end navbar-custom -->
            </header>