<?php

include "header.php";
?>
<!-- Banner Start -->
<div class="page-section" style="background:url(assets/extra-images/banner-img.jpg) no-repeat;background-size:cover;padding:212px 0;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cs-column-text">
					<span style="display:inline-block;padding:10px 20px;background:rgba(0,0,0,0.8);color:#FFF;font-size:18px;margin-bottom:22px;">What would you like to learn?</span>
					<h2 style="padding:10px;color:#ffffff !important;line-height:44px !important;text-transform:capitalize !important;background:rgba(0,0,0,0.8);">learn a new skill today.</h2>
					<p style="padding:10px;font-size:36px !important;line-height:42px !important;color:#000 !important;text-transform:capitalize;font-weight:400 !important;margin-bottom:30px;background:rgba(255,255,255,0.8);">Find out courses that helps you grow your career.</p>
					<a style="font-size:13px;font-weight:700;line-height:19px;padding:16px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="about-us">About <?php

																																																			echo $website;
																																																			?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner End -->
<!-- Main Start -->
<div class="main-section">
	<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>

		<div class="page-section" style="margin-bottom:45px;margin-top:-60px;" id="getcartlistid" ng-click="refreshList()">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="cs-top-categories">
							<li ng-repeat="obj in  listofcategory" ng-if="$index>=0 && $index<6"><a href="courses?category={{obj.course_name}}" style="{{getbackgroundcolorofcategory($index)}}"><i class="icon-{{obj.iconforfirstcategory}}"></i>{{obj.course_name}}&nbsp;</a></li>

						</ul>


					</div>
				</div>
			</div>
		</div>
		<div class="page-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-element-title" style="margin-bottom:30px;">
									<h2>Bestseller</h2>
								</div>
							</div>
							<ul class="cs-bloggrid-slider-sm">

								<?php
								foreach ($cuurseData  as $perCourse) {
									if ($perCourse['wheretoshowinwebsite'] == 'Best Seller') {
										$rr = ($perCourse['rating'] * 100 / 5) + "%";

								?>
										<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"  style="cursor:pointer"  onclick='rediretctocoursePHP("<?php
																							echo $perCourse['_id'];
																							?>","<?php
																								echo $perCourse['course_name'];
																								?>")' >
											<div class="cs-blog blog-grid">
												<div class="cs-media">


													<figure style="cursor:pointer"> <img style="height: 272px;" src="<?php
																																						echo $perCourse['serverpath'] . $perCourse['imagepath'];
																																						?> " alt="" />

														<figcaption>

															<?php
															echo $perCourse['course_name'];
															?>
														</figcaption>
													</figure>



												</div>

												<div class="cs-text">

													<div class="cs-rating">
														<div class="cs-rating-star">



															<span class="rating-box" style="<?php echo "width:" . $rr; ?>"></span>
														</div>
													</div>
													<div class="cs-post-title">
														<h5   style="cursor:pointer"> <?php
																														echo $perCourse['course_name'];
																														?> </h5>
													</div>
													<p class="cs-readmore-btn"  style="cursor:pointer">Read more</p>
													<b class="cs-courses-price" style="display: none"> &#8377; <?php
																												echo
																													sprintf("%1\$.2f", $perCourse['amount']);
																												?>
														<?php
														if ($perCourse['pre_amount'] != '' and $perCourse['pre_amount'] > $perCourse['amount']) {
														?>
															<del><small style="opacity:0.7">&#8377; <?php
																									echo
																										sprintf("%1\$.2f", $perCourse['pre_amount']);
																									?></small></del>
														<?php

														}
														?>
													</b>
													<div class="cs-post-meta" style="display: none">
														<span>By
															<b class="cs-color"> <?php
																					echo $perCourse['instructor'];
																					?></b>

														</span>

													</div>
												</div>
											</div>
										</li>
								<?php
									}
								}
								?>

							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-element-title" style="margin-bottom:30px;">
									<h2>Trending</h2>
								</div>
							</div>
							<ul class="cs-bloggrid-slider-sm">

								<?php
								foreach ($cuurseData  as $perCourse) {
									if ($perCourse['wheretoshowinwebsite'] == 'Trending') {
										$rr = ($perCourse['rating'] * 100 / 5) + "%";

								?>
										<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12"  style="cursor:pointer"  onclick='rediretctocoursePHP("<?php
																							echo $perCourse['_id'];
																							?>","<?php
																								echo $perCourse['course_name'];
																								?>")'>
											<div class="cs-blog blog-grid">
												<div class="cs-media">


													<figure   style="cursor:pointer"> <img style="height: 272px;" src="<?php
																																						echo $perCourse['serverpath'] . $perCourse['imagepath'];
																																						?> " alt="" />

														<figcaption>

															<?php
															echo $perCourse['course_name'];
															?>
														</figcaption>
													</figure>



												</div>

												<div class="cs-text">

													<div class="cs-rating">
														<div class="cs-rating-star">



															<span class="rating-box" style="<?php echo "width:" . $rr; ?>"></span>
														</div>
													</div>
													<div class="cs-post-title">
														<h5   style="cursor:pointer"> <?php
																														echo $perCourse['course_name'];
																														?> </h5>
													</div>
													<p class="cs-readmore-btn"   style="cursor:pointer">Read more</p>
													<b class="cs-courses-price" style="display: none"> &#8377; <?php
																												echo
																													sprintf("%1\$.2f", $perCourse['amount']);
																												?>
														<?php
														if ($perCourse['pre_amount'] != '' and $perCourse['pre_amount'] > $perCourse['amount']) {
														?>
															<del><small style="opacity:0.7">&#8377; <?php
																									echo
																										sprintf("%1\$.2f", $perCourse['pre_amount']);
																									?></small></del>
														<?php

														}
														?>
													</b>
													<div class="cs-post-meta" style="display: none">
														<span>By
															<b class="cs-color"> <?php
																					echo $perCourse['instructor'];
																					?></b>

														</span>

													</div>
												</div>
											</div>
										</li>
								<?php
									}
								}
								?>


							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="cs-find-search">
							<h6>Find your course or digital product</h6>
							<span>Ranked as one of the world's most</span>
							<form>

								<div class="cs-input-area">
									<div class="cs-input-holder"><i class="icon-search"></i><input type="text" placeholder="Enter Course name" ng-model="coursesearched" /></div>
									<select data-placeholder="Select Category" class="chosen-select" tabindex="5" id="categorylist" ng-model="caregoryseached">
										<option value="">Select Category</option>
										<?php

										foreach ($cuurseData as $PER) {
											if ($PER['parent_course'] == '0') {


										?>
												<option value="<?php echo $PER['course_name']; ?>"><?php echo   getCoursenameAccordingToLevel($PER, $cuurseData); ?></option>
										<?php
											}
										}
										?>

									</select>
								</div>



								<button class="cs-bgcolor" ng-click=redirectToSearchCourse()><i class="icon-search3"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-section" style="background:#f9fafa;padding-top:62px;margin-bottom:82px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-section-title left">
							<h2>Digital Products & Courses</h2>
							<p style="color:#aaaaaa !important;">Find your Courses here in relevant Category.</p>
						</div>
					</div>
					<?php

					include "asideindex.php";
					?>
					<div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" ng-repeat="courseObj in listofSubCourse" ng-if="$index<7">
								<div class="cs-courses courses-grid">
									<div class="cs-media" ng-click='rediretctocourse(courseObj)' style="cursor:pointer">
										<figure> <img style="height: 160px; " src="{{courseObj.serverpath+courseObj.imagepath}}" alt="" /> </figure>

									</div>
									<div class="cs-text">


										<div class="cs-post-title" style="min-height: 79px !important">
											<h5 ng-click='rediretctocourse(courseObj)' style="cursor:pointer"> {{courseObj.course_name}}
												<br />
												<b class="cs-color" style="font-size: 12px">By {{courseObj.instructor}}</b>
											</h5>
											<!-- {{courseObj.sub_title}} -->

										</div>


										<span class="cs-courses-price"> &#8377; {{courseObj.amount | number : 2}}

											<del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount"><small style="opacity:0.7">&#8377; {{courseObj.pre_amount | number : 2 }}</small></del>
										</span>


										<div class="cs-post-meta">
											<div class="cs-rating" style="float: left;">
												<div class="cs-rating-star">
													<span class="rating-box" style="{{courseObj.ratingstyle}};"></span>
												</div>
											</div>
											<input ng-show="courseObj.alreadypurchased==false" class="cs-bgcolor buttontypesubmit" style="margin-left:15px;width:90px;height:30px " type="button" value="&nbsp;Buy Now&nbsp;" ng-click="addtocart(courseObj,'checkout')">
											<input ng-show="courseObj.alreadypurchased==true" class="cs-bgcolor buttontypesubmit" style="margin-left:15px;width:90px;height:30px;visibility:hidden " type="button" value="&nbsp;Buy Now&nbsp;" ng-click="addtocart(courseObj,'checkout')">

											<i style="font-size:20px;float:right;cursor:pointer;color:green;" ng-show=" courseObj.alreadypurchased==true" title="Already Purchased" class="icon-check"></i>

											<i style="font-size:15px;float:right;cursor:pointer" ng-show="courseObj.addedToCart==false && courseObj.alreadypurchased==false" title="Add to cart" ng-click="addtocart(courseObj,'')" class="icon-cart"></i>
											<i style="font-size:15px;float:right;color:red;cursor:pointer" ng-show="courseObj.addedToCart==true && courseObj.alreadypurchased==false" ng-click="removefromcart(courseObj)" title="Remove from cart" class="icon-cart"></i>

										</div>
										<br />
									</div>
								</div>
							</div>
							<h3 align="center" ng-show="!listofSubCourse">
								<br />

								<img src="assets/the-cube-preloader.gif">


							</h3>

							<h5 align="center" ng-show="listofSubCourse && listofSubCourse.length==0 ">
								<div>
									<br /><br /> No course found in {{categorysearchedfilter}}. Please try another category !
								</div>



							</h5> <br />
							<input ng-show="categorysearchedfilter!='' && listofSubCourse && listofSubCourse.length>0" class="cs-bgcolor buttontypesubmit" style="float: right;margin-right:10px;margin-bottom:10px" type="button" ng-click="redirecttocourses()" value="&nbsp;View All&nbsp;">
							<input ng-show="categorysearchedfilter=='' && listofSubCourse && listofSubCourse.length>=0" class="cs-bgcolor buttontypesubmit" style="float: right;margin-right:10px;margin-bottom:10px" type="button" onclick="window.location.href='courses'" value="&nbsp;View All&nbsp;">

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-section" ng-show="listofSubCourse_upcomming.length>0">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="widget cs-text-widget">
							<div class="cs-text" style="background:#FFF;padding:0;">
								<h2>Upcoming Courses</h2>
								<p>If you did'nt find your skill course above, than check here in our upcoming courses and add it to your wishlish ,so that you can be notidied when its launched.</p>

							</div>
						</div>
					</div>
					<div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" ng-repeat="courseObj in listofSubCourse_upcomming" ng-if="$index<4">
								<div class="cs-courses courses-grid">
									<div class="cs-media" ng-click='rediretctocourseU(courseObj)' style="cursor:pointer">
										<figure> <img style="height:160px; " src="{{courseObj.serverpath+courseObj.imagepath}}" alt="" /> </figure>

									</div>
									<div class="cs-text">


										<div class="cs-post-title" style="min-height: 100px !important">
											<h5 ng-click='rediretctocourseU(courseObj)' style="cursor:pointer"> {{courseObj.course_name}}
												<br />
												<b class="cs-color" style="font-size: 12px">By {{courseObj.instructor}}</b>
											</h5>
											<!-- {{courseObj.sub_title}} -->
										</div>


										<div class="cs-post-meta">
											<input ng-click='rediretctocourseU(courseObj)' class="cs-bgcolor buttontypesubmit" style="cursor:pointer;float: left;width:120px;height:23px;background:red " type="button" value="&nbsp;Upcoming&nbsp;">

											<?php
											if (isset($_SESSION['login_id'])) {
												if ($_SESSION['login_user_type'] == 'STUDENT') {

													$email = $_SESSION['studentdata']['email'];
												} else {
													$email = $_SESSION['teacherdata']['email'];
												}
											?>
												<span title="We will inform you whenever course is released !" ng-click="notifyfunction('<?php echo  $email; ?>',courseObj._id)" style="float: right;cursor:pointer"><i class="icon-map-marker" style="color: #207dba !important"></i> Notify Me</span>

											<?php
											} else {
											?>
												<span title="We will inform you whenever course is released !" ng-click="notifyfunctionPrompt(courseObj._id)" style="float: right;cursor:pointer"><i class="icon-map-marker" style="color: #207dba !important"></i> Notify Me</span>

											<?php
											}
											?>
										</div>
										<br />
									</div>
								</div>
							</div>
							<br />
							<input class="cs-bgcolor buttontypesubmit" style="float: right;margin-right:10px;margin-bottom:10px" type="button" onclick="window.location.href='courses?isu=t'" value="&nbsp;View All&nbsp;">

						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="page-section" style="margin-bottom:30px;margin-top:30px;">
			<div class="container"> <br /><br />

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-element-title" style="margin-bottom:30px;">
							<h2>Digital Pathshala Faculty</h2>
						</div>
					</div>
					<ul class="cs-teamlist-slider">
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/Shalini_Gupta.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Shalini Gupta</a></h5>
									<span>Professor English</span>
									<p>English Speaking, Personality Development, Public Speaking, Business Manners, Business English.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="instagram"><i class="icon-instagram1"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/Tarun_Tyagi.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Tarun Tyagi</a></h5>
									<span>Developer</span>
									<p>Wordpress, E-Commerce, Facebook ADS, Business Growth.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>

										</ul>
									</div>
								</div>
							</div>
						</li>


					</ul>
				</div>
			</div>
		</div>



		<?php include "counter.php"; ?>
		<div class="page-section" style="margin-bottom:80px;">
			<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="row cs-testimonial main-testimonial">
					<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<div class="cs-media">
							<figure>
								<img src="assets/extra-images/testimonial-img-1.jpg" alt="" />
								<figcaption>
									<div class="cs-text">
										<p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
										<div class="cs-media">
											<figure><img src="assets/extra-images/testimonial-sm-img-1.jpg" alt="" /></figure>
										</div>
										<div class="cs-info">
											<h6><a href="#">Charlie Waite</a></h6>
											<span>Manager of University</span>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>
					<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<div class="cs-media">
							<figure>
								<img src="assets/extra-images/testimonial-img-2.jpg" alt="" />
								<figcaption>
									<div class="cs-text">
										<p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
										<div class="cs-media">
											<figure><img src="assets/extra-images/testimonial-sm-img-1.jpg" alt="" /></figure>
										</div>
										<div class="cs-info">
											<h6><a href="#">Charlie Waite</a></h6>
											<span>Manager of University</span>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>
					<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<div class="cs-media">
							<figure>
								<img src="assets/extra-images/testimonial-img-3.jpg" alt="" />
								<figcaption>
									<div class="cs-text">
										<p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
										<div class="cs-media">
											<figure><img src="assets/extra-images/testimonial-sm-img-1.jpg" alt="" /></figure>
										</div>
										<div class="cs-info">
											<h6><a href="#">Charlie Waite</a></h6>
											<span>Manager of University</span>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>
					<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<div class="cs-media">
							<figure>
								<img src="assets/extra-images/testimonial-img-4.jpg" alt="" />
								<figcaption>
									<div class="cs-text">
										<p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
										<div class="cs-media">
											<figure><img src="assets/extra-images/testimonial-sm-img-1.jpg" alt="" /></figure>
										</div>
										<div class="cs-info">
											<h6><a href="#">Charlie Waite</a></h6>
											<span>Manager of University</span>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>
					<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<div class="cs-media">
							<figure>
								<img src="assets/extra-images/testimonial-img-5.jpg" alt="" />
								<figcaption>
									<div class="cs-text">
										<p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
										<div class="cs-media">
											<figure><img src="assets/extra-images/testimonial-sm-img-1.jpg" alt="" /></figure>
										</div>
										<div class="cs-info">
											<h6><a href="#">Charlie Waite</a></h6>
											<span>Manager of University</span>
										</div>
									</div>
								</figcaption>
							</figure>
						</div>
					</li>

				</ul>
			</div>
		</div>
		<div class="page-section" style="margin-bottom:40px;display:none;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-fancy-heading" style="margin-bottom:40px;">
							<h6 style="font-size:14px !important; color:#999 !important; text-transform:uppercase !important;">Universities Accepting Our Recent Graduates</h6>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="cs-graduate-slider">
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo1.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo2.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo3.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo4.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo5.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo6.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo5.jpg" alt="" /> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <img src="assets/extra-images/graduate-logo5.jpg" alt="" /> </figure>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main End -->
	<?php

	include "footer.php";
	?>
	<script>

  function rediretctocoursePHP (_id, name) {
				
				localStorage.setItem("_id", _id);
				localStorage.setItem("upcoming", 'NO');
				var t = replaceAll(name, ' ', '-'); // => 'move move move!'
				window.location.href = "course/" + t;

			}
			function replaceAll  (string, search, replace) {
				return string.split(search).join(replace);
			}
		localStorage.removeItem("_id");
		localStorage.removeItem("upcoming");
		var app = angular.module('myApp', []);
		app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
			$scope.courseList_upcomming = [];
			$scope.listofcategory = [];
			$scope.listofSubCourse_upcomming = $scope.listofSubCourse = $scope.listofSubCourseOriginal = undefined;



			$scope.rediretctocoursePHP = function(_id, name) {
				
				localStorage.setItem("_id", _id);
				localStorage.setItem("upcoming", 'NO');
				var t = $scope.replaceAll(name, ' ', '-'); // => 'move move move!'
				window.location.href = "course/" + t;

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
			$scope.getbackgroundcolorofcategory = function(index) {
				var t = ["#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13", "#8a9045", "#a88b60", "#3e769a", "#c16622", '#896ca9', "#dd9d13"];
				return "background-color:" + t[index] + ";font-size:12px";
			}
			$scope.notifyfunctionPrompt = function(sub_course_id) {
				var email = prompt("Provide your Email Id ", "")
				if (email == '' || email == null) {
					$scope.toastermessage = "Please provide correct Email id";
					$scope.showtoaster("WARNING");
				} else {
					$scope.notifyfunction(email, sub_course_id);
				}
			}
			$scope.notifyfunction = function(email, sub_course_id) {
				$http({
					method: 'POST',
					url: apiurl + 'api/notify',
					data: 'email=' + email + "&sub_course_id=" + sub_course_id,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function(jsondata) {

					if (jsondata.data.status == 'SUCCESS') {
						$scope.toastermessage = jsondata.data.message;
						$scope.showtoasterNotify("SUCCESS");


					} else {
						$scope.toastermessage = jsondata.data.message;
						$scope.showtoaster("ERROR");
					}


				});

			}


			$scope.getUPCOMMINGCourse = function() {
				$scope.courseList_upcomming = [];
				$http.get(apiurl + 'api/courses_subcourse_both_upcomming').
				then(function(jsondata) {
					$scope.listofSubCourse_upcomming = [];
					$scope.courseList_upcomming = [];
					$scope.courseList_upcomming = jsondata.data;

					for (var t = 0; t < $scope.courseList_upcomming.length; t++) {




						if ($scope.courseList_upcomming[t].level_number == 1 && $scope.courseList_upcomming[t].parent_course == '0') {
							$scope.listofSubCourse_upcomming.push($scope.courseList_upcomming[t]);

						}
						if ($scope.courseList_upcomming[t].parent_course !== '0' && $scope.courseList_upcomming[t].subjectstatus == 'TRUE' && $scope.courseList_upcomming[t].imagepath) {
							console.log("kkkk");
							var rr = ($scope.courseList_upcomming[t].rating * 100 / 5) + "%";
							$scope.courseList_upcomming[t].ratingstyle = "width:" + rr;
							$scope.listofSubCourse_upcomming.push($scope.courseList_upcomming[t]);
						}

					}


				}).catch(function(jsondata) {
					console.error("error in postinnng");
					console.error(jsondata);
				})

			}
			$scope.getUPCOMMINGCourse();
			$scope.getMainCourse = function() {
				$http.get(apiurl + 'api/courses_subcourse_both').
				then(function(jsondata) {
					$scope.listofSubCourse = $scope.listofSubCourseOriginal = [];
					$scope.courseList = jsondata.data;

					for (var t = 0; t < $scope.courseList.length; t++) {

						$scope.courseList[t].addedToCart = false;
						$scope.courseList[t].alreadypurchased = false;
						if ($scope.cartList) {
							for (var tx = 0; tx < $scope.cartList.length; tx++) {


								if ($scope.cartList[tx].sub_course_id == $scope.courseList[t]._id) {

									$scope.courseList[t].addedToCart = true;
									break;
								}




							}
						}
						if ($scope.already_purchased_course_id_array) {

							for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


								if ($scope.already_purchased_course_id_array[tx] == $scope.courseList[t]._id) {

									$scope.courseList[t].alreadypurchased = true;
									break;
								}



							}
						}

						if ($scope.courseList[t].level_number == 1 && $scope.courseList[t].parent_course == '0') {
							$scope.listofcategory.push($scope.courseList[t]);

						}
						if ($scope.courseList[t].parent_course !== '0' && $scope.courseList[t].subjectstatus == 'TRUE' && $scope.courseList[t].imagepath) {
							console.log("kkkk");
							var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
							$scope.courseList[t].ratingstyle = "width:" + rr;
							$scope.listofSubCourse.push($scope.courseList[t]);
						}

					}
					$scope.listofSubCourseOriginal = $scope.listofSubCourse;

				}).catch(function(jsondata) {
					console.error("error in postinnng");
					console.error(jsondata);
				})

			}
			$scope.categorysearchedfilter = '';

			$scope.filtercategory = function(category, categorysearchedfilter) {
				if (category == 'ALL') {
					$scope.categorysearchedfilter = '';
					$scope.listofSubCourse = $scope.listofSubCourseOriginal;
				} else {
					$scope.categorysearchedfilter = categorysearchedfilter;
					$scope.listofSubCourse = undefined;
					var temp = [];
					for (var t = 0; t < $scope.listofSubCourseOriginal.length; t++) {
						if ($scope.listofSubCourseOriginal[t].parent_course == category) {


							temp.push($scope.listofSubCourseOriginal[t]);
						}

					}
					$scope.listofSubCourse = temp;

				}
			}
			$scope.redirecttocourses = function() {
				window.location.href = "courses?category=" + $scope.categorysearchedfilter;
			}

			$scope.removefromcart = function(courseObj) {

				$http({
					method: 'GET',
					url: '<?php echo $server;?>insideapi.php?sub_course_id=' + courseObj._id + '&key=removefromcart',
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
						courseObj.addedToCart = false;
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

			$scope.addtocart = function(courseObj, gotocheckout) {

				$http({
					method: 'POST',
					url: '<?php echo $server;?>insideapi.php',
					data: 'amount=' + courseObj.amount + '&sub_course_name=' + courseObj.course_name + '&sub_course_id=' + courseObj._id + '&course_id=' + courseObj.parent_course + '&key=addtocart',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function(jsondata) {
					$scope.submiting = false;
					if (jsondata.data.status == 'FALSE') {
						$scope.toastermessage = $scope.error = jsondata.data.message;
						$scope.showtoaster('ERROR');
					} else {
						if (gotocheckout == 'checkout') {
							window.location.href = "checkout";
						} else {


							$scope.toastermessage = $scope.suc = jsondata.data.message;
							$scope.showtoaster('SUCCESS');
							courseObj.addedToCart = true;
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



			$scope.refreshList = function() {

				$scope.getCartList('refresh');


			}
			$scope.cartList = [];
			$scope.already_purchased_course_id_array = [];
			$scope.getCartList = function(type) {
				$scope.cartList = [];
				$scope.already_purchased_course_id_array = [];
				$http.get('<?php echo $server;?>insideapi.php?key=cartlist').
				then(function(jsondata) {

					console.log();
					$scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
					$scope.cartList = jsondata.data.cartList;
					if ($scope.cartList) {
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
						document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;

					} else {


					}
					if (type == 'initial') {


						$scope.getMainCourse();
					} else {
						for (var t = 0; t < $scope.listofSubCourseOriginal.length; t++) {
							$scope.listofSubCourseOriginal[t].addedToCart = false;
							$scope.listofSubCourseOriginal[t].alreadypurchased = false;
							for (var tx = 0; tx < $scope.cartList.length; tx++) {


								if ($scope.cartList[tx].sub_course_id == $scope.listofSubCourseOriginal[t]._id) {

									$scope.listofSubCourseOriginal[t].addedToCart = true;
									break;
								}




							}

							for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


								if ($scope.already_purchased_course_id_array[tx] == $scope.listofSubCourseOriginal[t]._id) {

									$scope.listofSubCourseOriginal[t].alreadypurchased = true;
									break;
								}




							}
						}



						for (var t = 0; t < $scope.listofSubCourse.length; t++) {
							$scope.listofSubCourse[t].addedToCart = false;
							$scope.listofSubCourse[t].alreadypurchased = false;
							for (var tx = 0; tx < $scope.cartList.length; tx++) {


								if ($scope.cartList[tx].sub_course_id == $scope.listofSubCourse[t]._id) {

									$scope.listofSubCourse[t].addedToCart = true;
									break;
								}




							}

							for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


								if ($scope.already_purchased_course_id_array[tx] == $scope.listofSubCourse[t]._id) {

									$scope.listofSubCourse[t].alreadypurchased = true;
									break;
								}




							}
						}
					}





				}).catch(function(jsondata) {
					console.error("error in posting");
				})

			}

			$scope.getCartList('initial');
			$scope.getCoursenameAccordingToLevel = function(perCourseOBJ, categoryArr) {

				if (perCourseOBJ.upper_level_id == '') {
					return perCourseOBJ.course_name;
				} else {
					var levelofthiscourse = perCourseOBJ.level_number;

					var _id = perCourseOBJ.upper_level_id;
					var coursenaneArr = [];
					coursenaneArr.push(perCourseOBJ.course_name);
					for (var t = levelofthiscourse - 1; t >= 1; t--) {
						for (var x = 0; x < categoryArr.length; x++) {
							if (_id == categoryArr[x]._id) {
								coursenaneArr.push(categoryArr[x].course_name);
								var _id = categoryArr[x].upper_level_id;
							}
						}
					}


					var coursenaneArr = coursenaneArr.reverse();
					return coursenaneArr.join(" -> ");
				}

			}

			$scope.redirectToSearchCourse = function() {
				if (($scope.caregoryseached != undefined && $scope.caregoryseached != '') || ($scope.coursesearched != undefined && $scope.coursesearched != '')) {
					if ($scope.caregoryseached != undefined && $scope.coursesearched != undefined && $scope.caregoryseached != '' && $scope.coursesearched != '') {
						window.location.href = "courses?category=" + $scope.caregoryseached + '&course=' + $scope.coursesearched;
					} else {
						if ($scope.caregoryseached != '' && $scope.caregoryseached != undefined) {
							window.location.href = "courses?category=" + $scope.caregoryseached;
						} else {
							window.location.href = "courses?course=" + $scope.coursesearched;
						}
					}
				} else {
					return false;
				}
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

		}]);
	</script>