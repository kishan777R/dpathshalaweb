<?php
include "constant.php";

include 'Mobile_Detect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
error_reporting(0);

session_start();
$NotificationData = array();
if (!isset($_SESSION['visitor_id'])) {
	$_SESSION['visitor_id'] = date('ymdHis');
	$_SESSION['cartArr'] = [];
}
function truncate($text, $length)
{
	$length = abs((int) $length);
	if (strlen($text) > $length) {
		$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
	}
	return ($text);
}
if (isset($_SESSION['login_id'])) {
	if (isset($_SESSION['cartArr'])) {
		if (count($_SESSION['cartArr']) > 0) {
			if (is_array($_SESSION['studentdata']['course'])) {

				if (count($_SESSION['studentdata']['course']) > 0) {
					$alreadypurchasedSubcourseId = array();
					foreach ($_SESSION['studentdata']['course'] as $per) {
						$alreadypurchasedSubcourseId[] = $per['sub_course_id'];
					}
					$tempArr = [];
					foreach ($_SESSION['cartArr'] as $per) {
						if (!in_array($per['sub_course_id'], $alreadypurchasedSubcourseId)) {
							$tempArr[] = $per;
						}
					}
					$_SESSION['cartArr'] = $tempArr;
				}
			}
		}
	}
}

if (isset($_SESSION['transaction_status'])) {
	if ($_SESSION['transaction_status'] == 'SUCCESS') {
		unset($_SESSION['transaction_status']);
		unset($_SESSION['cartArr']);
		unset($_SESSION['order_no']);
		unset($_SESSION['totalamounttopay']);
	}
}
$detect = new Mobile_Detect();
if ($detect->isMobile()) {
	$mobile = true;
} else {

	$mobile = false;
}

$urlToGetCuorse =    $apiurl . "api/courses_subcourse_both";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlToGetCuorse);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
$cuurseData = json_decode(trim(curl_exec($ch)), true);


curl_close($ch);

$urlToGetNotification =    $apiurl . "api/listofnotifications/" . $_SESSION['login_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlToGetNotification);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
$NotificationData1 = json_decode(trim(curl_exec($ch)), true);

$NotificationData = $NotificationData1['Notificationslist'];
curl_close($ch);

function getCoursenameAccordingToLevel($perCourseOBJ, $categoryArr)
{

	if ($perCourseOBJ['upper_level_id'] == '') {
		return  $perCourseOBJ['course_name'];
	} else {
		$levelofthiscourse =  $perCourseOBJ['level_number'];

		$_id = $perCourseOBJ['upper_level_id'];
		$coursenaneArr = array();
		$coursenaneArr[] = $perCourseOBJ['course_name'];
		for ($t = $levelofthiscourse - 1; $t >= 1; $t--) {
			for ($x = 0; $x < count($categoryArr); $x++) {
				if ($_id == $categoryArr[$x]['_id']) {
					$coursenaneArr[] = $categoryArr[$x]['course_name'];

					$_id = $categoryArr[$x]['upper_level_id'];
				}
			}
		}


		$coursenaneArr =	 array_reverse($coursenaneArr);
		return implode(" -> ", $coursenaneArr);
	}
}
$forcoursedetailpageonly = "";
$url = $_SERVER['REQUEST_URI'];


$pos = strpos($url, 'coursedetails');
if ($pos === false) {
} else {
	$forcoursedetailpageonly = "  cs-courses-detail";
}

$posC = strpos($url, 'courses');
$posI = strpos($url, 'index');
$poscheckout = strpos($url, 'checkout');
$ishomepage = false;

if ($url == "http://localhost/DpathshalaWeb/index" || $url == "http://dpathshala.live" || $url == "https://dpathshala.live") {
	$ishomepage = true;
}


if ($pos === false and $posC == false and $poscheckout == false and $posI == false and $ishomepage == false) { ?>
	<script>
		var isoncartPage = false;
	</script>

<?php
} else {
?>

	<script>
		var isoncartPage = true;
	</script><?php
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
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/iconmoon.css" rel="stylesheet">
	<link href="assets/css/chosen.css" rel="stylesheet">
	<link href="assets/css/jquery.mobile-menu.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="cs-smartstudy-plugin.css" rel="stylesheet">
	<link href="assets/css/color.css" rel="stylesheet">
	<link href="assets/css/widget.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
	<!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="assets/scripts/jquery.js"></script>
	<script src="assets/scripts/modernizr.js"></script>
	<script src="assets/scripts/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.0.3/angular-sanitize.js"></script>
	<link rel="icon" href="fav.png" sizes="32x32">

	<?php
	if (!$isitlocalhost) {
		 
	?>
		<script language="JavaScript">
			window.onload = function() {
				document.addEventListener("contextmenu", function(e) {
					e.preventDefault();
				}, false);
				document.addEventListener("keydown", function(e) {
					//document.onkeydown = function(e) {
					// "I" key
					if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
						disabledEvent(e);
					}
					// "J" key
					if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
						disabledEvent(e);
					}
					// "S" key + macOS
					if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
						disabledEvent(e);
					}
					// "U" key
					if (e.ctrlKey && e.keyCode == 85) {
						disabledEvent(e);
					}
					// "F12" key
					if (event.keyCode == 123) {
						disabledEvent(e);
					}
				}, false);

				function disabledEvent(e) {
					if (e.stopPropagation) {
						e.stopPropagation();
					} else if (window.event) {
						window.event.cancelBubble = true;
					}
					e.preventDefault();
					return false;
				}
			}
			//	edit: removed ";" from last "}" because of javascript error
		</script>

		<script src="node_modules/devtools-detect/index.js"></script>
		<script type="module">
			// Check if it's open
 var restricetd=false;
 var b='';
	if( window.devtools.isOpen){
		restricetd=true;
		 b=document.getElementById('bodyid').innerHTML;
		 document.getElementById('bodyid').innerHTML="<br/><br/><br/><h2 align='center'>Developer tool is not allowed . Please close the developer tool   !</h2>";
		}else{
			if(restricetd){
				document.getElementById('bodyid').innerHTML=b;

			}
		}
	// Check it's orientation, `undefined` if not open
	//console.log('DevTools orientation:', window.devtools.orientation);

	// Get notified when it's opened/closed or orientation changes
	window.addEventListener('devtoolschange', event => {
		if( event.detail.isOpen){
			restricetd=true;
			  b=document.getElementById('bodyid').innerHTML;
			document.getElementById('bodyid').innerHTML="<br/><br/><br/><h2 align='center'>Developer tool is not allowed . Please close the developer tool   !</h2>";
		}else{
			if(restricetd){
				document.getElementById('bodyid').innerHTML=b;

			}
			 
		}
	
		//console.log('DevTools orientation:', event.detail.orientation);
	});
</script>
	<?php
	}else{
	 
	}
	?>

</head>

<body class="wp-smartstudy <?php echo $forcoursedetailpageonly; ?>" oncontextmenu="return false;" oncopy="return false" oncut="return false" onpaste="return false" id="bodyid">
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
					<li class="active"><a href="index">Home</a></li>
					<li><a href="courses">Courses</a>

					</li>

					<li><a href="about-us">About Us</a>

					</li>


					<li><a href="contact-us">Contact Us</a>

					</li>
					<li><a href="#">Others</a>
						<ul>
							<li><a href="user-detail.html">Student Dashboard</a></li>
							<li><a href="instructor-detail.html">instructor Dashboard</a></li>
							<li><a href="affiliations.html">Affiliations</a></li>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="shortcode.html">Short code</a>
								<ul>
									<li><a href="loop.html">Loop</a></li>
								</ul>
							</li>
							<li><a href="about-us.html">About Us</a></li>
							<li><a href="faqs.html">FAQ's</a></li>
							<li><a href="under-construction.html">Maintenance Page</a></li>
							<li><a href="404.html">404 Page</a></li>
							<li><a href="signup.html">Signup / Login</a></li>

							<li><a href="pricing.html">Price Table</a></li>
							<li><a href="#">Team</a>
								<ul>
									<li><a href="team-listing.html"> Team List</a></li>
									<li><a href="team-grid.html"> Team Grid</a></li>
									<li><a href="team-detail.html"> Team Detail</a></li>
								</ul>
							</li>

							<li><a href="#">Shop</a>
								<ul>
									<li><a href="shop.html"> Products</a></li>
									<li><a href="shop-detail.html"> Detail</a></li>
								</ul>
							</li>
						</ul>
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
								<div class="cs-user">
									<ul style="float:right"> <?php
											if (isset($_SESSION['login_id'])) {
												if ($_SESSION['login_user_type'] == 'STUDENT') {
											?>

												<li>

													<?php
													$newNoti = 0;
													foreach ($NotificationData as $perNoti) {
														if ($perNoti['websitelink'] !== '') {
															if ($perNoti['seen_status'] == false) {
																$newNoti = $newNoti + 1;
															}
														}
													}
													?>

													
														<i style="font-size:20px;color:white" class="icon-bell"></i>


													
													<?php
													if ($newNoti > 0) {
													?> <span class="badge  btn-danger" style="margin-left: -20px"><?php echo $newNoti; ?></span>
													<?php
													}
													?>

													<ul style="width:270px;left:-72px;right:0">
														<?php
														$r = 0;

														foreach ($NotificationData as $perNoti) {
															$darr =	explode("T", $perNoti['to_be_sent_on']);

															if ($r < 5) {
																if ($perNoti['websitelink'] !== '') {
																	$r++;


																	if ($perNoti['seen_status'] == false) {


														?>
																		<li style="cursor: pointer;" onclick="updateNotificationStatusToSeenPlusSent_by_websitelink('<?php echo $perNoti['websitelink']; ?>','<?php echo $_SESSION['login_id']; ?>')"><span style="color:#207dba !important"> <?php echo	truncate($perNoti['message'], 200);; ?><br />
																				<small style='float:right'><?php echo   date("d-M-Y", strtotime($darr[0])); ?></small>
																				<br />
																			</span></li>
																	<?php
																	} else {
																	?>
																		<li><a href="<?php echo $perNoti['websitelink']; ?>" style="color:#333333 !important"> <?php echo   	truncate($perNoti['message'], 200);  ?> <br /> <?php echo  $perNoti['to_be_sent_on']; ?>
																				<small style='float:right'><?php echo   date("d-M-Y", strtotime($darr[0])); ?></small>
																			</a></li>

														<?php
																	}
																}
															}
														}

														?>
	<?php
													if ($newNoti > 0) {
													?> <li><a href="notifications" style="color:#333333 !important"> See All</a></li>
													<?php }
													else{
														?><li><a href="#" style="color:#333333 !important"> No new notification</a></li>
														<?php
													}
													
													?>
														
														<script>
															function updateNotificationStatusToSeenPlusSent_by_websitelink(websitelink, c_id_int) {
																resetRegistationform_color();
																document.getElementById("responsediv_V").style.color = "gray";
																document.getElementById("responsediv_V").innerHTML = 'Resending verification code...';


																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());
																		window.location.href = websitelink;

																	}
																};

																xhttp.open("POST", apiurl + 'api/updateNotificationStatusToSeenPlusSent_by_websitelink', true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("c_id_int=" + c_id_int + "&websitelink=" + encodeURIComponent(websitelink));
															}
														</script>


													</ul>

												</li>
											<?php
												}
											} else {
											?>
											<li><a data-target="#cs-login" href="#" data-toggle="modal"><i class="icon-login"></i>Login</a></li>
											<li><a data-target="#cs-signup" href="#" data-toggle="modal" onclick="initilaseWHichDivToShow()"><i class="icon-user2"></i>Signup</a></li>
										<?php
											}


										?>

										<?php
										if (isset($_SESSION['login_id'])) {

										?>

											<li>
												<div class="cs-user-login">
													<div class="cs-media">
														<figure>
															<?php
															if ($_SESSION['login_user_type'] == 'STUDENT') {
																if ($_SESSION['studentdata']['image_path'] != '') {
																	$imgpath = $_SESSION['studentdata']['serverpath'] . $_SESSION['studentdata']['image_path'];
																} else {
																	$imgpath = "";
																}
															} else {
																if ($_SESSION['teacherdata']['teacher_image'] != '') {
																	$imgpath = $_SESSION['teacherdata']['teacher_image_server'] . $_SESSION['teacherdata']['teacher_image'];
																} else {
																	$imgpath = "";
																}
															}

															if ($imgpath != '') {
															?>
																<img alt="" src="<?php echo $imgpath; ?>" id="profilepicsrcHeader">
															<?php
															} else {
															?>
																<img alt="" src="assets/images/avatar.png" id="profilepicsrcHeader">
															<?php
															}
															?>
														</figure>
													</div>


													<a href="#">

														<?php
														if ($_SESSION['login_user_type'] == 'STUDENT') {
															echo 	$_SESSION['studentdata']['first_name'] . " " . $_SESSION['studentdata']['last_name'];
														} else {
															echo "To Do";
														}


														?>


													</a>
													<ul>


														<?php
														if ($_SESSION['login_user_type'] == 'TEACHER') {


															if (isset($_SESSION['is_profile_complete']) and $_SESSION['is_profile_complete'] == 'YES') {
														?><li><a href="user-detail.html"><i class="icon-user3"></i> About me</a></li>
																<li><a href="user-courses.html"><i class="icon-graduation-cap"></i> My Courses</a></li>
																<li><a href="user-short-listed.html"><i class="icon-heart"></i> Favorites</a></li>
																<li><a href="user-statements.html"><i class="icon-text-document"></i> Statement</a></li>
																<li class=""><a href="user-account-setting.html"><i class="icon-gear"></i> Profile </a></li>
																<li class=""><a href="logout"><i class="icon-login"></i> Logout </a></li>
															<?php
															} else {
															?> <li><a href="profilecomplete">Profile </a></li>
																<li class=""><a href="logout"><i class="icon-login"></i> Logout </a></li>
															<?php
															}
														} else {
															?>
															<li><a href="studentcourses"><i class="icon-graduation-cap"></i> My Courses</a></li>

															<li><a href="usersummary"><i class="icon-text-document"></i> Statement</a></li>
															<li class=""><a href="profile"><i class="icon-person"></i> Profile </a></li>
															<li class=""><a href="logout"><i class="icon-login"></i> Logout </a></li>

														<?php
														}

														?>


													</ul>
												</div>
											</li>
										<?php
										}


										?>
									</ul>
								</div>
								<div class="cs-modal">
									<div class="modal fade" id="cs-signup" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
												</div>
												<div class="modal-body">
													<h4>Create Account</h4>
													<div class="cs-login-form">
														<form onsubmit="event.preventDefault(); registerMe();" id="R">
															<div class="input-holder">
																<label id="first_namelabel" for="cs-username">
																	<strong>First Name</strong>
																	<i class="icon-add-user"></i>
																	<input type="text" class="" id="first_name" placeholder="Type desired first name">
																</label>
															</div>
															<div class="input-holder">
																<label id="last_namelabel" for="cs-username">
																	<strong>Last Name</strong>
																	<i class="icon-add-user"></i>
																	<input type="text" class="" id="last_name" placeholder="Type desired last name">
																</label>
															</div>
															<div class="input-holder">
																<label id="emaillabel" for="cs-email">
																	<strong>Email Id</strong>
																	<i class="icon-envelope"></i>
																	<input type="email" class="" id="email" placeholder="Type desired email id">
																</label>
															</div>
															<div class="input-holder">
																<label id="mobilelabel" for="cs-email">
																	<strong>Mobile</strong>
																	<i class="icon-phone"></i>
																	<input type="text" class="" id="mobile" placeholder="Type desired mobile">
																</label>
															</div>
															<div class="input-holder">
																<label id="passwordlabel" for="cs-login-password">
																	<strong>Password</strong>
																	<i class="icon-lock"></i>
																	<input type="password" id="password" placeholder="******">
																</label>
															</div>
															<div class="input-holder">
																<label id="c_passwordlabel" for="cs-confirm-password">
																	<strong>Confirm password</strong>
																	<i class="icon-lock"></i>
																	<input type="password" id="c_password" placeholder="******">
																</label>
															</div>

															<div id="responsediv">

															</div>
															<div class="input-holder">

																<input class="cs-color csborder-color" type="submit" value="Create Account">
															</div>
														</form>
														<form onsubmit="event.preventDefault(); verifyrMe();" id="V">
															<div class="input-holder">
																<label id="otplabel" for="cs-username">
																	<strong>Enter Verification Code received</strong>
																	<i class="icon-lock"></i>
																	<input type="text" class="" id="otp" placeholder="  Verification Code  ">

																</label>

																<a href="javascript:;" onclick="resendVerficationCodeToStuddnet()" style="color:#207dba !important;float:right" class="cs-color" aria-hidden="true">Resend </a>
															</div>

															<br />
															<div id="responsediv_V">

															</div>
															<div class="input-holder">

																<input class="cs-color csborder-color" type="submit" value="Verify Account">
															</div>
														</form>
														<script>
															function initilaseWHichDivToShow() {
																document.getElementById("R").style.display = '';
																document.getElementById("V").style.display = 'none';


															}

															function resetRegistationform() {
																document.getElementById("first_name").value = '';
																document.getElementById("last_name").value = '';
																document.getElementById("email").value = '';
																document.getElementById("mobile").value = '';
																document.getElementById("password").value = '';
																document.getElementById("c_password").value = '';

																document.getElementById("otp").value = '';


															}

															function resetRegistationform_color() {


																document.getElementById("first_namelabel").className = '';
																document.getElementById("last_namelabel").className = '';
																document.getElementById("emaillabel").className = '';
																document.getElementById("mobilelabel").className = '';
																document.getElementById("passwordlabel").className = '';
																document.getElementById("c_passwordlabel").className = '';
																document.getElementById("responsediv").innerHTML = "<br/>";
																document.getElementById("responsediv_V").innerHTML = "<br/>";
																document.getElementById("otplabel").className = '';

															}
															resetRegistationform();
															resetRegistationform_color();
															initilaseWHichDivToShow();
															var c_id_int = 0;
															var newclient = {};

															function resendVerficationCodeToStuddnet() {

																resetRegistationform_color();
																document.getElementById("responsediv_V").style.color = "gray";
																document.getElementById("responsediv_V").innerHTML = 'Resending verification code...';


																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());

																		if (response.status == 'SUCCESS') {

																			resetRegistationform();
																			document.getElementById("responsediv_V").style.color = "gray";
																			document.getElementById("responsediv_V").innerHTML = '';
																			showtoaster(response.status, response.message);

																		} else {
																			if (response.error_reason != '') {

																				document.getElementById(response.error_reason + "label").className = 'has-error';
																			}
																			document.getElementById("responsediv_V").style.color = "red";
																			document.getElementById("responsediv_V").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																		}
																	}
																};

																xhttp.open("POST", apiurl + "api/resendVerficationCodeToStuddnet", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("c_id_int=" + c_id_int);

															}

															function saveloginsession(wherenow) {


																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {

																		if (wherenow != '') {
																			window.location.href = wherenow;
																		} else {
																			location.reload();
																		}


																	}
																};

																xhttp.open("POST", "insideapi.php", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																newclient.profile_verified = true;
																xhttp.send("login_user_type=STUDENT&key=saveloginclientdetails&clientdata=" + JSON.stringify(newclient));
															}

															function verifyrMe() {

																resetRegistationform_color();
																document.getElementById("responsediv_V").style.color = "gray";
																document.getElementById("responsediv_V").innerHTML = 'Wait for a moment...';
																var otp = document.getElementById("otp").value;

																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());

																		if (response.status == 'SUCCESS') {

																			resetRegistationform();
																			document.getElementById("responsediv_V").style.color = "green";
																			document.getElementById("responsediv_V").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																			saveloginsession('');

																		} else {
																			if (response.error_reason != '') {

																				document.getElementById(response.error_reason + "label").className = 'has-error';
																			}
																			document.getElementById("responsediv_V").style.color = "red";
																			document.getElementById("responsediv_V").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																		}
																	}
																};

																xhttp.open("POST", apiurl + "api/verifystudentformwebsite", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("otp=" + otp + "&c_id_int=" + c_id_int);
															}

															function registerMe() {
																//
																resetRegistationform_color();
																document.getElementById("responsediv").style.color = "gray";
																document.getElementById("responsediv").innerHTML = 'Wait for a moment...';
																var first_name = document.getElementById("first_name").value;
																var last_name = document.getElementById("last_name").value;
																var email = document.getElementById("email").value;
																var mobile = document.getElementById("mobile").value;
																var password = document.getElementById("password").value;
																var c_password = document.getElementById("c_password").value;
																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());

																		if (response.status == 'SUCCESS') {

																			resetRegistationform();
																			document.getElementById("R").style.display = 'none';
																			document.getElementById("V").style.display = '';
																			showtoaster(response.status, response.message);
																			c_id_int = response.newclient.c_id_int;
																			newclient = response.newclient;
																		} else {
																			if (response.error_reason != '') {

																				document.getElementById(response.error_reason + "label").className = 'has-error';
																			}
																			document.getElementById("responsediv").style.color = "red";
																			document.getElementById("responsediv").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																		}
																	}
																};

																xhttp.open("POST", apiurl + "api/student_registartion_from_website", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("first_name=" + first_name + "&last_name=" + last_name + "&email=" + email + "&mobile=" + mobile + "&password=" + password + "&c_password=" + c_password);
															}

															function showtoaster(wht, toastermessage) {
																var x = document.getElementById("snackbar");
																x.innerHTML = toastermessage;
																x.className = "show";

																if (wht == 'SUCCESS') {
																	x.style.backgroundColor = "green";
																} else if (wht == 'WARNING') {
																	x.style.backgroundColor = "orange";
																} else {
																	x.style.backgroundColor = "red";
																}




																setTimeout(function() {
																	x.className = x.className.replace("show", "");
																}, 3000);
															}
														</script>
													</div>
												</div>
												<div class="modal-footer">
													<div class="cs-user-login">
														<i class="icon-add-user"></i>
														<strong>Already Member ? </strong>
														<a href="javascript:;" data-toggle="modal" data-target="#cs-login" style="color:#207dba !important" data-dismiss="modal" class="cs-color" aria-hidden="true">Login Now</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="cs-login" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
												</div>
												<div class="modal-body">
													<h4>User Sign in</h4>
													<div class="cs-login-form">
														<form onsubmit="event.preventDefault(); loginMe();">
															<div class="input-holder">
																<label for="cs-username-1" id="emailloginlabel">
																	<strong>Email Id</strong>
																	<i class="icon-add-user"></i>
																	<input type="text" class="" id="emaillogin" placeholder="Type Email Id">
																</label>
															</div>
															<div class="input-holder">
																<label for="cs-login-password-1" id="passwordloginlabel">
																	<strong>Password</strong>
																	<i class="icon-lock"></i>
																	<input type="password" id="passwordlogin" placeholder="******">
																</label>
															</div>
															<div class="input-holder">
																<a class="btn-forgot-pass" style="float:right;" data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" href="javascript:;" aria-hidden="true"><i class=" icon-question-circle"></i> Forgot password?</a>
															</div>
															<br />
															<div id="responselogindiv">

															</div>
															<div class="input-holder">

																<input class="cs-color csborder-color" type="submit" value="Login">
															</div>
														</form>

														<script>
															function resetLoginform() {

																document.getElementById("emaillogin").value = '';

																document.getElementById("passwordlogin").value = '';




															}

															function resetLoginform_color() {



																document.getElementById("emailloginlabel").className = '';

																document.getElementById("passwordloginlabel").className = '';

																document.getElementById("responselogindiv").innerHTML = "<br/>";



															}
															resetLoginform();
															resetLoginform_color();

															function loginMe() {

																resetLoginform_color();
																document.getElementById("responselogindiv").style.color = "gray";
																document.getElementById("responselogindiv").innerHTML = 'Wait for a moment...';

																var email = document.getElementById("emaillogin").value;

																var password = document.getElementById("passwordlogin").value;

																if (email == '') {
																	document.getElementById("emailloginlabel").className = 'has-error';
																	document.getElementById("responselogindiv").style.color = "red";
																	document.getElementById("responselogindiv").innerHTML = "Enter Email Id !";
																	showtoaster('WARNING', "Enter Email Id !");
																	return false;
																} else if (password == '') {
																	document.getElementById("passwordloginlabel").className = 'has-error';
																	document.getElementById("responselogindiv").style.color = "red";
																	document.getElementById("responselogindiv").innerHTML = "Enter Password !";
																	showtoaster('WARNING', "Enter Password !");
																	return false;
																}
																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());

																		if (response.status == 'SUCCESS') {

																			resetLoginform();

																			showtoaster(response.status, response.message);

																			newclient = response.newclient;
																			saveloginsession('');
																		} else {

																			document.getElementById("responselogindiv").style.color = "red";
																			document.getElementById("responselogindiv").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																		}
																	}
																};

																xhttp.open("POST", apiurl + "api/student_login_from_website", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("email=" + email + "&password=" + password);
															}
														</script>
													</div>
												</div>
												<div class="modal-footer">
													<div class="cs-separator"><span>or</span></div>

													<div class="cs-user-signup">
														<i class="icon-add-user"></i>
														<strong>Not a Member yet? </strong>
														<a class="cs-color" data-dismiss="modal" data-target="#cs-signup" data-toggle="modal" href="javascript:;" aria-hidden="true">Signup Now</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="user-forgot-pass" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
												</div>
												<div class="modal-body">
													<h4>Password Recovery</h4>
													<div class="cs-login-form">
														<form onsubmit="event.preventDefault(); forget();">
															<div class="input-holder">
																<label for="cs-email-1" id="forgetemaillabel">
																	<strong>Email</strong>
																	<i class="icon-envelope"></i>
																	<input type="email" class="" id="forgetemail" placeholder="Registered Email Id">
																</label>
															</div>


															<div id="responselogindivoerget">

															</div>
															<div class="input-holder">
																<input class="cs-color csborder-color" type="submit" value="Send">
															</div>
														</form>

														<script>
															//
															document.getElementById("responselogindivoerget").innerHTML = "<br/>";

															function forget() {

																document.getElementById("responselogindivoerget").style.color = "gray";
																document.getElementById("responselogindivoerget").innerHTML = 'Wait for a moment...';
																document.getElementById("forgetemaillabel").className = '';
																var email = document.getElementById("forgetemail").value;


																if (email == '') {
																	document.getElementById("forgetemaillabel").className = 'has-error';
																	document.getElementById("responselogindivoerget").style.color = "red";
																	document.getElementById("responselogindivoerget").innerHTML = "Enter Email Id !";
																	showtoaster('WARNING', "Enter Email Id !");
																	return false;
																}
																var xhttp = new XMLHttpRequest();
																xhttp.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		var response = JSON.parse(this.responseText.trim());

																		if (response.status == 'SUCCESS') {


																			showtoaster(response.status, response.message);
																			document.getElementById("responselogindivoerget").style.color = "green";
																			document.getElementById("responselogindivoerget").innerHTML = response.message;
																		} else {

																			document.getElementById("responselogindivoerget").style.color = "red";
																			document.getElementById("responselogindivoerget").innerHTML = response.message;
																			showtoaster(response.status, response.message);
																		}
																	}
																};

																xhttp.open("POST", apiurl + "api/student_forget_password", true);
																xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhttp.send("email=" + email);
															}
														</script>
													</div>
												</div>
												<div class="modal-footer">
													<div class="cs-user-signup">
														<i class="icon-add-user"></i>
														<strong>Not a Member yet? </strong>
														<a href="javascript:;" data-toggle="modal" data-target="#cs-signup" data-dismiss="modal" class="cs-color" aria-hidden="true">Signup Now</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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
										<figure><a href="/"><img src="logo.png" alt="" style="height:60px; " /></a></figure>
									</div>
								</div>
								<div class="cs-logo cs-logo-light">
									<div class="cs-media">
										<figure><a href="/"><img src="logo.png" alt="" style="height:60px; " /></a></figure>
									</div>
								</div>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
								<div class="cs-main-nav pull-right">
									<nav class="main-navigation">
										<ul>
											<li class="menu-item">
												<a href="/">Home</a><span><?php echo $website; ?></span>

											</li>
											<li class="menu-item"><a href="courses">Courses</a>
												<!-- <span>Online Education</span> -->

											</li>
											<li class="menu-item"><a href="about-us">About Us</a>
												<!-- <span>About <?php echo $website; ?></span> -->

											</li>
											<li class="menu-item"><a href="contact-us">Contact Us</a>
												<!-- <span>Inquire with us</span> -->

											</li>
											<li class="menu-item-has-children"><a href="#">Others</a><span>All you need</span>
												<ul>
													<li><a href="user-detail.html">Student Dashboard</a></li>
													<li><a href="instructor-detail.html">instructor Dashboard</a></li>
													<li><a href="affiliations.html">Affiliations</a></li>
													<li><a href="typography.html">Typography</a></li>
													<li class="menu-item-has-children"><a href="shortcode.html">Short code</a>
														<ul>
															<li><a href="loop.html">Loop</a></li>
														</ul>
													</li>
													<li><a href="about-us.html">About Us</a></li>
													<li><a href="faqs">FAQ's</a></li>
													<li><a href="under-construction.html">Maintenance Page</a></li>
													<li><a href="404.html">404 Page</a></li>
													<li><a href="signup.html">Signup / Login</a></li>
													<li><a href="pricing.html">Price Table</a></li>
													<li class="menu-item-has-children"><a href="#">Team</a>
														<ul>
															<li><a href="team-listing.html"> Team List</a></li>
															<li><a href="team-grid.html"> Team Grid</a></li>
															<li><a href="team-detail.html"> Team Detail</a></li>
														</ul>
													</li>

													<li class="menu-item-has-children"><a href="#">Shop</a>
														<ul>
															<li><a href="shop.html"> Products</a></li>
															<li><a href="shop-detail.html"> Detail</a></li>
														</ul>
													</li>
												</ul>
											</li>



											<li class="cs-search-area">
												<!-- <div class="cs-menu-slide">
													<div class="mm-toggle">
														<i class="icon-align-justify"></i>
													</div>
												</div> -->
												<div class="search-area">
													<a href="#" onclick="document.getElementById('formidofcartdivDesktopn').style.display='none'"><i class="icon-search2"></i></a>
													<form id="formidofsearcDesktopn">
														<div class="input-holder">
															<i class="icon-search2"></i>
															<input type="text" id="searchCourseHeader2" placeholder="Search Course">
															<!-- laptop -->
															<label class="cs-bgcolor">
																<i class="icon-search5" onclick="searchcourse('searchCourseHeader2')"></i>

															</label>
														</div>
													</form>
												</div>
												<div class="search-area">
													<a href="#" onclick="getcartdetails();document.getElementById('formidofsearcDesktopn').style.display='none'"> <i style="font-size:20px;" class="icon-cart"></i> <span class="badge  btn-danger" id="cartlengthid">
															<?php
															if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
																echo $crtLength = count($_SESSION['cartArr']);
															} else {
																echo $crtLength = 0;
															}

															?>
														</span></a>
													<form id="formidofcartdivDesktopn">
														<div class="input-holder" id="cartdetailId" style="color:white">

														</div>
													</form>

												</div>
												<span onclick="getcartdetails()" id="cartheaderfunctionid">

												</span>

												<script>
													function remove(subcourseid) {


														var xhttp = new XMLHttpRequest();
														xhttp.onreadystatechange = function() {
															if (this.readyState == 4 && this.status == 200) {
																getcartdetails();
																document.getElementById("cartlengthid").innerHTML = this.responseText.trim();

																document.getElementById("cartlengthid2").innerHTML = this.responseText.trim();
																if (isoncartPage) {
																	document.getElementById("getcartlistid").click();
																}

															}
														};
														xhttp.open("GET", "insideapi.php?sub_course_id=" + subcourseid + "&key=removefromcartJustNumberReturn", true);
														xhttp.send();



													}
												</script>




												<script>
													function checkout() {
														window.location.href = "checkout";
													}

													function getcartdetails() {
														var xhttp = new XMLHttpRequest();
														xhttp.onreadystatechange = function() {
															if (this.readyState == 4 && this.status == 200) {
																document.getElementById("cartdetailId2").innerHTML = this.responseText;
																document.getElementById("cartdetailId").innerHTML = this.responseText;
																getcartNumber();
																if (isoncartPage) {
																	document.getElementById("getcartlistid").click();
																}
															}
														};
														xhttp.open("GET", "insideapi.php?key=cartlistHTML", true);
														xhttp.send();
													}

													function getcartNumber() {
														var xhttp = new XMLHttpRequest();
														xhttp.onreadystatechange = function() {
															if (this.readyState == 4 && this.status == 200) {
																document.getElementById("cartlengthid").innerHTML = this.responseText.trim();

																document.getElementById("cartlengthid2").innerHTML = this.responseText.trim();
															}
														};
														xhttp.open("GET", "insideapi.php?key=cartNumber", true);
														xhttp.send();
													}
												</script>
											</li>
										</ul>
									</nav>
									<div class="cs-search-area hidden-md hidden-lg">
										<div class="cs-menu-slide" style="visibility: hidden">
											<div class="mm-toggle">
												<i class="icon-align-justify"></i>
											</div>
										</div>
										<div class="search-area">
											<a href="#" onclick="document.getElementById('formidofcartdivMobilen').style.display='none'" style="padding-right: 6px !important"><i class="icon-search2"></i></a>
											<form id="formidofSearchdivMobilen" style="width:260px">
												<div class="input-holder" >
													<i class="icon-search2"></i>
													<input type="text" id="searchCourseHeader" placeholder="Search Courses">
													<!-- mobile -->
													<script>
														function searchcourse(id) {

															if (document.getElementById(id).value != '') {


																window.location.href = "courses?course=" + document.getElementById(id).value;
															}
														}
													</script>
													<label class="cs-bgcolor">
														<i class="icon-search5" onclick="searchcourse('searchCourseHeader')"></i>

													</label>
												</div>
											</form>
										</div>

										<div class="search-area">
											<a href="#" onclick="getcartdetails();document.getElementById('formidofSearchdivMobilen').style.display='none'"> <i style="font-size:20px;" class="icon-cart"></i> <span class="badge  btn-danger" id="cartlengthid2">
													<?php
													if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
														echo $crtLength = count($_SESSION['cartArr']);
													} else {
														echo $crtLength = 0;
													}

													?> </span></a>
											<form id="formidofcartdivMobilen">
												<div class="input-holder" id="cartdetailId2" style="color:white">

												</div>
											</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

		</div>
		<!-- Header End -->