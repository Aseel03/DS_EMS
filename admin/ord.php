<?php

require_once"../inc/confing.php";

  $usersId = $_SESSION['usersId'];


if($_SESSION['type']==0 ||  $_SESSION['type']==1  ){

    $s = mysql_query("select * from orders where orders_status='0'");

    } elseif($_SESSION['type']==3){

        $s = mysql_query("select * from orders where orders_status='1'  AND  sup_id='$usersId' ") ;


    }elseif($_SESSION['type']==2){
        $s = mysql_query("select * from orders  WHERE user_id='$usersId' ");
    }



$nam = mysql_num_rows($s);
$r = mysql_fetch_object($s);
echo (0<sizeof($nam)) ?"{$nam}":"<span class='hide'></span> ";

?>