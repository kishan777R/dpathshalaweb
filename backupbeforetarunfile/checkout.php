<?php

include "header.php";

if (isset($_SESSION['cartArr'])) {
	if (count($_SESSION['cartArr']) > 0) {
		$_SESSION['order_no'] = "ORDS" . date('ymdHis'); //temprory bcz it will be asking for login
		if (isset($_SESSION['login_id'])) {

			$_SESSION['order_no'] = "ORDS" . date('ymdHis') . "_" . $_SESSION['login_id'];
			$totalamounttopay = 0;
			foreach ($_SESSION['cartArr'] as $per) {
				$totalamounttopay = $totalamounttopay + $per['amount'];
			}
			$_SESSION['totalamounttopay'] = $totalamounttopay;
		}
	}
}
?>


<!-- Main Start -->
<div class="main-section" ng-app="myApp" ng-controller="myCtrl" ng-cloak>


	<span id="getcartlistid" ng-click="refreshList()"></span>


	<div class="page-section" style="margin:0 0 70px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-section-title">
								<h2 align="center" ng-show="listofSubCourse.length>0">Your cart</h2>
								<br />
								<h6 ng-show="listofSubCourse.length>0" align="<?php
																				if ($mobile) {
																					echo "left";
																				} else {
																					echo "right";
																				}
																				?>">Order No. - <?php echo $_SESSION['order_no']; ?>,<br /> Order Date - <?php echo date("d-M-y"); ?>,<br /> Total Amount - &#8377; {{totalamount | number : 2}}</h6>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-repeat="courseObj in listofSubCourse" ng-if="courseObj.addedToCart">
							<div class="messagebox-v2 alert" style="padding: 0px !important">
								<button type="button" class="close-v1" data-dismiss="alert" title="Remove from cart " ng-click="removefromcart(courseObj)">
									<i class="icon-cross2"></i>
								</button>
								<?php
								if ($mobile) {
									echo "<br/>";
								}
								?>

								<table border=0 style="width: 99%;margin-top:25px">
									<tr>
										<td style="width: 10%;border:none">
											<a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}">
												<img style="height:80px;width:80px" src="{{courseObj.serverpath+courseObj.imagepath}}" alt="" />
											</a>

										</td>
										<td style="width: 90%;border:none;">
											<a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}">
												<strong style="line-height:0px;margin-top:10px;margin-left:25px"> {{courseObj.course_name}}</strong>
											</a>
											<span style="margin-left:25px; line-height:49px">By
												<b class="cs-color">{{courseObj.instructor}}</b>
												<h3 style="margin-left:25px;"> &#8377; {{courseObj.amount | number : 2 }}</h3>
											</span></td>

									</tr>
								</table>

							</div>

						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-md-4" ng-show="listofSubCourse.length>0">
							<div class="cs-field " style="float: left">
								<div class="cs-btn-submit">
									<?php
									if ($mobile) {
									?> <h5 class="cs-color"><a href="courses" style="color:#207dba;text-decoration:none">+ Add more courses !</a></h5><br/> 
									<?php

									} else {
									?> <h3 class="cs-color"><a href="courses" style="color:#207dba;text-decoration:none">+ Add more courses !</a></h3>
									<?php
									}
									?>



								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-md-8" ng-show="listofSubCourse.length>0"  style="float: right" >



							<div class="cs-field">
								<div class="cs-btn-submit"  >


									<?php
									if (isset($_SESSION['login_id'])) {
										if (isset($_SESSION['login_user_type']) and $_SESSION['login_user_type'] == 'STUDENT') {
									?>
											<input class="cs-bgcolor buttontypesubmit" style="float: right" type="button" onclick="window.location.href='makepayment2'" value="Place Order">
										<?php
										} else {
										?>
											<h3>To Purchase Courses, You have to login as a student </h3>

										<?php
										}
									} else {
										?>
										<input data-target="#cs-signup" data-toggle="modal" class="cs-bgcolor buttontypesubmit"  style="float: right"  type="button" value="Place Order">
									<?php
									}


									?>

								</div>
							</div>
						</div>
						<h3 align="center" ng-show="!listofSubCourse">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading Cart Items..
							<br /><br /><br /><br />
						</h3>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="listofSubCourse.length==0">
							<div class="messagebox-v2 alert">
								<div class="cs-media">

									<i style="font-size:30px;" class="icon-cart"></i>

								</div>

								<div class="cs-text">
									<strong> Your Cart Is Empty. <a href="courses" style="color:#207dba;text-decoration:none">Check our courses !</a></strong>

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
?>

<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {

		$scope.error = '';
		$scope.suc = '';
		$scope.submiting = false;
		$scope.toastermessage = '';
		$scope.listofSubCourse = undefined;



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
					$scope.cartList = jsondata.data.cartList;
					if ($scope.cartList) {
						document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
						document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					}
					document.getElementById("cartheaderfunctionid").click();
					$scope.totalamount = 0;
					for (var tx = 0; tx < $scope.cartList.length; tx++) {

						$scope.totalamount = $scope.totalamount + parseFloat($scope.cartList[tx].amount);
					}
					for (var t = 0; t < $scope.listofSubCourse.length; t++) {
						$scope.listofSubCourse[t].addedToCart = false;

						for (var tx = 0; tx < $scope.cartList.length; tx++) {


							if ($scope.cartList[tx].sub_course_id == $scope.listofSubCourse[t]._id) {

								$scope.listofSubCourse[t].addedToCart = true;
								break;
							}




						}
					}

				}

			});
		}






		$scope.getMainCourse = function() {
			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {
				var listofSubCourse = [];
				$scope.courseList = jsondata.data;

				for (var t = 0; t < $scope.courseList.length; t++) {

					$scope.courseList[t].addedToCart = false;
					for (var tx = 0; tx < $scope.cartList.length; tx++) {


						if ($scope.cartList[tx].sub_course_id == $scope.courseList[t]._id) {

							$scope.courseList[t].addedToCart = true;
							break;
						}




					}


					if ($scope.courseList[t].addedToCart && $scope.courseList[t].parent_course !== '0' && $scope.courseList[t].subjectstatus == 'TRUE' && $scope.courseList[t].imagepath) {

						var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
						$scope.courseList[t].ratingstyle = "width:" + rr;
						listofSubCourse.push($scope.courseList[t]);
					}

				}

				$scope.listofSubCourse = listofSubCourse;
			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.refreshList = function() {

			$scope.getCartList();


		}
		$scope.getCartList = function() {
			$scope.cartList = [];

			$http.get('insideapi.php?key=cartlist').
			then(function(jsondata) {

				$scope.cartList = jsondata.data.cartList;

				$scope.totalamount = 0;
				if ($scope.cartList) {
					document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
					document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
					for (var tx = 0; tx < $scope.cartList.length; tx++) {

						$scope.totalamount = $scope.totalamount + parseFloat($scope.cartList[tx].amount);
					}

				} else {

				}

				$scope.getMainCourse();






			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.getCartList();
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