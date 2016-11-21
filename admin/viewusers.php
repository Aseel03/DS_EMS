<?php
require_once'header.php';
require_once'../inc/mas.php';



$sql = mysql_query("SELECT * FROM users ORDER BY users_type desc");

$e =  $errors[0];

if(isset($_GET['edit']) && $_GET['edit'] == "avti") {

        $id = $_GET['id'];   

        $sqlactiv = mysql_query( 
        "UPDATE users SET
         users_status='1' WHERE users_id='{$id}'"
        );
        if ($sqlactiv) $e =  $errors[3]; 
        header('Refresh:2; URL=viewusers');

    }

if(isset($_GET['edit']) && $_GET['edit'] == "del") {

        $id = $_GET['id']; //get id from url
        $sqldel = mysql_query("DELETE FROM users WHERE users_id='{$id}'");
        if ($sqldel) $e =  $errors[4]; 
        header('Refresh:2; URL=viewusers');

    }



 ?>


<div class="templatemo-content-container transparency">

<ol class="breadcrumb" >
  <li><a href="index">Home</a></li>
 <li class="active">viewusers</li>
</ol>
<div class="templatemo-content-widget white-bg">
 <?=$e?>
 <div class="table-responsive">
 <table class="table table-bordered table-hover table-striped tablesorter">
 <thead>
                  <tr style="color:#EE6759">
                  <th>#</th>
                  <th>username</th>
                  <th>email</th>
                  <th>phonenumber</th>
                  <th>station</th>
                  <th>userstype</th>
                  <th>status</th>
                  <th>actions</th>
                  </tr>

                </thead>
             <tbody>



<?php
//`users_id`, `username`, `users_email`, `users_password`, `users_phone`, `users_station`, `users_type`, `users_status`
$n=1;
while($row = mysql_fetch_object($sql)){

    echo " <tr>";
    echo "<td>".$n++."</td>";
    echo "<td>".$row->username."</td>";
    echo "<td>".$row->users_email."</td>";
    echo "<td>".$row->users_phone."</td>";
    echo "<td>".$row->users_station."</td>";
    echo "<td>";
        if($row->users_type==1)     echo"HCP admin";   
            elseif($row->users_type==2) echo"HCP employee";
                elseif($row->users_type==3) echo"Suppiler employee" ; 
        else echo " admin website ";  
    echo"</td>";
    echo "<td>";
    /// if users status== 0 echo not active else echo active
    echo  ($row->users_status==0) ?  "<p class='label label-danger'>not active</p>"  : "<p class='label label-success' >active<p>"  ;
    echo "</td>";
    echo "<td>";
    if($row->users_type==0){
        echo "<P class='label label-danger'>adminstarator </P>";
        echo "</td>";
    }else {
         echo "<a class='label label-primary' onclick=\"return confirm('do you want active user ?') ;\"
         href='viewusers?edit=avti&id=".$row->users_id."'>
         <i class='fa fa-check-square' ></i> ACTIVE </a>
         &nbsp;
         <a class='label label-warning' onclick=\"return confirm('do you want delete user ?') ;\"
        href='viewusers?edit=del&id=".$row->users_id."'>
        &nbsp;&nbsp; <i class='fa fa-trash-o'></i>  DELETE</a>";
        echo "</td>";
    }  //end if users _type ^
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