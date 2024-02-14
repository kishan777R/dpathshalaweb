<?php

include "header.php";
include "includeinsidelogin.php";
if ($_SESSION['login_user_type'] == 'AFFILIATE' or $_SESSION['login_user_type'] == 'STUDENT') {
} else {
?>
	<script>
		window.location.href = "logout";
	</script>
<?php
}



?>

<!-- Sub Header Start -->
<div class="page-section" style="background:url(assets/extra-images/sub-header-about-img.jpg); background-size:cover;padding:87px 0 35px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="cs-page-title">
					<h1 style="color:#fff !important;">

						Affiliate Statistics
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


					<li> Affiliate Statistics</li>
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
						<h3 align="center" ng-show="!listofSubCourse">
							<br />

							<img src="assets/the-cube-preloader.gif">
							<br />Loading Affiliate Statistics....
							<br /><br /><br /><br />
						</h3>
						<h3 align="center" ng-show="listofSubCourse.length==0">
							<br />


							<br />No details found, Try after sometime !<br /><br />

							<br /><br /><br /><br />
						</h3>
						<div class="row cs-field-holder" ng-show="listofSubCourse"><div class="col-lg-10">
						<select  class="chosen-select" ng-model="datetype" ng-change="updatedashboard()"   >
							<option value="">Filter Statistics</option>
							<option value="ALL">All</option>

							<option value="Today">Today</option>
							<option value="Yesterday">Yesterday</option>
							<option value="Day Before Yesterday">Day Before Yesterday</option>

							
							<option value="Last 7 days">Last 7 days</option>
							<option value="Last 30 days">Last 30 days</option>
							<option value="This Month">This Month</option>
							<option value="Last Month">Last Month</option>
							<option value="This Week">This Week</option>
							<option value="Last Week">Last Week</option>



						</select>	</div></div>
						<br /> 
						<div class="row" ng-show="listofSubCourse">

							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;  "> <i class="icon-user cs-color"></i>

											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{totalregistration}}
											</span>

										</b>
										<p>Registration</p>
									</div>
								</div>

							</div>

							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;"> <i class="icon-graduation-cap cs-color"></i>
											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{totalStudentNumber}}
											</span>
										</b>
										<p>Students</p>
									</div>
								</div>

							</div>


							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;"> <i class="icon-user cs-color"></i>
											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{uniquevisitorWebsite}}
											</span>

										</b>
										<p>Unique Visitor</p>
									</div>
								</div>

							</div>

							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;"> <i class="icon-pen cs-color"></i>
											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{totalOrderNumber}}
											</span>

										</b>
										<p>Sale Number</p>
									</div>
								</div>

							</div>


							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;"> <i class="icon-rupee cs-color"></i>
											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{totalSaleAmount | number : 2}}
											</span>

										</b>
										<p>Sale Amount</p>
									</div>
								</div>

							</div>

							<div class="col-lg-4">
								<div class="card">

									<div class="container1">
										<b style="font-size: 30px;"> <i class="icon-rupee cs-color"></i>
											<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
												{{commission | number : 2}}
											</span>

										</b>
										<p>Commission </p>
									</div>
								</div>

							</div>

						</div>
						<style>
							.card {

								transition: 0.3s;
								width: 100%;
								margin-bottom: 20px;
								box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);

							}

							.card:hover {
								box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
							}

							.container1 {
								padding: 12px 26px;
								width: 250px;
							}
						</style>

						<br />
						<br />
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="listofSubCourse.length>0">
							<div class="cs-section-title">
								<h2 style="margin-bottom: 0px">Statistics according to affiliate links </h2>

							</div>
						</div>
						<div class="row" ng-repeat="courseObj in listofSubCourse" ng-if="courseObj.wheretoshowinwebsite!=='UPCOMING'">

							<ul class="cs-shortlisted">
								<li>
									<div class="cs-media">
										<figure><a ng-click='rediretctocourse(courseObj)' style="cursor:pointer"><img src="{{courseObj.serverpath+courseObj.imagepath}}" style="height: 100px" alt="" /></a></figure>
									</div>
									<div class="cs-text">

										<h5 ng-click='rediretctocourse(courseObj)' style="cursor:pointer"> {{courseObj.course_name}}
											<br />
											<b class="cs-color" style="font-size: 12px">By {{courseObj.instructor}}</b>
										</h5>

										<span class="cs-courses-price"> &#8377; {{courseObj.amount | number : 2}}

											<del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount"><small style="opacity:0.7">&#8377; {{courseObj.pre_amount | number : 2 }}</small></del>
										</span><br />


										<b style="font-size: 12px">Unique Visitors :
									
										<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
											{{getUniqueVisitor(courseObj._id)}}  
											</span>
									
									</b>
										<br />
										<b style="font-size: 12px">Sale Number :
										<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
											{{getSaleNumberaMOUNT(courseObj._id,"number")}} 
											</span>
									
									</b>
										<br />
										<b style="font-size: 12px">Sale Amount :
										
										<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
											&#8377; 	{{getSaleNumberaMOUNT(courseObj._id,"amount") | number : 2}}
											</span>
										
										
									</b>
										<br />
										<b style="font-size: 12px">Commission Amount : 
										<i class="icon-spinner icon-spin cs-color" ng-show="loading"></i>
											<span ng-show="!loading">
											&#8377; {{getSalecommissionaMOUNT(courseObj._id) | number : 2}} 
											</span>
										
									
									
									
									
									</b>

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
<input type="hidden" id="myInput" value="">

<?php

include "footer.php";
?><script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
		//        res.json({ "uniquevisitorWebsite": uniquevisitorWebsite, "affList": affList, "orderList": orderList,
		// "fisrtFrom": fisrtFrom, "totalregistration": totalInstall, "from_date": from_date, "to_date": to_date, 
		//'totalStudentNumber': totalUser, 'totalOrderNumber': totalOrder, 'totalSaleAmount': totalSaleAmount });

		$scope.datetype = "ALL";
		$scope.f = "";
		$scope.t = "";
		$scope.loading = true;
		$scope.uniquevisitorWebsite = 0;
		$scope.commission = 0;
		$scope.totalregistration = 0;
		$scope.totalOrderNumber = 0;
		$scope.affList = [];
		$scope.orderList = [];
		$scope.totalStudentNumber = 0;

		$scope.totalSaleAmount = 0.00;



		$scope.updatedashboard=function(){
		 
			$scope.getAffiliateDashboardData("<?php echo $_SESSION['login_id']; ?>");
		}

		$scope.getUniqueVisitor = function(course_id) {
			var UniqueVisitor = 0;
			for (var t = 0; t < $scope.affList.length; t++) {
				if ($scope.affList[t]['course_id'] == course_id) {
					UniqueVisitor = UniqueVisitor + 1;
				}

			}
			return UniqueVisitor;

		}
		$scope.getSaleNumberaMOUNT = function(course_id, type) {
			var salenumber = 0;
			var saleamount = 0;
			for (var t = 0; t < $scope.orderList.length; t++) {
				if ($scope.orderList[t]['sub_course_id'] == course_id) {
					salenumber = salenumber + 1;
					saleamount = saleamount + $scope.orderList[t]['amount'];
				}

			}
			if (type == "number") {
				return salenumber;
			} else {
				return saleamount;
			}


		}
		$scope.getSalecommissionaMOUNT = function(course_id) {
			var salenumber = 0;
			var saleamount = 0;
			for (var t = 0; t < $scope.orderList.length; t++) {
				if ($scope.orderList[t]['sub_course_id'] == course_id) {
					salenumber = salenumber + 1;
					saleamount = saleamount + $scope.orderList[t]['amount'];
				}

			}
			return Math.round(((saleamount * 60) / 100));


		}
		$scope.getAffiliateDashboardData = function(cidint) {

			$scope.loading = true;

			$http({
				method: 'POST',
				url: apiurl + 'api/getAffiliateDashboardData',
				data: 'dateType=' + $scope.datetype + "&from_date=" + $scope.f + "&to_date=" + $scope.t + "&cidint=" + cidint,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {

				$scope.totalStudentNumber = jsondata.data.totalStudentNumber;
				$scope.uniquevisitorWebsite = jsondata.data.uniquevisitorWebsite;
				$scope.totalOrderNumber = jsondata.data.totalOrderNumber;
				$scope.totalregistration = jsondata.data.totalregistration;
				$scope.totalSaleAmount = jsondata.data.totalSaleAmount;
				$scope.affList = jsondata.data.affList;

				$scope.orderList = jsondata.data.orderList;
				$scope.commission = Math.round((($scope.totalSaleAmount *60) / 100));
				$scope.loading = false;

			});

		}
		$scope.getAffiliateDashboardData("<?php echo $_SESSION['login_id']; ?>");

		$scope.listofSubCourse = undefined;
		$scope.rediretctocourseReturn = function(server, courseobj, login_id) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'
			return server + "course/" + t + "?aff=" + login_id;
		}
		$scope.rediretctocourseReturnWeb = function(server, login_id) {


			return server + "?aff=" + login_id;
		}
		$scope.copyLink = function(server, courseobj, login_id) {

			localStorage.setItem("_id", courseobj._id);
			localStorage.setItem("upcoming", 'NO');
			var t = $scope.replaceAll(courseobj.course_name, ' ', '-'); // => 'move move move!'

			var val = server + "course/" + t + "?aff=" + login_id;



			const selBox = document.createElement('textarea');
			selBox.style.position = 'fixed';
			selBox.style.left = '0';
			selBox.style.top = '0';
			selBox.style.opacity = '0';
			selBox.value = val;
			document.body.appendChild(selBox);
			selBox.focus();
			selBox.select();
			document.execCommand('copy');
			document.body.removeChild(selBox);
			$scope.toastermessage = "Copied the affiliate link : " + val;
			$scope.showtoaster("SUCCESS");
		}
		$scope.copyLinkWeb = function(server, login_id) {

			var val = server + "?aff=" + login_id;



			const selBox = document.createElement('textarea');
			selBox.style.position = 'fixed';
			selBox.style.left = '0';
			selBox.style.top = '0';
			selBox.style.opacity = '0';
			selBox.value = val;
			document.body.appendChild(selBox);
			selBox.focus();
			selBox.select();
			document.execCommand('copy');
			document.body.removeChild(selBox);
			$scope.toastermessage = "Copied the affiliate link : " + val;
			$scope.showtoaster("SUCCESS");
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
		$scope.getMainCourse = function() {

			$http.get(apiurl + 'api/courses_subcourse_both').
			then(function(jsondata) {

				$scope.courseList = jsondata.data;
				$scope.listofSubCourse = [];
				for (var t = 0; t < $scope.courseList.length; t++) {
					var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
					$scope.courseList[t].ratingstyle = "width:" + rr;
					if ($scope.courseList[t].parent_course !== '0' && $scope.courseList[t].subjectstatus == 'TRUE' && $scope.courseList[t].imagepath) {


						$scope.listofSubCourse.push($scope.courseList[t]);



					}
				}
			}).catch(function(jsondata) {
				console.error("error in posting" + jsondata);
			})

		}
		$scope.getMainCourse();







	}]);
	angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>