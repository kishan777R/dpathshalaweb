 <?php

	include "header.php";

	include "includeoutsidelogin.php";


	?>
 <div style="background:#ebebeb; padding:50px 0 35px;" class="page-section center">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="cs-page-title center">
 					<h1> <?php
							if ($posaffiliateRegistartion) {
								echo "Affiliate ";
							} else {
								echo "Student";
							}
							?> Registeration !</h1>

 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<ul class="cs-breadcrumb">
 					<li><a href="/">Home</a></li>
 					<li><a href="#">
 							<?php
								if ($posaffiliateRegistartion) {
									echo "Affiliate ";
								} else {
									echo "Student";
								}
								?>
 							Registeration</a></li>

 				</ul>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- Main Start -->
 <div class="main-section">
 	<div class="page-section">
 		<div class="container">
 			<div class="row">
 				<!--Element Section Start-->
 				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">



 				</div>
 				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
 					<div class="cs-signup-form">

 						&nbsp;<span id="responsedivF">

 						</span>

 						<form onsubmit="event.preventDefault(); registerMeF();">
 							<div class="row">
 								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder  " id="first_namelabelF">
 										<i class="icon-user"></i>
 										<input type="text" placeholder="First Name *" id="first_nameF" autocomplete="off">
 									</div>
								 </div>
								 
								 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder  " id="last_namelabelF">
 										<i class="icon-user"></i>
 										<input type="text" placeholder="Last Name *" id="last_nameF" autocomplete="off">
 									</div>
								 </div>
								 

								 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder  " id="emaillabelF">
 										<i class="icon-envelope"></i>
 										<input type="text" placeholder="Email address *" id="emailRF" autocomplete="off">
 									</div>
								 </div>
								 
								 
								 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder  " id="mobilelabelF">
 										<i class="icon-phone"></i>
 										<input type="text" placeholder="Mobile *" id="mobileF" autocomplete="off">
 									</div>
 								</div>
 								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder" id="passwordlabelF">
 										<i class="icon-lock2"></i>
 										<input type="password" placeholder="Password *" id="passwordRF">
 									</div>
								 </div>
								 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder" id="c_passwordlabelF">
 										<i class="icon-lock2"></i>
 										<input type="password" placeholder="Confirm Password *" id="c_passwordRF">
 									</div>
 								</div>
 								<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder">
 										<div class="cs-radio">
 											<input type="radio" name="radio" value="1" id="radio1">
 											<label for="radio1">student</label>
 										</div>
 										<div class="cs-radio">
 											<input type="radio" name="radio" value="2" id="radio2">
 											<label for="radio2">instructor</label>
 										</div>
 									</div>
								 </div> -->




 								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-btn-submit">
 										<input type="submit" value="Create <?php
								if ($posaffiliateRegistartion) {
									echo "Affiliate ";
								} else {
									echo "Student";
								}
								?> Account">
 									</div>

 								</div>

 							</div><br />

 							<?php
								if ($posaffiliateRegistartion) {
								?>
 								<div class="cs-user-signup">
 									<i class="icon-add-user"></i>
 									<strong>Already a Affiliate ? </strong>
 									<a href="<?php echo $server; ?>affiliatelogin">Login Now</a>
 								</div>

 							<?php

								} else {

								?>
 								<div class="cs-user-signup">
 									<i class="icon-add-user"></i>
 									<strong>Already a member ? </strong>
 									<a href="<?php echo $server; ?>login">Login Now</a>
 								</div>
 							<?php
								}
								?>




 							<br /><br />
 						</form>

 						<script>
 							 

 							function resetRegistationformF() {
 								document.getElementById("first_nameF").value = '';
 								document.getElementById("last_nameF").value = '';
 								document.getElementById("emailRF").value = '';
 								document.getElementById("mobileF").value = '';
 								document.getElementById("passwordRF").value = '';
 								document.getElementById("c_passwordRF").value = '';

 

 							}

 							function resetRegistationform_colorF() {


 								document.getElementById("first_namelabelF").className = 'cs-field-holder';
 								document.getElementById("last_namelabelF").className = 'cs-field-holder';
 								document.getElementById("emaillabelF").className = 'cs-field-holder';
 								document.getElementById("mobilelabelF").className = 'cs-field-holder';
 								document.getElementById("passwordlabelF").className = 'cs-field-holder';
 								document.getElementById("c_passwordlabelF").className = 'cs-field-holder';
 								document.getElementById("responsedivF").innerHTML = "<br/>";
  
 							}
 							resetRegistationformF();
 							resetRegistationform_colorF();

 							function registerMeF() {
 								//
 								resetRegistationform_colorF();
 								document.getElementById("responsedivF").style.color = "gray";
 								document.getElementById("responsedivF").innerHTML = 'Wait for a moment...';
 								var first_name = document.getElementById("first_nameF").value;
 								var last_name = document.getElementById("last_nameF").value;
 								var email = document.getElementById("emailRF").value;
 								var mobile = document.getElementById("mobileF").value;
 								var password = document.getElementById("passwordRF").value;
								 var c_password = document.getElementById("c_passwordRF").value;
								 var his_affilitater_c_id_int=-1;
								 if (localStorage.getItem("website_aff_id")) {
									his_affilitater_c_id_int=localStorage.getItem("website_aff_id");
								 }
 								var xhttp = new XMLHttpRequest();
 								xhttp.onreadystatechange = function() {
 									if (this.readyState == 4 && this.status == 200) {
 										var response = JSON.parse(this.responseText.trim());

 										if (response.status == 'SUCCESS') {

											resetRegistationformF();
 											// document.getElementById("R").style.display = 'none';
 											// document.getElementById("V").style.display = '';
 											showtoaster(response.status, response.message);
 											c_id_int = response.newclient.c_id_int;
											 newclient = response.newclient;
											 
 											saveloginsession('affiliatestats', "<?php  if ($posaffiliateRegistartion) { echo "AFFILIATE";		}else{	echo "STUDENT";	 	} ?>");
 										} else {
 											if (response.error_reason != '') {
											 
 												document.getElementById(response.error_reason + "labelF").className ='cs-field-holder cs-has-error';
 											}
 											document.getElementById("responsedivF").style.color = "red";
 											document.getElementById("responsedivF").innerHTML = response.message;
 											showtoaster(response.status, response.message);
 										}
 									}
 								};

 								xhttp.open("POST", apiurl + "api/student_registartion_from_website_full", true);
 								xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 								xhttp.send("first_name=" + first_name + "&login_user_type=<?php  if ($posaffiliateRegistartion) { echo "AFFILIATE";		}else{	echo "STUDENT";	 	} ?>" + "&last_name=" + last_name + "&email=" + email.toLowerCase() + "&his_affilitater_c_id_int=" + his_affilitater_c_id_int + "&mobile=" + mobile + "&password=" + password.toLowerCase() + "&c_password=" + c_password.toLowerCase());
 							}
 						</script>
 					</div>
 				</div>
 				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">



 				</div>
 				<!--Element Section End-->
 			</div>
 		</div>
 	</div>
 	<div class="page-section">
 		<div class="container">

 		</div>
 	</div>
 </div>
 <!-- Main End -->

 <?php include "footer.php"; ?>