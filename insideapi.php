<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
//error_reporting(0);
session_start();
include "constantphp.php";
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();
if ($detect->isMobile()) {
	$mobile = true;
} else {

	$mobile = false;
}
function Customarray_uniqu($cartarr)
{
	$tmp = array();
	$tmpC = array();
	//sub_course_id
	foreach ($cartarr as $per) {
		if (!in_array($per['sub_course_id'], $tmp)) {
			$tmpC[] = $per;
			$tmp[] = $per['sub_course_id'];
		}
	}
	return $tmpC;
}
if (isset($_GET) && isset($_GET['key'])) {

	if ($_GET['key'] == 'checkifitiscorrectstate') {
		$state =	$_GET['state'];
		$city =	$_GET['city'];

		foreach ($statecityArr as $key => $per) {
			if ($key == $state) {
				foreach ($per as  $perC) {
					if ($perC == $city) {
						echo json_encode(array("status" => "TRUE"));
						exit;
					}
				}
			}
		}
		echo json_encode(array("status" => "FALSE"));
	} else if ($_GET['key'] == 'citylistHTMLWhenStateChange') {
		$state =	$_GET['state'];
		$m = '';
		foreach ($statecityArr as $key => $per) {
			if ($key == $state) {
				foreach ($per as  $perC) {

					$m = $m . '	<option value="' . $perC . '">' . $perC . '</option>';
				}
			}
		}
		$m = $m . '';
		echo $m;
	} else if ($_GET['key'] == 'citylistHTMLWhenloadingpage') {
		if (isset($_SESSION['login_id'])) {
			if (isset($_SESSION['studentdata']['state']) &&  $_SESSION['studentdata']['state'] != '') {
				$state = $_SESSION['studentdata']['state'];
				$m = '';
				foreach ($statecityArr as $key => $per) {
					if ($key == $state) {
						foreach ($per as  $perC) {
							$m = $m . '	<option value="' . $perC . '">' . $perC . '</option>';
						}
					}
				}
				$m = $m . '';
				echo $m;
			} else {
				echo '';
			}
		} else {
			echo '';
		}
	} else if ($_GET['key'] == 'cartlistHTML') {
		if ($mobile) {
			$fontsize = "font-size:14px";
		} else {
			$fontsize = '';
		}

		if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
			$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);

			$totalamoun = 0;
			$v = "<table style='width:100%;border:none;$fontsize'><tr><th style='width:75%;border:none;color:white'>Courses Added</th><th style='border:none;color:white'>Price</th></tr>";
			foreach ($_SESSION['cartArr'] as $ed => $per) {
				$totalamoun = $totalamoun + $per['amount'];
				$sr = $ed + 1;
				$subid = $per['sub_course_id'];
				$r = '"remove(\'' . $subid . '\')"';
				$v = $v . "<tr><td style='border:none;color:white'>	$sr. $per[sub_course_name]";


				$v = $v . '&nbsp;&nbsp;<i style="color:black" title="Remove from cart" class="icon-trash" onClick=' . $r . '></i>';



				$v = $v . "</td ><td style='border:none;color:white'> &#8377;&nbsp;$per[amount]</td></tr>";
			}
			$totalamoun = sprintf('%.2f', $totalamoun);
			$v = $v . "<tr><th style='border-left:none;border-right:none; color:white'>	Total Amount</th ><th style='border-left:none;border-right:none; color:white'>&#8377;&nbsp;$totalamoun 	</th></tr>";

			$v = $v . "</table><span onclick='checkout()'  style='background-color:#207dba !important;color:white !important;float:right;font-size:14px !important;border-radius: 24px;'>&nbsp;&nbsp;Checkout&nbsp;&nbsp;</span>";
			echo $v;
		} else {
			echo "Your cart is empty !";
		}
		//
	} else if ($_GET['key'] == 'userdetails') {


		if (isset($_SESSION['login_id'])) {
			echo json_encode(array("userdetails" => $_SESSION['studentdata']));
		} else {
?>
			<script>
				window.location.href = "login";
			</script>
<?php
		}
	} else if ($_GET['key'] == 'cartlist') {
		if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
			$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);
		} else {
			$_SESSION['cartArr'] = [];
		}
		$alreadypurchasedSubcourseId = array();

		if (isset($_SESSION['login_id'])) {


			if (is_array($_SESSION['studentdata']['course'])) {

				if (count($_SESSION['studentdata']['course']) > 0) {

					foreach ($_SESSION['studentdata']['course'] as $per) {
						$alreadypurchasedSubcourseId[] = $per['sub_course_id'];
					}
				}
			}
		}

		echo json_encode(array("already_purchased_course_id_array" => $alreadypurchasedSubcourseId,  "cartList" => $_SESSION['cartArr']));
	} else if ($_GET['key'] == 'cartNumber') {

		if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
			$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);
		} else {
			$_SESSION['cartArr'] = [];
		}


		echo count($_SESSION['cartArr']);
	} else if ($_GET['key'] == 'removefromcart') {

		$sub_course_id = $_GET['sub_course_id'];
		$tempArr = [];
		if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {


			foreach ($_SESSION['cartArr'] as $per) {
				if ($sub_course_id != $per['sub_course_id']) {
					$tempArr[] = $per;
				}
			}
		}
		$_SESSION['cartArr'] = $tempArr;
		$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);

		$alreadypurchasedSubcourseId = array();

		if (isset($_SESSION['login_id'])) {


			if (is_array($_SESSION['studentdata']['course'])) {

				if (count($_SESSION['studentdata']['course']) > 0) {

					foreach ($_SESSION['studentdata']['course'] as $per) {
						$alreadypurchasedSubcourseId[] = $per['sub_course_id'];
					}
				}
			}
		}
		echo json_encode(array("already_purchased_course_id_array" => $alreadypurchasedSubcourseId, "message" => "Removed successfully !", "status" => "SUCCESS", "cartList" => $_SESSION['cartArr']));
	} else if ($_GET['key'] == 'removefromcartJustNumberReturn') {

		$sub_course_id = $_GET['sub_course_id'];
		$tempArr = [];
		if (isset($_SESSION['cartArr']) && count($_SESSION['cartArr']) > 0) {
			foreach ($_SESSION['cartArr'] as $per) {
				if ($sub_course_id != $per['sub_course_id']) {
					$tempArr[] = $per;
				}
			}
		}
		$_SESSION['cartArr'] = $tempArr;
		$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);

		echo  count($_SESSION['cartArr']);
	}
} else if (isset($_POST) && isset($_POST['key'])) {


	if ($_POST['key'] == 'saveloginclientdetails') {
		$_POST['clientdata'] = json_decode($_POST['clientdata'], true);
		if ($_POST['login_user_type'] == 'STUDENT' || $_POST['login_user_type'] == 'AFFILIATE') {
			$_SESSION['studentdata'] = $_POST['clientdata'];
			$_SESSION['login_id'] = $_POST['clientdata']['c_id_int'];
		} else {
			$_SESSION['teacherdata'] = $_POST['clientdata']; // to do
			$_SESSION['login_id'] = $_POST['clientdata']['c_id_int']; // to do
		}

		$_SESSION['login_user_type'] = $_POST['login_user_type'];
	} else	if ($_POST['key'] == 'updateImagePath') {

		if ($_SESSION['login_user_type'] == 'STUDENT' || $_POST['login_user_type'] == 'AFFILIATE') {
			$_SESSION['studentdata']['image_path'] = $_POST['image_path'];
			$_SESSION['studentdata']['serverpath'] = $_POST['serverpath'];
		} else {





			$_SESSION['teacher_image'] = $_POST['image_path'];
			$_SESSION['teacher_image_server'] = $_POST['serverpath'];
		}
	} else if ($_POST['key'] == 'saveloginclientdetails2') {
		$_POST['clientdata'] = json_decode($_POST['clientdata'], true);

		$_SESSION['studentdata'] = $_POST['clientdata'];
		$_SESSION['login_id'] = $_POST['clientdata']['c_id_int'];
		$_SESSION['login_user_type'] = $_POST['login_user_type'];
	} else if ($_POST['key'] == 'addtocart') {

		$amount = $_POST['amount'];
		$amount = sprintf('%.2f', $amount);
		$sub_course_name = $_POST['sub_course_name'];
		$sub_course_id = $_POST['sub_course_id'];
		$course_id = $_POST['course_id'];

		$alreadypurchasedSubcourseId = array();

		if (isset($_SESSION['login_id'])) {


			if (is_array($_SESSION['studentdata']['course'])) {

				if (count($_SESSION['studentdata']['course']) > 0) {

					foreach ($_SESSION['studentdata']['course'] as $per) {
						$alreadypurchasedSubcourseId[] = $per['sub_course_id'];
					}
				}
			}
		}

		$_SESSION['cartArr'][] = array("course_id" => $course_id, "sub_course_id" => $sub_course_id, "visitor_id" => $_SESSION['visitor_id'], "sub_course_name" => $sub_course_name, "amount" => $amount);
		$_SESSION['cartArr'] = Customarray_uniqu($_SESSION['cartArr']);


		echo json_encode(array("already_purchased_course_id_array" => $alreadypurchasedSubcourseId, "message" => "Added to cart successfully !", "status" => "SUCCESS", "cartList" => $_SESSION['cartArr']));
	}
}
