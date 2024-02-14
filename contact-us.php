<?php

include "header.php";
?>


<!-- Main Start -->
<div class="main-section">

	<!--Page Section Wide With Left SideBar-->
	<div class="page-section" style="padding-top:38px; margin-bottom:100px;">
		<div class="container">

			<div class="row">
				<?php

				include "aside.php";
				?>
				<div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="row">
						<!--Element Section Start-->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-section-title left">
								<h2>Contact Us</h2>
								<p>Contact Digital Pathshala by any options. </p>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<ul class="cs-contact-fancy center">
										<li>
											<div class="cs-media"> <span> <i class="icon-mobile-phone cs-color" style="font-size:50px;line-height:31px; "></i> </span> </div>
										</li>
										<li>
											<div class="cs-text">
												<h5>Call: <?php echo $mobileq; ?></h5>
											</div>
										</li>
										<li>
											<div class="cs-text">
												<p>Reach us during business hours (Mon-Fri 9-5,
													Pacific Time) to chat with our friendly team.</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<ul class="cs-contact-fancy center">
										<li>
											<div class="cs-media"> <span> <i class="icon-envelope2 cs-color"></i> </span> </div>
										</li>
										<li>
											<div class="cs-text">
												<h5><a href="mailto:<?php echo $emailUniversal; ?>"><?php echo $emailUniversal; ?></a></h5>
											</div>
										</li>
										<li>
											<div class="cs-text">
												<p>Our sales & support team is standing by!
													We are looking forward to hearing from you.</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none;">
							<div class="row">
								<div class="cs-contact-info">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="cs-section-title">
											<h2>Main Campus</h2>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<ul>
											<li>
												<div class="cs-media"> <i class="icon-uniF10D"></i> </div>
												<div class="cs-text"> <span>Universiy of Study </span>
													<p>12345 Old Allegiance Eng, Suite 123 New city
														Springs, XYZ 12345</p>
												</div>
											</li>
											<li>
												<div class="cs-media"> <i class="icon-uniF113"></i> </div>
												<div class="cs-text"> <span>Email:</span>
													<p><a href="mailto:<?php echo $emailUniversal; ?>"><?php echo $emailUniversal; ?></a></p>
												</div>
											</li>
											<li>
												<div class="cs-media"> <i class="icon-uniF106"></i> </div>
												<div class="cs-text"> <span>Office Phone:</span>
													<p>Dial 773.702.4199</p>
												</div>
											</li>
											<li>
												<div class="cs-media"> <i class="icon-uniF125"></i> </div>
												<div class="cs-text"> <span>Office Timing</span>
													<p>08:00 Pm - 23:00 Pm</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<!--Image Frame Start-->
										<div class="image-frame defualt">
											<div class="cs-media">
												<figure> <img src="assets/extra-images/contact-us-img-01.jpg" alt="" /> </figure>
											</div>
										</div>
										<!--Image Frame End-->
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!--Contact Form Element Start-->
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-contact-form">
									<div class="cs-section-title">
										<h2>Quick Inquiry</h2>
									</div>
									<div class="form-holder" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
										<div class="row">
											<form >
												<br />
												<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12" ng-bind="error" style='color:red'></div>
												<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12" ng-bind="suc" style='color:green'></div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="row">
														<div class="cs-form-holder">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<label>Name</label>
															</div>
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<div class="input-holder"> <i class="icon-user"></i>
																	<input ng-model="name" type="text" placeholder="First Name & Last Name">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="row">
														<div class="cs-form-holder">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<label>Email Address</label>
															</div>
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<div class="input-holder"> <i class=" icon-envelope"></i>
																	<input type="text" ng-model="email" placeholder="Example@domain.com">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="row">
														<div class="cs-form-holder">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<label>Phone Number</label>
															</div>
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<div class="input-holder"> <i class="icon-phone3"></i>
																	<input type="text" ng-model="phone" placeholder="7737028650">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
													<div class="row">
														<div class="cs-form-holder">
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<label>What is the Concern</label>
															</div>
															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<div class="input-holder"> <i class="icon-paragraph-left"></i>
																	<input type="text" ng-model="subject" placeholder="About Concern ">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="cs-form-holder">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<label>Message</label>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="input-holder"> <i class="icon-pencil-square-o"></i>
															<textarea placeholder="Message here..." ng-model="message"></textarea>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
													<div class="cs-field">
														<div class="cs-btn-submit"> <i class=" icon-angle-right"></i>

															<input ng-show="!submiting" class="cs-bgcolor buttontypesubmit"  type="button" value="Submit Email" ng-click="saveContact()">
															<input ng-show="submiting" disabled class="cs-bgcolor buttontypesubmit" type="button" value="Submitting...">


														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--Contact Form Element End-->
						</div>
						<!--Element Section End-->
					</div>
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
        $scope.name = undefined;
        $scope.email = undefined;
        $scope.message = undefined;
        $scope.subject = undefined;
        $scope.phone = undefined;
        $scope.error = '';
        $scope.suc = '';
        $scope.submiting = false;
        $scope.toastermessage = '';
        $scope.saveContact = function() {
            $scope.submiting = false;
            $scope.error = '';
            $scope.suc = '';


            if ($scope.name == undefined || $scope.phone == undefined || $scope.message == undefined || $scope.subject == undefined || $scope.email == undefined) {
                $scope.toastermessage = $scope.error = " Please Fill All Fields !!";  $scope.showtoaster('WARNING');
                return false;
            } else if ($scope.name.trim() == '' || $scope.subject.trim() == '' || $scope.phone.trim() == '' || $scope.message.trim() == '' || $scope.email.trim() == '') {
                $scope.toastermessage = $scope.error = " Please Fill All Fields !!";  $scope.showtoaster('WARNING');
                return false;
            } else {
                $scope.submiting = true;

                $http({
                    method: 'POST',
                    url: 'api/contactapi.php',
                    data: 'name=' + $scope.name + '&email=' + $scope.email + '&subject=' + $scope.subject + '&message=' + $scope.message + '&phone=' + $scope.phone,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(function(jsondata) {
                    $scope.submiting = false;
                    if (jsondata.data.status == 'FALSE') {
                        $scope.toastermessage = $scope.error = jsondata.data.message;  $scope.showtoaster('ERROR');
                    } else {
                        $scope.toastermessage = $scope.suc = jsondata.data.message;
                        $scope.showtoaster('SUCCESS');
                        $scope.name = undefined;
                        $scope.email = undefined;
                        $scope.message = undefined;
                        $scope.subject = undefined;
                        $scope.phone = undefined;
                    }

                });
            }
        }

        $scope.showtoaster = function(wht) {
			var ismobile=	document.getElementById("ismobile").value;
		if(ismobile=='NO'){
			var x = document.getElementById("snackbar");
		}else{
			var x = document.getElementById("snackbarM");
		}
            x.innerHTML =$scope.toastermessage;
            x.className = "show";

            if(wht=='SUCCESS'){
                x.style.   backgroundColor="green";
            }else if(wht=='WARNING'){
                x.style.   backgroundColor="orange";
            }else{
                x.style.   backgroundColor="red"; 
            }
        
         
         
        
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }



    }]);
</script>