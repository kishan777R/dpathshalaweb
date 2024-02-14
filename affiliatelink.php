<?php

include "header.php";
include "includeinsidelogin.php";
if ($_SESSION['login_user_type'] == 'AFFILIATE' or $_SESSION['login_user_type'] == 'STUDENT') {
} else {
?>
	<script>
		window.location.href = "logout";
	</script>
<?php
}



?>

<!-- Sub Header Start -->
<div class="page-section" style="background:url(assets/extra-images/sub-header-about-img.jpg); background-size:cover;padding:87px 0 35px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cs-page-title">
					<h1 style="color:#fff !important;">

						Affiliate Link
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


					<li> Affiliate Link</li>
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
						<h3 align="center" ng-show="!listofSubCourse">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading Affiliate Links....
							<br /><br /><br /><br />
						</h3>
						<h3 align="center" ng-show="listofSubCourse.length==0">
							<br />


							<br />No details found, Try after sometime !<br /><br />

							<br /><br /><br /><br />
						</h3>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="listofSubCourse.length>0">
							<div class="cs-section-title">
								<h2 style="margin-bottom: 0px">List of affiliate links </h2>

							</div>
						</div>
						<div class="row" ng-show="listofSubCourse">

							<ul class="cs-shortlisted">
								<li>
									<div class="cs-media">
										<figure><a onclick='window.location.href="<?php echo $server; ?>"' style="cursor:pointer">
												<img src="<?php echo $server; ?>logo.png" style="height: 60px" alt="" /></a></figure>
									</div>
									<div class="cs-text">

										<h5 onclick='window.location.href="<?php echo $server; ?>"' style="cursor:pointer"> <?php echo $website; ?>
											<br />
											<b class="cs-color" style="font-size: 12px">Website</b>
										</h5>


										<br />
										{{rediretctocourseReturnWeb("<?php echo $server; ?>","<?php echo $_SESSION['login_id']; ?>")}}

										<?php
										if ($mobile) {
											?>
											<br />
											<a href="" ng-click='copyLinkWeb("<?php echo $server; ?>","<?php echo $_SESSION['login_id']; ?>")' style="color:white;background-color: #207dba !important;text-decoration:none" title="" >
											&nbsp;&nbsp;Copy Link&nbsp;&nbsp;
											</a>
										<?php
										} else {
										?>
											<a href="" ng-click='copyLinkWeb("<?php echo $server; ?>","<?php echo $_SESSION['login_id']; ?>")' style="background-color: #207dba !important;" title="" class="cs-remove-btn">
												Copy Link
											</a>
										<?php
										}
										?>

									</div>
								</li>

							</ul>
						</div>

						<div class="row" ng-repeat="courseObj in listofSubCourse" ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

							<ul class="cs-shortlisted">
								<li>
									<div class="cs-media">
										<figure><a ng-click='rediretctocourse(courseObj)' style="cursor:pointer"><img src="{{courseObj.serverpath+courseObj.imagepath}}" style="height: 100px" alt="" /></a></figure>
									</div>
									<div class="cs-text">

										<h5 ng-click='rediretctocourse(courseObj)' style="cursor:pointer"> {{courseObj.course_name}}
											<br />
											<b class="cs-color" style="font-size: 12px">By {{courseObj.instructor}}</b>
										</h5>

										<span class="cs-courses-price"> &#8377; {{courseObj.amount | number : 2}}

											<del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount"><small style="opacity:0.7">&#8377; {{courseObj.pre_amount | number : 2 }}</small></del>
										</span><br />
										<div class="cs-rating" style="float: left;">
											<div class="cs-rating-star">
												<span class="rating-box" style="{{courseObj.ratingstyle}};"></span>
											</div>
										</div>
										<br />
										{{rediretctocourseReturn("<?php echo $server; ?>",courseObj,"<?php echo $_SESSION['login_id']; ?>")}}
										<?php
										if ($mobile) {
											?>										<br />
											<a href="" ng-click='copyLink("<?php echo $server; ?>",courseObj,"<?php echo $_SESSION['login_id']; ?>")' style="background-color: #207dba !important;color:white;text-decoration:none"  title=""  >
											&nbsp;&nbsp;Copy Link&nbsp;&nbsp;
											</a>
										<?php
										} else {
										?>
											<a href="" ng-click='copyLink("<?php echo $server; ?>",courseObj,"<?php echo $_SESSION['login_id']; ?>")' style="background-color: #207dba !important;" data-toggle="tooltip" data-placement="top" title="" class="cs-remove-btn">
												Copy Link
											</a>
										<?php
										}
										?>


									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main End -->
<input type="hidden" id="myInput" value="">

<?php

include "footer.php";
?><script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {



		$scope.listofSubCourse = undefined;
		$scope.rediretctocourseReturn = function(server, courseobj, login_id) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			return server + "course/" + t + "?aff=" + login_id;
		}
		$scope.rediretctocourseReturnWeb = function(server, login_id) {


			return server + "?aff=" + login_id;
		}
		$scope.copyLink = function(server, courseobj, login_id) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'

			var val = server + "course/" + t + "?aff=" + login_id;



			const selBox = document.createElement('textarea');
			selBox.style.position = 'fixed';
			selBox.style.left = '0';
			selBox.style.top = '0';
			selBox.style.opacity = '0';
			selBox.value = val;
			document.body.appendChild(selBox);
			selBox.focus();
			selBox.select();
			document.execCommand('copy');
			document.body.removeChild(selBox);
			$scope.toastermessage = "Link Copied";
			$scope.showtoaster("SUCCESS");
		}
		$scope.copyLinkWeb = function(server, login_id) {

			var val = server + "?aff=" + login_id;



			const selBox = document.createElement('textarea');
			selBox.style.position = 'fixed';
			selBox.style.left = '0';
			selBox.style.top = '0';
			selBox.style.opacity = '0';
			selBox.value = val;
			document.body.appendChild(selBox);
			selBox.focus();
			selBox.select();
			document.execCommand('copy');
			document.body.removeChild(selBox);
			$scope.toastermessage = "Link Copied";
			$scope.showtoaster("SUCCESS");
		}

		$scope.showtoaster = function(wht) {
			var ismobile = document.getElementById("ismobile").value;
			if (ismobile == 'NO') {
				var x = document.getElementById("snackbar");
			} else {
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
		$scope.rediretctocourse = function(courseobj) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			window.location.href = "course/" + t;
		}
		$scope.rediretctocourseU = function(courseobj) {


			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'YES');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			window.location.href = "course/" + t;
		}

		$scope.replaceAll = function(string, search, replace) {
			return string.split(search).join(replace);
		}
		$scope.getMainCourse = function() {

			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;
				$scope.listofSubCourse = [];
				for (var t = 0; t < $scope.courseList.length; t++) {
					var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
					$scope.courseList[t].ratingstyle = "width:" + rr;
					if ($scope.courseList[t].parent_course !== '0' && $scope.courseList[t].subjectstatus == 'TRUE' && $scope.courseList[t].imagepath) {


						$scope.listofSubCourse.push($scope.courseList[t]);



					}
				}
			}).catch(function(jsondata) {
				console.error("error in posting" + jsondata);
			})

		}
		$scope.getMainCourse();








	}]);
	angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>