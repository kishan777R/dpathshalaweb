<?php

include "header.php";

if (!isset($_GET['o'])) {
?>
	<script>
		window.location.href = "studentcourses";
	</script>

<?php
} else {
	$orderNo = $_GET['o'];
}
?>


<!-- Main Start -->
<div class="main-section" ng-app="myApp" ng-controller="myCtrl" ng-cloak>



	<div class="page-section" style="margin:0 0 70px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-section-title">
								<h2 align="center" ng-show="orderlist.length>0">Transaction Details<br />
								<br /> 	<span ng-show="orderlist.length>0 && orderlist[0].order_status=='SUCCESS'" style="color:green">Your Transaction Is Successfull</span>
									<span ng-show="orderlist.length>0 && orderlist[0].order_status=='FAIL'" style="color:red">OOPS ! Your Transaction Is Not Successfull</span>


								</h2>
								 
							 
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="cs-section-title">
							<br />
								<h6 align="left" ng-show="orderlist.length>0">
									<span style="font-size:16px "> Order No.</span> - {{orderlist[0].order_no}}
									<br /> 	<br /> 	<span style="font-size:16px ">Order Date. </span>- {{orderlist[0].order_date | date : 'MMM d, y'}}
									<br /> 	<br /> 	<span style="font-size:16px ">Total Amount </span>- &#8377; {{orderlist[0].total_amount | number : 2}}
									<br /> 	<br /> 	<span style="font-size:16px ">Transaction Id</span> - {{orderlist[0].bank_array[0].TXNID }}
									<br /> 	<br /> 	<span style="font-size:16px ">Courses-</span> <span ng-repeat="orderObj in orderlist">
										{{orderObj.course_name}}
										<span ng-show="orderlist.length>$index+1">,</span>
									</span>

								</h6>
								<br/>
								<span ng-show="orderlist.length>0 && orderlist[0].order_status=='SUCCESS'">
								<?php
									if ($mobile) {
									?> <h5 class="cs-color"><a href="courses" style="color:#207dba;text-decoration:none">+ Add more courses !</a></h5><br />
									<?php

									} else {
									?> <h3 class="cs-color"><a href="courses" style="color:#207dba;text-decoration:none">+ Add more courses !</a></h3>
									<?php
									}
									?>
									</span>


									<span ng-show="orderlist.length>0 && orderlist[0].order_status=='FAIL'">
									<?php
									if ($mobile) {
									?> <h5 class="cs-color"><a href="checkout" style="color:#207dba;text-decoration:none">Try Again !</a></h5><br />
									<?php

									} else {
									?> <h3 class="cs-color"><a href="checkout" style="color:#207dba;text-decoration:none">Try Again !</a></h3>
									<?php
									}
									?>
										 
  
										

									</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-md-12" ng-show="orderlist.length>0">
							<div class="cs-field " style="float: right">
								<div class="cs-btn-submit">
									 

									<input class="cs-bgcolor buttontypesubmit" style="float: right;width:200px" type="button" onclick="window.location.href='studentcourses'" value="&nbsp;&nbsp;Go to your courses !&nbsp;&nbsp;">


								</div>
							</div>
						</div>


						<h3 align="center" ng-show="!orderlist">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading Order Details..
							<br /><br /><br /><br />
						</h3>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="orderlist.length==0">
							<div class="messagebox-v2 alert">
								<div class="cs-media">

									<i style="font-size:30px;" class="icon-cart"></i>

								</div>

								<div class="cs-text">
									<strong> No details found for order number <?php echo $_GET['o']; ?>. <a href="courses" style="color:#207dba;text-decoration:none">Check our courses !</a></strong>

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

		$scope.toastermessage = '';
		$scope.orderlist = undefined;









		$scope.getMainCourse = function(orderno) {
			$scope.order_no=orderno;
			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;
				$scope.getOrderDetails();
			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}
		$scope.getMainCourse('<?php echo $_GET['o'];?>');

		$scope.getOrderDetails = function() {


			$http.get(apiurl + 'api/getDetailOfParticularorder/'+$scope.order_no).
			then(function(jsondata) {
				var orderlist = [];
				for (var t = 0; t < jsondata.data.length; t++) {
					for (var t2 = 0; t2 < $scope.courseList.length; t2++) {
						if ($scope.courseList[t2]._id == jsondata.data[t].sub_course_id) {
							jsondata.data[t].course_name = $scope.courseList[t2].course_name;
						}

					}
					orderlist.push(jsondata.data[t]);
				}


				$scope.orderlist = orderlist;



			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}


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



	}]);
</script>