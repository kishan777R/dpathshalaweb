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



?>
<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
 <div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div class="cs-page-title">
         <h1>

           <?php

            echo $_SESSION['studentdata']['first_name'] . " " . $_SESSION['studentdata']['last_name'];
            ?>
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
					 
						<li>Statements</li>
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
					<div class="page-content col-lg-8 col-md-8 col-sm-12 col-xs-12"  ng-app="myApp" ng-controller="myCtrl" ng-cloak id="App2">
						<div class="cs-user-content">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h2>Statements</h2>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 align="center" ng-show="!userdetails">
 									<br />

 									<img src="assets/the-cube-preloader.gif">
 									<br />Loading Course Details...
 									<br /><br /><br /><br />
 								</h3>
 								<h3 align="center" ng-show="userdetails.course.length==0">
 									<br />


 									<br />You have not purchased a single course till now !<br /><br />
 									<input class="cs-bgcolor buttontypesubmit" style="float: right" type="button" onclick="window.location.href='courses'" value="&nbsp;+ Add courses &nbsp;">

 									<br /><br /><br /><br />
 								</h3>
									<div class="cs-user-statements" ng-show="userdetails.course.length>0">
										<ul>
											<li>
												<div class="cs-statements-label">
													<ul>
														<li>Course name</li>
														<li>Purchase Date</li>
													
														<li>Price</li>	<li>Purchase&nbsp;ID</li>
													</ul>
												</div>
											</li>
                      <li ng-repeat="obj in userdetails.course">
												<div class="cs-statements-content">
													<ul>
														<li><span>{{obj.course_name}}</span></li>
														<li>{{ userdetails.orders[$index].order_date | date : 'MMM d, y'}}</li>
													
                            <li>&#8377; {{ userdetails.orders[$index].paid_amount  | number : 2}}</li>
                            <li>{{ userdetails.orders[$index].bank_array[0].TXNID  }}</li>
													</ul>
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
		</div>
	</div>
	<!-- Main End --> 
	<!-- Footer Start -->
  <?php

include "footer.php";
?><script>
 var app = angular.module('myApp', []);
 app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {

   $scope.userdetails = undefined;

   $scope.getuserDetails = function() {


     $http.get('insideapi.php?key=userdetails').
     then(function(jsondata) {
       $scope.userdetails = jsondata.data.userdetails;
       if ($scope.userdetails.course.length > 0) {


         for (var tx = 0; tx < $scope.userdetails.course.length; tx++) {
          
           for (var t = 0; t < $scope.courseList.length; t++) {

             if ($scope.userdetails.course[tx].sub_course_id == $scope.courseList[t]._id) {

               $scope.userdetails.course[tx].course_name = $scope.courseList[t].course_name;

             }




           }





         }
         
       }

     }).catch(function(jsondata) {
       console.error("error in posting");
     })

   }



   $scope.getMainCourse = function() {

     $http.get(apiurl + 'api/courses_subcourse_both').
     then(function(jsondata) {

       $scope.courseList = jsondata.data;


       $scope.getuserDetails();





     }).catch(function(jsondata) {
       console.error("error in posting");
     })

   }
   $scope.getMainCourse();
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
 angular.bootstrap(document.getElementById("App2"), ['myApp']);
</script>