<?php

session_start();

include "constant.php";

error_reporting(E_ALL);

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

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
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
	'redirect_url' =>  $server . 'redirect.php',
	'send_email' => false,
	//  'webhook' =>  $server . '/webhook/',
	'send_sms' => false,
	'email' => 	$_SESSION['studentdata']['email'],
	'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = json_decode(curl_exec($ch), true);

curl_close($ch);


if ($response['success']) {
	$instapurl = $response['payment_request']['longurl'];
	header("location: $instapurl");
} else {
?>
	<script>
		window.location.href = "courses";
	</script>
<?php
}

?>
?>