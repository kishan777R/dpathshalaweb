 <?php include "header.php";

	include "includeoutsidelogin.php";


	?>
 <div style="background:#ebebeb; padding:50px 0 35px;" class="page-section center">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="cs-page-title center">
 					<h1>Login Into Your Account !</h1>

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
 					<li><a href="#">Login</a></li>

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

 						&nbsp;<span id="responselogindivF">

 						</span>

 						<form onsubmit="event.preventDefault(); loginMeF();">
 							<div class="row">
 								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder  " id="emailloginlabelF">
 										<i class="icon-user"></i>
 										<input type="text" placeholder="Email address *" id="emailloginF" autocomplete="off">
 									</div>
 								</div>
 								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 									<div class="cs-field-holder" id="passwordloginlabelF">
 										<i class="icon-lock2"></i>
 										<input type="password" placeholder="Password *" id="passwordloginF">
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
 										<input type="submit" value="Login">
 									</div>
 									<a data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" class="cs-forgot-password" href="#">
 										<i class="cs-color icon-help-with-circle"></i>Forgot password?
 									</a>
 								</div>

 							</div><br />
 							<br /><br />
 						</form>

 						<script>
 							function resetLoginformF() {

 								document.getElementById("emailloginF").value = '';

 								document.getElementById("passwordloginF").value = '';




 							}

 							function resetLoginform_colorF() {



 								document.getElementById("emailloginlabelF").className = 'cs-field-holder';

 								document.getElementById("passwordloginlabelF").className = 'cs-field-holder';

 								document.getElementById("responselogindivF").innerHTML = "<br/>";



 							}
 							resetLoginformF();
 							resetLoginform_colorF();

 							function loginMeF() {

 								resetLoginform_color();
 								document.getElementById("responselogindivF").style.color = "gray";
 								document.getElementById("responselogindivF").innerHTML = 'Wait for a moment...';

 								var email = document.getElementById("emailloginF").value;

 								var password = document.getElementById("passwordloginF").value;

 								if (email == '') {
 									document.getElementById("emailloginlabelF").className = 'cs-field-holder cs-has-error';
 									document.getElementById("responselogindivF").style.color = "red";
 									document.getElementById("responselogindivF").innerHTML = "Enter Email Id !";
 									showtoaster('WARNING', "Enter Email Id !");
 									return false;
 								} else if (password == '') {
 									document.getElementById("passwordloginlabelF").className = 'cs-field-holder cs-has-error';
 									document.getElementById("responselogindivF").style.color = "red";
 									document.getElementById("responselogindivF").innerHTML = "Enter Password !";
 									showtoaster('WARNING', "Enter Password !");
 									return false;
 								}
 								var xhttp = new XMLHttpRequest();
 								xhttp.onreadystatechange = function() {
 									if (this.readyState == 4 && this.status == 200) {
 										var response = JSON.parse(this.responseText.trim());

 										if (response.status == 'SUCCESS') {

 											resetLoginformF();

 											showtoaster(response.status, response.message);

 											newclient = response.newclient;
 											saveloginsession('profile');
 										} else {

 											document.getElementById("responselogindivF").style.color = "red";
 											document.getElementById("responselogindivF").innerHTML = response.message;
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