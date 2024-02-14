<?php

session_start();

include "constant.php";



if (!isset($_SESSION['order_no']) || !isset($_SESSION['totalamounttopay'])  || !isset($_SESSION['cartArr'])) {
?>
	<script>
		window.location.href = "/courses";
	</script>
<?php
} else if (count($_SESSION['cartArr']) == 0) {
?>
	<script>
		window.location.href = "/courses";
	</script>
	<?php
} else {

	if (isset($_SESSION['login_id'])) {
		if (isset($_SESSION['cartArr'])) {
			if (count($_SESSION['cartArr']) > 0) {
				if (is_array($_SESSION['studentdata']['course'])) {

					if (count($_SESSION['studentdata']['course']) > 0) {
						$alreadypurchasedSubcourseId = array();
						foreach ($_SESSION['studentdata']['course'] as $per) {
							$alreadypurchasedSubcourseId[] = $per['sub_course_id'];
						}
						$tempArr = [];
						foreach ($_SESSION['cartArr'] as $per) {
							if (!in_array($per['sub_course_id'], $alreadypurchasedSubcourseId)) {
								$tempArr[] = $per;
							}
						}
						if (count($_SESSION['cartArr']) == count($tempArr)) {
						} else {
	?>
							<script>
								window.location.href = "/checkout";
							</script>
<?php
						}
					}
				}
			}
		}
	}
}

$totalamounttopay = 0;
foreach ($_SESSION['cartArr'] as $per) {
	$totalamounttopay = $totalamounttopay + $per['amount'];
}
$_SESSION['totalamounttopay'] = $totalamounttopay;

?>



<?php
  

$orderArr = explode("_", $_SESSION['order_no']);

if (count($orderArr) != 2) {
?>
	<script>
		window.location.href = "courses";
	</script>
<?php
}


$_SESSION[$_SESSION['order_no']] = array("studentdata" => $_SESSION['studentdata'], 
"login_id" => $_SESSION['login_id'], "order_no" => $_SESSION['order_no'],
 "totalamounttopay" => $_SESSION['totalamounttopay'], "cartArr" => $_SESSION['cartArr']);
 
	if($isitlocalhost){
		$paymenturlurl='http://localhost:14436?login_id='.$_SESSION['login_id']."&order_id=".$_SESSION['order_no']."&amount=".$_SESSION['totalamounttopay'];
	}else{
		$paymenturlurl='payment?login_id='.$_SESSION['login_id']."&order_id=".$_SESSION['order_no']."&amount=".$_SESSION['totalamounttopay'];
	}
		
	
	header("location: $paymenturlurl");
 
?>
	 
?>