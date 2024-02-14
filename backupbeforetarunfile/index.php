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
					<h1 style="color:#ffffff !important;line-height:64px !important;text-transform:capitalize !important;">Brighton Experience</h1>
					<p style="font-size:36px !important;line-height:42px !important;color:#FFF !important;font-weight:400 !important;margin-bottom:30px;">an inspiring place to work and study</p>
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
							<li ng-repeat="obj in  listofcategory" ng-if="$index>=0 && $index<6"><a href="courses?category={{obj.course_name}}" style="background:#8a9045;font-size:12px "><i class="icon-{{obj.iconforfirstcategory}}"></i>{{obj.course_name}}&nbsp;</a></li>

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
									<h2>Best Seller</h2>
								</div>
							</div>
							<ul class="cs-bloggrid-slider-sm">
								 
								<?php
								foreach ($cuurseData  as $perCourse) {
									if ($perCourse['wheretoshowinwebsite'] == 'Best Seller') {
										$rr = ($perCourse['rating'] * 100 / 5) + "%";

								?>
										<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cs-blog blog-grid">
												<div class="cs-media">


													<figure><a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>"><img style="height: 272px" src="<?php
																																	echo $perCourse['serverpath'] . $perCourse['imagepath'];
																																	?> " alt="" /></a>

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
													 	<h5><a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>"> <?php
																								echo $perCourse['course_name'];
																								?></a></h5>
													</div>
													<a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>" class="cs-readmore-btn">Read more</a>
													<b class="cs-courses-price"  style="display: none"> &#8377; <?php
																									echo  
																									sprintf("%1\$.2f", $perCourse['amount']);
																								?>
<?php
																							 if($perCourse['pre_amount']!='' and $perCourse['pre_amount']>$perCourse['amount']){
																								?>
														<del><small style="opacity:0.7">&#8377;  <?php
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
										<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="cs-blog blog-grid">
												<div class="cs-media">


													<figure><a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>"><img style="height: 272px" src="<?php
																																	echo $perCourse['serverpath'] . $perCourse['imagepath'];
																																	?> " alt="" /></a>

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
													 	<h5><a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>"> <?php
																								echo $perCourse['course_name'];
																								?></a></h5>
													</div>
													<a href="coursedetails?_id=<?php
																						echo $perCourse['_id'];
																						?>&name=<?php
																								echo $perCourse['course_name'];
																								?>" class="cs-readmore-btn">Read more</a>
													<b class="cs-courses-price"  style="display: none"> &#8377; <?php
																									echo  
																									sprintf("%1\$.2f", $perCourse['amount']);
																								?>
<?php
																							 if($perCourse['pre_amount']!='' and $perCourse['pre_amount']>$perCourse['amount']){
																								?>
														<del><small style="opacity:0.7">&#8377;  <?php
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
							<h6>Find your course</h6>
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
							<h2>Departments & Programs</h2>
							<p style="color:#aaaaaa !important;">Whatever it is you want to do, Concordia’s more than 60 majors, including 15 honors majors.</p>
						</div>
					</div>
					<?php

					include "asideindex.php";
					?>
					<div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" ng-repeat="courseObj in listofSubCourse" ng-if="$index<6">
								<div class="cs-courses courses-grid">
									<div class="cs-media">
										<figure><a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}"><img style="height: 272px" src="{{courseObj.serverpath+courseObj.imagepath}}" alt="" /></a></figure>

									</div>
									<div class="cs-text">

										<div class="cs-rating">
											<div class="cs-rating-star">
												<span class="rating-box" style="{{courseObj.ratingstyle}};"></span>
											</div>
										</div>
										<div class="cs-post-title">
											<h5><a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}"> {{courseObj.course_name}}</a></h5>
										</div>
										<span class="cs-courses-price"> &#8377; {{courseObj.amount | number : 2}}

											<del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount"><small style="opacity:0.7">&#8377; {{courseObj.pre_amount | number : 2 }}</small></del>
										</span>
										<div class="cs-post-meta">
											<span>By
												<b class="cs-color">{{courseObj.instructor}}</b>

											</span>
											<i style="font-size:20px;float:right;cursor:pointer;color:green;" ng-show=" courseObj.alreadypurchased==true" title="Already Purchased" class="icon-check"></i>

											<i style="font-size:15px;float:right;cursor:pointer" ng-show="courseObj.addedToCart==false && courseObj.alreadypurchased==false" title="Add to cart" ng-click="addtocart(courseObj)" class="icon-cart"></i>
											<i style="font-size:15px;float:right;color:red;cursor:pointer" ng-show="courseObj.addedToCart==true && courseObj.alreadypurchased==false" ng-click="removefromcart(courseObj)" title="Remove from cart" class="icon-cart"></i>

										</div>
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

		<div class="page-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="widget cs-text-widget">
							<div class="cs-text" style="background:#FFF;padding:0;">
								<h2>Upcoming Courses</h2>
								<p>Text of the printing and typesetting best industry. Lorem Ipsum has been the nome industry's.
									standard text ever.</p>
								<a href="#" class="cs-bgcolor"><i class="icon-keyboard_arrow_right"></i> Check Calender</a>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-event left">
									<div class="cs-media">
										<span><strong>dec</strong>23</span>
									</div>
									<div class="cs-text">
										<em>12:59Pm-03:00Pm</em>
										<h5 style="margin-bottom:30px;"><a href="#">Four Sheridan teams set IAM3D Challenge Starting.</a></h5>
										<span><i class="icon-map-marker"></i>Rolson Garden-New Walters Street</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-event left">
									<div class="cs-media">
										<span><strong>dec</strong>23</span>
									</div>
									<div class="cs-text">
										<em>12:59Pm-03:00Pm</em>
										<h5 style="margin-bottom:30px;"><a href="#">Four Sheridan teams set IAM3D Challenge Starting.</a></h5>
										<span><i class="icon-map-marker"></i>Rolson Garden-New Walters Street</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-event left">
									<div class="cs-media">
										<span><strong>dec</strong>23</span>
									</div>
									<div class="cs-text">
										<em>12:59Pm-03:00Pm</em>
										<h5 style="margin-bottom:30px;"><a href="#">Four Sheridan teams set IAM3D Challenge Starting.</a></h5>
										<span><i class="icon-map-marker"></i>Rolson Garden-New Walters Street</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-section" style="margin-bottom:30px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-element-title" style="margin-bottom:30px;">
							<h2><?php echo $website;?> Faculty</h2>
						</div>
					</div>
					<ul class="cs-teamlist-slider">
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/faculty-01.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Sarah Johnson</a></h5>
									<span>Associate Professor of Anthropology</span>
									<p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/faculty-02.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Arthur Springs</a></h5>
									<span>Associate Professor of Anthropology</span>
									<p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/faculty-01.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Sarah Johnson</a></h5>
									<span>Associate Professor of Anthropology</span>
									<p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-team listing loop">
								<div class="cs-media">
									<figure>
										<a href="#"><img src="assets/extra-images/faculty-02.jpg" alt="#"></a>
									</figure>
								</div>
								<div class="cs-text">
									<h5><a href="#" class="cs-color">Arthur Springs</a></h5>
									<span>Associate Professor of Anthropology</span>
									<p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
									<div class="cs-social-media">
										<ul>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
											<li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="page-section" style="margin-bottom:28px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="cs-team">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title" style="margin-bottom:30px;">
										<h2>International Students</h2>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-team fancy">
										<div class="cs-media">
											<figure><img src="assets/extra-images/students-img-01.jpg" alt=""></figure>
										</div>
										<div class="cs-text">
											<h5><a class="cs-color" href="#">Margaret Mead</a></h5>
											<span>MBA-Final Year</span>
											<p>Center without the knowledge and we are experience that I gained through the Foundation the knowledge.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-team fancy">
										<div class="cs-media">
											<figure><img src="assets/extra-images/students-img-02.jpg" alt=""></figure>
										</div>
										<div class="cs-text">
											<h5><a class="cs-color" href="#">Margaret Mead</a></h5>
											<span>MBA-Final Year</span>
											<p>Center without the knowledge and we are experience that I gained through the Foundation the knowledge.</p>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-team fancy">
										<div class="cs-media">
											<figure><img src="assets/extra-images/students-img-03.jpg" alt=""></figure>
										</div>
										<div class="cs-text">
											<h5><a class="cs-color" href="#">Margaret Mead</a></h5>
											<span>MBA-Final Year</span>
											<p>Center without the knowledge and we are experience that I gained through the Foundation the knowledge.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="cs-element-title" style="margin-bottom:30px;">
							<h2>Quick FAQS</h2>
						</div>
						<div class="cs-quick-faqs">
							<p>Printing and typesetting best industry. Lorem Ipsum has been the best industry.</p>
							<ul class="row">
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>How to Enroll</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>CAMPUS MAP</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>Choose a Campus</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>Choose a Campus</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>Take a Test</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>Classes Structure</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>How to Pay</a>
								</li>
								<li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<a href="#"><i class="icon-circle-right"></i>How to Pay</a>
								</li>
							</ul>
							<a href="#" class="btn-faq"><i class="icon-circle-right"></i>View all FAQs</a>
							<a href="#" class="btn-faq"><i class="icon-circle-right"></i>Ask a Question</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-section" style="background-color:#f9fafa; padding:50px 0;">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="row cs-counter-holder">
							<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-counter simple center">
									<div class="cs-text">
										<strong class="counter cs-color">87,411</strong>
										<span>Colleges across campus</span>
										<p>Ac tristique fermentum dui enim non nisi integer viverra consectetur vulputate ullamcorper aenean lorem.</p>
									</div>
								</div>
							</li>
							<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-counter simple center">
									<div class="cs-text">
										<strong class="counter cs-color">87,411</strong>
										<span>Colleges across campus</span>
										<p>Ac tristique fermentum dui enim non nisi integer viverra consectetur vulputate ullamcorper aenean lorem.</p>
									</div>
								</div>
							</li>
							<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="cs-counter simple center">
									<div class="cs-text">
										<strong class="counter cs-color">25,729</strong>
										<span>alumni and growing</span>
										<p>Ac tristique fermentum dui enim non nisi integer viverra consectetur vulputate ullamcorper aenean lorem.</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
		<div class="page-section" style="margin-bottom:40px;">
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
		var app = angular.module('myApp', []);
		app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {

			$scope.listofcategory = [];
			$scope.listofSubCourse = $scope.listofSubCourseOriginal = undefined;
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
					url: 'insideapi.php?sub_course_id=' + courseObj._id + '&key=removefromcart',
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

			$scope.addtocart = function(courseObj) {

				$http({
					method: 'POST',
					url: 'insideapi.php',
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
				$http.get('insideapi.php?key=cartlist').
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