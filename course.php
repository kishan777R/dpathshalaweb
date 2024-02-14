<?php
include "header.php";
if (isset($_GET['_id'])) {
	$_id = $_GET['_id'];
} else {
	$_id = '';
	?>
	<script>
		//	window.location.href = "courses";
	</script>
	<?php
}
if (isset($_GET['isu'])) {
	$isu = "true";
} else {
	$isu = "false";
}
$actual_link1 = str_replace("//", "/", "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$aArr = explode("?", $actual_link1);
$actual_link = $aArr[0];
$URlArr = explode("/", $actual_link);
if ($isitlocalhost) {

	$maxc = 5;
} else {
	$maxc = 4;
}

if (count($URlArr) == $maxc) {
	$_id = "check";
	$subcoursename = str_replace("-", ' ', $URlArr[$maxc - 1]);
} else {
	$_id = "";
}
?>
<!-- Sub Header Start -->
<div ng-app="myApp" ng-controller="myCtrl" ng-cloak id="ff">
	<div class="page-section"
		style="background:url(<?php echo $server; ?>assets/extra-images/sub-header-about-img.jpg); background-size:cover;padding:87px 0 35px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="cs-page-title">
						<h1 style="color:white !important;" ng-show="courseObj.course_name">{{courseObj.course_name}}
							Detail</h1>
						<p style="color:white;">{{courseObj.sub_title}}</p>
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
						<li><a href="<?php echo $server; ?>">Home</a></li>
						<li id="courseli" style="display: none;"><a href="<?php echo $server; ?>courses">
								<span ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
								<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
									Products</span>

							</a></li>

						<li id="upcourseli" style="display: none;"><a href="<?php echo $server; ?>courses?isu=t">

								Upcoming <span
									ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
								<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
									Products</span>
							</a></li>
						<li><a href="#"> <?php if (!$mobile) {
?>	{{courseObj.course_name}}<?php
}
	?></a></li>

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
								<span  ng-repeat="obj in courseObj.describeArr  ;   "> 

								<li ng-if="obj.headingvalue && obj.headingvalue!=''"
									><a
										href="#h{{$index}}">{{obj.headingvalue}}</a></li>
										</span>
								<li ng-show="courseObj.instructor && courseObj.teacherimagepath"><a href="#instrucors"
										>Instructors</a>
								</li>
								<li ng-show="bonusCourseList.length>0"><a href="#cs-bonus-post" >Bonus <span
											ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
										<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
											Product</span> Free</a></li>
								<li ng-show="related.length>0"><a href="#cs-related-post" >Similar <span
											ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
										<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
											Product</span></a></li>

							</ul>






						</div>
						<div class="widget cs-widget-links">


							<br />

							<span ng-if="courseObj.wheretoshowinwebsite=='UPCOMING'">

								<div class="cs-post-meta">

									<?php
									if (isset($_SESSION['login_id'])) {
										if ($_SESSION['login_user_type'] == 'STUDENT') {

											$email = $_SESSION['studentdata']['email'];
										} else {
											$email = $_SESSION['teacherdata']['email'];
										}
										?>
										<span title="We will inform you whenever course is released !"
											ng-click="notifyfunction('<?php echo $email; ?>',courseObj._id)"
											style="float: left;cursor:pointer"><i class="icon-map-marker"
												style="color: #207dba !important"></i> Notify Me</span>

										<?php
									} else {
										?>
										<span title="We will inform you whenever course is released !"
											ng-click="notifyfunctionPrompt(courseObj._id)"
											style="float: left;cursor:pointer"><i class="icon-map-marker"
												style="color: #207dba !important"></i> Notify Me</span>

										<?php
									}
									?>
									<input
										style="cursor: alias;width:100%;margin-bottom:20px; height:40px;background-color:white;color:#227ebb;border:1px solid #227ebb"
										type="button" value="Upcoming"><br />

								</div>
							</span>

							<span ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

								<div class="cs-price">
									<span><em>Price</em>&#8377; {{courseObj.amount | number : 2 }}<del
											ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount">&#8377;
											{{courseObj.pre_amount | number : 2 }}</del></span>
								</div>
								<input
									style="width:100%; height:40px;background-color:white;color:#227ebb;border:1px solid #227ebb"
									ng-show=" alreadypurchased==true" disabled type="button" value="Already purchased">
								<input
									style="width:100%; height:40px;background-color:white;color:#227ebb;border:1px solid #227ebb"
									ng-show="addedToCart==false && alreadypurchased==false" type="button"
									ng-click="addtocart('')" value="Add to cart">
								<input
									style="width:100%; height:40px;background-color:white;color:#227ebb;border:1px solid #227ebb"
									ng-show="addedToCart==true && alreadypurchased==false" type="button"
									ng-click="removefromcart()" value="Remove from cart"><br /><br />
								<input class="cs-bgcolor buttontypesubmit" style="width:100%; "
									ng-show="alreadypurchased==false" type="button" ng-click="addtocart('checkout')"
									value="Buy Now"><br /><br />


							</span>



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
												<h3>About the <span
														ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Course</span>
													<span
														ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
														Product</span>
												</h3>
											</div>
											<img alt="#" src="{{courseObj.serverpath+courseObj.imagepath}}"
												style="height: 60%;width:100%; margin-bottom:20px">
											<br />
											<span ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

<input class="cs-bgcolor buttontypesubmit" style="width:100%; "
	ng-show="alreadypurchased==false" type="button" ng-click="addtocart('checkout')"
	value="Buy Now"><br /><br />


</span>
											<span ng-repeat="obj in courseObj.describeArr  ;   ">

												<!-- <span ng-if="$index==0"> -->
												<small ng-show=" !obj.accordian">



													<h5 ng-if=" obj.headingvalue!=''" id="h{{$index}}">
														{{ obj.headingvalue }}

													</h5>

													<div ng-repeat="  objPoint in obj.pointsArr ;  " class="pointclass">

													 
														<small
															ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


															<small ng-show="obj.checkbox=='TRUE'">



																<ul class="cs-list-style" style="margin: 0px">
																	<li><i class=" cs-color icon-arrow-right22"></i>
																		<span
																			ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																			<small ng-show=" objPointWord.perword!==''">
																				<small style="font-size:14px "
																					ng-show=" objPointWord.perword!=='<br/>'">
																					{{ objPointWord.perword }}
																				</small>
																				<small
																					ng-show=" objPointWord.perword=='<br/>'">
																					<br /></small></small></span>


																	</li>

																</ul>

															</small>

															<small ng-show="obj.checkbox=='FALSE'">
																<span
																	ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																	<small ng-show=" objPointWord.perword!==''">
																		<small style="font-size:14px "
																			ng-show=" objPointWord.perword!=='<br/>'">
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
													 
													</div>

													<br>





												</small>



												<!-- </span> -->

											</span>


										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="cs-media"
												ng-show="courseObj.thumbnailpath && courseObj.demovideopath">
												<figure>
													<a href="javascript:;" data-toggle="modal" data-target="#demovideo"
														data-dismiss="modal" class="cs-color" aria-hidden="true">
														<img alt="#"
															src="{{courseObj.serverpath+courseObj.thumbnailpath}}"
															style="height: 150px;width:100%;">


													</a>

												</figure>
											</div>
											<div class="cs-courses-overview">
												<ul ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">

													<li><i class=" icon-uniF109"></i> Duration:<span>
															{{courseObj.duration}} {{courseObj.duration_type}}(s)
														</span></li>
													<li><i class=" icon-uniF109"></i> Validity:<span> Lifetime
														</span></li>


													<li ng-show="courseObj.language"><i
															class="icon-speaker"></i>Language:
														<span>{{courseObj.language}}</span>
													</li>
													<li ng-show="courseObj.skilllevel"><i class="icon-uniF101"></i>Skill
														level: <span>{{courseObj.skilllevel}}</span></li>
													<li ng-show="courseObj.studentnumber"><i
															class="icon-user"></i>Students:
														<span>{{courseObj.studentnumber}}</span>
													</li>
													<li><i class=" icon-uniF10A "></i>Certificate: <span>Yes</span></li>
													<li><i class="icon-uniF104"></i>Assessments: <span>Yes</span></li>
												</ul>
												<ul ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">


													<li><i class=" icon-uniF109"></i> Validity:<span> Lifetime
														</span></li>




													<li ng-show="courseObj.studentnumber"><i class="icon-user"></i>Total
														Purchase:
														<span>{{courseObj.studentnumber}}</span>
													</li>

												</ul>
											</div>
											
											<br/><div class="cs-review-summary" ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">
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
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

											<!-- <br />
											<span ng-repeat="obj in courseObj.describeArr  ;   ">

												<span ng-if="$index>0">
													<small ng-show=" !obj.accordian">



														<h5 ng-if=" obj.headingvalue!=''" id="h{{$index}}">
															{{ obj.headingvalue }}

														</h5>


														<span ng-repeat="  objPoint in obj.pointsArr ;  ">


															<small
																ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


																<small ng-show="obj.checkbox=='TRUE'">



																	<ul class="cs-list-style" style="margin: 0px">
																		<li><i class=" cs-color icon-arrow-right22"></i>
																			<span
																				ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																				<small
																					ng-show=" objPointWord.perword!==''">
																					<small style="font-size:14px "
																						ng-show=" objPointWord.perword!=='<br/>'">
																						{{ objPointWord.perword }}
																					</small>
																					<small
																						ng-show=" objPointWord.perword=='<br/>'">
																						<br /></small></small></span>


																		</li>

																	</ul>

																</small>

																<small ng-show="obj.checkbox=='FALSE'">
																	<span
																		ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																		<small ng-show=" objPointWord.perword!==''">
																			<small style="font-size:14px "
																				ng-show=" objPointWord.perword!=='<br/>'">
																				{{ objPointWord.perword }}

																			</small>

																			<small
																				ng-show=" objPointWord.perword=='<br/>'">

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
																<img class="imgclass width100percent"
																	ng-show="!obj.showingpoint"
																	ng-click="obj.showingpoint=!obj.showingpoint"
																	src="assets/images/down.png"
																	style="width: 24px;height: 24px;" alt="">
																<img class="imgclass width100percent"
																	ng-show="obj.showingpoint"
																	ng-click="obj.showingpoint=!obj.showingpoint"
																	src="assets/images/up.png"
																	style="width: 24px;height: 24px;" alt="">

															</div>

														</div>



														<span ng-repeat="  objPoint in obj.pointsArr ;  "
															ng-show="obj.showingpoint">


															<small
																ng-show=" objPoint.pointvalue!=''  &&  objPoint.pointvalue!='<br/>'  ">


																<small ng-show="obj.checkbox=='TRUE'">



																	<ul class="cs-list-style" style="margin: 0px">
																		<li><i class=" cs-color icon-arrow-right22"></i>
																			<span
																				ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">
																				<small
																					ng-show=" objPointWord.perword!==''">
																					<small style="font-size:14px "
																						ng-show=" objPointWord.perword!=='<br/>'">
																						{{ objPointWord.perword }}
																					</small>
																					<small
																						ng-show=" objPointWord.perword=='<br/>'">
																						<br /></small></small></span>


																		</li>

																	</ul>

																</small>

																<small ng-show="obj.checkbox=='FALSE'">
																	<span
																		ng-repeat="  objPointWord in objPoint.pointvalueArr ;  ">


																		<small ng-show=" objPointWord.perword!==''">
																			<small style="font-size:14px "
																				ng-show=" objPointWord.perword!=='<br/>'">
																				{{ objPointWord.perword }}

																			</small>

																			<small
																				ng-show=" objPointWord.perword=='<br/>'">

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

											</span> -->




										</div>

										<hr />
									</div>
								</div>
								<span ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

<input class="cs-bgcolor buttontypesubmit" style="width:100%; "
	ng-show="alreadypurchased==false" type="button" ng-click="addtocart('checkout')"
	value="Buy Now"><br /><br />


</span>
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
												<img alt="#" src="{{courseObj.serverpath+courseObj.teacherimagepath}}"
													style="height: 150px;width:100%">
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
							<div id="cs-bonus-post" class="cs-related-post" ng-show="bonusCourseList.length>0">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h3>Bonus <span
												ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
											<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
												Products</span> (Free)
										</h3>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
									ng-repeat="courseObj1 in bonusCourseList">
									<div class="cs-courses courses-grid">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<div class="cs-media">
													<figure ng-click='rediretctocourse(courseObj1)'
														style="cursor:pointer"> <img style="height: 160px"
															src="{{courseObj1.serverpath+courseObj1.imagepath}}"
															alt="" /></figure>
												</div>
											</div>
											<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
												<div class="cs-text">


													<div class="cs-post-title" style="min-height: 79px !important">
														<h5 ng-click='rediretctocourse(courseObj1)'
															style="cursor:pointer"> {{courseObj1.course_name}}
															<br />
															<b class="cs-color" style="font-size: 12px">By
																{{courseObj1.instructor}}</b>
														</h5>


													</div>


													<span class="cs-courses-price"> &#8377; 0

														<del
															ng-show="courseObj1.pre_amount && courseObj1.pre_amount>courseObj1.amount"><small
																style="opacity:0.7">&#8377; {{courseObj1.amount |
																number : 2 }}</small></del>
													</span>


													<div class="cs-post-meta">
														<div class="cs-rating" style="float: left;">
															<div class="cs-rating-star">
																<span class="rating-box"
																	style="{{courseObj1.ratingstyle}};"></span>
															</div>
														</div>


													</div>
													<br />
												</div>

											</div>
										</div>



									</div>
								</div>
							</div>
							<span ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

								<input class="cs-bgcolor buttontypesubmit" style="width:60%; "
									ng-show="alreadypurchased==false" type="button" ng-click="addtocart('checkout')"
									value="Buy Now"><br /><br />


							</span>
						</div>

					</div>
				</div>
				<div id="cs-related-post" class="cs-related-post" ng-show="related.length>0" style=" margin-bottom:10px;;
">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-section-title" style="margin-top:10px">
							<h3>Other Similar <span
									ng-if="courseObj.parent_course!='65b52a7b955c45301cecd154'">Courses</span>
								<span ng-if="courseObj.parent_course=='65b52a7b955c45301cecd154'">Digital
									Products</span>
							</h3>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ng-repeat="courseObj1 in related">
						<div class="cs-courses courses-grid">
							<div class="cs-media">
								<figure ng-click='rediretctocourse(courseObj1)' style="cursor:pointer"> <img
										style="height: 160px" src="{{courseObj1.serverpath+courseObj1.imagepath}}"
										alt="" />
								</figure>
							</div>



							<div class="cs-text">


								<div class="cs-post-title" style="min-height: 79px !important">
									<h5 ng-click='rediretctocourse(courseObj1)' style="cursor:pointer">
										{{courseObj1.course_name}}
										<br />
										<b class="cs-color" style="font-size: 12px">By
											{{courseObj1.instructor}}</b>
									</h5>


								</div>


								<span class="cs-courses-price"> &#8377; {{courseObj1.amount | number : 2}}

									<del ng-show="courseObj1.pre_amount && courseObj1.pre_amount>courseObj1.amount"><small
											style="opacity:0.7">&#8377; {{courseObj1.pre_amount | number : 2
											}}</small></del>
								</span>


								<div class="cs-post-meta">
									<div class="cs-rating" style="float: left;">
										<div class="cs-rating-star">
											<span class="rating-box" style="{{courseObj1.ratingstyle}};"></span>
										</div>
									</div>
									<input ng-show="courseObj1.alreadypurchased==false"
										class="cs-bgcolor buttontypesubmit"
										style="margin-left:15px;width:90px;height:30px " type="button"
										value="&nbsp;Buy Now&nbsp;" ng-click="addtocartListWala(courseObj1,'checkout')">
									<input ng-show="courseObj1.alreadypurchased==true"
										class="cs-bgcolor buttontypesubmit"
										style="margin-left:15px;width:90px;height:30px;visibility:hidden " type="button"
										value="&nbsp;Buy Now&nbsp;" ng-click="addtocart(courseObj1,'checkout')">

									<i style="font-size:20px;float:right;cursor:pointer;color:green;"
										ng-show=" courseObj1.alreadypurchased==true" title="Already Purchased"
										class="icon-check"></i>

									<i style="font-size:15px;float:right;cursor:pointer"
										ng-show="courseObj1.addedToCart==false && courseObj1.alreadypurchased==false"
										title="Add to cart" ng-click="addtocartListWala(courseObj1,'')"
										class="icon-cart"></i>
									<i style="font-size:15px;float:right;color:red;cursor:pointer"
										ng-show="courseObj1.addedToCart==true && courseObj1.alreadypurchased==false"
										ng-click="removefromcartListWala(courseObj1)" title="Remove from cart"
										class="icon-cart"></i>

								</div>
								<br />
							</div>


						</div>
					</div>
				</div>
				<h3 align="center" ng-show="!courseObj">
					<br />

					<img src="<?php echo $server; ?>assets/the-cube-preloader.gif">
					<br />Loading Course Details...
					<br /><br /><br /><br />
				</h3>
			</div>
		</div>

	</div>
	<span id="getcartlistid" onclick="calAngFuntion()"></span>
	<script>
		function calAngFuntion() {


			angular.element(document.getElementById('ff')).scope().refreshme();
		}
	</script>

	<div class="modal fade" id="demovideo" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-body">




					<video id="videoid" src="{{courseObj.serverpath}}{{courseObj.demovideopath}}"
						style="max-height:500px;width:100%" controls controlsList='nodownload'>
					</video>

				</div>

			</div>
		</div>
	</div>

</div>
<!-- Main End --><br /><br />
<?php
include "footer.php";

?>
<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function ($scope, $http) {
		$scope.courseObj = undefined;

		$scope.rediretctocourse = function (courseobj) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			window.location.href = "<?php echo $server; ?>course/" + t;
		}
		$scope.rediretctocourseU = function (courseobj) {


			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'YES');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			window.location.href = "<?php echo $server; ?>course/" + t;
		}

		$scope.replaceAll = function (string, search, replace) {
			return string.split(search).join(replace);
		}


		$scope.notifyfunctionPrompt = function (sub_course_id) {
			var email = prompt("Provide your Email Id ", "")
			if (email == '' || email == null) {
				$scope.toastermessage = "Please provide correct Email id";
				$scope.showtoaster("WARNING");
			} else {
				$scope.notifyfunction(email, sub_course_id);
			}
		}

		$scope.notifyfunction = function (email, sub_course_id) {
			$http({
				method: 'POST',
				url: apiurl + 'api/notify',
				data: 'email=' + email + "&sub_course_id=" + sub_course_id,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (jsondata) {

				if (jsondata.data.status == 'SUCCESS') {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoasterNotify("SUCCESS");


				} else {
					$scope.toastermessage = jsondata.data.message;
					$scope.showtoaster("ERROR");
				}


			});

		}


		$scope.removefromcart = function () {

			$http({
				method: 'GET',
				url: '<?php echo $server; ?>insideapi.php?sub_course_id=' + $scope.courseObj._id + '&key=removefromcart',
				data: '',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (jsondata) {
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
					if ($scope.cartList) {
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
						document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}


					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}

		$scope.addtocart = function (gotocheckout) {

			$http({
				method: 'POST',
				url: '<?php echo $server; ?>insideapi.php',
				data: 'amount=' + $scope.courseObj.amount + '&sub_course_name=' + $scope.courseObj.course_name + '&course_id=' + $scope.courseObj.parent_course + '&sub_course_id=' + $scope.courseObj._id + '&key=addtocart',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (jsondata) {
				$scope.submiting = false;


				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					if (gotocheckout == 'checkout') {
						window.location.href = "<?php echo $server; ?>checkout";
					} else {
						$scope.toastermessage = $scope.suc = jsondata.data.message;
						$scope.showtoaster('SUCCESS');
						$scope.addedToCart = true;
						$scope.cartList = jsondata.data.cartList;
						$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
						if ($scope.cartList) {
							document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
							document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
						}

						document.getElementById("cartheaderfunctionid").click();
					}

				}

			});
		}
		$scope.removefromcartListWala = function (courseObjW) {

			$http({
				method: 'GET',
				url: '<?php echo $server; ?>insideapi.php?sub_course_id=' + courseObjW._id + '&key=removefromcart',
				data: '',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (jsondata) {
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
					if ($scope.cartList) {
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
						document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}


					document.getElementById("cartheaderfunctionid").click();

				}

			});
		}

		$scope.addtocartListWala = function (courseObjW, gotocheckout) {

			$http({
				method: 'POST',
				url: '<?php echo $server; ?>insideapi.php',
				data: 'amount=' + courseObjW.amount + '&sub_course_name=' + courseObjW.course_name + '&sub_course_id=' + courseObjW._id + '&course_id=' + courseObjW.parent_course + '&key=addtocart',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function (jsondata) {
				$scope.submiting = false;
				if (jsondata.data.status == 'FALSE') {
					$scope.toastermessage = $scope.error = jsondata.data.message;
					$scope.showtoaster('ERROR');
				} else {
					if (gotocheckout == 'checkout') {
						window.location.href = "<?php echo $server; ?>checkout";
					} else {
						$scope.toastermessage = $scope.suc = jsondata.data.message;
						$scope.showtoaster('SUCCESS');
						courseObjW.addedToCart = true;
						$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
						$scope.cartList = jsondata.data.cartList;
						if ($scope.cartList) {
							document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
							document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
						}
						document.getElementById("cartheaderfunctionid").click();
					}
				}

			});
		}

		$scope.bonusCourseList = [];

		$scope.getMainCourse = function (_id) {
			var ischeckingwithname = false;
			if (localStorage.getItem("upcoming") && localStorage.getItem("upcoming") == 'YES') {
				var isu = "true";

				document.getElementById("upcourseli").style.display = "";

			} else {
				var isu = "false";
				document.getElementById("courseli").style.display = "";
			}



			if (localStorage.getItem("_id")) {
				var subcourseid = localStorage.getItem("_id");
			} else {


				if (_id != '' && _id != undefined) {
					if (_id == 'check') {
						var subcoursenametocheck = "<?php echo $subcoursename; ?>";
						ischeckingwithname = true;
					} else {


						var subcourseid = _id;
					}
				} else {
					window.location.href = "<?php echo $server; ?>courses";

				}




			}





			if (isu == "true") {
				var v = 'api/courses_subcourse_both_upcomming';
			} else {
				var v = 'api/courses_subcourse_both';

			}


			$http.get(apiurl + v).
				then(function (jsondata) {

					$scope.getCartList(subcourseid);
					$scope.courseList = jsondata.data;
					let bonus_subject_idArr = [];

					for (var t = 0; t < $scope.courseList.length; t++) {
						if ($scope.courseList[t].parent_course !== '0') {


							if (($scope.courseList[t]._id == subcourseid && ischeckingwithname == false) || (ischeckingwithname == true && $scope.courseList[t].course_name == subcoursenametocheck.trim())) {
								// alert(subcoursenametocheck);
								$scope.subcourseid = $scope.courseList[t]._id;
								bonus_subject_idArr = $scope.courseList[t].bonus_subject_id;
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

						window.location.href = "<?php echo $server; ?>courses";
					} else {

						$scope.getrelatedcourses(); if (bonus_subject_idArr.length > 0) {
							for (var t = 0; t < $scope.courseList.length; t++) {

								if (bonus_subject_idArr.includes($scope.courseList[t]._id)) {

									$scope.bonusCourseList.push($scope.courseList[t]);

								}




							}
						}
					}
					if (localStorage.getItem($scope.subcourseid + "_course_aff_id") && localStorage.getItem($scope.subcourseid + "_course_aff_id") == affif) {

					} else {
						localStorage.setItem($scope.subcourseid + "_course_aff_id", "<?php echo $_GET['aff']; ?>");

						saveUniqueVisitorOfAffilator(affif, $scope.subcourseid);
					}



				}).catch(function (jsondata) {
					console.error("error in posting");
				})

		}

		$scope.related = [];

		$scope.getrelatedcourses = function () {

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

		$scope.refreshme = function () {
			$scope.getCartList($scope.subcourseid);
		}
		$scope.getCartList = function (subcourseid) {

			var addedToCart = false;
			var alreadypurchased = false;
			$http.get('<?php echo $server; ?>insideapi.php?key=cartlist').
				then(function (jsondata) {

					$scope.cartList = jsondata.data.cartList;
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;

					if ($scope.cartList) {
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
						document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
						for (var t = 0; t < $scope.cartList.length; t++) {


							if ($scope.cartList[t].sub_course_id == subcourseid) {

								addedToCart = true;
								break;
							}



						}
					} else {

					}
					$scope.addedToCart = addedToCart;
					if ($scope.already_purchased_course_id_array) {
						for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


							if ($scope.already_purchased_course_id_array[tx] == subcourseid) {

								alreadypurchased = true;
								break;
							}




						}
					}

					$scope.alreadypurchased = alreadypurchased;
					if ($scope.related.length > 0) {
						$scope.managerelated();
					}

				}).catch(function (jsondata) {
					console.error("error in posting 2");

					console.log(jsondata);
				})

		}

		$scope.managerelated = function () {
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
		$scope.getMainCourse("<?php echo $_id; ?>");



		$scope.showtoaster = function (wht) {

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




			setTimeout(function () {
				x.className = x.className.replace("show", "");
			}, 3000);
		}

		$scope.showtoasterNotify = function (wht) {
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




			setTimeout(function () {
				x.className = x.className.replace("show", "");
			}, 3000);
		}

	}]);
</script>