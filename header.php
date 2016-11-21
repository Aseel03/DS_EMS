<?php



require_once"inc/confing.php";

function CleanInput($input){
        $input = htmlentities($input);
        $input = addslashes($input);
        $input = mysql_real_escape_string($input);
   return $input;
    }

//if( $_SESSION["login"]==true &&  time()<$_SESSION['expire'] ){

?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user.css">

 
  </head>
  <body>
  <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
             </button>

          </div>
             



            <div class="collapse navbar-collapse" id="#navbar">
                <ul class="nav navbar-nav links">
                 <li> <img src="logo2.png" alt="logo" width="42" height="42" style="margin-top:5px"></li>

                    <li><a  class="fa fa-home"  href="index" > Home</a></li>

                    <li><a class="fa fa-users"  href="register"> Register </a></li>
                    <li><a class="fa fa-file-text-o"  href="aboutus"> About us</a></li>
                </ul>
            </div>
        </div>
    </nav>



    </body>
