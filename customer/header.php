<?php

require('../database.php');
require('../functions.php');
require('../constant.php');
require('cusdatabase.php');

/*$cartArr = getUserCart($cusCon,$con2) ;
prx($cartArr);
*/

//for setting the dynamic title of pages 
$curStr = $_SERVER['REQUEST_URI'];
//convert the string into the array 
$curArr = explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

$title='';
if($cur_path==''||$cur_path=='index.php'){
  $title='Dashboard';
}
elseif($cur_path=='contact.php'){
  $title='CONTACT US' ;
}
elseif($cur_path=='food.php'){
  $title='ManageFood';
}
elseif($cur_path=='addfood.php'){
  $title='AddFood';
}
elseif($cur_path=='addcat.php'){
  $title='AddCat';
}
elseif($cur_path=='logout.php'){
  $title='LogOut';
}
?>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="assets/css/mystyle.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                            <div class="account-curr-lang-wrap f-right">
                                <h4><a style="padding:3px;background-color:black;color:white;border:5px solid gray ;border-radius:3px" href="../logout.php">Logout</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="index.php">
                                    <img alt="" src="assets/img/logo/logo2.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                
                                <div class="header-wishlist">
                                   &nbsp;
                                </div>
                                <div class="header-cart">
                                    <a onclick="func()";>
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">Shop</a></li>
                                        <li><a href="about.php">about</a></li>
                                        <li><a href="contact.php">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
										<li><a href="shop.php">Home</a></li>
										<li><a href="about-us.php">About Us</a></li>
										<li><a href="contact-us.php">Contact Us</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>