 <?php


date_default_timezone_set('Asia/Riyadh');

require_once"../inc/confing.php";
require_once"../header.php";

 // CHECK if user login header to admin page
 // else header to login.
if($_SESSION["login"]==true && $_SESSION['usersStatus']==1){

?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Dashboard</title>
    <meta name="author" content="DSEMS">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/co.js"></script>
    <script type="text/javascript" src="js/time.js"></script>
    <script type="text/javascript" src="js/admiscript.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

  </head>
  <body>
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header light-gray-bg text-center">
       <?php
             echo "Hi, ".$_SESSION['usersName']." !  &nbsp;";
             echo '<i class="fa fa-power-off "></i> <a href="logout">logout</a><br>';
       ?>

        </header>

        <div class="mobile-menu-icon">
        <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
          <ul>
<?php
        if($_SESSION['type']==0):
            echo ' <li><a href="viewusers"><i class="fa fa-users"></i>viewusers </a></li>';
        
        else: echo NULL;
         endif;
            if($_SESSION['type']==1)
                    echo '<li><a href="neworder"><i class="fa fa-clipboard" style="font-size:20px;"></i> neworder</a></li>
                    <li><a href="viewproduct"><i class="fa fa-cubes" style="font-size:2٠px"></i>view product </a></li>
                    <li><a href="viewsup"><i class="fa fa-hospital-o" style="font-size:20px;"></i>view suppliers </a></li>
                    <li><a href="notification"><i class="fa fa-ambulance" style="font-size:20px;"></i>Tracking <span class="badge"></span> </a></li>';
                elseif($_SESSION['type']==2)
                        echo '<li><a href="neworder"><i class="fa fa-clipboard" style="font-size:20px;"></i> neworder</a></li>
                         <li><a href="notification"><i class="fa fa-ambulance"></i>Tracking <span class="badge"></span> </a></li>';
                    elseif($_SESSION['type']==3)
                            echo '<li><a href="myinfo"><i class="fa fa-info"></i> myinfo</a></li>
                            <li><a href="view HCP "><i class="fa fa-cube"></i>view HCP </a></li>
                            <li><a href="notification"><i class="fa fa-ambulance" style="font-size:20px;"></i>Tracking <span class="badge"></span> </a></li>';

?>
          </ul>
        </nav>
      </div>
     <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
             <div id ="datetime" class="text-center"></div>
            </nav>
          </div>
        </div>

<script>
$(function worker(){
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          setTimeout(worker,9000);

        }
    });
    $(".badge").load("ord.php");

});

</script>

<?php
// header to login.
 }else{ session_destroy();  header('Location: ../login');}  ?>
