<?php 
require "includes.php";
if ($_SESSION['userid'] == '') {
    echo '<script>window.location.href = "myaccount.php"</script>';
}else{
    $getUserDtls = MainClass::findUserByUserid($_SESSION['userid']);
    $getchildDtls = MainClass::get_multi_user_id_by_group($getUserDtls->id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>My Profile</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="assets/css/font-awesome-all.css" rel="stylesheet">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/owl.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/rtl.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body class="boxed_wrapper ltr">

    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>


    <!-- main header -->
    <header class="main-header style-four">
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index.php"><img src="assets/images/logo-4.png" alt=""></a></figure>
                    </div>
                    <div class="menu-area pull-right clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown"><a href="index.php">Home</a> </li> 
                                    <li class="dropdown"><a href="about.php">About</a></li>
                                    <li class="dropdown"><a href="service.php">Services</a></li>
                                    <li class="dropdown"><a href="blog.php">Blog</a></li>                              
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="menu-right-content clearfix">
                            <div class="btn-box">
                                <a href="myaccount.php" class="theme-btn">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="outer-box clearfix">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index-2.html"><img src="assets/images/small-logo-4.png" alt=""></a></figure>
                    </div>
                    <div class="menu-area pull-right">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->


    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><a href="index-2.html"><img src="assets/images/mobile-logo.png" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="index-2.html"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="index-2.html"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="index-2.html"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="index-2.html"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="index-2.html"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->


    <!--Page Title-->
    <section class="page-title centred" style="background-image: url(assets/images/background/page-title-3.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Wlcome <?= $_SESSION['name']; ?></h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>My Profile</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!-- fun-fact -->
    <section class="fun-fact centred">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 counter-column">
                    <div class="counter-block-one wow slideInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="1500" data-stop="<?= $getUserDtls->amount_credited; ?>">₹0</span>
                        </div>
                        <h4 style="color:#fff">My earning amount till date</h4>
                    </div>
                </div>                             
            </div>
        </div>
    </section>
    <!-- fun-fact end -->

    <!-- pricing-section -->
    <section class="pricing-section service-page-2">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>We make it happen</h5>
                <h2>Our Pricing Plans</h2>
                <p>Tempor incididunt ut labore et dolore magna aliquat enim veniam quis nostrud exercitation ullamco laboris nis aliquip consequat duis.</p>
            </div>
            <div class="row clearfix">
                <?php 
                foreach($getchildDtls as $key =>$value){?>
                <div class="col-lg-6 col-md-6 col-sm-12 pricing-block">
                    <div class="pricing-block-one">
                        <div class="pricing-table">
                            <div class="table-header">
                                <h3><?= $value->userid ?></h3>
                                <div class="price-box">
                                    <span>recommended</span>
                                    <h2>₹<?php if(!empty($value->amount_credited)){ echo $value->amount_credited; }else{ echo '0'; } ?></h2>
                                </div>
                                <!-- <span class="text">This Plan Includes Global Relations</span> -->
                            </div>
                          
                            <!-- <div class="table-footer">
                                <a href="index-4.html">get started</a>
                            </div> -->
                        </div>
                    </div>
                </div>  
                <?php } ?>             
            </div>
        </div>
    </section>
    <!-- pricing-section end -->

    <?php include ('footer.php');  ?>


    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-arrow-up"></span>
    </button>

<!-- jequery plugins -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/scrollbar.js"></script>
<script src="assets/js/nav-tool.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/circle-progress.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>

<!-- main-js -->
<script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.commonsupport.com/Fionca/service-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Mar 2021 04:53:39 GMT -->
</html>
