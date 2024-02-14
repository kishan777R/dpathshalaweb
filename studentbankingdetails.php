<?php

include "header.php";
include "includeinsidelogin.php";
if (  $_SESSION['login_user_type'] == 'STUDENT') {
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



	<?php

include "subheaderInside.php";
?>
	<!-- Sub Header End -->
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4; margin-bottom:-40px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="/">Home</a></li>

						<li>Banking Details</li>
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
							<br />Loading <?php echo $_SESSION['login_user_type'];?> Banking Data..
							<br /><br /><br /><br />
						</h3>
						<div class="cs-user-content" ng-show="userdetails">
							<div class="row">
								
								<form onsubmit="event.preventDefault();">
									
								

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h2> <?php echo $_SESSION['login_user_type'];?>  Banking Details</h2>
									
									</div>
								</div>
								<div class="cs-field-holder" >
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Bank Name</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="bank" ng-model="userdetails.bank">
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>IFSC Code</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="ifsc" ng-model="userdetails.ifsc">
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="cs-field-holder" >
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<label>Account Number</label>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<input name="name" type="text" placeholder="" id="accountnumber" ng-model="userdetails.accountnumber">
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
		 

			document.getElementById("bank").style.borderColor = '';
			document.getElementById("ifsc").style.borderColor = '';
			document.getElementById("accountnumber").style.borderColor = '';

		}

		$scope.toastermessage = "";
		$scope.updateprofile = function() {
			var login_user_type="<?php echo $_SESSION['login_user_type'];?>";
			$scope.resetbordercolor();
			$scope.toastermessage = "";

		 if (( $scope.userdetails.bank == '' || $scope.userdetails.bank == undefined)) {
				$scope.toastermessage = "Please fill Bank Name !";
				document.getElementById("bank").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if ( ( $scope.userdetails.ifsc == '' || $scope.userdetails.ifsc == undefined)) {
				$scope.toastermessage = "Please fill IFSC Code !";
				document.getElementById("ifsc").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else if (( $scope.userdetails.accountnumber == '' || $scope.userdetails.accountnumber == undefined)) {
				$scope.toastermessage = "Please fill Account Number !";
				document.getElementById("accountnumber").style.borderColor = 'red';
				$scope.showtoaster("WARNING");
				return false;
			} else {
				$scope.actualworking();
			}
		}
		
		$scope.actualworking = function() {
			$scope.toastermessage = "";
			$scope.upperbutton = 'Saving Changes...';

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
					$scope.toastermessage = "Your banking details updated successfully !!";
					$scope.showtoasterNotify("SUCCESS");
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
					$scope.toastermessage = "Your password has been changed successfully !";
					$scope.showtoasterNotify("SUCCESS");
					$scope.passworddetails = {};
				} else {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoasterNotify("WARNING");
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


			$http.get('<?php echo $server;?>insideapi.php?key=userdetails').
			then(function(jsondata) {
				$scope.userdetails = jsondata.data.userdetails;



			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.getuserDetails();


		$scope.showtoaster = function(wht) {
			var ismobile=	document.getElementById("ismobile").value;
		if(ismobile=='NO'){
			var x = document.getElementById("snackbar");
		}else{
			var x = document.getElementById("snackbarM");
		}
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
		$scope.showtoasterNotify = function(wht) {
			var ismobile = document.getElementById("ismobile").value;
			if (ismobile == 'NO') {
				var x = document.getElementById("snackbar");
			} else {
				var x = document.getElementById("snackbarM2");
			}
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