<?php


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

header('Access-Control-Allow-Origin: *');
error_reporting(0);




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

$courseIndex = 0;
$c_id_int = $customerData['c_id_int'];
foreach ($customerData['course'] as $k => $perCourseOfClient) {
    if ($perCourseOfClient["sub_course_id"] ==  $sub_course_id and $perCourseOfClient["course_id"] ==  $course_id) {

        $courseIndex = $k;
    }
}

if ($action == "create") {
    //$_SESSION['imgdata']=array("certificate_issued_date"=>$certificate_issued_date,"item"=>$item,"course_id"=>$course_id,"sub_course_id"=>$sub_course_id,"customer_name"=>$customer_name,"customer_lastname"=>$customer_lastname,"instructor"=>$instructor,"durationcertificate"=>$durationcertificate);


    //$urlOfInvoice =   "http://api.pdflayer.com/api/convert?access_key=16556adb1e8e4eaf6b62e8e570cf3ed3&document_url=https://xcellinsindia.com/lesson/certificate_lesson.php?" . 'data=' . $_id . '*' . $course_id . '*' . $sub_course_id . '*show&inline=1';
    $url = $urlOfInvoice =   "http://xcellinsindia.com/lesson/certificate_t.php?" . 'data=' . $_id . '*' . $course_id . '*' . $sub_course_id . "*show*" . date('ymdhis');




    // do something with finished. For example, show this image
    $letterPDFcontentInvoice = file_get_contents($urlOfInvoice);


    ///write
    $r = $c_id_int . "_" . $courseIndex . ".html";
    unlink("certificate/$r");
    $myfile = fopen("certificate/$r", "w") or die("Unable to open file!");
    $txt =  $letterPDFcontentInvoice;
    fwrite($myfile, $txt);

    fclose($myfile);


    $urlToSendfileToLessons =    "http://lessons.co.in/get_certificate_from_another_server.php?certificate_url=" . $r;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlToSendfileToLessons);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
    $isdatasend =  trim(curl_exec($ch));


    curl_close($ch);

    //  
    ///write
    if ($isdatasend == 'SUCCESS') {
        echo   json_encode(array("filemaderesponse" => true));
    } else {
        echo   json_encode(array("filemaderesponse" => false, "urlToSendfileToLessons" => $urlToSendfileToLessons));
    }
}
