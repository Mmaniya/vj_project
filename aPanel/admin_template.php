<?php 
define('ABSPATH',  dirname(__DIR__, 1));
require ABSPATH . "/includes.php";

if ($_SESSION['useremail'] == '' || $_SESSION['username'] == '') {
    header('location: index.php');
    exit();

}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <?php include 'admin_style.php';?>
</head>

<body>
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a href="<?php ADMIN_URL ?>dashboard.php">          
                                <h4>ADMIN PANEL</h4>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="javascript:void(0);" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">    
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span><?php echo $_SESSION['username'] ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?php echo ADMIN_URL ?>/logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>


                            <ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
                                <li class="active">
                                    <a href="<?php echo ADMIN_URL ?>dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                    <span class="pcoded-mtext">Users</span>
                                    <span class="pcoded-badge label label-warning">NEW</span>
                                    </a>

                                    <!-- <a href="<?php echo ADMIN_URL ?>users.php">
                                        <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                                        <span class="pcoded-mtext">Users</span>
                                    </a> -->
                                    <ul class="pcoded-submenu">
                                    
                                        <li class="">
                                            <a href="<?php echo ADMIN_URL ?>pending_users.php">
                                            <span class="pcoded-mtext">Pending Users</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo ADMIN_URL ?>active_users.php">
                                            <span class="pcoded-mtext">Active Users</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo ADMIN_URL ?>closed_users.php">
                                            <span class="pcoded-mtext">Closed Users</span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="<?php echo ADMIN_URL ?>users.php">
                                            <span class="pcoded-mtext">Total Users</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                           
                            </ul>
                           
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <?php main();?>
                                    </div>
                                </div>
                                <div id="styleSelector" style="display:none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'admin_script.php';?>
    <div class="preloader" style="display:none;">
        <div id="loader"></div>
    </div>
</body>

</html>