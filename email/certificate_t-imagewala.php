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

foreach ($customerData['course'] as $perCourseOfClient) {
    if ($perCourseOfClient["sub_course_id"] ==  $sub_course_id and $perCourseOfClient["course_id"] ==  $course_id) {

        $courseObj = $perCourseOfClient;
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
            background-image: url("back-imagewala.png");
            background-repeat: no-repeat;

        }
    </style>
</head>

<body><br /><br />
    <br /><br />
    <h1 align="center" style="font-size:50px">Certificate of Completion</h1>


    <p align="center" style="font-size:22px">
        This is to certify that <b><?php echo  $customer_name . " " . $customer_lastname; ?></b> successfully completed <b><?php echo $durationcertificate; ?></b> of <br /><b><?php echo $item; ?></b> online course on <b><?php echo  $certificate_issued_date; ?></b>
        <br /><br />
    </p>
    <p align="center"> <u style="font-size: 30px;font-family:Brush Script MT"><span style="padding: 5px"><?php echo $instructor; ?></span> </u> <br /> <?php echo $instructor; ?>:Instructor </p>
    <h3 align="center">&</h3>
    <center><img src="http://edutech.xcellinsindiapro.com:3000/uploads/logo.png" width="150" height="60"></center>
    <br />
    <p align="center">
        Certificate Number :  LESSONS<?php echo  $c_id_int .  $courseindex; ?><br />

    </p>
    <br />
    <p style="margin-left:130px">
        The certificate above verifies that <b><?php echo  $customer_name . " " . $customer_lastname; ?></b> successfully completed the course <b><?php echo $item; ?></b> on <b><?php echo  $certificate_issued_date; ?></b><br /> as taught by <?php echo $instructor; ?> on Lessons.
        This certificate indicates that the entire course was completed as validated by the <br />student.
    </p>
</body>

</html>