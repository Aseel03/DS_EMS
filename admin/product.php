<?php

require_once'header.php';

$sql = mysql_query("SELECT * FROM products ");



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
                  <th>#</th>
                  <th> </th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th> </th>

                  </tr>

                </thead>
             <tbody>



<?php
$n=1;
while($row = mysql_fetch_object($sql)){

    echo " <tr>";
    echo "<td>".$n++."</td>";
    echo "<td>".$row->p_name."</td>";
    echo "<td>".$row->p_endDate."</td>";
    echo "<td>".$row->p_qauntity."</td>";
    echo "<td>".$row->p_station."</td>";
    echo "<td>".$row->p_info."</td>";
    echo "<td>".$row->sup_id."</td>";
    echo "<td>".$row->user_id."</td>";
    echo " </tr>";

   }// end while

?>
</tbody>
</table>




 </div>
 </div>
 </div>
 </div>
 </body>
</html>