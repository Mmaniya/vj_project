<?php 
require "includes.php";
if ($_SESSION['userid'] != '' && $_SESSION['name'] !='') {
    foreach ($_SESSION as $K => $V) {
        unset($_SESSION[$K]);
    }
    session_destroy();
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from azim.commonsupport.com/Fionca/index-onepage.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Mar 2021 04:52:22 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Fionca - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<link rel="icon" href="assets/images/favicon-2.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&amp;display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="assets/css/font-awesome-all.css" rel="stylesheet">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/owl.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/nice-select.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/rtl.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
<link href="assets/js/alert//sweetalert2.min.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body class="boxed_wrapper ltr">

    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader style-two"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <?php include ('header.php');  ?>

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
    <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Create Member</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- policy-section -->
    <section class="policy-section bg-color-2">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-9.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div id="content_block_five">
                        <div class="content-box">
                            <div class="sec-title light left">
                                <h5>try a policy</h5>
                                <h2>Get Free Quote</h2>
                                <p>Et mini veniam quis nostrud ipsum exercitastion ullamco ipsum laboris sed ipsum ut perspiciatis unde.</p>
                            </div>
                            <ul class="info-list clearfix">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h4>Company Head Office</h4>
                                    <p>838 Andy Street, Madison, New Jersy 08003</p>
                                </li>
                                <li>
                                    <i class="fas fa-phone-volume"></i>
                                    <h4>Request a Callback</h4>
                                    <p><a href="tel:01005200369">0 (100) 5200 369</a> / <a href="tel:01005200123">0 (100) 5200 123</a></p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope-open"></i>
                                    <h4>Email Support</h4>
                                    <p><a href="mailto:info@my-domain.com">info@my-domain.com </a> / <a href="mailto:support@info.com">support@info.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 inner-column">
                    <div id="content_block_six">
                        <div class="content-box">
                            <h6>Allready Member<a href="accountlogin.php"> Click Here.! </a></h6>
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li class="tab-btn active-btn" data-tab="#tab-4">Personal</li>
                                        <li class="tab-btn" data-tab="#tab-5">Account</li>
                                        <li class="tab-btn" data-tab="#tab-6">Payment</li>
                                        <!-- <li class="tab-btn" data-tab="#tab-7">Health</li> -->
                                    </ul>
                                </div>
                                <div class="tabs-content">
                                    <form action="javascript:void(0);" method="post" id="userAccount">
                                        <input type="hidden" value="CreateAc" name="act">
                                        <div class="tab active-tab" id="tab-4">
                                            <div class="content-inner">
                                                <p>Enter Your Personal Details</p>
                                                <div class="form-group">
                                                    <i class="fas fa-user"></i>
                                                    <input type="text" name="username" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-envelope-open"></i>
                                                    <input type="email" name="useremail" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-phone"></i>
                                                    <input type="number" name="mobile" placeholder="Mobile">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-address-card"></i>
                                                    <input type="text" id="address" name="address" placeholder="Address">
                                                </div>  
                                                <div class="form-group">
                                                    <i class="fas fa-lock"></i>
                                                    <input type="password" name="password" placeholder="Password">
                                                </div>                                             
                                                <div class="form-group message-btn ">
                                                    <ul class="tab-btns tab-buttons clearfix">
                                                        <a href="javascript:void(0);" class="theme-btn style-two" style="width:100%"><li class="tab-btn" data-tab="#tab-5">Next</li></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab" id="tab-5">
                                            <div class="content-inner">
                                                <p>Enter Your Account Details</p>
                                                <div class="form-group">
                                                    <i class="fas fa-user"></i>
                                                    <input type="text" name="account_name" placeholder="Account Name">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-id-card"></i>
                                                    <input type="number" name="account_no" placeholder="Account No">
                                                </div>                                              
                                                <div class="form-group">
                                                    <i class="fas fa-university"></i>
                                                    <input type="text" name="bank_name" placeholder="Bank Name">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-code-branch"></i>
                                                    <input type="text" name="ifsc_code" placeholder="Ifsc Code">
                                                </div>
                                                <div class="form-group">
                                                    <i class="fas fa-home"></i>
                                                    <input type="text" name="branch_name" placeholder="Branch Name">
                                                </div>
                                                <div class="form-group">
                                                    <ul class="tab-btns tab-buttons clearfix row">
                                                        <a href="javascript:void(0);" class="theme-btn style-two" style="width:50%"><li class="tab-btn" data-tab="#tab-4">Previous</li></a>
                                                        <a href="javascript:void(0);" class="theme-btn style-two" style="width:50%"><li class="tab-btn" data-tab="#tab-6">Next</li></a>
                                                    </ul>
                                                </div>                                               
                                            </div>
                                        </div>
                                        <div class="tab" id="tab-6">
                                            <div class="content-inner">
                                                <p>Enter Your Payment Details</p>
                                                <div class="form-group option">
                                                    <!-- <i class="fas fa-chess-knight"></i> -->
                                                    <div class="select-box">
                                                        <select class="wide" name="deposit_amt_y_n" onchange="paymentselectionoption(this.value)">
                                                            <option data-display="Select" value="" >If Amount Deposit</option>
                                                            <option value="Y">Yes</option>
                                                            <option value="N">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group payment">
                                                    <i class="fas fa-money-check"></i>
                                                    <input type="text" name="deposit_amt" placeholder="Deposit Amount">
                                                </div>                                              
                                                <div class="form-group payment">
                                                    <i class="fas fa-calendar"></i>
                                                    <input type="date" name="deposit_date" placeholder="Deposit Date">
                                                </div>
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn style-two" style="width:100%">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- policy-section end -->


    <?php include ('footer.php');  ?>


    <!--Scroll to top-->
    <button class="scroll-top style-two scroll-to-target" data-target="html">
        <span class="fa fa-arrow-up"></span>
    </button>



<!-- jequery plugins -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/custom-script.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/scrollbar.js"></script>
<script src="assets/js/nav-tool.js"></script>
<script src="assets/js/TweenMax.min.js"></script>
<script src="assets/js/circle-progress.js"></script>
<script src="assets/js/pagenav.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>

<!-- main-js -->
<script src="assets/js/script.js"></script>
<script src="assets/js/alert/sweet-alerts.init.js"></script>
<script src="assets/js/alert/sweetalert2.min.js"></script>

</body><!-- End of .page_wrapper -->

</html>
