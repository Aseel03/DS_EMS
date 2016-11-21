<?php
require'header.php';

require_once"../inc/mas.php";

$sqlsup = mysql_query("SELECT * FROM suppliers "); 
$sqlprod = mysql_query("SELECT * FROM products "); 

 $message = $errors[0];
 $messages = $errors[0];


 if($_SESSION['type']==1) $type = "1";
 else $type = "0";

if(isset($_POST['addorder'])){


    $ordername   = $_POST['ordername'];
    $orderdate   = $_POST['orderdate'];
    $dateofdate  = $_POST['dateofdate'];
    $supplier    = $_POST['supplier'];
    $details     = $_POST['details'];
    $product     = $_POST['product'];
    $count       = $_POST['count'];
    $iduser      = $_SESSION['usersId'];

       // check if input empty
    if ($ordername =="" || $orderdate =="" || empty($dateofdate)  || $count=="" || $product=="")
       $message = $errors[2];
    else {
          $sql="insert into orders (orders_name,orders_date,orders_deliverdate,
          orders_details,orders_status,products_name,products_qauntity,user_id,sup_id)
          VALUES (
          '{$ordername}','{$orderdate}','{$dateofdate}'
          ,'{$details}','{$type}','{$product}','$count','{$iduser}','{$supplier}'
          )";
         $result=mysql_query($sql) or die (mysql_error());
         if($result)
         $messages = $errors[1];
         $message = $errors[8];
         sleep(1);
        header('Refresh:3; URL=neworder');

    }

}





?>
<div class="templatemo-content-container">
<div class="templatemo-content-widget white-bg">
<h1 class="text-center " style="color:#EE6759">Add Order</h1>
<hr>
<?php echo$messages.$message;?>
<form action="<?php $_SERVER["PHP_SELF"];?>"  method="post" enctype="multipart/form-data">
              <div class="row form-group">
   
 <?php
            if ($_SESSION['type']==1){
              $supplier =$_POST['supplier'];
             echo'<div class="col-lg-12 form-group">
                  <label style="color:#006E75" >Name of Supplier</label>
                  <select name="supplier" class="form-control">
                   <option value=""></option>';
                while($rowsup = mysql_fetch_object($sqlsup)) {
               echo "<option value='{$rowsup->users_id}' >{$rowsup->sup_name}</option> ";
               }
              echo "</select></div>";
              }else{
                  echo NULL;
                }
              ?>


              
             
              
             

            
              <div class="col-lg-12 form-group">
                    <label style="color:#006E75">Name of Order</label>
                    <input class="form-control"  name="ordername" type="text">
                </div>

                <div class="col-lg-12 form-group">
                <label style="color:#006E75" >Name of product </label>
                <input  class="form-control" name="product" type="text">
            
                </div>

                <div class="col-lg-4 col-md-4 form-group">
                    <label style="color:#006E75" >Date of Order</label>
                    <div class="input-group date  col-md-12" id="date">
                    <input class="form-control" size="16" type="text" name="orderdate">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                </div>
                  <div class="col-lg-4 col-md-4 form-group">
                    <label style="color:#006E75">Date of Deliver</label>
                    <div class="input-group date  col-md-12" id="dateofdate">
                    <input class="form-control"  type="text" name="dateofdate">
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 form-group">
               <label style="color:#006E75" >Quantity</label>
               <input type="number" name="count" required="" min="1" class="form-control">
              </div>


              <div class="form-group text-center">
                <button type="submit" name="addorder" class="templatemo-blue-button">add order</button>
              </div>
            </form>
          </div>
          </div>