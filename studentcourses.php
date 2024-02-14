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

 					<li>My Courses</li>
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
 									<h2>My Courses</h2>
 								</div>
 							</div>
 							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 								<h3 align="center" ng-show="!userdetails">
 									<br />

 									<img src="assets/the-cube-preloader.gif">
 									<br />Loading Course Details...
 									<br /><br /><br /><br />
 								</h3>
 								<h3 align="center" ng-show="userdetails.course.length==0">
 									<br />


 									<br />You have not purchased a single course till now !<br /><br />
 									<input class="cs-bgcolor buttontypesubmit" style="float: right" type="button" onclick="window.location.href='courses'" value="&nbsp;+ Add courses &nbsp;">

 									<br /><br /><br /><br />
 								</h3>
 								<div class="cs-user-courses" ng-show="userdetails.course.length>0">
 									<ul>
 										<li>
 											<div class="cs-courses-label">
 												<ul>
 													<li>Course name</li>
 													<li>Status</li>
 													<li>Progress</li>
 												</ul>
 											</div>
 										</li>

 										<li ng-repeat="obj in userdetails.course">
 										<a href="studentcoursestopics?c={{obj.course_name}}&i={{$index}}">	<div class="cs-courses-content">
 												<ul>
 													<li><span>{{obj.course_name}} <em> ( &#8377; {{ userdetails.orders[$index].paid_amount | number : 2}})</em></span>
														 <br /> <span>Starting Date: <em>{{obj.starting_date | date : 'MMM d, y'}} </em></span>
														 <br /> <span class="cs-user-name cs-color"><em>By</em> {{obj.instructor}}</span>
														</li>
 													<li>{{obj.course_status}}</li>
 													<li>
													 <i class="icon-spinner spin" ng-show="obj.progress==undefined"></i>
													 
														 {{obj.progress}}%
														 
														
 													</li>
 												</ul></a>
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
 	</div>
 </div>
 <!-- Main End -->


 <?php

	include "footer.php";
	?><script>
 	var app = angular.module('myApp', []);
 	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {

 		$scope.userdetails = undefined;

 		$scope.getuserDetails = function() {


 			$http.get('<?php echo $server;?>insideapi.php?key=userdetails').
 			then(function(jsondata) {
 				$scope.userdetails = jsondata.data.userdetails;
 				if ($scope.userdetails.course.length > 0) {


 					for (var tx = 0; tx < $scope.userdetails.course.length; tx++) {
						$scope.getProgress(tx);
 						for (var t = 0; t < $scope.courseList.length; t++) {

 							if ($scope.userdetails.course[tx].sub_course_id == $scope.courseList[t]._id) {

								 $scope.userdetails.course[tx].course_name = $scope.courseList[t].course_name;
								 $scope.userdetails.course[tx].instructor = $scope.courseList[t].instructor;


 							}




 						}





 					}
 					
 				}

 			}).catch(function(jsondata) {
 				console.error("error in posting");
 			})

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


 		$scope.getProgress = function(indexofcourse) {

 			$http.get(apiurl + 'api/allvideolistofparticularcourse/' + $scope.userdetails.course[indexofcourse].sub_course_id).
 			then(function(jsondata) {

 				onlyVideolist = jsondata.data;


 				$scope.checkIfSubjectIsCompletedOrNot(onlyVideolist, indexofcourse);





 			}).catch(function(jsondata) {
 				console.error("error in posting");
 			})
 		}

 		$scope.checkIfSubjectIsCompletedOrNot = function(onlyVideolist, indexofcourse) {

 			$scope.videodataList = onlyVideolist;
 			$scope.completedVideo = 0;

 			$scope.completedtime = '';
 			$scope.videotime = '';


 			$http.get(apiurl + 'api/getFromDatabaseThatVideoIsComplete/' + $scope.userdetails.c_id_int).
 			then(function(jsondata) {
 				res = jsondata.data;

 				var isitincompleteCount = 0;
 				for (var y = 0; y < onlyVideolist.length; y++) {

 					var found = false;
 					for (var x = 0; x < res.alreadycompltedVideo.length; x++) {
 						if (onlyVideolist[y]._id == res.alreadycompltedVideo[x].video_id && res.alreadycompltedVideo[x].is_completed == 'YES') {

 							found = true;

 						}

 					}
 					if (!found) {
 						isitincompleteCount++;
 					}
 				}
 				if (isitincompleteCount == 0) {
 					$scope.updatethisCoursetoComplete(indexofcourse);
 				}



 				$scope.alreadycompltedVideo = res.alreadycompltedVideo;
 				var completedsec = 0;
 				if ($scope.alreadycompltedVideo.length > 0) {
 					for (var x = 0; x < $scope.alreadycompltedVideo.length; x++) {
 						var found = false;
 						for (var y = 0; y < onlyVideolist.length; y++) {
 							if (onlyVideolist[y]._id == $scope.alreadycompltedVideo[x].video_id) {
 								found = true;
 							}

 						}
 						if (found) {
 							completedsec = completedsec + $scope.alreadycompltedVideo[x].lasttimetillwatched;
 						}
 					}
 				}
 				//$scope.completedtime = new Date(completedsec * 1000).toISOString().substr(11, 8);

 				var cvideosec = 0;
 				var completedVideo = 0;
 				var totalvideo = 0;
 				for (var f = 0; f < onlyVideolist.length; f++) {
 					if (onlyVideolist[f].videopath) {
 						totalvideo = totalvideo + 1;

 						onlyVideolist[f].completedduartion = 0;
 						if ($scope.alreadycompltedVideo.length > 0) {


 							for (var fc = 0; fc < $scope.alreadycompltedVideo.length; fc++) {


 								if (onlyVideolist[f]._id == $scope.alreadycompltedVideo[fc].video_id) {
 									onlyVideolist[f].completedduartion = $scope.alreadycompltedVideo[fc].lasttimetillwatched;
 									if ($scope.alreadycompltedVideo[fc].is_completed == 'YES') {
 										completedVideo++;
 									}
 								}

 							}
 						}
 						//	onlyVideolist[f].completedduartionHMS = new Date(onlyVideolist[f].completedduartion * 1000).toISOString().substr(11, 8);

 						onlyVideolist[f].completedpercentage = Math.round(((onlyVideolist[f].completedduartion * 100 / onlyVideolist[f].videoduration)));
 						if (isNaN(onlyVideolist[f].videoduration) || onlyVideolist[f].videoduration=='') {
 							 
 							onlyVideolist[f].videoduration = 0;
 						}
 						cvideosec = cvideosec + parseFloat(onlyVideolist[f].videoduration);
 					}
 				}
 				$scope.totalvideo = totalvideo;
 				$scope.completedVideo = completedVideo;
 				//	$scope.videotime = new Date(cvideosec * 1000).toISOString().substr(11, 8);
				 if(cvideosec==0){
					$scope.userdetails.course[indexofcourse].progress =0;
				 }else{
					$scope.userdetails.course[indexofcourse].progress = Math.round(((completedsec * 100) / cvideosec));
				 }
 				


 			 



 			}).catch(function(jsondata) {
 				console.error(jsondata);
 			})




 		}

 		$scope.updatethisCoursetoComplete = function(indexofcourse) {


 			$http({
 				method: 'POST',
 				url: apiurl + 'api/updatethisCoursetoCompleteBecauseAllVideoOrPdfSeen',
 				data: 'courseobj=' + encodeURIComponent(angular.toJson($scope.userdetails.course[indexofcourse])) + '&c_id_int=' + $scope.userdetails.c_id_int + '&_id=' + $scope.userdetails._id + '&course_index=' + indexofcourse,
 				headers: {
 					'Content-Type': 'application/x-www-form-urlencoded'
 				}
 			}).then(function(jsondata) {



 			});




 		}


 	}]);
 	angular.bootstrap(document.getElementById("App2"), ['myApp']);
 </script>