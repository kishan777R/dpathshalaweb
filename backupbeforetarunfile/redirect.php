<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<?php

session_start();

include "constant.php";


if (!isset($_SESSION['order_no']) || !isset($_SESSION['totalamounttopay'])  || !isset($_SESSION['cartArr'])) {
?>
	<script>
		window.location.href = "courses";
	</script>
<?php
} else if (count($_SESSION['cartArr']) == 0) {
?>
	<script>
		window.location.href = "courses";
	</script>
<?php
}

//$_GET['payment_status'] = 'Credit';
$bankArr =  $_GET;

$payment_status = $_GET['payment_status'];
$payment_request_id = $_GET['payment_request_id'];
$payment_id = $_GET['payment_id'];



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.instamojo.com/api/1.1/payment-requests/$payment_request_id/$payment_id/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt(
	$ch,
	CURLOPT_HTTPHEADER,
	array(
		"X-Api-Key:$apikey",
		"X-Auth-Token:$apiauth"

	)
);
$payload = array(


	'purpose' => 'PURCHASING DPATHSHALA COURSES',
	'amount' => $_SESSION['totalamounttopay'],
	'phone' => 	$_SESSION['studentdata']['mobile'],

	'buyer_name' => 	$_SESSION['studentdata']['first_name'],
	'redirect_url' =>  $server . '/redirect.php',
	'send_email' => true,
	//  'webhook' =>  $server . '/webhook/',
	'send_sms' => true,
	'email' => 	$_SESSION['studentdata']['email'],
	'allow_repeated_payments' => false
);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

if ($_GET['payment_status'] == 'Credit') {
	$_SESSION['transaction_status'] = 'SUCCESS';
} else {
	$_SESSION['transaction_status'] = 'FAIL';
}
?>
<h2 align="center">


	<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>
		<br />
		<div ng-show="message==''">
			<img src="assets/the-cube-preloader.gif">
			<br />Loading Transaction Details..
			<br /><br /><br /><br />
		</div>
		<div ng-show="message!=''">

			<br />
			<h1>{{message}}</h1>
			<br /><br /><br /><br />
		</div>
	</div>
</h2>
<script>
	var app = angular.module('myApp', []);
	app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
		//processed
		$scope.message = "";
		$scope.currentprocessingindex = -1;
		$scope.orderIdarry = [];
		$scope.updateOrderStatus = function(c_id_int, bankArr, order_no, cart_array, totalamount, payment_status, payment_id) {
			$scope.message = "";
			$scope.payment_status = payment_status;
			if ($scope.payment_status == 'Credit') {
				$scope.order_status = 'SUCCESS';

			} else {
				$scope.order_status = 'FAIL';
			}

			$scope.order_no = order_no;


			$http({
				method: 'POST',
				url: apiurl + 'api/updateorderfromwebsite',
				data: 'bankArr=' + encodeURIComponent(angular.toJson(bankArr)) + "&cart_array=" + encodeURIComponent(angular.toJson(cart_array)) + "&c_id_int=" + c_id_int + "&totalamount=" + totalamount + "&order_no=" + order_no,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {

				if (jsondata.data.status == 'SUCCESS') {

					$scope.getOrderDetails();
				} else {
					if ($scope.payment_status == 'Credit') {
						$scope.message = "Something Went Wrong. Contact Website Owner with payment id : " + payment_id;


					} else {

						//window.location.href = "checkout";
					}
				}


			});
		}

		$scope.getOrderDetails = function() {


			$http.get(apiurl + 'api/getDetailOfParticularorder/' + $scope.order_no).
			then(function(jsondata) {
				var orderIdarry = [];
if( jsondata.data.length>0){


				
				for (var t = 0; t < jsondata.data.length; t++) {

					orderIdarry.push({
						"_id": jsondata.data[t]._id,
						"processed": false
					});
				}


				$scope.orderIdarry = orderIdarry;
				$scope.functiontoupdateClientData();
			}else{
				$scope.getOrderDetails();
			}

			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}

		$scope.updateStudentCourseAftertransaction = function(clientdata) {
			$http({
				method: 'POST',
				url: 'insideapi',
				data: 'clientdata=' + JSON.stringify(clientdata) + "&login_user_type=STUDENT&key=saveloginclientdetails2",
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				if ($scope.payment_status == 'Credit') {
					console.log("22222222222");
					$scope.sendEmailOfSuccess();
				} else {
					setTimeout(function() {

						console.log("ffffffffff");
						 window.location.href = "transaction?o=" + $scope.order_no;
					}, 1000);
				}




			});
		}

		$scope.sendEmailOfSuccess = function() {
			$http({
				method: 'GET',
				url: 'email/email.php?data=getthere*' + $scope.order_no + '*EMAIL_WEBSITE_STUDENT',
				data: '',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {

			 
				setTimeout(function() {
					 	window.location.href = "transaction?o=" + $scope.order_no;
					}, 1000);

			});
		}
		$scope.getUpdatedStudentDetails = function(c_id_int) {
			$http({
				method: 'POST',
				url: apiurl + 'api/detailsofstudentbycidint',
				data: 'c_id_int=' + c_id_int,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {
				$scope.updateStudentCourseAftertransaction(jsondata.data);



			});
		}
		$scope.functiontoupdateClientData = function() {
			$scope.currentprocessingindex = -1;
			for (var t = 0; t < $scope.orderIdarry.length; t++) {
				if ($scope.orderIdarry[t].processed) {

				} else {
					$scope.currentprocessingindex = t;
					break;
				}

			}
			
			
 			if ($scope.currentprocessingindex == -1) {
			 
				//////////////	
				$scope.getUpdatedStudentDetails("<?php echo $_SESSION['login_id']; ?>");
			}
			$http({
				method: 'POST',
				url: apiurl + 'api/updateStatusOfOrder',
				data: 'order_table_id=' + $scope.orderIdarry[$scope.currentprocessingindex]['_id'] + "&order_status=" + $scope.order_status,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(function(jsondata) {

				if (jsondata.data.status == 'SUCCESS') {

					 
					if (jsondata.data.newOrder.order_status != 'PENDING') {
						$scope.orderIdarry[$scope.currentprocessingindex]['processed'] = true;
					}

					$scope.functiontoupdateClientData();
				} else {
					if ($scope.payment_status == 'Credit') {
						$scope.message = "Something Went Wrong. Contact Website Owner with payment id : " + payment_id;

					} else {

						window.location.href = "checkout";
					}
				}


			});

		}

		$scope.getCartList = function() {
			$scope.cartList = [];

			$http.get('insideapi.php?key=cartlist').
			then(function(jsondata) {

				$scope.cartList = jsondata.data.cartList;
				var bankArr = {
					'payment_id': '<?php echo $payment_id; ?>',
					payment_status: '<?php echo $payment_status; ?>',
					payment_request_id: '<?php echo $payment_request_id; ?>'
				};

				$scope.updateOrderStatus('<?php echo $_SESSION['login_id']; ?>', bankArr, '<?php echo $_SESSION['order_no']; ?>', $scope.cartList, '<?php echo   $_SESSION['totalamounttopay'] ?>', '<?php echo $payment_status;  ?>', '<?php echo $payment_id; ?>');







			}).catch(function(jsondata) {
				console.error("error in posting");
			})

		}
		$scope.getCartList();
	}]);
</script>