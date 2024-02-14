  
     <?php

      header("Pragma: no-cache");
      header("Cache-Control: no-cache");
      header("Expires: 0");

      header('Access-Control-Allow-Origin: *');
      error_reporting(0);
      $word =   $_GET['word'];
    
      if ($word == 'NA' or $word == 'na' or $word == 'Na') {
        
         $urlToGetCustomerDetails =    "https://random-word-api.herokuapp.com/word?number=1";
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $urlToGetCustomerDetails);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

         curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
         $wordArr = json_decode(trim(curl_exec($ch)), true);
        
         $word = $wordArr[0];
         curl_close($ch);
      }

      $urlToGetCustomerDetails =    "https://api.dictionaryapi.dev/api/v1/entries/en/" . $word;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $urlToGetCustomerDetails);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

      curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
      $customerData = json_decode(trim(curl_exec($ch)), true);

       echo json_encode($customerData);
      curl_close($ch);



      ?>

 