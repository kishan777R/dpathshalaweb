<style>

</style>

<div class="cs-user-sidebar" ng-app="myAppPic" ng-controller="myCtrlPic" ng-cloak>
	<div class="cs-profile-pic">



		<div class="profile-pic">
			<div class="cs-media">
				<?php
				if ($_SESSION['studentdata']['image_path'] && $_SESSION['studentdata']['image_path'] != '') {
				?>
					<figure> <img src="<?php echo $_SESSION['studentdata']['serverpath'] . "" . $_SESSION['studentdata']['image_path']; ?>" alt="" id="profilepicsrc" /> </figure>
				<?php


				} else {
				?><figure> <img src="assets/images/avatar.png" alt="" id="profilepicsrc" /> </figure>
				<?php
				}

				?>

			</div>
		</div>
		<div class="cs-browse-holder"> <em>My Profile Photo</em>
			<span class="file-input btn-file">
				<span onclick="document.getElementById('image').click()">
					Update Avatar
				</span>

				<input type="file" style="display: none" ng-model-instant id="image" onchange="angular.element(this).scope().setFiles(this)" accept="image/*" />
			</span>
			<div ng-show="progressVisible && files.length">
				<h6 align="center" style="color: black"><br />&nbsp;{{progress}}%</h6>

			</div>
		</div>




	</div>
	<div class="cs-usser-account-list">
		<ul>
			<li class="<?php echo checkifthispage("profile"); ?>"><a href="<?php echo $server; ?>profile"><i class="icon-user cs-color"></i>Profile</a></li>

			<?php

			if ($_SESSION['login_user_type'] == 'STUDENT') {
			?>
				<li class="<?php echo checkifthispage("studentcourses"); ?>"><a href="<?php echo $server; ?>studentcourses"><i class="icon-graduation-cap cs-color"></i>My Courses</a></li>

				<li class="<?php echo checkifthispage("usersummary"); ?>"><a href="<?php echo $server; ?>usersummary"><i class="icon-file-text2 cs-color"></i>Statement</a></li>
				<li class="<?php echo checkifthispage("studentbankingdetails"); ?>"><a href="<?php echo $server; ?>studentbankingdetails"><i class="icon-bank cs-color"></i>Banking</a></li>

				<li class="<?php echo checkifthispage("notifications"); ?>"><a href="<?php echo $server; ?>notifications"><i class="icon-bell cs-color"></i>Notifications<?php
																																											if ($newNoti > 0) {
																																											?> <span class="badge  btn-danger" style="margin-left: 0px"><?php echo $newNoti; ?></span>
					<?php
																																											}
					?></a>


				</li>
			<?php

			}
			?>

			<li class="<?php echo checkifthispage("affiliatestats"); ?>"><a href="<?php echo $server; ?>affiliatestats"><i class="icon-chart cs-color"></i>Affiliate Stats</a></li>
			<li class="<?php echo checkifthispage("affiliatelink"); ?>"><a href="<?php echo $server; ?>affiliatelink"><i class="icon-link cs-color"></i>Affiliate Link</a></li>

		</ul>
		<a href="logout" class="cs-logout"><i class="icon-log-out cs-color"></i>Logout</a>
	</div>
</div>

<?php
function checkifthispage($page)
{
	$url = $_SERVER['REQUEST_URI'];


	$pos = strpos($url, $page);
	if ($pos === false) {
		return "";
	} else {
		return "active";
	}
}

?>

<script>
	var myAppPic = angular.module('myAppPic', []);
	myAppPic.controller('myCtrlPic', ['$scope', '$http', function($scope, $http) {
		//////////////file upoad
		$scope.fileuploadingstatus = false;
		$scope.setFiles = function(element) {
			if ($scope.fileuploadingstatus == true) {
				alert("Wait while other file uploading !");
				return false;

			}
			$scope.error = '';
			$scope.suc = '';
			$scope.fileuploadingstatus = true;
			$scope.$apply(function(scope) {
				console.log('files:', element.files);
				// Turn the FileList object into an Array
				$scope.files = []
				for (var i = 0; i < element.files.length; i++) {
					$scope.files.push(element.files[i])
				}

				$scope.progressVisible = false;
				$scope.uploadFile(element.id);
			});
		};

		$scope.uploadFile = function(uploadingwhat) {
			var fd = new FormData()
			for (var i in $scope.files) {
				fd.append("profile", $scope.files[i]);
			}
			$scope.uploadingwhat = uploadingwhat;
			fd.append("uploadingwhat", uploadingwhat);
			fd.append("c_id_int", "<?php echo $_SESSION['studentdata']['c_id_int'] ?>");


			var xhr = new XMLHttpRequest()
			xhr.upload.addEventListener("progress", $scope.uploadProgress, false)
			xhr.addEventListener("load", $scope.uploadComplete, false)
			xhr.addEventListener("error", $scope.uploadFailed, false)
			xhr.addEventListener("abort", $scope.uploadCanceled, false)
			xhr.open("POST", apiurl + "api/uploadstudentprofilepic")
			$scope.progressVisible = true
			xhr.send(fd)
		}

		$scope.uploadProgress = function(evt) {
			$scope.$apply(function() {
				if (evt.lengthComputable) {
					$scope.progress = Math.round(evt.loaded * 100 / evt.total);

				} else {
					$scope.progress = 'unable to compute';
					$scope.fileuploadingstatus = false;
				}
			})
		}


		$scope.uploadComplete = function(evt) {
			/* This event is raised when the server send back a response */

			var res = JSON.parse(evt.target.responseText);
			$scope.serverpath = res.serverpath;
			$scope.imagepathShow = res.filePath;
			$scope.image_path = res.video_image_path;
			document.getElementById('profilepicsrc').src = $scope.imagepathShow;
			document.getElementById('profilepicsrcHeader').src = $scope.imagepathShow;

			$scope.progressVisible = false;
			$scope.showtoaster2('SUCCESS', 'Profile Image Updated !');
			$scope.fileuploadingstatus = false;
			$scope.updateImagePath();
		}


		$scope.showtoaster2 = function(wht, toastermessage) {
			var ismobile = document.getElementById("ismobile").value;
			if (ismobile == 'NO') {
				var x = document.getElementById("snackbar");
			} else {
				var x = document.getElementById("snackbarM");
			}
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


		$scope.updateImagePath = function() {
			$http({
				method: 'POST',
				url: 'insideapi',
				data: 'image_path=' + $scope.image_path + "&serverpath=" + $scope.serverpath + "&key=updateImagePath",
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {





			});
		}

		$scope.uploadFailed = function(evt) {
			alert("There was an error attempting to upload the file.");

			$scope.fileuploadingstatus = false;
		}

		$scope.uploadCanceled = function(evt) {
			$scope.$apply(function() {
				$scope.progressVisible = false
			})
			alert("The upload has been canceled by the user or the browser dropped the connection.");

			$scope.fileuploadingstatus = false;
		}

		///// file upload end
	}]);
</script>