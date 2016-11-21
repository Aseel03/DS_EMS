<?php



  function curlGetDataJson($url){

            $cr = curl_init();//create a new resource handle
                $user = $_SERVER["HTTP_USER_AGENT"];// users agent == name fo browser and OS type
                // Set some options
                curl_setopt($cr,CURLOPT_URL,$url); // Set a referer
                curl_setopt($cr, CURLOPT_REFERER,$url);
                curl_setopt($cr,CURLOPT_RETURNTRANSFER,1);  // (1= return data ,0 = print data )
                curl_setopt($cr,CURLOPT_USERAGENT,$user);// users agent
                curl_setopt($cr,CURLOPT_TIMEOUT,10); // Timeout of the return data from the devices
                curl_setopt($cr,CURLOPT_FOLLOWLOCATION,0); // like header Location

            $json = curl_exec($cr); // get data, and return $output
            curl_close($cr); /// close the resource
            $data = json_decode($json);
            if (!$data) die ('url is not json chack url ');  //chack if data JSON or not

      return $data; 

  }
?>