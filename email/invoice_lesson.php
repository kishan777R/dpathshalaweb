 <!doctype html>
 <html>

 <head>
     <meta charset="utf-8">
     <title>Lesson Invoice </title>
     <?php

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        header('Access-Control-Allow-Origin: *');
        error_reporting(0);
        $dataArr = explode("*", $_GET['data']);
        $_id = $dataArr[0];
        $order_no = $dataArr[1];



        $urlToGetCustomerDetails =    "http://edutech.xcellinsindiapro.com:3000/api/clientbyid/" . $_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToGetCustomerDetails);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        $customerData = json_decode(trim(curl_exec($ch)), true);

        curl_close($ch);



        $urlToGetCommissionJson_child = "http://edutech.xcellinsindiapro.com:3000/api/orderbyOrder_no/" . $order_no;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToGetCommissionJson_child);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
        $orderDataArr =  json_decode(trim(curl_exec($ch)), true);
        $orderData = $orderDataArr[0];
        curl_close($ch);


        $urlToGetCommissionJson_child = "http://edutech.xcellinsindiapro.com:3000/api/courses_subcourse_both";
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
        $order_date = convertDate($orderData['order_date']);
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

        // customer
        $customer_name = $customerData['first_name'];
        $customer_lastname = $customerData['last_name'];
        $address1 = $customerData['address'];
        $address2 = $customerData['address2'];
        $state = $customerData['state'];
        $city = $customerData['city'];
        function convertDate($d)
        {
            $arr = explode("T", $d);
            return date('d-m-Y', strtotime($arr[0]));
        }
        ?>

 </head>

 <body>
     <div class="invoice-box" style="font-size:17px;">

         <table width="100%" border="0" style="font-size:12px">
             <tr>
                 <td class="title">
                 <img src="http://lessons.co.in/images/logo.png"  >
                 </td>
                 <td align="right">
                     <p align="right"> Invoice No. : <?php echo $invoice; ?><br>
                         Invoice Date: <?php echo $order_date; ?><br>
                         GST: 07AAACX2010L1ZK <br>
                         PAN: AAACX2010L<br></p>


                 </td>
             </tr>
         </table>
         <table width="100%" border="0" style="font-size:12px">
             <tr>
                 <td>
                     <h4>Billing Address</h4>
                     <?php echo $customer_name . ' ' . $customer_lastname; ?><br>
                     <?php echo $address1 . '<br/>' . $address2; ?><br>
                     <?php echo $city . ' ' . $state; ?>
                 </td>

                 <td align="right">
                     <h4>Sold By</h4>

                     <p align="right">

                         Lesson Edutech <br />

                         Email: contact@lesson.co.in<br />
                     </p>

                 </td>
             </tr>
         </table>
         <table cellpadding="0" width="100%" cellspacing="0" border="0" style="font-size:12px;margin-top:50px">






             <tr style="background:#eee none repeat scroll 0 0;font-family:bold;line-height:25px;" class="heading">
                 <td align="left">
                     Item
                 </td>
                 <td align="center">
                     Qty
                 </td>
                 <td align="center">
                     Net amount
                 </td>
                 <td align="center">
                     Discount
                 </td>
                 <td align="center">
                     Taxable value
                 </td> <?php
                        if ($state != 'Delhi') {
                        ?>
                     <td align="center">
                         IGST(18%)
                     </td>
                 <?php
                        } else {
                    ?><td align="center">
                         CGST(9%)
                     </td>
                     <td align="center">
                         SGST(9%)
                     </td>

                 <?php
                        }
                    ?>

                 <td align="center">
                     Gross amount
                 </td>
             </tr>

             <tr class="item" style=" line-height:25px;">
                 <td>
                     <?php echo $item; ?>
                 </td>

                 <td align="center">
                     1
                 </td>

                 <td align="center">
                     <?php echo '&#8377;' . $costWithoutGst; ?>
                 </td>
                 <td align="center">
                     <?php echo '&#8377;' . $discount; ?>
                 </td>
                 <td align="center">
                     <?php echo '&#8377;' . $taxable; ?>
                 </td>
                 <?php
                    if ($state != 'Delhi') {
                    ?>

                     <td align="center">
                         <?php echo '&#8377;' . $igst; ?>
                     </td>
                 <?php
                    } else {
                    ?><td align="center">
                         <?php echo '&#8377;' . $cgst; ?>
                     </td>
                     <td align="center">
                         <?php echo '&#8377;' . $igst / 2; ?>
                     </td>

                 <?php
                    }
                    ?>



                 <td align="center">
                     <?php
                        $gross = $paid_amount;
                        $gross = sprintf("%1\$.2f", $gross);
                        echo '&#8377;' . $gross;

                        ?>
                 </td>
             </tr>




         </table>
         <hr />
         <p style="font-size: 10px;">
             ** Conditions Apply. Please refer to the <a target="_blank" href="https://lessons.co.in">www.lessons.co.in</a> for more details
         </p>
     </div>
 </body>

 </html>