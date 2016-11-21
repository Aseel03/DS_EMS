<?php
require_once'header.php';
require_once'../inc/mas.php';

$e =  $errors[0];
$iduser      = $_SESSION['usersId'];
$sql = mysql_query("SELECT * FROM suppliers WHERE users_id='$iduser'");


    if(isset($_POST['edit'])) {

        $name         = $_POST['name'];
        $phone        = $_POST['phone'];
         $website    = $_POST['website'];
        $email        = $_POST['email'];
        $id           = $_POST['id']; // <input type='hidden' name='id' value='{$row->users_id}' >

        $sqledit = mysql_query(
        "UPDATE suppliers SET
        sup_name='{$name}',sup_phone='{$phone}',sup_website='{$website}'
        ,sup_email='{$email}' WHERE users_id='{$id}'"
        );

        if ($sqledit) $e =  $errors[1];
        header('Refresh:1; URL=myinfo');

    }




?>




<div class="templatemo-content-container">
<ol class="breadcrumb" >
  <li><a href="index">Home</a></li>
 <li class="active">my Information</li>
</ol>
 <div class="templatemo-content-widget white-bg">
 <?=$e;?>
 <div class="table-responsive">
 <table class="table table-bordered table-hover table-striped tablesorter">
 <thead>
                  <tr style="color:#EE6759">
                  <th>#</th>
                  <th>name</th>
                  <th>phone number</th>
                  <th>email</th>
                  <th>web site</th>
                  <th>actions</th>
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
        	echo"<td>
                    <a class='label label-info'  href='#id=".md5($row->users_id)."' data-toggle='modal' data-target='#my{$row->users_id}'>
                    <i class='fa fa-pencil'> Edit </i> </a>
                    <div class='modal fade' id='my{$row->users_id}' tabindex='-1' role='dialog' aria-labelledby='call' aria-hidden='true'>
                    <form class='ZEYAD-CP-login-form' role='form' action='myinfo?id={$row->users_id}' method='post'>
                    <input type='hidden' name='id' value='{$row->users_id}' >
                    <div class='modal-dialog'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                    <button class='close' data-dismiss='modal'>&times;</button>
                     <h1 class='text-center'>Edit My Information</h1>
                    </div>
                    <div class='modal-body'>

                    <div class='form-group'>
                    <label  class='control-label'>name </label>
                    <input type='text' class='form-control' name='name' value='{$row->sup_name}'><br />
                    </div>


                    <div class='form-group'>
                    <label  class='control-label'>email</label>
                    <input type='text' class='form-control' name='email' value='{$row->sup_email}'>
                    </div>


                    <div class='form-group'>
                    <label  class='control-label'>phonenumber</label>
                    <input type='text' class='form-control' name='phone' value='{$row->sup_phone}'>
                    </div>


                 <div class='form-group'>
                <label  class='control-label'>web site</label>
                <input type='URL' class='form-control' name='website' value='{$row->sup_website}'>
                </div>


                    </div>
                     <div class='modal-footer'>
                     <button type='submit' class='btn btn-primary' name='edit'>update </button>
                     </div>
                     </div>
                    </div></form></div>
                    ";
            echo "</td>";

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