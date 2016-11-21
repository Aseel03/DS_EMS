<?php
require_once'header.php';
require_once'../inc/mas.php';



    /*
    *  mysql query [INNER JOIN ]
    *  Create a relationship between table [orders] and table [users]  BY users_id
    *  becouse i need callback username from table users
    */


  $e =  $errors[0];
  $usersId = $_SESSION['usersId'];

 if( $_SESSION['type']==0 ||  $_SESSION['type']==1  ){
   // if user adminHCP or adminwebite run this query
    $sql = mysql_query("SELECT * FROM orders INNER JOIN users ON orders.user_id=users.users_id
    WHERE orders.orders_status='0' ");
                      //status=0 order is pending


if(isset($_GET['edit']) && $_GET['edit'] == "app") {

        $id = $_GET['id'];   //get id from url

        $sqlactiv = mysql_query( 
        "UPDATE orders SET
         orders_status='2' WHERE orders_id='{$id}'"
        );
        if ($sqlactiv) $e =  $errors[9]; 
        header('Refresh:2; URL=notification');

    }



}elseif($_SESSION['type']==3) {


    $sql = mysql_query("SELECT * FROM orders INNER JOIN users ON orders.user_id=users.users_id
    WHERE  orders.orders_status='1' AND  orders.hcp_id='{$usersId}' ");
                    ///status==1  accepted from adminHCP
   if(isset($_GET['edit']) && $_GET['edit'] == "app") {

        $id = $_GET['id'];   //get id from url

        $sqlactiv = mysql_query( ///  UPDATE status to accepted  By orders_id
        "UPDATE orders SET
         orders_status='2' WHERE orders_id='{$id}'"
        );
        if ($sqlactiv) $e =  $errors[9]; //if active echo message && refresh page
        header('Refresh:2; URL=notification');

    }


}elseif($_SESSION['type']==2){

    // if user employee run this query
    $sql = mysql_query("SELECT * FROM orders INNER JOIN users ON orders.user_id=users.users_id
    WHERE  orders.orders_status='1' AND orders.user_id='{$usersId}' ")

      ///status==2  on the way  from suppilre
   ;
   if(isset($_GET['edit']) && $_GET['edit'] == "app") {

        $id = $_GET['id']; 

        $sqlactiv = mysql_query( ///  UPDATE status to Delivered  By orders_id
        "UPDATE orders SET
         orders_status='3' WHERE orders_id='{$id}'"
        );
        if ($sqlactiv) $e =  $errors[10]; //if active echo message && refresh page
        header('Refresh:2; URL=notification');

    }


}



 ?>



<div class="templatemo-content-container">

<ol class="breadcrumb" >
  <li><a href="index">Home</a></li>
 <li class="active">notification</li>
</ol>
 <div class="templatemo-content-widget white-bg">
 <?=$e;?>
 <div class="table-responsive">
 <table class="table table-bordered table-hover table-striped tablesorter">
 <thead>
                  <tr style="color:#EE6759">
                  <th>#</th>
                  <th>orders name</th>
                  <th>orders date</th>
                  <th>orders deliverdate</th>
                  <th>products name</th>
                  <th>products qauntity</th>
                  <th>orders details</th>
                  <th>orders status</th>
                  <th>order by </th>
                  <th>actions</th>

                  </tr>

                </thead>
             <tbody>



<?php
$n=1;
while($row = mysql_fetch_object($sql)){

//`orders_id`, `orders_name`, `orders_date`, `orders_deliverdate`, `orders_details`, `status`, `user_id`, `hcp_id`
    echo " <tr>";
    echo "<td>".$n++."</td>";
    echo "<td>".$row->orders_name."</td>";
    echo "<td>".$row->orders_date."</td>";
    echo "<td>".$row->orders_deliverdate."</td>";
    echo "<td>".$row->products_name."</td>";
    echo "<td>".$row->products_qauntity."</td>";
    echo "<td>".$row->orders_details."</td>";
    echo "<td>";
    if($row->orders_status==0)      echo"<p class='label label-warning'>pending</p>";
    elseif($row->orders_status==1)  echo"<p class='label label-info'>approved</p>";
    elseif($row->orders_status==2)  echo"<p class='label label-success'>on the way</p>" ;

    echo "</td>";
    echo "<td>".$row->username."</td>";
    echo "<td>";
    if( $_SESSION['type']==0 ||  $_SESSION['type']==1  || $_SESSION['type']==3 ){
    echo "<a class='label label-primary' onclick=\"return confirm('do you want accept orders ?') ;\"
         href='notification?edit=app&id=".$row->orders_id."'>
    <i class='fa fa-check-square' ></i> accept </a></td>";
    echo " </tr>";
    } else {
        echo "<a class='label label-primary' onclick=\"return confirm('do you want Delivered orders ?') ;\"
         href='notification?edit=app&id=".$row->orders_id."'>
    <i class='fa fa-check-square' ></i> Delivered </a></td>";
    echo " </tr>";
    }

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