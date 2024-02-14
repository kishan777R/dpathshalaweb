<?php
include "constant.php";

include 'Mobile_Detect.php';$detect = new Mobile_Detect();
if ($detect->isMobile()) {
	$mobile = true;
} else {

	$mobile = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from chimpgroup.com/themeforest/smart-study/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Apr 2020 15:23:07 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php

			echo $title;
			?></title>
	<link href="<?php echo $server; ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/iconmoon.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/chosen.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/jquery.mobile-menu.css" rel="stylesheet">
	<link href="<?php echo $server; ?>style.css" rel="stylesheet">
	<link href="<?php echo $server; ?>cs-smartstudy-plugin.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/color.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/widget.css" rel="stylesheet">
	<link href="<?php echo $server; ?>assets/css/responsive.css" rel="stylesheet">
	<!-- <link href="<?php echo $server; ?>assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="<?php echo $server; ?>assets/scripts/jquery.js"></script>
	<script src="<?php echo $server; ?>assets/scripts/modernizr.js"></script>
	<script src="<?php echo $server; ?>assets/scripts/bootstrap.min.js"></script>
	 
	<link rel="icon" href="<?php echo $server; ?>fav.png" sizes="32x32">

	 

</head>

<body class="wp-smartstudy  "   >
	<div class="wrapper">
		<!-- Side Menu Start -->
		<div id="overlay"></div>

		<div>
			<div id="mobile-menu">
				<ul>
					<li>
						<div class="mm-search">
							<form id="search" name="search">
								<div class="input-group">
									<input type="text" class="form-control simple" id="searchCourseHeader3" placeholder="Search ...">
									<div class="input-group-btn">
										<button class="btn btn-default" type="button" onclick="searchcourse('searchCourseHeader3')"><i class="icon-search"></i></button>
									</div>
								</div>
							</form>
						</div>
					</li>
					<li class="active"><a href="<?php echo $server; ?>">Home</a></li>
					<li><a href="<?php echo $server; ?>courses?category=Digital%20Products"> Digital Products</a>

					</li>

					<li><a href="<?php echo $server; ?>courses?category=Courses">Courses </a>

					</li>
 
											
					<li><a href="<?php echo $server; ?>about-us">About Us</a>

					</li>


					<li><a href="<?php echo $server; ?>contact-us">Contact Us</a>

					</li>
					 
				</ul>
			</div>
			<!-- Side Menu End -->
			<!-- Header Start -->
			<header id="header" class="">
				<div class="top-bar">
					<div class="container">
						<div class="row" style="margin-top:<?php if ($mobile) {
																echo "14px";
															} else {
																echo "0px";
															} ?>">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

							</div>
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							 
							 
								<ul class="top-nav nav-right">
									<!-- <li><a href="#">APPLY</a></li>
								<li><a href="#">PROGRAMS &amp; DEGREES</a></li>
								<li><a href="#">FIND FUNDINg</a></li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="main-header">
					<div class="container">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
								<div class="cs-logo cs-logo-dark">
									<div class="cs-media">
										<figure><a href="<?php echo $server; ?>"><img src="<?php echo $server; ?>logo.png" alt="" style="height:60px; " /></a></figure>
									</div>
								</div>
								<div class="cs-logo cs-logo-light">
									<div class="cs-media">
										<figure><a href="<?php echo $server; ?>"><img src="<?php echo $server; ?>logo.png" alt="" style="height:60px; " /></a></figure>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
								 
							</div>
						</div>
					</div>
				</div>
			</header>

		</div>
		<!-- Header End -->

  <div class="page-section" style="background:url(assets/extra-images/sub-header-about-img.jpg); background-size:cover; ">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-page-title">
          <input    class="cs-bgcolor buttontypesubmit" style="width:90%;margin:20px" type="button" onclick="window.location.href='course/100+-hours-Training-to-launch-Digital-Business-+-Bonuses'" value="&nbsp;Yes, I am ready&nbsp;">
          <br/> <video style="height:90%;width:100%"   src="landingvideo.mp4" controls controlsList='nodownload'  >
										</video>

                  <br/>  <input    class="cs-bgcolor buttontypesubmit" style="width:90%;margin:20px " type="button" onclick="window.location.href='course/100+-hours-Training-to-launch-Digital-Business-+-Bonuses'" value="&nbsp;Yes, I am ready&nbsp;">

                  </div>
				</div>
			</div>
		</div>
	</div>
    
 
  
  <?php

?>
