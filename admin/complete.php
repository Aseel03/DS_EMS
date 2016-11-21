<?php

require_once"../inc/confing.php";
require_once"../inc/mas.php";

 ob_start();
 if($_SESSION['login']!=1):
 header('Location:../login');
 endif;

                          // 1 he complete reg
if($_SESSION['type']==3 && $_SESSION['full']==1){
    // if user type 3 but he complete info  will be  return to index page
    header('Location:index');
  }

 $message = $errors[0];

if(isset($_POST['full'])){

    $name        = $_POST['name'];
    $phone       = $_POST['phone'];
    $email       = $_POST['email'];
    $website    = $_POST['website'];
    $iduser      = $_SESSION['usersId'];

     // check if input empty
    if ($name =="" || $phone =="" || $website=='' || $email=='' )
       $message = $errors[2];
    else {
          $sql="insert into suppliers (sup_name,sup_phone,sup_website,sup_email,users_id)
          VALUES ('{$name}','{$phone}','{$website}','{$email}','{$iduser}')";
         $result=mysql_query($sql);
         if($result) $message = $errors[1];
        $sql  = mysql_query( "UPDATE users SET full='1' WHERE users_id='{$iduser}'");

        error_reporting(0); // no view errors from session
        session_destroy($_SESSION['full']);  // end session [full]
         $_SESSION['full']=1;
         sleep(1);
         header('Refresh:3; URL=index');

    }

}


ob_end_flush();





?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Dashboard</title>
    <meta name="author" content="DSEMS">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
     <script type="text/javascript" src="js/time.js"></script>
    <script type="text/javascript" src="js/admiscript.js"></script>
  </head> 
<div class="templatemo-content-container " style="margin:0px 300px 0 300px;">
<div class="templatemo-content-widget white-bg ">
<h1 class="text-center " style="color:#EE6759">Full Register</h1>
<hr>
<?=$message;?>
<form action="<?php $_SERVER["PHP_SELF"];?>"  method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label style="color:#006E75">Name</label>
                    <input class="form-control"  name="name" type="text">
                </div>
                <div class="form-group">
                    <label style="color:#006E75">phone</label>
                    <input class="form-control" name="phone"  type="text">
                </div>

                   <div class="form-group">
                    <label style="color:#006E75">email</label>
                    <input class="form-control" name="email"  type="text" >
                </div>
                <div class="form-group">
                    <label style="color:#006E75">your web site </label>
                    <input class="form-control" name="website"  type="url">
                </div>



              <div class="form-group text-center">
                <button type="submit" name="full" class="templatemo-blue-button">complete info </button>
              </div>
            </form>
          </div>
          </div>