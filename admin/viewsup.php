<?php
require_once'header.php';


//  query INNER JOIN  on
// Create a relationship between table [hcp] and table [users]  BY user_id
// becouse i need callback username from table users

$sql = mysql_query("SELECT * FROM suppliers INNER JOIN users ON suppliers.users_id=users.users_id");
?>




<div class="templatemo-content-container">

<ol class="breadcrumb" >
  <li><a href="index">Home</a></li>
 <li class="active">supplier users</li>
</ol>
 <div class="templatemo-content-widget white-bg">
 <div class="table-responsive">
 <table class="table table-bordered table-hover table-striped tablesorter">
 <thead>
                  <tr style="color:#EE6759">
                  <th>id</th>
                  <th>name</th>
                  <th>phone number</th>
                  <th>email</th>
                  <th>web site</th>

                  </tr>

                </thead>
             <tbody>



<?php
$n=1;
while($row = mysql_fetch_object($sql)){

//hcp_name,hcp_phone,hcp_prouduct,hcp_email,users_id
    echo " <tr>";
    echo "<td>".$n++."</td>";
    echo "<td>".$row->sup_name."</td>";
    echo "<td>".$row->sup_phone."</td>";
    echo "<td>".$row->sup_email."</td>";
    echo "<td>".$row->sup_website."</td>";
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