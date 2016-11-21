<?php
require_once'header.php';


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
            $data = json_decode($json);// return JOSN , a json_decode($url,1) will return array
            if (!$data) die ('url is not json chack url ');  //chack if data JSON or not

      return $data; //return not print

  }

?>
<div class="templatemo-content-container">

<ol class="breadcrumb" >
  <li><a href="index">Home</a></li>
 <li class="active">view products</li>
</ol>
 <div class="templatemo-content-widget white-bg">
 <div class="table-responsive">
 <table class="table table-bordered table-hover table-striped tablesorter">
 <thead>
                  <tr>
                  <th>tagid</th>
                  <th>name</th>
                  <th>qauntity</th>
                  <th>station</th>
                  <th>info</th>
                  </tr>

                </thead>
             <tbody>

<?php
        // url from devices do not forget .json
        $data = curlGetDataJson("http://localhost:6580/rfcode_zonemgr/zonemgr/api/taglist.json");

        $q = mysql_query('select * from products');
        $id = array();

    while($row = mysql_fetch_object($q)){

    $id[] =$row->ID;    // convert data from mysql to array

     }

      foreach($data as $key) {

            set_time_limit(360000); 
        	flush();               
                ob_flush();       
            if(isset($key->id) && !array_key_exists($key->id,$id)){ // chack if (id)in databesa  or not

            $q =  mysql_query("INSERT INTO products(ID) VALUES('$key->id')");
            if($q){ echo "tagid found {$key->id} please wait 4sec to add<br>" ;
            echo '<meta http-equiv="refresh" content="3; url=p">';

            }else{
            $q1 = mysql_query("select * from products where ID='{$key->id}'");
            $print = mysql_fetch_object($q1);
            echo " <tr>";
            echo "<td>{$print->ID}</td>";
            echo "<td>{$print->p_name}</td>";
            echo "<td>{$print->p_qauntity}</td>";
            echo "<td>{$print->p_station}'</td>";
            echo "<td>{$print->p_info}'</td>";
            echo " </tr>";
            echo '<meta http-equiv="refresh" content="3; url=p">';
            }
            flush();        
                ob_flush(); 

            }


        } // close the loop

?>

</tbody></table>

 </div>
 </div>
 </div>
 </div>
 </div>
 </body>
</html>