 
     <?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

header('Access-Control-Allow-Origin: *');
        require_once('./phpmailer/class.phpmailer.php');

        error_reporting(0);
      extract( $_POST );
         //courseenquiryapi
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: LESSONS SUPPORT<noreply@lessons.co.in>' . "\r\n";
        $subject = "Message from Website from $email ";


         $message =  "<b>Email :</b> $email<br/><br/><b>Name :</b> $name<br/><br/><b>Phone :</b> $phone<br/><br/><b>Message :</b> $message ";

 
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  echo  json_encode(array("message"=>"Email is not valid !","status"=>"FALSE"));
	  }else{
		  
           $mailresponse = maiServerl("kishanrock777@gmail.com", $subject, $message, $headers, []);

            if($mailresponse==1){
				 echo  json_encode(array("message"=>"Thank you for contacting us, we will contact you soon !","status"=>"TRUE"));
				
			}else{
				 echo  json_encode(array("message"=>"Something is wrong  !","status"=>"FALSE"));
			}
	  }
       

        function maiServerl($to, $subject, $msgContent, $header, $attachFile = array())
        {
            $mail = new PHPMailer();
            $to = strtolower($to);
            $EmailContactArr['to'] = array($to);
            $EmailContactArr['cc'] = array();
            $EmailContactArr['bcc'] = array();
            $result = finalEmail($mail, $attachFile, $EmailContactArr, $subject, $msgContent);
            if ($result == 'true') {
                return 1;
            } else {
                return $result;
            }
        }

        function finalEmail($mail, $attachFile, $EmailContactArr, $subject, $msgContent)
        {




            $mail->IsSMTP();

            //  $staffArr['smtpemail'] = 'help@xcellinsindia.com';
            //  $staffArr['password'] = 'cc_support@xcellinsindia.com';

          //  $staffArr['smtpemail'] = 'cc_support@xcellinsindia.com';
            //$staffArr['password'] = 'AHtAzvWiWbr2jjp';

            $staffArr['smtpemail'] = 'noreply@lessons.co.in';
             $staffArr['password'] = 'abcdefghijk987654321';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = $staffArr['smtpemail'];
            $mail->Password = $staffArr['password'];


            $mail->Subject = $subject;
            //$mail->SMTPDebug  = 1;
            $mail->MsgHTML($msgContent);
            $mail->SetFrom($staffArr['smtpemail'], 'LESSONS SUPPORT');
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

            if (count($attachFile) > 0) {

                foreach ($attachFile as $per) {
                    $pdfString = $per['body'];
                    $filename = $per['filename'];
                    $mail->addStringAttachment($pdfString, $filename);
                }
            }

            if (!$mail->Send()) {
                return "false" . $mail->ErrorInfo . "-" . $staffArr['password'] . "-" . $staffArr['smtpemail'];
            } else {
                return "true";
            }
        }
         

         

        ?>

  