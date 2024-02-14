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


					<li>Notifications</li>
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
					<div class="cs-user-content">

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-section-title">
									<h2 style="margin-bottom: 0px">Notifications </h2>

								</div>
							</div>
							<ul class="cs-shortlisted">


								<?php

								$r = 0;

								foreach ($NotificationData as $perNoti) {
									$darr =	explode("T", $perNoti['to_be_sent_on']);


									if ($perNoti['websitelink'] !== '') {
										$r++;


										if ($perNoti['seen_status'] == false) {


								?>




											<li ng-click="updatethenredirect('<?php echo $perNoti['websitelink']; ?>','<?php echo $perNoti['_id']; ?>')" style="cursor:pointer">

												<div class="cs-text" style="width:80%">

													<h6 style="color:#207dba !important"> <?php echo $perNoti['message']; ?></h6>



												</div><br /><b data-toggle="tooltip" data-placement="top" title="" class="cs-remove-btn">
													<?php echo   date("d-M-Y", strtotime($darr[0])); ?>
												</b>
											</li>







										<?php
										} else {
										?>
											<li>
												<a href="<?php echo $perNoti['websitelink']; ?>" style="text-decoration:none">

													<div class="cs-text" style="width:80%">

														<h6> <?php echo $perNoti['message']; ?></h6>

													</div>
													<br /> <b data-toggle="tooltip" data-placement="top" title="" class="cs-remove-btn">
														<?php echo   date("d-M-Y", strtotime($darr[0])); ?>
													</b>

												</a>
											</li>


									<?php

										}
									}
								}

								if ($r == 0) {
									?>
									<li>
									<h3 align="center"  >No New Notification Found !</h3>
									</li>
								<?php
								}

								?>








							</ul>
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
		$scope.courseobject = undefined;


		$scope.getuserDetails = function(user_course_index) {


			$http.get('<?php echo $server;?>insideapi.php?key=userdetails').
			then(function(jsondata) {
				$scope.userdetails = jsondata.data.userdetails;


			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}


		$scope.updatethenredirect = function(websitelink, _id) {

			$http({
				method: 'POST',
				url: apiurl + 'api/updateNotificationStatusToSeenPlusSent_by_websitelink',
				data: 'websitelink=' + encodeURIComponent(websitelink) + '&c_id_int=' + $scope.userdetails.c_id_int,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {

				if (jsondata.data.status == 'ERROR') {
					console.log(jsondata);
				} else {
					window.location.href = websitelink;

				}
			});
		}

		$scope.getMainCourse = function() {

			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;
				$scope.getuserDetails();
			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}
		$scope.getMainCourse();
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








	}]);
	angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>