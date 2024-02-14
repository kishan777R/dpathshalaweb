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

if (isset($_GET['i'])) {
} else {
?>
	<script>
		window.location.href = "studentcourses";
	</script>
<?php
}

?>

<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cs-page-title">
					<h1 id="kk2">

						<?php echo $_GET['c']; ?>
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
					<li><a href="studentcourses">My Courses</a></li>

					<li id="kk"><?php echo $_GET['c']; ?></li>
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
						<h3 align="center" ng-show="!arrayOfVideoTopicKey_id">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading <?php echo $_GET['c']; ?> Course Details...
							<br /><br /><br /><br />
						</h3>
						<h3 align="center" ng-show="arrayOfVideoTopicKey_id.length==0">
							<br />


							<br />No details found, Try after sometime !<br /><br />

							<br /><br /><br /><br />
						</h3>
						<div class="row" ng-repeat="key in arrayOfVideoTopicKey_id">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-section-title">
									<h2 style="margin-bottom: 0px">{{arrayOfVideoTopicKey[key][0]['topic_name']}} </h2>
									<em>Progress:</em> {{arrayOfVideoTopicKey[key][0]['progress']}}%<br />
									<small ng-show="arrayOfVideoTopicKey[key][0]['totalvideo']>0">Video - {{arrayOfVideoTopicKey[key][0]['completedVideo'] }}/{{ arrayOfVideoTopicKey[key][0]['totalvideo'] }} | {{ arrayOfVideoTopicKey[key][0]['completedtime']  }} / {{ arrayOfVideoTopicKey[key][0]['videotime']  }}
										<!-- /{{videotime}} -->
									</small>
								</div>
							</div>
							<ul class="cs-shortlisted">
								<li  ng-repeat="obj in arrayOfVideoTopicKey[key]">
									<div class="cs-media">
										<figure><a href="studentcourseslectures?c={{courseobject.course_name}}&i={{user_course_index}}&vi={{obj._id}}"><img src="{{obj.serverpath+obj.imagepath}}" style="height: 100px" alt="" /></a></figure>
									</div>
									<div class="cs-text">

										<h5><a href="studentcourseslectures?c={{courseobject.course_name}}&i={{user_course_index}}&vi={{obj._id}}">{{obj.title}}</a></h5>

										<span class="cs-user-name cs-color" ng-show="obj.videopath!=''"><em>Duration:</em> {{obj.videodurationHMS}}</span><br />
										<span ng-show="obj.show==true && obj.videopath!=''"><em>Progress:</em> {{getPStyle("number",obj)}}%<br /></span>
										<div class="progress-barw" ng-show="obj.show==true && obj.videopath!=''">
											<div class="uploaded" style="{{getPStyle('style',obj)}}"></div>
										</div>
										<a href="studentcourseslectures?c={{courseobject.course_name}}&i={{user_course_index}}&vi={{obj._id}}" ng-show="obj.videopath!=''" data-toggle="tooltip" data-placement="top" title="" class="cs-remove-btn">
											View Lecture
										</a> <a href="studentcourseslectures?c={{courseobject.course_name}}&i={{user_course_index}}&vi={{obj._id}}" ng-show="obj.videopath==''" data-toggle="tooltip" data-placement="top" title="" class="cs-remove-btn">
											Read Lecture
										</a>
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


<?php

include "footer.php";
?><script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {

		$scope.userdetails = undefined;
		$scope.courseobject = undefined;

		$scope.getPStyle = function(type, obj) {
			if($scope.alreadycompltedVideo){

			//
			if ($scope.alreadycompltedVideo.length > 0) {
				for (var x = 0; x < $scope.alreadycompltedVideo.length; x++) {
					var found = false;

					if (obj._id == $scope.alreadycompltedVideo[x].video_id) {
						var completedsec = $scope.alreadycompltedVideo[x].lasttimetillwatched;
						var progress = Math.round(((completedsec * 100) / obj.videoduration));
						if (type == 'number') {
							obj.show = true;
							return progress;
						} else {
							obj.show = true;
							return "width:" + progress + "%";
						}
					}



				}
			} else {


				if (type == 'number') {
					obj.show = true;
					return 0;
				} else {
					obj.show = true;
					return "width:0%";
				}
			}
		}
		}
		$scope.getuserDetails = function(user_course_index) {

			$scope.user_course_index = user_course_index;
			$http.get('insideapi.php?key=userdetails').
			then(function(jsondata) {
				$scope.userdetails = jsondata.data.userdetails;
				if ($scope.userdetails.course.length > 0) {


					for (var tx = 0; tx < $scope.userdetails.course.length; tx++) {

						for (var t = 0; t < $scope.courseList.length; t++) {

							if ($scope.userdetails.course[tx].sub_course_id == $scope.courseList[t]._id) {

								$scope.userdetails.course[tx].course_name = $scope.courseList[t].course_name;
								$scope.userdetails.course[tx].instructor = $scope.courseList[t].instructor;


							}




						}





					}

				}
				if ($scope.userdetails.course[user_course_index] == undefined) {
					window.location.href = 'studentcourses';
				}
				$scope.courseobject = $scope.userdetails.course[user_course_index];

				document.getElementById('kk').innerHTML = $scope.courseobject.course_name;
				document.getElementById('kk2').innerHTML = $scope.courseobject.course_name;
				$scope.getProgress(user_course_index);
			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}



		$scope.getMainCourse = function() {

			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;
				$scope.getuserDetails("<?php echo $_GET['i']; ?>");
			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}
		$scope.getMainCourse();
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


		$scope.getProgress = function(indexofcourse) {

			$http.get(apiurl + 'api/allvideolistofparticularcourse/' + $scope.userdetails.course[indexofcourse].sub_course_id).
			then(function(jsondata) {
				var arrayOfVideoTopicKey = [];
				var arrayOfVideoTopicKey_id = [];
				var onlyVideolist = jsondata.data;
				for (var t = 0; t < onlyVideolist.length; t++) {




					if (arrayOfVideoTopicKey_id.includes(onlyVideolist[t].topic_id)) {
						arrayOfVideoTopicKey[onlyVideolist[t].topic_id].push(onlyVideolist[t]);
					} else {
						arrayOfVideoTopicKey_id.push(onlyVideolist[t].topic_id);
						arrayOfVideoTopicKey[onlyVideolist[t].topic_id] = [];
						arrayOfVideoTopicKey[onlyVideolist[t].topic_id].push(onlyVideolist[t]);
					}

				}
				//


				$scope.arrayOfVideoTopicKey_id = arrayOfVideoTopicKey_id;
				$scope.arrayOfVideoTopicKey = arrayOfVideoTopicKey;
				console.log($scope.arrayOfVideoTopicKey);
				for (var t = 0; t < $scope.arrayOfVideoTopicKey_id.length; t++) {
					$scope.checkIfSubjectIsCompletedOrNot($scope.arrayOfVideoTopicKey[$scope.arrayOfVideoTopicKey_id[t]], $scope.arrayOfVideoTopicKey_id[t]);

				}

			}).catch(function(jsondata) {
				console.error("error in posting");
			})
		}

		$scope.checkIfSubjectIsCompletedOrNot = function(onlyVideolist, indexoftile) {

			$scope.videodataList = onlyVideolist;
			$scope.completedVideo = 0;

			$scope.completedtime = '';
			$scope.videotime = '';


			$http.get(apiurl + 'api/getFromDatabaseThatVideoIsComplete/' + $scope.userdetails.c_id_int).
			then(function(jsondata) {
				res = jsondata.data;





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
				$scope.completedtime = new Date(completedsec * 1000).toISOString().substr(11, 8);

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
						onlyVideolist[f].completedduartionHMS = new Date(onlyVideolist[f].completedduartion * 1000).toISOString().substr(11, 8);

						onlyVideolist[f].completedpercentage = Math.round(((onlyVideolist[f].completedduartion * 100 / onlyVideolist[f].videoduration)));
						if (isNaN(onlyVideolist[f].videoduration) || onlyVideolist[f].videoduration == '') {

							onlyVideolist[f].videoduration = 0;
						}
						cvideosec = cvideosec + parseFloat(onlyVideolist[f].videoduration);
					} else {
						
						 
 							
						
					}
				}
				$scope.totalvideo = totalvideo;
				$scope.completedVideo = completedVideo;
				$scope.videotime = new Date(cvideosec * 1000).toISOString().substr(11, 8);
				if (cvideosec == 0) {
					$scope.arrayOfVideoTopicKey[indexoftile][0].progress = 0;
				} else {
					$scope.arrayOfVideoTopicKey[indexoftile][0].progress = Math.round(((completedsec * 100) / cvideosec));
				}


				$scope.arrayOfVideoTopicKey[indexoftile][0].videotime = $scope.videotime;
				$scope.arrayOfVideoTopicKey[indexoftile][0].completedVideo = $scope.completedVideo;
				$scope.arrayOfVideoTopicKey[indexoftile][0].totalvideo = $scope.totalvideo;
				$scope.arrayOfVideoTopicKey[indexoftile][0].completedtime = $scope.completedtime;



			}).catch(function(jsondata) {
				console.error(jsondata);
			})




		}

	 


	}]);
	angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>