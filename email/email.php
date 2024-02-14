 
     <?php
        session_start();
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        require_once('./phpmailer/class.phpmailer.php');
        include "../constant.php";
        error_reporting(0);
        $dataArr = explode("*", $_GET['data']);
        if ($dataArr[2] == 'EMAIL_WEBSITE_STUDENT') {
            $dataArr[0] = $_SESSION['studentdata']['_id'];
        }
        $_id = $dataArr[0];
        $order_no = $dataArr[1];

        $action = $dataArr[2];


        $urlToGetCustomerDetails =    $apiurl."api/clientbyid/" . $_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToGetCustomerDetails);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        $customerData = json_decode(trim(curl_exec($ch)), true);
        

        curl_close($ch);



        $urlToGetCommissionJson_child = $apiurl."api/orderbyOrder_no/" . $order_no;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToGetCommissionJson_child);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        $orderDataArr =  json_decode(trim(curl_exec($ch)), true);
        $orderData = $orderDataArr[0];
        curl_close($ch);


        $urlToGetCommissionJson_child = $apiurl."api/courses_subcourse_both";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToGetCommissionJson_child);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        $courseData =  json_decode(trim(curl_exec($ch)), true);

        curl_close($ch);


        foreach ($courseData as $perCourse) {
            if ($perCourse["_id"] == $orderData['sub_course_id']) {
                $sub_coursename = $perCourse["course_name"];
            }
            if ($perCourse["_id"] == $orderData['course_id']) {
                $coursename = $perCourse["course_name"];
            }
        }
        $item = $sub_coursename;

        //oreder
        $invoice = $orderData['invoice'];
        $order_date = $orderData['order_date'];
        $order_datePrint = convertDate2($orderData['order_date']);
        $costWithoutGst = $orderData['itemamount'];
        $discount = $orderData['discount'];
        $taxable = $orderData['taxableamount'];
        $igst = $orderData['igst'];
        $cgst = $orderData['cgst'];
        $sgst = $orderData['sgst'];
        $paid_amount = $orderData['paid_amount'];
        if ($paid_amount > $orderData['amount']) {
            $paid_amount = $orderData['amount'];
        }
        $gross = $paid_amount;

        $listprice = $discount + $gross;
        $yourprice =  $gross;

        $yourprice = sprintf("%1\$.2f", $yourprice);
        $listprice = sprintf("%1\$.2f", $listprice);
        $gross = sprintf("%1\$.2f", $gross);



        // customer
        $customer_name = $customerData['first_name'];
        $customer_lastname = $customerData['last_name'];
        $address1 = $customerData['address'];
        $address2 = $customerData['address2'];
        $state = $customerData['state'];
        $city = $customerData['city'];
        $email = $customerData['email'];
        $customer_id = $customerData['customer_id'];
        $mobile = $customerData['mobile'];
        foreach ($customerData['course'] as $perCourse) {
            if ($perCourse["sub_course_id"] == $orderData['sub_course_id'] && $perCourse["course_id"] == $orderData['course_id']) {
                $starting_date = $perCourse["starting_date"];
                $ending_date = $perCourse["ending_date"];
                if ($perCourse["is_self_paced"]) {
                    $duration =   "Self Paced";
                } else {


                    if ($perCourse["duration_type"] == "Month") {
                        $duration = $perCourse["duration"] * 30 . " Days";
                    } else {
                        $duration = $perCourse["duration"]   . " Days";
                    }
                }
            }
        }
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $website . ' SUPPORT<' . $emailUniversal . '>' . "\r\n";
        $subject = 'Welcome ' . $customer_name . " " . $customer_lastname . ' to '. $website.' Family !';


        //actual working for dpathshaal
        $loop="";
        foreach ($orderDataArr as $perOrder) {
            $invoice = $perOrder['invoice'];
            $order_date = $perOrder['order_date'];
            $order_datePrint = convertDate2($perOrder['order_date']);
            $costWithoutGst = $perOrder['itemamount'];
            $discount = $perOrder['discount'];
            $taxable = $perOrder['taxableamount'];
            $igst = $perOrder['igst'];
            $cgst = $perOrder['cgst'];
            $sgst = $perOrder['sgst'];
            $paid_amount = $perOrder['paid_amount'];
            if ($paid_amount > $perOrder['amount']) {
                $paid_amount = $perOrder['amount'];
            }
            $gross =  $perOrder['total_amount'];

            $listprice =  $perOrder['amount'];
            $yourprice =  $perOrder['paid_amount'];

            $yourprice = sprintf("%1\$.2f", $yourprice);
            $listprice = sprintf("%1\$.2f", $listprice);
            $gross = sprintf("%1\$.2f", $gross);
            foreach ($courseData as $perCourse) {
                if ($perCourse["_id"] == $perOrder['sub_course_id']) {
                    $sub_coursename = $perCourse["course_name"];
                }
                if ($perCourse["_id"] == $perOrder['course_id']) {
                    $coursename = $perCourse["course_name"];
                }
            }

            foreach ($customerData['course'] as $perCoursecustomerData) {
                if ($perCoursecustomerData["sub_course_id"] == $perOrder['sub_course_id'] && $perCoursecustomerData["course_id"] == $perOrder['course_id']) {
                    $starting_date = $perCoursecustomerData["starting_date"];
                    $ending_date = $perCoursecustomerData["ending_date"];
                    if ($perCoursecustomerData["is_self_paced"]) {
                        $duration =   "Self Paced";
                    } else {


                        if ($perCoursecustomerData["duration_type"] == "Month") {
                            $duration = $perCoursecustomerData["duration"] * 30 . " Days";
                        } else {
                            $duration = $perCoursecustomerData["duration"]   . " Days";
                        }
                    }
                }
            }

            $item = $sub_coursename;


            $ending_date =    convertDate2($ending_date);
            $starting_date =    convertDate2($starting_date);
            if ($duration == 'Self Paced') {
                $endingdatestr = "";
            } else {
                $endingdatestr = " ,  Ending On : " . $ending_date;
            }


            $loop =  $loop. '  <tr   >
            <td align="left">
            <b>' . $item . ' (' . $duration . ')  </b>
            <br/>
            Starting On : ' . $starting_date . $endingdatestr . ' 
            
            
            </td>
            <td align="right">
            &#8377;' . $listprice . '
            </td>
            
            <td align="right">
            &#8377;' . $yourprice . '
            </td>
            </tr>';
        }


        /// end




        $message = template($loop, $websiteURL, $website,$actualwebsite, $customer_name . " " . $customer_lastname, $customer_id,  $mobile,  $gross, $order_datePrint);




        if ($action == "Email" or $action == "EMAIL_WEBSITE_STUDENT") {

            //$attachFile[] = array("filename" => 'Invoice.pdf', "body" => $letterPDFcontentInvoice);
            $attachFile[] = array();
            $mailresponse = maiServerl($website, $customerData['email'], $subject, $message, $headers, $attachFile);

            echo   json_encode(array("mailresponse" => $mailresponse,"email" => $customerData['email']));
        }
        if ($action == "Email_after_check") {

            //$attachFile[] = array("filename" => 'Invoice.pdf', "body" => $letterPDFcontentInvoice);
            $attachFile[] = array();
            $mailresponse = maiServerl($website, $customerData['email'], $subject, $message, $headers, $attachFile);

            echo   json_encode(array("mailresponse" => $mailresponse));
        } else if ($action == "File_Write") {


            $urlOfInvoice =   "http://api.pdflayer.com/api/convert?access_key=16556adb1e8e4eaf6b62e8e570cf3ed3&document_url=https://xcellinsindia.com/lesson/invoice_lesson.php?" . 'data=' . $_id . '*' . $order_no . '&inline=1';


            $letterPDFcontentInvoice = file_get_contents($urlOfInvoice);
            ///write
            $myfile = fopen("invoices/$invoice.pdf", "w") or die("Unable to open file!");
            $txt =  $letterPDFcontentInvoice;
            fwrite($myfile, $txt);

            fclose($myfile);
            ///write
            echo   json_encode(array("filemaderesponse" => true));
        }


        function maiServerl($website, $to, $subject, $msgContent, $header, $attachFile = array())
        {
            $mail = new PHPMailer();
            $to = strtolower($to);
            $EmailContactArr['to'] = array($to);
            $EmailContactArr['cc'] = array();
            $EmailContactArr['bcc'] = array();
            $result = finalEmail($website, $mail, $attachFile, $EmailContactArr, $subject, $msgContent);
            if ($result == 'true') {
                return 1;
            } else {
                return $result;
            }
        }

        function finalEmail($website, $mail, $attachFile, $EmailContactArr, $subject, $msgContent)
        {




            $mail->IsSMTP();

            //  $staffArr['smtpemail'] = 'help@xcellinsindia.com';
            //  $staffArr['password'] = 'cc_support@xcellinsindia.com';

            //  $staffArr['smtpemail'] = 'cc_support@xcellinsindia.com';
            //$staffArr['password'] = 'AHtAzvWiWbr2jjp';



            $staffArr['smtpemail'] = 'digitalpathshalalive@gmail.com';
            $staffArr['password'] = '9868332939';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = $staffArr['smtpemail'];
            $mail->Password = $staffArr['password'];


            $mail->Subject = $subject;
            //$mail->SMTPDebug  = 1;
            $mail->MsgHTML($msgContent);
            $mail->SetFrom($staffArr['smtpemail'], $website . ' SUPPORT');
            $mail->ClearAddresses();
            $mail->ClearAllRecipients();

            foreach ($EmailContactArr['to'] as $val) {

                $mail->AddAddress(trim($val), '');
            }
            foreach ($EmailContactArr['cc'] as $val1) {
                $mail->AddCC(trim($val1), '');
            }

            foreach ($EmailContactArr['bcc'] as $val2) {
                $mail->AddBCC(trim($val2), '');
            }

            $mail->AltBody = 'This is a plain-text message body';

            // if (count($attachFile) > 0) {

            //     foreach ($attachFile as $per) {
            //         $pdfString = $per['body'];
            //         $filename = $per['filename'];
            //         $mail->addStringAttachment($pdfString, $filename);
            //     }
            // }

            if (!$mail->Send()) {
                return "false" . $mail->ErrorInfo . "-" . $staffArr['password'] . "-" . $staffArr['smtpemail'];
            } else {
                return "true";
            }
        }
        function convertDate($d)
        {
            $arr = explode("T", $d);
            return date('d-m-Y', strtotime($arr[0]));
        }
        function convertDate2($d)
        {
            $arr = explode("T", $d);
            return date('M d, Y', strtotime($arr[0]));
        }

        function template($loop, $websiteURL, $website, $actualwebsite,$name, $customer_id,  $mobile,  $gross,  $order_datePrint)
        {

            $message = ' <table width="100%" border="0" style="font-size:12px">
            <tr>
                <td class="title" align="center">
                    <img src="' . $websiteURL.'/logo.png"  style="height:60px">
                </td>
       
            </tr>
        </table><br/>
        <div style="width:100%; background-color:#184889;color:white">
        <br/> 
            <h3 align="center">Your Order Confirmation from ' . $order_datePrint . '</h3>
        <br/>
            </div>
        <div style="width:100%;background-color:gainsboro;">
            
        <br/> <br/>
            <table  style="background-color:white;width:98%;border:1px solid white;" align="center"  cellpadding=10>
       
            <tr style="background-color:gainsboro;">
                <th align="left" style="width: 80%">
                Description
                </th>
                <th align="right">
                List Price
                </th>
       
                <th align="right">
                Your Price
                </th>
            </tr>' . $loop . '
       
            <tr   >
            <td align="left">
                
                </td>
                <td align="right">
                    <b>TAX</b>  <br/>
                &#8377;0.00
                <br/>    <br/>  <hr/>
                </td>
       
                <td align="right">
                <b>CREDITS</b>  <br/>
                &#8377;0.00
               <br/>    <br/> <hr/>
                </td>
            </tr>
       
            
            <tr   >
            <td align="left">
                
                </td>
                <td align="right">
                     
                </td>
       
                <td align="right">
                <b>TOTAL</b>  <br/>
                &#8377;' . $gross . '
              
                </td>
            </tr>
            </table> <br/>
            <table  style=" width:95%; " align="center"  cellpadding=0>
       
       <tr>
           <td align="left" style="width: 60%">
          <b> Purchased by:</b> ' . $name . '
          <br/> 
          <b>Customer Id:
          </b>' . $customer_id . '
          <br/>
          <b>  Sold by:</b> ' . $website.'
         
          
       </td>
           
       
           <th align="right">
           Need help? <a  style="color:blue" href="' . $websiteURL.'">
       Contact  
       </a> our support team.
           </th>
           
       </tr>
       
       </table>
            
       <br/>
       <div style="width:100%; background-color:#184889;color:white">
       <br/>
   <h3 align="center">
   <a  style="color:white" href="' . $websiteURL.'/contact-us">
  Contact Us
  </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a  style="color:white" href="' . $websiteURL.'/courses">
  Courses
  </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a  style="color:white" href="' . $websiteURL.'/about-us">
  About us
  </a>
  
     
  </h3>    
 
  <h3  align="center">


  Visit our website <a style="color:white" href="' . $websiteURL.'">
  ' . $actualwebsite.'
  </a> for more Course
  
  </h3>
  
 
  
  </h4>
  
  <br/>
   </div>
   </div>
  
       
       ';

            return  $message;
        }


        ?>

  