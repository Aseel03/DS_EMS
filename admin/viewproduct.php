<?php

require_once'header.php';
require"readurl.php"; 

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
                  <tr style="color:#EE6759">
                  <th >tagid</th>
                  <th>name</th>
                  <th>qauntity</th>
                  <th>station</th>
                  <th>info</th>
                  </tr>

                </thead>
             <tbody>

<?php
        // url from devices .json
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

            if($id){

                $read = mysql_query("select * from products where ID='{$key->id}'");
                $print = mysql_fetch_object($read);
                echo " <tr>";
                echo "<td>{$print->ID}</td>";
                echo "<td>{$print->p_name}</td>";
                echo "<td>{$print->p_qauntity}</td>";
                echo "<td>{$print->p_station}</td>";
                echo "<td>{$print->p_info}</td>";
                echo " </tr>";
                echo '<meta http-equiv="refresh" content="3; url=viewproduct">';
            } else {

            die ('<div class="alert alert-danger"> tagid Not found in databesa ||
                <a href="getproduct" class="btn btn-danger"> getproduct </a></div>');
        }
           flush();
          ob_flush();

        }// close if


    }// close the loop


?>
</tbody></table>
 </div>
 </div>
 </div>
 </div>
 </div>
 </body>
</html>