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

if (isset($_GET['i']) and isset($_GET['vi'])) {
} else {
?>
	<script>
		window.location.href = "studentcourses";
	</script>
<?php
}

?>
<?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<!-- Sub Header Start -->
	<div class="page-section" style="background:url(assets/extra-images/sub-header-about-img.jpg); background-size:cover;padding:87px 0 35px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-page-title">
						<h1 style="color:#fff !important;">
							<span id="kk2"> <?php echo $_GET['c']; ?></span>-
							{{lectureobj.topic_name}}
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
						<li><a href="studentcoursestopics?c=<?php echo $_GET['c']; ?>&i={{user_course_index}}" id="kk"><?php echo $_GET['c']; ?></a></li>
						<li>{{lectureobj.topic_name}}</li>


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
				<h3 align="center" ng-show="!lectureobj">
					<br />

					<img src="assets/the-cube-preloader.gif">
					<br />Loading <?php echo $_GET['c']; ?> Course Lecture Details...
					<br /><br /><br /><br />
				</h3>

				<div class="row" ng-show="lectureobj">
					<div class="page-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<br /> <br />
								 
								<h2>{{lectureobj.title}} </h2><br />
								<div class="cs-main-post" ng-show="lectureobj.videopath!=''">
									<div class="cs-media">
										<video id="videoid" ng-if="lectureobj.course_id=='65b52a7b955c45301cecd154'" src="{{lectureobj.serverpath}}{{lectureobj.videopath}}" ng-show="showvideo1" controls controlsList='nodownload' onended="angular.element(this).scope().vidEnded()">
										</video>
										<video id="videoid" ng-if="lectureobj.course_id!='65b52a7b955c45301cecd154'" src="{{lectureobj.videopath}}" ng-show="showvideo1" controls controlsList='nodownload' onended="angular.element(this).scope().vidEnded()">
										</video>
										<img  ng-show="!showvideo1" src="assets/the-cube-preloader.gif" style="height: 40px">
										<h6 ng-show="!showvideo1">
											Browsing video..
										</h6>
									</div>
								</div>
								<div class="cs-main-post" ng-show="lectureobj.pdfpath!=''"> <br />
									<div class="cs-media">

										<a href="{{lectureobj.serverpath}}{{lectureobj.pdfpath}}" target="_blank" download> <i class="icon-file-pdf cs-color"></i> PDF document</a>
									</div>
								</div>

								<div class="cs-main-post" ng-show="lectureobj.supportpath!=''"> <br />
									<div class="cs-media">
										<a href="{{lectureobj.serverpath}}{{lectureobj.supportpath}}" target="_blank" download> <i class="icon-file-text2 cs-color"></i> Supporting document</a>
									</div>
								</div>
								<br />
								<div class="rich_editor_text" id="details">

								</div> <br /> <br />
							</div>

							<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="courseObj.instructor && courseObj.teacherimagepath">

								<div class="cs-about-author">
									<div class="cs-media">
										<figure> <img alt="#" src="{{courseObj.serverpath+courseObj.teacherimagepath}}" style="height: 100px;width:100px"></figure>
									</div>
									<div class="cs-text">
										<div class="post-title">
											<h5>{{courseObj.instructor}}</h5>
											<span>{{courseObj.teacher_occupation}}</span>
										</div>
										<p>

											{{courseObj.teacher_about}}
										</p>

										<div class="cs-social-media">
											<ul>
												<li><i class="icon-email"></i></li>
												<li>{{courseObj.teacher_email}}</li>

											</ul>
										</div>
									</div>
								</div> <br /> <br />
							</div>

						</div>
					</div>
					<aside class="page-sidebar col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<br /> <br />
						<div class="widget widget-latest-news">
							<div class="widget-title">
								<h6>More Videos </h6>
							</div>
							<ul ng-repeat="key in arrayOfVideoTopicKey_id">
								<li ng-repeat="obj in arrayOfVideoTopicKey[key]">
								<span  ng-show="obj._id!=lectureobj._id">
									<a href="studentcourseslectures?c={{courseobject.course_name}}&i={{user_course_index}}&vi={{obj._id}}">
										<div class="cs-media">

											<figure>
												<img src="{{obj.serverpath+obj.imagepath}}" style="border-radius:0;height: 60px;width:60px" alt="" />
											</figure>

										</div>
										<div class="cs-text">
											<div class="post-title">
												<h6>{{obj.title}}</h6>
												<h6>({{obj.topic_name}})</h6>
											</div>
										</div>
									</a>
									<br />

</span>
							 
								<span  ng-show="obj._id==lectureobj._id">
									<div class="cs-media" style="border: 2px solid lightcoral">

										<figure>
											<img src="{{obj.serverpath+obj.imagepath}}" style="border-radius:0;height: 60px;width:60px" alt="" />
										</figure>

									</div>
									<div class="cs-text">
										<div class="post-title">
											<h6 style="color:   lightcoral !important">{{obj.title}}</h6>
											<h6 style="color:   lightcoral !important">({{obj.topic_name}})</h6>
										</div>
									</div>

									<br />
									</span>
								</li>

							</ul>
						</div>

					</aside>
				</div>
			</div>
		</div>
		<h3 align="center" ng-show="lectureobj && FirstTime==undefined">
			<br />

			<img src="assets/the-cube-preloader.gif">

			<br /><br />
		</h3>
		<div class="page-section" style="background-color:#f9f9f9; padding:60px 0 40px 0;">
			<div class="container">

				<div class="row" ng-show="FirstTime==false" style="font-size: 16px;">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<small> Your Question: </small> <br />
						{{ansswerObj.asked_question}}
						<br /> <br />
						<small style="float: right;">
							{{ansswerObj.created_on | date:"medium"}}
						</small>
					</div>
				</div>
				<br />


				<div class="row" ng-show="FirstTime==true || (FirstTime==false && !ansswerObj.answer)">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

								<div class="cs-comment-form">
									<div class="cs-section-title">
										<h3>Ask if you have any doubt !</h3>
									</div>
									<div class="form-holder row">
										<form onsubmit="event.preventDefault();">

											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="input-holder">
													<textarea placeholder="Type Your Question" ng-model="questionOrchat"></textarea>
												</div>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="input-button">
													<input name="name" type="submit" style="float: right" class="cs-button cs-bgcolor" ng-disabled="Questionbuttontext!=='Submit Question'" ng-show="FirstTime==true" value="{{Questionbuttontext}}" ng-click="savemessage()">
													<input name="name" type="submit" style="float: right" class="cs-button cs-bgcolor" ng-disabled="Questionbuttontext2!=='Update Question'" ng-show="FirstTime==false " value="{{Questionbuttontext2}}" ng-click="updateQ()">


												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="row" ng-show="FirstTime==false && ansswerObj.answer && ansswerObj.answer!==''">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<hr />
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="background-color: white">
							<span>

								<div>

									<small> Answer: </small>

									<br />
									<span ng-show="ansswerObj.filePath!='' && ansswerObj.filePath">
										<br />


										<span ng-if="getFileType(ansswerObj.filetype)=='Video'">
											<video style="width: 100%; " src="{{ansswerObj.serverpath+ansswerObj.filePath}}#t=0.1" controls=true controlsList='nodownload'>
											</video>
											<br />
										</span>
										<span ng-if="getFileType(ansswerObj.filetype)=='Audio'">

											<audio style="width: 100%; " src="{{ansswerObj.serverpath+ansswerObj.filePath}}" controls=true controlsList='nodownload'>

											</audio>
											<br />
										</span>
										<span ng-if="getFileType(ansswerObj.filetype)=='Image'">
											<img src="{{ansswerObj.serverpath+ansswerObj.filePath}}" style="width: 100%; " /> <br />
										</span>
										<span ng-if="getFileType(ansswerObj.filetype)=='Docs'">
											<a style="text-decoration: none;color: black;" href="{{ansswerObj.serverpath+ansswerObj.filePath}}" download="" target="_blank">

												Attachment


											</a> <br /> <br />

										</span>
									</span>
									<div ng-bind-html="ansswerObj.answer">

									</div>

									<br />
									<small style="float: right;">
										{{ansswerObj.answergivenon | date:"medium"}}
									</small>
								</div>

							</span>
						</div>
					</div>
				</div>




				<div class="row" ng-show="FirstTime==false && chatArr.length>0">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<hr />

						<span ng-repeat="  cobj in chatArr">



							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 " style="background-color: white" ng-show="cobj.by!=='user'">
								<br />
								<p>
									<span ng-bind-html="cobj.message" style="font-size: 16px;">

									</span> <br /><br />
									<small style="float: right;">
										{{cobj.date | date:"medium"}}
									</small>
								</p><span class="dummy" id="{{cobj._id}}"></span>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="background-color: #207dba !important;" ng-show="cobj.by=='user'">
								<br />
								<p style="color:white !important">
									<span ng-bind-html="cobj.message" style="font-size: 16px;">

									</span>
									<br /> <br />
									<small style="float: right;">
										{{cobj.date | date:"medium"}}
									</small>
								</p> <span class="dummy" id="{{cobj._id}}"></span>
							</div>


							<hr /><br />

						</span>

					</div>
				</div>

				<div class="row" ng-show="FirstTime==false && ansswerObj.answer">
					<br />
					<form onsubmit="event.preventDefault();">
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<textarea placeholder='Your message' ng-model="questionOrchat_1"></textarea>
							<div class="input-button">
								<br />
								<input class="cs-bgcolor buttontypesubmit" style="float: right" ng-disabled="chatmessage!=='Send Message'" type="button" ng-click="savemessage_1();" value="{{chatmessage}}">

							</div>
						</div>
					</form>

				</div>




			</div>

		</div>
		<!-- Main End -->


		<?php

		include "footer.php";
		?><script>
			var app = angular.module('myApp', ["ngSanitize"]);
			app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
				$scope.Questionbuttontext = "Submit Question";
				$scope.Questionbuttontext2 = "Update Question";
				//ask question start
				$scope.showvideo1 = false;
				$scope.getFileType = function(filetype) {
					if (filetype) {
						var str = filetype;
						var n = str.includes('video');
						if (n) {
							return "Video";
						} else {
							var n = str.includes('image');
							if (n) {
								return "Image";
							} else {
								var n = str.includes('audio');
								if (n) {
									return "Audio";
								} else {
									return "Docs";
								}
							}
						}
					}
				}
				$scope.askStartInitialLize = function() {



					$scope.sub_course_id = $scope.lectureobj.sub_course_id;
					$scope.course_id = $scope.lectureobj.course_id;

					$scope.showvideo = false;
					$scope.searchobj = {
						"video_id": $scope.lectureobj._id
					};

					setTimeout(function() {
						$scope.getAnswerAndChat();
					}, 1000);


					$scope.extraobject = {
						"answer_seen_by_user": true,
						"tablestatus": "TRUE",
						"seen_by_admin": false,
						"chat": [],
						"sub_course_id": $scope.sub_course_id,
						"course_id": $scope.course_id,
						"asked_question": "",
						"module": "Video",
						"video_id": $scope.lectureobj._id,
						"video": $scope.lectureobj.title
					};


				}

				//
				$scope.FirstTime = undefined;
				$scope.getAnswerAndChat = function() {


					$http({
						method: 'POST',
						url: apiurl + 'api/askedQuestionByOBJ',
						data: "video_id=" + $scope.lectureobj._id,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						}
					}).then(function(jsondata) {
						var res = jsondata.data;
						if (res && res != null) {
							$scope.ansswerObj = res;
							$scope.FirstTime = false;
							$scope.referenceid = $scope.ansswerObj._id;
							$scope.getAnswerAsked_chat();
							if (!$scope.ansswerObj.answer) {
								$scope.toastermessage = "Waiting for answer of your question from admin!";
								$scope.showtoasterNotify('NORMAL');

							}
						} else {
							$scope.FirstTime = true;
						}
					}).catch(function(jsondata) {
						console.error("error in posting asked");
					});





				}
				//
				$scope.getAnswerAsked_chat = function() {



					$http.get(apiurl + 'api/askedQuestion_chatByRId/' + $scope.referenceid).
					then(function(jsondata) {
						var res = jsondata.data;
						$scope.chatArr = res;

						for (var d = 0; d < $scope.chatArr.length; d++) {
							if ($scope.chatArr[d].by == 'Admin') {
								if ($scope.chatArr[d].seen_by_respective == false) {
									$scope.howmanyunreadchat++;
								}
							}
							$scope.lastdivid = $scope.chatArr[d]._id;

						}
						if ($scope.chatting) {
							$scope.scroll();

						}
					}).catch(function(jsondata) {
						console.error("error in getting");
					})





				}
				$scope.savemessage = function() {

					if ($scope.questionOrchat == '' || $scope.questionOrchat == undefined) {
						return false;
					}

					$scope.extraobject.asked_question = $scope.questionOrchat;
					$scope.extraobject.c_id_int = $scope.userdetails.c_id_int;
					$scope.extraobject.created_on = new Date();

					$scope.extraobject.created_by = -1;
					$scope.extraobject.websitelinkofquestionforuser = "<?php echo  $actual_link; ?>";
					$scope.Questionbuttontext = "Submitting...";

					$http({
						method: 'POST',
						url: apiurl + 'api/saveAskedQuestion_website',
						data: "qdetils=" + encodeURIComponent(angular.toJson($scope.extraobject)),
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						}
					}).then(function(jsondata) {
						var res = jsondata.data;
						$scope.Questionbuttontext = "Submit Question";
						if (res.status == 'ERROR') {
							$scope.toastermessage = res.message;
							$scope.showtoaster('ERROR');

						} else {

							$scope.titleforaskquestion = $scope.questionOrchat;
							$scope.questionOrchat = '';

							$scope.referenceid = res.askedquestionrow._id;
							$scope.FirstTime = false;
							$scope.ansswerObj = res.askedquestionrow;

						}
					}).catch(function(jsondata) {
						console.error("error in posting asked");
					});








				}
				$scope.chatmessage = "Send Message";
				$scope.savemessage_1 = function() {

					if ($scope.questionOrchat_1 == '' || $scope.questionOrchat_1 == undefined) {
						return false;
					}


					$scope.chatmessage = "Sending..";


					$http({
						method: 'POST',
						url: apiurl + 'api/saveAskedQuestion_chat',
						data: "created_by=-1&message=" + $scope.questionOrchat_1 + "&by=user&referenceid=" + $scope.referenceid,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						}
					}).then(function(jsondata) {
						$scope.chatmessage = "Send Message";
						var res = jsondata.data;
						if (res.status == 'ERROR') {
							$scope.toastermessage = res.message;
							$scope.showtoaster('ERROR');

						} else {

							if (res.status == 'ERROR') {
								$scope.toastermessage = res.message;
								$scope.showtoaster('ERROR');

							} else {
								$scope.getAnswerAsked_chat();
								$scope.questionOrchat_1 = '';



							}

						}
					}).catch(function(jsondata) {
						console.error("error in posting asked");
					});






				}

				$scope.updateQ = function() {
					if ($scope.questionOrchat == '' || $scope.questionOrchat == undefined) {
						return false;
					}




					$http({
						method: 'POST',
						url: apiurl + 'api/updayteAskedQuestion',
						data: "updated_by=-1&message=" + $scope.questionOrchat + "&by=user&referenceid=" + $scope.referenceid,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						}
					}).then(function(jsondata) {
						var res = jsondata.data;

						if (res.status == 'ERROR') {
							$scope.toastermessage = res.message;
							$scope.showtoaster('ERROR');

						} else {

							$scope.titleforaskquestion = $scope.questionOrchat;
							$scope.ansswerObj.asked_question = $scope.questionOrchat;
							$scope.questionOrchat = '';
						}


					}).catch(function(jsondata) {
						console.error("error in updating post asked");
					});





				}

				$scope.scroll = function() {


					setTimeout(() => {
						// var items = document.querySelectorAll(".dummy");
						// var last = items[items.length - 1];
						// last.scrollIntoView();
					}, 100)


				}
				// ask question end


				$scope.userdetails = undefined;
				$scope.courseobject = undefined;

				$scope.getPStyle = function(type, obj) {

					//
					if ($scope.alreadycompltedVideo) {


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


				$scope.getuserDetails = function(user_course_index, videoid) {

					$scope.videoid = videoid;
					$scope.user_course_index = user_course_index;
					$http.get('<?php echo $server;?>insideapi.php?key=userdetails').
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
						for (var t = 0; t < $scope.courseList.length; t++) {
							if ($scope.courseList[t].parent_course !== '0') {

								if ($scope.courseList[t]._id == $scope.courseobject.sub_course_id) {

									$scope.courseObj = $scope.courseList[t];


								}

							}


						}
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
						$scope.getuserDetails("<?php echo $_GET['i']; ?>", "<?php echo $_GET['vi']; ?>");
					}).catch(function(jsondata) {
						console.error("error in posting");
					})

				}
				$scope.getMainCourse();
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
					} else if (wht == 'NORMAL') {
						x.style.backgroundColor = "black";
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
			} else if (wht == 'NORMAL') {
						x.style.backgroundColor = "black";
					}else {
				x.style.backgroundColor = "red";
			}




			setTimeout(function() {
				x.className = x.className.replace("show", "");
			}, 3000);
		}
				$scope.lectureobj = undefined;

				$scope.getProgress = function(indexofcourse) {

					$http.get(apiurl + 'api/allvideolistofparticularcourse/' + $scope.userdetails.course[indexofcourse].sub_course_id).
					then(function(jsondata) {
						var arrayOfVideoTopicKey = [];
						var arrayOfVideoTopicKey_id = [];
						var onlyVideolist = jsondata.data;
						for (var t = 0; t < onlyVideolist.length; t++) {
							if ($scope.videoid == onlyVideolist[t]._id) {
								$scope.lectureobj = onlyVideolist[t];

								document.getElementById('details').innerHTML = $scope.lectureobj.details;
							}



							if (arrayOfVideoTopicKey_id.includes(onlyVideolist[t].topic_id)) {
								arrayOfVideoTopicKey[onlyVideolist[t].topic_id].push(onlyVideolist[t]);
							} else {
								arrayOfVideoTopicKey_id.push(onlyVideolist[t].topic_id);
								arrayOfVideoTopicKey[onlyVideolist[t].topic_id] = [];
								arrayOfVideoTopicKey[onlyVideolist[t].topic_id].push(onlyVideolist[t]);
							}

						}
						//
						if ($scope.lectureobj == undefined) {
							window.location.href = 'studentcourses';
						} else {
							$scope.askStartInitialLize();
						}
						if ($scope.lectureobj.videopath == '' || $scope.lectureobj.videopath == null) {
							setTimeout(function() {
								$scope.updateInDatabaseThatVideoIsComplete($scope.lectureobj._id, $scope.userdetails.c_id_int, -1, 'YES')
							}, 1000);
						} else {
							setTimeout(function() {
								$scope.updatetimeregulary();

							}, 1000);
							var myvideo = document.getElementById('videoid');
							var b = setInterval(() => {
								if (myvideo.readyState >= 3) {
									$scope.showvideo1 = true;
									clearInterval(b);

								}
							}, 100);
						}

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
				$scope.vidEnded = function() {
					var myvideo = document.getElementById('videoid');

					$scope.updateInDatabaseThatVideoIsComplete($scope.lectureobj._id, $scope.userdetails.c_id_int, myvideo.currentTime, 'YES');
				}
				$scope.updatetimeregulary = function() {


					var myvideo = document.getElementById('videoid');

					$scope.updateInDatabaseThatVideoIsComplete($scope.lectureobj._id, $scope.userdetails.c_id_int, myvideo.currentTime, 'NO');

				}
				$scope.updateInDatabaseThatVideoIsComplete = function(video_id, c_id_int, lasttimetillwatched, is_completed) {


					$http({
						method: 'POST',
						url: apiurl + 'api/updateInDatabaseThatVideoIsComplete',
						data: 'is_completed=' + is_completed + '&video_id=' + video_id + '&c_id_int=' + c_id_int + '&lasttimetillwatched=' + lasttimetillwatched,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						}
					}).then(function(jsondata) {
						if (is_completed == 'NO') {
							setTimeout(function() {
								$scope.updatetimeregulary();
							}, 5000);

						}
					}).catch(function(jsondata) {
						console.error("error in posting b");
					});
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

								if ($scope.alreadycompltedVideo[x].video_id == $scope.lectureobj._id) {
									var myvideo = document.getElementById('videoid');

									myvideo.currentTime = $scope.alreadycompltedVideo[x].lasttimetillwatched;
								}
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
			//angular.bootstrap(document.getElementById("App2"), ['myApp']);
		</script>