<?php

require_once"inc/confing.php";
require_once"inc/mas.php";


if(isset($_SESSION["login"])==true){
   // if user login will return to admin page
    header('Location:admin/');

    die;
 }

 $message = $errors[0]; // no errors

if(isset($_POST['LOGIN'])){

      $usersname =   $_POST['username'];
      $password =    $_POST['upassword'];
      $query =  mysql_query("SELECT * from users WHERE username='{$usersname}' AND users_password='{$password}'");
    /// check if data in mysql
    if (!mysql_num_rows($query)) {
        $message  = $errors[100];
    } else {
        // row  data selected
            $r = mysql_fetch_object($query);
            $_SESSION['login'] =true; 
            $_SESSION['usersName'] = $r->username;
            $_SESSION['type'] = $r->users_type;
            $_SESSION['usersStatus'] = $r->users_status;
            $_SESSION['usersId'] = $r->users_id;
            $_SESSION['full'] = $r->full; //complete reg ==1

            // check if users is active
            if($_SESSION['login']==1 && $_SESSION['usersStatus']==1) {

                $message = $errors[101];
                sleep(1); // 1 sec
                header('Refresh:3; URL=admin/');
                
            }elseif($_SESSION['usersStatus']!=1) {
                $message = $errors[102];
            }

     } // end else

}  //end if
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Login</title>
        <meta name="description" content="">
	    <link href="css/font.css" rel="stylesheet">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/templatemo-style.css" rel="stylesheet">
        <script src="admin/js/jquery-1.11.2.min.js"></script>
        <script src="admin/js/bootstrap.min.js"></script>
        <script src="admin/js/admiscript.js"></script>
	</head>

	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	        <i class="fa fa-hospital-o fa-2x"></i>
	          <h1>LOGIN</h1>
	        </header>
            <?=$message; ?>
	        <form action="<? $_SERVER["PHP_SELF"]?>" id="m" class="templatemo-login-form"  method="POST" >
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
		              	<input type="text" class="form-control" name="username">
		          	</div>
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
		              	<input type="password" class="form-control" name="upassword" >
		          	</div>
	        	</div>
				<div class="form-group">
					<button type="submit" name="LOGIN" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
	</body>
</html>



