<?php

include "header.php";
include "includeinsidelogin.php";
if ($_SESSION['login_user_type'] == 'STUDENT') {
} else {
?>
	<script>
		window.location.href = "logout";
	</script>
<?php
}



?>        
<div >
	<!-- Sub Header Start -->
	<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-page-title">
						<h1>


							<?php

							echo $_SESSION['studentdata']['first_name'] . " " . $_SESSION['studentdata']['last_name'];
							?>
						</h1>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Sub Header End -->
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4; margin-bottom:-40px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="/">Home</a></li>

						<li>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb End -->
	<!-- Main Start -->
	<div class="main-section">
		<div class="page-section">
			<div class="container">
				<div class="row">
					<div class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<?php include "studentsidebar.php"; ?>
					</div>
					<div class="page-content col-lg-8 col-md-8 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="myCtrl" ng-cloak id="App2">
						<h3 align="center" ng-show="!userdetails">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading Profile Data..
							<br /><br /><br /><br />
						</h3>
						<div class="cs-user-content" ng-show="userdetails">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h2>Profile Details</h2>
										<small>All fields are required</small>
									</div>
								</div>
								<form onsubmit="event.preventDefault();">
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>First Name</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="first_name" ng-model="userdetails.first_name">
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Last Name</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="last_name" ng-model="userdetails.last_name">
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Email</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="email" placeholder="" id="email" ng-model="userdetails.email">
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Mobile</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="mobile" ng-model="userdetails.mobile">
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label id="state">State</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<select data-placeholder="Select State" tabindex="1" id="stateF" class="chosen-select">
																<option value="">Select State</option>
																<?php
																foreach ($statecityArr as $key => $per) {

																	if ($key == $_SESSION['studentdata']['state']) {
																		echo '	<option value="' . $key . '" selected>' . $key . '</option>';
																	} else {
																		echo '	<option value="' . $key . '">' . $key . '</option>';
																	}
																}

																?>


															</select>
														</div>
													</div>
												</div>
												<script>
													// function getcitylist() {
													// 	if(document.getElementById("state").value!=''){
													// 		var state=document.getElementById("state").value;
													// 	var xhttp = new XMLHttpRequest();
													// 	xhttp.onreadystatechange = function() {
													// 		if (this.readyState == 4 && this.status == 200) {
													// 			document.getElementById("cityD").innerHTML = this.responseText;

													// 		}
													// 	};
													// 	xhttp.open("GET", "insideapi.php?key=citylistHTMLWhenStateChange&state="+state, true);
													// 	xhttp.send();
													// }
													// }

													// function getcitylistLoad() {
													// 	var xhttp = new XMLHttpRequest();
													// 	xhttp.onreadystatechange = function() {
													// 		if (this.readyState == 4 && this.status == 200) {
													// 			document.getElementById("cityD").innerHTML = this.responseText;

													// 		}
													// 	};
													// 	xhttp.open("GET", "insideapi.php?key=citylistHTMLWhenloadingpage", true);
													// 	xhttp.send();
													// }
													// getcitylistLoad();
												</script>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label id="city">City</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<select data-placeholder="Select City" tabindex="1" id="cityF" class="chosen-select">
																<option value="">Select City</option>
																<?php
																foreach ($statecityArr as $key => $per) {

																	foreach ($per as  $perC) {


																		if ($perC == $_SESSION['studentdata']['city']) {
																			echo '	<option value="' . $perC . '" selected>' . $perC . '</option>';
																		} else {
																			echo '	<option value="' . $perC . '">' . $perC . '</option>';
																		}
																	}
																}

																?>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Pincode</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" id="pincode" placeholder="" ng-model="userdetails.pincode">
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Address</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

															<textarea ng-model="userdetails.address" id="address"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>



									<div class="cs-field-holder">
										<div class="col-lg-3 col-md-3 col-sm-12 col-md-12">
											<div class="cs-field">
												<div class="cs-btn-submit"><input name="name" type="submit" ng-disabled="upperbutton!=='Save Changes'" value="{{upperbutton}}" ng-click="updateprofile()"></div>
											</div>
										</div>
									</div>
								</form>
								<form onsubmit="event.preventDefault();">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-seprator"></div>
									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<h6>Update password</h6>
										</div>
									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Current Password</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="cs-field">
												<input name="name" type="password" placeholder="" id="op" ng-model="op">
											</div>
										</div>
									</div>
									<div class="cs-field-holder">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Password</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="cs-field">
												<input name="name" type="password" placeholder="" id="p" ng-model="p">
											</div>
										</div>
									</div>
									<div class="cs-field-holder ">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Confirm password</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="cs-field">
												<input name="name" type="password" placeholder="" id="cp" ng-model="cp">
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-seprator"></div>
									</div>

									<div class="cs-field-holder">
										<div class="col-lg-3 col-md-3 col-sm-12 col-md-12">
											<div class="cs-field">
												<div class="cs-btn-submit"><input name="name" type="submit" ng-disabled="lowerbutton!=='Update Password'" value="{{lowerbutton}}" ng-click="updatepassword()"></div>
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
</div>
<!-- Main End -->
<?php

include "footer.php";
?><script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
		
		$scope.userdetails = undefined;
		$scope.upperbutton = 'Save Changes';
		$scope.lowerbutton = 'Update Password';
		$scope.resetbordercolor = function() {
			document.getElementById("first_name").style.borderColor = '';
			document.getElementById("last_name").style.borderColor = '';
			document.getElementById("email").style.borderColor = '';
			document.getElementById("mobile").style.borderColor = '';
			document.getElementById("state").style.color = '';
			document.getElementById("city").style.color = '';
			document.getElementById("pincode").style.borderColor = '';
			document.getElementById("address").style.borderColor = '';
		}

		$scope.toastermessage = "";
		$scope.updateprofile = function() {
			$scope.resetbordercolor();
			$scope.toastermessage = "";

			$scope.userdetails.city = document.getElementById("cityF").value;
			$scope.userdetails.state = document.getElementById("stateF").value;
			if ($scope.userdetails.first_name == '' || $scope.userdetails.first_name == undefined) {
				$scope.toastermessage = "Please fill first name !";
				document.getElementById("first_name").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.last_name == '' || $scope.userdetails.last_name == undefined) {
				$scope.toastermessage = "Please fill last name !";
				document.getElementById("last_name").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.email == '' || $scope.userdetails.email == undefined) {
				$scope.toastermessage = "Please fill email !";
				document.getElementById("email").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.mobile == '' || $scope.userdetails.mobile == undefined) {
				$scope.toastermessage = "Please fill mobile !";
				document.getElementById("mobile").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.state == '' || $scope.userdetails.state == undefined) {
				$scope.toastermessage = "Please select state !";
				document.getElementById("state").style.color = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.city == '' || $scope.userdetails.city == undefined) {
				$scope.toastermessage = "Please select city !";
				document.getElementById("city").style.color = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.pincode == '' || $scope.userdetails.pincode == undefined) {
				$scope.toastermessage = "Please fill pincode !";
				document.getElementById("pincode").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.userdetails.address == '' || $scope.userdetails.address == undefined) {
				$scope.toastermessage = "Please fill address !";
				document.getElementById("address").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else {
				$scope.checkifitiscorrectstate();
			}
		}
		$scope.checkifitiscorrectstate = function() {

			$http.get('insideapi.php?key=checkifitiscorrectstate&state=' + $scope.userdetails.state + '&city=' + $scope.userdetails.city).
			then(function(jsondata) {
				if (jsondata.data.status == "TRUE") {
					$scope.actualworking();
				} else {
					document.getElementById("city").style.color = 'red';
					$scope.toastermessage = $scope.userdetails.city + " does not belongs to " + $scope.userdetails.state;

					$scope.showtoaster("WARNING");
					return false;
				}




			}).catch(function(jsondata) {
				console.error("error in posting");
			})
		}
		$scope.actualworking = function() {
			$scope.toastermessage = "";
			$scope.upperbutton = 'Saveing Changes...';

			$http({
				method: 'POST',
				url: apiurl + 'api/studentupdatefromwebsite',
				data: 'userdetails=' + encodeURIComponent(angular.toJson($scope.userdetails)),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.upperbutton = 'Save Changes';
				if (jsondata.data.status == 'SUCCESS') {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoaster("SUCCESS");
					$scope.getUpdatedStudentDetails($scope.userdetails.c_id_int);
				} else {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoaster("ERROR");
					document.getElementById(error_reason).style.borderColor = 'red';
				}


			});

		}
		$scope.op = '';
		$scope.cp = '';
		$scope.p = '';
		$scope.updatepassword = function() {

			$scope.toastermessage = "";
			document.getElementById("op").style.borderColor = '';
			document.getElementById("cp").style.borderColor = '';
			document.getElementById("p").style.borderColor = '';
			$scope.passworddetails = {};
			$scope.passworddetails.op = $scope.op;
			$scope.passworddetails.p = $scope.p;
			$scope.passworddetails.cp = $scope.cp;
			$scope.passworddetails.c_id_int = $scope.userdetails.c_id_int;
			if ($scope.op == '' || $scope.op == undefined) {
				$scope.toastermessage = "Please enter current password !";
				document.getElementById("op").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.p == '' || $scope.p == undefined) {
				$scope.toastermessage = "Please enter new password !";
				document.getElementById("p").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.cp == '' || $scope.cp == undefined) {
				$scope.toastermessage = "Please enter confirm password !";
				document.getElementById("cp").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ($scope.p !== $scope.cp) {
				$scope.toastermessage = "Please confirm password !";
				document.getElementById("cp").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			}
			$scope.lowerbutton = 'Updating....';
			$http({
				method: 'POST',
				url: apiurl + 'api/updatepasswordstudent',
				data: 'passworddetails=' + encodeURIComponent(angular.toJson($scope.passworddetails)),
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.lowerbutton = 'Update Password';
				if (jsondata.data.status == 'SUCCESS') {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoaster("SUCCESS");
					$scope.passworddetails = {};
				} else {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoaster("ERROR");
					document.getElementById(error_reason).style.borderColor = 'red';
					$scope.passworddetails = {};
				}


			});

		}
		$scope.getUpdatedStudentDetails = function(c_id_int) {
			$http({
				method: 'POST',
				url: apiurl + 'api/detailsofstudentbycidint',
				data: 'c_id_int=' + c_id_int,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.updateStudentDetails(jsondata.data);



			});
		}

		$scope.updateStudentDetails = function(clientdata) {
			$http({
				method: 'POST',
				url: 'insideapi',
				data: 'clientdata=' + JSON.stringify(clientdata) + "&login_user_type=STUDENT&key=saveloginclientdetails2",
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {





			});
		}
		$scope.getuserDetails = function() {


			$http.get('insideapi.php?key=userdetails').
			then(function(jsondata) {
				$scope.userdetails = jsondata.data.userdetails;



			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.getuserDetails();


		$scope.showtoaster = function(wht) {
			var x = document.getElementById("snackbar");
			x.innerHTML = $scope.toastermessage;
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



	}]);angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>