<?php
include "header.php";
if (isset($_GET['_id'])) {
	$_id = $_GET['_id'];
} else {
?>
	<script>
		window.location.href = "courses";
	</script>
<?php
}

?>
<!-- Sub Header Start -->
<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-page-title">
						<h1>{{courseObj.course_name}} Course Detail</h1>
						<p style="color:#aaa;">{{courseObj.sub_title}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Sub Header End -->
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="courses">Courses</a></li>
						<li><a href="#"> {{courseObj.course_name}}</a></li>

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
				<div class="row" ng-show="courseObj">

					<aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="widget cs-widget-links">

							<ul>
								<li ng-repeat="obj in courseObj.describeArr  ;   " ng-if="obj.headingvalue!=''"><a href="#h{{$index}}">{{obj.headingvalue}}</a></li>

								<li><a href="#instrucors" ng-show="courseObj.instructor && courseObj.teacherimagepath">Instructors</a></li>

								<li><a href="#cs-related-post" ng-show="related.length>0">Related Courses</a></li>

							</ul>
							<div class="cs-price">
								<span><em>Price</em>&#8377; {{courseObj.amount | number : 2 }}<del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount">&#8377; {{courseObj.pre_amount | number : 2 }}</del></span>
							</div>



							<input class="cs-bgcolor buttontypesubmit" ng-show=" alreadypurchased==true" disabled type="button" value="Already purchased">
							<input class="cs-bgcolor buttontypesubmit" ng-show="addedToCart==false && alreadypurchased==false" type="button" ng-click="addtocart()" value="Add to cart">
							<input class="cs-bgcolor buttontypesubmit" ng-show="addedToCart==true && alreadypurchased==false" type="button" ng-click="removefromcart()" value="Remove from cart"><br /><br />





						</div>
						<div class="cs-review-summary">
							<div class="review-average-score">
								<em class="cs-color">{{courseObj.rating }}</em>
								<span class="cs-overall-rating">Overall Ratings</span>
								<div class="cs-rating">
									<div class="cs-rating-star">
										<span style="{{courseObj.ratingstyle}};" class="rating-box"></span>
									</div>
								</div>
							</div>
							<br />
						</div>

					</aside>
					<div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div id="cs-about" class="cs-about-courses">
									<br />
									<div class="row">
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
											<div class="cs-section-title">
												<h3>About the Course</h3>
											</div>

											<span ng-repeat="obj in courseObj.describeArr  ;   ">

												<span ng-if="$index==0">
													<small ng-show=" !obj.accordian">



														<h5 ng-if=" obj.headingvalue!=''" id="h{{$index}}">
															{{ obj.headingvalue }}

														</h5>

														<span ng-repeat="  objPoint in obj.pointsArr ;  ">


															<small ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


																<small ng-show="obj.checkbox=='TRUE'">



																	<ul class="cs-list-style" style="margin: 0px">
																		<li><i class=" cs-color icon-arrow-right22"></i>
																			<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																				<small ng-show=" objPointWord.perword!==''">
																					<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																						{{ objPointWord.perword }} </small>
																					<small ng-show=" objPointWord.perword=='<br/>'">
																						<br /></small></small></span>


																		</li>

																	</ul>

																</small>

																<small ng-show="obj.checkbox=='FALSE'">
																	<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																		<small ng-show=" objPointWord.perword!==''">
																			<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																				{{ objPointWord.perword }}

																			</small>

																			<small ng-show=" objPointWord.perword=='<br/>'">

																				<br />
																			</small>

																		</small>



																	</span>
																	<br /><br />
																</small>




															</small>

															<small ng-show=" objPoint.pointvalue=='<br/>'">
																<br />

															</small>

														</span>

														<br>





													</small>



												</span>

											</span>


										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="cs-media" ng-show="courseObj.thumbnailpath && courseObj.demovideopath">
												<figure>
													<a href="javascript:;" data-toggle="modal" data-target="#demovideo" data-dismiss="modal" class="cs-color" aria-hidden="true">
														<img alt="#" src="{{courseObj.serverpath+courseObj.thumbnailpath}}" style="height: 150px;width:100%;">


													</a>

												</figure>
											</div>
											<div class="cs-courses-overview">
												<ul>
													<li><i class=" icon-uniF109"></i> Duration:<span> {{courseObj.duration}} {{courseObj.duration_type}}(s)
														</span></li>


													<li ng-show="courseObj.language"><i class="icon-speaker"></i>Language: <span>{{courseObj.language}}</span></li>
													<li ng-show="courseObj.skilllevel"><i class="icon-uniF101"></i>Skill level: <span>{{courseObj.skilllevel}}</span></li>
													<li ng-show="courseObj.studentnumber"><i class="icon-user"></i>Students: <span>{{courseObj.studentnumber}}</span></li>
													<li><i class=" icon-uniF10A "></i>Certificate: <span>Yes</span></li>
													<li><i class="icon-uniF104"></i>Assessments: <span>Yes</span></li>
												</ul>

											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<br />
											<span ng-repeat="obj in courseObj.describeArr  ;   ">

												<span ng-if="$index>0">
													<small ng-show=" !obj.accordian">



														<h5 ng-if=" obj.headingvalue!=''" id="h{{$index}}">
															{{ obj.headingvalue }}

														</h5>


														<span ng-repeat="  objPoint in obj.pointsArr ;  ">


															<small ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


																<small ng-show="obj.checkbox=='TRUE'">



																	<ul class="cs-list-style" style="margin: 0px">
																		<li><i class=" cs-color icon-arrow-right22"></i>
																			<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																				<small ng-show=" objPointWord.perword!==''">
																					<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																						{{ objPointWord.perword }} </small>
																					<small ng-show=" objPointWord.perword=='<br/>'">
																						<br /></small></small></span>


																		</li>

																	</ul>

																</small>

																<small ng-show="obj.checkbox=='FALSE'">
																	<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																		<small ng-show=" objPointWord.perword!==''">
																			<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																				{{ objPointWord.perword }}

																			</small>

																			<small ng-show=" objPointWord.perword=='<br/>'">

																				<br />
																			</small>

																		</small>



																	</span>
																	<br />
																</small>




															</small>

															<small ng-show=" objPoint.pointvalue=='<br/>'">
																<br />

															</small>

														</span>

														<br>





													</small>
													<small ng-show="obj.accordian">


														<div class="row">
															<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
																<h5 ng-if=" obj.headingvalue!=''" id="h{{$index}}">
																	{{ obj.headingvalue }}

																</h5>
															</div>
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
																<img class="imgclass width100percent" ng-show="!obj.showingpoint" ng-click="obj.showingpoint=!obj.showingpoint" src="assets/images/down.png" style="width: 24px;height: 24px;" alt="">
																<img class="imgclass width100percent" ng-show="obj.showingpoint" ng-click="obj.showingpoint=!obj.showingpoint" src="assets/images/up.png" style="width: 24px;height: 24px;" alt="">

															</div>

														</div>



														<span ng-repeat="  objPoint in obj.pointsArr ;  " ng-show="obj.showingpoint">


															<small ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


																<small ng-show="obj.checkbox=='TRUE'">



																	<ul class="cs-list-style" style="margin: 0px">
																		<li><i class=" cs-color icon-arrow-right22"></i>
																			<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																				<small ng-show=" objPointWord.perword!==''">
																					<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																						{{ objPointWord.perword }} </small>
																					<small ng-show=" objPointWord.perword=='<br/>'">
																						<br /></small></small></span>


																		</li>

																	</ul>

																</small>

																<small ng-show="obj.checkbox=='FALSE'">
																	<span ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																		<small ng-show=" objPointWord.perword!==''">
																			<small style="font-size:14px " ng-show=" objPointWord.perword!=='<br/>'">
																				{{ objPointWord.perword }}

																			</small>

																			<small ng-show=" objPointWord.perword=='<br/>'">

																				<br />
																			</small>

																		</small>



																	</span>
																	<br />
																</small>




															</small>

															<small ng-show=" objPoint.pointvalue=='<br/>'">
																<br />

															</small>

														</span>

														<br>





													</small>



												</span>

											</span>




										</div>
									</div>
								</div>

							</div>
							<div id="instrucors" ng-show="courseObj.instructor && courseObj.teacherimagepath">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h3>Course Instructor</h3>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-team listing">
										<div class="cs-media" ng-show="courseObj.teacherimagepath">
											<figure>
												<img alt="#" src="{{courseObj.serverpath+courseObj.teacherimagepath}}" style="height: 150px;width:100%">
											</figure>
										</div>
										<div class="cs-text">
											<h5>{{courseObj.instructor}}</h5>
											<span>{{courseObj.teacher_occupation}}</span>
											<p>

												{{courseObj.teacher_about}}
											</p>
											<div class="cs-social-media" ng-show="courseObj.teacher_email">
												<ul>
													<li><i class="icon-email"></i></li>
													<li>{{courseObj.teacher_email}}</li>

												</ul>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div id="cs-related-post" class="cs-related-post" ng-show="related.length>0">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h3>Related Course</h3>
									</div>
								</div>
								<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12" ng-repeat="courseObj1 in related">
									<div class="cs-courses courses-grid">
										<div class="cs-media">
											<figure><a href="coursedetails?_id={{courseObj1._id}}&name={{courseObj1.course_name}}"><img style="height: 272px" src="{{courseObj1.serverpath+courseObj1.imagepath}}" alt="" /></a></figure>
										</div>
										<div class="cs-text">

											<div class="cs-rating">
												<div class="cs-rating-star">
													<span class="rating-box" style="{{courseObj1.ratingstyle}};"></span>
												</div>
											</div>
											<div class="cs-post-title">
												<h5><a href="coursedetails?_id={{courseObj1._id}}&name={{courseObj1.course_name}}"> {{courseObj1.course_name}}</a></h5>
											</div>
											<span class="cs-courses-price"> &#8377; {{courseObj1.amount | number : 2}} <del ng-show="courseObj1.pre_amount && courseObj1.pre_amount>courseObj1.amount"><small style="opacity:0.7">&#8377; {{courseObj1.pre_amount | number : 2 }}</small></del></span>
											<div class="cs-post-meta">
												<span>By
													<b class="cs-color">{{courseObj1.instructor}}</b>

												</span>
												<i style="font-size:20px;float:right;cursor:pointer;color:green;" ng-show=" courseObj1.alreadypurchased==true" title="Already Purchased" class="icon-check"></i>

												<i style="font-size:15px;float:right;cursor:pointer" ng-show="courseObj1.addedToCart==false && courseObj1.alreadypurchased==false" title="Add to cart" ng-click="addtocartListWala(courseObj1)" class="icon-cart"></i>
												<i style="font-size:15px;float:right;color:red;cursor:pointer" ng-show="courseObj1.addedToCart==true && courseObj1.alreadypurchased==false" ng-click="removefromcartListWala(courseObj1)" title="Remove from cart" class="icon-cart"></i>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<h3 align="center" ng-show="!courseObj">
					<br />

					<img src="assets/the-cube-preloader.gif">
					<br />Loading Course Details...
					<br /><br /><br /><br />
				</h3>
			</div>
		</div>

	</div>
	<span id="getcartlistid" ng-click="getCartList('<?php echo  $_id; ?>'); "></span>


	<div class="modal fade" id="demovideo" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">




					<video id="videoid" src="{{courseObj.serverpath}}{{courseObj.demovideopath}}" style="max-height:500px;width:100%" controls controlsList='nodownload'>
					</video>

				</div>

			</div>
		</div>
	</div>

</div>
<!-- Main End -->
<?php
include "footer.php";

?> <script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
		$scope.courseObj = undefined;


		$scope.removefromcart = function() {

			$http({
				method: 'GET',
				url: 'insideapi.php?sub_course_id=' + $scope.courseObj._id + '&key=removefromcart',
				data: '',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.submiting = false;
				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					$scope.toastermessage = $scope.suc = jsondata.data.message;
					$scope.showtoaster('SUCCESS');
					$scope.addedToCart = false;
					$scope.cartList = jsondata.data.cartList;
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
					if($scope.cartList){
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}
					

					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}

		$scope.addtocart = function() {

			$http({
				method: 'POST',
				url: 'insideapi.php',
				data: 'amount=' + $scope.courseObj.amount + '&sub_course_name=' + $scope.courseObj.course_name + '&course_id=' + $scope.courseObj.parent_course + '&sub_course_id=' + $scope.courseObj._id + '&key=addtocart',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.submiting = false;

				 
				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					$scope.toastermessage = $scope.suc = jsondata.data.message;
					$scope.showtoaster('SUCCESS');
					$scope.addedToCart = true;
					$scope.cartList = jsondata.data.cartList;
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
					if($scope.cartList){
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}
					 
					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}
		$scope.removefromcartListWala = function(courseObjW) {

			$http({
				method: 'GET',
				url: 'insideapi.php?sub_course_id=' + courseObjW._id + '&key=removefromcart',
				data: '',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.submiting = false;
				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					$scope.toastermessage = $scope.suc = jsondata.data.message;
					$scope.showtoaster('SUCCESS');
					courseObjW.addedToCart = false;
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
					$scope.cartList = jsondata.data.cartList;
					if($scope.cartList){
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}
			 

					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}

		$scope.addtocartListWala = function(courseObjW) {

			$http({
				method: 'POST',
				url: 'insideapi.php',
				data: 'amount=' + courseObjW.amount + '&sub_course_name=' + courseObjW.course_name + '&sub_course_id=' + courseObjW._id + '&course_id=' + courseObjW.parent_course + '&key=addtocart',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.submiting = false;
				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					$scope.toastermessage = $scope.suc = jsondata.data.message;
					$scope.showtoaster('SUCCESS');
					courseObjW.addedToCart = true;
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
					$scope.cartList = jsondata.data.cartList;
					if($scope.cartList){
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}
					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}


		$scope.getMainCourse = function(subcourseid) {

			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;


				for (var t = 0; t < $scope.courseList.length; t++) {
					if ($scope.courseList[t].parent_course !== '0') {

						if ($scope.courseList[t]._id == subcourseid) {
							for (var tw = 0; tw < $scope.courseList[t].describeArr.length; tw++) {
								if ($scope.courseList[t].describeArr[tw].checkbox == '') {
									$scope.courseList[t].describeArr[tw].checkbox = "FALSE";
								} else {
									$scope.courseList[t].describeArr[tw].checkbox = "TRUE";
								}


							}
							var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
							$scope.courseList[t].ratingstyle = "width:" + rr;
							$scope.courseObj = $scope.courseList[t];


						}

					}


				}
				if ($scope.courseObj == undefined) {
					window.location.href = "courses";
				} else {
					$scope.subcourseid = subcourseid;
					$scope.getrelatedcourses();
				}




			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.related = [];

		$scope.getrelatedcourses = function() {

			for (var t = 0; t < $scope.courseList.length; t++) {

				if ($scope.courseList[t]._id == $scope.courseObj.parent_course) {

					var perCourseOBJ = $scope.courseList[t];

					break;

				}




			}
			var categoryArr = $scope.courseList;
			var subcourseid = $scope.subcourseid;
			$scope.related = [];
			// to get upper parent
			if (perCourseOBJ.upper_level_id == '') {
				var parentIdArr = [];
				parentIdArr.push(perCourseOBJ._id);
			} else {
				var levelofthiscourse = perCourseOBJ.level_number;

				var _id = perCourseOBJ.upper_level_id;
				var coursenaneArr = [];
				var parentIdArr = [];
				coursenaneArr.push(perCourseOBJ.course_name);
				parentIdArr.push(perCourseOBJ._id);
				for (var t = levelofthiscourse - 1; t >= 1; t--) {
					for (var x = 0; x < categoryArr.length; x++) {
						if (_id == categoryArr[x]._id) {
							coursenaneArr.push(categoryArr[x].course_name);
							parentIdArr.push(categoryArr[x]._id);
							var _id = categoryArr[x].upper_level_id;
						}
					}
				}



			}

			// to get upper


			/// to get lower
			if (perCourseOBJ.is_it_last_level) {

			} else {
				var levelofthiscourse = perCourseOBJ.level_number;
				var upper_level_id = perCourseOBJ._id;
				for (var t = levelofthiscourse + 1; t <= 100; t++) {
					for (var x = 0; x < categoryArr.length; x++) {
						if (upper_level_id == categoryArr[x].upper_level_id) {
							parentIdArr.push(categoryArr[x]._id);
							var upper_level_id = categoryArr[x]._id;
							if (categoryArr[x].is_it_last_level) {
								break;
							}
						}
					}

				}
			}

			// to get lower  end

			for (var t = 0; t < $scope.courseList.length; t++) {
				if ($scope.courseList[t]._id !== subcourseid) {
					if (parentIdArr.includes($scope.courseList[t].parent_course)) {

						$scope.related.push($scope.courseList[t]);



					}
				}




			}


			$scope.managerelated();



		}
		$scope.cartList = [];
			$scope.already_purchased_course_id_array = [];
			$scope.addedToCart = false;
			$scope.alreadypurchased = false;
		$scope.getCartList = function(subcourseid) {
		
			
			$http.get('insideapi.php?key=cartlist').
			then(function(jsondata) {

				$scope.cartList = jsondata.data.cartList;
				$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;

				if ($scope.cartList) {
					document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					for (var t = 0; t < $scope.cartList.length; t++) {


						if ($scope.cartList[t].sub_course_id == subcourseid) {

							$scope.addedToCart = true;
							break;
						}



					}
				} else {
				 
				}
				if ($scope.already_purchased_course_id_array) {
					for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


						if ($scope.already_purchased_course_id_array[tx] == subcourseid) {

							$scope.alreadypurchased = true;
							break;
						}




					}
				}
				if ($scope.related.length > 0) {
					$scope.managerelated();
				}

			}).catch(function(jsondata) {
				console.error("error in posting 2");

				console.log(jsondata);
			})

		}

		$scope.managerelated = function() {
			for (var t = 0; t < $scope.related.length; t++) {
				$scope.related[t].addedToCart = false;
				$scope.related[t].alreadypurchased = false;
				for (var tx = 0; tx < $scope.cartList.length; tx++) {


					if ($scope.cartList[tx].sub_course_id == $scope.related[t]._id) {

						$scope.related[t].addedToCart = true;
						break;
					}




				}

				for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


					if ($scope.already_purchased_course_id_array[tx] == $scope.related[t]._id) {

						$scope.related[t].alreadypurchased = true;
						break;
					}




				}
			}
			console.log($scope.related);
		}
		$scope.getMainCourse('<?php echo $_id; ?>');
		$scope.getCartList('<?php echo $_id; ?>');


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



	}]);
</script>