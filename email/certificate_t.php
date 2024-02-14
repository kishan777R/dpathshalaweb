<!DOCTYPE html>
<html>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

header('Access-Control-Allow-Origin: *');
error_reporting(0);

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$dataArr = explode("*", $_GET['data']);
$_id = $dataArr[0];
$course_id = $dataArr[1];

$sub_course_id = $dataArr[2];
$action = $dataArr[3];

$urlToGetCustomerDetails =    "http://edutech.xcellinsindiapro.com:3000/api/clientbyid/" . $_id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlToGetCustomerDetails);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
$customerData = json_decode(trim(curl_exec($ch)), true);


curl_close($ch);

$courseObj = [];
$courseindex=0;
foreach ($customerData['course'] as $key=>$perCourseOfClient) {
    if ($perCourseOfClient["sub_course_id"] ==  $sub_course_id and $perCourseOfClient["course_id"] ==  $course_id) {

        $courseObj = $perCourseOfClient;
        $courseindex=$key;
    }
}

///////// ************************************* certificate is on lesson.co.in


$urlToGetCommissionJson_child = "http://edutech.xcellinsindiapro.com:3000/api/courses_subcourse_both";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urlToGetCommissionJson_child);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
$courseData =  json_decode(trim(curl_exec($ch)), true);

curl_close($ch);

///////// ************************************* certificate is on lesson.co.in



foreach ($courseData as $perCourse) {
    if ($perCourse["_id"] ==  $sub_course_id) {
        $sub_coursename = $perCourse["course_name"];
        $instructor = $perCourse["instructor"];
    }
    if ($perCourse["_id"] ==  $course_id) {
        $coursename = $perCourse["course_name"];
    }
}
$item = $sub_coursename;
///////// ************************************* certificate is on lesson.co.in


  $certificate_issued_date = convertDate($courseObj['certificate_issued_date']);


if (isset($courseObj["is_self_paced"]) && $courseObj["is_self_paced"]) {
    $duration =   " Self Paced";
} else {
    if ($courseObj["duration_type"] == "Month") {
        $duration = $courseObj["duration"] * 30 . " Days";
    } else {
        $duration = $courseObj["duration"]   . " Days";
    }
}

if ($courseObj["duration_type"] == "Month" || !isset($courseObj["duration_type"])) {
    $durationcertificate = $courseObj["duration"] * 30 . " Days";
} else {
    $durationcertificate = $courseObj["duration"]   . " Days";
}


// customer

$customer_name = $customerData['first_name'];
$customer_lastname = $customerData['last_name'];
$address1 = $customerData['address'];
$address2 = $customerData['address2'];
$state = $customerData['state'];
$city = $customerData['city'];
$c_id_int = $customerData['c_id_int'];
function convertDate($d)
{
    $arr = explode("T", $d);
    return date('d-M-Y', strtotime($arr[0]));
}
?>

<head>

    <style>
        body {
            background-image: url("back.png");
            background-repeat: no-repeat;

        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



    <script>
        $(window).resize(function() {
            $("#dimensions").html($(window).width());
        }).resize();

        $(window).resize(function() {
            var mobileWidth = (window.innerWidth > 0) ?
                window.innerWidth :
                screen.width;
            var viewport = (mobileWidth > 360) ?
                'width=device-width, initial-scale=1.0' :
                'width=1200';
            $("meta[name=viewport]").attr('content', viewport);
        }).resize();
    </script>
</head>

<body><br /><br />

    <h1 align="center" style="font-size:25px;color:#184889">Certificate&nbsp;of&nbsp;Completion</h1>


    <p align="center" style="font-size:16px">
        This is to certify that <b><?php echo  $customer_name . " " . $customer_lastname; ?></b> successfully completed <b><?php echo $durationcertificate; ?></b> of <br /><b><?php echo $item; ?></b> online course<br /> on <b><?php echo  $certificate_issued_date; ?></b>
        <br /><br />
    </p>
    <!-- font-family:Brush Script MT -->
    <p align="center" style="font-size: 14px;">   <?php echo $instructor; ?>:Instructor </p>
    <h3 align="center">&</h3>
    <center><img src="http://lessons.co.in/images/logo.png" ></center>
    <br /> <br />
    <p align="center" >
        &nbsp; &nbsp;Certificate Number : LESSONS<?php echo  $c_id_int .  $courseindex; ?><br />

    </p>
  
    <div style="font-size: 12px;position: fixed;
  
   bottom: 40px;text-align:center">
        <hr />
        The certificate above verifies that <b><?php echo  $customer_name . " " . $customer_lastname; ?></b> successfully completed the course <b><?php echo $item; ?></b> on <b><?php echo  $certificate_issued_date; ?></b> as taught by <?php echo $instructor; ?> on Lessons.
        This certificate indicates that the entire course was completed as validated by the student.
    </div>
</body>

</html>